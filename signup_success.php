<?php
//Good exampe of how to use Post method.
include 'dbc.php';
include 'NavBar.php';
$con = OpenCon();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signup_success.css">
</head>
<body>
    <h2>You made it! Now you can</h2>
    <a href="Login.php">Login here</a>
</body>
</html>
<?php include 'Footer.php'; ?>

