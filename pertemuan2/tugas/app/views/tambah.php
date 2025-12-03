<div class="container mt-4">
    <h3>Tambah Data User</h3>

    <form action="<?= BASEURL; ?>/user/prosesTambah" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">Batal</a>
    </form>
</div>