<?php
require "../../inc/header.php";

$id = $_GET['id'];
if (!isset($id)) {
    setMessage("danger", "No Product Selected!");
    header("Location: products.php");
    exit;
}

$products = getProducts();
$product = null;
foreach($products as $pro) {
    if($pro['id'] == $id) {
        $product = $pro;
        break;
    }
}

?>

<div class="container content mt-4">

    <h2>Update Product</h2>
    <form action="../../handlers/product/updateProduct.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" value="<?= $product['name'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input type="number" id="price" name="price" value="<?= $product['price'] ?>" class="form-control">
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="<?= $product['qty'] ?>" class="form-control">
        </div>

        <div class="mb-2">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" id="image" value="<?= $product['image'] ?>"
                class="form-control form-control-sm" accept="image/*">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require "../../inc/footer.php"; ?>