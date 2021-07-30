<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<div id="main">
	<div id="header">
		<h1></h1>
<?php include "nav_bar.php"; ?>
	<font size="50" color="Black"><p align ="center">Road traffic accidents</p></font>
	</div>
	<div id="body">
	
<?php
	session_start();
		if(isset($_SESSION['loggedin']) ){
		
		echo "</br>";
		echo $_SESSION['msg'];
		$_SESSION['msg']="";
		?>		
		<ul>
			<li>New record				
				<form action= "newItem.php" method="post">	
				<label> Police Force</label>
				<input type="text" name="record" class="form_Login">
				<label>Count</label>
				<input type="number" step="0.01" name="count" class="form_Login">
				<label>Year</year>
				<input type="number" step="0.01" name="year" class="form_Login">
				<button type="submit" class="btn_submit">Create Record</button>	
				</form>
			</li>
			<br/>
			<li>Delete record				
				<form action= "deleteItem.php" method="post">	
				<label> Police Force</label>
				<input type="text" name="record" class="form_Login">
				<label>Year</year>
				<input type="number" step="0.01" name="year" class="form_Login">
				<button type="submit" class="btn_submit">Create Record</button>	
				</form>			
				</li>
			<br/>
			
			
			
			
		</ul>
		
		<?php
		
	}else{
			echo 'Login as Admin';		
		}
	?>	
		
	
	</div>
	
  	
</div>  
  
</body>
</html>
