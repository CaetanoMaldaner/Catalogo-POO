<?php

namespace App\Controllers;

use App\Models\CategoriaModel;
use CodeIgniter\Controller;

class CategoriaController extends BaseController
{
    public function create()
    {
        return view('categorias/create');
    }

    public function store()
    {
        $nome = $this->request->getPost('nome');
        
        if (!empty($nome)) {
            $categoriaModel = new CategoriaModel();
            $data = [
                'nome' => $nome
            ];
            $categoriaModel->insert($data);
        }

        return redirect()->to('/categorias/create');
    }
}
