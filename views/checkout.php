<?php require "../inc/header.php"; ?>



<!-- Section -->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">

            <div class="col-4">
                <div class="border p-2">
                    <div class="products">
                        <ul class="list-unstyled">
                            <?php
                            $total = 0;
                            $cart  = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
                            $products = getProducts();

                            foreach ($cart as $id => $qty):
                                $product = null;
                                foreach ($products as $pro) {
                                    if ($pro['id'] == $id) {
                                        $product = $pro;
                                        break;
                                    }
                                }
                                if (!$product) continue;

                                $subtotal = $product['price'] * $qty;
                                $total += $subtotal;
                            ?>
                                <li class="border p-2 my-1">
                                    <?= $product['name'] ?><br><br>
                                    <span class="text-success mx-2 mr-auto bold">
                                        <?= $qty . "x" . $product['price'] . "$" ?>
                                    </span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <h3><?= "$" . $total ?></h3>
                </div>
            </div>


            <div class="col-8">
                <form action="../handlers/order/clientOrder.php" method="POST" class="form border my-2 p-3">

                    <?php if (isset($_SESSION['user'])): ?>
                        <div class="mb-3">
                            <label for="">name</label>
                            <input type="text" name="name" value="<?= $_SESSION['user']['name'] ?>" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" class="form-control">
                        </div>
                    <?php else: ?>
                        <div class="mb-3">
                            <label for="">name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input type="number" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="">Notes</label>
                        <input type="text" name="notes" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Send" class="btn btn-success">
                    </div>

                </form>
            </div>

        </div>
    </div>
</section>

<?php require "../inc/footer.php"; ?>