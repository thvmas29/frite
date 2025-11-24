<h1>Modifier la division "<?= $laDivision->name ?>" (id = <?= $laDivision->id ?>)</h1>
<?php
    echo $this->Form->create($laDivision);
    echo $this->Form->control('name');
    echo $this->Form->button(__("Mettre à jour la division"));
    echo $this->Form->end();
?>
<br/>

<?=
$this->html->link('Retour aux divisions',
        ['action' => 'index'],
        ['class' => 'button']);
?>