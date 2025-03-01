<!-- This page is about the sign in sign out  -->
<?php
session_start();

// not sure it even in use
if(isset($_SESSION['loggedIn'])){
    echo '<div id="user-status">';
    echo 'Hi, ' . $_SESSION['username'];
    echo ' | <a href="logout.php">Sign Out</a>'; 
    echo '</div>';
} else {
    echo '<div id="user-status">';
    echo '<a href="login.php">Sign In</a>';
    echo '</div>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Status</title>
    <link rel="stylesheet" href="userstatus.css">

</head>
<body>
</body>
</html>
