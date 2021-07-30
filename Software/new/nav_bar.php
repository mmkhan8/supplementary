	<nav>
					<div id="pages" >
					<a href="data.php">Home</a>
					<a href="register.php">Register</a>
					<a href="login.php">Login</a>
					<?php



					if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
					echo "<a href=\"logout.php\">Log Out</a>";

					} else{

					  echo "<a href=\"logout.php\">Log Out</a>";


					}




					?>

				</div>
				</nav>
