<?php

include 'admin/includes/modules/welcomepage/config.php';
include 'admin/includes/modules/welcomepage/opendb.php';

mysql_select_db($mysql);

if ($page == "des"){
    
    $query  = "SELECT * FROM `customers` where `customers_email_address` = '$email'";
    $result = mysql_query($query);

    $row = mysql_fetch_assoc($result);
    $email1 = $row['customers_email_address'];
    
    if ($email == $email1) {  
    $query  = "UPDATE `customers` SET `customers_newsletter` = '' WHERE `customers_email_address` = '$email' LIMIT 1;";
    $result = mysql_query($query);}
    else {
    
    $delete = "DELETE FROM `customers_news` WHERE CONVERT( `email` USING utf8 ) = '$email' LIMIT 1";
    mysql_query($delete) or die('Error, delete failed');}
    }

if ($page == "news"){
    $query  = "SELECT * FROM `customers` where `customers_email_address` = '$email'";
    $result = mysql_query($query);

    $row = mysql_fetch_assoc($result);
    $email1 = $row['customers_email_address'];
    $name = $row['customers_firstname'];
    
    if ($email == $email1) {  
    $query  = "UPDATE `customers` SET `customers_newsletter` = '1' WHERE `customers_email_address` = '$email' LIMIT 1;";
    $result = mysql_query($query);
    echo  "Bonjour " . $name ."<br>Vous etes d&eacute;j&agrave inscrit, votre option newsletter a &eacute;t&eacute; mis &agrave jour.<br><a href=\"account.php\"><b>Vous pouvez modifiez les options de votre compte en cliquant ici.</a></b>";
    }
    else {
    $query2  = "SELECT * FROM `customers_news` where `email` = '$email'";
    $result2 = mysql_query($query2);
    $row = mysql_fetch_assoc($result2);
    $email2 = $row['email'];
    
    if (empty($email2)) {$insert = "INSERT INTO `customers_news` ( `name` , `email` ) VALUES ('$name', '$email')";
    mysql_query($insert) or die('Error, insertion failed');  
    }
    echo "Merci de votre int&eacute;r&ecirc;t pour nos produits, nous vous tiendrons inform&eacute;.<br><br><i>Toute l'&eacute;quipe de coudresurmesure.fr</i>";
    }
    }

if ($page == "2009_12"){

    $answer = 'Merci de votre int&eacute;r&ecirc;t pour notre concours, vous &ecirc;tes bien inscrite, nous attendons avec impatience votre photo.<br><br><i>Toute l\'&eacute;quipe de coudresurmesure.fr</i>';

    $query  = "SELECT * FROM `2009_12` where `email` = '$email'";
    $result = mysql_query($query);

    $row = mysql_fetch_assoc($result);
    $email1 = $row['email'];
    
    if ($email == $email1) {  
        echo  "Bonjour " . $name ."<br><br>Vous &ecirc;tes d&eacute;j&agrave inscrite, vous pouvez maintenant envoyer votre image <a href=\"2009_12_u.php\">en cliquant ici.</a>";
    }
    
    else {
        $insert = "INSERT INTO `2009_12` ( `name` , `email` , `adresse1` , `adresse2` , `cp` , `ville` , `hauteur` , `poitrine` , `taille` , `hanche` , `check` ) VALUES ('$name', '$email', '$adresse1', '$adresse2', '$cp', '$ville', '$hauteur', '$poitrine', '$taille', '$hanche', '$check');";
        mysql_query($insert) or die('Error, insertion failed');  
        
        if ($check == 'on') {    
            // Message to us
            $to = 'info@coudresurmesure.fr';
            $headers = 'From: "' . $name . '" <' . $email . '>' . "\n";
            $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
            $headers .='Content-Transfer-Encoding: 8bit'; 
            $subject = 'Par lettre - Inscription pour le "Super Challenge" de Noel 2009';
            $message = '<html><head></head><body>Bonjour<br><br>Veuillez m\'envoyer un patron par lettre.<br><br><b>';
            $message .= $name . '</b><br>' . $adresse1 . '<br>' . $adresse2 . '<br>' . $cp . '&nbsp;' . $ville . '<br><br>'; 
            $message .= 'Voici mes mensurations:<br><br><b>Hauteur :</b> ' . $hauteur . '<br><b>Tour de poitrine :</b> ' . $poitrine . '<br><b>Tour de taille :</b> ' . $taille . '<br><b>Tour de hanches :</b> ' . $hanche;
            $message .= '<br><br>En vous remerciant,<br><br>' . $name;
            $message .= '</body></html>';
            
            if (mail ($to,$subject,$message,$headers)){
                echo $answer;
            }
            else {
                echo 'Oupss, il y a eu un probleme, veuillez reeasyer plus tard.';
            }
        }
        else {
            echo $answer;
        }
    }
}

