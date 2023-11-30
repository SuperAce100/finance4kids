<table id="example" class="display table table-striped">
	<thead>
		<tr class="info">
			<th>REMOVE?</th>
			<th>NAME</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($usernames as $username): ?>
			<tr>
				<td>
					<div class="form-group">
						<form action="admin.php" method="post">
							<button name="<?= $username["inactive"] == true ? 'show' : 'hide'?>" value="<?= $username["id"] ?>" class="btn btn-<?= $username["inactive"] == true ? 'success' : 'danger'?> btn-xs"><?= $username["inactive"] == true ? 'Show' : 'Hide'?></button>
						</form>
					</div>
				</td>
				<td>
					<?= $username["username"] ?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>