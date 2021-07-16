<?php

    $username = "root";
    $password = "";
    $server = '127.0.0.1:3020';
    $db = 'bank';

    $conn = mysqli_connect($server,$username,$password,$db);

    if($conn){
        // echo "Connection Successful";
    }else{
        die("no connection" . mysqli_connect_error());
    }
?>