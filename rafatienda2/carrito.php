<?php

session_start();

// me aseguro de que el carrito esté definido y sea un array
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// me aseguro de que el total esté definido
if (!isset($_SESSION['total'])) {
    $_SESSION['total'] = 0;
}

// anado el  producto al carrito
if (isset($_POST['add_to_cart'])) {
    // Si el usuario ya tiene productos en el carrito
    if (isset($_SESSION['cart'])) {
        $product_id = $_POST['product_id'];

        // Verificar si el producto ya existe en el carrito
        if (isset($_SESSION['cart'][$product_id])) {
            echo '<script>alert("Este producto ya fue agregado a su carrito")</script>';
        } else {
            $product_array = array(
                'product_id' => $product_id,
                'product_name' => $_POST['product_name'],
                'product_price' => $_POST['product_price'],
                'product_image' => $_POST['product_image'],
                'product_quantity' => $_POST['product_quantity']
            );

            $_SESSION['cart'][$product_id] = $product_array;
        }
    } else {
        // Si es el primer producto en el carrito
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
            'product_id' => $product_id,
            'product_name' => $product_name,
            'product_price' => $product_price,
            'product_image' => $product_image,
            'product_quantity' => $product_quantity
        );

        $_SESSION['cart'][$product_id] = $product_array;
    }

    // Calculo total
    calcularTotalCarrito();
}

// aqui se efectua  la eliminacion de  productos del carrito
else if (isset($_POST['remove_product'])) {
    $product_id = $_POST['product_id'];
    unset($_SESSION['cart'][$product_id]);
    // Calculo total
    calcularTotalCarrito();
}

// Editar cantidad del producto en el carrito
else if(isset($_POST['edit_quantity'])){
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];

    // Obtengo el producto del array de la sesión
    $product_array = $_SESSION['cart'][$product_id];
    
    // Actualizo la cantidad del producto
    $product_array['product_quantity'] = $product_quantity;

    // Retorno mi arreglo nuevamente
    $_SESSION['cart'][$product_id] = $product_array;

    // Calculo total
    calcularTotalCarrito();
}

// Redireccionar si no hay operaciones validadas
else {
    // header('location:index.php');
}

// aqui calculo el total de elementos del carro
function calcularTotalCarrito() {
    $total = '0';

    foreach ($_SESSION['cart'] as $key => $value) {
        $price = $value['product_price'];
        $quantity = $value['product_quantity'];

        //  aqui se multiplica precio y cantidad usando bcmul
        $subtotal = bcmul($price, $quantity, 2);

        // sumamaos usando bcadd
        $total = bcadd($total, $subtotal, 2);
    }

    // almacenamos el total en la session
    $_SESSION['total'] = $total;
}

?>




<?php include('layouts/header_carrito.php') ?> 





        <!-- carrito de compras  -->
       <section class="cart container my-5 py-5">
        <div class="container mt-5">
            <h2 class="font-weight-bolde">Tu carrito</h2>
            <hr>
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>SubTotal</th>
            </tr>


           <?php 
             foreach($_SESSION['cart'] as $key => $value){
           ?>




            <tr>
                <td>
                    <div class="product-info">
                        <img src="assets/imgs/<?php echo $value['product_image'];?> "/>
                        <div>
                            <p><?php echo $value['product_name']?></p>
                            <small><span>$</span><?php echo $value['product_price'];?></small>
                            <br>
                            <form  method="POST" action="carrito.php">
                                <input type="hidden" name="product_id" value="<?php echo $value['product_id'];?>">
                            <input  type="submit"  name="remove_product" class="remove-btn" value="remove"/>
                            </form>
                        </div>
                    </div>
                </td>
                <td>
                    
                    <form method="POST" action="carrito.php">
                    <input type="hidden"   name="product_id" value="<?php echo $value['product_id'];?>">
                    <input type="number" name="product_quantity" value="<?php echo $value['product_quantity'];?>"/>
                    <input type="submit" class="edit-btn" value="Edit"  name="edit_quantity">
                    </form>
                </td>

                <td>
                    <span >$</span>
                    <span class="product-price"><?php echo $value['product_quantity'] * $value['product_price']; ?></span>
                </td>
            </tr>

           
          <?php } ?>
            
        </table>

        <div class="cart-total">
            <table>
              <tr>
                <td>Total</td>
                <td>$<?php echo $_SESSION['total']; ?></td>
              </tr>
            </table>
        </div>
        
        <div class="checkout-container">
        <form method="POST" action="checkout.php">
        <input type="submit" class="btn checkout-btn" value="Revisar Pedido" name="checkout">
        </form>
        </div>

       </section>





       <?php include('layouts/footer.php') ?> 