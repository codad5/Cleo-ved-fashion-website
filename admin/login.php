<?php
session_start();

if (isset($_SESSION['admin'])) {
  header("location:index.php");
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="theme-color" content="#FBB917">

    <link rel="stylesheet" href="css/Alogin.css">
    <title>Login as Admin</title>
    <style>
    .notAnAdminLink{
      position:absolute;
      text-decoration: none;
      bottom:-17px;
      color:white;
    }
    </style>
  </head>
  <body>
    <div class="loginbox">
      <span>LOGIN AS ADMIN</span><br>
      <form class="" action="../incs/login.inc.php" method="post">
        <input type="text" name="name" placeholder="Name"> <br>
        <input type="password" name="pwd" placeholder="Password"> <br>
        <button type="submit" name="submit">Submit</button>

        <a href="../" class="notAnAdminLink">Not and Admin?</a>

      </form>

    </div>
  </body>
</html>
