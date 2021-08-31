<?php
include_once 'header.php';
 ?>
 <div class="Admin-shop-view">

<?php
		require_once '../incs/dbh.inc.php';
		require_once '../incs/functions.inc.php';

		$sql = "SELECT * FROM shop ORDER BY objectid DESC;";

		$resultmsg = mysqli_query($conn, $sql);
		$resultcheck = mysqli_num_rows($resultmsg);


		if ($resultcheck > 0) {
		  while ($row = mysqli_fetch_assoc($resultmsg)) {
		    echo "<div class='Admin-shop-view-box'><img src='../img/gallery/".$row['prdpic']."' alt='".$row['prdName']."' width='250px' height='300px'><div class='Admin-shop-edit-btn'><a traget='_blank' href='edit.php?prdid=".$row['prdid']."' class='editlink'>Edit</a> <a traget='_blank' href='../incs/delete.php?prdid=".$row['prdid']."' class='editlink' id='quickdel'><img src='../svg/trash_empty.svg'></a></div>
				".$row['prdName']."	</div>";

		  }
		}

		elseif ($resultcheck == 0) {
		  echo "<div class='msgs'>NO ITEM AVALIABLE </div>";
		}




 ?>
</div>
<?php
	include_once "footer.php";
?>
