<?php 
include_once 'header.php';
require_once '../incs/dbh.inc.php';
require_once '../incs/functions.inc.php';


	$sql = "SELECT * FROM orders ORDER BY usersId DESC;";

		$resultmsg = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($resultmsg);


	



?>
<link rel="stylesheet" type="text/css" href="css/orders.css">
<main>
	
<div class="gbody">


<div class="mainout">
	 <table class="u-table-entity">
                    <colgroup>
					<col width="1%">
                      <col width="30.3%">
						<col width="15.3%">
						<col width="2%">
						<col width="15.3%">
                      <col width="16.5%">
                    </colgroup>
                    <tbody class="u-table-alt-grey-5 u-table-body">
                      <tr style="height: 48px;">
					  <td class="u-table-cell">Sn</td>
                        <td class="u-table-cell">Message</td>
						<td class="u-table-cell">Coustomer Name</td>
                        <td class="u-table-cell">Sex</td>
						<td class="u-table-cell">Date</td>
						<td class="u-table-cell">Verification</td>

                      </tr>
					  
                      <tr style="background:black;color:whitesmoke;">
					  <td class="u-table-cell">Sn</td>
                        <td class="u-table-cell">You have <code style="color:red;"> <?php echo $resultcheck; ?></code> Orders</td>
                        <td class="u-table-cell">Coustomer Name</td>
                        <td class="u-table-cell">Sex</td>
						<td class="u-table-cell">Date</td>
						<td class="u-table-cell">Verification</td>

                      </tr>
                      <?php

/*setcookie($cuser, $resultcheck, time() + 86000000);


if (isset($_COOKIE[$cuser])) {

$newmsg = $resultcheck - $_COOKIE[$cuser];
if ($newmsg > 0) {
 echo "<div class='msgnoti' id='msgnoti'>You have<b style='color:red;'> ".$newmsg."</b> new message(s)<button onclick='closenoti()'>&times;</button></div>";
}
}*/
//to know number of new msg
$sn = 0;

if ($resultcheck > 0) {
	while ($row = mysqli_fetch_assoc($resultmsg)) {

		
		if ($row['csex'] === "Male") {
			$sex= "M";
		}
		elseif ($row['csex'] === "Female"){
			$sex= "F";
		}
		else{
			$sex= "B";
		}

		
		


			if ($row['verify'] === "0") {
			$ver= "<img src='../svg/loading.svg' width='40px' height='40px'>";
			$verSty = "style='background:rgba(180, 30, 30, 0.5);color:whitesmoke;min-height: 500px;'";
		}
		elseif ($row['verify'] === "1"){
			$ver= "<img src='../svg/check.svg' width='40px' height='40px'>";
			$verSty = "style='background:rgba(130, 130, 30, 0.5);color:whitesmoke;min-height: 500px;'";
		}
		
		else{
			$ver= "<img src='../svg/check_all_big.svg' width='40px' height='40px'>";
			$verSty = "style='background:rgba(30, 180, 30, 0.5);color:whitesmoke;min-height: 500px;'";
		}


	  $sn;
	  $sn += 1;
	  echo "<tr class='tablerow' ".$verSty."><td class='u-table-cell'>".$sn."</td><td class='u-table-cell'>".$row['prdname']."</td><td class='u-table-cell'>".$row['cName']."</td><td class='u-table-cell'>".$sex."</td><td class='u-table-cell'>".$row['datetime']."</td><td class='u-table-cell'>".$ver."</td></tr>";
    
  }
}

elseif ($resultcheck == 0) {
  echo "<tr class='msgs'> <td>  NO MESSAGES YET!!!</td></tr>";
}




 ?>



                    </tbody>
                  </table>
</div>
</div>
</main>
<?php
	include_once "footer.php";
?>