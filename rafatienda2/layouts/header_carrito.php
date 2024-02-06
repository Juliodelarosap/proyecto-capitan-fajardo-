<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- mis estilos css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- bostrap cdn css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- fontawesome cdn  -->
   <script src="https://kit.fontawesome.com/6b54a05747.js" crossorigin="anonymous"></script>

    <title>RFtecnology</title>

    <style>
    .cart table{
        width: 100%;
        border-collapse: collapse;
    }
    .cart .product-info{
      display: flex;
      flex-wrap: wrap;
    }

    .cart th{
        text-align: left;
        padding: 5px 10px;
        color: #fff;
        background-color: rgb(14, 79, 165);
    }

    .cart td{
        padding: 10px 20px;
    }
    .cart td img{
        width: 80px;
        height: 80px;
        margin-right: 10px;
    }
    .cart td input{
        width: 40px;
        height: 30px;
        padding: 5px;
    }
    .cart td a{
        color: rgb(14, 79, 165);
        
    }
    .cart .remove-btn{
        color: rgb(14, 79, 165);
        text-decoration: none;
        font-size: 14px;
        background-color: #fff ;
        border: none;
        width: 100%;
    }
    .cart .edit-btn{
        color:rgb(14, 79, 165); 
        text-decoration: none;
        font-size: 15px;
        background-color: #fff ;
        border: none;
      
    }

    .cart .product-info p{
        margin: 3px;
    }

    .cart input:focus{
    outline: none;
}

.cart-total{
    display: flex;
    justify-content: flex-end;

}

.cart-total table{
    width: 100%;
    max-width: 500px;
    border-top: 3px solid rgb(14, 79, 165); 
}

td:last-child{
    text-align: right;
}
th:last-child{
    text-align: right;
}

.checkout-container{
    display: flex;
    justify-content: flex-end;
}


.checkout-btn{
   
    background-color: rgb(14, 79, 165); 
    color: #fff;
}
    </style>
</head>
<body>
    <!-- barra de navegacion superior o navbar  -->
 <nav class="navbar navbar-expand-lg navbar-light bg-white  py-3 fixed-top">
    <div class="container">
      <img  src="assets/imgs/logo.png" alt="">
      <!-- <h2 class="brand">RAFATECHNOLOGY</h2> -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse  nav-buttons " id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="tienda.php">Tienda</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="#">Blog</a>
          </li>
         

          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          
          <li class="nav-item">
            <a href="carrito.php"><i class="fas fa-shopping-bag"></i></a>
            <a href="cuenta.php"><i class="fas fa-user"></i></a>
          </li>
          
        </ul>
        
      </div>
    </div>
  </nav>