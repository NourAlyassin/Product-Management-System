<?php


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


function setMessage($type, $message) {
    $_SESSION['message'] = [
        "type" => $type,
        "text" => $message
    ];
}

function showMessage() {
    if(isset($_SESSION['message'])) {
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];

        echo "<div class='alert alert-$type'>$text</div>";

        unset($_SESSION['message']);
    }
}

function createProduct($name, $price, $qty, $image) {

    $productJson = __DIR__ . "/../data/products.json";
    $oldData = file_get_contents($productJson);
    $oldDataProducts = json_decode($oldData, true);

    if(empty($oldDataProducts)){
        $newId = 1;
    } else {
        $ids = array_column($oldDataProducts, 'id');
        $newId = max($ids) + 1;
    }

    $empData = [
        "id" => $newId,
        "name" => $name,
        "price" => $price,
        "qty" => $qty,
        "image" => $image
    ];
    
    $oldDataProducts[] = $empData;
    file_put_contents($productJson, json_encode($oldDataProducts, JSON_PRETTY_PRINT));

    return true;
}

function getProducts() {

    $productJson = __DIR__ . "/../data/products.json";
    if(file_exists($productJson)) {
        return json_decode(file_get_contents($productJson), true);
    }
    return [];
}

function updateProduct($id, $name, $price, $qty, $imageName = null) {
    $productJson = __DIR__ . "/../data/products.json";
    $oldData = file_get_contents($productJson);
    $oldDataProducts = json_decode($oldData, true);

     $found = false;
    $oldImage = null;

    foreach ($oldDataProducts as &$pro) {
        if ($pro['id'] == $id) {
            $pro['name']  = $name;
            $pro['price'] = $price;
            $pro['qty']   = $qty;

            $oldImage = $pro['image'] ?? null;

            if (!empty($imageName)) {
                $pro['image'] = $imageName;
            }

            $found = true;
            break;
        }
    }

    if ($found) {
        file_put_contents($productJson, json_encode($oldDataProducts, JSON_PRETTY_PRINT));

        if (!empty($imageName) && !empty($oldImage) && $oldImage !== $imageName) {
            $oldPath = __DIR__ . "/../public/uploads/products/" . basename($oldImage);
            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }
        return true;
    }
    return false;
}

function deleteProduct($id) {
    $productJson = __DIR__ . "/../data/products.json";
    $oldData = file_get_contents($productJson);
    $oldDataProducts = json_decode($oldData, true);

    $found = false;
    $imageToDelete = null;

    foreach ($oldDataProducts as $key => $emp) {
        if ($emp['id'] == $id) {
            $imageToDelete = $emp['image'] ?? null;

            unset($oldDataProducts[$key]);
            $found = true;
            break;
        }
    }

    if ($found) {
        $emps = array_values($oldDataProducts);
        file_put_contents($productJson, json_encode($emps, JSON_PRETTY_PRINT));

        if (!empty($imageToDelete)) {
            $imagePath = __DIR__ . "/../public/uploads/products/" . $imageToDelete;
            if (is_file($imagePath)) {
                unlink($imagePath);
            }
        }

        return true;
    }
    return false;
}

function register($name, $email, $password, $confirm_password){

    $userJson = __DIR__ . "/../data/users.json";
    $scratchData = file_get_contents($userJson);
    $scratchDataUsers = json_decode($scratchData, true);


    $hashPassword = password_hash($password, PASSWORD_DEFAULT);
    $usersData = [
        "name" => $name,
        "email" => $email,
        "password" => $hashPassword
    ];
    
    $scratchDataUsers[] = $usersData;
    file_put_contents($userJson, json_encode($scratchDataUsers, JSON_PRETTY_PRINT));

    $_SESSION['user'] = [
    "name" => $name,
    "email" => $email
];
    return true;
}

function login($email, $password) {

    $userJson = __DIR__ . "/../data/users.json";
    $oldData = file_get_contents($userJson);
    $users = json_decode($oldData, true);

    foreach($users as $user) {
        if($user['email'] == $email && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                "name" => $user['name'],
                "email" => $user['email']
            ];
            return true;
        }
    }
    return false;
}