<?php
include "./config.php";

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
			echo 'Operation unsuccessfull';
		}}


	


	//update student details in the database
	public function update_data(){
			$fname=$update_address=$update_gender="";
			if(isset($_POST['f_name']) && isset($_POST['address']) && isset($_POST['gender'])){
				$checkname=$_POST['f_name'];
				$update_address=$_POST['address'];
				$update_gender=$_POST['gender'];
			}
		
			$sql_query="UPDATE student_details SET address=$update_address ,gender=$update_gender WHERE f_name=$checkname";
			if(mysqli_query($this->conn,$sql_query)){
			echo "data has been updated successfully";
			}
			else{
				echo 'Operation unsuccessfull';
			}
		}
	


	

	//delete student details in the database
	public function delete_data(){
		$first_name=$last_name="";
		if(isset($_POST['f_name']) && isset($_POST['l_name'])){
		$first_name=$_POST['f_name'];
		$last_name=$_POST['l_name'];
		}
		$sql_query="delete from student_details where f_name=$first_name and l_name=$last_name";
		if(mysqli_query($this->conn,$sql_query)){
		echo "data deleted successfully";
		}
		else{
				echo 'Operation unsuccessfull';
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

		$obj=new Student(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

?>