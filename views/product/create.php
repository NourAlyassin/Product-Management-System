<?php require "../../inc/header.php"; ?>

<div class="container content mt-4">

    <h2>Add Product</h2>
    <form action="<?= $base ?>handlers/product/createProduct.php" method="POST" enctype="multipart/form-data" style="max-width: 420px;">
        <div class="mb-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control form-control-sm">
        </div>

        <div class="mb-2">
            <label for="price" class="form-label">Price</label>
            <input type="number" id="price" name="price" class="form-control form-control-sm">
        </div>

        <div class="mb-2">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control form-control-sm">
        </div>

        <div class="mb-2">
            <label for="image" class="form-label">Product Image</label>
            <input type="file" name="image" id="image"
                class="form-control form-control-sm" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<?php require "../../inc/footer.php"; ?>