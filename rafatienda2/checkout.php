<?php
session_start();

if (!empty($_SESSION['cart'])) {
    if (isset($_SESSION['total'])) {
        $total = floatval($_SESSION['total']); // Asegurar que sea un número flotante
    } else {
        $total = 0;
    }
} else {
    header('location: index.php');
}
?>



<?php include('layouts/header_checkout.php') ?> 
     <!-- formulario para envio de pedido -->
          
     <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
             <h2 class="form-weight-bold ">Datos de envio</h2>
             <hr class="mx-auto">
        </div>

        <div class="mx-auto container">
            <form id="checkout-form"   method="POST" action="server/place_order.php">
                <p class="text-center" style="color: red;">
                <?php if (isset($_GET['message'])){ echo $_GET['message'];}?>
                <?php if (isset($_GET['message'])){ ?>
                
                       <a class="btn btn-primary" href="login.php">Iniciar sesion</a>

                    <?php }?>
               </p>
                <div class="form-group checkout-small-element ">
                    <label for="">Nombre</label>
                    <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Nombre completo" required>
                </div>
                <div class="form-group  checkout-small-element ">
                    <label for="">Correo</label>
                    <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Correo"required>
                </div>
                <div class="form-group  checkout-small-element ">
                    <label for="">Tel</label>
                    <input type="num" class="form-control" id="checkout-phone" name="phone" placeholder="Numero"required>
                </div>

                <div class="form-group  checkout-small-element ">
                    <label for="">Ciudad</label>
                    <input type="text" class="form-control" id="checkout-city" name="city" placeholder="Ciudad"required>
                </div>


                <div class="form-group  checkout-large-element ">
                    <label for="">Direccion</label>
                    <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Direccion de  envio"required>
                </div>

                <div class="form-group checkout-btn-container">
                    <p>Total de su Pedido: $ <?php echo number_format($total, 2); ?></p>
                    <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Realizar Pedido" />
                </div>

                

            </form>
        </div>

       </section>

    

       <?php include('layouts/footer.php') ?> 