<?php include('core/init.php'); ?>
<?php 
	// Helper function/file for AJAX call to retreive assignments list
	if(isset($_POST['classID'])) {
		
		$assignments = getAssignmentsByClass($_POST['classID']);
		echo json_encode($assignments);
		
	} else {
		redirect('./');
	}
?>