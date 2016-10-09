<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Website.">
	<title>Schools in Singapore</title>

	<!-- CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>

	<!-- JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Fixed navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Project name</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse pull-right">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="pages/about.php">About Us</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">School <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">Category</li>
							<li><a href="pages/primary.php">Primary School</a></li>
							<li><a href="pages/secondary.php">Secondary School</a></li>
							<li><a href="pages/poly.php">Polytechnic</a></li>
							<li><a href="pages/uni.php">University</a></li>
						</ul>
					</li>
					<li><a href="/pages/forum.php">Forum</a></li>
					<?php
					session_start();
					if (isset($_COOKIE['signed_in_id']))
					{
						echo '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">' . $_COOKIE['signed_in_id'] . '<span class="caret"></span></a><ul class="dropdown-menu"><li><a href="pages/favlist.php">Favourite List</a></li><li><a href="backend/logoutManager.php">Logout</a></li></ul></li>';
					}
					else
					{
						echo '<li><a href="login.php">Login</a></li>';
					}
					?>
					<div class="col-sm-5 pull-right">
						<form class="navbar-form" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
								</div>
							</div>
						</form>
					</div>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Begin page content -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12 text-center">
				<h1>Main Page</h1>
			</div>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<p class="text-muted">Place sticky footer content here.</p>
		</div>
	</footer>
</body>
</html>