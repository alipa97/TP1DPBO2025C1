<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Menambah data dari form input
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];

    // Memindahkan file gambar ke folder 'images'
    move_uploaded_file($_FILES['foto']['tmp_name'], "images/".$foto);

    // membuat data baru
    $id_baru = count($_SESSION['produk']) + 1;
    $produk_baru = ["id" => $id_baru, "nama" => $nama, "kategori" => $kategori, "harga" => $harga, "foto" => $foto];

    // menyimpan produk ke sesi
    $_SESSION['produk'][] = $produk_baru;

    // kembali ke laman awal
    header("Location: index.php");
}
?>
