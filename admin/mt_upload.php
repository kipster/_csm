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
        $file = $_POST['status'];

        if ($file == sent) {

        $target_path = "../_includes/_vision/img/";

        $target_path = $target_path . basename( $_FILES['uploadedfile']['name']); 

        if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
            echo "The file ".  basename( $_FILES['uploadedfile']['name']). 
            " has been uploaded";
        } else{
            echo "Rat&eacute;! Essaye encore...";
        }


        ;} else {
        ?>

        <form enctype="multipart/form-data" action="mt_upload.php" method="POST">
        <h1>Selectionne le fichier a envoyer pour la gallerie:</h1><br>
        Taille 600px X 400px ou un ratio de 3x2<br>
        Resolution: 72 dpi<br>
        Type: .jpg<br><br>
        <input name="status" value="sent" type="hidden">
        <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
        Choisir le fichier: <input name="uploadedfile" type="file" /><br />
        <input type="submit" value="Envoyer le fichier" />
        </form>
        <?php
        };
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