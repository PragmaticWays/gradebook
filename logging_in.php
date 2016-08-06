<?php include('core/init.php'); ?>
<?php 
	// Helper function/file to sign a user into the system
	if(isset($_POST['do_login'])) {
	
		// Get vars
		$email = $_POST['email'];
		$password = $_POST['password'];
		
		// Create user object
		$user = new User;
		
		
		if($user->login($email, $password)) {
			redirect('./', 'You have been logged in', 'success');
		} else {
			redirect('login', 'That login is not valid', 'error');
		}
	} else {
		redirect('./');
	}
?>