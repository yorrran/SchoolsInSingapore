<?php include_once('header.php') ?>
<?php include_once('../backend/searchManager.php') ?>
<?php include_once('../backend/listGenerator.php') ?>
<!-- Begin page content -->
<div class="container">
	<form form name="searchForm" action="polySchool.php" method="get">
		<table class="table table-striped" width="100%">
			<tr align="center" >
				<td colspan=10><h1>University Search Page</h1></td>
			</tr>
			<tr>

				<td align="right" >
					10 
				</td>
				<td align="left">
					<input type="text" name="cut_off_point" required \>
				</td>
			</tr>
			<tr>
				<td align="right" >
					area
				</td>
				<td align="left">
					<input type="text" name="area" class="typeahead_area" value="<?php echo $_GET['area']; ?>" \>
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
	if(isset($_GET['cut_off_point'])){
		$type = $_GET['cut_off_point'];
	}
	if( isset($_GET['area'])){
		$area = $_GET['area'];
	}
	if( isset($_GET['subjects'])){
		$subject = $_GET['subjects'];
	}
	if( isset($_GET['type'])|| isset($_GET['score'])|| isset($_GET['area'])||isset($_GET['subjects']))
	{
		$results = searchSecondarySchool($type,$score,$area,$subject);
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