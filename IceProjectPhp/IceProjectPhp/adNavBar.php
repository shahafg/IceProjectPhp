<?php
//this is the nav bar for the admin
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
                <li><a href='connectWithShow.php'>Users👥</a></li>
                <li><a href='adProducts.php'>Products 🍧</a></li>
                <li><a href='ContactUsMesseges.php'>ContactUsMesseges 📞</a></li>";

                if(!isset($_SESSION['username'])){
                 echo  '<li><a href=Login.php>Login 📍</a></li>
                    <li><a href=Signup.php>Signup 📍</a></li>';   
                }
                else{
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