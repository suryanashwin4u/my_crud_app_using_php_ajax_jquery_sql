<?php
// include "config.php";
$first_name=$last_name="";
if(isset($_POST['f_name']) && isset($_POST['l_name'])){
$first_name=$_POST['f_name'];
$last_name=$_POST['l_name'];
}


// $conn=mysqli_connect('localhost','root','','student');
$sql_query="delete from student_details where f_name='$first_name' and l_name='$last_name'";

if(mysqli_query($conn,$sql_query))
{

echo "data deleted successfully";

}
else
{
echo '<script>alert("operation unsuccessfull")</script>';
}
mysqli_close($conn);

?>
