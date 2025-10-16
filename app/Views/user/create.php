<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Tambah User</h2>
    <form method="post" action="<?php echo base_url('user/create'); ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password</label>
            <input type="password" class="form-control" id="pwd" name="pwd" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <select class="form-control" id="role" name="role">
                <option value="admin">Admin</option>
                <option value="superuser">Superuser</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo base_url('user'); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
<footer class="text-center mt-4 mb-2">
    <p>&copy; 2025 ApplicantTrack. By: Vincent GG.</p>
</footer>
</html>
