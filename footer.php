<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>footer</title>
</head>
<body>
<footer id="foot">
  <div class="footer">
    <div class="f-row1">
   <a href="index.php"><button class="b-btn" style="margin:0 0;width:100%;font-size:0.9rem;border:none;">Back to Top</button></a>
</div>
<div class="f-row2">

    <div class="col_1">
      <h6>Why People Like Us</h6>
      <p style="font-size: 0.8rem;text-align: justify;line-height: 2rem;font-family:Verdana, Geneva, Tahoma, sans-serif">
        
        Veggie Farm, for the freshest and highest-quality food and vegetables. We are dedicated to bringing you farm-fresh produce straight to your doorstep, ensuring that you and your family enjoy nutritious and delicious meals. 
      </p>
  
      <button class="b-btn" style="margin:0 0 ;width:45%; line-height:1.5;padding:10px 10px;font-size:0.9rem;border:none;">view more</button>
    
    </div>
    <div class="col_2">
      <h6>Store Information</h6>
      <li><strong>Address:</strong> Veggie Farm, Jodhpur Rajasthan</li>
      <li><strong>Call Us:</strong> (91+) 9079997283</li>
      <li><strong>Email Us:</strong> sameerkhan04843@gmail.com</li>
      <ul class="social">
      <li><i class="fa-brands fa-facebook"></i>&emsp;
        <i class="fa-brands fa-x-twitter"></i>&emsp;
        <i class="fa-brands fa-linkedin"></i>&emsp;
        <i class="fa-brands fa-instagram"></i>
      </li>
    </ul>
    </div>
    <div class="col_3">
       <h6>Useful Links</h6>
         <li>About Us</li>
         <li>Account</li>
         <li>Shopping Cart</li>
         <li>Fruits</li>
         <li>Wishlist</li>
         <li>Contact</li>
    </div>
    <div class="col_4">
      <h6>Customer Care</h6>
      <li>Brands</li>
      <li>Gift Certificates</li>
      <li>Specials</li>
      <li>Affiliate</li>
      <li>News Letter</li>
      <li>Order History</li>
    </div>
  </div>
  <div class="f-row3">
   <?php
   $GLOBALS['d'] = Date('Y');
   ?>
      <p>Copyright © <?php echo $d;?> 
        <font style="color:#81c408;">VEGGIE FARM</font>
        Inc. All rights reserved.
      </p>
  </div>
</div>
</footer>
</body>
</html>