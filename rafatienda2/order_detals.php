<?php

 /* ok las plabras claves para activar el boton de pago son 
 
 not paid = a que no ha pagado 
 delivered = a que pago
 shipped = aun no se ha enviado  el pedido.
 
 */




include('server/conection.php');

if (isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    $order_status = $_POST['order_status'];
    
    // Preparar la consulta para obtener detalles del pedido
    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    
    if (!$stmt) {
        die('Error en la preparación de la consulta: ' . $conn->error);
    }
    
    $stmt->bind_param('i', $order_id);
    
    if (!$stmt->execute()) {
        die('Error al ejecutar la consulta: ' . $stmt->error);
    }
    
    // Obtener resultados
    $order_details = $stmt->get_result();

     $order_total_price = calcularTotalOrderPrice($order_details);

    // Verificar si hay resultados
    if ($order_details && $order_details->num_rows > 0) {
        // ... código para mostrar detalles ...
    } else {
        echo "No hay detalles disponibles para este pedido.";
    }
    
    $stmt->close();
} else {
    header('location: cuenta.php');
    exit;
}

function calcularTotalOrderPrice($order_details) {
    $total = '0';

    foreach($order_details as $row) {

      $product_price=  $row['product_price'];
      $product_quantity=  $row['product_quantity'];


      $total= $total+($product_price*$product_quantity);
    }

    return $total;


}


?>

<?php include('layouts/header_detalle.php') ?> 

   

   <!-- detalles ordenes -->
<section id="orders" class="orders container my-5 py-3">
    <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Detalles del Pedido</h2>
        <hr class="mx-auto">
    </div>

    <?php if ($order_details && $order_details->num_rows > 0) { ?>
        <table class="mt-5 pt-5">
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>
            <?php foreach ($order_details as $row ) { ?>
                <tr>
                    <td>
                        <div class="product-info">
                            <img src="assets/imgs/<?php echo $row['product_image']; ?>" alt="">
                            <div>
                                <p class="mt-3"><?php echo $row['product_name']; ?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span><?php echo $row['product_price']; ?></span>
                    </td>
                    <td>
                        <span><?php echo $row['product_quantity']; ?></span>
                    </td>
                    
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p>No hay detalles del pedido disponibles.</p>
    <?php } ?>


    <?php if ($order_status == "not paid" || $order_status == "No pagado"): ?>
    <form style="float: right;" method="POST" action="payment.php">
        <input type="hidden"  name="order_total_price" value="<?php echo $order_total_price;?>"/>
        <input type="hidden"  name="order_status" value="<?php echo $order_status;?>"/>
        <input type="submit" name="order_pay_btn"   class="btn btn-primary" value="Pagar ahora"/>
    </form>
   <?php endif; ?>

</section>
   








<?php include('layouts/footer.php') ?> 