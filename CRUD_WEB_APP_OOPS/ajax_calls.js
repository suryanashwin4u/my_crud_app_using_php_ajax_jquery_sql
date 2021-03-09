$(document).ready(function(){
$("#insert_form").submit(function(event){
	event.preventDefault();
	var f_name=$('#f_name').val();
	var l_name=$('#l_name').val();
	var address=$('#address').val();
	var gender=$('#gender').val();
	var datastring={'insert_data':true,'f_name':f_name,'l_name':l_name,'address':address,'gender':gender};
		$.ajax({
		            type        :'POST', 
		            url         :'insert_data.php',
		            data        :datastring,
		            cache		:false,
		            encode      :true,
		            success		:function(data)
		            {
						// document.getElementById("data_inserted").innerHTML="data successfully inserted";
						alert(data);

					}
				});
				})});



$(document).ready(function(){
$("#update_form").submit(function(event){
	event.preventDefault();
	var f_name=$('#select_f_name').val();
	var address=$('#update_address').val();
	var gender=$('#update_gender').val();
	var datastring={'f_name':f_name,'address':address,'gender':gender};
		$.ajax({
		            type        :'POST', 
		            url         :'update_data.php',
		            data        :datastring,
		            cache		:false,
		            encode      :true,
		            success		:function(data)
		            {
						// document.getElementById("data_updated").innerHTML=data;
						alert(data);
					}
				});
				})});



$(document).ready(function(){
$("#delete_form").submit(function(event){
	event.preventDefault();
	var f_name=$('#f_name').val();
	var l_name=$('#l_name').val();
	var datastring={'f_name':f_name,'l_name':l_name};
		$.ajax({
		            type        :'POST', 
		            url         :'delete_data.php',
		            data        :datastring,
		            cache		:false,
		            encode      :true,
		            success		:function(data)
		            {
						// document.getElementById("data_deleted").innerHTML=data;
						alert(data);
					}
				});
				})});



$(document).ready(function(){
	$("#populate_table").click(function(event){
		event.preventDefault();
		$.ajax({
		            type        :'GET', 
		            url         :'populate_table.php',
		            dataType	:'html',
		            success		:function(data){
										 		myObj = JSON.parse(data);
											    var txt="";
											    for (x in myObj) {
															      txt +="<tr>"+"<td>"+myObj[x].id+"</td>"+"<td>"+myObj[x].f_name+"</td>"+"<td>"+myObj[x].l_name+"</td>"+"<td>"+myObj[x].address+"</td>"+"<td>"+myObj[x].gender+"</td>"+"</tr>";
																 }
											    document.getElementById("ajax_data_request").innerHTML = txt;
		  										}	   	
					}
				)})});