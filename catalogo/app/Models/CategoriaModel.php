<?php

namespace App\Models;

use App\Entities\Categoria;
use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categoria';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = Categoria::class;
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['nome'];

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

        if (!isset($data['nome'])) {
            return false;
        }


        $categoriaData = [
            'nome' => $data['nome'],
        ];


        return $this->insert($categoriaData);
    }



    public function updateCategoria($categoriaId, $data)
    {
        return $this->update($categoriaId, $data);
    }

    public function deleteCategoria($categoriaId)
    {
        return $this->delete($categoriaId);
    }
}
