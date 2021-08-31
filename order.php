<?php
include_once 'header.php';
if (isset($_GET['prdid'])) {
  require_once 'incs/dbh.inc.php';
  require_once 'incs/functions.inc.php';
  $prdid = $_GET['prdid'];
  prdexist($conn, $prdid);
  if (prdallowed($conn, $prdid) === false) {
    header("location:error.php?error=prdmissing");
  }
  
  $prdExists = prdexist($conn, $prdid);
  $disprice = $prdExists['prddis'] / 100 ;
  $disprice = $disprice * $prdExists['prdprice'];
  $netprice = $prdExists['prdprice'] - $disprice;



}
else {
  header("location:index.php");
}
 ?>
  <div class="Product-show">
    
      <div class="prdheader"> <?php echo $prdExists['prdName']; ?> </div>
      <div class="Product-show-board">
    <div class="prd-img-show">
      <img src="img/gallery/<?php echo $prdExists['prdpic']; ?>" alt="<?php echo $prdExists['prdName']; ?>" class="order-img">

    </div>
  <div class="prd-abt-show">
    <ul>
      <li><span class="tag-info">Name: </span><?php echo $prdExists['prdName']; ?></li>
      <li><span class="tag-info">Avaliable for:</span> <?php echo $prdExists['prdsex']; ?></li>
      <li><span class="tag-info">Avaliable Size:</span> <?php echo $prdExists['prdsize']; ?></li>
      <li><span class="tag-info">Price: </span>#<?php echo $netprice; if ($prdExists['prddis'] !== 0) {
        echo " <u class='org-price'>#".$prdExists['prdprice']."</u>";
      } ?></li>
      <li><span class="tag-info">Category:</span> <?php echo $prdExists['prdcat']; ?></li>
    </ul>



  <div class="order-form-box">
    <form class="order-form" id="orderform"  method="post">

      <span style="display:block;color:#ffb917;font-weight:bolder;text-decoration:underline;">Place order(Coustomer Info)</span>
      <span class="order-input-info">Coustomer Name</span>
      <input type="text" name="coustomername" value="" placeholder="Name in full">
      <span class="order-input-info">Coustomer Telephone</span><input type="tel" name="Coustomertel" value="" placeholder="Telephone number" id="Telephone" oninput="datetel()"  maxlength="14" minlength="11"><br>
      <span class="order-input-info">Coustomer Email</span><input type="email" name="Coustomeremail" value="" placeholder="Email" ><br> 
      <span id="noerr" style="display:block;color:red;"></span>
      <span class="order-input-info">Coustomer Gender</span>
      <select class="coustomersex" name="coustomersex">
        <option value="Male">Male</option>
        <option value="Female">Female</option></select><span class="order-input-info">Address</span>
        <input type="text" name="coustomeraddress" value="" placeholder="Address"><br>

        <span style="display:block;color:#ffb917;font-weight:bolder;text-decoration:underline;">Product Info</span>
        <span class="order-input-info">Quantity Needed</span>
        <input type="number" name="qtyodr" value="1" min="1" max="<?php echo $prdExists['qtyleft']; ?>" id="qtyneeded" oninput="calcost()">
        <i id="saleprice"></i>

       <em>  <input type="radio" name="t&Caccept" value="<?php echo $prdExists['prdName']; ?>" required>I accept with the terms and condition of your company [<strong>Cleo_ved Nig. services</strong>] </em>
        
        <button type="button"  name="button" id="subtn" value="<?php echo $prdExists['prdid']; ?>" onclick="proccedtel()">Make order</button>

      <div class="" id="div1">

      </div>
      <script type="text/javascript">
        var number = "";
        function datetel(number) {
          var tel = document.getElementById('Telephone').value;
          var tel = tel.trim();
          var tellent = tel.length;


          if (tellent == 14) {
              var res = tel.slice(4,14);
              var notnum = isNaN(res);



              if (notnum !== true) {
               var number = "+234"+res;
               document.getElementById('Telephone').value = number;
               document.getElementById('orderform').action = "incs/orderprd.inc.php";
               document.getElementById('subtn').type = "Submit";
                return true;

              }
              else if(tel.slice(1,4) !== "234"){
                document.getElementById('noerr').innerHTML="This is not a number";
                var tel = document.getElementById('Telephone').value = "+2";
                document.getElementById('subtn').type = "button";
                document.getElementById('orderform').action = "";

              }
              else {
                document.getElementById('noerr').innerHTML="This is not a number";
                var tel = document.getElementById('Telephone').value = "";
                document.getElementById('subtn').type = "button";
                document.getElementById('orderform').action = "incs/orderprd.inc.php";
              }
          }
          else if  (tellent == 11) {
              var res = tel.slice(1,11);
              var notnum = isNaN(res);


              if (notnum !== true) {
                var number = "+234"+res;

                if (tel.charAt(0) === "0") {
                  document.getElementById('Telephone').value = number;
                  document.getElementById('orderform').action = "incs/orderprd.inc.php";
                  document.getElementById('subtn').type = "Submit";
                  return true;
                }


              }
              else {
                document.getElementById('noerr').innerHTML="This is not a number";
                var tel = document.getElementById('Telephone').value = "";
                document.getElementById('subtn').type = "button";
              }
          }
          else if (tellent > 14) {
            var tel = document.getElementById('Telephone').value = "";
          }
          else {
            document.getElementById('orderform').action = "";
            document.getElementById('subtn').type = "button";
            return false;


          }
        }
        function proccedtel(number) {

          if (datetel(number) !== true) {

            document.getElementById('orderform').action = "";
            document.getElementById('noerr').innerHTML="There is an error in your Contact number";


          }

        }

        function calcost(){
          var qtyneeded = document.getElementById('qtyneeded').value;
          var price = <?php echo $prdExists['prdprice']; ?>;
           document.getElementById('saleprice').innerHTML = "This will cost you #"+price * qtyneeded;
        }

      </script>
    </form>

  </div>


  </div>
  </div>
  </div>
  

<script type="text/javascript">
  function back() {
  window.history.back()
  }
</script>
 

 
<?php

include_once "footer.php";
?>