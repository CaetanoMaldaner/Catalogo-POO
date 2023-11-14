<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;
use App\Models\CarrinhoModel; // Adicione a inclusão do modelo de carrinho

class Carrinho extends BaseController
{
    protected $produtoModel;
    protected $carrinhoModel; // Adicione a propriedade de modelo de carrinho

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
        $this->carrinhoModel = new CarrinhoModel(); // Instancie o modelo de carrinho
    }

    public function viewCarrinho()
    {
        $carrinho = session('carrinho');
        $totalCarrinho = $this->calcularTotalCarrinho($carrinho);

        return view('carrinho/index', ['carrinho' => $carrinho, 'totalCarrinho' => $totalCarrinho]);
    }

    public function addToCarrinho($produtoId)
    {
        $carrinho = session('carrinho');

        if (!is_array($carrinho)) {
            $carrinho = [];
        }

        $produtoInfo = $this->produtoModel->find($produtoId);

        if ($produtoInfo) {
            $produtoArray = $produtoInfo->toArray();

            $itemCarrinho = [
                'produto_id' => $produtoId,
                'nome' => $produtoArray['nome'],
                'quantidade' => 1,
                'preco' => $produtoArray['preco'],
            ];

            $carrinho[] = $itemCarrinho;

            // Atualize o carrinho na sessão
            session()->set('carrinho', $carrinho);
        }

        return redirect()->to('/produtos');
    }

    // Adicione este método para calcular o total do carrinho
    protected function calcularTotalCarrinho($carrinho)
    {
        $totalCarrinho = 0;

        if (!empty($carrinho)) {
            foreach ($carrinho as $produto) {
                $subtotal = $produto['quantidade'] * $produto['preco'];
                $totalCarrinho += $subtotal;
            }
        }

        return $totalCarrinho;
    }

    
    public function finalizarCompra()
    {
        $carrinho = session('carrinho');

        if (!empty($carrinho)) {
            // Lógica para salvar as informações do carrinho no banco de dados (use o modelo de carrinho)
            foreach ($carrinho as $item) {
                $data = [
                    'user_id' => session('id'), // Id do usuário logado
                    'produto_id' => $item['produto_id'],
                    'quantidade' => $item['quantidade'],
                ];

                $this->carrinhoModel->insert($data);
            }

            // Limpar o carrinho após a compra
            session()->remove('carrinho');

            return redirect()->to('/carrinho')->with('success', 'Compra realizada com sucesso!');
        }

        return redirect()->to('/carrinho')->with('error', 'Carrinho vazio. Adicione produtos antes de finalizar a compra.');
    }
}
