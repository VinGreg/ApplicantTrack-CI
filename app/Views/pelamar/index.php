<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Pelamar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Data Pelamar</h2>
    <a href="<?php echo base_url('pelamar/create'); ?>" class="btn btn-success mb-3">Tambah Pelamar</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pelamar</th>
                <th>Lulus dari</th>
                <th>Jumlah IPK</th>
                <th>Catatan Portfolio</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($pelamar as $p): ?>
            <tr>
                <td><?php echo $p['nama_pelamar']; ?></td>
                <td><?php echo $p['lulusan']; ?></td>
                <td><?php echo $p['ipk']; ?></td>
                <td><?php echo $p['cat_porto']; ?></td>
                <td>
                    <a href="<?php echo base_url('pelamar/edit/'.$p['id_pelamar']); ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?php echo base_url('pelamar/delete/'.$p['id_pelamar']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-secondary mt-3">Kembali</a>
</div>
</body>
<footer class="text-center mt-4 mb-2">
    <p>&copy; 2025 ApplicantTrack. By: Vincent GG.</p>
</footer>
</html>
