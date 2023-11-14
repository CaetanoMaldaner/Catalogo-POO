<?php

namespace App\Models;

use App\Entities\Produto;
use CodeIgniter\Model;

class ProdutoModel extends Model

{
    protected $DBGroup          = 'default';
    protected $table            = 'produtos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Produto::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome', 'descricao', 'preco', 'imagem', 'categoria_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function getProdutoById($produtoId)
    {
        return $this->find($produtoId);
    }


    public function getProdutoByPreco($produtoPreco)
    {
        //'preco' é o campo da tabela q ele vai comparar com o valor inserido em $produtoPreco
        return $this->where('preco', $produtoPreco)->findAll();
    }


    public function getProdutoByCategoria($produtoCategoria)
    {
        return $this->where('categoria', $produtoCategoria)->findAll();
    }

    public function updateProduto($produtoId, $data)
    {
        return $this->update($produtoId, $data);
    }


    public function deleteProduto($produtoId)
    {
        return $this->delete($produtoId);
    }
}
