<?php include_once('header.php') ?>
<?php include_once('../backend/searchManager.php') ?>
<?php include_once('../backend/listGenerator.php') ?>
<script>
function toggleTable(){
	if(document.getElementById("advanced").style.display == "none"){ //show
		document.getElementById("advanced").style.display = "block";
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
	<form name="searchForm" action="primarySchool.php" method="get">
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
					area
				</td>
				<td align="left" colspan=2>
					<?php if(isset($_GET['area'])) { ?>
					<input name="area" type="text" class="typeahead_area" value="<?php echo $_GET['area'];?>" />
					<?php } else {?>
					<input name="area" type="text" class="typeahead_area" value="" />
					<?php } ?>
					<div name=""></div>
				</td>
				<td align="right" colspan=1>
					CCA
				</td>
				<td align="left" colspan=2>
					<?php if(isset($_GET['cca'])) { ?>
					<input name="cca" type="text" class="typeahead_cca" value="<?php echo $_GET['cca']; ?>" />
					<?php } else {?>
					<input name="cca" type="text" class="typeahead_cca" value="" />
					<?php } ?>
				</td>
				<td align="right" colspan=1>
					Subjects
				</td>
				<td align="left" colspan=3>
					<?php if(isset($_GET['subjects'])) { ?>
					<input name="subjects" type="text" class="=typeahead_subject" value="<?php echo $_GET['subjects'];?>" />
					<?php } else {?>
					<input name="subjects" type="text" class="typeahead_subject" value="" />
					<?php } ?>
				</td>
				<tr>
				<td colspan=10 align="center">
				<input type="submit" id="simple_submit" value="Submit" class="btn btn-default" />
				<input type="button" id="ShowBtn" onclick="toggleTable();" value="Show Advanced Settings" class="btn btn-default" />
				</td>
				</tr>
			</tr>
		</table>
		<table class="table table-striped" border="0" width="100%" id="advanced" style="display: none;">
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
	$area=" ";
	$cca=" ";
	$subjects=" ";
	$MRT=" ";
	$Bus=" ";
	$ShuttleBus=" ";
	if(isset($_GET['area'])){
		$area = $_GET['area'];
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
	if(isset($_GET['area'])||isset($_GET['cca'])||isset($_GET['subjects'])|| isset($_GET['MRT'])||isset($_GET['Bus'])|| isset($_GET['ShuttleBus']))
	{
		if(empty($_GET['area'])&&empty($_GET['cca'])&&empty($_GET['subjects'])&& empty($_GET['MRT'])&&empty($_GET['Bus'])&& empty($_GET['ShuttleBus'])){

		//TODO: Display no search input 

		} else {
		$results = searchPrimarySchool($area, $cca, $subject, $MRT, $Bus, $ShuttleBus);
		?>
		<table id="sortabletable" class="table table-striped table-bordered secondaryTable sortable" width="100%" >
			<tr>
				<th width="10%">Name</th>
				<th width="10%">Type</th>
				<th width="15%">area</th>
				<th width="15%">location</th>
				<th width="10%">Telephone</th>
				<th width="10%">Email</th>
				
				<th width="10%">PLSE Score</th>
				<th width="20%">List</th>
			</tr>
			<?php foreach ($results as $result){ ?>
			<tr>
				<td>
					<a href="IndividualSchool.php?school_name=<?php echo $result['school_name']?>" ><?php echo $result['school_name'] ?></a>
				</td>
				<td><?php echo $result['school_type'] ?></td>
				<td><?php echo $result['school_area'] ?></td>
				<td><?php echo $result['school_location'] ?></td>
				<td><?php echo $result['school_telephone'] ?></td>
				<td><?php echo $result['school_email'] ?></td>
				
				<td><?php ?></td>
				<td style="text-align:center">
					<form method="POST" action="addToCompare.php" style="display:inline">
						<button name="compare" value="<?php echo $result['school_name'] ?>" class="btn btn-primary">Compare</button>
					</form>
					<form method="POST" action="addToFav.php" style="display:inline">
						<button name="favorite" value="<?php echo $result['school_name'] ?>" class="btn btn-success">Favorite</button>
					</form>
				</td>
			</tr>
			<?php } ?>
		</table>
	<?php }} ?>
</div>

<script>
$(document).ready(function()
{
	var area = [<?php if (strpos($area, "'") !== FALSE) echo $area; else echo "'".$area."'"; ?>];
	var cca = [<?php if (strpos($cca_options, "'") !== FALSE) echo $cca_options; else echo "'".$cca_options."'"; ?>];
	var subject = [<?php if (strpos($subject_name , "'") !== FALSE) echo $subject_name ; else echo "'".$subject_name ."'"; ?>];

	$('.typeahead_area').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'secondary',
		source: substringMatcher(area)
	});

	$('.typeahead_subject').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'subject',
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
<?php include_once('../footer.php') ?>