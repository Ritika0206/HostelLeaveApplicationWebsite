<script type="text/javascript">
function myfunc($var)
{
	if($var == 1){
		alert("Loggin Successful");
		location.replace('leave.html');
	}
	else{
		alert("The user does not exist...Please sign in!!");
		location.replace('stu_sign.html');
		}

}
</script>
<?php

include ('test.php');

session_start();
if(isset($_POST['submit'])){
	$rollno = $_POST['rollno'];
	$pwd = $_POST['pwd'];
	$_SESSION['regno'] = $rollno;

	$sql = "SELECT * FROM student where reg_no=$rollno and password='$pwd'";
	
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	
	$row = oci_fetch_assoc($result);
	
	
    
  
	if (oci_num_rows($result)== 0) {
		 echo '<script type="text/javascript">','myfunc(0);','</script>';
	}
	else{
		echo '<script type="text/javascript">','myfunc(1);','</script>';
	}
}
?>
