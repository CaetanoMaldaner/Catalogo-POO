<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoModel extends Model

{
    protected $DBGroup          = 'default';
    protected $table            = 'produtos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome','descricao','preco','imagem','categoria_id'];

    // Dates
    protected $useTimestamps = false;
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

    //METODOS

    // Método para buscar um produto por ID
    public function getProdutoById($produtoId)
    {
        return $this->find($produtoId);
    }

    // Método para buscar um produto por preço
    public function getProdutoByPreco($produtoPreco)
    {
        //'preco' é o campo da tabela q ele vai comparar com o valor inserido em $produtoPreco
        return $this->where('preco', $produtoPreco)->findAll();
    }

    // Método para buscar um produto por categoria
    public function getProdutoByCategoria($produtoCategoria)
    {
    return $this->where('categoria', $produtoCategoria)->findAll();
    }


    //Metodos de UPDATE e DELETE retornam true se a alteração for bem sucedida e false caso não seja

    public function createProduct($data)
    {
        // Verifique se os campos fornecidos são válidos
        if (!isset($data['nome'], $data['descricao'], $data['preco'], $data['imagem'], $data['categoria_id'])) {
            return false;
        }

        // Crie um array de dados a serem inseridos no banco de dados
        $productData = [
            'nome'         => $data['nome'],
            'descricao'    => $data['descricao'],
            'preco'        => $data['preco'],
            'imagem'       => $data['imagem'],
            'categoria_id' => $data['categoria_id'],
        ];

        // Insira os dados no banco de dados
        return $this->insert($productData);
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
