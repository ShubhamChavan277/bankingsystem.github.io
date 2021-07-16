<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/customer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <title>Bank Customers</title>
</head>
<body>
<div class="page-container">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar border-bottom sticky-top">
<img src="Images/bank-logo2.png" class="logo">  
<a class="navbar-brand" href="#">National Bank</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="index.php">Home</a>
    </li>
    <li class="nav-item active">
      <a class="nav-link" href="#">Customers<span class="sr-only">(current)</span></a>
    </li>
  </ul>
  <form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
</div>
</nav>

<div class="table-back">
<h2 class="text-center tab-heading bg-primary">Customers</h2>
<table class="table table-striped table-dark table-size">
  <thead>
    <tr class="table bg-success" style="text-align: center;">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Current Balance</th>
      <th scope="col">Transfer Details</th>
    </tr>
  </thead>
  <tbody>

  <?php
    include 'connection.php';
    $selectquery = "select * from customer";
    $query = mysqli_query($conn, $selectquery);
    $nums = mysqli_num_rows($query);
    while($result = mysqli_fetch_array($query)){ 
    ?>
      <tr style="text-align: center;">    
      <th scope="row"><?php echo $result['CID']; ?></th>
      <td><?php echo $result['Name']; ?></td>
      <td><?php echo $result['Email']; ?></td>
      <td><?php echo $result['Contact']; ?></td>
      <td><?php echo $result['Current_Balance']; ?></td>
      <td><a href="transfer.php?CID=<?php echo $result["CID"]; ?>">Click Here</a></td>
      </tr>
    <?php
    }
  ?>

</tbody>
</table>
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