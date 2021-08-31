<?php

if (isset($_GET['prdid'])) {
  require_once '../incs/dbh.inc.php';
  require_once '../incs/functions.inc.php';
  $prdid = $_GET['prdid'];
  prdexist($conn, $prdid);
  ;
  prdallowed($conn, $prdid);
  $prdExists = prdexist($conn, $prdid);
  $file = $prdExists['prdpic'];
  deleteitem($conn, $prdid, $file);
  



}
else {
  header("location:index.php");
}
 ?>
