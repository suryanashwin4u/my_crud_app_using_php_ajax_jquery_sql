		function show_db(){
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() 
		  {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		    myObj = JSON.parse(this.responseText);
		    var txt="";
		    for (x in myObj) {
		      txt +="<tr>"+"<td>"+myObj[x].id+"</td>"+"<td>"+myObj[x].f_name+"</td>"+"<td>"+myObj[x].l_name+"</td>"+"<td>"+myObj[x].address+"</td>"+"<td>"+myObj[x].gender+"</td>"+"</tr>";
		    }
		    document.getElementById("ajax_data_request").innerHTML =txt;

  			}	   			
		  };
		  xhttp.open("GET","populate_table.php",true);
		  xhttp.send();
		}




		function insert_db(){
		  var xhttp = new XMLHttpRequest();
		  var f_name=document.getElementById("f_name").value;
		  var l_name=document.getElementById("l_name").value;
		  var address=document.getElementById("address").value;
		  var gender=document.getElementById("gender").value;

		  xhttp.open("POST", "insert_data.php", true);
		  xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
		  xhttp.onreadystatechange = function() 
		  {
		if (xhttp.readyState == 4) {
		    alert(xhttp.responseText);
		    console.log(this.responseText);
		    document.getElementById("insert_data").innerHTML=this.responseText;
		  }
		}
		 xhttp.send("f_name="+f_name+"&l_name="+l_name+"&address="+address+"&gender="+gender);
		}