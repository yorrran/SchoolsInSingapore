<?php include_once('header.php');?>
<?php include_once('../backend/searchManager.php') ?>
<?php echo '<script src="../js/GoogleDirectionAPI.js"></script>'; ?>
<script type="text/javascript">
function submitform(){
	document.forms["form1"].submit();
}
</script>

<?php
$_SESSION["school_name"] = $_GET["school_name"];
$name = $_SESSION["school_name"];
$results = searchSchool($name);
$pic = str_replace(" ", "-",$name);
?>

<div class="container">
	<table style="100%" border="0">
		<tr>
			<td rowspan="8" width="20%">
				<img src="../img/School_Logo/<?php echo $pic?>.jpg" alt="image of the school" width="200" height="200"/>
			</td>
			<td rowspan="9">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td>
				Name: <?php foreach ($results as $result){echo $result['school_name'];}?>
				<form id="form1" action="route.php" method="POST">
					<input type="hidden" name="name" value="<?php echo $name ?>" ?>
					<a href="javascript: submitform()">How to get there ?</a>
				</form>
			</td>
		</tr>
		<tr><td>Code: <?php foreach ($results as $result){echo $result['school_code'];}?></td></tr>
		<tr><td>Type: <?php foreach ($results as $result){echo $result['school_type'];}?></td></tr>
		<tr><td>Location: <?php foreach ($results as $result){echo $result['school_location'];}?></td></tr>
		<tr><td>Telephone: <?php foreach ($results as $result){echo $result['school_telephone'];}?></td></tr>
		<tr><td>Email: <?php foreach ($results as $result){echo $result['school_email'];}?></td></tr>
		<tr><td>Website: <?php foreach ($results as $result){echo $result['school_website'];}?></td></tr>
		<tr><td>Nearest MRT: <?php foreach ($results as $result){echo $result['Nearest_MRT'];}?></td></tr>
		<tr>
			<td>
				<?php
				if(isset($_COOKIE['signed_in_id'])){
					$fav_list = get_fav_list($_COOKIE['signed_in_id']);//return an array
					if (!$fav_list) {
						die('Invalid query: ' . mysql_error());
					}
				}
				foreach ($results as $result){
				echo '<br />';
				if(!in_array($result['school_name'] ,$_SESSION['clist'])){

					echo '<form action="addToCompare.php" method="POST" style="display:inline">
						<button name="compare" class="btn btn-primary" value="'.$result['school_name'].'" style="width: 100%">Add to Comparison</button>
					</form>';

				}else if(in_array($result['school_name'],$_SESSION['clist'])){
					echo '<form action="addToCompare.php" method="POST" style="display:inline">
						<button name="remove" value="'.$result['school_name'].'" class="btn btn-primary" style="width: 100%">Remove from Comparison</button>
					</form>';

				}

				if(in_array($result['school_name'],$fav_list)){ //display unfavourite button if in favourite list
					echo '<form method="POST" action="addToFav.php" ><button name="unfavorite" value="'.$result['school_name'].'" class="btn btn-success" style="width: 100%">Unfavorite</button></form>';

				}else { //display add to favourite button if not in favourite list
					echo '<form method="POST" action="addToFav.php" ><button name="favorite" value="'.$result['school_name'].'" class="btn btn-success" style="width: 100%">Favorite</button></form>';

				}
				}
				?>
				</td>
				<td>Nearest Bus: <?php foreach ($results as $result){echo $result['Bus_number'];}?></td></tr>
		<tr><td colspan="3">CCA:
			<ul>
				<? php echo $result['CCA']; ?>
				<?php
				if (empty($result['CCA']))
				{
					echo "<li>No data available</li>";
				}
				else
				{
					foreach ($results as $result)
					{
						$str = explode(",",$result['CCA']);

						foreach ($str as $item)
							echo "<li>".$item."</li>";
					}
				}
				?>
			</ul>
		</td></tr>
		<tr><td colspan="3">Subjects offered:
			<ul>
			<? php echo $result['school_subject']; ?>
			<?php
			if (empty($result['school_subject']))
			{
				echo "<li>No data available</li>";
			}
			else
			{
				foreach ($results as $result)
				{
					$str = explode(",",$result['school_subject']);

					foreach ($str as $item)
					echo "<li>".$item."</li>";
				}
			}
			?>
			</ul>
		</td></tr>
		<tr><td></td></tr>
	</table>
</div>
<?php include_once('../footer.php') ?>