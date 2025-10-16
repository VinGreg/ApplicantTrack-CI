<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Pelamar</h2>
    
    <!-- Action mengarah kembali ke fungsi edit($id) di Controller untuk memproses POST -->
    <form method="post" action="<?= base_url('pelamar/edit/'.$pelamar['id_pelamar']); ?>">
        
        <!-- Field Nama Pelamar -->
        <div class="mb-3">
            <label for="nama_pelamar" class="form-label">Nama Pelamar</label>
            <!-- Menggunakan 'nama_pelamar' sebagai name (sesuai create.php) dan mengisi value lama -->
            <input type="text" class="form-control" id="nama_pelamar" name="nama_pelamar" 
                   value="<?= htmlspecialchars($pelamar['nama_pelamar'] ?? ''); ?>" required>
        </div>
        
        <!-- Field Lulus dari -->
        <div class="mb-3">
            <label for="lulusan" class="form-label">Lulus dari</label>
            <!-- Menggunakan 'lulusan' sebagai name (sesuai create.php) dan mengisi value lama -->
            <input type="text" class="form-control" id="lulusan" name="lulusan" 
                   value="<?= htmlspecialchars($pelamar['lulusan'] ?? ''); ?>" required>
        </div>
        
        <!-- Field Jumlah IPK -->
        <div class="mb-3">
            <label for="ipk" class="form-label">Jumlah IPK</label>
            <!-- Menggunakan 'ipk' sebagai name (sesuai create.php) dan mengisi value lama -->
            <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" 
                   value="<?= htmlspecialchars($pelamar['ipk'] ?? ''); ?>" required>
        </div>
        
        <!-- Field Catatan Portfolio -->
        <div class="mb-3">
            <label for="cat_porto" class="form-label">Catatan Portfolio</label>
            <!-- Menggunakan 'cat_porto' sebagai name (sesuai create.php) dan mengisi nilai di dalam textarea -->
            <textarea class="form-control" id="cat_porto" name="cat_porto"><?= htmlspecialchars($pelamar['cat_porto'] ?? ''); ?></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('pelamar'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
<footer class="text-center mt-4 mb-2">
    <p>&copy; 2025 ApplicantTrack. By: Vincent GG.</p>
</footer>
</html>
