<?php include_once('header.php') ?>
<?php include_once('../backend/searchManager.php') ?>
<?php include_once('../backend/listGenerator.php') ?>
<!-- Begin page content -->
<div class="container">
	<form form name="searchForm" action="JCSchool.php" method="get">
		<table class="table table-striped" width="100%">
			<tr align="center" >
				<td colspan=10><h1>Junior College Search Page</h1></td>
			</tr>
			<tr>
				<td align="right" >
					type
				</td>
				<td align="left" >
					<select id="type" name="type">
						<option value="art">art</option>
						<option value="science">science</option>
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
				
				<td align="right" colspan=1>
					Subjects
				</td>
				<td align="left" colspan=3	>
					<input type="text" name="subjects" class="typeahead_subjects" />
				</td>
			</tr>
			<tr align="center">
				<td colspan=10><input type="submit" value="Submit" class="btn btn-default" \></td>
			</tr>
		</table>
	</form>
	<?php
	$type=" ";
	$score=" ";
	$location=" ";
	$subjects=" ";
	if(isset($_GET['type'])){
		$type = $_GET['type'];
	}
	if( isset($_GET['score'])){
		$score = $_GET['score'];
	}
	if( isset($_GET['location'])){
		$location = $_GET['location'];
	}
	if( isset($_GET['subjects'])){
		$subject = $_GET['subjects'];
	}
	if( isset($_GET['type'])|| isset($_GET['score'])|| isset($_GET['location'])||isset($_GET['subjects']))
	{
		$results = searchSecondarySchool($type,$score,$location,$subject);
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
				<td>
					<a href="IndividualSchool.php?school_name=<?php echo $result['school_name']?>" ><?php echo $result['school_name'] ?></a>
				</td>
				<td><?php echo $result['school_type'] ?></td>
				<td><?php echo $result['school_location'] ?></td>
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