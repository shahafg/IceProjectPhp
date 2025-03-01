<?php
include 'adNavBar.php';
include 'dbc.php';
$con = OpenCon();
// Show users which are registerd from DB. 
$result = mysqli_query($con,"SELECT * FROM contactusmessages");
echo "<table border='1'>
<tr>
<th>name</th>
<th>phone</th>
<th>email</th>
<th>Contactinfo</th>
<th>msgnum</th>

</tr>";
 while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['Name'] . "</td>";
echo "<td>" . $row['Tel'] . "</td>";
echo "<td>" . $row['Email'] . "</td>";
echo "<td>" . $row['Contactinfo'] . "</td>";
echo "<td>" . $row['msgnum'] . "</td>";
echo "</tr>";
}
echo "</table>";
?>