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

    public function index()
    {
        echo view('welcome_message');
    }

    public function login()
    {
        echo view('login');
    }

    public function register()
    {
        echo view('register');
    }


    public function authenticate()
    {
        
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        
        return ($this->userService->authenticate($email, $senha)) ? redirect()->to('/welcome_message') : redirect()->back();
    }


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


        return view('auth/create_user_form');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
