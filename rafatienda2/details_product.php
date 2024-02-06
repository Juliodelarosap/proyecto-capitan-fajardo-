<?php
        include('server/conection.php');

        $product_id = $_GET['product_id'];

        $stmt= $conn->prepare("SELECT * FROM products WHERE product_id =? ");
        
        $stmt->bind_param("i",$product_id);
        
        $stmt->execute();


        $product = $stmt->get_result(); // este me retorna un areglo 










 if(isset($_GET['product_id'])){

    //no tengo mi product id pasa el header location
 }else{
    header('location: index.php');
 }




?>

<?php include('layouts/header_detalle_producto.php') ?> 

       <!-- detallle del producto -->

     <section class=" container single-product my-5 pt-5">



        <div class="row mt-5">
             <?php   while($row = $product->fetch_assoc()){?><!--ciclo while para recorrer el areglo que me devuelve optener productos -->

           
         <div class="col-lg-5 col-md-6 col-sm-12">
            <img  class="img-fluid w-100 pd-1" src="assets/imgs/<?php echo $row['product_image']; ?>" id="mainImg"/>
            <div class="small-img-group">
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_image']; ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_image2']; ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_image3']; ?>" width="100%" class="small-img"/>
                </div>
                <div class="small-img-col">
                    <img src="assets/imgs/<?php echo $row['product_image4']; ?>" width="100%" class="small-img"/>
                </div>
            </div>
         </div>

        

          <div class="col-lg-6 col-md-12 col-12 ">
            <h6><?php echo $row['product_category']; ?></h6>
            <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
            <h2>$<?php echo $row['product_price']; ?></h2>
             
            <form action="carrito.php" method="POST"> 
            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
            <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
            <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
            <input type="number" name="product_quantity" value="1">
            <button class="buy-btn" type="submit" name="add_to_cart">Agregar al carrito</button>
            </form>  
            
            <h4 class="mt-5 mb-5">Detalles del Producto</h4>
            <span><?php echo $row['product_description']; ?>
            </span>
          </div>
          
          <?php }?>
        </div>
     </section>




      <!-- productos relacionados -->
     <section id="featured" class="my-5 pb5">
        <div class="container text-center mt-5 py-5">
            <h3>Productos relacionados</h3>
            <hr>
            
        </div>
        <div class="row mx-auto container-fluid">

           <!-- producto1 -->  
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3 " src="assets/imgs/feactured1.png"/>
                 <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                 </div>
                <h5 class="p-name">Mochilas Deportivas</h5>
                <h4 class="p-price">$2,500</h4>
                <button class="buy-now">Comprar ahora</button>
            </div>

            <!-- producto2 -->

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3 " src="assets/imgs/feactured2.png"/>
                 <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                 </div>
                <h5 class="p-name">Mochilas Deportivas</h5>
                <h4 class="p-price">$2,500</h4>
                <button class="buy-now">Comprar ahora</button>
            </div>
            <!-- producto3 -->
            
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3 " src="assets/imgs/feactured3.png"/>
                 <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                 </div>
                <h5 class="p-name">Mochilas Deportivas</h5>
                <h4 class="p-price">$2,500</h4>
                <button class="buy-now">Comprar ahora</button>
            </div>


            <!-- producto4 -->

            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <img class="img-fluid mb-3 " src="assets/imgs/feactured4.png"/>
                 <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                 </div>
                <h5 class="p-name">Mochilas Deportivas</h5>
                <h4 class="p-price">$2,500</h4>
                <button class="buy-now">Comprar ahora</button>
            </div>
        </div>
     </section>









      <footer class="mt-5 py-5">
        <div class="row container mx-auto pt-5">
         <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
          <img class="logo" src="assets/imgs/icono.png" alt="">
          <p class="pt-3">Ofrecemos los mejores productos a los precios más asequibles.</p>
         </div>
         
         <div class=" footer-one col-lg-3 col-md-6 col-sm-12">
            <h5 class="pb-2">Featured</h5>
            <ul class="text-uppercase">
             <li><a href="#">Hombre</a></li>
             <li><a href="#">Mujer</a></li>
             <li><a href="#">Ninos</a></li>
             <li><a href="#">Nuevos Productos</a></li>
             <li><a href="#">Mochilas</a></li>
            </ul>
            </div>
 
            <div class=" footer-one col-lg-3 col-md-6 col-sm-12">   
             <h5 class="pb-2">Contacto</h5>
             <div>
                 <h6 class="text-uppercase">Direccion</h6>
                 <p>Santo Domingo,Distrito nacional</p>
             </div>
             <div>
                 <h6 class="text-uppercase">Telefonos</h6>
                 <p> Cel:+1809-856-2723</p>
             </div>
             <div>
                 <h6 class="text-uppercase">Correo</h6>
                 <p>rftechnologydr@gmail.com</p>
             </div>
            </div>
 
            
        </div>
 
         <div class="copyright mt-5">
             <div class="row container mx-auto">
                 <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                     <img src="assets/imgs/pay.jpg" />
                 </div>
                 <div class="col-lg-3 col-md-6 col-sm-12 mb-4 text-nowrap mb-2">
                     <p>Rftechnology @ 2025 All Right Reserved</p>
                 </div>
 
                 <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                     <a href="#"><i class="fab fa-facebook"></i></a>
                     <a href="#"><i class="fab fa-instagram"></i></a>
                     <a href="#"><i class="fab fa-whatsapp"></i></a>
                 </div>
 
             </div>
         </div>
 
 
 
      </footer>
 
 
     <!-- bostrap cdn js -->
     <script>


     //este scriptr es para cambiar entre las imagenes pequenas
      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img");

     for(let i=0; i<4; i++){
        smallImg[i].onclick = function(){
        mainImg.src = smallImg[i].src;
      }
     }


      

     


     </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 </body>
 </html>