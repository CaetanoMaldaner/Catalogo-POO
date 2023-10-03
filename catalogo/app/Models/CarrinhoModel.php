<?php

namespace App\Models;

use CodeIgniter\Model;

class CarrinhoModel extends Model

{
    protected $DBGroup          = 'default';
    protected $table            = 'carrinho';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','produto_id','quantidade'];

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

    
    public function getCarrinhoByUserId($user_id)
    {
        return $this->find($user_id);
    }

    
    public function getCarrinhoByProdutoId($produto_id)
    {
      
        return $this->where('produto_id', $produto_id)->findAll();
    }

    
    public function getCarrinhoByQuantidade($carrinhoQuantidade)
    {
    return $this->where('quantidade', $carrinhoQuantidade)->findAll();
    }


    public function createCarrinho($data)
    {
        // Verifique se os campos fornecidos são válidos
        if (!isset($data['user_id'], $data['produto_id'], $data['quantidade'])) {
            return false;
        }

        // Crie um array de dados a serem inseridos no banco de dados
        $carrinhoData = [
            'user_id'    => $data['user_id'],
            'produto_id' => $data['produto_id'],
            'quantidade' => $data['quantidade'],
        ];

        // Insira os dados no banco de dados
        return $this->insert($carrinhoData);
    }


    //Metodos de UPDATE e DELETE retornam true se a alteração for bem sucedida e false caso não seja

    public function updateCarrinho($carrinhoId, $data)
    {
        return $this->update($carrinhoId, $data);
    }


    public function deleteCarrinho($carrinhoId)
    {
        return $this->delete($carrinhoId);
    }

}
