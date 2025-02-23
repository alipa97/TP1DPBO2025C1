<?php
session_start();

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$produk = &$_SESSION['produk'];

foreach ($produk as $key => $p) {
    if ($p['id'] == $id) {
        unset($produk[$key]);
        $_SESSION['produk'] = array_values($produk);
        break;
    }
}

header("Location: index.php");
?>