<!-- This page is when the user recived the email -->
<?php
include 'NavBar.php';
include 'dbc.php';
$conn = OpenCon();

if (isset($_POST['Loginbtn'])) {
    $name = $_POST['name'];  
    $password = $_POST['password'];
    $sql = "SELECT * FROM usercredentials WHERE username = '$name'";
    $result = mysqli_query($conn, $sql);
    $res = mysqli_fetch_array($result);

    if($res && $res['password'] == $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $name;
        echo "good, move on to the next input fields";
    } else {
        echo "no match try again";
        exit();
    }
}

if (isset($_POST['verbtn'])) {
    $newpass = $_POST['newpassword'];
    $verpass = $_POST['verpassword'];
    
    if (!isset($_SESSION['username'])) {
        echo "Please login first";
        exit();
    }
    
    if ($newpass != $verpass) {
        echo " no match. try again.";
    } 
        //  if both fields equal, update in DB.
    else {
        $name = $_SESSION['username'];
        $sql = "UPDATE usercredentials SET password = '$newpass' WHERE username = '$name'";
        $update_result = mysqli_query($conn, $sql);
        
        if ($update_result) {
            echo "New password is set!";
        } else {
            echo "Error updating password";
        }
    }
}
?>

<form method="POST"> 
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br>
    
    <button type="submit" name="Loginbtn">
        Login
    </button>
</form>

<form method="POST">
    <h3>Set New Password</h3>
    <h4>Fill both fields</h4>
    <label for="newpassword">New Password:</label>
    <input type="password" name="newpassword" id="newpassword" required><br>
    <label for="verpassword">Type it again:</label>
    <input type="password" name="verpassword" id="verpassword" required><br>
    <button type="submit" name="verbtn">Change it</button>
</form>