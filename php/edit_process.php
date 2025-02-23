<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    $produk = &$_SESSION['produk'];
    foreach ($produk as &$p) {
        if ($p['id'] == $id) {
            $p['nama'] = $nama;
            $p['kategori'] = $kategori;
            $p['harga'] = $harga;

            if (!empty($_FILES['foto']['name'])) {
                $foto = $_FILES['foto']['name'];
                move_uploaded_file($_FILES['foto']['tmp_name'], "images/".$foto);
                $p['foto'] = $foto;
                // var_dump($p['foto']);
                // die(); // Stop eksekus  
            }

            break;
        }
    }
    header("Location: index.php");
}
?>
