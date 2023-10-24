<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Carrinho extends Entity
{
       
    protected $datamap = [];
    protected $attributes = [
        'id' => null,
        'user_id' => null,
        'produto_id' => null,
        'quantidade' => null,
        'created_at' => null,
        'updated_at' => null,
        'deleted_at' => null,
    ];

    
   

}
