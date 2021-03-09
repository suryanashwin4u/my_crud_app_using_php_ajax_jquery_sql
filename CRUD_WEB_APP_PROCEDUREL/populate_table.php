<?php
// include "config.php";
// $conn=mysqli_connect('localhost', 'root', '','student');

$result=mysqli_query($conn,"select * from student_details");

while($row = mysqli_fetch_assoc($result))
{
$table_data[]= array("id"=>$row['id'],"f_name"=>$row['f_name'],"l_name"=>$row['l_name'],"address"=>$row['address'],"gender"=>$row['gender']);
}

mysqli_close($conn);

echo json_encode($table_data);
?>