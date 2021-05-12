<script type="text/javascript">
function myfunc($var)
{
	alert($var);
}
</script>
<?php
include ('test.php');
if(isset($_POST['submit'])){
$name=$_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$block=$_POST['block'];
$phone=$_POST['phone'];

$sql="INSERT INTO rc(rc_name,email,password,block_name)VALUES('$name','$email','$pwd','$block')";

$flag=oci_parse($conn,$sql);

if(oci_execute($flag)){
	echo '<script type="text/javascript">','myfunc("inserted successfully");','</script>';
} 
else{
	echo '<script type="text/javascript">','myfunc("error while inserting");','</script>';
}

oci_commit;
}
?>
