

<div class="modal bottom-sheet" id="edit" style="min-height: 90vh;">
	<div class="modal-footer">
        <button class="modal-close btn-flat" style="font-size:30px;color:#f55353;">
            <b>&times;</b>
        </button>
    </div>
	<div class="modal-content">
		<fieldset style="border:3px solid teal;">
    <legend><h4>Edit Data</h4></legend>
		
		<div class="row">
			<div class="col m12">
					 
					 	 
			
					 	<input type="text" name="" id="editID" >
	

 	<div class="input-field col m4 ">
 	 <span for="username_edit">Username</span>
 	<input type="text" name="" id="username_edit" >
	</div>

 	<div class="input-field col m4 ">
 	 <span for="password_edit">Password</span>
 	<input type="password" name="" id="password_edit" >
	</div>

	<div class="input-field col m4 ">
 	 <span for="role_edit">Role</span>
 	<input type="text" name="" id="role_edit" >
	</div>
		
						<div class="col m6">
				<button class="btn col m3 #006064 cyan darken-3" onclick="update_value()">update</button>
			</div>	
			<div class="col m6">
				<button class="btn col m3 #006064 cyan darken-3" onclick="delete_value()">delete</button>
			</div>	
				</div>		
			</div>
			
		</div>
</div>

</fieldset>
