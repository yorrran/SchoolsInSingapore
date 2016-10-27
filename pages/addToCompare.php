<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);
include_once('header.php');
include('../backend/searchManager.php');

if(isset($_POST['compare']))
{
	$school_name = $_POST['compare'];

	if(empty($_SESSION['clist']))
		$_SESSION['clist'] = array();

	if(!in_array($_POST['compare'],$_SESSION['clist']))
		array_push($_SESSION['clist'], $school_name);
	else
		echo 'duplicate exist';
}
else if(isset($_POST['remove']))
{
	$key = array_search($_POST['remove'],$_SESSION['clist']);

	if($key!==false)
	{
		$a = $_SESSION['clist'];
		unset($a[$key]);

		$a = array_values($a);
		$_SESSION['clist'] = $a;
	}
}
?>