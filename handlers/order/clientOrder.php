<?php
include('../../core/functions.php');

include('../../core/validation.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $cart = $_SESSION['cart'] ?? [];

    if (empty($cart)) {
        header("Location: ../../views/cart.php");
        exit;
    }
    $products = getProducts();

    $order_items = [];
    $total = 0;

    foreach ($cart as $id => $qty) {
        $product = null;
        foreach ($products as $pro) {
            if ($pro['id'] == $id) {
                $product = $pro;
                break;
            }
        }
        if (!$product) continue;

        $subtotal = $product['price'] * $qty;
        $total += $subtotal;

        $order_items[] = [
            "id" => $product['id'],
            "name" => $product['name'],
            "price" => $product['price'],
            "quantity" => $qty,
            "subtotal" => $subtotal
        ];
    }

    $order = [
        "id" => uniqid(),
        "name" => $name,
        "email" => $email,
        "phone" => $phone,
        "address" => $address,
        "items" => $order_items,
        "total" => $total,
        "date" => date("Y-m-d H:i:s")
    ];
    $orderJson = '../../data/orders.json';
    $oldData = file_get_contents($orderJson);
    $orders = json_decode($oldData, true);
    if (!is_array($orders)) {
        $orders = [];
    }

    $orders[] = $order;
    file_put_contents($orderJson, json_encode($orders, JSON_PRETTY_PRINT));
    unset($_SESSION['cart']);

    header("Location:../../index.php");
    exit;
}
