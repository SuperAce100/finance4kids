<?php

    require(__DIR__ . "/../includes/config.php");

    // ensure proper usage
    if (empty($_GET["symbol"]))
    {
        http_response_code(400);
        exit;
    }

    // get symbol's articles
    $articles = news($_GET["symbol"]);

    // output articles as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($articles, JSON_PRETTY_PRINT));

?>