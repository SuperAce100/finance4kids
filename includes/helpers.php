<?php

    /**
     * helpers.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Helper functions.
     */

    require_once("config.php");

    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }

    /**
     * Facilitates debugging by dumping contents of argument(s)
     * to browser.
     */
    function dump()
    {
        $arguments = func_get_args();
        require("../views/dump.php");
        exit;
    }

    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }

    /**
     * Returns a stock by symbol (case-insensitively) else false if not found.
     */
    function lookup($symbol)
    {
        // reject symbols that start with ^,
        if (preg_match("/^\^/", $symbol))
        {
            return false;
        }

        // reject symbols that contain commas
        if (preg_match("/,/", $symbol))
        {
            return false;
        }

        // headers for proxy servers
        $headers = [
            "Accept" => "*/*",
            "Connection" => "Keep-Alive",
            "User-Agent" => sprintf("curl/%s", curl_version()["version"])
        ];

        // open connection to iex
        $context = stream_context_create([
            "http" => [
                "header" => implode(array_map(function($value, $key) { return sprintf("%s: %s\r\n", $key, $value); }, $headers, array_keys($headers))),
                "method" => "GET"
            ]
        ]);
        try {
            $url = sprintf('https://api.iextrading.com/1.0/stock/%s/quote', $symbol);

            if(get_http_response_code($url) != "200"){
                return false;
            }
            else{
                $response = file_get_contents($url);
                $response = json_decode($response);
            }

            
        } catch (Exception $e) {
            return false;
        }
        // // download first line of CSV file
        // $data = fgetcsv($handle);
        // if ($data === false || count($data) == 1)
        // {
        //     return false;
        // }

        // // close connection to Yahoo
        // fclose($handle);

        // ensure symbol was found
        // if ($data[2] === "N/A" || $data[2] === "0.00")
        // {
        //     return false;
        // }

        // return stock as an associative array
        return [
            "symbol" => strtoupper($response->{'symbol'}),
            "name" => $response->{'companyName'},
            "price" => floatval($response->{'latestPrice'})
        ];
    }

    function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }

    /**
     * Returns a stock by symbol (case-insensitively) else false if not found.
     */
    function allLookup($symbol)
    {
        // reject symbols that start with ^
        if (preg_match("/^\^/", $symbol))
        {
            return false;
        }


        // headers for proxy servers
        $headers = [
            "Accept" => "*/*",
            "Connection" => "Keep-Alive",
            "User-Agent" => sprintf("curl/%s", curl_version()["version"])
        ];

        // open connection to Yahoo
        $context = stream_context_create([
            "http" => [
                "header" => implode(array_map(function($value, $key) { return sprintf("%s: %s\r\n", $key, $value); }, $headers, array_keys($headers))),
                "method" => "GET"
            ]
        ]);
        

        try {
            $url = sprintf('https://api.iextrading.com/1.0/stock/market/batch?symbols=%s&types=price', $symbol);

            if(get_http_response_code($url) != "200"){
                return false;
            }
            else{
                $response = file_get_contents($url);
                $response = json_decode($response);
            }

            
        } catch (Exception $e) {
            return false;
        }
        $result = [];
        foreach ($response as $key => $value) {
            //$value = $response->{$key};
            $t = $value->{'price'};
            if ($t !== null && $t !== FALSE) {
                $result[strtoupper($key)] = floatval($t);
            }
        }

        // $handle = @fopen("http://download.finance.yahoo.com/d/quotes.csv?f=sl1&s={$symbol},GOOG", "r", false, $context);
        // if ($handle === false)
        // {
        //     // trigger (big, orange) error
        //     trigger_error("Could not connect to Yahoo!", E_USER_ERROR);
        //     exit;
        // }
        // $result = [];
        // $data = fgetcsv($handle);
        // $i = 0;
        // while ($i < count(explode(",",$symbol))) {
        //     if ($data !== null && $data !== FALSE && count($data) == 2 && $data[1] !== "N/A" && $data[1] !== "0.00") {
        //         $result[strtoupper($data[0])] = floatval($data[1]);
        //     }
        //     $data = fgetcsv($handle);
        //     $i++;
        // }

        
        // // close connection to Yahoo
        // fclose($handle);


        // return stock as an associative array
        return $result;
    }


    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     *
     * http://stackoverflow.com/a/25643550/5156190
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }

    /**
     * Renders view, passing in values.
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            
            if (!empty($_SESSION)) {
                $user_id = $_SESSION["id"];

                $user = CS50::query("SELECT username FROM users WHERE id = ?", $user_id);
                $username = $user[0];
                extract($username);
            }
            
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }


    function news($symbol)
    {
        // enable $_SESSION
        @session_start();

        // if this geo was cached
        if (isset($_SESSION["cache"], $_SESSION["cache"][$symbol]))
        {
            // within the past hour
            if (time() < $_SESSION["cache"][$symbol]["timestamp"] + 60 * 60)
            {
                // return cached articles
                return $_SESSION["cache"][$symbol]["articles"];
            }
        }

        // (soon-to-be numerically indexed) array of articles
        $articles = [];
        
        // headers for proxy servers
        $headers = [
            "Accept" => "*/*",
            "Connection" => "Keep-Alive",
            "User-Agent" => sprintf("curl/%s", curl_version()["version"])
        ];
        $context = stream_context_create([
            "http" => [
                "header" => implode(array_map(function($value, $key) { return sprintf("%s: %s\r\n", $key, $value); }, $headers, array_keys($headers))),
                "method" => "GET"
            ]
        ]);

        // download RSS from Google News if possible
        $contents = @file_get_contents($symbol , false, $context);
        if ($contents !== false)
        {
            // parse RSS
            $rss = @simplexml_load_string($contents);
            if ($rss !== false)
            {
                // iterate over items in channel
                $i = 0;
                foreach ($rss->channel->item as $item)
                {
                    if ($i >= 10) {
                        break;
                    }
                    $i++;
                    // add article to array
                    $articles[] = [
                        "link" => (string) $item->link,
                        "title" => (string) $item->title
                    ];
                }

                // cache articles
                if (!isset($_SESSION["cache"]))
                {
                    $_SESSION["cache"] = [];
                }
                $_SESSION["cache"][$_GET["symbol"]] = [
                    "articles" => $articles,
                    "timestamp" => time()
                ];
            }
        }

        // else from the Onion
        // else
        // {
        //     $contents = @file_get_contents("http://www.theonion.com/feeds/rss", false, $context);
        //     if ($contents !== false)
        //     {
        //         // parse RSS
        //         $rss = @simplexml_load_string($contents);
        //         if ($rss !== false)
        //         {
        //             // iterate over items in channel
        //             foreach ($rss->channel->item as $item)
        //             {
        //                 // add article to array
        //                 $articles[] = [
        //                     "link" => (string) $item->link,
        //                     "title" => (string) $item->title
        //                 ];
        //             }
        //         }
        //     }
        // }

        return $articles;
    }
?>
