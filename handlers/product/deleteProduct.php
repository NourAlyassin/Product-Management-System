<?php

require "../../core/validations.php";
require "../../core/functions.php";


$id = $_GET['id'];
if (!isset($id)) {
    setMessage("danger", "No Product Selected!");
    header("Location: ../../views/product/products.php");
    exit;
}

$id = trim($_GET['id']);


if (!isset($id)) {
    setMessage("danger", "No Employee Selected!");
    header("Location: ../../views/product/products.php");
    exit;
}


if (deleteProduct($id)) {
    setMessage("success", "Employee Deleted Successfully!");
    header("Location: ../../views/product/products.php");
    exit;
}
