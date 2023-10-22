<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir
    $productId = $_POST['product_id'];

    // Hapus data produk dari database atau sumber data lainnya
    // ...

    // Redirect kembali ke halaman daftar produk
    header('Location: product_list.php');
}
?>
