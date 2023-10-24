<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoriaModel;
use App\Models\ProdutoModel;
use App\Services\ProdutoService;
use CodeIgniter\Config\Factories;

class ProdutoController extends BaseController
{

    private $produtoService;

    public function __construct()
    {
        $this->produtoService = Factories::class(ProdutoService::class);
    }

    public function index()
    {
        $produtoModel = new ProdutoModel();

        $data['produtos'] = $produtoModel->findAll();

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


    public function create()
    {
        $categoriaModel = new CategoriaModel();
        $data = [
            'categorias' =>  $categoriaModel->findAll()
        ];
        return view('produto/create', $data);
    }

    public function store()
    {
        if ($this->request->getPost()) {
            $data = $this->request->getPost();
            $image = $this->request->getFile('imagem');

            if ($this->produtoService->createProduct($data)) {
                // Primeiro, mova a imagem original
                $originalName = $this->produtoService->moveImage($image);

                // Agora, renomeie e mova a imagem com um novo nome baseado no timestamp
                $newName = $this->produtoService->renameImage($originalName);
                $this->produtoService->moveImage($image, $newName);
            }
        }

        return redirect()->to('/produtos');
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
