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

        // Verifique se a requisição é POST para processar a atualização
        if ($this->request->getMethod() === 'post') {
            $data = [
                'nome'         => $this->request->getPost('nome'),
                'descricao'    => $this->request->getPost('descricao'),
                'preco'        => $this->request->getPost('preco'),
                'categoria_id' => $this->request->getPost('categoria_id'),
            ];

            // Lógica para processar a atualização do produto
            $produtoModel->updateProduct($id, $data);

            // Redirecione após a edição    
            return redirect()->to('/produtos');
        }

        // Se não for um pedido POST, continue com a lógica original para exibir o formulário de edição
        $data['produto'] = $produtoModel->find($id);

        if (empty($data['produto'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produto não encontrado.');
        }

        return view('produto/edit', $data);
    }



    public function updateProduto($id)
    {
        $produtoModel = new ProdutoModel();

        // Obtenha os dados do formulário
        $data = [
            'nome'         => $this->request->getPost('nome'),
            'descricao'    => $this->request->getPost('descricao'),
            'preco'        => $this->request->getPost('preco'),
            'categoria_id' => $this->request->getPost('categoria_id'),
        ];

        // Atualize os dados do produto
        $produtoModel->updateProduto($id, $data);

        // Lida com a imagem, se fornecida
        $imagem = $this->request->getFile('imagem');
        if ($imagem->isValid() && !$imagem->hasMoved()) {
            $imageName = $this->produtoService->moveImage($imagem, $data['nome']);
            $produtoModel->updateProdutoImagem($id, $imageName);
        }

        return redirect()->to('/produtos'); // Redirecionar para a lista de produtos
    }

    public function delete($id)
    {
        $produtoModel = new ProdutoModel();
        $produtoModel->delete($id);

        return redirect()->to('/produtos');
    }
}
