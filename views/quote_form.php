<form class="form-inline" action="quote.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-info" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-stats"></span>
                Get Quote
            </button>
        </div>
    </fieldset>
</form>
<div id="cloud"></div>
<script type="text/javascript">
    $(function() {
        var words = [
          {text: "GOOG", weight: Math.floor(Math.random() * 10) + 17, link: "quote.php?symbol=GOOG"},
          {text: "AAPL", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=AAPL"},
          {text: "MSFT", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=MSFT"},
          {text: "AMZN", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=AMZN"},
          {text: "BABA", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=BABA"},
          {text: "BRK.A", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=BRK.A"},
          {text: "CRM", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=CRM"},
          {text: "TWX", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=TWX"},
          {text: "T", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=T"},
          {text: "CASH", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=BRK.A"},
          {text: "VAC", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=VAC"},
          {text: "MCD", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=MCD"},
          {text: "CMG", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=CMG"},
          {text: "DOW", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=DOW"},
          {text: "DAL", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=DAL"},
          {text: "BAC", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=BAC"},
          {text: "F", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=F"},
          {text: "TSLA", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=TSLA"},
          {text: "WMT", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=WMT"},
          {text: "XOM", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=XOM"},
          {text: "FB", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=FB"},
          {text: "TWTR", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=TWTR"},
          {text: "CVX", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=CVX"},
          {text: "DD", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=DD"},
          {text: "GM", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=GM"},
          {text: "GE", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=GE"},
          {text: "PSX", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=PSX"},
          {text: "CVS", weight: Math.floor(Math.random() * 20) + 7, link: "quote.php?symbol=CVS"},
  

          /* ... */
        ];
        $('#cloud').jQCloud(words, {
          autoResize: true
        });
    });
</script>