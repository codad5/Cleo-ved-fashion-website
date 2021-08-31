<?php
if (isset($_POST['button'])){
 
  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  $prdid = $_POST['button'];
  prdexist($conn, $prdid);
  prdallowed($conn, $prdid);
  if (prdallowed($conn, $prdid) !== false) {
    header("location:../error.php?error=prdmissing");
  
  $prdExists = prdexist($conn, $prdid);
  if (prdallowed($conn, $prdid) === false) {
      header('location:../error.php?error=prdmissing');
  }
  if (!isset($_POST['t&Caccept'])) {
      header("location:../order.php?prdid=$prdid");
  }
   $disprice = $prdExists['prddis'] / 100 ;
  $disprice = $disprice * $prdExists['prdprice'];
  $netprice = $prdExists['prdprice'] - $disprice;
  $cname = $_POST['coustomername'];
  $cname = $prdsize = filter_var($cname, FILTER_SANITIZE_STRING);
  $ctel = $_POST['Coustomertel'];
  $csex = $_POST['coustomersex'];
  $cAdr = $_POST['coustomeraddress'];
  $cEmail = $_POST['Coustomeremail'];
  $prdname = $_POST['t&Caccept'];
  $cEmail = filter_var($cEmail, FILTER_VALIDATE_EMAIL);
  $cAdr = $prdsize = filter_var($cAdr, FILTER_SANITIZE_STRING);
  $qtyneed = $_POST['qtyodr'];

  if ($qtyneed == 0) {
      header("location:../order.php?prdid=$prdid");
  }

   if(emptyinput($cname, $cAdr) !== false){
      header("location:../order.php?prdid=$prdid");
      exit();


    }
     if(emptyinput($ctel, $cAdr) !== false){
      header("location:../order.php?prdid=$prdid");
      exit();

      


    }
    $cid = uniqid('cleo', false);
    
    order($conn, $cname, $ctel, $cAdr, $qtyneed, $csex, $cid, $cEmail, $prdname, $prdid, $netprice);
  }
  else{
    header('Location:../error.php?error=stmtfailed');
}

}
else{
    header('Location:../gallery.php');
}