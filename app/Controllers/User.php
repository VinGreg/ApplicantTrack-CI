<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller
{
    public function index()
    {
        if (session()->get('role') !== 'superuser') {
            return redirect()->to('/dashboard');
        }
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('user/index', $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'superuser') {
            return redirect()->to('/dashboard');
        }
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            $password = $this->request->getPost('pwd');
            $model->save([
                'username' => $this->request->getPost('username'),
                'pwd' => password_hash($password, PASSWORD_DEFAULT),
                'role' => $this->request->getPost('role'),
            ]);
            
            session()->setFlashdata('success', 'User baru berhasil ditambahkan.');
            
            return redirect()->to('/user');
        }
        return view('user/create');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'superuser') {
            return redirect()->to('/dashboard');
        }
        helper(['form']);
        $model = new UserModel();
        $data['user'] = $model->find($id);
        
        if (!$data['user']) {
            session()->setFlashdata('error', 'User tidak ditemukan.');
            return redirect()->to('/user');
        }

        if ($this->request->getMethod() === 'post') {
            $updateData = [
                'username' => $this->request->getPost('username'),
                'role' => $this->request->getPost('role'),
            ];
            $password = $this->request->getPost('pwd');
            if (!empty($password)) {
                $updateData['pwd'] = password_hash($password, PASSWORD_DEFAULT);
            }
            $model->update($id, $updateData);
            
            session()->setFlashdata('success', 'Data user berhasil diperbarui.');
            
            return redirect()->to('/user');
        }
        return view('user/edit', $data);
    }

    public function delete($id)
    {
        if (session()->get('role') !== 'superuser') {
            return redirect()->to('/dashboard');
        }
        
        $model = new UserModel();
        
        $user = $model->find($id);

        if ($user) {
            $model->delete($id);
            session()->setFlashdata('success', 'User ' . $user['username'] . ' berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'User tidak ditemukan atau sudah dihapus.');
        }

        return redirect()->to('/user');
    }
    
}
