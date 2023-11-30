<script>
	function validate()
	{
		var newPass = document.getElementById("new_password").value;
		var confirm = document.getElementById("confirmation").value;
		if(newPass == confirm)
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
<form action="profile.php" method="post" onsubmit="return validate()">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="old_password" id="old_password" placeholder="Old Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="new_password" id="new_password" placeholder="New Password" type="password"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="confirmation" id="confirmation" placeholder="New Password Again" type="password"/>
        </div>
        <div class="form-group">
            <button class="btn btn-warning" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-saved"></span>
                Change Password
            </button>
        </div>
    </fieldset>
</form>