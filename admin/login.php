<?php

// include files 
require_once('../classes/AdminLogin.php');
require_once('../helpers/Format.php');

$al = new AdminLogin();
$fm = new Format();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if (isset($_POST['admin_btn'])) {
		$adminUser = $_POST['adminUser'];
		$adminPass = $_POST['adminPass'];
		$loginCheck = $al->adminLogin($adminUser, $adminPass);
	}
}

?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>

<body>
	<div class="container">
		<section id="content">
			<form action="" method="post">
				<h1>Admin Login</h1>
				<div>
					<input type="text" placeholder="Username" required="" name="adminUser" />
				</div>
				<div>
					<input type="password" placeholder="Password" required="" name="adminPass" />
				</div>
				<div>
					<input type="submit" name="admin_btn" value="Log in" />
				</div>
			</form><!-- form -->
			<div class="button">
				<a href="#">Training with live project</a>
			</div><!-- button -->
		</section><!-- content -->
	</div><!-- container -->
</body>

</html>