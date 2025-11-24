<h1>Ajouter un type de championnat</h1>
<?php
    echo $this->Form->create($leTypeDeChampionnat);
    echo $this->Form->control('name');
    echo $this->Form->button(__("Créer le type de championnat"));
    echo $this->Form->end();
    echo $this->html->link('Retour à la liste des types de championnats', ['action' => 'index'],['class' => 'button']);
