<?php include('core/init.php'); ?>
<?php 

	if(isset($_POST['classID'])) {
		
		$assignments = getAssignmentsByClass($_POST['classID']);
		echo json_encode($assignments);
		
	} else {
		redirect('./');
	}
?>