if ($page == "2009_12_u"){

    $query  = "SELECT * FROM `2009_12` where `email` = '$email'";
    $result = mysql_query($query);

    $row = mysql_fetch_assoc($result);
    $email1 = $row['email'];
    
    if ($email == $email1) {  
        $query  = "UPDATE `2009_12` SET `upload` = '1', `name` = '$name', `file_name` = '$file_name' WHERE `email` = '$email' LIMIT 1;";
        $result = mysql_query($query);

    }
    
    else {
        $insert = "INSERT INTO `2009_12` ( `name` , `email`, `upload`, `file_name`) VALUES ('$name', '$email', '1','$file_name');";
        mysql_query($insert) or die('Error, insertion failed');
    }
}

if ($page == "2009_12_gallery"){
    
    $t = time();
    $t2 = $t + 86400;    
    $ip=@$REMOTE_ADDR;
    
    $query  = "SELECT * FROM `vote` where `ip` = '$ip'";
    $result = mysql_query($query);
    
    $row = mysql_fetch_assoc($result);
    
    if (isset($row['ip'])){
        $d = $row['day'];
        if ($t < $d){
            echo '<p style="color: red; font-weight: bold; border-style: solid; border-color: red;">D&eacute;sol&eacute;, vous ne pouvez voter qu\'une fois par tranche de 24h.<br>Merci.</p>';        
        }
        else {
            $update  = "UPDATE `vote` SET `day` = '$t2' WHERE `ip` = '$ip' LIMIT 1;";
            $result = mysql_query($update) or die('Error, update failed');
            $vote = 'yes';
        }
    }
    
    else {
        $insert = "INSERT INTO `vote` ( `ip` , `day`) VALUES ('$ip', '$t2');";
        mysql_query($insert) or die('Error, insertion failed');
        $vote = 'yes';
    }
        
    
    if ($vote == 'yes'){
        //Query 1 - Update the vote for the selected item
        $query  = "SELECT * FROM `2009_12_poll` where `Tenue` = '$tenue'";
        $result = mysql_query($query);
        
        $row = mysql_fetch_assoc($result);
        $count = $row['Count'];
        
        $count++;
        
        $update = "UPDATE `2009_12_poll` SET `count` = '$count' WHERE `Tenue` = '$tenue' LIMIT 1;";
        mysql_query($update) or die('Error, Update failed');
        
        //Query 2 - Update the total
        $query  = "SELECT * FROM `2009_12_poll` where `Tenue` = 'Total'";
        $result = mysql_query($query);
        
        $row = mysql_fetch_assoc($result);
        $count = $row['Count'];
        
        $count++;
        
        $update = "UPDATE `2009_12_poll` SET `count` = '$count' WHERE `Tenue` = 'Total' LIMIT 1;";
        mysql_query($update) or die('Error, Update failed');
    }
    
    //Query 3 - Get total
    $query  = "SELECT * FROM `2009_12_poll` where `Tenue` = 'Total'";
    $result = mysql_query($query);
    
    $row = mysql_fetch_assoc($result);
    $count = $row['Count'];
            
    //Query 4 - Display result
    $query  = "SELECT * FROM `2009_12_poll`";
    $result = mysql_query($query);
    $i = '1';
    
    while($row = mysql_fetch_array($result)){
        if ($row['Tenue'] != 'Total'){
            echo '<br><b>Tenue ' . $row['Tenue'] . '</b> = ' . $row['Count'] . ' votes sur ' . $count;
        }
    }
    
    echo '<br><br><a href="2009_12_gallery.php">Retour au sondage</a>';
}

if ($page == "2009_12_gallery2"){
    //Query 1 - Get total
    $query  = "SELECT * FROM `2009_12_poll` where `Tenue` = 'Total'";
    $result = mysql_query($query);
    
    $row = mysql_fetch_assoc($result);
    $count = $row['Count'];

    
    //Query 3 - Get vote for each item
    $query  = "SELECT * FROM `2009_12_poll`";
    $result = mysql_query($query);
    $i = '1';
    
    while($row = mysql_fetch_array($result)){
        if ($row['Tenue'] != 'Total'){
            echo '<br><b>Tenue ' . $row['Tenue'] . '</b> = ' . $row['Count'] . ' votes sur ' . $count;
        }
    }    
    //echo '<br><br><a href="2009_12_gallery.php">Retour au sondage</a>';
}
?>