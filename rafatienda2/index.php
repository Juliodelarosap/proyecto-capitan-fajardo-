   
 <?php include('layouts/header.php') ?>


    <!-- home o menu  -->

    <section id="home">
        <div class="container">
            <h5>NUEVAS MOCHILAS</h5>
            <h1><span>Los Mejores Precios</span> de Temporada</h1>
            <p>Las mejores Mochilas , Bultos estan  en RFtecnology</p>
            <button>Comprar ahora</button>
        </div>
    </section>
    <!-- aaqui termina esta section -->

    <!-- anuncios -->

    <section id="brand" class="container">
      <div class="row">
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12 " src="assets/imgs/brand1.png" >
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12 " src="assets/imgs/brand2.png" >
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12 " src="assets/imgs/brand1.png" >
          <img class="img-fluid col-lg-3 col-md-6 col-sm-12 " src="assets/imgs/brand2.png" >
          
      </div>
    </section>
    <!-- aaqui termina esta section -->

    <!-- nuevos productos -->
    <section id="new" class="w-100">
     <div class="row p-0 m-0">
        <!-- producto1 -->

      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid  " src="assets/imgs/product-1.png" >
        <div class="details">
            <h2>Las Mejores Mochilas</h2>
            <button class="text-uppercase">Comprar ahora</button>
        </div>
      </div>
      <!-- producto2 -->

      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid  " src="assets/imgs/product-8.png" >
        <div class="details">
            <h2>Los Mejores Bultos de Mano</h2>
            <button class="text-uppercase">Comprar ahora</button>
        </div>
      </div>

      <!-- producto3 -->

      <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
        <img class="img-fluid  " src="assets/imgs/product-9.png" >
        <div class="details">
            <h2>Los Mejores Bultos</h2>
            <button class="text-uppercase">Comprar ahora</button>
        </div>
      </div>

     </div>
    </section>
    <!-- aaqui termina esta section -->

     <!-- Presentacion productos -->


     <section id="featured" class="my-5 pb5">
        <div class="container text-center mt-5 py-5">
            <h3>Productos Destacados</h3>
            <hr>
            <p>Aquí puedes consultar nuestros productos destacados</p>
        </div>
        <div class="row mx-auto container-fluid">
              <?php include('server/optener_productos_anuncios.php');?>
              <?php
                 while($row = $featured_products->fetch_assoc()){
              ?>
           <!-- producto1 -->  
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3 " src="assets/imgs/<?php echo $row['product_image']; ?>"/>
                 <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                 </div>
                <h5 class="p-name"><?php echo $row['product_name'];?></h5>
                <h4 class="p-price">$<?php echo $row['product_price'];?></h4>
                 <a href="<?php echo "details_product.php?product_id=". $row['product_id'];?>"><button class="buy-now">Comprar ahora</button></a>
                </div>

               <?php }?>

            </div>

            
     </section>
      <!-- aaqui termina esta section -->
      <!-- Banner-->

      <section id="banner" class="my-5 py-5">
       <div class="container">
        <h4>Venta de Mitad de Temporada</h4>
        <h1>Bange Collection <br> Hasta 5% de Descuento</h1>
        <button class="text-uppercase">Comprar ahora</button>
       </div>
      </section>
     <!-- aaqui termina esta section -->

      <!-- bultos  y mochilas -->

      <section id="featured" class="my-5 ">
        <div class="container text-center mt-5 py-5">
            <h3>Bultos y Mochilas</h3>
            <hr>
            <p>Aquí puedes consultar nuestros bultos y mochilas </p>
        </div>
        <div class="row mx-auto container-fluid">
          <?php include('server/optener_mochilas.php')?>
          <?php
                 while($row = $mochilas_products->fetch_assoc()){
              ?>
           <!-- producto1 -->  
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3 " src="assets/imgs/<?php echo $row['product_image']?>"/>
                 <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                 </div>
                <h5 class="p-name"><?php echo $row['product_name']?></h5>
                <h4 class="p-price">$<?php echo $row['product_price']?></h4>
                <button class="buy-now">Comprar ahora</button>
            </div>

            <?php }?>
        </div>
     </section>

     <!-- aaqui termina esta section -->

     <!-- Footer de la tienda -->
     <?php include('layouts/footer.php') ?>
    