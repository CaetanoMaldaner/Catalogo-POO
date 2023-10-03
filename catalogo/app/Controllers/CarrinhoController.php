<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class CarrinhoController extends BaseController
{
    public function index()
    {
        echo "Página do Carrinho de Compras";
    }


public function addToCart($productId)
    {
        echo "Produto adicionado ao carrinho com ID: " . $productId;
    }

public function removeFromCart($productId)
    {
        echo "Produto removido do carrinho com ID: " . $productId;
    }

    public function checkout()
    {
        echo "Página de Checkout";
    }
}
