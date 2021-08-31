<?php
  include_once 'header.php';


     $inputerror = "";
    function checkformerror($inputerror){
    if (isset($_GET['error'])) {
      $inputerror = $_GET['error'];

    }
    switch ($inputerror) {
      case 'invalidiscount':
        echo "You inputted an invalid discount value!";
        break;

      default:
        // code...
        break;
    }

  }
?>


<section class="shop-upload ">
<div class="section-header">
  Add a product to the shop

  <a href="shop.php">Veiw shop</a> <br>

  <a href="sql/update.txt" target="_blank" rel="noopener noreferrer">View Update Catlogue</a>


</div>

<form class="" action="../incs/uploadshop.inc.php" method="post" enctype="multipart/form-data">
  <label for="Product name" class="prd-info-txt"><span class="text-info">Product Name</span>
  <input type="text" name="prdname" value="" placeholder="Product name">
  </label>
  <label for="Product size" class="prd-info-txt"><span class="text-info">Product size</span>
  <input type="text" name="prdsize" value="" placeholder="Product size"></label>
  <label for="Product Price" class="prd-info-txt"><span class="text-info">Product Price</span>
  <input type="number" name="prdprice" id="prd-price" value="" placeholder="product price" oninput="calcnetprice()"></label>
  <label for="Product Category" class="prd-info-txt"><span class="text-info">Product Category</span>
  <input type="text" name="prdcat" value="" placeholder="category"></label>
  <label for="Sex" class="prd-info-txt"><span class="text-info">Sex</span>
  <select class="" name="prdsex">
    <option value="Unisex">Unisex (Select this for unisex)</option>
    <option value="male">Male</option>
    <option value="Female">Female</option>
  </select></label>
  <label for="Product Photo" class="prd-info-txt"><span class="text-info">Product Photo</span>
  <input type="file" name="prdpic" value=""  placeholder="product photo" ></label>
  <label for="Discount" class="prd-info-txt"><span class="text-info">Discount</span>
  <input type="number" name="prddis" value="0" oninput="calcnetprice()" id="discount-price" placeholder="discount in percentage (if you which)" max="100" maxlength="3"></label>

  <label for="Quantity added" class="prd-info-txt"><span class="text-info">Quanity added</span>
  <input type="number" name="prdqty" value="1" placeholder="quanity added" id="qty_added" oninput="calcnetprice()"></label>

  <label for="Added by" class="prd-info-txt"><span class="text-info">Added by</span>
  <input type="text" name="addedby" value="Added by <?php echo $_SESSION['admin']; ?>" disabled></label>
  <button type="submit" name="submit">Add products</button><br>
  <span id="net-price" style="color:green;"> <?php checkformerror($inputerror);?></span><br><span id="total-sale" style="color:green;"></span><br>
</form>
<script type="text/javascript">
  function calcnetprice() {
    var price = document.getElementById('prd-price').value;
    var discount = document.getElementById('discount-price').value;
    var qty_added = document.getElementById('qty_added').value;
    var net_talk = document.getElementById('net-price').innerHTML;
  if (discount >= 0) {
    if (price > 0) {
      var net_price = discount / 100;
      var net_price = net_price * price;
      var net_price = price - net_price;


        if (net_price >= 0) {
          document.getElementById('net-price').style.color="green";
          document.getElementById('net-price').innerHTML= "Your sale price is #"+net_price+"";
          if (qty_added > 0) {
            document.getElementById('total-sale').innerHTML= "Your total sale price is #"+net_price * qty_added+"";
          }
          else {
            document.getElementById('total-sale').innerHTML= "";


          }
        }
        else if (net_price < 0) {
          document.getElementById('net-price').innerHTML= " #"+net_price+" can't be added to the shop.! try putting a discount less than 99%!";
          document.getElementById('net-price').style.color="red";
        }
    }
  }





  }
</script>
</section>

<?php
include_once 'footer.php'; ?>
