<?php 
@session_start();
ob_start();
include('connect.php');

// Initialize cart session 
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Check if user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Fetch user ID
    $sql = "SELECT id FROM registration WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $user_result = $stmt->get_result();
    $user = $user_result->fetch_assoc();

    if ($user) {
        $user_id = $user['id'];

        // Get wishlist count
        $sql = "SELECT COUNT(*) as count FROM wishlist WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $count_result = $stmt->get_result();
        $count_row = $count_result->fetch_assoc();
        $_SESSION['wishlist_count'] = $count_row['count'];
    }
}

// Search functionality
$searchTerm = isset($_POST['fsearch']) ? $_POST['fsearch'] : '';
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
        echo "<script>alert('Search Result Not Available');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Bootstrap and icons -->
    <?php include('boots_icon.php'); ?>
    <!-- CSS files -->
    <?php include('css/style.php'); ?>
    <?php include('css/media.php'); ?>

    <title>Header</title>
    <style>
        /* Additional custom styles */
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
            margin: 0;
            border-top: 1px solid #dee2e6;
        }
        .dropdown-menu {
            background: url('images/hover-img.png');
            background-size: cover;
            background-repeat: no-repeat;
            border: none;
        }
        .dropdown-menu .dropdown-item > li > a:hover {
            background-image: none;
            background-color: none;
        }
        .btn-ac {
            outline: none !important;
            border: none !important;
            box-shadow: none !important;
        }
        /* for search bar animation */
        .nav-search .input-group{
            flex-wrap:nowrap;
        }
        #search-bar {
    width: 100%;
    height: 100%;
    padding: 10px;
    font-size: 16px;
    /* border: 2px solid #ccc; */
    border-radius: 25px;
    outline: none;
    z-index: 2;
    background-color: transparent;
}

.animated-placeholder {
    position: absolute;
    top: 25%;
    left: 15px;
    transform: translateY(50%);
    font-size: 0.8rem;
    color:#F0F8FF;
    font-weight:500;
    letter-spacing: 1.5px;
    white-space: nowrap;
    pointer-events: none;
    z-index: 1;
    opacity: 0;
    transition: opacity 0.3s ease-in-out, transform 0.5s ease-in-out;
}

.search-container:focus-within .animated-placeholder,
#search-bar:not(:placeholder-shown) ~ .animated-placeholder {
    opacity: 0;
    transform: translateY(-10px);
}

.animated-placeholder.show {
    opacity: 1;
    transform: translateY(0);
}


    </style>
</head>
<body>

