<?php require('core/init.php'); include_once("analyticstracking.php"); ?>
<?php

if (!isLoggedIn()) {
	// Get template and assign vars
	$template = new Template('templates/sign_in.php');

	// Assign vars
	$template->title = 'Sign In';

	// Display template
	echo $template;
} else {
	// Get template and assign vars
	$template = new Template('templates/gradebook.php');

	// Assign vars
	$template->title = 'Username Gradebook';

	// Display template
	echo $template;

}
?>