<?php require('core/init.php'); ?>
<?php

if (isLoggedIn()) {
	// Get template and assign vars
	$template = new Template('templates/gradebook.php');

	// Assign vars
	$template->title = 'Usernames GradeBook';

	// Display template
	echo $template;
} else {
	redirect(BASE_URI, 'Please sign-in', 'error');
}
?>