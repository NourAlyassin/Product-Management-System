<?php

require "../../core/validations.php";
require "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    $error = validateRegister($name, $email, $password, $confirm_password);

    if (!empty($error)) {
        setMessage("danger", $error);
        header("Location: ../../views/auth/register.php");
        exit;
    }

    if(register($name, $email, $password, $confirm_password)) {
        setMessage("success", 'User Registered Successfully!');
        header("Location: ../../index.php");
        exit;
    }
}
