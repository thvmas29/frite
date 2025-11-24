<h1>Ajouter une categorie</h1>
<?php
    echo $this->Form->create($laCategorie);
    echo $this->Form->control('nom_categorie');
    echo $this->Form->control('montant_indemnite');
    echo $this->Form->button(__("Créer la catégorie"));
    echo $this->Form->end();
    echo $this->html->link('Retour à la liste des categorie', ['action' => 'index'],['class' => 'button']);
