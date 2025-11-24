<?php

namespace App\Controller;

class ChampionnatsController extends AppController {
    
    public function index() {
        //on récupére tous les posts et on les stocke dans $mesDivisions
        $mesChampionnats = $this->Championnats->find()->contain([
        'Divisions' => function ($q) {
            return $q
            ->select(['name']);
        },
         
        'TypeChampionnats' => function ($q){ 
            return $q 
            ->select(['name']);
        },
                
        'Categories' => function ($q){ 
            return $q 
            ->select(['nom_categorie']);
        }])->all();
        $this->set(compact('mesChampionnats')); //envoie à la vue le contenu de $mesDivisions dans $rep qui sera utiliseable
    }

   /* public function detail($id = null) {
        try {
            $leArticle = $this->Articles->get($id);
        } catch (\Exception $ex) {
            if ($id == null) {
                $this->Flash->error(__("L'action detail doit être appelé avec un identifiant"));
            } else {
                $this->Flash->error(__("L’article {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('leArticle'));
    } */

     public function add() {
         $mesDivisions = $this->fetchTable('Divisions')
                ->find('list', keyField: 'id', valueField: 'name')
                ->toArray();
         $mesCategories = $this->fetchTable('Categories')
                ->find('list', keyField: 'id', valueField: 'nom_categorie')
                ->toArray();
         $mesTypesChampionnats = $this->fetchTable('TypeChampionnats')
                ->find('list', keyField: 'id', valueField: 'name')
                ->toArray();
        
        $leChampionnat = $this->Championnats->newEmptyEntity();
        if ($this->request->is('post')) {
            $leChampionnat = $this->Championnats->patchEntity($leChampionnat, $this->request->getData());
            if ($this->Championnats->save($leChampionnat)) {
                $this->Flash->success(__("Le championnat a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter le championnat."));
            }
        }
        $this->set(compact('leChampionnat', 'mesDivisions', 'mesCategories', 'mesTypesChampionnats'));
    }

    public function edit($id = null) {
        try {
            $leChampionnat = $this->Championnats->get($id);
        } catch (\Exception $ex) {
            if ($id == null) {
                $this->Flash->error(__("L'action edit doit être appelé avec un identifiant"));
            } else {
                $this->Flash->error(__("Le championnat {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Championnats->patchEntity($leChampionnat, $this->request->getData());
            if ($this->Championnats->save($leChampionnat)) {
                $this->Flash->success(__('Votre championnat a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible de mettre à jour votre championnat.'));
            }
        }

        $this->set(compact('leChampionnat'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $leChampionnat = $this->Championnats->get($id);
        if ($this->Championnats->delete($leChampionnat)) {
            $this->Flash->success(__("Le type de championnat {0} d' id {1} a bien été supprimé ! ", $leChampionnat->nom_championnat, $leChampionnat->id));
        return $this->redirect(['action' => 'index']);
        }
    }
}
