<?php

    // configuration
    require("../includes/config.php");
    $user_id = $_SESSION["id"];
    $rows = CS50::query("SELECT * FROM users WHERE id = ?", $user_id);
    $cash = $rows[0]["cash"];
    $symbol = "";
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        if (empty($_GET["symbol"]))
        {
            render("quote_form.php", ["title" => "Quote"]);
            exit;
        }    
        else {
            $symbol = $_GET["symbol"];
        }
    }
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		$symbol = $_POST["symbol"];
    }
    $stock = lookup($symbol);
    if($stock === FALSE)
    {
        apologize("That symbol does not exist!<br><a href='quote.php'>Try Again!</a>");
    }
    else
    {
        //print($stock["symbol"]);
        render("quote_price.php", ["title" => "Quote", "symbol" => $stock["symbol"], "price" => $stock["price"], "name" => $stock["name"], "cash" => $cash]);
    }

?>