<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir
    $productName = $_POST['product_name'];
    $price = $_POST['price'];

    // Validasi data jika diperlukan
    // Catat transaksi
    $productId = $newlyCreatedProductId; // ID produk yang baru saja dibuat
    $salePrice = $_POST['sale_price'];
    $costPrice = $_POST['cost_price'];
    $quantity = $_POST['quantity'];
    $transactionDate = date("Y-m-d");

    // Simpan data produk ke dalam database atau sumber data lainnya
    $sql = "INSERT INTO transactions (product_id, sale_price, cost_price, quantity, transaction_date) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$productId, $salePrice, $costPrice, $quantity, $transactionDate]);

    // Redirect kembali ke halaman daftar produk
    header('Location: product_list.php');
}
?>
