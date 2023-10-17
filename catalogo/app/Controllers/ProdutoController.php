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


    public function createProduto()
    {
        return view('produto/create');
    }

    public function storeProduto()
    {
        $produtoModel = new ProdutoModel();

        $data = [
            'nome'         => $this->request->getPost('nome'),
            'descricao'    => $this->request->getPost('descricao'),
            'preco'        => $this->request->getPost('preco'),
            'imagem'       => $this->request->getPost('imagem'),
            'categoria_id' => $this->request->getPost('categoria_id'),
        ];

        $produtoModel->createProduct($data);

        return redirect()->to('/produtos'); // Redirecionar para a lista de produtos
    }

    public function editProduto($id)
    {
        $produtoModel = new ProdutoModel();

        $data['produto'] = $produtoModel->find($id);

        if (empty($data['produto'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produto não encontrado.');
        }

        return view('produto/edit', $data);
    }

    public function updateProduto($id)
    {
        $produtoModel = new ProdutoModel();

        $data = [
            'nome'         => $this->request->getPost('nome'),
            'descricao'    => $this->request->getPost('descricao'),
            'preco'        => $this->request->getPost('preco'),
            'imagem'       => $this->request->getPost('imagem'),
            'categoria_id' => $this->request->getPost('categoria_id'),
        ];

        $produtoModel->updateProduct($id, $data);

        return redirect()->to('/produtos'); // Redirecionar para a lista de produtos
    }

    public function deleteProduto($id)
    {
        $produtoModel = new ProdutoModel();
        $produtoModel->deleteProduct($id);

        return redirect()->to('/produtos'); // Redirecionar para a lista de produtos
    }

}
