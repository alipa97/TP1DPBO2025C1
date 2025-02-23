<?php
// Memulai session agar dapat mengakses data yang tersimpan dalam $_SESSION
session_start();

// Memeriksa apakah parameter 'id' ada dalam URL
if (!isset($_GET['id'])) {
    // Jika tidak ada, alihkan pengguna kembali ke index.php
    header("Location: index.php");
    exit(); // Menghentikan eksekusi skrip
}

// Mengambil nilai ID dari parameter URL
$id = $_GET['id'];

// Mengakses array produk dalam session dengan referensi
$produk = &$_SESSION['produk'];

// Melakukan pencarian dalam array untuk menemukan produk yang sesuai dengan ID
foreach ($produk as $key => $p) {
    if ($p['id'] == $id) {
        // Menghapus elemen dari array berdasarkan kunci yang ditemukan
        unset($produk[$key]);

        // Mengatur ulang indeks array agar tetap terurut
        $_SESSION['produk'] = array_values($produk);

        // Keluar dari loop setelah produk ditemukan dan dihapus
        break;
    }
}

// Mengalihkan kembali ke halaman index.php setelah produk dihapus
header("Location: index.php");
?>
