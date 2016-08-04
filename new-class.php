<?php require('core/init.php'); ?>
<?php
	
	if(isset($_POST)==true && empty($_POST)==false){ 
	$chkbox = $_POST['chk'];		// array
	$weeks=$_POST['week'];        	// array
	$names=$_POST['name'];	   		// array		
	$duedates=$_POST['due-date'];  // array
	$points=$_POST['points'];	   	// array
}				


// Get template and assign vars
$template = new Template('templates/new-class.php');

// Assign vars
$template->title = 'Create a new class';

// Display template
echo $template;
?>