<?php
    include_once "header.php";

if (isset($_COOKIE['keyword'])) {


    if ($_COOKIE['keyword'] === $_GET['keyword']) {
          $keyword = $_GET['keyword'];
        $keyword = filter_var($keyword, FILTER_SANITIZE_STRING);
        setcookie("keyword", $keyword, time() + 1800, "../search.php", false,  false);
        $searchapprove = true;
        
        
    }

    else{
        
        $keyword = $_GET['keyword'];
        $keyword = filter_var($keyword, FILTER_SANITIZE_STRING);
        setcookie("keyword", $keyword, time() + 1800, "../search.php", false,  false);
        $searchapprove = true;
        
    }
}
else{
     $keyword = $_GET['keyword'];
    $keyword = filter_var($keyword, FILTER_SANITIZE_STRING);
    setcookie("keyword", $keyword, time() + 1800, "../search.php", false,  false);
    $searchapprove = true;
}


?>

<style>
 .bodywrapper{
     display:flex;
     justify-content:center;
     min-height: 80vh;
     align-content: center;
 }
 .searchResultheader{
     position:absolute;
 }
.gallery-cnt{
    position: relative;
    top: 50px;
    min-height: 60vh;
}

</style>
		  
		



		
<?php

if ($searchapprove) {
    require_once "incs/dbh.inc.php";
    if (empty($_GET['keyword'])) {
        echo "No search keyword found";
    }
    else{
    $_COOKIE['keyword'] = filter_var($_GET['keyword'], FILTER_SANITIZE_STRING);
    $_GET['keyword'] = mysqli_real_escape_string($conn, $_GET['keyword']);
    
    $keyword = $_GET['keyword'];
    $sql = "SELECT * FROM shop WHERE prdName LIKE '%$keyword%' OR prdcat like '%$keyword%' OR prdsex like '%$keyword%' OR prdprice like '%$keyword%'";
    $searchResult = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($searchResult);

    if ($queryResult > 0) {
        
        echo "<p class='searchResultheader'>There are ".$queryResult." Related search to '".$keyword."'<br></p><div class='gallery-cnt'>";
        while ($row = mysqli_fetch_assoc($searchResult)){
            
            echo "<div class='gal-img-cnt'><img class='prd-img' src='img/gallery/".$row['prdpic']."' alt='".$row['prdName']."' width='250px' height='300px'>
				<div class='gal-price-cover'> <span class='prdname'>".$row['prdName']."	</span><a traget='_blank' href='order.php?prdid=".$row['prdid']."'>#".$row['prdprice']." <img id='ordbtn' src='svg/plus_circle.svg' width='20px' height='20px' alt=''> </a></div></div>";

        }
    }
    else{
        
    echo "Search word not found";
    }
}
    
}


?>

</div>





<?php

include_once "footer.php";
?>