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
    
        // Verificar se a senha fornecida corresponde à senha no banco de dados
        if($user && password_verify($senha, $user->password)){
            
            session()->set('user_id', $user->id);
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

<?php

// namespace App\Services;

// use App\Entities\Usuarios;
// use App\Models\UsuariosModel;
// use CodeIgniter\Config\Factories;

// class UserService{

//     // Atributos
//     protected $userModel;

//     public function __construct()
//     {
//         $this->userModel = Factories::models(UsuariosModel::class); // Chama o model e passa ele para o atributo
//     }

//     public function authenticate($email, $senha){
//         // Pega o nome do usuário e autentica no DB
//         $user = $this->userModel->getUser($email);
        
//         // Verifica se a senha passada pelo o usuário corresponde
//         if($user && password_verify($senha, $user->password)){
            
//             // Cria uma variável que vaie estar em uma session para futuras utilizações
//             $variavelDeSessao = [
//                 'email' => $user->email,
//                 'isLoggedIn' => true
//             ];
            
//             // Coloca a variável dentro da session
//             session()->set($variavelDeSessao);

//             // Flashdata para exibir nas Views
//             session()->setFlashdata('success', 'Usuário logado com Sucesso!');
//             return true;
//         } else{
//             session()->setFlashdata('error', 'Erro ao tentar logar!');
//             return false;
//         }
//     }

//     public function createUser($nome, $email, $password){

//         // Pega os dados da Entity
//         $user = new Usuarios();
        
//         // Passa os novos dados para a Entity
//         $user->nome = $nome;
//         $user->email = $email;
//         $user->password = $password;
    
//         // Salva no DB e faz uma verificação
//         if($this->userModel->save($user)){

//             // Flashdata para exibir nas Views 
//             session()->setFlashdata('success', 'Usuário criado com sucesso!');
//             return redirect()->to('/login');
//         } else{
//             return redirect()->back()->withInput()->with('errors', $this->userModel->errors()); 
//         }

//     }

// }