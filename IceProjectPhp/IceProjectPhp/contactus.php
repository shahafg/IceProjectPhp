<?php
include 'dbc.php';
include 'NavBar.php';
$con = OpenCon();

// Example of Chen of how to insert input into the DB.
if (isset($_POST['contactSB'])) {
    $sql_q= "INSERT into contactusmessages
    values ('".$_POST['name']."','".$_POST['telephone'].
    "','".$_POST['Email']."','".$_POST['Contactinfo']."','','open')";
    // It is possible to insert empty string as chen did for auto_inc.
    $result = mysqli_query($con,$sql_q);
    echo '<script>alert("we recived your messege!")</script>'; //popup
}
    // needs to add logic about open/in progress/close
    // as defult it is open.
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="contactus.css">
</head>
<body>
    <div class="form-container" id="conform">
        <h2>We would love to hear from you</h2>
        <form action="#" method="post">
            <label for="name">Name: <span>*</span></label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="telephone">Telephone: <span>*</span></label><br>
            <input type="tel" id="telephone" name="telephone" minlength="10" maxlength="10" required pattern="[0-9]{10}"/> <br>
            <br>
            <label for="Email">Email: <span>*</span></label><br>
            <!-- The pattern is the rule to use the @-->
            <input type="email" id="Email" name="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" /><br><br>
            <label for="Contactinfo">Contactinfo: <span>*</span></label><br>
            <textarea id="Contactinfo" name="Contactinfo" rows="6" cols="80" required></textarea>
            <br />  <br /><input type="submit" name= 'contactSB' value="Submit" id="contactSB">
        </form>
        <br /> <br /> <br />
        <button onclick="document.location='HomePage1.php'">Back to HomePage</button background-color:#e6f0ff>
    </div>
  
</body>
</html>
<?php include 'Footer.php'; ?>