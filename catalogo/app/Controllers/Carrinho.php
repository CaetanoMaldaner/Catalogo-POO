<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdutoModel;
use App\Models\CarrinhoModel;

class Carrinho extends BaseController
{
    protected $produtoModel;
    protected $carrinhoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
        $this->carrinhoModel = new CarrinhoModel();
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

        $produtoIndex = $this->findProdutoIndex($carrinho, $produtoId);

        if ($produtoIndex !== false) {
            $carrinho[$produtoIndex]['quantidade']++;
        } else {
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
            }
        }

        session()->set('carrinho', $carrinho);

        return redirect()->to('/produtos');
    }

    protected function findProdutoIndex($carrinho, $produtoId)
    {
        foreach ($carrinho as $index => $item) {
            if ($item['produto_id'] == $produtoId) {
                return $index;
            }
        }

        return false;
    }

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
            // Lógica para salvar as informações do carrinho no banco de dados
            foreach ($carrinho as $item) {
                $data = [
                    'user_id' => session('id'),
                    'produto_id' => $item['produto_id'],
                    'quantidade' => $item['quantidade'],
                ];

                // Verificar se o item já existe no carrinho do usuário no banco de dados
                $existingCartItem = $this->carrinhoModel->where('user_id', session('id'))
                    ->where('produto_id', $item['produto_id'])
                    ->first();

                if ($existingCartItem) {
                    // Se o item já existe, atualize a quantidade
                    $data['quantidade'] += $existingCartItem['quantidade'];
                    $this->carrinhoModel->updateCarrinho($existingCartItem['id'], $data);
                } else {
                    // Se o item não existe, insira-o
                    $this->carrinhoModel->insert($data);
                }
            }

            // Limpar o carrinho após a compra
            $this->limparCarrinho();

            return redirect()->to('/carrinho')->with('success', 'Compra realizada com sucesso!');
        }

        return redirect()->to('/carrinho')->with('error', 'Carrinho vazio. Adicione produtos antes de finalizar a compra.');
    }



    public function limparCarrinho()
    {
        session()->remove('carrinho');

        return redirect()->to('/carrinho')->with('success', 'Carrinho limpo com sucesso!');
    }


    public function excluirItem($index)
    {
        $carrinho = session()->get('carrinho');

        // Verifique se o índice existe no carrinho
        if (isset($carrinho[$index])) {
            // Remova o item do carrinho
            unset($carrinho[$index]);

            // Atualize a sessão do carrinho
            session()->set('carrinho', $carrinho);

            return redirect()->to('/carrinho')->with('success', 'Item removido do carrinho com sucesso!');
        }

        return redirect()->to('/carrinho')->with('error', 'Item não encontrado no carrinho.');
    }
}
