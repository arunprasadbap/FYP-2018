<?php

require 'db.php';

$the_item = $_GET['product_id'];

$edit = $mysqli->query("SELECT * FROM Laksa WHERE id='$the_item'") or die($mysqli->error);



?>