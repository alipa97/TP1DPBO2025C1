<?php
session_start();

// Inisialisasi data produk awal (hanya pertama kali)
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [
        ["id" => 1, "nama" => "Dog Food", "kategori" => "Makanan", "harga" => 50000, "foto" => "dumb_photo.jpg"],
        ["id" => 2, "nama" => "Kandang Kucing", "kategori" => "Aksesoris", "harga" => 150000, "foto" => "dumb_photo.jpg"],
        ["id" => 3, "nama" => "Shampoo Anjing", "kategori" => "Perawatan", "harga" => 30000, "foto" => "dumb_photo.jpg"],
    ];
}

$produk = $_SESSION['produk'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Petshop</title>
</head>
<body>
    <h2>Daftar Produk Petshop</h2>
    <a href="create.php">Tambah Produk</a>
    <table border="1">
        <tr>
            <th>ID</th><th>Nama</th><th>Kategori</th><th>Harga</th><th>Foto</th><th>Aksi</th>
        </tr>
        <?php foreach ($produk as $p): ?>
        <tr>
            <td><?= $p['id']; ?></td>
            <td><?= $p['nama']; ?></td>
            <td><?= $p['kategori']; ?></td>
            <td>Rp <?= number_format($p['harga'], 0, ',', '.'); ?></td>
            <td><img src="images/<?= $p['foto']; ?>" width="100"></td>
            <td>
                <a href="edit.php?id=<?= $p['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?= $p['id']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
