<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class CreateChampionnats extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('championnats');
        $table->addColumn('nom_championnat', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        
        $table->addColumn('num_categorie_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('num_division_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('num_type_championnat_id', 'integer', [
            'null' => false
        ]);
        
        $table->addForeignKey('num_categorie_id', 'categories', 'id');
        $table->addForeignKey('num_division_id', 'divisions', 'id');
        $table->addForeignKey('num_type_championnat_id', 'type_championnats', 'id');
        $table->create();
    }
}
