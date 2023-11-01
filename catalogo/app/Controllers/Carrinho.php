<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Carrinho extends BaseController
{


    public function viewCarrinho()
    {
        // Obtenha o carrinho atual da sessão
        $carrinho = session('carrinho');

        // Use $carrinho para exibir os produtos no carrinho
        return view('carrinho/index', ['carrinho' => $carrinho]);
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
            // Caso contrário, adicione o produto ao carrinho
            $carrinho[$produtoId] = [
                'produto_id' => $produtoId,
                'quantidade' => 1,
            ];
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


    public function clearCarrinho()
    {
        session()->remove('carrinho');

        return redirect()->to('/carrinho');
    }
}
