<?php include('../backend/searchManager.php'); ?>
<?php
$type = trim($_REQUEST['type']);
$res ='';
$res="<table cellspacing='2' cellpadding='0' align='left' width='200' border='1'>
<tr><th align='left'><strong>School Attributes</strong></th></tr>
<tr height='77' align='center'><td align='left'>School Logo</td></tr>
<tr height='40' align='center'><td align='left'>School Name</td></tr>
<tr height='40' align='center'><td align='left'>School Code</td></tr>
<tr height='40' align='center'><td align='left'>Type</td></tr>
<tr height='40' align='center'><td align='left'>Location</td></tr>
<tr height='40' align='center'><td align='left'>Telephone</td></tr>
<tr height='40' align='center'><td align='left'>Email</td></tr>
<tr height='40' align='center'><td align='left'>Website</td></tr>
<tr height='40' align='center'><td align='left'>Nearest MRT</td></tr>
<tr height='40' align='center'><td align='left'>Bus Number</td></tr>
<tr height='150' align='center'><td align='left'>CCA</td></tr>
<tr height='180' align='center'><td align='left'>Subjects</td></tr>
<tr height='40' align='center'><td align='left'>Area Name</td></tr>
</table>";
if($type=='detail')
{
$pid = explode('-',trim($_REQUEST['p_id']));
$scode = $pid['1'];
//echo $scode;
//$sql = mysql_query("SELECT * FROM gdn_schools where id=$id") OR die(mysql_error());
$sql = get_comparables_school($scode);
//var_dump($sql);
$data = $sql->fetch_assoc();

$res .="<table cellspacing='2' cellpadding='0' align='left' width='240' border='1'>
<tr><th align='left'><strong>School Details</strong></th></tr>
<tr height='75' align='center'><td align='left'><img src='../img/School_Logo/".str_replace(" ", "-",$data['school_name']).".jpg' width='75px' height='75px'></td></tr>
<tr height='40' align='center'><td align='left'>".$data['school_name']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['school_code']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['type']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['location']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['telephone']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['email']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['website']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['nearest_MRT']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['bus_number']."</td></tr>
<tr height='150' align='center'><td align='left'>".$data['CCA']."</td></tr>
<tr height='180' align='center'><td align='left'>".$data['subjects']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['area_name']."</td></tr>";
$res .= "</table>";
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
$res .="<table cellspacing='2' cellpadding='0' align='left' width='240' border='1'>
<tr><th align='left'><strong>School Details</strong></th></tr>
<tr height='75' align='center'><td align='left'><img src='../img/School_Logo/".str_replace(" ", "-",$data['school_name']).".jpg' width='75px' height='75px'></td></tr>
<tr height='40' align='center'><td align='left'>".$data['school_name']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['school_code']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['type']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['location']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['telephone']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['email']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['website']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['nearest_MRT']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['bus_number']."</td></tr>
<tr height='150' align='center'><td align='left'>".$data['CCA']."</td></tr>
<tr height='180' align='center'><td align='left'>".$data['subjects']."</td></tr>
<tr height='40' align='center'><td align='left'>".$data['area_name']."</td></tr>";
$res .= "</table>";
}
}
echo $res;
?>