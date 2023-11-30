<?php

    // configuration
    require("../includes/config.php"); 
    
    $user_id = $_SESSION["id"];
    //echo $user_id;
    $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $user_id);
    //$stocks = [];
    if(count($rows) === 0)
    {
        apologize("You don't own anything!");
    }
	$symbol = "";
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        if (!empty($_GET["symbol"]))
        {
            $symbol = $_GET["symbol"];
        }
    }
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $symbol = $_POST["symbol"];
    }
    if(!empty($symbol))
	{
    	$stock = lookup($symbol);
        //echo $symbol;
    	$symbol_rows = CS50::query("SELECT * FROM portfolios WHERE symbol = ? AND user_id = ?", $symbol, $user_id);
        //echo $symbol_rows[0]["original_value"];
        $shares = $symbol_rows[0]["shares"];
    	if ($stock === false) {
            $value = $symbol_rows[0]["original_value"];
            $price = $value / $shares;
        }
        else {
            $value = $stock["price"] * $shares;
            $price = $stock["price"];
        }
        //echo $price*10;
    	$remove_stock = CS50::query("DELETE FROM portfolios WHERE user_id = ? AND symbol = ?", $user_id, $symbol);
    	$add_cash = CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $value, $user_id);
    	$log_transaction = CS50::query("INSERT INTO transactions (user_id, symbol, shares, time, type, price) VALUES (?, ?, ?, CURRENT_TIMESTAMP, 'sell', ?)", $user_id, $symbol, $shares, $price);
        redirect("index.php");
        
	}
	
    // render sell
    render("sell_form.php", ["title" => "Sell", "rows" => $rows]);

	
?>