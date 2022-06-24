<?php 
include '../modals/new_data.php';
include '../modals/edit_data.php';
include '../modals/import_data.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin</title>
<link rel="stylesheet" type="text/css" href="../node_modules/materialize-css/dist/css/materialize.min.css">
</head>
<body>
  <nav>
    <div class="nav-wrapper black">

      <a href="#" class="brand-logo"><i class="material-icons"></i>Admin</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#"><i class="modal-trigger" data-target="new_data" onclick="create_student();">Register Student</i></a></li>
        <!-- <li><a href="badges.html"><i class="material-icons">view_module</i></a></li> -->
        <li><a href="#"><i class="material-icons">Logout</i></a></li>
      </ul>
    </div>
  </nav>
  <div class="row">
    <div class="col-12">
      <div class="input-field col-3">
          <label>Username:</label> <input type="text" name="username" id="username_search">
      </div>
      <div class="input-field col-3">
          <button class="btn yellow" onclick="load_list()">Search</button>
      </div>
      <div class="input-field col-3">
          <button class="btn yellow" onclick="export_student('user_list')"> Export</button>
      </div>
       <div class="input-field col-3">
         <a href="#"  class="btn teal modal-trigger" data-target="import_data"  >Upload Student Master List</a>
      </div>
      </div>
  </div>
  <div class="row">
  	<div clas="col-12">
  		<table class="centered" id="user_list">
  			<thead>
  				<th>#</th>
  				<th>Username</th>
  				<th>Role</th>
  			</thead>
  			<tbody id="users_data"></tbody>
  		</table>
  	</div>
  </div>
<script type="text/javascript" src="../node_modules/jquery/dist/jquery.min.js"></script>  
<script type="text/javascript" src="../node_modules/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="../node_modules/materialize-css/dist/js/materialize.min.js"></script>

<script type="text/javascript">
	
$(document).ready(function(){
	$('.modal').modal({
		inDuration: 300,
		outDuration: 200
	});

	load_list();
    


});


function create_student(){
	$('#render_modal').load('../forms/newdata.php');
}

function save (){
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var role = document.getElementById('role').value;
        $.ajax({
            url: '../process/processor.php',
            type: 'POST',
            cache: false,
            data:{
                method: 'add',
                username: username,
                password: password,
                role: role
            },success:function(response){
                // console.log(response);
                if(response == 'success') {
                    swal('SUCCESS', 'Data Saved', 'success');
                    $('.modal').modal('close','#new_data');
                    load_list();
                }else{
                    swal('FAILED', 'Data Not Saved', 'error');
                }
            }
        });

    }



  function load_list () {
    var username = document.getElementById('username_search').value;
            
            $.ajax({
                url: '../process/processor.php',
                type: 'POST',
                cache: false,
                data:{
                    method: 'fetch_data',
                    username:username
                },success:function(response){
                    // console.log(response);
                    document.getElementById('users_data').innerHTML = response;
               
                }
            });
        }

function edit_data (param){
	var data = param.split('~!~');
	var id = data[0];
	var username = data[1];
	var password = data[2];
	var role = data[3];

	$('#editID').val(id);
	$('#username_edit').val(username);
	$('#password_edit').val(password);
	$('#role_edit').val(role);
}


function update_value (){
	var id = document.getElementById('editID').value;
	var username = document.getElementById('username_edit').value;
	var password = document.getElementById('password_edit').value;
	var role = document.getElementById('role_edit').value;

	  $.ajax({
            url: '../process/processor.php',
            type: 'POST',
            cache: false,
            data:{
                method: 'update',
                id:id,
                username: username,
                password: password,
                role: role
            },success:function(response){
                // console.log(response);
                if(response == 'success') {
                    swal('SUCCESS', 'Data Saved', 'success');
                    load_list();
                    $('.modal').modal('close','#edit');
                }else{
                    swal('FAILED', 'Data Not Saved', 'error');
                }
            }
        });

}

function delete_value (){
	var id = document.getElementById('editID').value;

	  $.ajax({
            url: '../process/processor.php',
            type: 'POST',
            cache: false,
            data:{
                method: 'delete',
                id:id
            },success:function(response){
                // console.log(response);
                if(response == 'success') {
                    swal('SUCCESS', 'Data Saved', 'success');
                    load_list();
                    $('.modal').modal('close','#edit');
                }else{
                    swal('FAILED', 'Data Not Saved', 'error');
                }
            }
        });

}


  function export_student(table_id, separator = ',') {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(separator));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'Student_List'+ '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}



</script>






</body>
</html>