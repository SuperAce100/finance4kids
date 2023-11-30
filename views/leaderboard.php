<center>
	<table id="leaderboard" class="display table table-striped">
	    <thead>
	    	<tr class="info">
	    		<th>RANK</th>
	    		<th>USERNAME</th>
	    		<!-- <th>TO 1<sup>st</sup> PLACE</th> -->
	    		<th>VALUE</th>
	    	</tr>
	    </thead>
	    <tbody>
			<?php foreach ($user_data as $position): ?>
				<tr class="<?= $user["username"] === $position["username"] ? $position["rank"] === 1 ? "me success" : "me warning" : "" ?><?= $elite ? "elite" : ""  ?>">
			        <td><?= $position["rank"] ?></td>
			        <td><?= $position["username"] ?><?= $user["username"] === $position["username"] ? " (Me)" : "" ?></td>
			        <!-- <td><?= $position["rank"] === 1 ? "First Place!" : '$'.number_format($top_value - $position["value"], 2, '.', ',')." behind 1<sup>st</sup> place!"?></td> -->
			        <td>$<?= $temp = ($position["value"] >= 20000) ? $elite ? number_format($position["value"], 2, '.', ',') : "$$ Elite Club" : number_format($position["value"], 2, '.', ','); ?><sup><?= $position["asterix"] ?></sup></td>
			    </tr>
			<?php endforeach ?>
			
			
	    </tbody>
	</table>
</center>
<script>
$(document).ready(function() {
    $('#leaderboard').DataTable( {
        "pagingType": "full_numbers"
    } );
    $('#leaderboard').DataTable().page.jumpToData( "<?= $user["username"] ?> (Me)", 1 );
} );
</script>

<small>
	<sup>*</sup> Since some stocks for these users are not on the market anymore, their value has been set to the buying price.
</small>
