<fieldset style="border:3px solid teal;">
    <legend><h4>Register Student</h4></legend>

<div class="col l12 m12 s12">
  
    <div class="input-field col l4 m4 s12">
        <input type="text" id="username" placeholder="Username" autocomplete="OFF">
    </div>

  
    <div class="input-field col l4 m4 s12">
        <input type="password" id="password" placeholder="Password" autocomplete="OFF">
    </div>

    <div class="input-field col l4 m4 s12">
        <input type="text" id="role" placeholder="Role" autocomplete="OFF">
    </div>
   

    <div class="row col s12">
        <div class="input-field col l4 m4 s12">
            <button class="btn teal lighten-2 col s12" onclick="save()" id="planBtnCreate">submit</button>
        </div>

        <div class="input-field col l4 m4 s12">
            <p id="status_create" style="font-weight:bold;color:red;"></p>
        </div>
        <!-- LOADER -->
        <div class="col s12">
            <div class="progress" id="loader" style="display:none;">
                <div class="indeterminate #263238 blue-grey darken-4"></div>
            </div>
        </div>
    </div>
</div>

</fieldset>
