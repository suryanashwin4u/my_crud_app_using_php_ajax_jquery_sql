<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./ajax_calls.js"></script>
</head>
<body style="background-color: pink;">
		<div class="container" >
			<center>
				 		<hr>
				 		
						<h3>enter student details</h3>
						
						<form id="insert_form">
						<div>
						<label>first name:</label>
						<input type="text" id="f_name">
						</div>
						<div>
						<label>last name:</label>
						<input type="text" id="l_name">
						</div>
						<div>
						<label>address:</label>
						<input type="text" id="address">
						</div>						
						<div >
						<label>gender:</label>
						<input type="text" id="gender">
						</div>
						<button type="submit" id="insert_submit" class="btn-primary btn">Submit</button>
						<div id="data_inserted"></div>

						</form>
					</div>

				</center>

				<hr>
					<center>
					
						<h3>delete student details</h3>
							<form id="delete_form">
								<div>
								<label>first name:</label>
								<input type="text" id="f_name">
								</div>
								<div>
								<label>last name:</label>
								<input type="text" id="l_name">
								</div>
								<div>
								<button type="submit" class="btn btn-primary">delete</button>
							</form>
							<div id="data_deleted"></div>
					</div>
				</div>


				</center>
				<center>
				 		<hr>
						<h3>update student details</h3>
						<form id="update_form">
						<div>
						<label>select student to update data</label>
						<select id="select_f_name">
									<?php 
									$conn=mysqli_connect('localhost','root','','student');
									$result = mysqli_query($conn,"SELECT f_name FROM student_details");
									while ($row = mysqli_fetch_assoc($result)){
									?>
									<option value="<?php echo $row['f_name'] ?>"><?php echo $row['f_name']; ?>
									</option>
									<?php
									}
									?>
						</select>
						<div>
						<label>address:</label>
						<input type="text" id="update_address">
						</div>
						
						<div >
						<label>gender:</label>
						<input type="text" id="update_gender">
						</div>
						<button type="submit" class="btn btn-primary">update</button>
						</form>

						<div id="data_updated"></div>
					</div>

				</center>

					<br>

					<hr>

					<center>
						<button type="button" id="populate_table" style="margin-top: 15px;" class="btn btn-primary">Click here to show data in the table using ajax</button>
					</center>
					
					<table class="table table-dark" style="margin-top: 5%;">
						<tr>
							<th>no.</th>
							<th>first name</th>
							<th>last name</th>
							<th>address</th>
							<th>gender</th>
						</tr>
						
						<tbody id="ajax_data_request" >
							
						</tbody>
					</table>

		</div>
</body>
</html>