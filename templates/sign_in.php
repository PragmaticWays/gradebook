<?php include('assets/header.php'); ?>
     
	 <div class="block">
	 <form role="form" method="post" action="logging_in.php">
			<div class="form-group">
				<label>Username</label>
				<input name="username" type="text" class="form-control" placeholder="Username"></input>
			</div>
			<div class="form-group">
				<label>Password</label>
				<input name="password" type="password" class="form-control" id="testPass" placeholder="Password"></input>
			</div>
			<button name="do_login" type="submit" class="btn btn-primary">Login</button> <a class="btn btn-default" href="register.php">Create Account</a>
		</form>
	</div>

	 
<?php include('assets/footer.php'); ?>
