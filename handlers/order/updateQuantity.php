<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $quantities = $_POST['quantity'];

    foreach ($quantities as $id => $qty) {
        $qty = (int) $qty;

        if ($qty <= 0) {
            unset($_SESSION['cart'][$id]);
        } else {
            $_SESSION['cart'][$id] = $qty;
        }
    }
}

header("Location: ../../views/cart.php");
exit;