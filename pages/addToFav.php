<?php 
include('header.php');
include('../backend/searchManager.php');

//var_dump($_POST);
if(isset($_POST['favorite'])){
	echo "testing";
	$school_name = $_POST['favorite'];
	add_to_fav_list('user1', $school_name);
}else if(isset($_POST['unfavorite'])){
	$school_name = $_POST['unfavorite'];
	remove_from_fav_list('user1', $school_name);
}
//echo '<javascript>alert("'.$school_name.'");</javascript>'; //not working if fixed pls amend on addToCompare.php too
//header("location:javascript://history.go(-1)");
?>