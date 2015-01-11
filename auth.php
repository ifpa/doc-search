<?php

session_start();

$db = array(
    'host' => 'us-cdbr-azure-east-b.cloudapp.net',
    'user' => 'bb58d56388d419',
    'pass' => '476efb27',
    'db'   => 'ifptestA6828riPu'
);

/*$db = array(
    'host' => 'j9da2374703898.db.2374703.hostedresource.com',
    'user' => 'j9da2374703898',
    'pass' => 'j9da2374703898',
    'db'   => 'Or.b+gqm*P3'
);*/

$db_handle = mysql_connect($db['host'], $db['user'], $db['pass']) or die('Unable to connect to database.');
$db_selected = mysql_select_db($db['db']) or die('Unable to select database.');
//$result = mysql_query("select distinct post_title from wp_m4bd52bsqk_posts where post_type='ifp_member' and post_status='publish'");
$result = mysql_query("select distinct post_title from wp_posts where post_type='ifp_member' and post_status='publish'");

while ($row = mysql_fetch_assoc($result)) {
    if ($_POST['email'] == $row['post_title']) {
        //$pwd_query = mysql_query("select option_value from wp_m4bd52bsqk_options where option_name = 'ifp_member_site_password'");
        $pwd_query = mysql_query("select option_value from wp_options where option_name = 'ifp_member_site_password'");
        while ($pwd_row = mysql_fetch_assoc($pwd_query)) {
            if ($_POST['password'] == $pwd_row['option_value']) {
                $_SESSION['logged_in'] = true;
            }
        }
    }
}

mysql_close($db_handle);

header('Location:http://104.131.60.233/pls.php');
die();