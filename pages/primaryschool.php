<?php include_once('../backend/searchManager.php') ?>
<?php include_once('header.php') ?>
<?php include_once('../backend/listGenerator.php') ?>
<script>
function toggleTable(){
	if(document.getElementById("advanced").style.visibility == "hidden"){ //show
		document.getElementById("advanced").style.visibility = "visible";
		document.getElementById("advanced_submit").style.visibility = "visible";
		document.getElementById("simple_submit").style.visibility = "hidden";
		document.getElementById("ShowBtn").style.visibility = "hidden";
		document.getElementById("HideBtn").style.visibility = "visible";
	}else{ //hide
		document.getElementById("advanced").style.visibility = "hidden";
		document.getElementById("advanced_submit").style.visibility = "hidden";
		document.getElementById("simple_submit").style.visibility = "visible";
		document.getElementById("ShowBtn").style.visibility = "Visible";
		document.getElementById("HideBtn").style.visibility = "Hidden";

	}
}
</script>
<!-- Begin page content -->
<div class="container">
	<form form name="searchForm" action="primarySchool.php" method="get">
		<table class="table table-striped" width="100%" border="0">
			<tr align="center" >
				<td colspan=10><h1>Primary School Search Page</h1></td>
			</tr>
			<tr>
				<td align="right" colspan=1>School Name: </td>
				<td align="left" colspan=9><input type="textfield" /></td>
			</tr>
			<tr>
				<td align="right" colspan=1>
					Location
				</td>
				<td align="left" colspan=2>
					<input name="location" type="text" class="typeahead_location" />
					<div name=""></div>
				</td>
				<td align="right" colspan=1>
					CCA
				</td>
				<td align="left" colspan=2>
					<input type="text" name="cca" class="typeahead_cca" />
				</td>
				<td align="right" colspan=1>
					Subjects
				</td>
				<td align="left" colspan=3	>
					<input type="text" name="subjects" class="typeahead_subjects" />
				</td>
				<tr>
				<td colspan=10 align="center">
				<input type="submit" id="simple_submit" value="Submit" class="btn btn-default" />
				<input type="button" id="ShowBtn" onclick="toggleTable();" value="Show Advanced Settings" class="btn btn-default" />
				</td>
				</tr>
			</tr>
		</table>
		<table class="table table-striped" border="0" width="100%" id="advanced" style="visibility: hidden;">
			<tr align="left">
				<td colspan=10><h3>Advanced Search</h3></td>
			</tr>
			<tr>
				<td align="right" colspan=1>Achievements: </td>
				<td align="left" colspan=9><input type="textfield" class="btn btn-default" size="140" /></td>
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
	$location=" ";
	$cca=" ";
	$subjects=" ";
	$MRT=" ";
	$Bus=" ";
	$ShuttleBus=" ";
	if(isset($_GET['location'])){
		$location = $_GET['location'];
	}
	if(isset($_GET['cca'])){
		$cca = $_GET['cca'];
	}
	if( isset($_GET['subjects'])){
		$subject = $_GET['subjects'];
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
	if(isset($_GET['location'])||isset($_GET['cca'])||isset($_GET['subjects'])|| isset($_GET['MRT'])||isset($_GET['Bus'])|| isset($_GET['ShuttleBus']))
	{
		$results = searchPrimarySchool($location, $cca, $MRT, $Bus, $ShuttleBus);
		?>
		<table id="sortabletable" class="table table-striped table-bordered secondaryTable sortable" width="100%" >
			<tr>
				<th width="10%">Name</th>
				<th width="10%">Type</th>
				<th width="15%">Location</th>
				<th width="10%">Telephone</th>
				<th width="10%">Email</th>
				<th width="15%">Subject</th>
				<th width="10%">PLSE Score</th>
				<th width="20%">List</th>
			</tr>
			<?php foreach ($results as $result){ ?>
			<tr>
				<td><a href="IndividualSchool.php?school_name=<?php echo $result['school_name']?>" ><?php echo $result['school_name'] ?></a></td>
				<td><?php echo $result['school_type'] ?></td>
				<td><?php echo $result['school_location'] ?></td>
				<td><?php echo $result['school_telephone'] ?></td>
				<td><?php echo $result['school_email'] ?></td>
				<td><?php echo $result['school_subject'] ?></td>
				<td><?php ?></td>
				<td><button name="compare" class="btn btn-primary">Compare</button>&nbsp;&nbsp;<button name="favorite" class="btn btn-success">Favorite</button></td>
			</tr>
			<?php } ?>
		</table>
	<?php } ?>
</div>

<script>
$(document).ready(function(){
	var location = ['woodlands','yishun', 'ang mo kio', 'tampinese'];
	var cca = [<?php echo $cca_options ?>];
	var subject = [<?php if (strpos($subject, "'") !== FALSE) echo $subject; else echo "'".$subject."'"; ?>];

	$('.typeahead_location').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'secondary',
		source: substringMatcher(location)
	});

	$('.typeahead_subjects').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'secondary',
		source: substringMatcher(subject)
	});

	$('.typeahead_cca').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'cca',
		source: substringMatcher(cca)
	});

});
</script>
<?php include_once('footer.php') ?>