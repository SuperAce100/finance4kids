<?php
	require("../includes/config.php"); 
    
    $user_id = $_SESSION["id"];
    $rows = CS50::query("SELECT * FROM transactions WHERE user_id = ? ORDER BY time DESC", $user_id);
    $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $user_id);
    
    $money = $cash[0]["cash"];
    
    render("history_table.php", ["title" => "History", "rows" => $rows, "cash" => $money]);
?>