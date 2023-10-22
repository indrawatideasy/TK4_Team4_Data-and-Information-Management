<?php

// Class Product
class Product {
    private $id;
    private $name;
    private $price;

    public function __construct($id, $name, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}

// Class Cart
class Cart {
    private $items = [];

    public function addItem($product, $quantity) {
        $this->items[$product->getId()] = [
            'product' => $product,
            'quantity' => $quantity
        ];
    }

    public function removeItem($productId) {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
        }
    }

    public function getTotalPrice() {
        $total = 0;
        foreach ($this->items as $item) {
            $total += $item['product']->getPrice() * $item['quantity'];
        }
        return $total;
    }
}

// Class Order
class Order {
    private $cart;
    private $customerName;
    private $shippingAddress;

    public function __construct($cart, $customerName, $shippingAddress) {
        $this->cart = $cart;
        $this->customerName = $customerName;
        $this->shippingAddress = $shippingAddress;
    }

    public function processOrder() {
        // Proses pemesanan, misalnya dengan menyimpan ke database
        // atau mengirim email konfirmasi
    }
}

// Contoh penggunaan
$product1 = new Product(1, 'Laptop', 1000);
$product2 = new Product(2, 'Smartphone', 500);
$cart = new Cart();

$cart->addItem($product1, 2);
$cart->addItem($product2, 3);

$order = new Order($cart, 'John Doe', '123 Main St');
$order->processOrder();

echo "Total harga pesanan: $" . $cart->getTotalPrice();
?>
