<?php include('header.php');?>
<?php echo '<script src="../js/GoogleDirectionAPI.js"></script>'; ?>
<?php include('../backend/searchManager.php') ?>

<script type="text/javascript">
function submitform(){
    document.forms["form1"].submit();
}
</script>

<?php 
$_SESSION["school_name"] = $_GET["school_name"];
$name = $_SESSION["school_name"];
$results = searchSchool($name);
?>

<div class="container">
<table style="100%" border="1px">
	<tr>
		<td rowspan="9" width="20%">
			<img src="../img/school_icon/<?php echo $name?>.png" alt="image of the school"/>
		</td>
		<td>
		    Name: <?php foreach ($results as $result){echo $result['school_name'];}?> <form id="form1" action="route.php" method="POST"><input type="hidden" name="name" value="<?php echo $name ?>" ?><a href="javascript: submitform()">View School</a></form>
		</td>
	</tr>
	<tr><td>Code: <?php foreach ($results as $result){echo $result['school_code'];}?></td></tr>
	<tr><td>Type: <?php foreach ($results as $result){echo $result['school_type'];}?></td></tr>
	<tr><td>Location: <?php foreach ($results as $result){echo $result['school_location'];}?></td></tr>
	<tr><td>Telephone: <?php foreach ($results as $result){echo $result['school_telephone'];}?></td></tr>
	<tr><td>Email: <?php foreach ($results as $result){echo $result['school_email'];}?></td></tr>
	<tr><td>Website: <?php foreach ($results as $result){echo $result['school_website'];}?></td></tr>
	<tr><td>Nearest MRT: <?php foreach ($results as $result){echo $result['MRT'];}?></td></tr>
	<tr><td>Nearest Bus: <?php foreach ($results as $result){echo $result['Bus'];}?></td></tr>
	<tr><td colspan="2">CCA: 
		<ul>
		<? php echo $result['CCA']; ?>
		<?php foreach ($results as $result){$str = explode(",",$result['CCA']); foreach ($str as $item) echo "<li>".$item."</li>";} ?>
		</ul>
	</td></tr>
	<tr><td colspan="2">Subjects offered: 
			<ul>
		<? php echo $result['CCA']; ?>
		<?php foreach ($results as $result){$str = explode(",",$result['school_subject']); foreach ($str as $item) echo "<li>".$item."</li>";} ?>
		</ul>
	</td></tr>
	<tr><td></td></tr>
</table>
</div>
<?php include('footer.php') ?>
