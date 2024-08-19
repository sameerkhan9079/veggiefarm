<?php
session_start();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 1;

    $_SESSION['cart'][$id] = array('quantity' => $quantity);
    header('location:cart.php');
}

?>
