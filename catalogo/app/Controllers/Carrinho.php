<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;

class Carrinho extends BaseController
{

    protected $produtoModel; // Variável para armazenar o modelo de produto

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel(); // Carregue o modelo de produto
    }


    public function viewCarrinho()
    {
        // Obtenha o carrinho atual da sessão
        $carrinho = session('carrinho');

        // Inicialize o total do carrinho como zero
        $totalCarrinho = 0;

        // Verifique se o carrinho não está vazio
        if (!empty($carrinho)) {
            foreach ($carrinho as $produto) {
                // Calcula o subtotal de cada produto no carrinho
                $subtotal = $produto['quantidade'] * $produto['preco'];
                $totalCarrinho += $subtotal;
            }
        }

        // Passe o carrinho e o total para a visão
        return view('carrinho/index', ['carrinho' => $carrinho, 'totalCarrinho' => $totalCarrinho]);
    }


    public function addToCarrinho($produtoId)
    {

        // Verifique se o carrinho do usuário já existe na sessão
        if (!session()->has('carrinho')) {
            // Se não existir, crie um carrinho vazio
            session()->set('carrinho', []);
        }

        // Obtenha o carrinho atual da sessão
        $carrinho = session('carrinho');

        // Verifique se o produto já existe no carrinho
        if (isset($carrinho[$produtoId])) {
            // Se o produto já estiver no carrinho, aumente a quantidade
            $carrinho[$produtoId]['quantidade']++;
        } else {
            // Caso contrário, adicione o produto ao carrinho com as informações, incluindo o preço e o nome
            // Obtenha as informações do produto, incluindo o preço e o nome, do seu modelo de produto
            $produtoInfo = $this->produtoModel->find($produtoId);

            if ($produtoInfo) {
                // Converta o objeto da entidade do modelo em um array associativo
                $produtoArray = $produtoInfo->toArray();

                $carrinho[$produtoId] = [
                    'produto_id' => $produtoId,
                    'nome' => $produtoArray['nome'], // Adicione o nome do produto
                    'quantidade' => 1,
                    'preco' => $produtoArray['preco'],
                ];
            }
        }

        // Atualize o carrinho na sessão
        session()->set('carrinho', $carrinho);

        return redirect()->to('/produtos'); // Redirecione de volta para a página de produtos
    }


    public function removeFromCarrinho($produtoId)
    {
        $carrinho = session('carrinho');

        if (isset($carrinho[$produtoId])) {
            unset($carrinho[$produtoId]);
        }

        session()->set('carrinho', $carrinho);

        return redirect()->to('/carrinho');
    }

    public function limparCarrinho()
    {
        // Limpar o carrinho
        session()->remove('carrinho');

        // Redirecionar de volta à página do carrinho
        return redirect()->to('produtos');
    }




    public function clearCarrinho()
    {
        session()->remove('carrinho');

        return redirect()->to('/carrinho');
    }
}
