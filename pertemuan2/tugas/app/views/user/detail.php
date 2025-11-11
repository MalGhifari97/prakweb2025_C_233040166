<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['user']['name']; ?></h5>
            <p class="card-text">Email: <?= $data['user']['email']; ?></p>
            <a href="<?= BASEURL; ?>/user" class="card-link">Kembali ke Daftar User</a>
        </div>
    </div>
</div>