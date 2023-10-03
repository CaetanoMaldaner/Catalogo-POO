<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categoria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome'];

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

    
      
       public function getCategoriaByNome($categoriaNome)
       {
           return $this->find($categoriaNome);
       }
       
       public function getCategoriaById($categoriaId)
       {
           return $this->find($categoriaId);
       }



       public function createCategoria($data)
        {
        // Verifique se o campo fornecido é válido
        if (!isset($data['nome'])) {
            return false;
        }

        // Crie um array de dados a serem inseridos no banco de dados
        $categoriaData = [
            'nome' => $data['nome'],
        ];

        // Insira os dados no banco de dados
        return $this->insert($categoriaData);
    }

       //Metodos de UPDATE e DELETE retornam true se a alteração for bem sucedida e false caso não seja
   
       public function updateCategoria($categoriaId, $data)
       {
           return $this->update($categoriaId, $data);
       }
 
       public function deleteCategoria($categoriaId)
       {
           return $this->delete($categoriaId);
       } 


}
