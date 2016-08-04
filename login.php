<?php require('core/init.php'); ?>
<?php

// Create user object
$user = new User();

// Create validate object
$validate = new Validator();

if (!isLoggedIn()) {
	// Get template and assign vars
	$template = new Template('templates/sign_in.php');

	// Assign vars
	$template->title = 'Sign In';

	// Display template
	echo $template;
} else {
	redirect('./', 'You are already signed-in', 'error');
}
?>