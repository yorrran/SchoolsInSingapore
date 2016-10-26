<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include('../backend/searchManager.php');

//var_dump($_POST);
if(isset($_POST['favorite']))
{
	// echo "testing";
	$school_name = $_POST['favorite'];
	if(!in_array($_POST['compare'],$_SESSION['clist'])){
		add_to_fav_list('user1', $school_name);
	}else{
		echo 'Duplicate exist';
	}
}
else if(isset($_POST['unfavorite']))
{
	$school_name = $_POST['unfavorite'];
	remove_from_fav_list('user1', $school_name);
}
//header("location:javascript://history.go(-1)");
?>