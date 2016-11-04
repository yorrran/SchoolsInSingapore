<?php include_once('header.php') ?>
<?php include_once('../backend/searchManager.php') ?>
<?php include_once('../backend/listGenerator.php') ?>

<script>
function toggleTable(){
	if(document.getElementById("advanced").style.display == "none"){ //show
		document.getElementById("advanced").style.display = "";
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
	<form form name="searchForm" action="iteSchool.php" method="get">
		<table class="table table-striped" width="100%">
			<tr align="center" >
				<td colspan=10><h1>ITE Search Page</h1></td>
			</tr>
			<tr>
				<td align="right" >
					certification
				</td>
				<td align="left" >
					<select id="certification" name="certification">
						<option value="Olevel/Nlevel">Olevel/Nlevel</option>
						<option value="Olevel">Olevel</option>
						<option value="Nlevel">Nlevel</option>
					</select>
				</td>

				<td align="right" >
					English Score
				</td>
				<td align="left">
					<?php
						if(isset($_GET['score'])){
							echo '<input type="text" name="English_Score" value="'.$_GET['English_Score'].'" required \>';
						} else {
							echo '<input type="text" name="English_Score" value="" required \>';
						}
					?>

				</td>
			</tr>
			<tr>
				<td align="right" >
					Math Score
				</td>
				<td align="left">
					<?php
						if(isset($_GET['Math_Score'])){
							echo '<input type="text" name="Math_Score" value="'.$_GET['Math_Score'].'"  \>';
						} else {
							echo '<input type="text" name="Math_Score" required\>';
						}
					?>

				</td>

				<td align="right" >
					With Grade 7 and Above
				</td>
				<td align="left" >
					<select id="subject" name="subject">
						<option value="twoSubject">Two Subject</option>
						<option value="oneSubject">One Subject</option>
					</select>
				</td>
			</tr>

			<tr align="center">
				<td colspan=10>
				<input type="submit" id="simple_submit" value="Submit" class="btn btn-default" \>
				<input type="button" id="ShowBtn" onclick="toggleTable();" value="Show Advanced Settings" class="btn btn-default" />
				</td>
			</tr>
		</table>
		<table class="table table-striped" border="0" width="100%" id="advanced" style="display: none;">
			<tr align="left">
				<td colspan=10><h3>Advanced Search</h3></td>
			</tr>
			<tr>
				<td align="right">Code: </td>
				<td align="left" colspan=2><input type="textfield" name="code" class="btn btn-default" size="10" /></td>
				<td align="right">MRT: </td>
				<td align="left" colspan=2><input type="textfield" name="mrt" class="btn btn-default" size="10" /></td>
				<td align="right">Bus: </td>
				<td align="left" colspan=2><input type="textfield" name="bus" class="btn btn-default" size="10" /></td>
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
	$English_Score=" ";
	$Math_Score=" ";
	$certification=" ";
	$subject=" ";
	$code=" ";
	if(isset($_GET['English_Score'])){
		$English_Score = $_GET['English_Score'];
	}
	if( isset($_GET['Math_Score'])){
		$Math_Score = $_GET['Math_Score'];
	}
	if(isset($_GET['certification'])){
		$certification = $_GET['certification'];
	}
	if( isset($_GET['subject'])){
		$subject = $_GET['subject'];
	}
	if( isset($_GET['bus'])){
		$bus = $_GET['bus'];
	}
	if( isset($_GET['mrt'])){
		$mrt = $_GET['mrt'];
	}
	if( isset($_GET['code'])){
		$code = $_GET['code'];
	}

	if( isset($_GET['English_Score']) || isset($_GET['Math_Score']) ||isset($_GET['certification']) ||isset($_GET['subject'])|| isset($_GET['bus']) || isset($_GET['mrt'])||isset($_GET['code']))
	{

		if(!empty($_GET['English_Score']) || !empty($_GET['Math_Score']) || !empty($_GET['certification']) ||!empty($_GET['subject'])||!empty($_GET['bus']) || !empty($_GET['mrt'])||!empty($_GET['code'])){


		$results = searchITE($English_Score, $Math_Score, $certification,$subject,$mrt,$bus,$code);
		?>

		<table class="table table-striped table-bordered secondaryTable" >
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
				<td><?php echo $result['Busnumber'] ?></td>
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
	<?php }} ?>
</div>


<?php include_once('../footer.php') ?>