<header class="header">
    <!-- Top Navigation Bar -->
    <nav class="nav-bar my-nav" id="top">
        <div class="nav-logo">
            <a href="./index.php"><img src="./images/web_logo001.png" alt="Logo"></a>
        </div>
        <div class="nav-search">
            <form method="POST" class="col-md-12">
                <div class="input-group">
                    <input type="text" class="form-control" name="fsearch"id="search-bar" placeholder="" value="<?php echo htmlspecialchars($searchTerm); ?>" style="border-radius: .25rem;border-color:#f8f9fa">
                    <button class="btn btn-outline-light ml-2" type="submit" name="ok" id="button-addon2">Search</button>
                    <div class="animated-placeholder"></div>
                </div>
            </form>
        </div>
        <div class="acc-desk">
            <img src="./images/bussiness-man.png" alt="Account" width="40px" height="40px">
            <div class="acc">
                <div class="btn-group">
                    <button type="button" class="btn btn-light btn-ac text-white p-0 m-0 dropdown-toggle" data-toggle="dropdown" aria-expanded="false" style="background-color: #15616d;">
                        Account
                    </button>
                    <div class="dropdown-menu bg-light mt-4">
                        <a class="dropdown-item text-dark ml-4" href="my_orders.php">My Orders</a>
                        <a class="dropdown-item text-dark ml-4" href="index_logout.php">Logout</a>
                    </div>
                </div>
                <div class="acc-re-lo">
                    <?php if (isset($_SESSION['username'])): ?>
                        <p class='username text-capitalize fs-1 fw-bold'>Hi <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                        <style>
                            .acc-desk {
                                justify-content: center;
                                gap: 10px;
                            }
                        </style>
                    <?php else: ?>
                        <a href="./registerForm.php" class="register" aria-label="Account">Register</a> |
                        <a href="login.php" aria-label="Account" class="login">Login</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="cart">
            <button id="openCartBtn" class="btn-open-cart">
                <i class="fa-solid fa-cart-shopping fa-xl"></i>
                <span class="cart-counter">
                    <?php echo count($_SESSION['cart'] ?? []); ?>
                </span>
            </button>
            <div id="cartSidebar" class="cart-sidebar">
                <div class="cart-header">
                    <span class="closebtn" id="closeCartBtn">&times;</span>
                    <h4>Your Cart</h4>
                </div>
                <div class="cart-content">
                    <?php
                    $total = 0;
                    $cart = $_SESSION['cart'] ?? [];
                    if (!empty($cart)):
                        foreach ($cart as $key => $value):
                            $sql = "SELECT * FROM products WHERE product_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param('i', $key);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            $row = $result->fetch_assoc();
                            $subTotal = $row['price'] * $value['quantity'];
                            $del = ($subTotal <= 300) ? 40 : 0;
                            $total = $subTotal + $del;
                            ?>
                            <div class="row cart-detail">
                                <div class="col-4 cart-detail-img">
                                    <img src="admin/<?php echo htmlspecialchars($row['thumbnail']); ?>" class="img-fluid" alt="Product Image">
                                </div>
                                <div class="col-8 cart-detail-product">
                                    <p><a href="single.php?id=<?php echo htmlspecialchars($row['product_id']); ?>"><?php echo htmlspecialchars($row['product_name']); ?></a></p>
                                    <span class="price text-info">₹ <?php echo htmlspecialchars($row['price']); ?>.00</span>
                                    <span class="count mt-2">Quantity: <?php echo htmlspecialchars($value['quantity']); ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Your cart is empty.</p>
                    <?php endif; ?>
                    <div class="charges-summary px-3 py-3">
                        <div class="charge-item d-flex justify-content-between">
                            <span>Sub Total:</span>
                            <h6 class="charge-amount">₹<?php echo htmlspecialchars($subTotal ?? 0); ?></h6>
                        </div>
                        <div class="charge-item d-flex justify-content-between">
                            <span>Delivery Charges:</span>
                            <h6 class="charge-amount">₹<?php echo htmlspecialchars($del ?? 0); ?></h6>
                        </div>
                    </div>
                    <hr class="separator">
                    <div class="total-summary px-3 py-3">
                        <div class="d-flex justify-content-between">
                            <span>Total:</span>
                            <h6 class="total-amount">₹<?php echo htmlspecialchars($total ?? 0); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="cart-footer mt-2">
                    <a href="cart.php"><button class="btn-checkout mb-2">View Cart</button></a>
                    <a href="checkout.php"><button class="btn-checkout">Checkout</button></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Secondary Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light my-nav2">
        <div class="nav-items">
            <div class="navbar-nav nav-line">
                <li class="nav-item active">
                    <a class="nav-link border-0" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle border-0" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Vegetables</a>
                    <div class="dropdown-menu drop-mn" style="background: url(./images/hover-img.png);">
                        <a class="dropdown-item" href="#" style="font-weight: 500; font-size: 1.2rem;">All Vegetables</a>
                        <?php    
                        $sql2 = "SELECT * FROM category LIMIT 0,6";
                        $result2 = mysqli_query($conn, $sql2);
                        while ($row2 = mysqli_fetch_array($result2)): ?>
                            <a class="dropdown-item" href="showCategoryItems.php?id=<?php echo htmlspecialchars($row2['cat_id']); ?>"><?php echo htmlspecialchars($row2['cat_name']); ?></a>
                        <?php endwhile; ?>  
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle border-0" href="#" role="button" data-toggle="dropdown" aria-expanded="false">Fruits</a>
                    <div class="dropdown-menu drop-mn" style="background: url(./images/hover-img.png);">
                        <a class="dropdown-item" href="#" style="font-weight: 500; font-size: 1.2rem;">All Fruits</a>
                        <?php    
                        $sql2 = "SELECT * FROM category LIMIT 6,6";
                        $result2 = mysqli_query($conn, $sql2);
                        while ($row2 = mysqli_fetch_array($result2)): ?>
                            <a class="dropdown-item" href="showCategoryItems.php?id=<?php echo htmlspecialchars($row2['cat_id']); ?>"><?php echo htmlspecialchars($row2['cat_name']); ?></a>
                        <?php endwhile; ?>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link border-0" href="contact.php">Contact</a>
                </li>
                <div class="wishlist "style="position:absolute;right:1%">
                <li class="nav-item">
                        <a class="nav-link border-0" href="wishlist.php" title="Wishlist">
                            <i class="fa-regular fa-heart"></i>
                            <span class="wishlist-counter" style="color: #ffb703;">
                                <?php echo $_SESSION['wishlist_count'] ?? 0; ?>
                            </span>
                        </a>    
                    </li>
                </div>
            </div>
        </div>
    </nav>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var openCartBtn = document.getElementById('openCartBtn');
    var closeCartBtn = document.getElementById('closeCartBtn');
    var cartSidebar = document.getElementById('cartSidebar');

    openCartBtn.addEventListener('click', function() {
        cartSidebar.style.width = '300px'; // Set width of the sidebar when opened
    });

    closeCartBtn.addEventListener('click', function() {
        cartSidebar.style.width = '0';
    });
});
</script>
<script>
    // for search animation text
    const placeholders = ['Search "mango"', 'Search "banana"','Search "tomato"','Search "potato"','Search "grapes"','Search "orange"','Search "onion"','Search "cabbage"','Search "chilli"','Search "apple"'];
let index = 0;

const placeholderDiv = document.querySelector('.animated-placeholder');

function changePlaceholder() {
    placeholderDiv.classList.remove('show');
    
    setTimeout(() => {
        placeholderDiv.textContent = placeholders[index];
        placeholderDiv.classList.add('show');
        index = (index + 1) % placeholders.length;
    }, 500); // Wait for the previous text to disappear before showing the new one
}

setInterval(changePlaceholder, 2500); 

// Initially set the placeholder
changePlaceholder();
</script>
</body>
</html>
