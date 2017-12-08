<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Kunstner og deres albums
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				
		Velkommen <?php echo $_SESSION['name'] ?>  <a href='logout.php'>Logout</a><br/>
		<br/>
		<a href='view.php'>Se dine album og sæt nogle nye til salg</a>
		<br/><br/>
	<?php	
	} else {
		echo "Log ind for at kunne sætte nogle album til salg.<br/><br/>";
		echo "<a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
	}
	?>
	<div id="footer">
	<?php
	//including the database connection file
	include_once("connection.php");

	//fetching data in products where login_id fetches the seller in login table in database
	$result = mysqli_query($mysqli, "SELECT * FROM album INNER JOIN artist ON album.artist_id = artist.id");
	?>
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>Album</td>
			<td>Album tilbage</td>
			<td>Pris</td>
			<td>Kunstner</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {		
			echo "<tr>";
			echo "<td>".$res['product']."</td>";
			echo "<td>".$res['qty']."</td>";
			echo "<td>".$res['price']."</td>";
			echo "<td>".$res['name']."</td>";

		}	
		?>
	</table>

	</div>
</body>
</html>
