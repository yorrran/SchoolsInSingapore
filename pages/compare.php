<?php include_once('../backend/searchManager.php'); ?>
<?php
$type = trim($_REQUEST['type']);
$res = array();
$res[0]="<tr><th align='left'><strong>School Attributes</strong></th>";
$res[1]="<tr height='77' align='center'><td align='left'>School Logo</td>";
$res[2]="<tr height='40' align='center'><td align='left'>School Name</td>";
$res[3]="<tr height='40' align='center'><td align='left'>School Code</td>";
$res[4]="<tr height='40' align='center'><td align='left'>Type</td>";
$res[5]="<tr height='40' align='center'><td align='left'>Location</td>";
$res[6]="<tr height='40' align='center'><td align='left'>Telephone</td>";
$res[7]="<tr height='40' align='center'><td align='left'>Email</td>";
$res[8]="<tr height='40' align='center'><td align='left'>Website</td>";
$res[9]="<tr height='40' align='center'><td align='left'>Nearest MRT</td>";
$res[10]="<tr height='40' align='center'><td align='left'>Bus Number</td>";
$res[11]="<tr height='150' align='center'><td align='left'>CCA</td>";
$res[12]="<tr height='180' align='center'><td align='left'>Subjects</td>";
$res[13]="<tr height='40' align='center'><td align='left'>Area Name</td>";

if($type=='detail')
{
$pid = explode('-',trim($_REQUEST['p_id']));
$scode = $pid['1'];
//echo $scode;
//$sql = mysql_query("SELECT * FROM gdn_schools where id=$id") OR die(mysql_error());
$sql = get_comparables_school($scode);
//var_dump($sql);
$data = $sql->fetch_assoc();

$res[0].="<th align='left'><strong>School Details</strong></th>";
$res[1].="<td align='left'><img src='../img/School_Logo/".str_replace(" ", "-",$data['school_name']).".jpg' width='75px' height='75px'></td>";
$res[2].="<td align='left'>".$data['school_name']."</td>";
$res[3].="<td align='left'>".$data['school_code']."</td>";
$res[4].="<td align='left'>".$data['type']."</td>";
$res[5].="<td align='left'>".$data['location']."</td>";
$res[6].="<td align='left'>".$data['telephone']."</td>";
$res[7].="<td align='left'>".$data['email']."</td>";
$res[8].="<td align='left'>".$data['website']."</td>";
$res[9].="<td align='left'>".$data['nearest_MRT']."</td>";
$res[10].="<td align='left'>".$data['bus_number']."</td>";
$res[11].="<td align='left'>".$data['CCA']."</td>";
$res[12].="<td align='left'>".$data['subjects']."</td>";
$res[13].="<td align='left'>".$data['area_name']."</td>";

}
else if($type=='compare')
{
$Totalpids = (array)json_decode(stripslashes($_REQUEST['pids']));
foreach($Totalpids as $product)
{
//$sql = mysql_query("SELECT * FROM gdn_schools where id=".$product->pid."");
$sql = get_comparables_school($product->pid);
$data = $sql->fetch_assoc();
//$data = mysql_fetch_assoc($sql);

$res[0].="<th align='left'><strong>School Details</strong></th>";
$res[1].="<td align='left'><img src='../img/School_Logo/".str_replace(" ", "-",$data['school_name']).".jpg' width='75px' height='75px'></td>";
$res[2].="<td align='left'>".$data['school_name']."</td>";
$res[3].="<td align='left'>".$data['school_code']."</td>";
$res[4].="<td align='left'>".$data['type']."</td>";
$res[5].="<td align='left'>".$data['location']."</td>";
$res[6].="<td align='left'>".$data['telephone']."</td>";
$res[7].="<td align='left'>".$data['email']."</td>";
$res[8].="<td align='left'>".$data['website']."</td>";
$res[9].="<td align='left'>".$data['nearest_MRT']."</td>";
$res[10].="<td align='left'>".$data['bus_number']."</td>";
$res[11].="<td align='left'>".$data['CCA']."</td>";
$res[12].="<td align='left'>".$data['subjects']."</td>";
$res[13].="<td align='left'>".$data['area_name']."</td>";
}
}

for($i=0;$i<count($res);$i++){
	$res[$i].="</tr>";
}
$table = "";
for($j=0;$j<count($res);$j++){
	$table.= $res[$j];
}

echo "<table cellspacing='2' cellpadding='0' align='left' width='200' border='1'>".$table."</table>";
?>
