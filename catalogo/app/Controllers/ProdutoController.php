<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;

class ProdutoController extends BaseController
{
    public function index()
    {
        $produtoModel = new ProdutoModel();

        $data['produto'] = $produtoModel->findAll();

        return view('produto/index', $data);
    }

    public function show($id)
    {
        $produtoModel = new ProdutoModel();

        $data['produto'] = $produtoModel->find($id);

        if (empty($data['produto'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produto não encontrado.');
        }

        return view('produto/show', $data);
    }

    
}
