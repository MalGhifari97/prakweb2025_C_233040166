<div class="container mt-4">
    <h3>Detail User</h3>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($data['user']['name']); ?></h5>
            <p class="card-text">Email: <?= htmlspecialchars($data['user']['email']); ?></p>
            <a href="<?= BASEURL; ?>/user" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>