<?php include('core/init.php'); ?>
<?php 

	if(isset($_POST['scores'])) {
		
		//$classes = getClassesByTerm($_POST['term']);
		//echo json_encode($classes);
		echo "php";
	} else {
		redirect('./');
	}
?>