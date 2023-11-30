<?php

    // configuration
    require("../includes/config.php"); 
    
    $user_id = $_SESSION["id"];
    
    $user_rows = CS50::query("SELECT * FROM users WHERE id = ?", $user_id);
    $portfolio_rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $user_id);
     
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $symbol = strtoupper($_POST["symbol"]);
        $shares = $_POST["shares"];
        if ($shares < 0) {
            apologize("You have not entered positive shares!");
        }
        if ($shares != floor($shares))
        {
            apologize("Please enter a whole number");
        }
        $stock = lookup($symbol);
        if(!$stock)
        {
            apologize("That symbol does not exist!!!");
        }
        $price = $stock["price"] * $shares;
        if($user_rows[0]["cash"] < $price)
        {
            apologize("You don't have enough money!");
        }
        else if(preg_match("/^\d+$/", $_POST["shares"]) === FALSE)
        {
            apologize("Invalid shares!");
        }
        else
        {
            $insert_stock = CS50::query("INSERT INTO portfolios (user_id, symbol, shares, original_value) VALUES(?, ?, ?, ?) ON DUPLICATE KEY UPDATE shares = ? + shares, original_value = ? + original_value", $user_id, $symbol, $shares, $price, $shares, $price);
            $update_cash = CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $price, $user_id);
            $log_transaction = CS50::query("INSERT INTO transactions (user_id, symbol, shares, time, type, price) VALUES (?, ?, ?, CURRENT_TIMESTAMP, 'buy', ?)", $user_id, $symbol, $shares, $stock["price"]);
            redirect("index.php");
        }
    }
    // render buy
    render("buy_form.php", ["title" => "Buy", "cash" => $user_rows[0]["cash"]]);

	
?>