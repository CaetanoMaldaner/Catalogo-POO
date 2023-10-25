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

//
    public function updateCarrinho($carrinhoId, $data)
    {
        return $this->update($carrinhoId, $data);
    }


    public function deleteCarrinho($carrinhoId)
    {
        return $this->delete($carrinhoId);
    }

}
