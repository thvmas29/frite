<?php

namespace App\Controller;

class DivisionsController extends AppController {

    public function index() {
        //on récupére tous les posts et on les stocke dans $mesDivisions
        $mesDivisions = $this->Divisions->find()->all();

        $this->set(compact('mesDivisions')); //envoie à la vue le contenu de $mesDivisions dans $rep qui sera utiliseable
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
        
        $laDivision = $this->Divisions->newEmptyEntity();
        if ($this->request->is('post')) {
            $laDivision = $this->Divisions->patchEntity($laDivision, $this->request->getData());
            if ($this->Divisions->save($laDivision)) {
                $this->Flash->success(__("La division a été sauvegardé."));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__("Impossible d'ajouter votre article."));
            }
        }
        $this->set(compact('laDivision'));
    }

    public function edit($id = null) {
        try {
            $laDivision = $this->Divisions->get($id);
        } catch (\Exception $ex) {
            if ($id == null) {
                $this->Flash->error(__("L'action edit doit être appelé avec un identifiant"));
            } else {
                $this->Flash->error(__("La division {0} n'existe pas", $id));
            }
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['post', 'put'])) {
            $this->Divisions->patchEntity($laDivision, $this->request->getData());
            if ($this->Divisions->save($laDivision)) {
                $this->Flash->success(__('Votre division a été mis à jour.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Impossible de mettre à jour votre division.'));
            }
        }

        $this->set(compact('laDivision'));
    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $laDivision = $this->Divisions->get($id);
        if ($this->Divisions->delete($laDivision)) {
            $this->Flash->success(__("La division {0} d' id {1} a bien été supprimé ! ", $laDivision->name, $laDivision->id));
        return $this->redirect(['action' => 'index']);
        }
    }
}