<?php
session_start();
 require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if (isset($_POST['update'])) {
        $targetPrd = $_POST['update'];
        prdexist($conn, $targetPrd);
            if (prdallowed($conn, $targetPrd) === false) {
                header("location:../error.php?error=prdmissing");
            }
  
  $prdExists = prdexist($conn, $targetPrd);
$date = date("Y-m-d h:i:sa");
  $handle = fopen("../admin/sql/update.txt" , "a");
  
  fwrite($handle, "================================================================");
  fwrite($handle, "\n\n");
  fwrite($handle, "Updated  ".$prdExists['prdName']." on ''".$date."'' by ".$_POST['Updateby']."\n");
  fwrite($handle, "*********************************************** \n");
  

    
if (isset($_POST['nameUpdate'])) {
     $prdUpdate = $_POST['nameUpdate'];
    if (emptyinput($prdUpdate, $prdUpdate) !== true) {
        echo $prdUpdate;
        updatePrdInfo($conn, $targetPrd, $prdUpdate, "prdName", $prdExists);
    }
    else {
        header('Location:../admin/edit.php?prdid='.$prdExists['prdid']);
    }
    
   
    
}
if (isset($_POST['priceUpdate'])) {
      $prdUpdate = $_POST['priceUpdate'];
      if (emptyinput($prdUpdate, $prdUpdate) !== true) {
    echo $prdUpdate;
    updatePrdInfo($conn, $targetPrd, $prdUpdate, "prdprice", $prdExists);
      }
       else {
        header('Location:../admin/edit.php?prdid='.$prdExists['prdid']);
    }

}

if (isset($_POST['qtyUpdate'])) {
      $prdUpdate = $_POST['qtyUpdate'];
    echo $prdUpdate;
    updatePrdInfo($conn, $targetPrd, $prdUpdate, "qtyleft", $prdExists);
}
if (isset($_POST['disUpdate'])) {
      $prdUpdate = $_POST['disUpdate'];
    echo $prdUpdate;
    updatePrdInfo($conn, $targetPrd, $prdUpdate, "prddis", $prdExists);
}
if (isset($_POST['sizeUpdate'])) {

      $prdUpdate = $_POST['sizeUpdate'];
      if (emptyinput($prdUpdate, $prdUpdate) !== true) {
    echo $prdUpdate;
    updatePrdInfo($conn, $targetPrd, $prdUpdate, "prdsize", $prdExists);
      }
       else {
        header('Location:../admin/edit.php?prdid='.$prdExists['prdid']);
    }
}

else {
    header('Location:../admin/index.php');
}
fwrite($handle, "================================================================");
fwrite($handle, "\n\n\n\n");
fclose($handle);
header("location: ../admin/edit.php?prdid=".$targetPrd."&edit=sucess");

    }
else {
    header('Location:../admin/index.php');
}
    