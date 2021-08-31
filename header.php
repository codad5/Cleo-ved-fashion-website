<?php

//prm=0999ss9'



if (isset($_GET['preview'])) {
	session_start();
	if (isset($_SESSION['admin'])) {
		
	
     if ($_SESSION['admin'] === $_GET['preview']) {
         
     }
	
     else {
    
	session_unset();
	session_destroy();
	header('location:index.php');
}
}

if (!isset($_SESSION['admin'])) {
	header('location:index.php');
}
}
else {

    
}



?>

<!doctype html>
<html>
	<head>
		<meta name="theme-color" content="#FBB917">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="theme-color" content="#af6ce6">
<meta name="description" content="Recieve anonymous messages from friends with your link">
<meta name="keywords" content="social mediaL,secret,Message,Anonymous">
<meta name="author" content="RIDOX STUDIO">
<meta name=" application-name" content="USECRET">
<meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="USECRET" />
<meta property="og:description"   content="Recieve anonymous messages from friends with your link" />
<meta property="og:image"         content="img/logo_usecret1.png" />
<meta property="og:icon"         content="img/logo_usecret1.png" />
<meta charset="UTF-8">
<meta name="twitter:" content="rodixstudio" >
    <link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/order.css">
      <link rel="stylesheet" href="css/shop.css">
      <link rel="stylesheet" href="css/gallery.css">
			<link rel="stylesheet" href="css/smscreen.css">
			<link rel="stylesheet" href="css/lgscreen.css">
				<title>cleo_ved</title>
				<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oi&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
<script src="scripts/main.js" type="text/javascript">
</script>

<script type="text/javascript">
	 var path = window.location.pathname;
 var homelink = document.getElementById("hdhomelink");
 var Gallerylink = document.getElementById("Gallerybtn");
 var shoplink = document.getElementById("hdshoplink");
 


    switch(path) {
    case "/Cleo_ved/shop.php":
        shoplink.style.color="white";
        

        break;
        case "/Cleo_ved/":
          homelink.style.color="white";
          break;
        case "/Cleo_ved/gallery.php":
          Gallerylink.style.color="white";
          break;

    default:
      homelink.style.color="white";
       
} 


</script>
	</head>

	<body>
	<header>
		<nav>


			<a href="index.php#wlbody"><button id="hdhomelink"> Home</button></a>

				
							<a <?php
							if (isset($_GET['prdid'])) {

							}
							else {
								echo "href='gallery.php#'";
							} ?>><button id="Gallerybtn" <?php
							if (isset($_GET['prdid'])) {
								echo "onclick='back()'";
							}
						?> ><?php
							if (isset($_GET['prdid'])) {
								echo "Back";
							}
							else {
								echo "Gallery";
							} ?> </button></a> 
							<a href="shop.php" ><button  id="hdshoplink">Shop</button></a>
					<a href="index.php#whybody"><button>why us</button></a>
					<a href="index.php#abtbody"><button>about</button></a>
						<a href="index.php#cntbody" ><button id="la">contact</button></a>

							</nav>
 <aside class="search-bar">
	  <form action="incs/search.inc.php" method="get"> <input name="search" type="Search" placeholder="Search"><button type="submit" name="submit"><img src="svg/search.svg" alt=""></button> </form>
 </aside>

		</header>   

		<!-- This is the main content -->
<div class="bodywrapper">
