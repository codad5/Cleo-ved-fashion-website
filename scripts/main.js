
 
 var path = window.location.pathname;
 var homelink = document.getElementById("hdhomelink");
 var Gallerylink = document.getElementById("Gallerybtn");
 var shoplink = document.getElementById("hdshoplink");
 


    switch(path) {
    case "/Cleo_ved/shop.php":
        console.log("hey");
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


