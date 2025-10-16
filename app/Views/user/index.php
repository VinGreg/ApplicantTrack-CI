<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Manage User</h2>
    <a href="<?php echo base_url('user/create'); ?>" class="btn btn-success mb-3">Tambah User</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Username</th>
                <!-- Kolom Role Dihapus -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?php echo $u['username']; ?></td>
                <td>
                    <a href="<?php echo base_url('user/edit/'.$u['id_user']); ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                    
                    <!-- Tombol Delete menggunakan FORM POST dengan method spoofing -->
                    <form action="<?php echo base_url('user/delete/'.$u['id_user']); ?>" method="post" class="d-inline" 
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus user <?php echo $u['username']; ?>?');">
                        
                        <!-- Ini adalah method spoofing untuk CodeIgniter 4 -->
                        <input type="hidden" name="_method" value="DELETE"> 
                        
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-secondary">Kembali</a>
</div>
</body>
<footer class="text-center mt-4 mb-2">
    <p>&copy; 2025 ApplicantTrack. By: Vincent GG.</p>
</footer>
</html>
