<?php
namespace App\Controllers;

use App\Models\PelamarModel;
use CodeIgniter\Controller;

class Pelamar extends Controller
{
    public function index()
    {
        $model = new PelamarModel();
        $data['pelamar'] = $model->findAll();
        return view('pelamar/index', $data);
    }

    public function create()
    {
        helper(['form']);
        if ($this->request->getMethod() === 'post') {
            $model = new PelamarModel();
            $model->save([
                'nama_pelamar' => $this->request->getPost('nama_pelamar'),
                'lulusan' => $this->request->getPost('lulusan'),
                'ipk' => $this->request->getPost('ipk'),
                'cat_porto' => $this->request->getPost('cat_porto'),
            ]);
            return redirect()->to('/pelamar');
        }
        return view('pelamar/create');
    }

    public function edit($id)
    {
        helper(['form']);
        $model = new PelamarModel();
        
        $data['pelamar'] = $model->find($id);
        
        if (!$data['pelamar']) {
            return redirect()->to('/pelamar')->with('error', 'Pelamar tidak ditemukan.');
        }

        if ($this->request->getMethod() === 'post') {
            $rules = [
                'nama_pelamar' => 'required|min_length[3]|max_length[100]',
                'lulusan'      => 'required|min_length[3]',
                'ipk'          => 'required|decimal',
            ];

            if ($this->validate($rules)) {
                $model->update($id, [
                    'nama_pelamar' => $this->request->getPost('nama_pelamar'),
                    'lulusan' => $this->request->getPost('lulusan'),
                    'ipk' => $this->request->getPost('ipk'),
                    'cat_porto' => $this->request->getPost('cat_porto'),
                ]);
                return redirect()->to('/pelamar')->with('success', 'Data pelamar berhasil diperbarui.');
            } else {
                $data['validation'] = $this->validator;
                return view('pelamar/edit', $data);
            }
        }
        
        return view('pelamar/edit', $data);
    }

    public function delete($id)
    {
        $model = new PelamarModel();
        $model->delete($id);
        return redirect()->to('/pelamar');
    }
}
