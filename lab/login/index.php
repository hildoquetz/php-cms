<?php 

require 'functions.php'; 

session_start();
$_SESSION['name'] = $_COOKIE['Name'];

// set cookie
$cname 		= 'Operations';
$cvalue		= "Yeah, we have a cookie!";
$expiration	= time() + (60 * 60 * 24 * 7); // 60sec * 60min * 24hors * 7days = 1 week 
setcookie($cname, $cvalue, $expiration);
setcookie('Name', 'Hildo Quetz', $expiration);

// get cookie
if(isset($_COOKIE['Operations'])){
	$getCvelaue = $_COOKIE['Operations'];
}

if(isset($_POST['submit'])){
	
	$user['id'] 		= $_POST['id'];
	$user['name'] 		= $_POST['name'];
	$user['username'] 	= $_POST['username'];
	$user['email']	 	= $_POST['email'];
	$user['password'] 	= $_POST['password'];
	$query['tablename'] = 'pu_users';

	switch ($_POST['operation']) {
		
		case 'DELETE':
			$link = db_connect();
			$query['conditions'] = "id = " . mysqli_real_escape_string($link, $user['id']);
			db_delete($query);
			mysqli_close($link);
			break;
		
		case 'INSERT':
			$link = db_connect();
			$query['values'] 	= 'default,';
			$query['values']	.= "'" . mysqli_real_escape_string($link, $user['name']) . "',";
			$query['values']	.= "'" . mysqli_real_escape_string($link, $user['email']) . "',";
			$query['values']	.= "'" . mysqli_real_escape_string($link, $user['username']) . "',";
			$query['values']	.= "'" . password_encrypt(mysqli_real_escape_string($link, $user['password'])) . "'";
			db_insert($query);
			mysqli_close($link);
			break;
		
		case 'UPDATE':
			$link = db_connect();
			$query['conditions'] = "id = " . mysqli_real_escape_string($link, $user['id']);
			$query['values']	.= "name = '" . mysqli_real_escape_string($link, $user['name']) . "',";
			$query['values']	.= "email = '" . mysqli_real_escape_string($link, $user['email']) . "',";
			$query['values']	.= "username = '" . mysqli_real_escape_string($link, $user['username']) . "',";
			$query['values']	.= "pass = '" . password_encrypt(mysqli_real_escape_string($link, $user['password'])) . "'";;
			db_update($query);
			mysqli_close($link);
			break;

		default:
			echo "Something is wrong, plese review the code";
			break;
	}	
}?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container-fluid">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<?php if($_SESSION['name']): ?>
				<div class="alert alert-success">
					<strong>Welcome</strong>, <?php echo $_SESSION['name']; ?>
				</div>
			<?php endif; ?>
			<?php if(isset($getCvelaue)): ?>
				<div class="alert alert-warning">
					<strong>Warning!</strong> we have cookies!
				</div>
			<?php endif; ?>
			<table class="table">
				<thead>
					<tr class="text-center">
						<th>ID</th>
						<th>NAME</th>
						<th>USER</th>
						<th>EMAIL</th>
						<th>PASSWORD</th>
					</tr>
				</thead>
				<tbody>
				<?php
					$link = db_connect();
					$query = "SELECT * FROM pu_users"; 
					$result = mysqli_query($link, $query);
					if(!$result){
						die("There is an error: " . mysqli_error($link));
					}
					while($row = mysqli_fetch_assoc($result)){
						$str = "<tr>";
						$str .=	"<td>" . $row['id'] . "</td>";
						$str .=	"<td>" . $row['name'] . "</td>";
						$str .=	"<td>" . $row['username'] . "</td>";
						$str .=	"<td>" . $row['email'] . "</td>";
						$str .=	"<td>" . $row['pass'] . "</td>";
						$str .= "</tr>";
						echo $str;
					} 
					mysqli_close($link);
				?>
				</tbody>
			</table>

			<form action="index.php" method="post" class="well">
				<div class="form-group">
					<label>Select the operation</label>
					<select name="operation">
						<option name="insert">INSERT</option>
						<option name="delete">DELETE</option>
						<option name="update">UPDATE</option>
					</select>
				</div>
				<div class="form-group">
					<label for="id">User ID</label>
					<input class="form-control" type="number" name="id">
				</div>
				<div class="form-group">
					<label for="name">Name</label>
					<input class="form-control" type="text" name="name">
				</div>
				<div class="form-group">
					<label for="username">User Name</label>
					<input class="form-control" type="text" name="username">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input class="form-control" type="email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input class="form-control" type="password" name="password">
				</div>
				
				<input class="btn btn-primary" type="submit" name="submit" value="Enviar">	
			</form>
		</div>
		<div class="col-md-2"></div>	
	</div>
</body> 
</html>