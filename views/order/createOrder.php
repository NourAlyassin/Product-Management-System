<?php require "../../inc/header.php";

$id = $_GET['id'];
if (!isset($id)) {
    setMessage("danger", "No product selected");
    header("Location:../../index.php");
    exit;
}

$products = getProducts();
$product = null;
foreach ($products as $pro) {
    if ($pro['id'] == $id) {
        $product = $pro;
        break;
    }
}

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <form action="../../handlers/order/addToCart.php" method="POST" class="form border my-2 p-3" enctype="multipart/form-data">


                    <div class="mb-3">
                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control" value="<?php echo $product['name'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Price</label>
                            <input type="number" name="price" id="" class="form-control" value="<?php echo $product['price'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Quantity</label>
                            <input type="number" name="quantity" id="" class="form-control" value="">
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Send" name="submit" id="" class="btn btn-success">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?php require "../../inc/footer.php"; ?>