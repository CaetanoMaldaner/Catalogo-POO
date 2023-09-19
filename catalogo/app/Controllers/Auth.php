<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Services\UserService;
use CodeIgniter\Config\Factories;

class Auth extends BaseController
{

    private $userService;

    public function __construct()
    {
        $this->userService = Factories::class(UserService::class);
    }

    public function index()
    {
        echo view('dashboard');
    }

    public function register()
    {
        echo view('register');
    }

    public function authenticate(){
       
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
        
        return ($this->userService->authenticate($email, $senha)) ? redirect()->to('/dashboard') : redirect()->back();

    }

    public function createUser(){



    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}