<?php

    // configuration
    require("../includes/config.php"); 
    
    $user_id = $_SESSION["id"];
    $footnote = false;
    $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $user_id);
    $positions = [];
    $user_rows = CS50::query("SELECT cash FROM users WHERE id = ?", $user_id);
    $arr_size = count($user_rows);
    if($arr_size !== 1)
    {
        apologize("Failed to get user!");
    }
    else
    {
        $cash = $user_rows[0]["cash"];
    }
    
    $total = $cash;

    $result = [];
    $symbols = "";
    foreach ($rows as $row) {
        if (!empty($symbols)) {
            $symbols = $symbols . ",";
        }
        $symbols = $symbols . $row["symbol"];
    }

    if (strlen($symbols) > 0) {
        $sub_result = allLookup($symbols);
        foreach ($sub_result as $key => $value) {
            $result[$key] = $value;
        }
    }

    
    //print($money.$user_id);
    foreach ($rows as $row)
    {
        // $stock = lookup($row["symbol"]);
        if (array_key_exists($row["symbol"], $result))
        {
            $positions[] = [
                "price" => $result[$row["symbol"]],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "original_value" => $row["original_value"],
                "asterix" => ""
            ];
            $total += $result[$row["symbol"]] * $row["shares"];
        }
        else
        {
            $positions[] = [
                "price" => $row["original_value"]/$row["shares"],
                "shares" => $row["shares"],
                "symbol" => $row["symbol"],
                "original_value" => $row["original_value"],
                "asterix" => "*"
            ];
            $footnote = true;
            $total += $row["original_value"];
        }
        
    }
    
    //print($user_rows[0]["cash"]);
    
    
    // render portfolio
    render("portfolio.php", ["positions" => $positions, "title" => "Portfolio", "cash" => $cash, "total" => $total, "footnote" => $footnote]);

?>
