<?php

	// configuration
    require("../includes/config.php");
    $validation_message = "";
    $user_id = $_SESSION["id"];
    $rows = CS50::query("SELECT * FROM users WHERE id = ?", $user_id);
    $user = $rows[0];
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
	    $old_pass = $_POST["old_password"];
	    $new_pass = $_POST["new_password"];
	    $pass = $user["hash"];
	    $hash = password_hash($new_pass, PASSWORD_DEFAULT);

    	if($_POST["new_password"] != $_POST["confirmation"])
	    {
	    	//apologize("Passwords do not match!");
	    	$validation_message = "Passwords do not match!";
	    }
	    else if(!password_verify($old_pass, $pass))
	    {
	    	// apologize("Incorrect Password!");
	    	$validation_message = "Incorrect Password!";
	    }
	    else
	    {
	    	$change_pass = CS50::query("UPDATE users SET hash = ? WHERE id = ?", $hash, $user_id);
	    	render("success.php", ["title" => "Success"]);
	    }
    }
    
    
    
    render("password.php", ["title" => "Change Password", "validation_message" => $validation_message]);
    
?>