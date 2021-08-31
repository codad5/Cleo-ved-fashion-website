<?php
include_once 'header.php';
if (isset($_GET['prdid'])) {
  require_once '../incs/dbh.inc.php';
  require_once '../incs/functions.inc.php';
  $prdid = $_GET['prdid'];
  prdexist($conn, $prdid);
  prdallowed($conn, $prdid);
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
      <div class="prd-img-show">
        <img src="../img/gallery/<?php echo $prdExists['prdpic']; ?>" alt="<?php echo $prdExists['prdName']; ?>" class="order-img" width="200px" height="350px" style="">

      </div>
    <div class="prd-abt-show">
      <ul>
        <form action="../incs/update.inc.php" method="post">
        <li>
            
              <label for="PrdName">Name:</label>
              <input type="text" name="nameUpdate" value="<?php echo $prdExists['prdName'];?>"> 
            

        </li>
         <li>
                 
              <label for="PrdName">Price:</label>
              <input type="text" name="priceUpdate" value="<?php echo $prdExists['prdprice'];?>"> 
           

        </li>
        <li>
            
              <label for="PrdName">Size:</label>
              <input type="text" name="sizeUpdate" value="<?php echo $prdExists['prdsize'];?>"> 
           

        </li>
         <li>
            
              <label for="PrdName">Discount:</label>
              <input type="text" name="disUpdate" value="<?php echo $prdExists['prddis'];?>"> 
            

        </li>
        <li>
                 
              <label for="PrdName">Quantity Left:</label>
              <input type="text" name="qtyUpdate" value="<?php echo $prdExists['qtyleft'];?>"> 
           

        </li>
         <li>
                 
              <label for="PrdName">Updated By:</label>
              <input type="text" name="Updateby" value="<?php echo $_SESSION['admin'];?>" readonly> 
           

        </li>
        
        <button type="Submit" name="update" value="<?php echo $_GET['prdid']; ?>">Update</button>
         </form>
      </ul>
      


    </div>

  


    </div>
    </div>

 <?php
 
 include_once "footer.php";
 ?>
