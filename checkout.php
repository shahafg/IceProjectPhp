<?php
include 'dbc.php';
include 'NavBar.php';

$con = OpenCon();

// Check if the cart exists
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];

if (empty($cart)) {
    echo "<h2>Your cart is empty!</h2>";
    echo "<a href='Products.php'>Continue Shopping</a>";
    CloseCon($con);
    include 'Footer.php';
    exit();
}

$productIds = implode(',', array_keys($cart)); //We join array elements with a string seperate by coma.
$result = mysqli_query($con, "SELECT * FROM products WHERE pid IN ($productIds)");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="Checkout.css">
</head>
<body>

<h2>Checkout</h2>

<h3>Order Summary</h3>
<table border='1'>
    <tr>
        <th>pid</th>
        <th>name</th>
        <th>price</th>
        <th>Quantity</th>
        <th>Subtotal</th>
    </tr>

    <?php
    $total = 0;

    while ($row = mysqli_fetch_array($result)) {
        $pid = $row['pid'];
        $quantity = $cart[$pid];
        $subtotal = $row['price'] * $quantity;
        $total += $subtotal;

        echo "<tr>";
        echo "<td>$pid</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>$" . number_format($row['price'], 2) . "</td>"; // number_format =  display with two decimal numbs 9.[99] 
        echo "<td>$quantity</td>";
        echo "<td>$" . number_format($subtotal, 2) . "</td>";
        echo "</tr>";
    }
    ?>

</table>
<h3>Total: $<?php echo number_format($total, 2); //end of php code block. ?></h3>

<!-- Placeholder for upgrading the project 'your order has been successfully placed' -->
<button onclick="alert('your order is waiting for accepting')">Confirm Order</button>

<br><br>
<a href="viewcart.php" style="text-decoration: none;">
    <button>Back to Cart</button>
</a>

<?php
CloseCon($con);
?>

</body>
</html>
