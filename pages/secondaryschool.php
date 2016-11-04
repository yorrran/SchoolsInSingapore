<?php include_once('header.php') ?>
<?php include_once('../backend/listGenerator.php') ?>
<!-- Begin page content -->
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
<div class="container">
	<form form name="searchForm" action="secondarySchool.php" method="get">
		<table class="table table-striped" width="100%">
			<tr align="center" >
				<td colspan=10><h1>Secondary Search Page</h1></td>
			</tr>
			<tr>
				<td align="right" >
					type
				</td>
				<td align="left" >
					<select id="type" name="type">
						<option value="range">range</option>
						<option value="min">minimum score</option>
					</select>
				</td>

				<td align="right" >
					category
				</td>
				<td align="left">
					<select id="category" name="category">
						<option value="E">Express</option>
						<option value="N">Normal</option>
						<option value="N/T">Technical</option>
					</select>
				</td>
				<td align="right" >
					score
				</td>
				<td align="left">
					<input type="text" name="score" required \>
				</td>
			</tr>
			<tr>
				<td align="right" >
					area
				</td>
				<td align="left">
					<input type="text" name="area" class="typeahead_area_name" \>
				</td>
				<td align="right" >
					cca
				</td>
				<td align="left">
					<input type="text" name="cca" class="typeahead_cca_name"\>
				</td>
				<td align="right" colspan=1>
					Subjects
				</td>
				<td align="left" colspan=3	>
					<input type="text" name="subjects" class="typeahead_subject_name" />
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr align="center">
			<td colspan=10 align="center">
			<input type="submit" id="simple_submit" value="Submit" class="btn btn-default" />
			<input type="button" id="ShowBtn" onclick="toggleTable();" value="Show Advanced Settings" class="btn btn-default" />
			</td>
			</tr>
		</table>
		<table class="table table-striped" border="0" width="100%" id="advanced" style="display: none;">
			<tr align="center">
				<td colspan=10><h3>Advanced Search</h3></td>
			</tr>
			<tr>
				<td align="right">Code: </td>
				<td align="left" colspan=2><input type="textfield" class="btn btn-default" size="10" /></td>
				<td align="right">MRT: </td>
				<td align="left" colspan=2><input type="textfield" class="btn btn-default" size="10" /></td>
				<td align="right">Bus: </td>
				<td align="left" colspan=2><input type="textfield" class="btn btn-default" size="10" /></td>
				<td align="center" co>Availability of Shuttle Bus <input type="checkbox" id="Shuttle_Bus"></td>
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
	$type=" ";
	$category=" ";
	$area=" ";
	$cca=" ";
	$subjects=" ";
	$Bus=" ";
	$MRT=" ";
	$ShuttleBus=" ";
	if(isset($_GET['type'])){
		$type = $_GET['type'];
	}

	if(isset($_GET['category'])){
		$category = $_GET['category'];
	}
	if( isset($_GET['score'])){
		$score = $_GET['score'];
	}
	if( isset($_GET['area'])){
		$area = $_GET['area'];
	}
	if( isset($_GET['cca'])){
		$cca = $_GET['cca'];
	}
	if( isset($_GET['subjects'])){
		$subjects = $_GET['subjects'];
	}
	if( isset($_GET['MRT'])){
		$subject = $_GET['MRT'];
	}
	if( isset($_GET['Bus'])){
		$subject = $_GET['Bus'];
	}
	if( isset($_GET['ShuttleBus'])){
		$subject = $_GET['ShuttleBus'];
	}
	if( isset($_GET['type'])|| isset($_GET['category'])|| isset($_GET['score'])|| isset($_GET['area'])|| isset($_GET['cca'])||isset($_GET['subjects'])||isset($_GET['MRT'])||isset($_GET['Bus'])|| isset($_GET['ShuttleBus']))
	{

		//TODO: Display no search input
		if(empty($_GET['type'])&&empty($_GET['category'])&&empty($_GET['score'])&& empty($_GET['area'])&&empty($_GET['cca'])&& empty($_GET['subjects'])&&empty($_GET['Bus'])&& empty($_GET['ShuttleBus'])){
			echo "No Search Result";

		} else {
		$results = searchSecondarySchool($type,$category,$score,$area,$cca,$subjects,$MRT, $Bus, $ShuttleBus);
	?>

		<table class="table table-striped table-bordered secondaryTable" width="100%">
			<tr>
				<th>Name</th>
				<th>Location</th>
				<th>Area</th>
				<th>Telephone</th>
				<th>Email</th>
				<th>Website</th>
				<th>Nearest MRT</th>
				<th>Bus</th>
				<th>PLSE Score</th>
				<th>List</th>
			</tr>
			<?php foreach ($results as $result){ ?>
			<tr>
				<td>
					<a href="IndividualSchool.php?school_name=<?php echo $result['school_name']?>" ><?php echo $result['school_name'] ?></a>
				</td>
				<td><?php echo $result['school_location'] ?></td>
				<td><?php echo $result['school_area'] ?></td>
				<td><?php echo $result['school_telephone'] ?></td>
				<td><?php echo $result['school_email'] ?></td>
				<td><?php echo $result['school_website'] ?></td>
				<td><?php echo $result['Nearest_MRT'] ?></td>
				<td><?php echo $result['Bus_number'] ?></td>
				<th><?php echo $result['PSLE_score'] ?></th>
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
	var cca_name = [<?php echo $cca_typeahead['cca_options'];?>];
	var subject_name = [<?php echo $subject_typeahead['subjects']; ?>];
	var area_name = [<?php echo $area_typeahead['area']; ?>];

	$('.typeahead_cca_name').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'cca_name',
		source: substringMatcher(cca_name)
	});

	$('.typeahead_subject_name').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'subject_name',
		source: substringMatcher(subject_name)
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