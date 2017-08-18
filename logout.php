<?php
session_start();
 
// Unset semua variable session.
$_SESSION = array();
 
//hancur kan semua session
session_destroy();
 
//alihkan ke halaman login
header('location: index.php');