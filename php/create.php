<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Produk</title>
</head>
<body>
    <h2>Tambah Produk Baru</h2>
    <form action="create_process.php" method="post" enctype="multipart/form-data">
        Nama: <input type="text" name="nama" required><br>
        Kategori: <input type="text" name="kategori" required><br>
        Harga: <input type="number" name="harga" required><br>
        Foto: <input type="file" name="foto" required><br>
        <button type="submit">Tambah</button>
    </form>
    <br>
    <a href="index.php">Kembali</a>
</body>
</html>
