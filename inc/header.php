<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require __DIR__ . "/../core/functions.php";

$base = '/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Shop Homepage - EraaSoft PMS Template</title>
    <link rel="icon" type="image/x-icon" href="<?= $base ?>public/assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="<?= $base ?>public/css/styles.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column min-vh-100">
<?php require __DIR__ . "/nav.php"; ?>
<?php showMessage() ?>