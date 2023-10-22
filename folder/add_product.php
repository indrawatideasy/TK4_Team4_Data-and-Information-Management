<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST["name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    // Koneksi ke database (gantilah dengan koneksi sesuai dengan kebutuhan Anda)
    $conn = new mysqli("localhost", "username", "password", "penjualan_barang");

    // Pastikan koneksi berhasil
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Persiapkan query SQL untuk menambahkan barang ke database
    $sql = "INSERT INTO products (name, price, stock) VALUES (?, ?, ?)";

    // Persiapkan statement
    $stmt = $conn->prepare($sql);

    // Bind parameter
    $stmt->bind_param("sdi", $name, $price, $stock);

    // Eksekusi statement
    if ($stmt->execute()) {
        echo "Barang berhasil ditambahkan.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
