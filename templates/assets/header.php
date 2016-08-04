<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="An online gradebook for students.">
    <meta name="author" content="Adam Allard">
    <link rel="icon" href="../../favicon.ico">

    <title>My Grade Book</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo BASE_URI; ?>templates/assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo BASE_URI; ?>templates/assets/css/custom.css" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="<?php echo BASE_URI; ?>templates/assets/js/bootstrap.js"></script>
  </head>

  <body class="Site">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Username's Grades</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">
            <li><a href="gradebook.php">My Gradebook</a></li>
			<li><a href="edit-class.php">Edit Class</a></li>
			<li><a href="login.php">Sign-In</a></li>
            <li><a href="register.php">Create Account</a></li>
            <li><a href="about.php">About</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	    <div class="container Site-content">