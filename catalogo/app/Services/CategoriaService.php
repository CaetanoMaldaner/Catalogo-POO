<?php

namespace App\Services;

use App\Entities\Categoria;
use App\Models\CategoriaModel;

class CategoriaService
{
    protected $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new CategoriaModel();
    }

    public function createCategoria($data)
    {
        $categoria = new Categoria($data);
        $this->categoriaModel->insert($categoria);
    }
}
