<script type="text/javascript">
function myfunc($var)
{
	alert($var);
	window.location.href('extendleave.html');

}
</script>
<?php
include ('test.php');

if(isset($_POST['submit'])){
	$rollno = $_POST['rollno'];

	$oldret_date=$_POST['ret1_date'];
	$ret_date = $_POST['ret_date'];
	$reason=$_POST['reason'];
	$no_of_days=$_POST['count'];
	
	//$newDate = date("d-m-Y", strtotime($ret_date));  
	//echo "$newDate";
	
	$sql="INSERT INTO extend_leave(reg_no,no_of_days,reason,old_return_date,extend_return_date)VALUES($rollno,$no_of_days,'$reason','$oldret_date','$ret_date')";
///$sql="UPDATE apply set extend_date='$ret_date',extend_reason='$reason' where return_date='$oldret_date' and reg_no=$rollno";
	$flag = oci_parse($conn,$sql);

	if(oci_execute($flag)){
		echo '<script type="text/javascript">','myfunc("Leave applied successful");','</script>';
	} 
	else{
		echo '<script type="text/javascript">','myfunc("Error while applying..TRY AGAIN!!");','</script>';
	}
	oci_commit($conn);
	//$sql="UPDATE apply set extend_date='$ret_date',extend_reason='$reason' where return_date='$oldret_date' and reg_no=$rollno";
	/*$flag1=oci_parse($conn,$sql1);
	if(oci_execute($flag)){
		echo "hi";
	}
	else{
		echo "error";
	}*/

	}
?>













