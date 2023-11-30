<?php
	require("../includes/config.php");
	if($_SESSION["id"] == 122)
	{
		if($_SERVER["REQUEST_METHOD"] == "POST")
		{
			if (!empty($_POST["hide"])) {
				$id = $_POST["hide"];
				CS50::query("UPDATE users SET inactive = true WHERE id = ?", $id);
			}
			if (!empty($_POST["show"])) {
				$id = $_POST["show"];
				CS50::query("UPDATE users SET inactive = null WHERE id = ?", $id);
			}
		}
		$usernames = CS50::query("SELECT inactive, id, username FROM users;");
		render("admin_disp.php", ["usernames" => $usernames, "title" => "Admin"]);
	}
?>