<?php require('core/init.php'); ?>
<?php

// Get template and assign vars
$template = new Template('templates/sign_in.php');

// Assign vars
$template->title = 'Sign In';

// Display template
echo $template;
?>