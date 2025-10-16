<?php
namespace App\Models;

use CodeIgniter\Model;

class PelamarModel extends Model
{
    protected $table = 'pelamar';
    protected $primaryKey = 'id_pelamar';
    protected $allowedFields = ['nama_pelamar', 'lulusan', 'ipk', 'cat_porto'];
}
