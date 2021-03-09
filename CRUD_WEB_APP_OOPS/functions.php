<?php
class Student{
	public $conn;
	//constructor to establish database connections
	public function __construct($host,$username,$password,$db_name){
		$this->conn=mysqli_connect($host,$username,$password,$db_name);			
	}

	//destructor will end the connections at the end
	public function __destruct(){
		mysqli_close($this->conn);
	}

	//insert student details in the database
	public function insert_data(){	
		$first_name=$last_name=$address=$phone_number=$gender="";
		if(isset($_POST['f_name']) && isset($_POST['l_name'])  && isset($_POST['address']) && isset($_POST['gender'])){
		$first_name=$_POST['f_name'];
		$last_name=$_POST['l_name'];
		$address=$_POST['address'];
		$gender=$_POST['gender'];
		}
		$sql_query="insert into student_details (f_name,l_name,address,gender) values('$first_name','$last_name','$address','$gender')";

		if(mysqli_query($this->conn,$sql_query)){
		echo "data inserted successfully";
		}
		else{
		echo "operation unseccessfull";
		}}

	//update student details in the database
	public function update_data(){
			$student_Fname_to_update=$update_address=$update_gender="";
			if(isset($_POST['student_Fname_to_update']) && isset($_POST['update_address']) && isset($_POST['update_gender'])){
				$student_Fname_to_update=$_POST['student_Fname_to_update'];
				$update_address=$_POST['update_address'];
				$update_gender=$_POST['update_gender'];
			}
		
			$sql_query="UPDATE student_details SET address='$update_address',gender='$update_gender' WHERE f_name='$student_Fname_to_update'";

			if(mysqli_query($this->conn,$sql_query)){
			echo "updated successfully";
			}
			else{
				echo '<script>alert("Operation unsuccessfull")</script>';
			}
		}
	
	//delete student details in the database
	public function delete_data(){
		$first_name=$last_name="";
		if(isset($_POST['f_name']) && isset($_POST['l_name'])){
		$first_name=$_POST['f_name'];
		$last_name=$_POST['l_name'];
		}
		$sql_query="delete from student_details where f_name='$first_name' and l_name='$last_name'";
		if(mysqli_query($this->conn,$sql_query)){
		echo "data deleted successfully";
		}
	}

	//populate student table in user interface
	public function populate_data(){
		$result=mysqli_query($this->conn,"select * from student_details");
		while($row=mysqli_fetch_assoc($result)){
		$table_data[]= array("id"=>$row['id'],"f_name"=>$row['f_name'],"l_name"=>$row['l_name'],"address"=>$row['address'],"gender"=>$row['gender']);
		}
		echo json_encode($table_data);	
	}
}
?>