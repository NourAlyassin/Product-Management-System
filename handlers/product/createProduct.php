<?php

require "../../core/validations.php";
require "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $name  = trim($_POST['name']);
    $price = trim($_POST['price']);
    $qty   = trim($_POST['quantity']);

    $error = validateProduct($name, $price, $qty);

    if (!empty($error)) {
        setMessage("danger", $error);
        header("Location: ../../views/product/create.php");
        exit;
    }

    // Upload Image
    $imageName = null;

    if (!empty($_FILES['image']['name'])) {
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageName = uniqid('product_') . '.' . $ext;

        $uploadDir = __DIR__ . "/../../public/uploads/products/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName);
    }

    if (createProduct($name, $price, $qty, $imageName)) {
        setMessage("success", 'Product Added Successfully!');
        header("Location: ../../views/product/products.php");
        exit;
    }
}