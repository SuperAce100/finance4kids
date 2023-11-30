<form class="form-inline" action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
        	<select class="form-control" name="symbol">
			    <?php foreach($rows as $row):?>
			    	<option>
			    		<?= htmlspecialchars($row["symbol"])?>
			    	</option>
			    <?php endforeach?>
			    
			</select>
        </div>
        <div class="form-group">
            <button class="btn btn-danger" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-minus-sign"></span>
                Sell
            </button>
        </div>
    </fieldset>
</form>