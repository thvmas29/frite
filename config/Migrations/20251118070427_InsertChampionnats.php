<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class InsertChampionnats extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     *
     * @return void
     */
    public function up(): void
    {
        $users = $this->table('championnats');
        $rows = [
          ['nom_championnat' => 'LeGrandChampionnat', 'num_categorie_id' => 1, 'num_division_id' => 3, 'num_type_championnat_id' => 2] 
        ];
        $users->insert($rows)->saveData();
    }
    
    public function down(): void
    {
        $this->execute('DELETE from championnats');
    }
}
