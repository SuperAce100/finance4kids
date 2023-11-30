<?php
	date_default_timezone_set('EST');
?>
<center>
	<table id="example" class="display table table-striped">
	    <thead>
	    	<tr class="danger">
	    		<th>TIME</th>
	    		<th>TRANSACTION</th>
	    		<th>SYMBOL</th>
	    		<th>SHARES</th>
	    		<th>PRICE</th>
	    		<th>AMOUNT</th>
	    	</tr>
	    </thead>
	    <tbody>
		    <?php foreach ($rows as $position):
		    $amount = $position["price"] * $position["shares"] ?>
				<tr>
			        <td><?= date("r"); ?></td>
			        <td><?= $position["type"] ?></td>
			        <td><?= $position["type"] == "cash" ? "" : $position["symbol"] ?></td>
			        <td><?= $position["type"] == "cash" ? "" : $position["shares"] ?></td>
			        <td><?= $position["type"] == "cash" ? "" : "$".number_format($position["price"], 4, '.', ',') ?></td>
			        <td><?= $position["type"] == "buy"? "-":"" ?>$<?= number_format($amount, 2, '.', ',') ?></td>
			    </tr>
			<?php endforeach ?>
			
	    </tbody>
	</table>
</center>