<!DOCTYPE html>
<html>
<head>
	<title>Registration and Login Form</title>
</head>
<body>

	<!-- Registration Form -->
	<h2>Registration Form</h2>
	<form method="post" action="register.php">
		<label for="first_name">First Name:</label>
		<input type="text" id="first_name" name="first_name" required><br>

		<label for="last_name">Last Name:</label>
		<input type="text" id="last_name" name="last_name" required><br>

		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email" required><br>

		<label for="password">Password:</label>
		<input type="password" id="password" name="password" required><br>

		<label for="confirm_password">Confirm Password:</label>
		<input type="password" id="confirm_password" name="confirm_password" required><br>

		<input type="submit" value="Register">
	</form>

	<?php
		// Registration Form Validation
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$first_name = $_POST['first_name'];
			$last_name = $_POST['last_name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$confirm_password = $_POST['confirm_password'];

			if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
				echo "<p>All fields are required and must not be empty.</p>";
			} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo "<p>The email address must be in a valid format.</p>";
			} elseif ($password != $confirm_password) {
				echo "<p>The password and confirm password fields must match.</p>";
			} else {
				echo "<p>Registration successful.</p>";
			}
		}
	?>

	<!-- Login Form -->
	<h2>Login Form</h2>
	<form method="post" action="login.php">
		<label for="login_email">Email Address:</label>
		<input type="email" id="login_email" name="login_email" required><br>

		<label for="login_password">Password:</label>
		<input type="password" id="login_password" name="login_password" required><br>

		<input type="submit" value="Login">
	</form>

	<?php
		// Login Form Validation
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$login_email = $_POST['login_email'];
			$login_password = $_POST['login_password'];

			$valid_email = 'user@example.com';
			$valid_password = 'password';

			if ($login_email == $valid_email && $login_password == $valid_password) {
				
				header("Location: welcome.php?first_name=User");
				exit();
			} else {
				echo "<p>Invalid email or password.</p>";
			}
		}
	?>

</body>
</html>
