<?php 
@session_start();
include 'connect.php';
// Search functionality
$searchTerm = isset($_POST['name']) ? $_POST['name'] : '';

// Check if search term matches any category
$categoryRedirect = false;
if ($searchTerm) {
    // Escape the search term for safety
    $escapedSearchTerm = mysqli_real_escape_string($conn, $searchTerm);

   
     // Search for a matching category or product
     $categoryQuery = "SELECT * FROM products WHERE product_name LIKE '%$escapedSearchTerm%' OR cat_name LIKE '%$escapedSearchTerm%'";
     $categoryResult = mysqli_query($conn, $categoryQuery);
 
     if (mysqli_num_rows($categoryResult) > 0) {
         // If a match is found, redirect to the category page
         $category = mysqli_fetch_assoc($categoryResult);
         $categoryId = $category['cat_id']; // Assuming 'cat_id' is the category identifier in the database
         header("Location: showCategoryItems.php?id=$categoryId");
         exit;
     } else {
         // If no category/product is found, prepare a search query for further use
         $searchQuery = "WHERE product_name LIKE '%$escapedSearchTerm%' OR cat_name LIKE '%$escapedSearchTerm%' OR price LIKE '%$escapedSearchTerm%' OR offer LIKE '%$escapedSearchTerm%'";
         echo"<script> alert('Search Result Not available');</script>";
     }
}



?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Bootstrap CSS  and Icons-->
    <?php include('boots_icon.php'); ?>

     <!-- css file -->
    <?php include('css/style.php');?>

    <title>Header</title>
    <style>

.charges-summary, .total-summary {
        background-color: #f8f9fa; 
        border-radius: 8px; 
        border: 1px solid #dee2e6; 
    }

    .charge-item, .total-summary {
        padding: 10px 0; 
    }

    .charge-item span, .total-summary span {
        font-weight: 600; 
        font-size: 1rem;
        color: #495057; 
    }

    .charge-amount, .total-amount {
        font-weight: 700; 
        font-size: 1rem;
        color: #007bff; 
    }

    .separator {
        margin: 0; /* Remove default margin */
        border-top: 1px solid #dee2e6; /* Light border color */
    }
 
          .dropdown-menu{

border: none;
border: none;
}
.dropdown-menu .dropdown-item > li > a:hover {
background-image: none;
color:#3333;
background-color:none;
}

.btn-ac {
  outline: none !important;
  border: none !important;
  box-shadow: none !important;
}
    </style>
  </head>
  <body>

  <header class="header">
      <nav class="nav-bar my-nav "id="top">
        <div class="nav-logo">
          <a href="index.php"><img src="../images/web_logo001.png"></a>
        </div>
        <div class="nav-search">
        <form method="POST" class="col-md-12">
                <div class="input-group ">
                
                <input type="text" class="form-control  "name="name" placeholder="Search here..."value="<?php echo htmlspecialchars($searchTerm); ?>"style="border-radius:.25rem;">
                   <button class="btn btn-outline-light ml-2 " type="submit" name="ok" id="button-addon2">Search</button>   </div>
                </form>
                  
           
       
      </div>
      <div class="acc-desk">
        <!-- <i class="icon-user"></i> -->
        <img src="../images/bussiness-man.png" alt="" width="40px"height="40px">
        <div class="acc">

        <div class="btn-group">
  <button type="button" class="btn btn-light btn-ac text-white p-0 m-0 dropdown-toggle" data-toggle="dropdown" aria-expanded="false"style=" background-color:#15616d;border:none">
    Account
  </button>
  <div class="dropdown-menu bg-light mt-4">
    <a class="dropdown-item text-primary" href="my_orders.php">My Orders</a>
    <a class="dropdown-item text-primary" href="index_logout.php">Logout</a>
  </div>
