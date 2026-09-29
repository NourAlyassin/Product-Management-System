<?php
include('../../core/functions.php');
include('../../core/validation.php');
$id=$_GET['id'];
if(!isset($id)){
    header("Location:../../index.php");
}
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] += 1;

  }else{
    $_SESSION['cart'][$id] = 1;
}
header("Location:../../views/cart.php");
exit;

