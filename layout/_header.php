<?php
    session_start();

    if ($_SESSION['logged_in'] !== true && $_SERVER['PHP_SELF'] != '/index.php') {
        $_SESSION['show_error'] = true;
        header('Location:http://104.131.60.233/index.php');
        die();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Insurance Federation of PA Member's Area</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/theme.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>