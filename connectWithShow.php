<?php
include 'adNavBar.php';
include 'dbc.php';
$con = OpenCon();

// display all users from the db
$result = mysqli_query($con, "SELECT * FROM usercredentials");
echo "<table border='1'>
<tr>
  <th>username</th>
  <th>name</th>
  <th>lastname</th>
  <th>phone</th>
  <th>password</th>
  <th>email</th>
  <th>birthday</th>
</tr>";

echo "Registered Users";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['lastname'] . "</td>";
    echo "<td>" . $row['tel'] . "</td>";
    echo "<td>" . $row['password'] . "</td>";
    echo "<td>" . $row['email'] . "</td>";
    echo "<td>" . $row['Birthday'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// add new user
// echo "<a href='addUser.php'>Add New User</a><br><br>";
?>
