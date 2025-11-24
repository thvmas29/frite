<h1>Ajouter le championnat</h1>
<?php
    echo $this->Form->create($leChampionnat);
    echo $this->Form->control('nom_championnat');
    echo $this->Form->control('num_divisions_id',['options' => $mesChampionnats, 'label' => 'Selectionnez une division']);
    echo $this->Form->control('num_categories_id',['options' => $mesChampionnats, 'label' => 'Selectionnez une division']);
    echo $this->Form->control('num_type_championnats_id',['options' => $mesChampionnats, 'label' => 'Selectionnez une division']);
    echo $this->Form->button(__("Créer le championnat"));
    echo $this->Form->end();
    echo $this->html->link('Retour à la liste des categorie', ['action' => 'index'],['class' => 'button']);
