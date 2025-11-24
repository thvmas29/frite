<h1>Tous les championnats </h1>

<?=
/* $this->html->link('Créer une championnat', ['action' => 'add'], ['class' => 'button', 'style' => 'background-color : #266EE5;']); */
$this->html->image("btn_add.png",["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']);
?>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Catégorie</th>
        <th>Division</th>
        <th>Type Championnat</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th> Action </th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de notre $mesArticles, l'affichage des infos des articles -->
    <?php foreach ($mesChampionnats as $championnat): ?>
        <tr>
            <td><?= $championnat->id ?></td>
            <td>
                <?=
                $this->html->link($championnat->nom_championnat, [
                    'controller' => 'championnats',
                    'action' => 'index',
                    $championnat->id]);
                //l’url généré sera de la forme /articles/detail/…
                ?>
            </td>
            
            <td><?= $championnat->category->nom_categorie ?></td>
            <td><?= $championnat->division->name?></td>
            <td><?= $championnat->type_championnat->name ?></td>
            <td><?= $championnat->created->format(DATE_RFC850) ?></td>
            <td><?= $championnat->modified->format(DATE_RFC850) ?></td>

            <td> <?=
                $this->html->link($this->html->image("btn_edit.png"),
                        ['controller' => 'championnats', 
                        'action' => 'edit', $championnat->id, 
                        'style' => 'height:48px;'], 
                        ['escape' => false]);
                ?>
            <?=
                $this->Form->postLink($this->html->image("btn_del.png", ["alt" => "del"]),
                        ['action' => 'delete', $championnat->id],
                        ['confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ", $championnat->nom_championnat, $championnat->id), 'escape' => false]);
                         
                ?> 
            </td>
        </tr>
<?php endforeach; ?>
</table>

