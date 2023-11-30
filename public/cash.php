<?php

    // configuration
    require("../includes/config.php"); 
    
    $user_id = $_SESSION["id"];

 
	// if($_SERVER["REQUEST_METHOD"] == "POST")
	// {
    	
 //    	$add_cash = CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $_POST["cash"], $user_id);
 //    	$log_transaction = CS50::query("INSERT INTO transactions (user_id, symbol, shares, time, type, price) VALUES (?, '', 1, CURRENT_TIMESTAMP, 'cash', ?)", $user_id, $_POST["cash"]);
 //        redirect("index.php");
	// }
	
    // render sell
    render("cash_form.php", ["title" => "Add Cash"]);

	
?>