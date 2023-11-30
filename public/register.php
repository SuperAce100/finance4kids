<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($_POST["password"] != $_POST["confirmation"])
        {
            // apologize("Passwords do not match!");
	    	$validation_message = "Passwords do not match!";
	    	render("register_form.php", ["title" => "Register", "validation_message" => $validation_message]);
        }
        else if(empty($_POST["username"]) === TRUE)
        {
        	// apologize("No Username!");
        	$validation_message = "Username empty!";
        	render("register_form.php", ["title" => "Register", "validation_message" => $validation_message]);
        }
        else if(empty($_POST["password"]) === TRUE)
        {
        	// apologize("No Password!");
        	$validation_message = "Password empty!";
        	render("register_form.php", ["title" => "Register", "validation_message" => $validation_message]);
        	
        }
        else
        {

        	if(CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT)))
        	{
        	    //CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));
            	// query database for user
    			$rows = CS50::query("SELECT LAST_INSERT_ID() AS id");	
    	        // if we found user, check password
    	        if (count($rows) == 1)
    	        {
    				// first (and only) row
    				$row = $rows[0];
    				// remember that user's now logged in by storing user's ID in session
                    $_SESSION["id"] = $row["id"];
                    
    				$log_transaction = CS50::query("INSERT INTO transactions (user_id, symbol, shares, time, type, price) VALUES (?,'', 1, CURRENT_TIMESTAMP, 'cash', 10000)", $row["id"]);
                    

                    // redirect to portfolio
                    redirect("/index.php");
    	            
    	        }
    	        
        	}
        	else
        	{
        	    $validation_message = "That username already exists!";
        	    render("register_form.php", ["title" => "Register", "validation_message" => $validation_message]);
        	}
        	
        	
        	
        }
    }

?>