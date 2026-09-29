<?php  
require "../inc/header.php";  

$products = getProducts();  
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];  
$total = 0;  
?> 


<!-- Section-->
<section class="py-5">  
    <div class="container px-4 px-lg-5 mt-5">  
        <div class="row">  
            <div class="col-12">  
 
                <form action="../handlers/order/updateQuantity.php" method="POST">  

                    <table class="table table-bordered">  
                        <thead>  
                            <tr>  
                                <th scope="col">#</th>  
                                <th scope="col">Product</th>  
                                <th scope="col">Price</th>  
                                <th scope="col">Quantity</th>  
                                <th scope="col">Total</th>  
                                <th scope="col">Delete</th>  
                                <th scope="col">Update</th>  
                            </tr>  
                        </thead>  
                        <tbody>  
                            <?php if (empty($cart)): ?>  
                                <tr>  
                                    <td colspan="7" class="text-center">No product in the cart</td>  
                                </tr>  
                            <?php else: ?>  

                                <?php  
                                $counter = 0;  
                                foreach ($_SESSION['cart'] as $qty) {  
                                    $counter += $qty;  
                                }  

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
                                    <tr>  
                                        <td><?= $counter ?></td>  
                                        <td><?= $product['name'] ?></td>  
                                        <td><?= "$" . $product['price'] ?></td>  
                                        <td>  

                                            <input type="number"  
                                                   name="quantity[<?= $product['id'] ?>]"  
                                                   value="<?= $qty ?>"  
                                                   min="1">  
                                        </td>  
                                        <td><?= "$" . $subtotal ?></td>  
                                        <td>  
                                            <a href="../handlers/order/deleteOrder.php?id=<?= $product['id'] ?>" class="btn btn-danger">Delete</a>  
                                        </td>  
                                        <td>
                                            
                                            <button type="submit" class="btn btn-warning">Update</button>  
                                        </td>  
                                    </tr>  
                                <?php endforeach; ?>  
                            <?php endif; ?>  
                        </tbody>  

                        <?php if (!empty($cart)): ?>  
                        <tfoot>  
                            <tr>  
                                <td colspan="2"></td>  
                                <td colspan="3">  
                                    <h3 class="text-end">Total: <?= "$" . $total ?></h3>  
                                </td>  
                                <td>  
                                    <a href="checkout.php" class="btn btn-primary">Checkout</a>  
                                </td>  
                            </tr>  
                        </tfoot>  
                        <?php endif; ?>  
                  </table>
              </form>
            </div>
        </div>
    </div>
</section>

<?php require "../inc/footer.php"; ?> 
