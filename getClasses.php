<?php include('core/init.php'); ?>
<?php 

	if(isset($_POST['term'])) {
		
		$classes = getClassesByTerm($_POST['term']);
		echo json_encode($classes);
		
	} else {
		redirect('./');
	}
?>