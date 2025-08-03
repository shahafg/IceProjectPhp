<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Status</title>
    <link rel="stylesheet" href="viewcart.css">

</head>
<body>

<?php
include 'dbc.php';
include 'NavBar.php';

// check if the cart  exsist or empty, if it does let them go back by clicking Continue Shopping
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>Your cart is empty!</h2>";
    echo "<a href='Products.php'>Continue Shopping</a>";
    exit();
}

$con = OpenCon();
$cart = $_SESSION['cart'];
//// array_keys = $cart: get all the pid 
// implode = join array elements with a string seperate by coma something like: 111,222,333
$productIds = implode(',', array_keys($cart)); 

// res of id's for the user cart whiched I stored above in productIds var
$result = mysqli_query($con, "SELECT * FROM products WHERE pid IN ($productIds)");

// show the cart as a table
echo "<table border='1'>
<tr>
<th>pid</th>
<th>name</th>
<th>price</th>
<th>Quantity</th>
<th>Total</th>
<th>Remove</th>
</tr>";

$total = 0; // starting point of every cart in the world, will update it later

while ($row = mysqli_fetch_array($result)) {
    $pid = $row['pid'];
    $quantity = $cart[$pid];
    // if $quantity> . $row['stock'] . than error and do not accept it.
    $subtotal = $row['price'] * $quantity; // subtotal is the formula for the price (p * q) to update the cart with
    $total += $subtotal; // update the cart val

    //mid summary
    echo "<tr>";
    echo "<td>" . $pid . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $quantity . "</td>";
    echo "<td>" . number_format($subtotal, 2) . "</td>"; //number_format is for 'Nkoda asronit' decimal points 10.99$
     //displaying prices.

     // rmv btn to delete a product from the cart
    echo "<td>
        <form method='POST' action='carthandler.php'>
            <button type='submit' name='rmvFcart' value='" . $pid . "'>Remove</button> 
        </form>
    </td>";
    echo "</tr>";
}

//final summary
echo "</table>";
echo "<h3>Total: $" . number_format($total, 2) . "</h3>"; // price
echo "<a href='Products.php'><button>Continue Shopping</button></a>";
echo "       "; // spacing
echo "<a href='checkout.php'><button>Proceed to Checkout</button></a>";
CloseCon($con);
?>

</body>
</html>