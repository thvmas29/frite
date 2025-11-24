<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class InsertCategories extends BaseMigration
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
        $users = $this->table('categories');
        $rows = [
          ['nom_categorie' => 'TestCategorie', 'montant_indemnite' => 123.20, 'created' => date('Y-m-d H:i:s'), 'modified' => date('Y-m-d H:i:s')],
        ];
        $users->insert($rows)->saveData();
    }
    
    public function down(): void
    {
        $this->execute('DELETE from categories');
    }
}
