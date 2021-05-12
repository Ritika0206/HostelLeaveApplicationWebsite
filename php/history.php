<html>
<body>
<?php
include ('test.php');
session_start();
if(isset($_POST['history'])){
	
	$rollno=$_SESSION['regno'];

	$sql="select * from apply where reg_no=$rollno";
	 $result=oci_parse($conn,$sql);
	 oci_execute($result);
	 echo "<h1>"." "." LEAVING_DATE  &nbsp &nbsp REASON"."</h1>";
	 while(($row=oci_fetch_array($result,OCI_ASSOC))){
     		 echo "<h3>&nbsp &nbsp &nbsp &nbsp".$row['DATE_OF_APPLY']."--------------------------------".$row['REASON']."</h3>"."<br>";
}
}

?>
<div >
<center><a href="leave.html"><button>BACK TO LEAVE FORM</button></center></a><br>
</div>

</body>
</html>