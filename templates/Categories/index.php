<h1>Toutes les catégories</h1>

<?=
/* $this->html->link('Créer une categorie', ['action' => 'add'], ['class' => 'button', 'style' => 'background-color : #266EE5;']); */
$this->html->image("btn_add.png",["alt" => "Add", 'url' => ['action' => 'add'], 'style' => 'height:48px;']);
?>

<table>
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Montant d'indémnité</th>
        <th>Date de création</th>
        <th>Date de modification</th>
        <th> Action </th>
    </tr>

    <!-- Ici se trouve l'itération sur l'objet query de notre $mesArticles, l'affichage des infos des articles -->
    <?php foreach ($mesCategories as $categorie): ?>
        <tr>
            <td><?= $categorie->id ?></td>
            <td>
                <?=
                $this->html->link($categorie->nom_categorie, [
                    'controller' => 'categories',
                    'action' => 'index',
                    $categorie->id]);
                //l’url généré sera de la forme /articles/detail/…
                ?>
            </td>
            
            <td><?= $categorie->montant_indemnite ?></td>
            <td><?= $categorie->created->format(DATE_RFC850) ?></td>
            <td><?= $categorie->modified->format(DATE_RFC850) ?></td>

            <td> <?=
                $this->html->link($this->html->image("btn_edit.png"),
                        ['controller' => 'categories', 
                        'action' => 'edit', $categorie->id, 
                        'style' => 'height:48px;'], 
                        ['escape' => false]);
                ?>
            <?=
                $this->Form->postLink($this->html->image("btn_del.png", ["alt" => "del"]),
                        ['action' => 'delete', $categorie->id],
                        ['confirm' => __("Vraiment supprimer {0} dont l'id vaut {1} ", $categorie->nom_categorie, $categorie->id), 'escape' => false]);
                         
                ?> 
            </td>
        </tr>
<?php endforeach; ?>
</table>

