<?php
declare(strict_types=1);

use Migrations\BaseMigration;

class AlterDivisionsAddFkChampionnats extends BaseMigration
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
        $table = $this->table('divisions');
        $table->addColumn('championnat_id', 'integer', [
            'null' => true
        ]);
        $table->update();
        
        $this->execute('UPDATE divisions SET championnat_id = (SELECT id from championnats LIMIT 1)');
        
        $table2 = $this->table('divisions');
        $table2->addForeignKey('championnat_id', 'championnats', 'id');
        $table2->update();
    }
    
    public function down(): void
    {
        $table = $this->table('divisions');
        $table->dropForeignKey('championnat_id');
        $table->removeColumn('championnat_id');
        $table->update();
    }
}
