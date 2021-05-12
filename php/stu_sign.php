<script type="text/javascript">
function myfun($var)
{
	if($var){
	alert("Signin Successful...");
	//sleep(50);
	location.replace('leave.html');	
	
	}
	else{
		alert("You are already an user...Please loggin...");
		location.replace('stu_login.html');
		}
		
}
</script>

<?php
include ('test.php');

if(isset($_POST['submit'])){
$rollno=$_POST['rollno'];
$name=$_POST['name'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];
$dept=$_POST['dept'];
$blockname=$_POST['blockname'];
$room=$_POST['roomno'];
$addres = $_POST['adrs'];
$phone=$_POST['phone'];
$pname = $_POST['pname'];
$pphone = $_POST['pphone'];
$lgname = $_POST['lgname'];
$lgaddress = $_POST['lgaddress'];
$lgphone = $_POST['lgphone'];

$_SESSION['reg_no']=$rollno;

$query = "select * from student where reg_no=$rollno";
$new = oci_parse($conn,$query);
oci_execute($new);

$row = oci_fetch_assoc($new);

if(oci_num_rows($new)==0){
	
$sql="INSERT INTO student(reg_no,name,email,password,dept,address,block_name,room_no)VALUES($rollno,'$name','$email','$pwd','$dept','$addres','$blockname','$roomno')";

$flag=oci_parse($conn,$sql);
oci_execute($flag);

$sql = "INSERT into student_phn_no(reg_no,phone_no) values ($rollno,$phone)";
$flag = oci_parse($conn,$sql);
oci_execute($flag);

$sql = "INSERT into parent(reg_no,parent_name) values ($rollno,'$pname')";
$flag = oci_parse($conn,$sql);
oci_execute($flag);

$sql = "INSERT into par_phn_no(reg_no,phone_no) values ($rollno,$pphone)";
$flag = oci_parse($conn,$sql);
 oci_execute($flag) ;

if($lgname=" "){
	$sql="INSERT  into local_guardian(reg_no)values($rollno)";
	$flag=oci_parse($conn,$sql);
	oci_execute($flag);
 }
else{
	$sql = "INSERT into local_guardian(reg_no,lg_name,address) values ($rollno,'$lgname','$lgaddress')";
	$flag = oci_parse($conn,$sql);
	oci_execute($flag);


	$sql = "INSERT into lg_phn_no(reg_no,phone_no) values ($rollno,$lgphone)";
	$flag = oci_parse($conn,$sql);
	oci_execute($flag);
	}
	echo '<script type="text/javascript">myfun(1);</script>';

}

else{
	echo '<script type="text/javascript">','myfun(0);','</script>';
	
}
}

?>


