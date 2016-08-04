<?php include('assets/header.php'); ?>
     
	 <div class="block">
	 <center><h2>New Student Sign Up</h2></center>
	 <!-- Register Form -->
	<form role="form" enctype="multipart/form-data" method="post" action="register.php">
		<div class="form-group">
			<label>Name*</label> <input type="text" class="form-control" name="name" placeholder="Enter Your Name">
		</div>
		<div class="form-group">
			<label>Email Address*</label> <input type="email" class="form-control" name="email" placeholder="Enter Your CougarTrack Email Address">
		</div>
		<div class="form-group">
			<label>Password*</label> <input type="password" class="form-control" name="password" placeholder="Enter a Password">
		</div>
		<div class="form-group">
			<label>Confirm Password*</label> <input type="password" class="form-control" name="password2" placeholder="Reenter Your Password">
		</div>
		
		<button name="register" type="submit" class="btn btn-primary">Register</button>
	</form>
	</div>

	 
<?php include('assets/footer.php'); ?>
