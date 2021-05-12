<script type="text/javascript">
function myfunc($var)
{
	if($var === 1){
	alert("Loggin Successful");
	location.replace('apply.php');
	
	}
	else{
		alert("The user does not exist...Please sign in!!");
		location.replace('rc_sign.html');
	}
		
}
</script>
<?php

include ('test.php');
session_start();

if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	
	$sql = "SELECT * FROM rc where rc_name='$name' and password='$pwd'";
	
	$result = oci_parse($conn,$sql);
	oci_execute($result);
	
	$row = oci_fetch_assoc($result);
	$_SESSION['blk_name'] = $row["BLOCK_NAME"];
	echo $row["BLOCK_NAME"];
	//$count=oci_num_rows($result);
    //echo "$count";
  
	if (oci_num_rows($result)== 0) {
		 //echo "The user does not exist...Please sign in!!";
		 echo "hi";
		 echo '<script type="text/javascript">','myfunc(0);','</script>';
		 //header('location: stu_sign.html');
	}
	else{
		//echo "Logged in Successful";
		
		echo "hello";
		echo '<script type="text/javascript">','myfunc(1);','</script>';
		//header('location: leave.html');
	}
}
?>
