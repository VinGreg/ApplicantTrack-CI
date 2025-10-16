<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $userModel = new UserModel();
            $user = $userModel->where('username', $username)->first();
            if ($user && password_verify($password, $user['pwd'])) {
                session()->set([
                    'user_id' => $user['id_user'],
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'logged_in' => true
                ]);
                return redirect()->to('/dashboard');
            } else {
                return view('auth/login', ['error' => 'Username atau password salah']);
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
