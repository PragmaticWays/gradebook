<?php require('core/init.php'); ?>
<?php

if (isLoggedIn()) {
	
	if(isset($_POST)){ 
		$assign_ids = $_POST['assign_ids'];	
		$scores = $_POST['scores'];	   	
		
		// Create User object
		$user = new User();
		
		if ($user->updateScores($assign_ids, $scores)) {
			redirect(BASE_URI);
			//$classes = getClassesByTerm($_POST['term']);
			//echo json_encode($scores);
		} else {
			redirect('./', "We're having technical difficulties on our end. Please try again.", 'error');
		}	
	} else {
		redirect('./', "We're having technical difficulties on our end. Please try again [Didn't post update grade].", 'error');
	}
	
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