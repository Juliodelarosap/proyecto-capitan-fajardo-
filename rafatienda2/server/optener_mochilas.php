<?php
 include('conection.php');
 
  $stmt= $conn->prepare("SELECT * FROM products WHERE product_category='mochilas' LIMIT 4  ");

  $stmt->execute();


  $mochilas_products = $stmt->get_result();
 

?>