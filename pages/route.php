<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website.">
    <title>Schools in Singapore</title>

    <!-- CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>

    <!-- JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/GoogleDirectionAPI.js"></script>
    <script src="../js/tab.js"></script>
</head>
<body onload="onload()">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="../index.php">Project name</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse pull-right">
				<ul class="nav navbar-nav">
					<li><a href="../index.php">Home</a></li>
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
<div class="container">
    <div class="row">
        <div class="col-xs-12 text-center">
            <input id="pac-input" class="controls" type="text" placeholder="Enter a location">

            <div id="type-selector" class="controls">
                <input type="radio" name="type" id="changetype-all" checked="checked">
                <label for="changetype-all">All</label>

                <input type="radio" name="type" id="changetype-establishment">
                <label for="changetype-establishment">Establishments</label>

                <input type="radio" name="type" id="changetype-address">
                <label for="changetype-address">Addresses</label>

                <input type="radio" name="type" id="changetype-geocode">
                <label for="changetype-geocode">Geocodes</label>
            </div>

            <div id="map"></div>
            <br>
            <ul class="nav nav-tabs" id="product-table">
                <li class="active"><a href="#1" data-toggle="tab" aria-expanded="true" onclick="transitMode('DRIVING')" id="DRIVING_TAB">Driving</a>
                </li>
                <li><a href="#2" data-toggle="tab" onclick="transitMode('TRANSIT')" id="TRANSIT_TAB">Transit</a>
                </li>
                <li><a href="#3" data-toggle="tab" onclick="transitMode('WALKING')" id="WALKING_TAB">Walking</a>
                </li>
            </ul>
            <div align="left">
                <div id="DRIVING">
                    <p id="DRIVING_INSTR"></p>
                </div>

                <div id="TRANSIT" class="w3-container mode">
                    <p id="TRANSIT_INSTR"></p>
                </div>

                <div id="WALKING" class="w3-container mode">
                    <p id="WALKING_INSTR"></p>
                </div>
            </div>
            <div class="btn-group pull-right">
                <div class="col-xs-6">
                    <button class="btn btn-primary" type="submit">Add to favourite list</button>
                </div>
                <div class="col-xs-6">
                    <button class="btn btn-primary" type="submit">Add to comparison list</button>
                </div>
            </div>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAX0TqO4Me09jXw9XGltmQzntSXZKVJ3UE&libraries=places&callback=initMap"
            async defer></script>
        </div>
    </div>
</div>

</body>
</html>