<?php require('core/init.php'); ?>
<?php

if (isLoggedIn()) {
	if(isset($_POST['create_class'])){ 
		$weeks = $_POST['week'];        	
		$names = $_POST['name'];	   				
		$duedates = $_POST['due-date'];  
		$points = $_POST['points'];
		$class_name = $_POST['className'];
		$term_name = $_POST['termName'];		
		
		// Create User object
		$user = new User();
		
		if ($user->newClass($weeks, $names, $duedates, $points, $class_name, $term_name)) {
			redirect(BASE_URI, 'Your class has been created.', 'success');
		} else {
			redirect('./', "We're having technical difficulties on our end. Please try again.", 'error');
		}
	}	

	// Get template and assign vars
	$template = new Template('templates/new-class.php');

	// Assign vars
	$template->title = 'New Class Name';

	// Display template
	echo $template;
} else {
	redirect(BASE_URI, 'Please sign-in', 'error');
}
?>