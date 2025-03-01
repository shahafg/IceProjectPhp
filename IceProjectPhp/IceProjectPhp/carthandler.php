<?php
session_start();
include 'dbc.php';
$con = OpenCon();

// if there is no cart create 1
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// get the info from the product page, add to the cart base on the result of add btn
if (isset($_POST['addFcart']) && isset($_POST['quantity'])) {
    $productId = $_POST['addFcart'];
    $quantity = $_POST['quantity'][$productId];

    // query get the stock for this product.
    $resultStock = mysqli_query($con, "SELECT stock FROM products WHERE pid = $productId");
    if ($resultStock && mysqli_num_rows($resultStock) > 0) {
        $rowStock = mysqli_fetch_assoc($resultStock);
        $availableStock = $rowStock['stock'];
    } 

    // how many already in the cart, if false set to 0
    $currentQuantity = isset($_SESSION['cart'][$productId]) ? $_SESSION['cart'][$productId] : 0;
    
    // calc the future qnt
    $futureQuantity = $currentQuantity + $quantity;

    // Check if the new qnt exceeds the stock limit.
    if ($futureQuantity > $availableStock) {
        echo "MOGZAMMM! you passed the limit of the stock, You have already added $currentQuantity items, and only $availableStock are available.";
        echo "<a href='Products.php'><button>Continue Shopping</button></a>"; // here I added a way to go back
        exit();
    }

  // Add the product to the cart if it is the first time (else), update amount if already exsist
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $quantity;
        } else {
            $_SESSION['cart'][$productId] = $quantity;
        }
    
// Redirect back to the Products page
    // used in order to prevents duplicate form submissions
    header("Location: Products.php");
    exit(); // stops the script after the redirect, ensuring no further code is executed
}

// remove glida from the cart
if (isset($_POST['rmvFcart'])) {
    $productId = $_POST['rmvFcart'];
    unset($_SESSION['cart'][$productId]);

    // Redirect back to the cart
    // used in order to update the status of the cart
    header("Location: viewcart.php");
    exit();// same as above
}

?>
