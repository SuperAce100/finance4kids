<div class="row">
	<div class="col-md-6 news">
		<h2>Investing Basics</h2>
		<a href="http://www.nasdaq.com/" target="_blank"><img height="20px" src="http://business.nasdaq.com/media/Nasdaqlogo_homepage_tcm5044-15630.png"></a>
		<div id="newsBSIC"></div>
	</div>
	<div class="col-md-6 news">
		<h2>Stocks</h2>
		<a href="http://www.nasdaq.com/" target="_blank"><img height="20px" src="http://business.nasdaq.com/media/Nasdaqlogo_homepage_tcm5044-15630.png"></a>
		<div id="newsSTCK"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 news">
		<h2>Investing Ideas</h2>
		<a href="http://www.nasdaq.com/" target="_blank"><img height="20px" src="http://business.nasdaq.com/media/Nasdaqlogo_homepage_tcm5044-15630.png"></a>
		<div id="newsIDEA"></div>
	</div>
	<div class="col-md-6 news">
		<h2>Economy</h2>
		<a href="http://www.nasdaq.com/" target="_blank"><img height="20px" src="http://business.nasdaq.com/media/Nasdaqlogo_homepage_tcm5044-15630.png"></a>
		<div id="newsECON"></div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 news">
		<h2>Google Finance News</h2>
		<a href="https://www.google.com/finance/" target="_blank"><img src="https://www.google.com/finance/f/logo_material-4224265490.png" height="20px"></a>
		<div id="newsFIN"></div>
	</div>
	<div class="col-md-6 news">
		<h2>Options</h2>
		<a href="http://www.nasdaq.com/" target="_blank"><img height="20px" src="http://business.nasdaq.com/media/Nasdaqlogo_homepage_tcm5044-15630.png"></a>
		<div id="newsOPT"></div>
	</div>
	<!-- <div class="col-md-6 news">
		<h2>Business News</h2>
		<a href="https://washingtonpost.com" target="_blank"><img src="https://img.washingtonpost.com/pb/resources/img/twp-masthead-415x57.svg" height="20px"></a>
		<div id="newsBN"></div>
	</div> -->
</div>


<script type="text/javascript">
    $(function() {
        // showNews("http://feeds.washingtonpost.com/rss/business", "newsBN");
        showNews("https://www.google.com/finance/company_news?q=top+stories&output=rss", "newsFIN");
        showNews("http://articlefeeds.nasdaq.com/nasdaq/categories?category=Basics", "newsBSIC");
        showNews("http://articlefeeds.nasdaq.com/nasdaq/categories?category=Investing+Ideas", "newsIDEA");
        showNews("http://articlefeeds.nasdaq.com/nasdaq/categories?category=Economy", "newsECON");
        showNews("http://articlefeeds.nasdaq.com/nasdaq/categories?category=Stocks", "newsSTCK");
        showNews("http://articlefeeds.nasdaq.com/nasdaq/categories?category=Options", "newsOPT");
    });
</script>

<!-- Google Finance Markets Chart -->
<!-- <h2>Charts</h2>
<img src="https://www.google.com/finance/chart?cht=c&q=INDEXDJX:.DJI,INDEXSP:.INX,INDEXNASDAQ:.IXIC&tlf=24h">

<div style="color:#4582e7">Dow Jones</div>
<div style="color:#dc3912">S&P 500</div>
<div style="color:#f7a10a">Nasdaq</div>
<br> -->

