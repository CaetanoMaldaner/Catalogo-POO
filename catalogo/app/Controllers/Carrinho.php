<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Carrinho extends BaseController
{
    public function index()
    {
        echo "Página do Carrinho de Compras";
    }

    public function addToCarrinho($produtoId)
    {
        echo "Produto adicionado ao carrinho: " . $produtoId;
    }

    public function removeFromCarrinho($produtoId)
    {
        echo "Produto removido do carrinho: " . $produtoId;
    }

    public function clearCarrinho()
    {
        echo "Carrinho de compras foi limpo";
    }
}
