<?php
session_start();
 if (!isset($_SESSION['admin'])) {
    header("location:login.php");
  }



 ?>
<!doctype html>
<html>
	<head>
		<meta name="theme-color" content="#FBB917">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="css/index.css">

      <link rel="stylesheet" href="../css/shop.css">
      <link rel="stylesheet" href="css/shop.css">
      <link rel="stylesheet" href="css/order.css">
      <link rel="stylesheet" href="../css/gallery.css">
      <link rel="stylesheet" href="css/smscreen.css">
      <link rel="stylesheet" href="css/lgscreen.css">
      <link rel="stylesheet" href="css/edit.css">
				<title>cleo_ved Admin control panel</title>
				<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Oi&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
	</head>
  <script src="scripts/validateform.js" charset="utf-8"></script>

	<body onload="load()">
		<header class="header-main">
    <button class=" sm_iconbody" id="menuicon">
  <img src="../svg/menu.svg" alt="" width="50px" height="50px" class="social_icon">

    </button>
   

		</header>

    <aside class="side-nav">
      <ul>
        <li id="Homelink"> <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 99.596 104.869">
  <path id="home_home_outline" data-name="home / home_outline" d="M93.372,104.869H6.224C2.792,104.869,0,102.338,0,99.227V45.14a5.407,5.407,0,0,1,1.826-3.986l43.568-39.5A6.615,6.615,0,0,1,49.8,0a6.533,6.533,0,0,1,4.409,1.655l43.568,39.5A5.38,5.38,0,0,1,99.6,45.14V99.227C99.6,102.338,96.8,104.869,93.372,104.869ZM37.35,65.376h24.9V93.585h24.9V47.476L49.8,13.625,12.448,47.476v46.11h24.9V65.376Z" fill="#CFC5C5"/>
</svg>
</i> <a href="Index.php"> Home</a></li>
        <li id="shoplink"> <a href="Shop.php"> <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 215.458 247.632">
  <path id="basic_tag-outline" data-name="basic / tag-outline" d="M114.3,248.613h-.077a21.88,21.88,0,0,1-16.147-7.824L7.908,137.347a28.818,28.818,0,0,1-6.787-20.579L6.037,30.846c.689-12.84,9.636-23.114,20.81-23.9l74.741-5.84A7.351,7.351,0,0,1,103.34.984a21.839,21.839,0,0,1,16.165,7.825l90.178,103.429a28.938,28.938,0,0,1,6.841,18.576,27.646,27.646,0,0,1-6.508,18.461L130.3,241.095A21,21,0,0,1,114.3,248.613ZM103.566,27.168h0L28.774,33.007l-4.926,85.98,90.178,103.429,79.7-91.8L103.566,27.168ZM64.628,100.017H64.59c-10.825-.1-20.3-9.059-22.539-21.294s3.393-24.5,13.361-29.177a19.932,19.932,0,0,1,8.693-1.91c7.629.073,14.752,4.489,19.054,11.812,6.121,10.416,5.056,24.31-2.532,33.039A20.949,20.949,0,0,1,64.628,100.017Z" transform="translate(-1.068 -0.982)" fill="#CFC5C5"/>
</svg>


</i> Shop</a></li>
        <li id="Orderslink"> <a href="Orders.php"><i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 17.455 25.086">
  <path id="basic_download" data-name="basic / download" d="M17.455,25.086H0V22.578H17.455v2.507ZM8.727,20.069h0l-7.48-7.525L3,10.774l4.476,4.491V0H9.974V15.265l4.476-4.491,1.757,1.769L8.728,20.069Z" fill="#CFC5C5"/>
</svg>
</i>  Orders </a></li>
        
				<li id=""> <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
  <path id="media_airplay" data-name="media / airplay" d="M23.182,30H6.819L15,20.526,23.18,30Zm-15-4.735h0l-5.454,0A2.97,2.97,0,0,1,0,22.106V3.158A2.97,2.97,0,0,1,2.727,0H27.273A2.97,2.97,0,0,1,30,3.158V22.106a2.97,2.97,0,0,1-2.727,3.158H21.819V22.106h5.454V3.158H2.727V22.106H8.182v3.159Z" fill="#CFC5C5"/>
</svg>
</i> <a href="../incs/Preview.inc.php?admin=<?php echo $_SESSION['admin'] ?>" target="_blank">Preview</a></li>
        <li> <i><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 94.5 93.206">
  <path id="basic_log_out" data-name="basic / log_out" d="M84,93.205H36.751a10.44,10.44,0,0,1-10.5-10.355V62.135h10.5V82.85H84v-72.5H36.751V31.07h-10.5V10.355A10.44,10.44,0,0,1,36.751,0H84A10.44,10.44,0,0,1,94.5,10.355v72.5A10.44,10.44,0,0,1,84,93.205ZM47.25,67.313V51.78H0V41.425H47.25V25.892L73.5,46.6l-26.244,20.7Z" fill="#CFC5C5"/>
</svg>

</i> <a href="../incs/Logut.inc.php"> Logout</a></li>
      </ul>
    </aside>
    <div class="mainbody admin-main-body">

<script type="text/javascript">
 var path = window.location.pathname;
 var homelink = document.getElementById("Homelink");
 var shoplink = document.getElementById("shoplink");
 var orderlink = document.getElementById("Orderslink");
 


    switch(path) {
    case "/Cleo_ved/admin/Shop.php":
        shoplink.style.background="linear-gradient(#B98419, #2C2930)";
        

        break;
        case "/Cleo_ved/admin/":
          homelink.style.background="linear-gradient(#B98419, #2C2930)";
          break;
        case "/Cleo_ved/admin/Orders.php":
          orderlink.style.background="linear-gradient(#B98419, #2C2930)";
          break;
           case "/Cleo_ved/admin/edit.php":
          shoplink.style.background="linear-gradient(#B98419, #2C2930)";
          break;

    default:
      homelink.style.background="linear-gradient(#B98419, #2C2930)";
       
} 



</script>