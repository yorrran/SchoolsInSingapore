<?php include_once('header.php') ?>
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
				<td align="right" colspan=1>
					area
				</td>
				<td align="left" colspan=2>
					<?php if(isset($_GET['area'])) { ?>
					<input name="area" type="text" class="typeahead_area_name" value="<?php echo $_GET['area'];?>" />
					<?php } else {?>
					<input name="area" type="text" class="typeahead_area_name" value="" />
					<?php } ?>
					<div name=""></div>
				</td>
				<td align="right" colspan=1>
					CCA
				</td>
				<td align="left" colspan=2>
					<?php if(isset($_GET['cca'])) { ?>
					<input name="cca" type="text" class="typeahead_cca_name" value="<?php echo $_GET['cca']; ?>" />
					<?php } else {?>
					<input name="cca" type="text" class="typeahead_cca_name" value="" />
					<?php } ?>
				</td>
				<td align="right" colspan=1>
					Subjects
				</td>
				<td align="left" colspan=3>
					<?php if(isset($_GET['subjects'])) { ?>
					<input name="subjects" type="text" class="=typeahead_subject_name" value="<?php echo $_GET['subjects'];?>" />
					<?php } else {?>
					<input name="subjects" type="text" class="typeahead_subject_name" value="" />
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
		
<!-- advanced search -->
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
	$area="";
	$cca="";
	$subjects="";
	$MRT="";
	$Bus="";
	$ShuttleBus="";
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

			echo "No Search Result";

		//TODO: Display no search input 

		} else {
		$results = searchPrimarySchool($area, $cca, $subject, $MRT, $Bus, $ShuttleBus);
		?>
<!-- end of advanced search -->
</div>
<div align="center">
		<table id="sortabletable" class="table table-striped table-bordered secondaryTable sortable" width="100%">
			<tr>
				<th>Name</th>
				<th>Location</th>
				<th>Area</th>
				<th>Telephone</th>
				<th>Email</th>
				<th>Website</th>
				<th>Nearest MRT</th>
				<th>Bus</th>
				<th>Options</th>
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
				
				<td style="text-align:center">
					<?php
						$fav_list = get_fav_list('user1');//return an array 
						if (!$fav_list) {
							die('Invalid query: ' . mysql_error());
						}
						
						if(!in_array($result['school_name'] ,$_SESSION['clist'])){
							
							echo '<form action="addToCompare.php" method="POST" style="display:inline">
								<button name="compare" class="btn btn-primary" value="'.$result['school_name'].'">add to Comparison</button>
							</form>';
						}else if(in_array($result['school_name'],$_SESSION['clist'])){
							echo '<form action="addToCompare.php" method="POST" style="display:inline">
								<button name="remove" class="compare" value="'.$result['school_name'].'">remove from Comparison</button>
							</form>';
						}
						
						if(in_array($result['school_name'],$fav_list)){ //display unfavourite button if in favourite list			
							echo '<form method="POST" action="addToFav.php" ><button name="unfavorite" value="'.$result['school_name'].'" class="btn btn-success">Unfavorite</button></form>';

						}else { //display add to favourite button if not in favourite list 
							echo '<form method="POST" action="addToFav.php" ><button name="favorite" value="'.$result['school_name'].'" class="btn btn-success">Favorite</button></form>';

						}
					?>
				</td>
			</tr>
			<?php } ?>
		</table>
	<?php }} ?>
</div>

<script>

$(document).ready(function()
{
	var cca_name = [<?php echo $cca_typeahead['cca_options']; ?>];
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