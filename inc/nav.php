<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="<?= $base ?>">EraaSoft PMS</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= $base ?>index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= $base ?>views/about.php">About</a>
                </li>

                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base ?>views/product/create.php">Add Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base ?>views/product/products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base ?>handlers/auth/logOut.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base ?>views/auth/register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $base ?>views/auth/login.php">Login</a>
                    </li>
                <?php endif; ?>

            </ul>

            <?php
            $counter = 0;

            if (isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $qty) {
                    $counter += $qty;
                }
            }

            ?>

            <form action="<?= $base ?>../views/cart.php" name="add_to_cart" class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill"><?= $counter; ?></span>
                </button>
            </form>
        </div>
    </div>
</nav>


<!-- Header-->
<header class="bg-dark py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Shop in style</h1>
            <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
        </div>
    </div>
</header>