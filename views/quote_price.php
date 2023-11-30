<form class="form-inline" action="quote.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" value="<?= $symbol ?>" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-info" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-stats"></span>
                Get Quote
            </button>
        </div>
    </fieldset>
</form>

<h1><?= htmlspecialchars($name)?></h1>
<p class="lead">
	A share of <?= htmlspecialchars($name)?>(<?= htmlspecialchars($symbol)?>) costs <strong><big><big>$<?= htmlspecialchars($price)?></big></big></strong>
</p>

<!-- <h2>Buy Now!</h2> -->

<form class="form-inline" action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" value="<?= $symbol ?>" readonly placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-plus-sign"></span>
                Buy Now!
            </button>
        </div>
    </fieldset>
</form>
<br>
<br>
<div style="text-align: center;" class="lead">Cash Balance:  <b>$<?=number_format($cash, 2, '.', ',')?></b></div>
<br>
<!-- TradingView Widget BEGIN -->
<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
<script type="text/javascript">
new TradingView.widget({
  "width": 800,
  "height": 550,
  "symbol": "<?= $symbol ?>",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "White",
  "style": "3",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "hideideas": true
});
</script>
<!-- TradingView Widget END -->
<div class="row">
  <div class="col-md-6 col-md-offset-3 news">
    <h2>Company News</h2>
    <a href="https://www.google.com/finance/" target="_blank"><img src="https://www.google.com/finance/f/logo_material-4224265490.png" height="20px"></a>
    <div id="cnews"></div>
  </div>
</div>

<script type="text/javascript">
	$(function() {
		showNews("https://www.google.com/finance/company_news?q=<?= $symbol ?>&output=rss", "cnews");
		
	});
</script>