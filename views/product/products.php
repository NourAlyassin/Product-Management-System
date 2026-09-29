<?php require "../../inc/header.php"; ?>

<div class="container content mt-4">

    <!-- Page Header -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Products Management</h1>
            <p class="text-muted mb-0">Manage all products in your store</p>
        </div>
        <a href="<?= $base ?>views/product/create.php" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Add Product
        </a>
    </div>

    <table class="table table-bordered table-hover align-middle mt-3">
        <thead class="table-dark text-center">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getProducts() as $product): ?>
                <tr>
                    <td><?= $product['id'] ?></td>
                    <td><?= $product['name'] ?></td>
                    <td><?= "$" . $product['price'] ?></td>
                    <td><?= $product['qty'] ?></td>
                    <td><?= "$" . $product['price'] * $product['qty'] ?></td>
                    <td>
                        <?php if (!empty($product['image'])): ?>
                            <img src="<?= $base ?>public/uploads/products/<?= $product['image'] ?>"
                                 width="70" height="70" style="object-fit: cover;">
                        <?php else: ?>
                            <span class="text-muted">No image</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center text-nowrap">
                        <a href="<?= $base ?>views/product/update.php?id=<?= $product['id'] ?>"
                           class="btn btn-sm btn-primary">Edit</a>
                        <a href="<?= $base ?>handlers/product/deleteProduct.php?id=<?= $product['id'] ?>"
                           class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require "../../inc/footer.php"; ?>