<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>
        
        <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Finance 4 Kids: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Finance 4 Kids</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        
        
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.16/api/page.jumpToData().js"></script>

        <script src="/js/scripts.js?v1"></script>

        <script src="bower_components/jqcloud2/dist/jqcloud.min.js"></script>

        <link rel="stylesheet" href="bower_components/jqcloud2/dist/jqcloud.min.css">

        <link href="https://fonts.googleapis.com/css?family=Caveat|Open+Sans:300,400,700|PT+Serif" rel="stylesheet">

        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-90676475-1', 'auto');
          ga('send', 'pageview');

        </script>

    </head>

    <body>
        <div class="container">

            <div id="top">
                <div class="logo">
                    <a href="/"><img alt="Finance 4 Kids" src="/img/logo.png"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): 
                    $url = $_SERVER["REQUEST_URI"];

                ?>
                    <ul class="nav nav-pills nav-justified">
                        <li class="<?= (strpos($url, '.php') === false || strpos($url, 'index.php') !== false)  ? 'active' : ''?>"><a class="text-success" href="index.php"><span aria-hidden="true" class="glyphicon glyphicon-home"></span> Home</a></li>

                        <li class="<?= (strpos($url, 'leaders.php') !== false) ? 'active' : ''?>"><a href="leaders.php"><span aria-hidden="true" class="glyphicon glyphicon-fire"></span> Leaderboard</a></li>

                        

                        <li class="<?= (strpos($url, 'research.php') !== false) ? 'active' : ''?>"><a href="research.php"><span aria-hidden="true" class="glyphicon glyphicon-book"></span> News</a></li>

                        <li role="presentation" class="dropdown <?= (strpos($url, 'buy.php') !== false || strpos($url, 'sell.php') !== false) ? 'active' : ''?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              <span aria-hidden="true" class="glyphicon glyphicon-transfer"></span> Buy/Sell <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="<?= (strpos($url, 'quote.php') !== false) ? 'active' : ''?>"><a href="quote.php"><span aria-hidden="true" class="glyphicon glyphicon-stats"></span> Quote</a></li>
                                
                                <li class="<?= (strpos($url, 'buy.php') !== false) ? 'active' : ''?>"><a href="quote.php"><span aria-hidden="true" class="glyphicon glyphicon-plus-sign"></span> Buy</a></li>

                                <li class="<?= (strpos($url, 'sell.php') !== false) ? 'active' : ''?>"><a href="sell.php"><span aria-hidden="true" class="glyphicon glyphicon-minus-sign"></span> Sell</a></li>
                            </ul>
                        </li>

                        

                        <li class="<?= (strpos($url, 'about.php') !== false) ? 'active' : ''?>"><a href="about.php"><span aria-hidden="true" class="glyphicon glyphicon-info-sign"></span> About</a></li>

                        
                        <li role="presentation" class="dropdown <?= (strpos($url, 'history.php') !== false || strpos($url, 'profile.php') !== false || strpos($url, 'logout.php') !== false) ? 'active' : ''?>">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              <span aria-hidden="true" class="glyphicon glyphicon-user"></span> <?= $username ?> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <?php if ($_SESSION["id"] == 122): ?>
                                    <li class="<?= (strpos($url, 'admin.php') !== false) ? 'active' : ''?>"><a href="admin.php"><strong class="text-success"><span aria-hidden="true" class="glyphicon glyphicon-lock"></span> Admin</strong></a></li>
                                <?php endif ?>

                                <li class="<?= (strpos($url, 'history.php') !== false) ? 'active' : ''?>"><a href="history.php"><span aria-hidden="true" class="glyphicon glyphicon-time"></span> History</a></li>

                                <li class="<?= (strpos($url, 'profile.php') !== false) ? 'active' : ''?>"><a href="profile.php"><span aria-hidden="true" class="glyphicon glyphicon-lock"></span> Change Password</a></li>

                                <li class="<?= (strpos($url, 'logout.php') !== false) ? 'active' : ''?>"><a href="logout.php"><strong class="text-danger"><span aria-hidden="true" class="glyphicon glyphicon-log-out"></span> Log Out</strong></a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif ?>

                <!-- Start TC2000 widget -->
                <iframe width="100%" noresize="noresize" scrolling="no" height="20" frameborder="0" src="https://widgets.tc2000.com/WidgetServer.ashx?id=34301"></iframe>
                <!-- END TC2000 Widget -->

            </div>

            <div id="middle">
