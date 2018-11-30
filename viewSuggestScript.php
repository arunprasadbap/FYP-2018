
<?php

require 'db.php';


$result = $mysqli->query("Select * FROM Suggestion ") or die($mysqli->error);

?>