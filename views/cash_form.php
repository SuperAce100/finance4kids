<script>
	function validate()
	{
		var cash = document.getElementById("cash").value;
		if(cash == "")
		{
			$("#passwordAlert").text("Enter a number!").fadeIn();
			// document.getElementById("passwordAlert").style.display="none !important";
			return false;
		}
		else if(isNaN(cash))
		{
			$("#passwordAlert").text("Enter a number!").fadeIn();
			// document.getElementById("passwordAlert").style.display="none !important";
			return false;
		}
		else if(cash > 10000)
		{
			$("#passwordAlert").text("Enter a number up to 10,000!").fadeIn();
			// document.getElementById("passwordAlert").style.display="none !important";
			return false;
		}
		else if(cash <= 0)
		{
			$("#passwordAlert").text("Enter a positive number").fadeIn();
			// document.getElementById("passwordAlert").style.display="none !important";
			return false;
		}
		else
		{
			$("#passwordAlert").text("").fadeOut();
			// document.getElementById("passwordAlert").style.display="block !important";
			return true;
		}
	}
</script>
<div class="alert alert-danger" <?php if(empty($validation_message)){?> style="display:none"<?php }?> role="alert" id="passwordAlert"><?= $validation_message?></div>
 
<form class="form-inline" action="cash.php" method="post" onsubmit="return validate()">
    <fieldset>
        <div class="form-group">
	        <div class="input-group">
		      <div class="input-group-addon">$</div>
		      <input type="text" class="form-control" id="cash" name="cash" placeholder="Amount">
		    </div>
        </div>
        
        <div class="form-group">
            <button class="btn btn-info" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-usd"></span>
                Add Cash
            </button>
        </div>
    </fieldset>
</form>