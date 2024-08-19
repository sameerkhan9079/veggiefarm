<?php
session_start();
include('connect.php');
include('header.php');

// if (!isset($_SESSION['username'])) {
//     header("location:login.php");
//     exit();
// }

@$username = $_SESSION['username'];

$stmt = $conn->prepare("SELECT id FROM registration WHERE user_name = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$user_result = $stmt->get_result();
$user = $user_result->fetch_assoc();
@$user_id = $user['id'];

// for identify current page category
$currentCategoryId = isset($_GET['id']) ? $_GET['id'] : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap and icons -->
    <?php include('boots_icon.php'); ?>
    <?php include('css/style.php'); ?>
    <?php include('css/media.php'); ?>
    <title>Categories Page</title>
    <style>
    .left .lists li .active-category {
            /* color: #28a745; */
            color: green;
            font-weight: bold;
        }
        .main{
            border:none;
        }
        .fav.active i {
            color: red;
        }
    </style>
</head>
<body>

    <!-- main section -->
    <div class="main">
        <div class="left">
            <div class="heading">
                <h5>CATEGORIES</h5>
            </div>
            <div class="lists">
                <h5 class="v-hd"><i class="fa-solid fa-arrow-right fa-lg"></i>&nbsp;&nbsp;Vegetables</h5>
                <?php    
                $sql2 = "SELECT * FROM category LIMIT 0,6";
                $result2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_array($result2)){
                    $isActive = $currentCategoryId == $row2['cat_id'] ? 'active-category' : '';
                    
                ?>   
                    <li><a href="showCategoryItems.php?id=<?php echo $row2['cat_id']?>" class="text font-weight-bold <?php echo $isActive; ?>"><?php echo $row2['cat_name']?></a></li>
                <?php } ?>
            </div>
            <div class="lists">
                <h5 class="v-hd"><i class="fa-solid fa-arrow-right fa-lg"></i>&nbsp;&nbsp;Fruits</h5>
                <?php    
                $sql2 = "SELECT * FROM category LIMIT 6,6";
                $result2 = mysqli_query($conn, $sql2);
                while($row2 = mysqli_fetch_array($result2)){
                    $isActive = $currentCategoryId == $row2['cat_id'] ? 'active-category' : '';
                ?>   
                    <li><a href="showCategoryItems.php?id=<?php echo $row2['cat_id']?>" class="text font-weight-bold <?php echo $isActive; ?>"><?php echo $row2['cat_name']?></a></li>
                <?php } ?>
            </div>
        </div>
        <div class="right">
            <div class="card-sec card-section">
                <?php
                $sql = "SELECT * FROM products";
                if ($currentCategoryId) {
                    $sql .= " WHERE cat_id = '$currentCategoryId'";
                }

                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_assoc($result)) {
                    $product_id = $row['product_id'];
                ?>
                <div class="card card-hov" style="width: 18rem;">
                    <span class="h-flow"><?php echo $row['offer']; ?>% OFF</span>
                    <a href="singleProduct.php?id=<?php echo $product_id ?>"><img src="admin/<?php echo $row['thumbnail']; ?>" class="card-img-top" alt="..."></a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
                        <div class="price">
                            <span class="fst">₹<?php echo $row['price']; ?>.00</span>
                        </div>
                        <div class="add-cart wrapper">
                            <?php
                            $stmt = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id = ?");
                            $stmt->bind_param("ii", $user_id, $product_id);
                            $stmt->execute();
                            $wishlist_result = $stmt->get_result();
                            $in_wishlist = $wishlist_result->num_rows > 0;
                            ?>
                            <a href="#" data-product-id="<?php echo $product_id; ?>" class="btn fav btn-white wishlist-btn <?php echo $in_wishlist ? 'active' : ''; ?>">
                                <i class="fa-regular fa-heart fa-lg wishlist-icon"></i>
                            </a>
                            <a href="singleProduct.php?id=<?php echo $row['product_id']?>" class="btn btn-success btn-hov">ADD TO CART</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include('footer2.php'); ?>
    <!-- boot_script -->
    <?php include('js/boot_script.php'); ?>
    <?php include('js/MyScript.php'); ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.wishlist-btn').forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                var favIcon = this;
                var productID = this.getAttribute('data-product-id');

                if (!productID) {
                    console.error('Product ID not found');
                    return;
                }

                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'wishlist_Add.php', true);
                xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.status === 'added') {
                            favIcon.classList.add('active');
                        } else if (response.status === 'removed') {
                            favIcon.classList.remove('active');
                        } else if (response.status === 'error') {
                            console.error(response.message);
                        }

                        // Update the wishlist counter
                        document.querySelector('.wishlist-counter').textContent = response.wishlist_count;
                    } else {
                        console.error('Request failed with status:', xhr.status);
                    }
                };
                xhr.send('product_id=' + encodeURIComponent(productID));
            });
        });
    });
    </script>
</body>
</html>
