<?php include_once('header.php') ?>
<?php include_once('../backend/searchManager.php') ?>
<?php include_once('../backend/listGenerator.php') ?>

<script>
function toggleTable(){
	if(document.getElementById("advanced").style.display == "none"){ //show
		document.getElementById("advanced").style.display = "";
		document.getElementById("advanced_submit").style.display = "inline";
		document.getElementById("simple_submit").style.display = "none";
		document.getElementById("ShowBtn").style.display = "none";
		document.getElementById("HideBtn").style.display = "inline";
	}else{ //hide
		document.getElementById("advanced").style.display = "none";
		document.getElementById("advanced_submit").style.display = "none";
		document.getElementById("simple_submit").style.display = "inline";
		document.getElementById("ShowBtn").style.display = "inline";
		document.getElementById("HideBtn").style.display = "none";
	}
}
</script>

<!-- Begin page content -->
<div class="container">
	<form form name="searchForm" action="polySchool.php" method="get">
		<table class="table table-striped" width="100%">
			<tr align="center" >
				<td colspan=10><h1>Poly Search Page</h1></td>
			</tr>
			<tr>

				<td align="right" >
					Cut Off Point
				</td>
				<td align="left">
					<input type="text" name="cut_off_point" required \>
				</td>
				<td align="right" >
					area
				</td>
				<td align="left">
					<input type="text" name="area" class="typeahead_area" \>
				</td>
			</tr>
			<tr>
				<td align="right">
					Course Cluster
				</td>
				<td align="left">
					<input type="text" name="course_cluster" class="typeahead_course_cluster" />
				</td>

				<td align="right" >
					Course Title
				</td>
				<td align="left">
					<input type="text" name="courseTitle" class="typeahead_courseTitle" />
				</td>
			</tr>
			<tr align="center">
				<td colspan=10>
					<input type="submit" id="simple_submit" value="Submit" class="btn btn-default" \>
					<input type="button" id="ShowBtn" onclick="toggleTable();" value="Show Advanced Settings" class="btn btn-default" />
				</td>
			</tr>
		</table>
		<table class="table table-striped" border="0" width="100%" id="advanced" style="display: none;">
			<tr align="left">
				<td colspan=10><h3>Advanced Search</h3></td>
			</tr>
			<tr>
				<td align="right">Code: </td>
				<td align="left" colspan=2><input type="textfield" name="code" class="btn btn-default" size="10" /></td>
				<td align="right">MRT: </td>
				<td align="left" colspan=2><input type="textfield" name="mrt" class="btn btn-default" size="10" /></td>
				<td align="right">Bus: </td>
				<td align="left" colspan=2><input type="textfield" name="bus" class="btn btn-default" size="10" /></td>
			</tr>
			<tr>
			<td colspan=10 align="center">
			<input type="submit" value="Submit" id="advanced_submit" class="btn btn-default" />
			<input type="button" id="HideBtn" onclick="toggleTable();" value="Hide Advanced Settings" class="btn btn-default" />
			</td>
			</tr>
		</table>
	</form>
	<?php

	if( isset($_GET['area'])){
		$area = $_GET['area'];
	}
	if( isset($_GET['courseTitle'])){
		$courseTitle = $_GET['courseTitle'];
	}
	if( isset($_GET['course_cluster'])){
		$course_cluster = $_GET['course_cluster'];
	}
	if( isset($_GET['cut_off_point'])){
		$score = $_GET['cut_off_point'];
	}
	if( isset($_GET['code'])){
		$code = $_GET['code'];
	}
	if( isset($_GET['bus'])){
		$bus = $_GET['bus'];
	}
	if( isset($_GET['mrt'])){
		$mrt = $_GET['mrt'];
	}
	if( isset($_GET['area']) || isset($_GET['course_cluster']) || isset($_GET['courseTitle']) || isset($_GET['cut_off_point']) ||
		isset($_GET['code']) || isset($_GET['bus']) || isset($_GET['mrt']))
	{
		if(!empty($_GET['area']) || !empty($_GET['course_cluster']) || !empty($_GET['courseTitle']) || !empty($_GET['cut_off_point']) ||
			!empty($_GET['code']) || !empty($_GET['bus']) || !empty($_GET['mrt'])){

		$results = searchPoly($area, $course_cluster, $courseTitle, $score, $mrt, $bus, $code);
		?>

		<table class="table table-striped table-bordered secondaryTable" >
			<tr>
				<th>Name</th>
				<th>Course Cluster</th>
				<th>Course Title</th>
				<th>Area</th>
				<th>Location</th>
				<th>Telephone</th>
				<th>Email</th>
				<th>Website</th>
				<th>MRT</th>
				<th>Bus</th>
				<th>Options</th>
			</tr>
			<?php foreach ($results as $result){ ?>
			<tr>
				<td>
					<a href="IndividualSchool.php?school_name=<?php echo $result['school_name']?>" ><?php echo $result['school_name'] ?></a>
				</td>
				<td><?php echo $result['course_cluster'] ?></td>
				<td><?php echo $result['courseTitle'] ?></td>
				<td><?php echo $result['school_area'] ?></td>
				<td><?php echo $result['school_location'] ?></td>
				<td><?php echo $result['school_telephone'] ?></td>
				<td><?php echo $result['school_email'] ?></td>
				<td><?php echo $result['school_website'] ?></td>
				<td><?php echo $result['Nearest_MRT'] ?></td>
				<td><?php echo $result['Busnumber'] ?></td>
				<td>
					<form method="POST" action="addToCompare.php">
						<button name="compare" value="<?php echo $result['school_name'] ?>" class="btn btn-primary">Compare</button>
					</form>
					<form method="POST" action="addToFav.php">
						<button name="favorite" value="<?php echo $result['school_name'] ?>" class="btn btn-success">Favorite</button>
					</form>
				</td>
			</tr>
			<?php } ?>
		</table>
	<?php } }?>
</div>

<script>

$(document).ready(function()
{
	var area = [<?php echo $poly_typeahead['area'];?>];
	var course_cluster = [<?php echo $poly_typeahead['course_cluster'];?>];
	var courseTitle = [<?php echo $poly_typeahead['courseTitle'];?>];

	$('.typeahead_area').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'area',
		source: substringMatcher(area)
	});

	$('.typeahead_course_cluster').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'course_cluster',
		source: substringMatcher(course_cluster)
	});

	$('.typeahead_courseTitle').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'courseTitle',
		source: substringMatcher(courseTitle)
	});

});
</script>

<?php include_once('../footer.php') ?>