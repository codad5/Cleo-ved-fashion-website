<?php

 if (isset($_POST['verifypin'])) {
     
 
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';
  
     if (!isset($_POST['verifypin'])) {
         header('location:../gallery.php');
     }

  $verno = $_POST['verifypin'];
  $vernemail = $_POST['vernemail'];
  echo $verno;
  $orderexist = orderexist($conn, $verno);
    if (orderexist($conn, $verno) !== false) {
    
      // when $orderexist['verify'] = 1 it means it has been verified
      // when $orderexist['verify'] = 2 it means it has been accepted
      // when $orderexist['verify'] = 3 it means it has been delivered


      if ($orderexist['cemail'] === $vernemail) {
        if ($orderexist['verify'] < 1) {
          # code...
        
        echo $orderexist['coid'];
        $sql = "UPDATE orders set verify='1' WHERE coid='".$verno."';";
        $row = mysqli_query($conn, $sql);
        header("location:../error.php?error=verified");
      }
      
      else{
        header("location:../error.php?error=alverified");
      }
    }
     else if ($orderexist['coid'] !== $verno) {
      header('location:../error.php?error=wrgver');
    }
    else if ($orderexist['cemail'] !== $vernemail ) {
      header('location:../error.php?error=wrgver');
    }

      
    

    }

  


   
    
    else{
      header('location:../error.php?error=wrgver');
    }


  
  
   
 }
 else{
     header('location:../gallery.php');
 }