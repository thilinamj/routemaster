<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table align="center" >
		<tr>
			<td colspan="2"><h1 align="center">ROUTE MASTER</h1></td>
		</tr>
		<tr>
			<td align="right"><small>Badulla - Colombo</small></td>
		</tr>
	</table>
 From :<?php echo $_POST["Start"]; ?>
 To : <?php echo $_POST["end"]; ?>


<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "bustickt";

$conn = mysqli_connect($db_host, $db_username, $db_password);
mysqli_select_db($conn, $db_name);
      

if(isset($_POST['Start']) && isset($_POST['end'])){
  $Start = $_POST['Start'];
  $end = $_POST['end'];
    if (!empty($Start) && !empty($end)) {

	$sql = "SELECT startingtime,finishingtime FROM buses WHERE startingplace='$Start' AND finishingplace='$end'";

	$query = mysqli_query($conn, $sql);
		echo "<table border='1' width='100%'>
		  <tr>
		    <th>Start</th>
		    <th>End</th>
		  </tr>";
		  while($row = mysqli_fetch_assoc($query)){
		    echo "<tr>";
		    echo "<td>" . $row['startingtime'] . "</td>";
		    echo "<td>" . $row['finishingtime'] . "</td>";
		    echo "</tr>";
		  }
		  echo "</table>";

	}
}
 ?>
 <br>
 <input type=button onClick="parent.location='firstpagenew.html'" value='Back'>
</body>
</html>


