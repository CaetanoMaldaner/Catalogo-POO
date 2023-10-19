<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Produto extends Entity
{
    protected $datamap = [];
    protected $attributes = [
        'id' => null,
        'categoria_id' => null,
        'nome' => null,
        'descricao' => null,
        'preco' => null,
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];

}
