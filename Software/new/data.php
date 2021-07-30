<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
	<h1>Home page</h1>
	<?php include "nav_bar.php"; ?>
		<?php
			
			require_once "config.php";
		
			if (mysqli_connect_errno())
			{
				echo "Connect to database failed: " . mysqli_connect_error();
			}
			$result = mysqli_query($con,"SELECT * FROM roadtrafficincidents");
			while($row = mysqli_fetch_assoc($result))
			{
				echo "<div id='menu'>";
				echo "<div id=\"description\" style=\"width:500px\">";
				echo "<p>" . "</p>";
				echo "<h2>" . $row['Accident_Year'] . "-";
				echo "" . $row['Police_Force'] . "- ";
			    echo "" . $row['All_Accidents'] . "</></div>";
				echo " ";
				echo "</div>";
			}
			mysqli_close($con); 
		?>
</body>
</html>
