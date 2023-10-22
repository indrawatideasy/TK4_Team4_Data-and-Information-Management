<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $product_id = $_POST["product_id"];
    $quantity = $_POST["quantity"];
    
    // Koneksi ke database (gantilah dengan koneksi sesuai dengan kebutuhan Anda)
    $conn = new mysqli("localhost", "username", "password", "penjualan_barang");
    
    // Pastikan koneksi berhasil
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    
    // Ambil harga barang dari tabel "products"
    $sql = "SELECT price FROM products WHERE id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $stmt->bind_result($price);
    $stmt->fetch();
    $stmt->close();
    
    // Hitung total harga transaksi
    $total_price = $price * $quantity;
    
    // Simpan transaksi ke tabel "sales"
    $sql = "INSERT INTO sales (product_id, quantity, total_price) VALUES (?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iid", $product_id, $quantity, $total_price);
    
    if ($stmt->execute()) {
        echo "Transaksi penjualan berhasil.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
