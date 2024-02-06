<?php
session_start();
include('server/conection.php');

if(isset($_SESSION['logged_in'])){
    header('location: cuenta.php');
    exit();
}

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Verifico si los campos están vacíos
    if (empty($name) || empty($email) || empty($password)) {
        header('location: registro.php?error=Todos los campos son obligatorios');
        exit();
    }

    // Elimino espacios en blanco alrededor de la contraseña
    $password = trim($password);

    // Verifico si la contraseña tiene al menos 6 caracteres
    if (strlen($password) < 6) {
        header('location: registro.php?error=La contraseña debe tener al menos 6 caracteres');
        exit();
    }

    // Verifico si el correo ya existe en la base de datos
    $stmt1 = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_email=?");
    $stmt1->bind_param('s', $email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->fetch();
    $stmt1->close();

    // Si el usuario ya registro ese email, no se le permite continuar
    if ($num_rows != 0) {
        header('location: registro.php?error=Este correo ya existe');
        exit();
    }

    // Creamos un nuevo usuario
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, user_password) 
    VALUES (?, ?, ?)");

    $stmt->bind_param('sss', $name, $email, $hashed_password);

   

    // Si la cuenta se crea exitosamente
    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $name;
        $_SESSION['logged_in'] = true;
        header('location: cuenta.php?register_success=Registro exitoso.');
        exit();
    } else {
        header('location: registro.php?error=No pudimos crear tu registro, intenta en otro momento.');
        exit();
    }
}
?>

<?php include('layouts/header_registro.php') ?> 

  <!-- Sección para el registro -->
<section class="my-5 py-5">
    <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Registrate</h2>
        <hr class="mx-auto">
    </div>

    <div class="mx-auto container">
        <form id="register-form" method="POST" action="registro.php">
            <p style="color: red;"><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
            <div class="form-group">
                <label for="register-name">Nombre</label>
                <input type="text" class="form-control" id="register-name" name="name" placeholder="Nombre completo"  required>
            </div>
            <div class="form-group">
                <label for="register-email">Correo</label>
                <input type="text" class="form-control" id="register-email" name="email" placeholder="Correo" required>
            </div>
            <div class="form-group">
                <label for="register-password">Contraseña</label>
                <input type="password" class="form-control" id="register-password" name="password" placeholder="Contraseña" required>
            </div>

            <div class="form-group">
              
            </div>

            <div class="form-group">
                <input type="submit" class="btn" id="register-btn" name="register" value="Registrarse"/>
            </div>

            <div class="form-group">
                <a id="login-url" href="login.php" class="btn">¿Ya tienes una cuenta? Iniciar Sesión </a>
            </div>
        </form>
    </div>
</section>



<?php include('layouts/footer.php') ?>      