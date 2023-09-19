<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produtos extends Migration
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
            'nome' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'descricao' => [
                'type' => 'TEXT',
            ],
            'preco' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'imagem' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true, // Pode ser nulo se você estiver lidando com produtos sem imagens.
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true, // Defina como 'false' se você deseja um valor padrão para a data de criação.
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true, // Defina como 'false' se você deseja um valor padrão para a data de atualização.
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('produtos');
    }

    public function down()
    {
        $this->forge->dropTable('produtos');
    }
}
