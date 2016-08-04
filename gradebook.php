<?php require('core/init.php'); ?>
<?php

// Get template and assign vars
$template = new Template('templates/gradebook.php');

// Assign vars
$template->title = 'Usernames GradeBook';

// Display template
echo $template;
?>