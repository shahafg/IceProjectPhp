<?php
session_start();
// include 'user_status.php';
echo 
"<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Ice Cream Website</title>
    <link rel='stylesheet' href='NavBar.css'>
</head>
<body>
    <nav>
        <ul>
            <li class='navbar-logo'>
                <a href='HomePage1.php'>
                    <img src='images/LAmnon.jpg' alt='Logo' class='logo'>
                </a>
            </li>
            <div class='nav-links'>
                <li><a href='HomePage1.php'>Home 🏠</a></li>
                <li><a href='about.php'>About 🍦</a></li>
                <li><a href='contactus.php'>ContactUs 📞</a></li>";

                if(!isset($_SESSION['username'])){
                 echo  '<li><a href=Login.php>Login 📍</a></li>
                    <li><a href=Signup.php>Signup 📍</a></li>';   
                }
                else{
                    echo "<li><a href='Products.php'>Products 🍧</a></li>";
                    echo "<li><a href='viewcart.php'>View Cart 🛒</a></li>";
                    echo "<li><a href=logout.php>Log Out 📍</a></li>
                    <li>",'hi  ',($_SESSION['username']),"</li>";
                }
                echo "
            </div>
        </ul>
    </nav>
</body>
</html>";
?>