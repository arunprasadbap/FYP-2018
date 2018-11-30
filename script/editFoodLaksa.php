
<?php

require 'db.php';


$result = $mysqli->query("Select * FROM Laksa ") or die($mysqli->error);

?>