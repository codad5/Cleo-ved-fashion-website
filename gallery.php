<?php
include_once 'header.php';
?>
	
<style>
	.bodywrapper{
		display: flex;
		justify-content: center;

	}
</style>

		<div class="gallery-cnt">




<?php
		require_once 'incs/dbh.inc.php';
		require_once 'incs/functions.inc.php';

		$sql = "SELECT * FROM shop ORDER BY objectid DESC;";

		$resultmsg = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($resultmsg);


		if ($resultcheck > 0) {
		  while ($row = mysqli_fetch_assoc($resultmsg)) {
		    echo "<div class='gal-img-cnt'><img class='prd-img' src='img/gallery/".$row['prdpic']."' alt='".$row['prdName']."' width='250px' height='300px'>
				<div class='gal-price-cover'> <span class='prdname'>".$row['prdName']."	</span><a traget='_blank' href='order.php?prdid=".$row['prdid']."'>#".$row['prdprice']." <img id='ordbtn' src='svg/plus_circle.svg' width='20px' height='20px' alt=''> </a></div></div>";

		  }
		}

		elseif ($resultcheck == 0) {
		  echo "<div class='msgs'>NO Product avaliable</div>";
		}




 ?>









	</div>


<?php

include_once "footer.php";
?>
