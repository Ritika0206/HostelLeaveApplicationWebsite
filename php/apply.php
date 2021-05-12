<script type="text/javascript">
function myfunc()
{
	
		location.replace('mail.php');
	
}
</script>

<?php

include ('test.php');
session_start();
$blk_name = $_SESSION['blk_name'];
$stid = oci_parse($conn, "SELECT l.reg_no,l.name,l.reason,l.leaving_date,l.leaving_time,l.return_date,l.return_time FROM leave l inner join student s on s.reg_no=l.reg_no and s.block_name='$blk_name' ");
oci_execute($stid);
//echo "REG_NO"."" . "REASON" ."<br>\n";
$first = "ok";

while ($row = oci_fetch_array($stid,OCI_ASSOC)) {
 //  echo '<tr><td>'.$row['REG_NO'] .'</td>
	//	<td>.$row['REASON'].</td></tr>';
echo '<table width="500px" border="2px"  align="center" cellspacing="5px" style="background:lightgreen;" >';

echo '<tr><td>' . " REG_NO " .'</td>' . '<td>' . $row['REG_NO'].'</td></tr>';
echo '<tr><td>'	. " NAME "   .'</td>' . '<td>' . $row['NAME']  .'</td></tr>';
echo '<tr><td>'	. " REASON "   .'</td>' . '<td>' . $row['REASON']  .'</td></tr>';
echo '<tr><td>'	. " LEAVING_DATE "   .'</td>' . '<td>' . $row['LEAVING_DATE']  .'</td></tr>';
echo '<tr><td>'	. " LEAVING_TIME "   .'</td>' . '<td>' . $row['LEAVING_TIME']  .'</td></tr>';
echo '<tr><td>'	. " RETURN_DATE "   .'</td>' . '<td>' . $row['RETURN_DATE']  .'</td></tr>';
echo '<tr><td>'	. " RETURN_TIME "   .'</td>' . '<td>' . $row['RETURN_TIME']  .'</td></tr>';
echo '<tr ><td colspan="2" >'.'<center>'.'<button onclick="myfunc()">' . "GRANTED" . '</button>'." ".'<button onclick="myfunc()">'."CANCELLED" . '</button>'.'</center>'.'</td></tr>';
echo '</table>';
}

?>
<!--html>
<table border=>
</html>