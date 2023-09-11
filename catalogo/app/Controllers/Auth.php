<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function index()
    {
        helper('form');
        echo view('login');
    }

    public function authenticate(){
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
   
        $user = $userModel->getUser($email);
     
        if($user && ($senha == $user['password'])){
            session()->set('isLoggedIn', true);
            return redirect()->to('/dashboard');
        }else{
            session()->setFlashdata('error', 'Usuário inválido');
            return redirect()->back();
        }
    }

    public function logout(){
        session()->destroy();
        return redirect()->to('/');
    }
}
