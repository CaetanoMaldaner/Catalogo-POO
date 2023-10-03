<?php

namespace App\Models;

use CodeIgniter\Model;

class PedidoModel extends Model

{
    protected $DBGroup          = 'default';
    protected $table            = 'pedidos';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id','total','status'];

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

      
       public function getPedidoByUserId($user_id)
       {
           return $this->find($user_id);
       }
   
       
       public function getPedidoByValorTotal($pedidoValorTotal)
       {
         
           return $this->where('total', $pedidoValorTotal)->findAll();
       }
   
       
       public function getPedidoByStatus($pedidoStatus)
       {
       return $this->where('status', $pedidoStatus)->findAll();
       }

       
       //Metodos de UPDATE e DELETE retornam true se a alteração for bem sucedida e false caso não seja

   
       public function createPedido($data)
        {
        // Verifique se os campos fornecidos são válidos
        if (!isset($data['user_id'], $data['total'], $data['status'])) {
            return false;
        }

        // Crie um array de dados a serem inseridos no banco de dados
        $pedidoData = [
            'user_id' => $data['user_id'],
            'total'   => $data['total'],
            'status'  => $data['status'],
        ];

        // Insira os dados no banco de dados
        return $this->insert($pedidoData);
    }
   
       public function updatePedido($pedidoId, $data)
       {
           return $this->update($pedidoId, $data);
       }
   

       public function deletePedido($pedidoId)
       {
           return $this->delete($pedidoId);
       }
   

}
