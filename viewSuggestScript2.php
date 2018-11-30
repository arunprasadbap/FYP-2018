<?php

require 'db.php';

$suggestID = $_GET['suggest_id'];
$result = $mysqli->query("SELECT * FROM Suggestion WHERE id = '$suggestID'") or die($mysqli->error);

?>