</div>
          <!-- <a href="#" class="acc-ti" aria-label="Account">Account</a> -->
          <div class="acc-re-lo">
           
        
            
                <?php  
                if(isset($_SESSION['username'])){
                  echo '<p class="username text-capitalize fs-1 fw-bold" style="font-size:1rem">Hi '.@$_SESSION['username'].'</p>';
                  echo '<style type="text/css">
                  .acc-desk{
                  justify-content:center;
                  gap:10px;
                }
                  </style>';
                }
                else{
                  echo '<a href="registerForm.php"class="register" aria-label="Account">
                  Register</a>';
                  echo ' | ';
                  echo '<a href="login.php" aria-label="Account"class="login">Login</a>';
                }
                ?>
        
        </div>
        </div>
      </div>
      <div class="wishlist">
        <a class="header-wishlist-btn" href="/pages/wishlist" title="Wishlist">
          <i class="fa-regular fa-heart"></i>
          <span class="wishlist-counter">0</span>
        </a>	
      </div>
    
      <!-- Button to open the sidebar -->
<button id="openCartBtn" class="btn-open-cart">
  <i class="fa-solid fa-cart-shopping fa-xl"></i>
  <span class="cart-counter">
    <?php 
      $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
      $count = count($cart);
    ?>
    <?php echo $count ?>
  </span>
</button>
<!-- The sidebar -->
<div id="cartSidebar" class="cart-sidebar ">
  <div class="cart-header">
    <span class="closebtn" id="closeCartBtn">&times;</span>
    <h4>Your Cart</h4>
  </div>
  <div class="cart-content">
    <?php
    $total = 0;
    if ($count > 0) {
      foreach($cart as $key => $value) {
        $sql = "SELECT * FROM products WHERE product_id = $key";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="row cart-detail">
          <div class="col-4 cart-detail-img">
            <img src="admin/<?php echo $row['thumbnail']?>" class="img-fluid" alt="Product Image">
          </div>
          <div class="col-8 cart-detail-product">
            <p><a href="single.php?id=<?php echo $row['product_id']?>"><?php echo $row['product_name']?></a></p>
            <span class="price text-info">₹ <?php echo $row['price']?>.00</span> 
            <span class="count mt-2">Quantity: <?php 
            echo @$value['quantity']?></span>
          </div>
        </div>
        <?php
     
          
        @$subTotal += $row['price'] * $value['quantity'];
        if($subTotal<=300){
          $del = 40;
       }
       else{
           $del = 0;
       }
        $total=$subTotal + $del;
      }
    } else {
      echo "<p>Your cart is empty.</p>";
      @$subTotal = 0;

    }
  
  
    ?>
    <div class="charges-summary px-3 py-3">
    <div class="charge-item d-flex justify-content-between">
        <span>Sub Total:</span>
        <h6 class="charge-amount">₹<?php echo @$subTotal ?></h6>
    </div>
    <div class="charge-item d-flex justify-content-between">
        <span>Delivery Charges:</span>
        <h6 class="charge-amount">₹<?php echo (@$del); ?></h6>
    </div>
    
</div>
<hr class="separator">
<div class="total-summary px-3 py-3">
    <div class="d-flex justify-content-between">
        <span>Total:</span>
        <h6 class="total-amount">₹<?php echo $total ?></h6>
    </div>
</div>
</div>
  
 
  <div class="cart-footer mt-2">
    <a href="cart.php"><button class="btn-checkout mb-2">View Cart</button></a>
    <a href="checkout.php"><button class="btn-checkout">Checkout</button></a>
  </div>
</div>


      </nav>
    </header>
     <!-- boot_script -->
    <?php include('js/searchFromCategory.php');?>
     <?php include('js/boot_script.php');?>
     <script>
     // JavaScript for opening and closing the cart sidebar
document.addEventListener('DOMContentLoaded', function() {
  var openCartBtn = document.getElementById('openCartBtn');
  var closeCartBtn = document.getElementById('closeCartBtn');
  var cartSidebar = document.getElementById('cartSidebar');

  openCartBtn.addEventListener('click', function() {
    cartSidebar.style.width = '300px'; // Set width of the sidebar when opened
    console.log("hello");
  });

  closeCartBtn.addEventListener('click', function() {
    cartSidebar.style.width = '0';
  });
});
</script>
<?php include('js/boot_script.php')?>
  </body>
</html>