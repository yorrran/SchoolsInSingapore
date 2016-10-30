<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include('../backend/searchManager.php');

$fav_list = get_fav_list('user1');

//var_dump($_POST);
if(isset($_POST['favorite']))
{
	// echo "testing";
	$school_name = $_POST['favorite'];
	
	if(!in_array($_POST['favourite'],$fav_list)){
		add_to_fav_list('user1', $school_name);
	}else{
		echo 'Duplicate exist';
	}
}
else if(isset($_POST['unfavorite']))
{
	$school_name = $_POST['unfavorite'];
	if(in_array($school_name,$fav_list)){
		remove_from_fav_list('user1', $school_name);
	}else{
		echo 'Record not found!';
	}
}
?>