<?php
session_start();
//var_dump($_SESSION);
if (!isset($_SESSION['active_user_id'])){
	header('location: index.php');
}
else 
{
	$active_user_id = $_SESSION['active_user_id'];
	require_once('connect-coding-dojo.php');
	$query = "SELECT *
			  FROM users
			  WHERE users.id = {$active_user_id}";
	$results = fetch_all($query);
	foreach ($results as $row) 
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login / Registration - Logged In as <?php $row['first_name'] . ' ' . $row['last_name']; ?></title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Welcome <?= $row['first_name'] ?>,</h1>
	<p>You are looking great today.</p>
	<form action="validation.php" method="post">
		<div class="button">
			<button type="submit">Log Out</button>
		</div>
	</form>	
<?php
	}
}
?>
</body>
</html>