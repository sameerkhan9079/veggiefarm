<?php
session_start();
include('connect.php');

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
<?php include('header.php'); ?>
    <?php include('boots_icon.php'); ?>
    <?php include('css/style.php'); ?>
    <?php include('css/media.php'); ?>
    <title>Home</title>
    <style>
            body{
      margin:0;
      padding:0;
      box-sizing:border-box;
    }
        .fav.active i {
            color: red;
        }
    </style>
</head>
<body>
    <section>
        <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-interval="10000">
                    <img src="./images/slider1_img-Photoroom.png-Photoroom.png" class="d-block w-100 img1" alt="...">
                </div>
                <div class="carousel-item" data-interval="2000">
                    <img src="./images/slider2_img (2)-Photoroom.png-Photoroom.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item hero_section">
                    <img src="./images/slider3 (2)-Photoroom.png-Photoroom.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleInterval" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleInterval" data-slide="next">
                <span class="carousel-control-next-icon next" aria-hidden="true" id="i_color"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </section> 

    <div class="text-container">
        <div class="banner_title">
            <h1>Organic <font class="first">Veggies &amp; Foods</font></h1>
            <div class="animation-text">
                <p id="cook">You Cook</p>
                <p>
                    <span class="word green">Healthy.</span>
                    <span class="word midnight">Wonderful.</span>
                    <span class="word wisteria">Tasty.</span>
                    <span class="word pomegranate">Fancy.</span>
                </p>
            </div>
        </div>
    </div>

    <div class="banner-container">
        <div class="row">
            <div class="first">
                <img src="./images/coco_img.jpg" alt="">
            </div>
            <div class="second">
                <img src="./images/orange_img.jpg" alt="">
            </div>
        </div>
        <div class="row">
            <div class="third">
                <img src="./images/strawberry.png" alt="">
            </div>
            <div class="fourth">
                <img src="./images/broccoli1.png" alt="">
            </div>
        </div>
    </div>

    <section class="about-section" id="about">
        <div class="container" id="top2">
            <div class="section-title">
                <h2>TOP SELLING OFFERS</h2>
            </div>

            <div class="row2">
                <div class="about-tabs">
                    <button type="button" class="tab-item active" data-target="#education">New Arrival</button>
                    <button type="button" class="tab-item" data-target="#experience">Today Offers</button>
                </div>

                <div class="about-text">
                    <div class="tab-content active" id="education">
                        <div class="timeline">
                            <div class="timeline-item new-arr">
                                <div class="head-text">
                                    <h5>New Arrival Fruits and Vegetables</h5>
                                    <p class="para">We've pulled together all our offers into one place, so you won't miss out on a great deal.</p>
                                </div>
                                <div class="card-section">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM products LIMIT 6, 6");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    
                                    while ($row = $result->fetch_assoc()) { 
                                        $product_id = htmlspecialchars($row['product_id']);
                                        $product_offer = htmlspecialchars($row['offer']);
                                        $product_name = htmlspecialchars($row['product_name']);
                                        $product_price = htmlspecialchars($row['price']);
                                        $product_thumbnail = htmlspecialchars($row['thumbnail']);
                                    ?>
                                        <div class="card card-hov" style="width:18rem;">
                                            <span class="h-flow"><?php echo $product_offer; ?>% OFF</span>
                                            <a href="singleProduct.php?id=<?php echo $product_id; ?>">
                                                <img src="admin/<?php echo $product_thumbnail; ?>" class="card-img-top" alt="...">
                                            </a>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $product_name; ?></h5>
                                                <div class="price">
                                                    <span class="fst">₹<?php echo $product_price; ?>.00</span>
                                                </div>
                                                <div class="add-cart wrapper">
                                                    <?php
                                                    if ($user_id) {
                                                        $stmt = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id = ?");
                                                        $stmt->bind_param("ii", $user_id, $product_id);
                                                        $stmt->execute();
                                                        $wishlist_result = $stmt->get_result();
                                                        $in_wishlist = $wishlist_result->num_rows > 0;
                                                    } else {
                                                        $in_wishlist = false;
                                                    }
                                                    ?>
                                                    <a href="#" data-product-id="<?php echo $product_id; ?>" class="btn fav btn-white wishlist-btn <?php echo $in_wishlist ? 'active' : ''; ?>">
                                                        <i class="fa-regular fa-heart fa-lg wishlist-icon"></i>
                                                    </a>
                                                    <a href="addToCart.php?id=<?php echo $product_id; ?>" class="btn btn-success btn-hov">ADD TO CART</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" id="experience">
                        <div class="timeline">
                            <div class="timeline-item today-offer">
                                <div class="head-text">
                                    <h5>Today Offers in Fruits and Vegetables</h5>
                                    <p class="para">We've pulled together all our offers into one place, so you won't miss out on a great deal.</p>
                                </div>
                                <div class="card-section">
                                    <?php
                                    $stmt = $conn->prepare("SELECT * FROM products LIMIT 12, 6");
                                    $stmt->execute();
                                    $result = $stmt->get_result();
                                    
                                    while ($row = $result->fetch_assoc()) {
                                        $product_id = htmlspecialchars($row['product_id']);
                                        $product_offer = htmlspecialchars($row['offer']);
                                        $product_name = htmlspecialchars($row['product_name']);
                                        $product_price = htmlspecialchars($row['price']);
                                        $product_thumbnail = htmlspecialchars($row['thumbnail']);
                                    ?>
                                    <div class="card card-hov" style="width: 18rem;">
                                        <span class="h-flow"><?php echo $product_offer; ?>% OFF</span>
                                        <a href="singleProduct.php?id=<?php echo $product_id; ?>">
                                            <img src="admin/<?php echo $product_thumbnail; ?>" class="card-img-top" alt="...">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product_name; ?></h5>
                                            <div class="price">
                                                <span class="fst">₹<?php echo $product_price; ?>.00</span>
                                            </div>
                                            <div class="add-cart wrapper">
                                                <a href="#" data-product-id="<?php echo $product_id; ?>" class="btn fav btn-white wishlist-btn">
                                                    <i class="fa-regular fa-heart fa-lg wishlist-icon"></i>
                                                </a>
                                                <a href="addToCart.php?id=<?php echo $product_id; ?>" class="btn btn-success btn-hov add-to-cart" id="insert">ADD TO CART</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="full-container">
            <div class="left-bag">
                <img src="./images/bagImage.png" alt="">
            </div>
            <div class="right-text">
                <div class="text-box">
                    <span>
                        <i class="far fa-circle"></i>
                        <i class="far fa-circle"></i>
                        <i class="far fa-circle"></i>
                    </span>
                    <span id="sm-head">FRESH FROM OUR FARM</span>
                    <div class="ani-text">
                        <h2>Trusted Organic <font style="color:#81c408;">
                            <span>F</span><span>o</span><span>o</span><span>d</span>
                        </font> Store Conscious</h2>
                    </div>
                    <p>Apparently we had reached a great height in the atmosphere, for the sky was a
                        dead black, and the stars had ceased to twinkle. Height in the atmosphere,
                        for the sky was a dead black, and the stars had.
                    </p>
                </div>
                <div class="icons">
                    <div class="left-icon">
                        <span class="circle"><img src="./images/bag-img1.png" alt=""></span>
                        <span>Promotions of The Week</span>
                    </div>
                    <div class="right-icon">
                        <span class="circle"><img src="./images/bag-img2.png" alt=""></span>
                        <span>Promotions of The Week</span>
                    </div>
                </div>
                <a href="#top2"><button class="b-btn">Buy Now</button></a>
            </div>
        </div>
    </section>

    <div class="service">
        <div class="item1">
            <div class="leftitem"><i class="fas fa-shipping-fast"></i></div>
            <div class="rightitem">
                <h6>FREE DELIVERY</h6>
                <span>Free on orders over ₹300</span>
            </div>
        </div>
        <div class="item2">
            <div class="leftitem"><i class="fa-regular fa-face-smile"></i></div>
            <div class="rightitem">
                <h6>FOR QUALITY PRODUCT</h6>
                <span>Sell Highest Quality Item</span>
            </div>
        </div>
        <div class="item3">
            <div class="leftitem"><i class="fas fa-exchange-alt"></i></div>
            <div class="rightitem">
                <h6>3 DAY RETURN</h6>
                <span>3 Day Money Guarantee</span>
            </div>
        </div>
        <div class="item4">
            <div class="leftitem"><i class="fa-solid fa-headset"></i></div>
            <div class="rightitem">
                <h6>24/7 SUPPORT</h6>
                <span>Support Every Time Fast</span>
            </div>
        </div>
    </div>

    <?php include('footer.php'); ?>
    <?php include('js/MyScript.php'); ?>
    <?php include('js/boot_script.php'); ?>

    <script>
        </script>
</body>
</html>
