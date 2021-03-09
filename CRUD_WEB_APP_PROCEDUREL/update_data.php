<?php
// include "config.php";
$student_Fname_to_update=$update_address=$update_gender="";

if(isset($_POST['student_Fname_to_update']) && isset($_POST['update_address']) && isset($_POST['update_gender'])){
$student_Fname_to_update=$_POST['student_Fname_to_update'];
$update_address=$_POST['update_address'];
$update_gender=$_POST['update_gender'];
}
$conn=mysqli_connect('localhost','root','','student');
$sql_query="UPDATE student_details SET address='$update_address',gender='$update_gender' WHERE f_name='$student_Fname_to_update'";
if(mysqli_query($conn,$sql_query)){
echo "updated successfully";
}
else{
	echo '<script>alert("Operation unsuccessfull")</script>';
}
mysqli_close($conn);

?>
