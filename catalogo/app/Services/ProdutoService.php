<?php
namespace App\Services;

use App\Entities\Produto;
use App\Models\ProdutoModel;

class ProdutoService
{
    protected $produtoModel;

    public function __construct()
    {
        $this->produtoModel = new ProdutoModel();
    }

        //Metodos de UPDATE e DELETE retornam true se a alteração for bem sucedida e false caso não seja

        public function createProduct($data)
        {
            // logica da imagem
            $produto = new Produto($data);
           
            // Insira os dados no banco de dados
            return $this->produtoModel->insert($produto);
        }

    
}
