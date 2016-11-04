<?php
include_once('header.php');

 $school_name=" ";

if(isset($_GET['school_name']))
{
	$school_name = $_GET['school_name'];
	$results = searchSchool($school_name);
?>
<table class="table table-striped table-bordered secondaryTable" >
	<tr>
		<th>Name</th>
		<th>Type</th>
		<th>Location</th>
		<th>Telephone</th>
		<th>Email</th>
		<th>Nearest MRT</th>
		<th>Bus</th>
		<th>List</th>
    </tr>
	<?php foreach ($results as $result){ ?>
		<tr>
			<td><?php echo $result['school_name'] ?></td>
			<td><?php echo $result['school_type'] ?></td>
			<td><?php echo $result['school_location'] ?></td>
			<td><?php echo $result['school_telephone'] ?></td>
			<td><?php echo $result['school_email'] ?></td>
			<td><?php echo $result['Nearest_MRT'] ?></td>
			<td><?php echo $result['Bus_number'] ?></td>
			<td><button name="compare" class="btn btn-primary">Compare</button>&nbsp;&nbsp;<button name="favorite" class="btn btn-success">Favorite</button></td>
		</tr>
	<?php } ?>
</table>
<?php } ?>