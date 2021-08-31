<?php

if (isset($_POST['submit'])) {

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    session_start();


    $prdname = $_POST['prdname'];
    $prdname = filter_var($prdname, FILTER_SANITIZE_STRING);
    $prdsize = $_POST['prdsize'];
    $prdsize = filter_var($prdsize, FILTER_SANITIZE_STRING);
    $prdprice = $_POST['prdprice'];
    $prdcat = $_POST['prdcat'];
    $prdsex = $_POST['prdsex'];
    $prdpic = $_FILES['prdpic'];
    $prddis = $_POST['prddis'];
    $prdqty = $_POST['prdqty'];
    $prdaddedby = $_SESSION['admin'];
    $prdaddedby = filter_var($prdaddedby, FILTER_SANITIZE_STRING);
    $prdid = uniqid('', true);



    $fileName =  $_FILES['prdpic']['name'];
   $fileTmpName =  $_FILES['prdpic']['tmp_name'];
   $fileSize =  $_FILES['prdpic']['size'];
   $fileError =  $_FILES['prdpic']['error'];
   $fileType =  $_FILES['prdpic']['type'];

   $fileExt = explode('.', $fileName);
   $fileActualExt = strtolower(end($fileExt));

   $allowed = array('jpg', 'jpeg', 'png', 'gif');
   $fileNameNew = "";

//to ensure all parameter are filled

    if (!isset($_SESSION['admin'])) {
      header("location:../admin/login.php");
      exit();
    }

    if(emptyinput($prdname, $prdsize) !== false){
      header("location:../admin/?error=emptyinput");
      exit();


    }
    if(emptyinput($prdprice, $prdcat) !== false){
      header("location:../admin/?error=emptyinput");
      exit();


    }
    if(emptyinput($prdsex, $prdpic) !== false){
      header("location:../admin/?error=emptyinput");
      exit();


    }
    if(emptyinput($prddis, $prdqty) !== false){
      header("location:../admin/?error=emptyinput");
      exit();


    }

    if ($prddis <= 100) {


      UidExist($conn, $prdaddedby);
      checkimg($conn, $prdpic, $fileNameNew, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $prdname, $prdsize, $prdprice, $prdcat, $prdsex, $prddis, $prdqty, $prdaddedby, $prdid);
  }
  else {
    header("location:../admin/?error=invalidiscount");
    exit();
  }



}
else {
  header("Location:../admin/");
}
