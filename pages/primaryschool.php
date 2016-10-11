<?php include('../backend/searchManager.php') ?>
<?php include('header.php') ?>


<!-- Begin page content -->
<div class="container">
	<form form name="searchForm" action="primarySchool.php" method="get">
		<table class="table table-striped" width="100%">
			<tr align="center" >
				<td colspan=10><h1>Primary School Search Page</h1></td>
			</tr>
			<tr>
				<td align="right" >
					location
				</td>
				<td align="left" >
					<input name="location" type="text" class="typeahead_location" \>
					<div name=""></div>
				</td>
				<td align="right" >
					cca
				</td>
				<td align="left">
					<input type="text" name="cca" class="typeahead_cca" \>
				</td>
				<td align="right" >
					subjects
				</td>
				<td align="left">
					<input type="text" name="subjects" class="typeahead_subjects" \>
				</td>
			</tr>
			<tr align="center">
				<td colspan=10><input type="submit" value="Submit" class="btn btn-default" \></td>
			</tr>
			<tr align="center">
				<td colspan=10><input type="advance search" value="advance search" class="btn btn-default" \></td>
			</tr>
		</table>
	</form>
	<?php
	$location=" ";
	$cca=" ";
	$subjects=" ";
	if(isset($_GET['location'])){
		$location = $_GET['location'];
	}
	if(isset($_GET['cca'])){
		$cca = $_GET['cca'];
	}
	if( isset($_GET['subjects'])){
		$subject = $_GET['subjects'];
	}
	if(isset($_GET['location'])||isset($_GET['cca'])||isset($_GET['subjects']))
	{
		$results = searchPrimarySchool($location, $cca, $subjects);
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
	var cca = ['brownies', 'scoutsclubs', 'societieschess club', 'chinese cultural club', 'drama club', 'english literary club', 'green club', 'infocomm club', 'photography club', 'science and innovation club', 'visual arts club', 'aestheticschinese dance', 'choir', 'guitar ensemble', 'indian dance', 'malay', 'skipping', 'soccer', 'track field','wushu'];
	var subjects = ['art Chinese', 'civics \& moral education', 'co-curricular activities', 'english language foundation', 'mathematics', 'health education', 'higher chinese', 'higher malay', 'higher tamilmalay', 'music', 'physical education', 'science', 'social studies'];
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
	$('.typeahead_subjects').typeahead({
		hint: true,
		highlight: true,
		minLength: 1
	},{
		name: 'secondary',
		source: substringMatcher(subjects)
	});
});
</script>
<?php include('footer.php') ?>