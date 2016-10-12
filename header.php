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
	<script src="js/typeahead.js/bloodhound.min.js"></script>
	<script src="js/typeahead.js/typeahead.bundle.min.js"></script>
	<script src="js/typeahead.js/typeahead.jquery.min.js"></script>
	<script src="js/script.js"></script>
	<script>
	$(document).ready(function(){
		var schoolName = ['anglican high school','ang mo kio secondary school', 'admiralty secondary school', 'ahmad ibrahim secondary school', 'anderson secondary school', 'alexandra primary school'];

		$('.typeahead_schoolName').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		},{
			name: 'secondary',
			source: substringMatcher(schoolName)
		});

	});
	</script>
</head>
<body><!-- Fixed navbar -->
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
                        <li><a href="pages/primaryschool.php">Primary School</a></li>
                        <li><a href="pages/secondaryschool.php">Secondary School</a></li>
                        <li><a href="pages/poly.php">Polytechnic</a></li>
                        <li><a href="pages/uni.php">University</a></li>
                    </ul>
                </li>
		<li><a href="pages/comparisonlist.php">Comparison List</a></li>
                <li><a href="pages/forum.php">Forum</a></li>
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
                <form class="navbar-form navbar-right" action="pages/schoollist.php" method="get">
                    <div class="form-group">
                        <input type="text" name="school_name" class="form-control typeahead_schoolName" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Search</button>
                </form>
            </ul>
        </div>
    </div>
</nav>
