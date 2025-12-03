<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, <?= htmlspecialchars($user['name']); ?></h1>
        <p>Email:<?= htmlspecialchars($user['email']); ?></p>
        <a href="index.php" class="btn">Kembali ke Daftar</a>
    </div>
</body>
</html>