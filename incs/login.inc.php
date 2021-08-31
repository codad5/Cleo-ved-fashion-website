<?php
  if (isset($_POST['submit'])) {

    $name = $_POST["name"];
    $pwd = $_POST["pwd"];


  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';


  if(emptyinput($name, $pwd) !== false){
    header("location:../admin/login.php?error=emptyinput");
    exit();


  }

  loginUser($conn, $name, $pwd);


  }

  else {
    header("location:../admin/login.php");
  }

 ?>
