<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function create()
    {

    }

    public function store()
    {

    }

    
    public function edit($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if ($user) {
            $data['user'] = $user;
            return view('users/edit', $data);
        } else {
            return redirect()->to('/erro');
        }
    }


    public function update($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if ($user) {
            $validationRules = [
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,id,' . $id,
                'password' => 'string|min:8',
            ];

            $validator = \Config\Services::validation();

            if ($this->request->getMethod() === 'post' && $validator->withRequest($this->request)->setRules($validationRules)->run()) {
                $userData = [
                    'name' => $this->request->getPost('name'),
                    'email' => $this->request->getPost('email'),
                ];

                $password = $this->request->getPost('password');
                if (!empty($password)) {
                    $userData['password'] = password_hash( $password , PASSWORD_BCRYPT);
                }

                $userModel->update($id, $userData);
                return redirect()->to('/sucesso');
            } else {
                $data['validation'] = $validator;
                $data['user'] = $user;
                return view('users/edit', $data);
            }
        } else {
            return redirect()->to('/erro');
        }
    }


    public function delete($id)
    {
        $userModel = new UserModel();

        $user = $userModel->find($id);

        if ($user) {

            $userModel->delete($id);

            return redirect()->to('/sucesso');
        } else {
            return redirect()->to('/erro');
        }
    }
}
