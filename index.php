<?php

require "inc/header.php";

$base = $base ?? '';
$products = getProducts();
if (!is_array($products)) {
    $products = [];
}

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            <?php foreach ($products as $product): ?>
                <div class="col mb-5">
                    <div class="card h-100">

                        <!-- Product Image -->
                        <?php if (!empty($product['image'])): ?>
                            <img class="card-img-top"
                                 src="<?= htmlspecialchars($base . 'public/uploads/products/' . $product['image']) ?>"
                                 alt="<?= htmlspecialchars($product['name']) ?>"
                                 style="height:200px; object-fit:cover;" />
                        <?php else: ?>
                            <img class="card-img-top"
                                 src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                 alt="no image" style="height:200px; object-fit:cover;" />
                        <?php endif; ?>

                        <!-- Product Details -->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?= htmlspecialchars($product['name']) ?></h5>
                                $<?= number_format((float) $product['price'], 2) ?>
                            </div>
                        </div>

                        <!-- Product Actions -->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn btn-outline-dark mt-auto"
                                   href="handlers/order/addToCart.php?id=<?= (int) $product['id'] ?>">Add to cart</a>
                            </div>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>

<?php require "inc/footer.php"; ?>