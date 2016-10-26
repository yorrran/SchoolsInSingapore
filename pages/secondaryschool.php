<?php include_once('header.php') ?>
<?php include_once('../backend/searchManager.php') ?>
<?php include_once('../backend/listGenerator.php') ?>
<!-- Begin page content -->
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
					<input type="text" name="area" class="typeahead_area" \>
				</td>
				<td align="right" >
					cca
				</td>
				<td align="left">
					<input type="text" name="cca" class="typeahead_cca"\>
				</td>
				<td align="right" colspan=1>
					Subjects
				</td>
				<td align="left" colspan=3	>
					<input type="text" name="subjects" class="typeahead_subjects" />
				</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr align="center">
				<td colspan=10><input type="submit" value="Submit" class="btn btn-default" \></td>
			</tr>
		</table>
	</form>
	<?php
	$type=" ";
	$category=" ";
	$area=" ";
	$cca=" ";
	$subjects=" ";
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
		$subject = $_GET['subjects'];
	}
	if( isset($_GET['type'])|| isset($_GET['category'])|| isset($_GET['score'])|| isset($_GET['area'])|| isset($_GET['cca'])||isset($_GET['subjects']))
	{
		$results = searchSecondarySchool($type,$category,$score,$area,$cca, $subject);
		?>

		<table class="table table-striped table-bordered secondaryTable" >
			<tr>
				<th width="10%">Name</th>
				<th width="10%">Type</th>
				<th width="15%">area</th>
				<th width="10%">Telephone</th>
				<th width="10%">Email</th>
				<th width="15%">Subject</th>
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
				<td><?php echo $result['school_telephone'] ?></td>
				<td><?php echo $result['school_email'] ?></td>
				<td><?php echo $result['school_subject'] ?></td>
				<td><?php echo $result['PSLE_score'] ?></td>
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
	<?php } ?>
</div>
<script>
$(document).ready(function()
{
	var area = ['woodlands','yishun', 'ang mo kio', 'tampinese'];
	var cca = [<?php if (strpos($cca_options, "'") !== FALSE) echo $cca_options; else echo "'".$cca_options."'"; ?>];
	var subject = [<?php if (strpos($subject, "'") !== FALSE) echo $subject; else echo "'".$subject."'"; ?>];


	$('.typeahead_area').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'secondary',
		source: substringMatcher(area)
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
<?php include_once('../footer.php') ?>