<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Bank</title>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar border-bottom sticky-top">
    <img src="Images/bank-logo2.png" class="logo">  
  <a class="navbar-brand" href="#">National Bank</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customer.php">Customers</a>
      </li>
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner blacksheet caro-box-inner">
    <div class="carousel-item active">
      <img src="Images/bank1.jpg" alt="Image 1" width="1100" height="500">
      <div class="carousel-caption">
        <h3>Smooth Money Transfer</h3>
        <p>Experience the smoothest money transfer process ever. Transfer your money all over the world. </p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="Images/caro-img-3.jpg" alt="Image 2" width="1100" height="500">
      <div class="carousel-caption">
        <h3>A Bank that Listens You</h3>
        <p>Our teams provides the quality customer service to all our customers addressing all their queries and guiding them to right direction</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="Images/bank3.jpeg" alt="Image 3" width="1100" height="500">
      <div class="carousel-caption">
        <h3>A Bank which is Reliable and Trustworthy</h3>
        <p>Your money is our responsibility. Once you invest your money, its our responsibility to keep your money secure.</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<div class="page-content">
  <div class="logo-container">
    <div class="logo-image">
      <img src="Images/bank-logo2.png" alt="logo" style="width: 50%;">  
    </div>
    <div class="logo-slogan">
      <h2 style="color: blue;">National Bank</h2>
      <h5 style="color: red;">Reliable and Trustworthy</5>
    </div>
  </div>
  <div class="heading">
    <h2><b>National Bank Welcomes You!</b></h2>
    <h3 style="margin-top:30px;">A bank having network all over the nation.</h3>
    <h3 style="margin-top:30px;">A bank on which you can rely.</h3>
    <h3 style="margin-top:30px; color: red;">Join us to experience the smoothest money transfer process ever.</h3>
     <a href="customer.php">
    <button type="button" class="btn btn-success" style="font-size: 18px;">Our Customers</button>
    </a>
  </div>
</div>


<footer class="footer-box border-top">
<p class="footer-text">
    © Copyright 2021 National Bank. All rights reserved.
</p>
</footer>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>