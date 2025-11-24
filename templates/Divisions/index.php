<h1>Toutes les divisions</h1>

<?=
/* $this->html->link('Créer une division', ['action' => 'add'], ['class' => 'button', 'style' => 'background-color : #266EE5;']); */
$this->html->image("btn_add.png",["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']);
?>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <!-- <th>Créer par</th> -->
        <th>Date de création</th>
        <th>Date de modification</th>
        <th> Action </th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de notre $mesArticles, l'affichage des infos des articles -->
    <?php foreach ($mesDivisions as $division): ?>
        <tr>
            <td><?= $division->id ?></td>
            <td>
                <?=
                $this->html->link($division->name, [
                    'controller' => 'divisions',
                    'action' => 'index',
                    $division->id]);
                //l’url généré sera de la forme /articles/detail/…
                ?>
            </td>
            
            <!-- <td>< ?= $division->name ? ></td> -->
            <td><?= $division->created->format(DATE_RFC850) ?></td>
            <td><?= $division->modified->format(DATE_RFC850) ?></td>

            <td> <?=
                $this->html->link($this->html->image("btn_edit.png", ["alt" => "edit"]),
                        ['url' => ['action' => 'edit', $division->id], 
                        'style' => 'height:48px;'], 
                        ['escape' => false]);
                ?>
            <?=
                $this->Form->postLink($this->html->image("btn_del.png", ["alt" => "del"]),
                        ['action' => 'delete', $division->id],
                        ['confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ", $division->name, $division->id), 'escape' => false]);
                         
                ?> 
            </td>
        </tr>
<?php endforeach; ?>
</table>

