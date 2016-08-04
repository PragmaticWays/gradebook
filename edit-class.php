<?php require('core/init.php'); ?>
<?php

// Get template and assign vars
$template = new Template('templates/edit_class.php');

// Assign vars
$template->title = 'Edit Class Name';

// Display template
echo $template;
?>