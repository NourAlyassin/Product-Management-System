<?php

require "../../core/validations.php";
require "../../core/functions.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = validateLogin($email, $password);

    if (!empty($error)) {
        setMessage("danger", $error);
        header("Location: ../../views/auth/login.php");
        exit;
    }

    if (login($email, $password)) {
        setMessage("success", 'User Login Successfully!');
        header("Location: ../../index.php");
        exit;
    } else {
        setMessage("danger", "Invalid Email or Password!");
        header("Location: ../../views/auth/login.php");
        exit;
    }
}
