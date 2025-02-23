<?php
session_start();

// Memiriksa apakah data ada 
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$produk = &$_SESSION['produk'];

$produk_edit = null;

// mencari data produk dengan id yang sesuai
foreach ($produk as &$p) {
    if ($p['id'] == $id) {
        $produk_edit = $p;
        break;
    }
}

// jika produk tidak ditemukan
if (!$produk_edit) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>
    <form action="edit_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $produk_edit['id']; ?>">
        Nama: <input type="text" name="nama" value="<?= $produk_edit['nama']; ?>" required><br>
        Kategori: <input type="text" name="kategori" value="<?= $produk_edit['kategori']; ?>" required><br>
        Harga: <input type="number" name="harga" value="<?= $produk_edit['harga']; ?>" required><br>
        Foto Lama: <img src="images/<?= $produk_edit['foto']; ?>" width="100"><br>
        Ganti Foto: <input type="file" name="foto"><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>
