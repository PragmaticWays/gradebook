<?php require('core/init.php'); ?>
<?php

// Get template and assign vars
$template = new Template('templates/register.php');

// Assign vars
$template->title = 'Create an Account';

// Display template
echo $template;
?>