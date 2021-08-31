<?php


 function emptyinput($name, $pwd){
    $result;
    if (empty($name) || empty($pwd)) {
      $result = true;

    }

    else {
      $result = false;

    }
    return $result;
  }

function UidExist($conn, $name){
  $sql ="SELECT * FROM admin WHERE AdminName = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../admin/login.php?error=stmtfailed#formbox");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $name);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }

  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);

}


function   loginUser($conn, $name, $pwd){
  $uidExists = UidExist($conn, $name);

  if ($uidExists === false) {
    header("location:../admin/login.php?error=wronglogin#formbox");
    exit();
  }


  $pwdHashed = $uidExists['AdminPwd'];
  $checkPwd = password_verify($pwd, $pwdHashed);

  if ($checkPwd === false) {
    header("location:../admin/login.php?error=wrongpassword#formbox");
    exit();
  }

  else if ($checkPwd === true) {
    session_start();
    $_SESSION['Adminid'] = $uidExists['AdminId'];
    $_SESSION['admin'] = $uidExists['AdminName'];
    header("location:../admin/index.php");
    exit();

  }


}


function checkimg($conn, $prdpic, $fileNameNew, $fileName, $fileTmpName, $fileSize, $fileError, $fileType, $fileExt, $fileActualExt, $allowed, $prdname, $prdsize, $prdprice, $prdcat, $prdsex, $prddis, $prdqty, $prdaddedby, $prdid){

  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) {
        if ($fileSize < 10000000) {
          $fileNameNew = uniqid('', true).".".$fileActualExt;
          $fileDestination = "../img/gallery/".$fileNameNew;
          move_uploaded_file($fileTmpName, $fileDestination);
          uploadtodb($conn, $prdname, $fileNameNew, $prdsize, $prdprice, $prdcat, $prdsex, $prddis, $prdqty, $prdaddedby, $prdid);


        }
        else {
          header("location:../admin/?filetobig");
        }
    }

    else {
      header("location:../admin/?fileerror");
    }
  }
  else {
    header("location:../admin/?fileerror=wrongfiletype");
  }
}


function uploadtodb($conn, $prdname, $fileNameNew, $prdsize, $prdprice, $prdcat, $prdsex, $prddis, $prdqty, $prdaddedby, $prdid){

  $sql ="INSERT INTO shop (prdName, prdid, prdsize, prdsex, prdprice, prdcat, prdpic, prddis, addedby, dateadded, qtyadded, qtyleft) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../admin/index.php?error=stmtfailed");
    exit();
  }


  $dateadded = date("y-m-d");


  mysqli_stmt_bind_param($stmt, "ssssssssssss", $prdname, $prdid, $prdsize, $prdsex, $prdprice, $prdcat, $fileNameNew, $prddis, $prdaddedby, $dateadded, $prdqty, $prdqty);
  if (  mysqli_stmt_bind_param($stmt, "ssssssssssss", $prdname, $prdid, $prdsize, $prdsex, $prdprice, $prdcat, $fileNameNew, $prddis, $prdaddedby, $dateadded, $prdqty, $prdqty) === false) {
    header("location:../admin/index.php?cng=sorry");
    exit();
  }

  else {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

  header("location:../admin/index.php?cng=sucess#formbox");
  exit();
  }
}


function prdexist($conn, $prdid){
  $sql ="SELECT * FROM shop WHERE prdid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:error.php?error=stmtfailed#formbox");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $prdid);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;

  }

  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);



}

function orderexist($conn, $verno){
  $sql ="SELECT * FROM orders WHERE coid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:error.php?error=stmtfailed#formbox");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $verno);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;

  }

  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);



}


function   prdallowed($conn, $prdid){
  $prdExists = prdexist($conn, $prdid);

  if ($prdExists === false) {
    return false;
  }
}



function deleteitem($conn, $prdid, $file){
  $sql ="DELETE FROM shop WHERE prdid = ?;";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../error.php?error=stmtfailed#formbox");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "s", $prdid);
  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  unlink("../img/gallery/".$file);
  mysqli_stmt_close($stmt);
  header("location: ../error.php?error=delsuccess");



}

function order($conn, $cname, $ctel, $cAdr, $qtyneed, $csex, $cid, $cEmail, $prdname, $prdid, $netprice){
  
  $sql ="INSERT INTO orders (prdname, prdid, salePrice, coid, cName, ctel, cemail, csex, cadr, qtyneed) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";

  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("location:../error.php?error=stmtfailed");
    exit();
  }


  


  mysqli_stmt_bind_param($stmt, "ssssssssss", $prdname, $prdid, $netprice, $cid, $cname, $ctel, $cEmail, $csex, $cAdr, $qtyneed);
  if (  mysqli_stmt_bind_param($stmt, "ssssssssss", $prdname, $prdid, $netprice, $cid, $cname, $ctel, $cEmail, $csex, $cAdr, $qtyneed) === false) {
    header("location:../error.php?error=stmtfailed");
    exit();
  }

  else {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    session_start();
    $_SESSION['orderid'] = $cid;
    
    $_SESSION['email'] = $cEmail;

  header("location:../error.php?error=ordersucess");
  exit();
  }

}

function updatePrdInfo($conn, $targetPrd, $prdUpdate, $nam, $prdExists){
   $sql = "UPDATE shop set ".$nam."='".$prdUpdate."' WHERE prdid='".$targetPrd."';";
   $done = mysqli_query($conn, $sql);
   $date = date("Y-m-d h:i:sa");
  $handle = fopen("../admin/sql/update.txt" , "a");
  
  fwrite($handle, ">> Modified ".$nam." from \\".$prdExists[$nam]."\ to ".$prdUpdate."\n\n\n");
  
  fclose($handle);
}