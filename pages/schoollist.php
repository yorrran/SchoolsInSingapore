<?php include_once('../backend/searchManager.php') ?>
<?php include_once('header.php') ?>
<?php
	 $school_name=" ";
	if(isset($_GET['school_name'])){
		$school_name = $_GET['school_name'];
     }


	if(isset($_GET['school_name']))
	{
		$results = searchSchool($school_name);
?>

	<table class="table table-striped table-bordered secondaryTable" >
		<tr>
			<th width="10%">Name</th>
			<th width="10%">Type</th>
			<th width="15%">Location</th>
			<th width="10%">Telephone</th>
			<th width="10%">Email</th>
			<th width="15%">Subject</th>
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
			<td><button name="compare" class="btn btn-primary">Compare</button>&nbsp;&nbsp;<button name="favorite" class="btn btn-success">Favorite</button></td>
		</tr>
		<?php } ?>
	</table>
<?php } ?>