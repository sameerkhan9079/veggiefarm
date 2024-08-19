<?php
session_start();
ob_start();
include('connect.php');
include('header.php');
include('css/style.php');

// Initialize cart session if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if the user is logged
// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $user_id = $_SESSION['username'];
    
}
?>
<head>
    <style>
        /* Styles here */
        .t-m {
            margin-top: -1rem;
        }
        .cart-title {
            font-family: 'Arial', sans-serif;
            font-size: 1.8rem;
            font-weight: bold;
            color: #343a40;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-bottom: 2px solid #007bff;
            display: inline-block;
        }
        .card {
            border-radius: 10px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-bottom: 0;
            border-radius: 10px 10px 0 0;
        }
        .card-body {
            border-radius: 0 0 10px 10px;
            background-color: #f8f9fa;
        }
        .font-weight-bold {
            font-weight: 700;
        }
        .text-right {
            text-align: right;
        }
        .text-danger {
            color: #dc3545;
        }
        .btn-check {
            background-color: seagreen;
            border: 2px white solid;
            color: #fff;
        }
        .btn-check:hover {
            background-color: #fff;
            border: 2px seagreen solid;
            color: seagreen;
            transition: 0.3s ease;
        }
        .head-bg {
            background-color: #006d77;
        }
        .btn.focus, .btn:focus {
            outline: 0;
            box-shadow: none;
        }
    </style>
</head>

<div class="text-center mt-4 mb-4">
    <h4 class="cart-title">CART</h4>
</div>

<div class="container h-auto">
   <table class="table t-m table-bordered table-hover bg-white">
       <tr class="bg-light">
           <th>Image</th>
           <th>Product</th>
           <th>Price</th>
           <th class="col-md-1">Quantity</th>
           <th class="col-md-2">Update Quantity</th>
           <th>Total</th>
           <th class="col-md-1">Action</th>
       </tr>

       <?php
       $subTotal =0;
    //    $deliveryCharges = 0;
     
       foreach($_SESSION['cart'] as $product_id => $product_details){
           $sql = "SELECT * FROM products WHERE product_id = $product_id";
           $result = mysqli_query($conn, $sql);
           if ($row = mysqli_fetch_assoc($result)) {
               $totalPrice = $row['price'] * (@$product_details['quantity']);
               $subTotal += $totalPrice;
       ?>
            <tr>
                <td><img src="admin/<?php echo $row['thumbnail']; ?>" alt="" height="70px" width="70px"></td>
                <td><a href="singleProduct.php?id=<?php echo $row['product_id']; ?>"><?php echo $row['product_name']; ?></a></td>
                <td>₹<?php echo $row['price']; ?></td>
                <td><?php echo @$product_details['quantity']; ?></td>
                <td class="text-center">
                    <form action="updateCart.php" method="GET" class="d-inline-flex align-items-center justify-content-center">
                        <input type="hidden" name="id" value="<?php echo $product_id; ?>">
                        <input class="form-control mr-1" type="number" name="quantity" style="width: 4rem; text-align: center;" value="<?php echo $product_details['quantity']; ?>" min="1">
                        <a href="updateCart.php?id=<?php echo $product_id?>">
                        <button type="submit" data-product-id="1"class="btn btn-primary">Update</button></a>
                    
                </td>
                <td>₹<?php echo $totalPrice; ?></td>
                <td><a href='deleteCart.php?id=<?php echo $product_id; ?>' class="btn btn-danger">Remove</a></td>
            </tr>
            </form>
        <?php
           }
       }
       if($subTotal<=300){
        $deliveryCharges = 40;
    }
    if($subTotal == 0){
        $deliveryCharges = 0;
    }
    $total = $subTotal + (@$deliveryCharges);
       ?>
   </table>

   <div class="text-right mt-3">
       <a href="checkout.php"><button class="btn btn-check btn-lg px-4 mb-2">Checkout</button></a>
   </div>

   <div class="card mb-4 shadow-sm border-0">
       <div class="card-header head-bg text-white font-weight-bold">Cart Total</div>
       <div class="card-body p-4">
           <div class="row mb-2">
               <div class="col-6 font-weight-bold">Sub Total Amount:</div>
               <div class="col-6 text-right">₹<?php echo $subTotal; ?>.00/-</div>
           </div>
           <div class="row mb-2">
               <div class="col-6 font-weight-bold">Delivery Charges:</div>
               <div class="col-6 text-right">₹<?php echo @$deliveryCharges; ?>.00/-</div>
           </div>
           <div class="row border-top my-2 pt-2">
               <div class="col-6 font-weight-bold">Total Amount:</div>
               <div class="col-6 text-right text-danger font-weight-bold">₹<?php echo $total; ?>.00/-</div>
           </div>
       </div>
   </div>
</div>

<script>

</script>

<?php include('js/boot_script.php'); ?>
