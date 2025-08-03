<?php
include 'NavBar.php';
include 'dbc.php';
$conn = OpenCon();
?>


<form method="POST">
<h3>Forgot Password?</h3>
  <input type="text" name="namerest" placeholder="Enter your username" required>
  <button type="submit" name="genPass">Generate New Password</button>
 
</form>
<a href="Login.php">Back to Login page</a>


<?php
// taken from:
// https://www.geeksforgeeks.org/generating-random-string-using-php/
$n = 10;

function getRandomString($n) {
  return bin2hex(random_bytes($n / 2)); // random_bytes is a func to generate random string, bin2hex() is used to make it readable.
}
// n hold my new string password 

if (isset($_POST['genPass']) && !empty($_POST['namerest'])) {
  $name = $_POST['namerest']; // holds the input as value so i can send it later
  
  $email_result = mysqli_query($conn, "SELECT email FROM usercredentials WHERE username = '".$name."'");
  // select the emails which eql = to the name entered in the field above

  // Check if the query was successful
  if ($email_result) {
    // Fetch the first row of the result 
    $row = mysqli_fetch_assoc($email_result);
    if ($row) {
      $email = $row["email"];
      $newgeneratedpass = bin2hex(random_bytes($n / 2)); // imporntent line!!!! otherwise it send empty pass
      echo "<br> Email retrieved successfully: " . $email;

      $to = "$email";
      $subject = "New Password for AmnonProject";
             $restlink = 'http://localhost/IceProjectPhp/tempasset.php';
      // $restlink = 'http://localhost/IceProjectPhp/newpass.php';
      $message = "Your new password is: <b>$newgeneratedpass</b>  Click here to rest  $restlink";      $header = "From: $email \r\n";
      $header = "From:shahafgoren1@gmail.com \r\n";
      $header .= "Cc:shahafgoren1@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            echo "<br> Message sent successfully... \n";
            //updates the pass & rest att in the DB as well
    $sql = "UPDATE usercredentials SET password='$newgeneratedpass' , attempts=0 WHERE username = '$name'";
    $update_result = mysqli_query($conn, $sql);
    
         }else {
            echo "Message could not be sent...";
         }


    } else {
      echo "Username not found in the database";
    }
  } else {
    echo "Error: " . mysqli_error($conn);
  }
  
  // free the memory used by the result
  mysqli_free_result($email_result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="newpass.css">
</head>
<body>
<?php include 'Footer.php'; ?>


