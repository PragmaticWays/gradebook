<?php require('core/init.php'); ?>
<?php

// Get template and assign vars
$template = new Template('templates/about.php');

// Assign vars
$template->title = 'About';

// Display template
echo $template;
?>