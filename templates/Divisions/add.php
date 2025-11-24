<h1>Ajouter une division</h1>
<?php
    echo $this->Form->create($laDivision);
    echo $this->Form->control('name');
    echo $this->Form->button(__("Créer la division"));
    echo $this->Form->end();
    echo $this->html->link('Retour à la liste des divisions', ['action' => 'index'],['class' => 'button']);
