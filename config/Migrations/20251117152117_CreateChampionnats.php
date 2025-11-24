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
        
        $table->addColumn('category_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('division_id', 'integer', [
            'null' => false
        ]);
        $table->addColumn('type_championnat_id', 'integer', [
            'null' => false
        ]);
        
        $table->addColumn('created', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('modified', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        
        $table->addForeignKey('category_id', 'categories', 'id');
        $table->addForeignKey('division_id', 'divisions', 'id');
        $table->addForeignKey('type_championnat_id', 'type_championnats', 'id');
        $table->create();
    }
}
