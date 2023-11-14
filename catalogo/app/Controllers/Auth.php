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
       
        $data = [
            'email' => $this->request->getPost('email'),
        ];

        // Se uma nova senha foi fornecida, aplique o hash
        $newPassword = $this->request->getPost('password');
        if (!empty($newPassword)) {
            $data['password'] = password_hash($newPassword, PASSWORD_BCRYPT);
        }

       
        $this->userService->updateUser(session()->get('id'), $data);

        return redirect()->to('/perfil')->with('success', 'Perfil atualizado com sucesso!');
    }


    public function deletePerfil()
    {

        $this->userService->deleteUser(session()->get('id'));

        $this->logout();

        return redirect()->to('/')->with('success', 'Conta excluída com sucesso!');
    }
}
