<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Services\UserService;
use CodeIgniter\Config\Factories;
use App\Models\UserModel;

class Auth extends BaseController
{

    private $userService;

    public function __construct()
    {
        $this->userService = Factories::class(UserService::class);
    }

    public function login()
    {
        echo view('login');
    }

    public function register()
    {
        echo view('register');
    }


    //Metodo de Autenticação do Usuario

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('password');

        if ($this->userService->authenticate($email, $senha)) {
            return redirect()->to('/produtos');
        } else {
            return redirect()->to('/login');
        }
    }

    //Metodo de Criação do Usuario

    public function create()
    {

        if ($this->request->getPost()) {

            $data = [
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $userModel = new UserModel();

            if ($userModel->insert($data)) {

                return redirect()->to('/');
            } else {

                return redirect()->back()->with('error', 'Erro ao criar usuário');
            }
        }


        return view('login');
    }

    //Metodo para Deslogar e Destruir a Sessão do Usuario

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }



    public function perfil()
    {
        $data['user'] = $this->userService->getUserById(session()->get('id'));
        echo view('perfil', $data);
    }



    public function updatePerfil()
    {
        $userId = session()->get('id');
        $user = $this->userService->getUserById($userId);
    
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('password');
    
        // Validação de Senha Atual
        if (empty($currentPassword) || !password_verify($currentPassword, $user->password)) {
            return redirect()->to('/perfil')->with('error', 'Senha atual incorreta.');
        }
    
        // Validação de Nova Senha
        $data = [];
        if (!empty($newPassword)) {
            $data['password'] = password_hash($newPassword, PASSWORD_BCRYPT);
        }
    
        // Atualização do Perfil
        try {
            $this->userService->updateUser($userId, $data);
            return redirect()->to('/perfil')->with('success', 'Perfil atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->to('/perfil')->with('error', 'Erro ao atualizar o perfil. Tente novamente mais tarde.');
        }
    }



    public function deletePerfil()
    {

        $this->userService->deleteUser(session()->get('id'));

        $this->logout();

        return redirect()->to('/')->with('success', 'Conta excluída com sucesso!');
    }
}
