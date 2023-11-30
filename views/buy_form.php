<p class="lead"></p>
<form class="form-inline" action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="shares" placeholder="Shares" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-plus-sign"></span>
                Buy
            </button>
        </div>
    </fieldset>
</form>
<br>
<br>
<div style="text-align: center;" class="lead">Cash Balance:  <b>$<?=number_format($cash, 2, '.', ',')?></b></div>