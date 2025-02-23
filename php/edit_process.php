<?php
// Memulai session untuk menyimpan data dalam $_SESSION
session_start();

// Memeriksa apakah request yang diterima adalah metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data yang dikirim dari form
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $harga = $_POST['harga'];

    // Mengakses array produk dalam session menggunakan referensi agar perubahan langsung diterapkan
    $produk = &$_SESSION['produk'];

    // Looping melalui produk untuk menemukan produk dengan ID yang sesuai
    foreach ($produk as &$p) {
        if ($p['id'] == $id) {
            // Mengupdate data produk dengan nilai baru dari form
            $p['nama'] = $nama;
            $p['kategori'] = $kategori;
            $p['harga'] = $harga;

            // Mengecek apakah ada file foto yang diunggah
            if (!empty($_FILES['foto']['name'])) {
                $foto = $_FILES['foto']['name'];

                // Memindahkan file yang diunggah ke folder "images/"
                move_uploaded_file($_FILES['foto']['tmp_name'], "images/".$foto);

                // Menyimpan nama file foto ke dalam array produk
                $p['foto'] = $foto;

                // Debugging opsional: menampilkan data foto dan menghentikan eksekusi
                // var_dump($p['foto']);
                // die(); // Menghentikan eksekusi untuk debugging
            }

            // Keluar dari loop setelah menemukan dan mengupdate produk
            break;
        }
    }

    // Mengalihkan kembali ke halaman index.php setelah data diperbarui
    header("Location: index.php");
}
?>
