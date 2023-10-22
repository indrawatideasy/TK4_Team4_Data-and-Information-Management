<?php
// Mengambil data transaksi dari database
// ...

// Menghitung total penjualan dan biaya produksi
$totalSales = 0;
$totalCosts = 0;

foreach ($transactions as $transaction) {
    $totalSales += $transaction['sale_price'] * $transaction['quantity'];
    $totalCosts += $transaction['cost_price'] * $transaction['quantity'];
}

// Menghitung laporan rugi laba
$profitLoss = $totalSales - $totalCosts;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profit & Loss Dashboard</title>
</head>
<body>
    <h1>Profit & Loss Dashboard</h1>

    <h2>Total Sales: $<?php echo $totalSales; ?></h2>
    <h2>Total Costs: $<?php echo $totalCosts; ?></h2>
    <h2>Profit/Loss: $<?php echo $profitLoss; ?></h2>
</body>
</html>
