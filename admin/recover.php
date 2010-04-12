<?php

include 'includes/modules/welcomepage/config.php';
include 'includes/modules/welcomepage/opendb.php';

$id = $_GET['cID'];

if ($action == del){
    $delete = "DELETE FROM `customers_basket` WHERE `customers_id` = '$id'";
    $run = mysql_query($delete);
    echo 'Panier effac&eacute;<br><a href="customers.php">Retour</a>';
    }
    
else {

$query  = "SELECT * FROM `customers_basket` where `customers_id` = '$id'";
$result = mysql_query($query);

while($row = mysql_fetch_array($result)){
    $date = $row[customers_basket_date_added];

    $products = explode("{1}",$row[products_id]);
    
    echo '<b>' . $row[customers_basket_quantity] . '</b> x ';
    
    $query1  = "SELECT `products_name` FROM `products_description` WHERE `products_id` = $products[0]";
    $result1 = mysql_query($query1);
    $row1 = mysql_fetch_array($result1);
    echo $row1[products_name];
    
    $query1  = "SELECT `products_options_values_name` FROM `products_options_values` WHERE `products_options_values_id` = $products[1]";
    $result1 = mysql_query($query1);
    $row1 = mysql_fetch_array($result1);
    echo ' - <i>' . $row1[products_options_values_name] . '</i><br>';
}

    $chunk = chunk_split($date,4,"-");
    $explode = explode("-",$chunk);
    $year = $explode[0];
    $chunk = chunk_split($explode[1],2,"-");
    $explode = explode("-",$chunk);
    $month = $explode[0];
    $day = $explode[1];
    
    ?>
<br>
Panier cr&eacute;&eacute; <b><?php echo (date("l d F Y",mktime(0,0,0,$month,$day,$year))) ?></b><br>
<a href="?action=del&cID=<?php echo $id ?>">Vider le panier</a>

<?php
}
include 'includes/modules/welcomepage/closedb.php';
?>