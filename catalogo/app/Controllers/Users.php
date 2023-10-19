<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UserModel;
use App\Services\UserService;

class Users extends BaseController
{

    protected $userService;

    public function __construct()
    {
        // Injeção de dependência do serviço UserService
        $this->userService = new UserService(model(UserModel::class));
    }

    public function index()
    {
        return view('register');
    }

    public function create()
    {
        // Verifique se o formulário foi submetido
        if ($this->request->getMethod() === 'post') {
            // Validação dos dados do formulário
            $validationRules = [
                'email'    => 'required|valid_email',
                'password' => 'required|min_length[6]',
            ];

            if ($this->validate($validationRules)) {
                // Dados do formulário são válidos
                $user = new User($this->request->getPost());

                // Crie um novo usuário
                $result = $this->userService->createUser($user);

                if ($result === true) {
                    // Sucesso na criação do usuário
                    return redirect()->to('/dashboard'); // Redireciona para a página do dashboard
                }
            }
        }

        // Carrega a view de criação de usuário (formulário)
        return view('user/create');
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
                    $userData['password'] = password_hash($password , PASSWORD_BCRYPT);
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
