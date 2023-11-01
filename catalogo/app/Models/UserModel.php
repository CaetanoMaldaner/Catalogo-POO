<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Entities\User;


class UserModel extends Model

{

    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = User::class;
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['email', 'password', 'created_at'];

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

    // Método para buscar um usuário por ID
    public function getUserById($userId)
    {
        return $this->find($userId);
    }

    // Método para buscar um usuário por email
    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function deleteUser($userId)

    {
    $userModel = new UserModel();
    return $userModel->delete($userId);

    }


}