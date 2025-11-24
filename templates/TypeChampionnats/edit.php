<h1>Modifier le type "<?= $leTypeDeChampionnat->name ?>" (id = <?= $leTypeDeChampionnat->id ?>)</h1>
<?php
    echo $this->Form->create($leTypeDeChampionnat);
    echo $this->Form->control('name');
    echo $this->Form->button(__("Mettre à jour le type de championnat"));
    echo $this->Form->end();
?>
<br/>

<?=
$this->html->link('Retour aux types de championnats',
        ['action' => 'index'],
        ['class' => 'button']);
?>