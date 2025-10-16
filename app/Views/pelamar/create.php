<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pelamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah Pelamar</h2>
    <form method="post" action="<?php echo base_url('pelamar/create'); ?>">
        <div class="mb-3">
            <label for="nama_pelamar" class="form-label">Nama Pelamar</label>
            <input type="text" class="form-control" id="nama_pelamar" name="nama_pelamar" required>
        </div>
        <div class="mb-3">
            <label for="lulusan" class="form-label">Lulus dari</label>
            <input type="text" class="form-control" id="lulusan" name="lulusan" required>
        </div>
        <div class="mb-3">
            <label for="ipk" class="form-label">Jumlah IPK</label>
            <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" required>
        </div>
        <div class="mb-3">
            <label for="cat_porto" class="form-label">Catatan Portfolio</label>
            <textarea class="form-control" id="cat_porto" name="cat_porto"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url('pelamar'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
<footer class="text-center mt-4 mb-2">
    <p>&copy; 2025 ApplicantTrack. By: Vincent GG.</p>
</footer>
</html>
