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
        if ($result == "process"){
        include 'includes/modules/welcomepage/config.php';
        include 'includes/modules/welcomepage/opendb.php';

        mysql_select_db($mysql);
        $query = "UPDATE `welcome_page` SET `content` = '$content' WHERE `id` = 0 LIMIT 1";

        mysql_query($query) or die('Error, insert query failed');

        echo 
        ?>
        <h1><span style="color: red;">La page d'accueil a &eacute;t&eacute; mise &agrave jour</span></h1>
        <?php ;

        }
        
    include 'includes/modules/welcomepage/index.php';
    ?>
    
    <!--- upload module --->
    <?php
        $file = $_POST['status'];

         if ($file == sent) {

        $target_path = "../dossier/";

        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
        } else{
            echo "Rat&eacute;! Essaye encore...";
        }


        ;}
        ?>

        <form enctype="multipart/form-data" action="mt_welcome_page.php" method="POST">
        <h1>Selectionne le fichier a envoyer pour ton dossier personnel:</h1>
        <p>Taille recommande pour les images: 600px X 400px ou un ratio de 3x2, resolution: 72 dpi, type: .jpg. Ne pas faire des images avec une largeur de plus de 800x600max, exceptionellement, si vraiment besoin d'etre grand, mettre 1280x1024max</p>
        <p>Tu peux envoyer tout type de fichier et avoir le lien pour toi...</p>
        <input name="status" value="sent" type="hidden">
        <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
        <b>Choisir le fichier: </b><input name="uploadedfile" type="file" /><br />
        <input type="submit" value="Envoyer le fichier" />
        </form>
        
        <!--- upload_module_eof --->
        
        <!--- Display Dossier -->
                <br><h1>La galerie de tes fichiers personnels:</h1><table width="100%">
                    <tbody>
                        <?php
                        $dir = '../dossier/';
                        // unlink($dir . "ba_small.jpg"); see http://www.daniweb.com/forums/thread135318.html#
                        $link = '<td align="center" valign="center"><a href="' . $dir;
                        $linkend = '">';
                        $src = '<img src="' . $dir;
                        $srcend = '"width="270px"></a><br>';
                        $path = '<div id="small">/shop/dossier/';
                        $td = '</div><br></td>';

                        $i = 0;
                        if ($handle = opendir($dir)) {
                            while (false !== ($file = readdir($handle))) {
                                if ($file != "." && $file != ".." && $file != "bg" && $file != "bg" && $file != "controller" && $file != "corners") {
                                    if ($i == 0)     {$image1 = $file;
                                                      $i++;
                                                      }
                                    elseif ($i == 1) {$image2 = $file;
                                                      $i++;
                                                      }
                                    elseif ($i == 2) {$image3 = $file;
                                                      $i=0;
                                                      echo  '<tr>' . 
                                                            $link . $image1 . $linkend . $src . $image1 . $srcend . $path . $image1 . $td . 
                                                            $link . $image2 . $linkend . $src . $image2 . $srcend . $path . $image2 . $td . 
                                                            $link . $image3 . $linkend . $src . $image3 . $srcend . $path . $image3 . $td . 
                                                            '</tr>';
                                                      }
                                }
                            }
                            closedir($handle);
                        }
                        if ($i != 0) {
                                echo  '<tr>';
                                    if ($i == 1 || $i == 2) {
                                        echo $link . $image1 . $linkend . $src . $image1 . $srcend . $path . $image1 . $td;
                                            if ($i == 2) {
                                                echo $link . $image2 . $linkend . $src . $image2 . $srcend . $path . $image2 . $td;
                                                         }
                                            else {
                                                echo '<td></td>';
                                                  }
                                    }
                                echo '<td></td></tr>';
                        }        
                        ?>
                    </tbody>
                </table>
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
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>