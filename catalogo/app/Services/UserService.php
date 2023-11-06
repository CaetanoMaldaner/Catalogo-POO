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

        $variavelDeSessao = [
            'id' => $user->id,
            'adm' => $user->adm,
            'email' => $email,
        ];
 
        session()->set('variavelDeSessao', $variavelDeSessao);
    
        // Verificar se a senha fornecida corresponde à senha no banco de dados
        if($user && password_verify($senha, $user->password)){
            return true;
        } else {
            // Usuário não encontrado ou senha incorreta
            return false;
        }
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

?>
