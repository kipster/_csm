<?php
/*
  $Id: configuration.php,v 1.43 2003/06/29 22:50:51 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
?>

<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/general.js"></script>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF" onload="SetFocus();">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
    </table></td>
<!-- body_text //-->
    <td width="100%" valign="top">
<?php
    // upload module
    $file = $_POST['status'];
    if ($file == sent) {
        if ((($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/pjpeg"))
        && ($_FILES["file"]["size"] < 300000))
          {
          if ($_FILES["file"]["error"] > 0)
            {
            echo "L'envoi n'a pas reussi, voici l'erreur.<br />Return Code: " . $_FILES["file"]["error"] . "<br />";
            }
          else
            {
            $date = mktime();
            move_uploaded_file($_FILES["file"]["tmp_name"],
            "../_includes/_newsletter/" . $date . '.jpg');
            $nl= 'send';
            }
          }
        else
          {
          echo "Erreur, seul le format d'image .jpg est autorisé ou l'image fait plus de 300Kb";
          }
          
        ;}
        
        else {
    ?>
            <form enctype="multipart/form-data" action="mt_test.php" method="POST">
            <h1>Selectionne le fichier a envoyer pour ta lettre de nouvelle:</h1>
            <p>Largeur: 750px ou plus... Resolution: 72 dpi. Type: .jpg.</p>
            <input name="status" value="sent" type="hidden">
            <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
            <b>Sujet: </b><input type="text" name="fsubject" /><br />
            <b>Choisir le fichier: </b><input type="file" name="file" id="file" /><br />
            <input type="submit" value="Envoyer le fichier" />
            </form>
    <?php
        }
    //upload_module_eof
    require(DIR_WS_INCLUDES . 'application_bottom.php');
 
    //send newsletter:
    if ($nl == 'send'){
        setlocale (LC_ALL, "fr_FR");

        $date2 = strftime("%A %d %B");
        $sub = $_POST["fsubject"];        
        $i = 0;
        $email = 'info@gm.fr';
        $bcc = 'webmaster@cgdfgsdfge.fr';
        
        $data = '<a href="newsletter.php?id=' . $date . '&sub=' . $sub . '">' . $date2 . ' - ' . $sub . '</a><br>';
        $file=fopen("../_includes/_newsletter/nl.php","a+");
        fwrite($file, $data);
        fclose($file);

        include 'includes/modules/welcomepage/config.php';
        include 'includes/modules/welcomepage/opendb.php';

        $query  = "SELECT * FROM `000email`";
        $result = mysql_query($query);

        while($row = mysql_fetch_assoc($result))
        {
        $to = $row['email'];;
        $headers = 'From: "Coudre Sur Mesure" <info@coudresurmesure.fr>' . "\n";
        //$headers .='BCC: ' . $bcc . "\n";
        $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
        $headers .='Content-Transfer-Encoding: 8bit'; 
        $subject = $sub;
        $message = "<html><head></head><body><div style=\"text-align: center\"><p>Si ce message ne s'affiche pas correctement, retrouvez cette lettre en ligne : cliquez <a href=\"http://www.coudresurmesure.fr/shop/newsletter.php?id=" . $date . "&sub=" . $sub . "\">ICI</a>.</p>";
        $message .= '<a href="http://www.coudresurmesure.fr"><img width="750px" src="http://www.coudresurmesure.fr/shop/_includes/_newsletter/' . $date . '.jpg"></a>';
        $message .= "<p>Si vous ne souhaitez plus recevoir d'information, vous pouvez vous désinscrire <a href=\"http://www.coudresurmesure.fr/shop/desabonnement.php\">ICI</a>.</p>";
        $message .= '</div></body></html>';
        
        if (mail ($to,$subject,$message,$headers)){
            $i++;
        }
        else {
            echo 'Oupss, il y a eu un probleme, veuillez reeasyer plus tard.';
        }
        }
        
        
        include 'includes/modules/welcomepage/closedb.php';
        echo $i . " lettres de nouvelle sont parties...";
    }
    ?>
    
    </td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br>
</body>
</html>