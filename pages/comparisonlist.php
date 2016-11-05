<?php include_once('header.php'); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpmysqlcode</title>
<link href="../css/style2.css" rel="stylesheet" type="text/css" />
<script src="../js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../css/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="../css/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

<script type="text/javascript">
$(document).ready(function(){
	$(".detail").click(function(){
	var p_id = $(this).attr('id');
		if(p_id!='')
		{
		 $.ajax({
				type:"post",
				url:"compare.php",
				data:{p_id:p_id,type:'detail'},
				cache: false,
				success:function(data){
				$.fancybox(data, {
					fitToView: true,
					width: 700,
					height: 700,
					autoSize: true,
					closeClick: false,
					openEffect: 'none',
					closeEffect: 'refresh'
				});

				}
		   });
		}
	});
});

function compare()
{
	var total_check = new Array();
	$('.products:checked').each(function () {
		total_check.push($(this).val());
	});

	if (total_check != '') {
		if (total_check.length <= '5') {
		var i = 0;
		var pidArray = new Object();
		$('.products:checked').each(function () {
		total_check.push($(this).val());
		var id = $(this).attr('id');
		pidArray[i] = {
			pid: id
		};
		i++;
	});
	var data = JSON.stringify(pidArray);
	$('#wait').show();
			$.ajax({
				url: "compare.php",
				type: "POST",
				data: {pids:data,type:'compare'},
				cache: false,
				success: function (data) {
				$('#wait').hide();
					$.fancybox(data, {
						fitToView: true,
						width: 700,
						height: 500,
						autoSize: true,
						closeClick: false,
						openEffect: 'none',
						closeEffect: 'refresh'
					});
				}
			});
		} else {
		alert("You can only compare up to five schools at once");
			return false;
		}
	} else {
		alert("Please select the school(s)");
		return false;
	}
}
</script>
</head>
<body>
<div class="wrapper">
<div class="header">
<div class="mybg"><h2 class="head">Just Do It</h2>
</div></div>


<div class="body1">
<div class="body2">
<div class="main_table">
<h1 align="center">School Compare</h1>
<br>
<span align="center"><img id="wait" style="display:none;margin-left:300px;" src="image/loading.gif"></span>
<?php

		if (!empty($_SESSION['clist']))
		{
				echo '
				<table width="100%">
				<tr>
					<td width="10%"><a href="javascript:void(0)" onclick="compare();" style="color:blue;font-size:15px;"><b>Compare</b></a></td>
					<td width="20%">School Logo</td>
					<td width="20%">School Name</td>
					<td width="20%">School Code</td>
					<td width="20%">Details</td>
					<td width="10%"></td>
				</tr>';

				$num_rec_per_page=10;
				if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
				$start_from = ($page-1) * $num_rec_per_page;

			$array = $_SESSION['clist'];
			foreach ($array as $item) {
				//echo $item;
				$school = searchSchool($item);

				foreach ($school as $data){
					//var_dump($data);
					echo '<tr><td><input type="checkbox" name="products[]" class="products" id="'.$data['school_code'].'"></td>';
					echo '<td><img src="../img/School_Logo/'.str_replace(" ", "-",$data['school_name']).'.jpg" width="80" height="80px;"></td>';
					echo '<td>'.$data['school_name'].'</td>';
					echo '<td>'.$data['school_code'].'</td>';
					echo '<td><a href="javascript:void(0);" class="detail" id="detail-'.$data['school_code'].'">Details</a></td>';
					echo '<td>';

					if(isset($_COOKIE['signed_in_id'])){
						$fav_list = get_fav_list($_COOKIE['signed_in_id']);//return an array
					}

					if(in_array($data['school_name'],$fav_list)){ //display unfavourite button if in favourite list

						echo '<form method="POST" action="addToFav.php" ><button name="unfavorite" value="'.$data['school_name'].'" class="btn btn-success">Unfavorite</button></form>';

					}else { //display add to favourite button if not in favourite list
						echo '<form method="POST" action="addToFav.php" ><button name="favorite" value="'.$data['school_name'].'" class="btn btn-success">Favorite</button></form>';

					}

					echo '<form action="addToCompare.php" method="POST" ><button name="remove" value="'.$data['school_name'].'" >Remove</button></form>
						</td></tr>';

				}
			}
		}
		?>

</table>
<!-- used for the page number -->
<?php
// if (!empty($_SESSION['clist']))
// {
// 	$total_records = count($_SESSION['clist']);  //count number of records
// 	$total_pages = ceil($total_records / $num_rec_per_page);
//
// 	echo "<a href='comparisonlist.php?page=1'>".'|<'."</a> "; // Goto 1st page
//
// for ($i=1; $i<=$total_pages; $i++) {
//             echo "<a href='comparisonlist.php?page=".$i."'>".$i."</a> ";
// }
// echo "<a href='comparisonlist.php?page=$total_pages'>".'>|'."</a> "; // Goto last page
// }
// else {
// 	echo '<div class="text-center"><br><br>~~~ List is empty ~~~</div>';
// }
?>
</div>
</div></div>
</div>