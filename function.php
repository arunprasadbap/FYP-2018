<?php 
function hash_password($password){
		$salt = sha1('@#$DSFT%T%YY%^U&U&@#$C');
		$pass = hash('sha512',$salt.$password); //SHA512 encrypted algorithm 
		return $pass;
}
?>