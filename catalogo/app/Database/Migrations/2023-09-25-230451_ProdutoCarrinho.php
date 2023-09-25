<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProdutoCarrinho extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true, 
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        
    $this->forge->addKey('id', true);
    $this->forge->addForeignKey('produto_id', 'produtos', 'id');
    $this->forge->createTable('produto_carrinho');
      
    }
    public function down()
    {
        $this->forge->dropTable('produto_carrinho');
    }
}