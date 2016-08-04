<?php require('core/init.php'); ?>
<?php

if (!isLoggedIn()) {

	// Create user object
	$user = new User();

	// Create validate object
	$validate = new Validator();

	if (isset($_POST['register'])) {
		// Create data array
		$data = array();
		$data['name'] = $_POST['name'];
		$data['email'] = $_POST['email'];
		$pw1 = $_POST['password'];
		$pw2 = $_POST['password2'];
		
		// Required fields array
		$field_array = array('name', 'email', 'password', 'password2');
		
		if ($validate->isRequired($field_array)) {
			if ($validate->isValidEmail($data['email'])) {
				if ($validate->passwordsMatch($pw1, $pw2)) {
					// If passwords match - hash 
					$hashed =  password_hash($pw1, PASSWORD_DEFAULT);
					$data['password'] = $hashed;
					if ($validate->emailNotUsed($data['email'])) {
						if ($user->register($data)) {
							redirect('./', 'You are registered. You may log in.', 'success');
						} else {
							redirect($_SERVER['HTTP_REFERER'], 'Something went wrong with registration. Please try again.', 'error');
						}
					} else {
						redirect($_SERVER['HTTP_REFERER'], "I feel like we've done this kind of thing before. Your email address is already associated with an account.", 'error');
					}		
				} else {
					redirect($_SERVER['HTTP_REFERER'], "Did you use iPhone's Autocorrect or something? Your passwords do not match. Try again.", 'error');
				}
			}else {
				redirect($_SERVER['HTTP_REFERER'], 'Please use your CougarTrack Email.', 'error');
			}
		} else {
			redirect($_SERVER['HTTP_REFERER'], 'Please fill in all required fields.', 'error');
		}
	}

	// Get template and assign vars
	$template = new Template('templates/register.php');


	// Display template
	echo $template;
} else {
	redirect('./', 'You must log out to register a new account.', 'error');
}
?>
