<?php

session_start();

$_SESSION['logged_in'] = true;

/*if ($_POST['username'] != '' and $_POST['password'] != '') {
    $_SESSION['logged_in'] = true;
    $_SESSION['ifp'] = (strpos($_POST['username'], '@ifpenn.org') !== false) ? true : false;
}*/

header('Location:http://104.131.60.233/pls.php');
die();