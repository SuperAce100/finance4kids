<?php
    // configuration
    require("../includes/config.php"); 
    
    $user_id = $_SESSION["id"];
    $rows = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $user_id);
    $positions = [];
    $user_rows = CS50::query("SELECT * FROM users WHERE id = ?", $user_id);
    $users = CS50::query("SELECT * FROM users WHERE inactive is null OR id = ?", $user_id);
    $user_portfolios =[];
    $user_data = [];
    $values =[];
    $result = [];
    $sub_result = [];
    $elite = false;

    $arr_size = count($user_rows);
    if($arr_size !== 1)
    {
        apologize("Failed to get user!");
    }
    else
    {
        $cash = $user_rows[0]["cash"];
    }
    
    $top_users = [];

    $i = 0;
    $stocks = [];
    $not = ["FREE", "DD", "DOW", "KATE", "YHOO", "USPS", "ETF", "APP", "VLKAY", "WFM", "VIP", "ADDYY", "PNRA", "MMEG", "ACBFF", "AERO", "AGSTF", "PIP", "RAI", "DSDYX", "FCBK", "BRK-B", "AAPC", "CNXR", "GBTC", "HH", "BTUUQ", "NTDOY", "DTEGY", "KITE"];
    $notDetails = [];
    foreach ($users as $user) {
        $id = $user["id"];
        $user_stocks = [];
        $user_portfolios = CS50::query("SELECT * FROM portfolios WHERE user_id = ?", $id);
        foreach ($user_portfolios as $stock) {

            $stocks[$stock["symbol"]] = 0;
            $user_stocks[$stock["symbol"]] = $stock["shares"];
            $user_original[$stock["symbol"]] = $stock["original_value"];
            //echo in_array($stock["symbol"], $not);
            // if (in_array($stock["symbol"], $not)) {
            //     echo $user["username"] . ", " . $stock["symbol"] . ", " . $stock["shares"] . ", " . $stock["original_value"] . ", " . $stock["shares"] * $stock["original_value"] . "<br>";

            // }
            $i++;
        }
        $user_data[$id] = [
            "id" => $id,
            "rank" => 0,
            "username" => $user["username"],
            "value" => $user["cash"],
            "user_stocks" => $user_stocks,
            "asterix" => "",
            "user_original" => $user_original
        ];
    }

    $symbols = "";
    foreach ($stocks as $key => $value) {
        if (!empty($symbols)) {
            $symbols = $symbols . ",";
        }
        $symbols = $symbols . $key;
        if (strlen($symbols) > 300) {
            $sub_result = allLookup($symbols);
            foreach ($sub_result as $key => $value) {
                $result[$key] = $value;
            }
            $symbols = "";
        }
    }

    if (strlen($symbols) > 0) {
        $sub_result = allLookup($symbols);
        foreach ($sub_result as $key => $value) {
            $result[$key] = $value;
        }
    }

    
    $notFound = [];
    
    foreach ($user_data as $entry) {
        $user_stocks = $entry["user_stocks"];
        $value = $entry["value"];
        foreach ($user_stocks as $user_stock => $shares) {
            if (array_key_exists($user_stock, $result) && $shares > 0) {
                $entry["value"] = $entry["value"] + $result[$user_stock] * $shares;
            }
            else {
                if (!array_key_exists($user_stock, $result)) {
                    $notFound[$user_stock] = 1;
                    $entry["value"] = $entry["value"] + $user_original[$user_stock];
                    $entry["asterix"] = "*";
                }
            }
        }
        $user_data[$entry["id"]]["value"] = $entry["value"];
        $user_data[$entry["id"]]["asterix"] = $entry["asterix"];
        $values[$entry["id"]] = $entry["value"];
    }

    foreach ($notFound as $key => $value) {
        //echo "\"" . $key . "\", ";
    }
    array_multisort($values, SORT_DESC, $user_data);
    $i = 1;

    foreach ($user_data as $key => $data) {
        $user_data[$key]["rank"] = $i;
        $i++;
    }

    $top_value = $user_data[0]["value"];

    foreach ($user_data as $user) {
        if ($user["username"] == $user_rows[0]["username"]) {
            if ($user["value"] >= 20000) {
                $elite = true;
            }
            else {
                break;
            }
            break;
        }
    }

    // render portfolio
    


    render("leaderboard.php", ["user_data" => $user_data, "cash" => $cash, "title" => "Leaderboard", "user" => $user_rows[0], "top_value" => $top_value, "elite" => $elite]);

?>