<?php
 include('server/conection.php');
 
  $stmt= $conn->prepare("SELECT * FROM products");

  $stmt->execute();


  $products = $stmt->get_result();
 

?>
<!-- //este es el header de la tienda -->
 <?php include('layouts/header_tienda.php') ?>

    <section id="featured" class="my-5 py-5">
    <div class="container text-center mt-5 py-5">
        <h3>Productos</h3>
        <hr>
        <p>Aquí puedes comprar nuestros productos </p>
    </div>



    <div class="row mx-auto container">


      <?php while($row = $products->fetch_assoc()) {?>


       <!-- producto1 -->  
        <div onclick="window.location.href='details_product.html'" class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3 " src="assets/imgs/<?php echo $row['product_image'];?>"/>
             <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
             </div>
            <h5 class="p-name"><?php echo $row['product_name'];?></h5>
            <h4 class="p-price">$<?php echo $row['product_price'];?></h4>
            <a class="  btn shop-buy-btn" href="<?php echo "details_product.php?product_id=".$row['product_id'];?>">Comprar ahora</a>
        </div>

        <?php } ?>

          <nav area-label="page navigation example">
            <ul class="pagination mt-5">
                <li class="page-item"><a class="page-link" href="#">Atras</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
            </ul>
          </nav>




    </div>
 </section>


  <!-- Footer de la tienda -->
  <?php include('layouts/footer.php') ?> 