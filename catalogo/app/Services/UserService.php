<?php

namespace App\Services;

use CodeIgniter\Config\Factories;
use App\Models\UserModel;

class UserService
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = Factories::models(UserModel::class);
    }

    public function authenticate($email, $senha)
    {
        // Buscar o usuário pelo email
        $user = $this->userModel->getUserByEmail($email);

        // Verificar se o usuário foi encontrado e se a senha corresponde
        if ($user && password_verify($senha, $user->password)) {
            // Recupere o valor do campo 'adm' diretamente do banco de dados
            $isAdmin = $user->adm;

            // Se o usuário for autenticado com sucesso, cria a sessão
            $sessionData = [
                'id'    => $user->id,
                'email' => $user->email,
                'isAdmin' => $isAdmin, // Adicione um campo 'isAdmin' com base no valor do campo 'adm' no banco 
            ];

            // Armazene os dados na sessão
            session()->set($sessionData);

            return true;
        } else {
            // Usuário não encontrado ou senha incorreta
            return false;
        }
    }



    
    public function createUser($data)
    {
        return $this->userModel->createUser($data);
    }

    
    public function updateUser($userId, $data)
    {
        return $this->userModel->updateUser($userId, $data);
    }

   
    public function deleteUser($userId)
    {
        return $this->userModel->deleteUser($userId);
    }

    
    public function getUserById($userId)
    {
        return $this->userModel->getUserById($userId);
    }

   
    public function getUserByEmail($email)
    {
        return $this->userModel->getUserByEmail($email);
    }
}
