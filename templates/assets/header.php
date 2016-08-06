<!DOCTYPE html>
<html lang="en">
  <head>
  
  <!-- 
       |---------------------------------------------------------------|
	   |   ***  ****   ***  *   *    ***  *    *     ***  ****  ****   |
	   |  *   * *   * *   * ** **   *   * *    *    *   * *   * *   *  |
	   |  ***** *   * ***** * * *   ***** *    *    ***** ****  *   *  |
	   |  *   * *   * *   * *   *   *   * *    *    *   * *  *  *   *  |
	   |  *   * ****  *   * *   *   *   * **** **** *   * *   * ****   |
	   |---------------------------------------------------------------|
  -->
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

	<!-- Navbar navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php if(isLoggedIn()) : ?>
				<a class="navbar-brand" href="./"><?php echo $_SESSION['name']; ?>'s Grade Book</a>
			<?php else : ?>
				<a class="navbar-brand" href="./">My Grade Book</a>
			<?php endif; ?>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">
			<?php if(isLoggedIn()) : ?>
				<li><a href="./"><span class="glyphicon glyphicon-book"></span> My Gradebook</a></li>
				<li><a href="edit-class"><span class="glyphicon glyphicon-pencil"></span> Edit Classes</a></li>
				<li><a href="about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
				<!-- Logout Link that acts as form -->
				<form method="post" action="<?php echo BASE_URI; ?>logout.php" class="inline">
					<input type="hidden" name="do_logout" value="Logout">
					<button type="submit" name="do_logout" value="Logout" class="logout-button"><span class="glyphicon glyphicon-log-out"></span> Logout</button>
				</form>
			<?php else : ?>
				<li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Sign-In</a></li>
				<li><a href="register"><span class="glyphicon glyphicon-user"></span> Create Account</a></li>
				<li><a href="about"><span class="glyphicon glyphicon-info-sign"></span> About</a></li>
			<?php endif; ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<!-- Site-content -->
	<div class="container Site-content">
		<!-- Display user info messages here -->
		<?php displayMessage(); ?>