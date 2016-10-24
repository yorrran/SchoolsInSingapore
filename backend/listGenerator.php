<?php
include_once('dbManager.php');
$conn = dbConnect();

$sql = "select * from cca_list";
$result=$conn->query($sql);
$cca_options = "'";
$i = 0;

while($row = $result->fetch_assoc())
{
	if(($i+1)==$result->num_rows)
		$cca_options .= $row["CCA"]."'";
	else
		$cca_options .= $row["CCA"]."','";

	$i++;
}

$sql_subjects = "select * from subjects";
$result_subjects=$conn->query($sql_subjects);

$subject= "'";

$j = 0;

while($row_subjects = $result_subjects->fetch_assoc())
{
	if(($j+1) == $result_subjects->num_rows)
		$subject .= $row_subjects["subjects"]."'";
	else
		$subject .= $row_subjects["subjects"]."','";

	$j++;
}

dbDisconnect($conn)
?>