<?php
session_start();
include('server/conection.php');

// Verifica si el usuario NO está registrado, si es así, redirige a la página de inicio de sesión
if (!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit();
}

// Verifica si se ha enviado una solicitud para cerrar sesión
if (isset($_GET['logout'])) {
    // Elimina las variables de sesión
    unset($_SESSION['logged_in']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);

    // Destruye la sesión
    session_destroy();

    // Redirige a la página de inicio de sesión
    header('location: login.php');
    exit();
}

if (isset($_POST['change_password'])) {
    $new_password = $_POST['password'];
    $user_email = $_SESSION['user_email'];

    // Verificación de la contraseña
    if (strlen($new_password) < 6) {
        header('location: cuenta.php?error=La contraseña debe tener al menos 6 caracteres');
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
        $stmt->bind_param('ss', $hashed_password, $user_email);

        if ($stmt->execute()) {
            header('location: cuenta.php?message=La contraseña se actualizó correctamente');
        } else {
            header('location: cuenta.php?error=No pudimos actualizar la contraseña');
        }
        
        // Cerrar la consulta
        $stmt->close();
    }
}

// Obtener el pedido
if (isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    
    $stmt= $conn->prepare("SELECT * FROM orders WHERE user_id=? ");
    $stmt->bind_param('i', $user_id);
    
    $stmt->execute();
    
    $orders = $stmt->get_result();
    // Cerrar la consulta
    $stmt->close();
}
?>



<?php include('layouts/header_cuenta.php') ?> 

   <!-- Sección para la cuenta -->
   <section class="my-5 py-5">
       <div class="row container mx-auto">
           <!-- Información de la cuenta -->
           <div class="text-center mt-3 pt-5 col-lg-6 col-md-12 col-sm-12">
           <p style="color: green;"><?php if(isset($_GET['register_success'])){echo $_GET['register_success'];}?></p>
           <p style="color: green;"><?php if(isset($_GET['login_success'])){echo $_GET['login_success'];}?></p>
               <h3 class="font-weight-bold">Informacion De tu Cuenta</h3>
               <hr class="mx-auto">
               <div class="account-info">
                   <p>Nombre: <span><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></span></p>
                   <p>Correo: <span><?php if(isset($_SESSION['user_email'])){echo $_SESSION['user_email'];}?></span></p>
                   <p><a href="#orders" id="orders-btn">Tus Pedidos</a></p>
                   <p><a href="cuenta.php?logout=1" id="logout-btn">Cerrar Sesión</a></p>
               </div>
           </div>

           <!-- Formulario para cambiar la contraseña -->
           <div class="col-lg-6 col-md-12 col-sm-12">
           <form id="account-form" action="cuenta.php" method="post">
                <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                <p style="color: green;"><?php if(isset($_GET['message'])){echo $_GET['message'];}?></p>
                <h3>Cambiar Contraseña</h3>
                <hr class="mx-auto">
                <div class="form-group">
                    <label for="account-password">Contraseña Nueva</label>
                    <input type="password" class="form-control" id="account-password" placeholder="Contraseña" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Cambiar Contraseña" class="btn" id="change-pass-btn" name="change_password">
                </div>
            </form>
           </div>
       </div>
   </section>

   <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-2">
            <h2 class="font-weight-bold text-center">Tus Pedidos</h2>
            <hr class="mx-auto">
        </div>

        <table class="mt-5 pt-5">
            <tr>
                <th>Id Pedido</th>
                <th>Costo Pedido</th>
                <th>Status Pedido</th>
                <th>Fecha Pedido</th>
                <th>Detalles del  Pedido</th>
            </tr>
          <?php
             while( $row=$orders->fetch_assoc()){
          ?>
                      <tr>
                          <td>
                            <!-- <div class="product-info">
                              
                              <div>
                                <p class="mt-3"><?php echo $row['order_id']; ?></p>
                              </div>
                            </div> -->
                            <span><?php echo $row['order_id']; ?></span>
                          </td>
                          <td>
                            <span><?php echo $row['order_cost']; ?></span>
                          </td>

                          <td>
                            <span><?php echo $row['order_status']; ?></span>
                          </td>


                          <td>
                            <span><?php echo $row['order_date']; ?></span>
                          </td>
                          
                          <td>
                            <form method="POST" action="order_detals.php">
                                <input type="hidden" value="<?php echo $row['order_status']; ?>" name="order_status"/>
                                <input type="hidden" value="<?php echo $row['order_id']; ?>" name="order_id"/>
                                <input class="btn order-details-btn " name="order_details_btn" type="submit" value="Detalles">
                            </form>
                            
                        </td>

                      </tr>
             <?php } ?>
            
        </table>

       </section>

   <!-- Pie de página -->
   
   <?php include('layouts/footer.php') ?> 