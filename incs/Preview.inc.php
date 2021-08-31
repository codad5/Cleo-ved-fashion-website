<?php

//prm=0999ss9'
session_start();


if (isset($_GET['admin'])) {
     if ($_SESSION['admin'] === $_GET['admin']) {
         header('Location:../index.php?preview='.$_GET['admin']);
     }
     else {
    header('location:../admin');
}
}
else {
    header('location:../admin');
}