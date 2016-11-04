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
	<form form name="searchForm" action="university.php" method="get">
		<table class="table table-striped" width="100%">
			<tr align="center" >
				<td colspan=10><h1>University Search Page</h1></td>
			</tr>
			<tr>

				<td align="right" >
					University Name
				</td>
				<td align="left">
					<?php if(isset($_GET['university_name'])) { ?>
					<input type="text" name="university_name" class="typeahead_university_name" value="<?php echo $_GET['university_name'] ?>" \>
					<?php }else { ?>
					<input type="text" name="university_name" class="typeahead_university_name" value="" \>
					<?php } ?>
				</td>
			</tr>
			<tr>

				<td align="right">
					Subjects
				</td>
				<td align="left">
					<?php if(isset($_GET['course_name'])) { ?>
					<input type="text" name="course_name" class="typeahead_course_name" value="<?php echo $_GET['course_name'] ?>" />
					<?php }else { ?>
					<input type="text" name="course_name" class="typeahead_course_name" value="" />
					<?php } ?>

				</td>


				<td align="right" >
					area
				</td>
				<td align="left">
					<input type="text" name="area" class="typeahead_area_name" \>
				</td>
			</tr>

			<tr align="center">
				<td colspan=10>
					<input type="submit" id="simple_submit" value="Submit" class="btn btn-default" />
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
	$course_name = "";
	$location = "";
	$university_name = "";
	$code = "";
	$bus = "";
	$mrt = "";
	$school_name="";

	if(isset($_GET['course_name'])){
		$course_name = $_GET['course_name'];
	}
	if( isset($_GET['location'])){
		$location = $_GET['location'];
	}
	if( isset($_GET['university_name'])){
		$university_name = $_GET['university_name'];
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

	if( isset($_GET['course_name'])|| isset($_GET['location'])|| isset($_GET['university_name']) ||
		isset($_GET['code']) || isset($_GET['bus']) || isset($_GET['mrt']))
	{

		if(!empty($_GET['course_name']) || !empty($_GET['location']) || !empty($_GET['university_name']) ||
			!empty($_GET['code']) || !empty($_GET['bus']) || !empty($_GET['mrt'])){


		$results = searchUni($university_name,$location,$course_name,$mrt,$bus,$code);
		?>

		<table class="table table-striped table-bordered secondaryTable" >
			<tr>
				<th>University Name</th>
				<th>Course Name</th>
				<th>Poly 10th Percentile</th>
				<th>Poly 90th Percentile</th>
				<th>JC 10th Percentile</th>
				<th>JC 90th Percentile</th>
				<th>Location</th>
				<th>Telephone</th>
				<th>Email</th>
				<th>Website</th>
				<th>Nearest MRT</th>
				<th>Bus Number</th>
				<th></th>
			</tr>
			<?php foreach ($results as $result){ ?>
			<tr>
				<td>
					<a href="IndividualSchool.php?school_name=<?php echo $result['University_name']?>" ><?php echo $result['University_name'] ?></a>
				</td>
				<td><?php echo $result['course_name'] ?></td>
				<td><?php echo $result['poly_10_percent'] ?></td>
				<td><?php echo $result['poly_90_percent'] ?></td>
				<td><?php echo $result['JC_10_percent'] ?></td>
				<td><?php echo $result['JC_90_percent'] ?></td>
				<td><?php echo $result['location'] ?></td>
				<td><?php echo $result['Telephone'] ?></td>
				<td><?php echo $result['Email'] ?></td>
				<td><?php echo $result['website'] ?></td>
				<td><?php echo $result['Nearest_MRT'] ?></td>
				<td><?php echo $result['Bus_number'] ?></td>
				<td>
					<form method="POST" action="addToCompare.php">
						<button name="compare" value="<?php echo $result['University_name'] ?>" class="btn btn-primary">Compare</button>
					</form>
					<form method="POST" action="addToFav.php">
						<button name="favorite" value="<?php echo $result['University_name'] ?>" class="btn btn-success">Favorite</button>
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
	var university_name = [<?php echo $uni_typeahead['university_name']; ?>];
	var course_name = [<?php echo $uni_typeahead['course_name']; ?>];
	var area_name = [<?php echo $area_typeahead['area']; ?>];

	$('.typeahead_university_name').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'university_name',
		source: substringMatcher(university_name)
	});

	$('.typeahead_course_name').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'course_name',
		source: substringMatcher(course_name)
	});
	$('.typeahead_area_name').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'area_name',
		source: substringMatcher(area_name)
	});
});
</script>

<?php include_once('../footer.php') ?>