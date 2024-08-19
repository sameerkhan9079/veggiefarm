<?php 
session_start();
include('connect.php');
include('header.php');

if (!isset($_SESSION['username'])) {
    // Uncomment the line below to redirect to the login page if the user is not logged in
    // header("location:login.php");
}

if(isset($_GET['id'])){
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE product_id='$product_id'";
    $result = mysqli_query($conn, $sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('boots_icon.php');?>
  <?php include('css/style.php');?>
  <?php include('css/media.php');?>
  <title>onion</title>
</head>
<body> 
  <section>
<?php 
while($row = mysqli_fetch_assoc($result)){
  
?>
  <div class="product_main">
   
    <div class="left_item">
   
      <div class="item_img">
          <img src="admin/<?php echo $row['thumbnail']?>" alt="item image" height="378px"
          width="393px">
        </div> <div class="sub-con">
          <div class="item_details">
           <h4><?php echo $row['product_name']?></h4>
            <ul>
              <li><h6>DESCRIPTION:</h6><p style="font-size:0.8rem"><?php echo $row['product_description']?>.</p></li>

              <li class="mt-2"><h6>PRICE:</h6><p ><strong style="font-size:1.2rem;">₹<?php echo $row['price']?></strong>.00</p>
              <br>
            <p style="font-size:0.8rem">Inclusive of all taxes</p></li>
             
              
            <form action="addToCart.php"class="">
            <li><h6>QUANTITY:</h6><span><a href="#"class="btn btn-danger  w-20"id="less">-</a></span>

            <input type="hidden" name="id" value="<?php echo $product_id;?>">
            <span><input class="form-control " type="number" id="quantity"name="quantity"style="border:1px solid #3333;width:4rem;display:inline;text-align:center"value="1"readonly></span>
            
            <span><a href="#"class="btn btn-primary w-20"id="add">+</a></span></li>
            
          
            </div>
</ul>

        <div class="row check">
        <div class="col-md-6 t-price">
              <p class="mt-1" id="sub">Subtotal (<span id="item-count">1</span> item):</p>
              <span id="total">₹ <span id="total-price"><?php echo htmlspecialchars($row['price']); ?></span></span>
            </div>
            
          <div class="col-md-6 btn-add">
          <div class="checkout wrapper ">
             <button href="addToCart.php?id=<?php echo $row['product_id']?>" class="btn btn-check "type="submit">ADD TO CART</a></div>
             </div>
          </div>
          </form>
        </div>
        </div>
        
    <div class="right_item mx-2">
    <div class="item-1  px-2 ">
            <div class="leftitem  "><i class="fa-solid fa-cart-shopping fa-2xl" style="color: #006d77;"></i></div>
            <div class="items ">
                <h6>Free Fast Delivery</h6>
                <span style="color:#3b3d42">Free on order over ₹300</span>
            </div>
        </div>
    <div class="item-1  px-2 ">
            <div class="leftitem  "><i class="fa-solid fa-headset fa-2xl" style="color: #006d77;"></i></div>
            <div class="items ">
                <h6>24/7 Call Support</h6>
                <span style="color:#3b3d42">Contact Us 24 Hours A Day</span>
            </div>
        </div>
    <div class="item-1  px-2 ">
            <div class="leftitem  "><i class="fa-solid fa-tag fa-2xl" style="color: #006d77;"></i></div>
            <div class="items ">
                <h6>Our Special Offer</h6>
                <span style="color:#3b3d42">Offer is Any Kind of Discount</span>
            </div>
        </div>
    <div class="item-1  px-2 "style="border:none;">
            <div class="leftitem  "><i class="fa-solid fa-face-smile fa-2xl" style="color: #006d77;"></i></div>
            <div class="items ">
                <h6>For Quality Product</h6>
                <span style="color:#3b3d42">Sell Hightest Quality Items</span>
            </div>
        </div>
        
    </div>
  
  </div>
  </section>
  <footer>
  <div class="f-row3">
   <?php
   $GLOBALS['d'] = Date('Y');
   ?>
      <p>Copyright © <?php echo $d;?> 
        <font style="color:#81c408;">VEGGIE FARM</font>
        Inc. All rights reserved.
      </p>
  </div>
  </footer>
 
<script>
      document.addEventListener("DOMContentLoaded", function() {
      const productPrice = parseFloat(<?php echo json_encode($row['price']); ?>);
      let quantity = 1;

      function updateQuantityAndPrice() {
        document.getElementById('quantity').value = quantity;
        document.getElementById('total-price').innerText = (productPrice * quantity).toFixed(2);
      }

      document.getElementById('add').addEventListener('click', function() {
        quantity++;
        updateQuantityAndPrice();
      });

      document.getElementById('less').addEventListener('click', function() {
        if (quantity > 1) {
          quantity--;
          updateQuantityAndPrice();
        }
      });

      updateQuantityAndPrice(); // Initial call to set total price
    });
  
</script>
  <?php }?>
    <?php include('js/boot_script.php')?>
</body>
</html>