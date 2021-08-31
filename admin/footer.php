</div>
<script>


let menuIcon = document.querySelector("#menuicon");
let mainBody = document.querySelector(".admin-main-body");
menuIcon.addEventListener("click", function(){
     let menu = document.querySelector(".side-nav");
     menu.style.display = "Inline-block";
     
});

mainBody.addEventListener("click", function(){
    let menu = document.querySelector(".side-nav");
     if (window.innerWidth <= 1000) {
         menu.style.display = "none";
     }
});

window.addEventListener("resize", function(){
    document.querySelector(".side-nav").style.display="Inline-block";

  });



</script>

</body>
</html>
