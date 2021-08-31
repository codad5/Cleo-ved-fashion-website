<?php
include_once 'header.php';
?>

<style>
	.shopprdsbox{
		display: flex;
		justify-content: center;

	}
</style>

		<br>
		<div id="slider">
			<figure>
				<div id="imgslide1" class="imgslide" >
				<center><div class="slider1txt"><h1>cleo_ved</h1>
			<h2>fashion trend</h2></div></center>
				</div>
			<div id="imgslide2" class="imgslide">
							<div class="slider2txt"><h1>cleo_ved</h1>
			<h2>Start growing your fashion line with us!!!</h2></div>	</div>
					<div id="imgslide3" class="imgslide">
					<center><h1 class="slider3txt">Get The best clothing design</h1>
					<a href=""><button class="slidebut">Start now</button></a>
					</center>
				</div>
					<div id="imgslide4" class="imgslide" >

					<div class="slider4txt">Do you like Bags?</div>
					<center>
						<a href=""><button class="slidebut">Shop one now !</button></a>
						</center>
				</div>
					<div id="imgslide5" class="imgslide">
					<div class="slider5txt">I know you will like our footwears
					<a href=""><button class="slidebut">Order now !</button></a></div>
				</div>
			</figure>
		</div>

		<br>

		<div class="shopprdsbox">

		  
		


		
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
