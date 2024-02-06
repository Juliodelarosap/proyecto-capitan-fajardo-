<?php
include('conection.php');
session_start();

if (!isset($_SESSION['logged_in'])) {
  header('location: ../checkout.php?=Porfavor inicia sesion ');
  exit;
} else {


  date_default_timezone_set('America/Santo_Domingo');
  if (isset($_POST['place_order'])) {

    // 1. lo primero seria obtener los datos del ususario  y gfuardarlos en la base de datos
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $order_cost = $_SESSION['total'];
    $order_status = "not paid";
    $user_id = $_SESSION['user_id'];
    $order_date = date('y-m-d H:i:s');


    //ahora los voy a guardar en la base de datos.
    $stmt = $conn->prepare("INSERT INTO orders (order_cost,order_status,user_id,user_phone,user_city,user_address,order_date)
                                                  VALUES (?,?,?,?,?,?,?); ");
    $stmt->bind_param('isiisss', $order_cost, $order_status, $user_id, $phone, $city, $address, $order_date);

    $stmt_status = $stmt->execute();
    if (!$stmt_status) {
      header('location: index.php');
      exit;
    }
    // 2. almacenar la informacion del pedido  en l abase de datos 
    $order_id = $stmt->insert_id;


    // 3. obtener los productos del carro(desde la session ).
    foreach ($_SESSION['cart'] as $key => $value) {
      $product = $_SESSION['cart'][$key];
      $product_id = $product['product_id'];
      $product_name = $product['product_name'];
      $product_image = $product['product_image'];
      $product_price = $product['product_price'];
      $product_quantity = $product['product_quantity'];

      //4. almacenar todos los iteml en una sola orden por usuario.
      $stmt1 = $conn->prepare("INSERT INTO order_items (order_id,product_id,product_name,product_image,product_price,product_quantity,user_id,order_date)
                                                  VALUES(?,?,?,?,?,?,?,?)");
      $stmt1->bind_param('iissiiis', $order_id, $product_id, $product_name, $product_image, $product_price, $product_quantity, $user_id, $order_date);

      $stmt1->execute();
    }
    //5. eliminar todo del carro una vez realizada la orden tambien debo generar un pequeno dely para pasar a metodos de pago.
    //    unset($_SESSION['cart']);



    //6. informarle al usuario que l aorden esta procesada o hubo un erro.

    header('location: ../payment.php?order_status=pedido realizado con exito');
  }
}
