<?php

function validateRequired($fieldName, $value) {
    if(empty($value)) {
        return "$fieldName is required!";
    }
    return null;
}

function validateEmail($email) {
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return null;
    }
    return "Invalid Email!";
}

function validatePrice($price) {
    if(is_numeric($price) && $price > 0) {
        return null;
    }
    return "Price Must be a Positive Number!";
}
function validateQty($qty) {
    if(is_numeric($qty) && $qty > 0) {
        return null;
    }
    return "Quantity Must be a Positive Number!";
}

function validatePassword($password) {
    if(strlen($password < 6)) {
        return "Password must be 6 char";
    }

    if(!preg_match("/[A-Z]/",$password)) {
        return "Password Must be Containing Uppercase!";
    }
    if(!preg_match("/[a-z]/",$password)) {
        return "Password Must be Containing Lowerrcase!";
    }
    if(!preg_match("/[0-1]/",$password)) {
        return "Password Must be Containing Numbers!";
    }
}

function validateConfirmPass($confirmPass, $password) {
    if($confirmPass == $password) {
        return null;
    }
    return "Password and Confirm Password Don't Match!";
}

function validateProduct($name, $price, $qty) {

    $fields = [
        "name" => $name,
        "price" => $price,
        "qty" => $qty
    ];

    foreach($fields as $fieldName => $value) {
        if($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }

    if($error = validatePrice($price)) {
        return $error;
    }

    if($error = validateQty($qty)) {
        return $error;
    }
}

function validateRegister($name, $email, $password, $confirm_password) {

    $fields = [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "confirm_password"=> $confirm_password
    ];

    foreach($fields as $fieldName => $value) {
        if($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }

    if($error = validateEmail($email)) {
        return $error;
    }

    if($error = validatePassword($password)) {
        return $error;
    }

    if($error = validateConfirmPass($password, $confirm_password)) {
        return $error;
    }
}

function validateLogin($email, $password) {

    $fields = [
        "email" => $email,
        "password" => $password,
    ];

    foreach($fields as $fieldName => $value) {
        if($error = validateRequired($value, $fieldName)) {
            return $error;
        }
    }

    // if($error = validateEmail($email)) {
    //     return $error;
    // }

    // if($error = validatePassword($password)) {
    //     return $error;
    // }
}