<?php
session_start();
include('server/conection.php');

if (isset($_SESSION['logged_in'])) {
    header('location: cuenta.php');
    exit();
}

if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        header('location: login.php?error=Por favor, proporciona tanto el correo electrónico como la contraseña');
        exit();
    }

    $STMT = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email = ? LIMIT 1");
    $STMT->bind_param('s', $email);

    if ($STMT->execute()) {
        $STMT->bind_result($user_id, $user_name, $user_email, $user_password);
        $STMT->store_result();

        if ($STMT->num_rows() == 1) {
            $STMT->fetch();

            // Verificar la contraseña
            if (password_verify($password, $user_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_name'] = $user_name;
                $_SESSION['user_email'] = $user_email;
                $_SESSION['logged_in'] = true;

                header('location: cuenta.php?login_success=Inicio de sesión correctamente.');
            } else {
                header('location: login.php?error=Contraseña incorrecta');
            }
        } else {
            header('location: login.php?error=Usuario no encontrado');
        }
    } else {
        // error
        header('location: login.php?error=Algo salió mal');
    }

    $STMT->close();
}
?>




<?php include('layouts/header_login.php') ?> 


     <!-- seccion para el login  -->
       <section class="my-5 py-5">
        <div class="container text-center mt-3 pt-5">
             <h2 class="form-weight-bold ">Login</h2>
             <hr class="mx-auto">
        </div>

        <div class="mx-auto container">
            <form id="login-form" method="POST" action="login.php">
              <p style="color: red;" class="text-center"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                <div class="form-group ">
                    <label for="">Email</label>
                    <input type="text" class="form-control" id="login-email" name="email" placeholder="Correo">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="login-password" name="password" placeholder="Contraseña">
                </div>

                <div class="form-group">
                    <input type="submit" class="btn" id="login-btn" name="login_btn" value="Iniciar Sesion"/>
                </div>

                <div class="form-group">
                   <a id="register-url" href="registro.php"  class="btn">¿Aún no tienes una cuenta? Registrarse </a>
                </div>

            </form>
        </div>

       </section>














       <?php include('layouts/footer.php') ?> 