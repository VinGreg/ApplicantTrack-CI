<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> 
</head>
<body>
<div class="container mt-5">
    
    <!-- Header dan Sapaan -->
    <div class="p-4 bg-light rounded-3 shadow-sm mb-4">
        <!-- Menggunakan session()->get() untuk memastikan username tampil -->
        <h1 class="display-5 fw-bold">Selamat Datang, <?php echo htmlspecialchars(session()->get('username')); ?>!</h1>
        <p class="fs-5 text-muted">Aplikasi ApplicantTrack</p>
        
        <!-- BAGIAN DESKRIPSI STATIS BARU -->
        <hr class="my-3">
        <p>
            **ApplicantTrack** adalah sistem manajemen pelamar sederhana yang dirancang untuk membantu Anda melacak, mengelola, dan menilai kandidat yang mendaftar. Gunakan menu navigasi di bawah ini untuk mengakses data pelamar dan mengelola pengguna sistem.
        </p>
        <!-- Akhir BAGIAN DESKRIPSI STATIS BARU -->
    </div>

    <!-- Tombol Navigasi -->
    <div class="mb-5 d-flex gap-2">
        <a href="<?php echo base_url('pelamar'); ?>" class="btn btn-primary btn-lg shadow-sm"><i class="fas fa-users me-2"></i>Data Pelamar</a>
        
        <?php if (session()->get('role') === 'superuser'): ?>
            <a href="<?php echo base_url('user'); ?>" class="btn btn-warning btn-lg shadow-sm"><i class="fas fa-user-shield me-2"></i>Manajemen User</a>
        <?php endif; ?>
        
        <a href="<?php echo base_url('logout'); ?>" class="btn btn-danger btn-lg shadow-sm"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
    </div>
    
</div>
</body>
<footer class="text-center mt-4 mb-2">
    <p>&copy; 2025 ApplicantTrack. By: Vincent GG.</p>
</footer>
</html>
