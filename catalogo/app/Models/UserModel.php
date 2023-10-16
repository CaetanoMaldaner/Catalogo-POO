<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model

{

    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
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

    //Metodos de UPDATE e DELETE retornam true se a alteração for bem sucedida e false caso não seja

    public function createUser($data)
    {
        // Verifique se os campos fornecidos são válidos
        if (!isset($data['email'], $data['password'])) {
            return false;
        }

        // Crie um array de dados a serem inseridos no banco de dados
        $userData = [
            'email'    => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT), 
        ];

        // Insira os dados no banco de dados
        return $this->insert($userData);
    }

    // Método para atualizar um usuário por ID
    public function updateUser($userId, $data)
    {
        return $this->update($userId, $data);
    }

    // Método para deletar um usuário por ID
    public function deleteUser($userId)
    {
        return $this->delete($userId);
    }


}