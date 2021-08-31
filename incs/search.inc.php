<?php
if (empty($_GET['submit'])) {
   header('location:../index.php');
}

if (isset($_GET['submit'])) {
    $keyword = $_GET['search'];
    $keyword = filter_var($keyword, FILTER_SANITIZE_STRING);
    setcookie("keyword", $keyword, time() + 1800, "../search.php", false,  false);
    
    header("Location:../search.php?keyword=".$keyword);

}
else{
    header('location:../index.php');
}