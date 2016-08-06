<?php include('core/init.php'); ?>
<?php 
	// Helper function/file to log out user from system
	if(isset($_POST['do_logout'])) {
		
		// Create user object
		$user = new User;
		
		
		if($user->logout()) {
			redirect('./', 'You have successfully logged out', 'success');
		}
	} else {
		redirect('./');
	}
?>