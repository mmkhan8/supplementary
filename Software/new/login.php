<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: admin.php");
  exit;
}

require_once "config.php";

$username = $password = "";
$user_error = $pass_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $user_error = "Enter username";
    } else{
        $username = trim($_POST["username"]);
    }

    if(empty(trim($_POST["password"]))){
        $pass_error = "Enter password";
    } else{
        $password = trim($_POST["password"]);
    }

    if(empty($user_error) && empty($pass_error)){
        $sql = "SELECT id, username, password, userlevel FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            $param_username = $username;

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    mysqli_stmt_bind_result($stmt, $id, $username, $password, $userlevel);
                    if(mysqli_stmt_fetch($stmt)){
                        
                            session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["userlevel"] = $userlevel;
                          
                            header("location: admin.php");
                        } else{
                            $pass_error = "Password is not valid.";
                        }
                    
                } else{
                    $user_error = "Account not found";
                }
            } else{
                echo "Try again later";
            }
        }

        mysqli_stmt_close($stmt);
    }


}

?>

<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="stylesheet.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<h1>Login Page</h1>
	<?php include "nav_bar.php"; ?>
 <div class="inner" style="background-color:#ff0000" align="center">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
				<div class="form-group <?php echo (!empty($user_error)) ? 'has-error' : ''; ?>"> 
					<label>Username</label>
					<input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
					<span><?php echo $user_error; ?></span>
				</div>
					<div class="form-group <?php echo (!empty($pass_error)) ? 'has-error' : ''; ?>">
						<label>Password</label> 
						<input type="password" name="password" class="form-control">
						<span><?php echo $pass_error; ?></span>
					</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="Login">
						</div>
			</form>
	</div>
</body>
</html>
