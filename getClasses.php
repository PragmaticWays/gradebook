<?php include('core/init.php'); ?>
<?php 
	// Helper function/file for AJAX call to retreive class list
	if(isset($_POST['term'])) {
		
		$classes = getClassesByTerm($_POST['term']);
		echo json_encode($classes);
		
	} else {
		redirect('./');
	}
?>