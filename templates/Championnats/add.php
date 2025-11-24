<h1>Ajouter le championnat</h1>
<?php
    echo $this->Form->create($leChampionnat);
    echo $this->Form->control('nom_championnat');
    echo $this->Form->control('division_id',['options' => $mesDivisions, 'label' => 'Selectionnez une division']);
    echo $this->Form->control('category_id',['options' => $mesCategories, 'label' => 'Selectionnez une division']);
    echo $this->Form->control('type_championnat_id',['options' => $mesTypesChampionnats, 'label' => 'Selectionnez une division']);
    echo $this->Form->button(__("Créer le championnat"));
    echo $this->Form->end();
    echo $this->html->link('Retour à la liste des categories', ['action' => 'index'],['class' => 'button']);
