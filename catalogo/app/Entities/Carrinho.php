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
      
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];


}
