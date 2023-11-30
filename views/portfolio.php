<center>
	<p class="lead">Welcome to the world of investing in stocks! You will start with $10,000 pretend money, and will invest in the stocks you find most profitable. You will need to invest wisely, however, to stay at the top of the leaderboard. Below is your portfolio and a link to your first step:</p>
	<a class="btn btn-info btn-lg" href="quote.php" role="button"><span aria-hidden="true" class="glyphicon glyphicon-briefcase"></span> Let's Go!</a>
	<br>
	<br>

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
	<br>
	<br>
	<table class = "table table-striped">
	    <thead>
	    	<tr class="info">
	    		<!-- <th>NAME</th> -->
	    		<th>SYMBOL</th>
	    		<th>SHARES</th>
	    		<th>PRICE</th>
	    		<th>$ SPENT</th>
	    		<th>VALUE</th>
	    		<th></th>
	    	</tr>
	    </thead>
	    <tbody>
		    <?php foreach ($positions as $position): ?>
				<tr>
			        <!-- <td><?= $position["name"] ?></td> -->
			        <td><?= $position["symbol"] ?><sup><?= $position["asterix"] ?></sup></td>
			        <td><?= $position["shares"] ?></td>
			        <td><?= number_format($position["price"], 4, '.', ',') ?></td>
			        <td>$<?= number_format($position["original_value"], 2, '.', ',') ?></td>
			        <td>$<?= number_format($position["price"] * $position["shares"], 2, '.', ',')  ?> <span class="text-<?= round($position["original_value"], 2) < round($position["price"] * $position["shares"], 2) ? "success arrow-up" : (round($position["original_value"], 2) == round($position["price"] * $position["shares"], 2) ? "" : "danger arrow-down") ?>"></span></td>
			        <td>
			        	<a href="quote.php?symbol=<?= $position["symbol"] ?>"><button style="width: 100%" type="button" class="btn btn-success btn-xs">Buy More Shares</button></a>
			        	<br>
 						<button onclick="sell('<?= $position["symbol"] ?>')" style="width: 100%; margin-top: 4px" type="button" class="btn btn-danger btn-xs">Sell All Shares</button>
 					</td>
			    </tr>
			<?php endforeach ?>
			<tr>
				<td colspan="5"><b>Cash Balance:</b></td>
				<td><b>$<?=number_format($cash, 2, '.', ',')?></b></td>
				<td></td>
			</tr>
			<tr class="<?= round($total, 2) >= 10000 ? "success" : "danger" ?>">
				<td colspan="5"><b>Total Value:</b></td>
				<td><big><b class="text-<?= round($total, 2) >= 10000 ? "success" : "danger" ?>">$<?=number_format($total, 2, '.', ',')?></b></big></td>
				<td></td> 
			</tr>
	    </tbody>
	</table>
	<?php if($footnote): ?>
	<small>
		<sup>*</sup> Since these stocks are not on the market anymore, their value has been set to your buying price.
	</small>
	<br>
	<br>
	<?php endif ?>

	<?php if (count($positions) !== 0): ?>
		<!-- TradingView Widget BEGIN -->
		<script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
		<script type="text/javascript">
		new TradingView.widget({
			"width": 998,
			"height": 610,
			"symbol": "<?= $positions[0]["symbol"] ?>",
			"interval": "D",
			"timezone": "exchange",
			"theme": "White",
			"style": "3",
			"toolbar_bg": "#f1f3f6",
			"withdateranges": true,
			"allow_symbol_change": true,
			"save_image": false,
			"watchlist": [ <?php foreach ($positions as $position): ?>"<?= $position["symbol"] ?>", <?php endforeach ?> ],
			"hideideas": true
		});
	</script>
<!-- TradingView Widget END -->
	<?php endif ?>
	
</center>
