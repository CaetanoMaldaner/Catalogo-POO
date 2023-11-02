<?php

namespace App\Services;

use App\Models\CarrinhoModel;

class CarrinhoService
{
    protected $carrinhoModel;
    
    public function __construct()
    {
        $this->carrinhoModel = new CarrinhoModel();
    }

    public function getCarrinhoByUserId($user_id)
    {
        return $this->carrinhoModel->find($user_id);
    }

    public function getCarrinhoByProdutoId($produto_id)
    {
        return $this->carrinhoModel->where('produto_id', $produto_id)->findAll();
    }

    public function getCarrinhoByQuantidade($carrinhoQuantidade)
    {
        return $this->carrinhoModel->where('quantidade', $carrinhoQuantidade)->findAll();
    }

    public function createCarrinho($data)
    {
        return $this->carrinhoModel->createCarrinho($data);
    }

    public function updateCarrinho($carrinhoId, $data)
    {
        return $this->carrinhoModel->updateCarrinho($carrinhoId, $data);
    }

    public function deleteCarrinho($carrinhoId)
    {
        return $this->carrinhoModel->deleteCarrinho($carrinhoId);
    }
}
