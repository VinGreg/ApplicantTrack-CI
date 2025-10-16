<?php
namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePelamar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'lulus_dari' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'ipk' => [
                'type' => 'FLOAT',
            ],
            'catatan_portfolio' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pelamar');
    }

    public function down()
    {
        $this->forge->dropTable('pelamar');
    }
}
