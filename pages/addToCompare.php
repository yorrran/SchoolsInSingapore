<?php 
include('header.php');
include('../backend/searchManager.php');

if(isset($_POST['compare'])){
	$school_name = $_POST['compare'];
	if(empty($_SESSION['clist']))	
		$_SESSION['clist'] = array();
	array_push($_SESSION['clist'], $school_name);
	var_dump($_SESSION['clist']);
	
}else if(isset($_POST['remove'])){
	
	echo 'Current array ->';
	var_dump($_SESSION['clist']);
	echo '<br />';
	
	echo 'Incoming school name ->';
	var_dump(($_POST['remove']));
	echo '<br />';

	$key = array_search($_POST['remove'],$_SESSION['clist']);
	echo 'array key ->';
	var_dump($key);
	echo '<br />';
	
	if($key!==false){
	$a = $_SESSION['clist'];
	unset($a[$key]);
	$a = array_values($a);
	$_SESSION['clist'] = $a;
	}
	
	echo 'After array ->';
	var_dump($_SESSION['clist']);

}

//echo '<javascript>alert("'.$school_name.'");</javascript>'; //not working if fixed pls amend on addToCompare.php too
//header("location:comparisonlist.php"); //check if its working 
?>