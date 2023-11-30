<script>
	function validate()
	{
		var user = document.getElementById("user").value;
		var pass = document.getElementById("pass").value;
		var confirm = document.getElementById("confirm").value;
		if(user == "")
		{
			$("#passwordAlert").text("Username empty!").fadeIn();
			// document.getElementById("passwordAlert").style.display="block !important";
			return false;
		}
		else if(pass == "")
		{
			$("#passwordAlert").text("Password empty!").fadeIn();
			// document.getElementById("passwordAlert").style.display="block !important";
			return false;
		}
		else if(pass == confirm)
		{
			$("#passwordAlert").text("").fadeOut();
			// document.getElementById("passwordAlert").style.display="none !important";
			return true;
		}
		else
		{
			$("#passwordAlert").text("Passwords do not match!").fadeIn();
			// document.getElementById("passwordAlert").style.display="block !important";
			return false;
		}
	}
</script>
<div class="alert alert-danger" <?php if(empty($validation_message)){?> style="display:none"<?php }?> role="alert" id="passwordAlert"><?= $validation_message?></div>
<form action="register.php" method="post" onsubmit="return validate()">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" maxlength="20" autofocus class="form-control" id="user" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" id="pass" placeholder="Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" id="confirm" placeholder="Password Again" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Register
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">login</a>
</div>
