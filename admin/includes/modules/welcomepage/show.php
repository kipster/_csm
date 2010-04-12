<?php
include 'config.php';
include 'opendb.php';

$query = "SELECT content FROM welcome_page Where id=0";
$result = mysql_query($query);


$row = mysql_fetch_assoc($result);

$contents = $row['content'];

echo $contents;

include 'closedb.php';
?>