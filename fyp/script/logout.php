<?php
session_start();
session_unset();
session_destroy(); 
echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Logout Successfull!')
    window.location.href='../index.php';
    </SCRIPT>");


?>