<div class="container mt-5">

    <div class="row">
        <div class="col-lg-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-lg-6">
            <button type="button" class="btn btn-primary tombolTambahData" data-bs-toggle="modal" data-bs-target="#formModal">
                Tambah Data User
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h3>Daftar Pengguna (User)</h3>
            <ul class="list-group">
                <?php foreach ($data['users'] as $user) : ?>
                    <li class="list-group-item">
                        <?= $user['name']; ?>
                        <a href="<?= BASEURL; ?>/user/hapus/<?= $user['id']; ?>" class="badge bg-danger float-end ms-1" onclick="return confirm('Yakin menghapus data?');">hapus</a>
                        <a href="<?= BASEURL; ?>/user/ubah/<?= $user['id']; ?>" class="badge bg-success float-end ms-1 tombolUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $user['id']; ?>">ubah</a>
                        <a href="<?= BASEURL; ?>/user/detail/<?= $user['id']; ?>" class="badge bg-primary float-end ms-1">detail</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Tambah Data User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= BASEURL; ?>/user/tambah" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="mb-3">
                        <label for="name" class="form-label">name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
            </form>
            </div>
    </div>
</div>