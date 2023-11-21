<?php

namespace App\Models;

use CodeIgniter\Model;

class CarrinhoModel extends Model

{
    protected $DBGroup          = 'default';
    protected $table            = 'carrinho';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Carrinho::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'produto_id', 'quantidade'];

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
    

    public function deleteByUserId($userId)
    {
        return $this->where('user_id', $userId)->delete();
    }



    public function salvarItensCarrinho($userId, $carrinho)
    {
        if (!empty($carrinho)) {
            foreach ($carrinho as $item) {
                $data = [
                    'user_id' => $userId,
                    'produto_id' => $item['produto_id'],
                    'quantidade' => $item['quantidade'],
                ];

                // Verificar se o item já existe no carrinho do usuário no banco de dados
                $existingCartItem = $this->where('user_id', $userId)
                    ->where('produto_id', $item['produto_id'])
                    ->first();

                if ($existingCartItem) {
                    // Se o item já existe, atualize a quantidade
                    $data['quantidade'] += $existingCartItem['quantidade'];
                    $this->updateCarrinho($existingCartItem['id'], $data);
                } else {
                    // Se o item não existe, insira-o
                    $this->insert($data);
                }
            }
        }
    }
}
