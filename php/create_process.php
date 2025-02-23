<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];
    
    $foto = $_FILES['foto']['name'];
    // var_dump($foto);
    // die(); // Stop eksekusi
    // dd($foto);
    move_uploaded_file($_FILES['foto']['tmp_name'], "images/".$foto);

    $id_baru = count($_SESSION['produk']) + 1;
    $produk_baru = ["id" => $id_baru, "nama" => $nama, "kategori" => $kategori, "harga" => $harga, "foto" => $foto];

    $_SESSION['produk'][] = $produk_baru;

    header("Location: index.php");
}
?>
