
<?php
//Good exampe of how to use Post method.
include 'dbc.php';
include 'NavBar.php';
$con = OpenCon();

    if (isset($_POST['Signupbtn'])) {
       $sql_q = "INSERT into usercredentials
    values('".$_POST['username']."','".$_POST['firstname'].
    "','".$_POST['lastname']."','".$_POST['phone']."','".$_POST['password'].
    "', '".$_POST['email'].
    "', '', '','".$_POST['conpassword'].
    "', '".$_POST['Birthday'].
    "')";
    $result = mysqli_query($con,$sql_q);
    //if everthing is good with the data thats means result is true... 
    if ($result) { 
        // Session variable 4 holding successful signup status
        $_SESSION['signup_success'] = true; 
        header("Location: signup_success.php");
        // header("Location: Login.php");  
        exit(); 
    } else {
        echo '<script>alert("Error during signup. Please try again.");</script>'; 
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="Signup.css">
</head>
<body>
    <div class="main-container">
        <div class="form-container">
            <h2>Signup</h2>
            <form method="POST">
                <input type="hidden" name="action" value="signup">
                
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required pattern="[A-Za-z0-9]{3,}" title="Username must be at least 3 characters long and contain only letters and numbers">
                </div>
                <span class="error" id="username-error"></span>

                <div class="form-group">
                    <label for="firstname">First Name:</label>
                    <input type="text" name="firstname" id="firstname" required pattern="[A-Za-z]{2,}" title="First name must contain only letters">
                </div>
                <span class="error" id="firstname-error"></span>

                <div class="form-group">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" required pattern="[A-Za-z]{2,}" title="Last name must contain only letters">
                </div>
                <span class="error" id="lastname-error"></span>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Password must be at least 6 characters long and include both letters and numbers">
                </div>
                <span class="error" id="password-error"></span>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" name="phone" id="phone" required pattern="[0-9]{10}" title="Phone number must be 10 digits">
                </div>
                <span class="error" id="phone-error"></span>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required> 
                    <!-- can add validaion of @ -->
                </div>
                <span class="error" id="email-error"></span>

                    
                <div class="form-group">
                    <label for="confirming the password ">Confirming Password</label>
                    <input type="password" name="conpassword" id="conpassword" required pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$" title="Password must be at least 6 characters long and include both letters and numbers">
                </div>
                <span class="error" id="conpassword-error"></span>

                <div class="form-group">
                    <label for="Birthday">Birthday:</label>
                    <input type="date" name="Birthday" id="Birthday"  required />
                </div>
                <span class="error" id="dob-error"></span>
                                    

    

                <button type="submit" name="Signupbtn">Signup</button>
            </form>
            <br>
            <a href="Login.php">Already have an account? Login here</a>
        </div>
    </div>
    <p>
<?php
?>
</p>

</body>
</html>
<?php include 'Footer.php'; ?>