<?php
namespace App\Services;

use App\Entities\User;
use App\Models\UserModel;

class UserService
{
    protected $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    // Método para criar um novo usuário
    public function createUser($data)
    {
        return $this->userModel->createUser($data);
    }

    // Método para atualizar um usuário
    public function updateUser($userId, $data)
    {
        return $this->userModel->updateUser($userId, $data);
    }

    // Método para deletar um usuário
    public function deleteUser($userId)
    {
        return $this->userModel->deleteUser($userId);
    }

    // Método para buscar um usuário por ID
    public function getUserById($userId)
    {
        return $this->userModel->getUserById($userId);
    }

    // Método para buscar um usuário por email
    public function getUserByEmail($email)
    {
        return $this->userModel->getUserByEmail($email);
    }
}
