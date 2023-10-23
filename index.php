<?php
// Membuat koneksi ke database seperti yang dijelaskan di atas
$servername = "localhost";  // Ganti dengan nama server MySQL Anda
$username = "admin";    // Ganti dengan username MySQL Anda
$password = "1234";    // Ganti dengan password MySQL Anda
$database = "db_team4"; // Ganti dengan nama database Anda

try {
$pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
}

// Query untuk mengambil data produk dari database
$sql = "SELECT * FROM products";
$stmt = $pdo->query($sql);

// Mengambil hasil query ke dalam array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
</head>
<body>
    <h1>Selamat datang di Aplikasi Penjualan Barang</h1>
    <p>Silakan <a href="folder/read_product.php">lihat daftar produk</a> atau <a href="folder/sales_dashboard.php">lihat laporan rugi laba</a>.</p>

    <h1>Product Management</h1>

    <!-- Form untuk menambahkan produk (Create) -->
    <h2>Create Product</h2>
    <form action="folder/create_product.php" method="post">
        Product Name: <input type="text" name="name" required><br>
        Price: <input type="number" name="price" step="0.01" required><br>
        <input type="submit" value="Create">
    </form>

    <!-- Daftar Produk (Read) -->
    <h2>Product List</h2>
    <table>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
        // Tampilkan daftar produk dengan data yang diperoleh dari database
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>{$product['id']}</td>";
            echo "<td>{$product['name']}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>
                <a href='folder/update_product.php?id={$product['id']}'>Edit</a> |
                <a href='folder/delete_product.php?id={$product['id']}'>Delete</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Form untuk mengedit produk (Update) -->
    <h2>Edit Product</h2>
    <form action="folder/update_product.php" method="post">
        Product ID: <input type="number" name="product_id" required><br>
        New Product Name: <input type="text" name="new_product_name" required><br>
        New Price: <input type="number" name="new_price" step="0.01" required><br>
        <input type="submit" value="Update">
    </form>

    <!-- Form untuk menghapus produk (Delete) -->
    <h2>Delete Product</h2>
    <form action="folder/delete_product.php" method="post">
        Product ID: <input type="number" name="product_id" required><br>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
