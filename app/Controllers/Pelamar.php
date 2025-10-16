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

    // Fungsi ini menangani dua hal:
    // 1. GET: Mengambil data dan menampilkan form edit.
    // 2. POST: Memproses data yang disubmit dan melakukan UPDATE.
    public function edit($id)
    {
        helper(['form']);
        $model = new PelamarModel();
        
        // (1) Bagian GET: Mengambil data lama
        $data['pelamar'] = $model->find($id);
        
        // Cek jika pelamar tidak ditemukan
        if (!$data['pelamar']) {
            return redirect()->to('/pelamar')->with('error', 'Pelamar tidak ditemukan.');
        }

        // (2) Bagian POST: Memproses update
        if ($this->request->getMethod() === 'post') {
            // Validasi sederhana (Anda bisa menambahkan aturan yang lebih ketat di sini)
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
                // Jika validasi gagal, kembali ke form dengan data lama dan pesan error
                $data['validation'] = $this->validator;
                // Tetap tampilkan view edit
                return view('pelamar/edit', $data);
            }
        }
        
        // Tampilkan view edit
        return view('pelamar/edit', $data);
    }

    public function delete($id)
    {
        $model = new PelamarModel();
        $model->delete($id);
        return redirect()->to('/pelamar');
    }
}
