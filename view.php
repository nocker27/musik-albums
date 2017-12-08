<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM album WHERE artist_id=".$_SESSION['id']." ORDER BY id ASC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
	<a href="index.php">Forside</a> | <a href="add.html">Tilføj et nyt album</a> | <a href="logout.php">Logout</a>
	<br/><br/>
	<h3>Her er alle dine albums</h3>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Album</td>
			<td>Album tilbage</td>
			<td>Pris</td>
			<td>Update</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['product']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['price']."</td>";
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
		?>
	</table>	
</body>
</html>
