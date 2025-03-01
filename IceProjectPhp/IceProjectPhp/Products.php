<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="Products.css">
</head>
<body>

<?php
include 'NavBar.php';
include 'dbc.php';
$con = OpenCon();
$result = mysqli_query($con, "SELECT * FROM products");

// deliver what the user add to the cart using the form
echo "<form method='POST' action='carthandler.php'>";
echo "<table border='1'>
<tr>
<th>pid</th>
<th>name</th>
<th>price</th>
<th>stock</th>
<th>productMakat</th>
<th>img</th>
<th>Quantity</th>
<th>Add to Cart</th>
</tr>";

// show the images
//using associative array key and value:
$productsimages = [
    'Calipo Classic' => 'Cal3.jpg',
    'Magnum Classic' => 'Mag1.jpg',
    'Calipo Berry' => 'Cal2.jpg',
];

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['pid'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['stock'] . "</td>";
    echo "<td>" . $row['productMakat'] . "</td>";

// if there is an image that match in the assoc arry show it, otherwise show a back up image
$imagePath = isset($productsimages[$row['name']]) ? $productsimages[$row['name']] : 'default.jpg';

// Display the image
echo "<td><img src='images/" . $imagePath . "' width='100'></td>";

//enter a spesefic img
//// echo "<td><img src='images/cal3.jpg' width='100' height='100'></td>";

    //  quantity input --- $row['pid'] pid = pk
    //  --- max ' " . $row['stock'] limit the user for chosing a bigger number than we have in stock. value='1' is a deafult
    echo "<td><input type='number' name='quantity[" . $row['pid'] . "]' min='1' max='" . $row['stock'] . "' value='1'></td>";

    // add glida to cart button by pid
    echo "<td><button type='submit' name='addFcart' value='" . $row['pid'] . "'>Add</button></td>";
    echo "</tr>";
}

echo "</table>";
echo "</form>";

CloseCon($con);
?>

<?php include 'Footer.php'; ?>
</body>
</html>
