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
            $imagem = $this->request->getFile('imagem');

            // Validação de imagem e salvamento
            if ($imagem->isValid() && !$imagem->hasMoved()) {
                $caminho = FCPATH . '/imgs';

                if (!is_dir($caminho)) {
                    mkdir($caminho, 0777, true);
                }

                $nomeImagem = time() . '_' . $imagem->getName();
                $imagem->move($caminho, $nomeImagem);

                $data['imagem'] = $nomeImagem;

                // Agora, você também precisa incluir a categoria_id selecionada no $data.
                $data['categoria_id'] = $this->request->getPost('categoria_id');

                // Chame createProduct com ambos os argumentos
                $this->produtoService->createProduct($data, $nomeImagem);
            } else {
                // Lida com erros de imagem aqui, se necessário.
            }
        }

        return redirect()->to('/produtos');
    }



    public function edit($id)
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

    public function delete($id)
    {
        $produtoModel = new ProdutoModel();
        $produtoModel->delete($id);

        return redirect()->to('/produtos');
    }
}
