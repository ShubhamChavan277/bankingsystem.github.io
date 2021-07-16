<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="CSS/transfer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

    <title>Money Transfer</title>
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom navbar sticky-top">
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
      <li class="nav-item">
        <a class="nav-link" href="customer.php">Customers<span class="sr-only">(current)</span></a>
      </li>   
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<?php
    include 'connection.php';
    $CID = $_GET["CID"];
    $selectquery = "select * from customer where CID=$CID";
    $query = mysqli_query($conn, $selectquery);
    $nums = mysqli_num_rows($query);
    $result = mysqli_fetch_array($query);    
    ?>    
        
        <?php 
            $SID = $result['CID'];
            $From = $result['Name'];
            $Sender_Bal = $result['Current_Balance'];
            $Array = array();
            array_push($Array, $SID, $From, $Sender_Bal);
        ?>

<div class="card-bg border-bottom">
      <div class="card border-dark mb-3 CD-Card" style="max-width: 39rem; ">
      <div class="card-header bg-primary" style="text-align: center; font-weight: bold;">Customer Details</div>
      <div class="card-body C-Body text-dark">
        <div class="profile-card">
      <h4 class="card-title" style="font-weight: bold;">Profile</h4>
      <img class="card-image profile" src="Images/profile-pic.png" alt="Card image cap">
          <h5 class="card-title" style="font-weight: bold; margin-bottom: 30px;">Customer ID : <?php echo $SID; ?></h5>
          <p class="card-text" style="font-weight: bold;">Name : <?php echo $From; ?></p>
          <p class="card-text" style="font-weight: bold;">Email : <?php echo $result['Email']; ?></p>
          <p class="card-text" style="font-weight: bold;">Contact : <?php echo $result['Contact']; ?></p>
          <p class="card-text" style="font-weight: bold;">Current Balance : <?php echo $result['Current_Balance']; ?></p>
        </div>
          <div class="logo-Body">
            <img src="Images/bank-logo2.png" class="profile-img">
           
            <h3 style="color: blue; text-align: center;">National Bank</h3>
            <h6 style="color: red; text-align: center;">Reliable and Trustworthy</h6>
  
          </div>
        </div>
      
        
      </div>

      <div class="card border-dark mb-3 MT-Card" style="max-width: 40rem; ">
      <div class="card-header bg-primary" style="text-align: center; font-weight: bold;">Money Transfer</div>
      <div class="card-body text-dark">
          <h5 class="card-title" style="font-weight: bold;">Customer ID : <?php echo $result['CID']; ?></h5>
          <p class="card-text" style="font-weight: bold;">Current Balance : <?php echo $result['Current_Balance']; ?></p>
          <br>
          <p class="card-text" style="font-weight: bold;">From : <br><?php echo $result['Name']; ?></p>
          <p class="card-text" style="font-weight: bold;">To :</p>
          <form method="POST">    
          <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="name">
              <option disabled selected>Choose</option>
              
              <?php
                  include 'connection.php';
                  $selectquery = "select CID,Name,Current_Balance from customer where CID!=$CID";
                  $query = mysqli_query($conn, $selectquery);
                  $nums = mysqli_num_rows($query);
                  while($result = mysqli_fetch_array($query)){
                  ?>    
                      <option value="<?php echo $result['CID']; ?>"><?php echo $result['Name']; ?></option>
                  <?php
                  }
              ?>
              </select>
              <div class="form-group m-auto" style="padding-top: 30px;">
                  <p class="card-text" style="font-weight: bold;">Enter the amount to be transferred :</p>
                  <input type="number" class="form-control" name="amount" id="amount" placeholder="Enter amount to be transferred" required>
              </div>
          
          <button type="submit" name="submit" class="btn btn-success" style="margin: 20px;" value="Choose option">Transfer Money</button>
        </form>
          
      </div>
      </div>
      </div><!--  //card-bg end -->
      <?php
          if(isset($_POST['submit'])){
              if(!empty($_POST['name'])) {
                  include 'connection.php';
                  $selected = $_POST['name'];
                  $amount = $_POST['amount'];
                
                  
                  $selectquery = "select * from customer where CID = $selected";
                  $query = mysqli_query($conn, $selectquery);
                  $result = mysqli_fetch_array($query); 
                  $RID = $result['CID'];
                  $To = $result['Name'];
                  $Receiver_Bal = $result['Current_Balance'];
                  array_push($Array, $RID, $To, $Receiver_Bal, $amount);
                  if($amount <= $Sender_Bal){
                      $SID = $Array[0];
                      $Sender = $Array[1];
                      $Sender_Bal = $Array[2];
                      $RID = $Array[3];
                      $Receiver = $Array[4];
                      $Receiver_Bal = $Array[5];
                      $Amount = $Array[6];
                      $selectquery = "insert into transfer (SID, Sender, RID, Receiver, Amount) values('$SID', '$Sender', '$RID', '$Receiver', '$Amount')";
  
                      if(mysqli_query($conn, $selectquery)){
                          //echo "Records added successfully.";
                      } else{
                          echo "ERROR: Could not able to execute $selectquery. " . mysqli_error($conn);
                      }
                      $Sender_Bal -= $amount;
                      $Receiver_Bal += $amount;
                      $debit = "update customer set Current_Balance='$Sender_Bal' where CID='$SID'";
                      $query = mysqli_query($conn, $debit);
                  
                      $credit = "update customer set Current_Balance='$Receiver_Bal' where CID='$RID'";
                      $query = mysqli_query($conn, $credit);
                      ?>
                      <script>
                          alert('Money transferred successfully!');
                      </script>
                      <?php
                  }else{
                      ?>
                      <script>
                          alert('Insufficient Balance!');
                      </script>
                      <?php
                  }
              } else {
                  ?>
                  <script>
                          alert('Please select the name!');
                      </script>
                  <?php
              }
          }
      ?>

<div class="tabl-back">
<h2 class="tab-heading bg-primary">Transaction History</h2>
<h3 class="tab-heading">Amount Transferred:</h3>
<table class="table table-striped table-dark table-size tab">
  <thead>
    <tr class="table bg-success" style="text-align: center;">
      <th scope="col">Transfer ID</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>

  <?php
    include 'connection.php';
    $selectquery = "select * from transfer where SID='$SID'";
    $query = mysqli_query($conn, $selectquery);
    $nums = mysqli_num_rows($query);
    while($result = mysqli_fetch_array($query)){
    ?>    
      <tr style="text-align: center;">
        <th scope="row"><?php echo $result['TID']; ?></th>
        <td><?php echo $result['Sender']; ?></td>
        <td><?php echo $result['Receiver']; ?></td>
        <td><?php echo $result['Amount']; ?></td>
      </tr>
    <?php
    }
  ?>
</tbody>
</table>

<h3 class="tab-heading">Amount Received:</h3>
<table class="table table-striped table-dark table-size tab">
  <thead>
    <tr class="table bg-success" style="text-align: center;">
      <th scope="col">Transfer ID</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>

  <?php
    include 'connection.php';
    $selectquery = "select * from transfer where RID='$SID'";
    $query = mysqli_query($conn, $selectquery);
    $nums = mysqli_num_rows($query);
    while($result = mysqli_fetch_array($query)){
    ?>    
      <tr style="text-align: center;">
        <th scope="row"><?php echo $result['TID']; ?></th>
        <td><?php echo $result['Sender']; ?></td>
        <td><?php echo $result['Receiver']; ?></td>
        <td><?php echo $result['Amount']; ?></td>
      </tr>
    <?php
    }
  ?>
</tbody>
</table>
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