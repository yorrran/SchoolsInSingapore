<?php include 'header.php'; ?>
<?php echo '<script src="js/checkLoginForm.js"></script>'; ?>

<!-- Begin page content -->
<div class="container">
	<div class="row">
		<?php
		if(isset($_GET['error']))
		{
			echo "<h3>Wrong username or password!</h3>";
		}
		?>
		<div class="col-xs-12 text-center">
			<h1>Login</h1>
		</div>
	</div>
	<div class="row">
		<form name="loginForm" action="backend/loginManager.php" method="post">
			<div class="col-xs-4"></div>
			<div class="col-xs-4">
				<div class="row login-row-margin">
					<div class="col-xs-12 text-left">
						<input type="text" id="username" name="username" class="form-control" placeholder="User Name" />
					</div>
				</div>
				<div class="row login-row-margin">
					<div class="col-xs-12 text-left">
						<input type="password" id="password" name="password" class="form-control" placeholder="Password" />
					</div>
				</div>
				<div class="row login-row-margin">
					<div class="col-xs-6 text-center">
						<button id="registerBtn" class="btn btn-primary" type="submit">Login</button>
					</div>
				</div>
			</div>
			<div class="col-xs-4"></div>
		</form>
		<div class="col-xs-12 text-center">
			<a href="register.php">Register Now!</a>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>