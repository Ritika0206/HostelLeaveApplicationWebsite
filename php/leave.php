<script type="text/javascript">
function myfunc($var)
{
	alert($var);
	window.location.href('leave.html');
}
</script>
<?php
include ('test.php');

if(isset($_POST['submit'])){
	$rollno = $_POST['rollno'];
	$name = $_POST['name'];
	$reason = $_POST['reason'];
	$leave_date = $_POST['leave_date'];
	$leave_time = $_POST['leave_time'];
	$ret_date = $_POST['ret_date'];
	$ret_time = $_POST['ret_time'];
	$phone = $_POST['phone'];
	$mob = $_POST['mob'];
	//$reg_no=$_SESSION['reg_no'];
	//$regno=$_SESSION['regno'];
	//$sel = "select reg_no,name from student where reg_no=$regno or reg_no=$reg_no";
	
	$sql="INSERT INTO leave(reg_no,name,reason,leaving_date,leaving_time,return_date,return_time)VALUES($rollno,'$name','$reason','$leave_date','$leave_time','$ret_date','$ret_time')";
	
	$flag = oci_parse($conn,$sql);

	if(oci_execute($flag)){
		echo '<script type="text/javascript">','myfunc("Leave applied successfully");','</script>';
	} 
	else{
		echo '<script type="text/javascript">','myfunc("Error while applying..TRY AGAIN");','</script>';
	}
	//oci_execute($flag);
	
	//$sql1="INSERT INTO apply (reg_no,date_of_apply,return_date,reason) values ($rollno,'$leave_date','$ret_date','$reason')";
	//$flag1= oci_parse($conn,$sql1);
	//oci_execute($flag1);

	oci_commit($conn);

	}
?>













