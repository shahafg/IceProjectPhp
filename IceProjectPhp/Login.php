<?php
include 'dbc.php';
include 'NavBar.php';
$conn = OpenCon();

if (isset($_POST['Loginbtn'])) {
    $name = $_POST['name'];  
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM usercredentials WHERE username = '".$name."'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_array($result);

    

    if($res && $res['attempts'] < 3) {
        if($res['password'] == $password) {
            $_SESSION['loggedin'] = 1;
            $_SESSION['username'] = $name;
            if ($res['isAdmin'] == 1) { // if admin go to the admin page
                header("Location: adminpanel.php");
            } else {
                header("Location: Products.php");
            }
            exit();
        }
       
        else {
            $error = "Try again, check the fields before clicking Login";
            $sql = "UPDATE usercredentials SET attempts=attempts+1 WHERE username = '$name'";
            mysqli_query($conn, $sql); 
        }
    } else {
        $error = "Account blocked or user not found";
        header("Location: newpass.php");
        
    }

} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="Signup.css">
</head>
<body>
   

    
    <?php if (isset($error)): ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST"> 
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>
      
     

        <button type="submit" name="Loginbtn">
            Login
        </button>
    </form>

    <br>
    <a href="Signup.php">Don't have an account? Sign up here</a> 
   
    <h3>Forgot Password?</h3>
    <a href="newpass.php">Password changes happen here</a>
    <?php include 'Footer.php'; ?>
</body>
</html>