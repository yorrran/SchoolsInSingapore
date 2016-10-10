<?php include('../backend/searchManager.php') ?>
<?php include('header.php') ?>
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
					location
				</td>
				<td align="left">
					<input type="text" name="location" class="typeahead_location" \>
				</td>
				<td align="right" >
					cca
				</td>
				<td align="left">
					<input type="text" name="cca" class="typeahead_cca"\>
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
	$location=" ";
	$cca=" ";
	if(isset($_GET['type'])){
		$type = $_GET['type'];
	}

	if(isset($_GET['category'])){
		$category = $_GET['category'];
	}
	if( isset($_GET['score'])){
		$score = $_GET['score'];
	}
	if( isset($_GET['location'])){
		$location = $_GET['location'];
	}
	if( isset($_GET['cca'])){
		$cca = $_GET['cca'];
	}
	if( isset($_GET['type'])|| isset($_GET['category'])|| isset($_GET['score'])|| isset($_GET['location'])|| isset($_GET['cca']))
	{
		$results = searchSecondarySchool($type,$category,$score,$location,$cca);
		?>

		<table class="table table-striped table-bordered secondaryTable" >
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
				<td><?php echo $result['school_name'] ?></td>
				<td><?php echo $result['school_type'] ?></td>
				<td><?php echo $result['school_location'] ?></td>
				<td><?php echo $result['school_telephone'] ?></td>
				<td><?php echo $result['school_email'] ?></td>
				<td><?php echo $result['school_subject'] ?></td>
				<td><?php echo $result['PSLE_score'] ?></td>
				<td><button name="compare" class="btn btn-primary">Compare</button>&nbsp;&nbsp;<button name="favorite" class="btn btn-success">Favorite</button></td>
			</tr>
			<?php } ?>
		</table>
	<?php } ?>
</div>
<script>
$(document).ready(function(){
	var location = ['woodlands','yishun', 'ang mo kio', 'tampinese'];
	var cca = ['brownies', 'scoutsclubs', 'societieschess club', 'chinese cultural club', 'drama club', 'english literary club', 'green club', 'infocomm club', 'photography club', 'science and innovation club', 'visual arts club', 'aestheticschinese dance', 'choir', 'guitar ensemble', 'indian dance', 'malay', 'skipping', 'soccer', 'track field','wushu'];
	$('.typeahead_location').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'secondary',
		source: substringMatcher(location)
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
<?php include('footer.php') ?>