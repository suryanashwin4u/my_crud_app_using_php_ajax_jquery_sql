<?php
// include "config.php";
// $conn=mysqli_connect('localhost','root','','student');


$first_name=$last_name=$address=$phone_number=$gender="";

if(isset($_POST['f_name']) && isset($_POST['l_name'])  && isset($_POST['address']) && isset($_POST['gender'])){
$first_name=$_POST['f_name'];
$last_name=$_POST['l_name'];
$address=$_POST['address'];
$gender=$_POST['gender'];
}

$sql_query="insert into student_details (f_name,l_name,address,gender) values($first_name,$last_name,$address,$gender)";

if(mysqli_query($conn,$sql_query))
{
echo "data inserted successfully";
}
else
{
	echo '<script>alert("Operation unsuccessfull")</script>';
}
mysqli_close($conn);

?>
