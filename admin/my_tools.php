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
    <h1>Ici tu peux:</h1>
    <div class="a_bigger">
    <a href="mt_welcome_page.php">Changer la page d'accueil et envoyer tes fichiers persos...<a><br><br>
    <a href="mt_upload.php">Envoyer tes fichiers photos pour la galerie,<a><br><br>
    <a href="mt_news.php">Voir les email de ceux qui veulent les CDs de nouveaut&eacute;s,<a><br><br>
    <a href="mt_customer_news.php">Voir les emails des clients abonn&eacute;s.<a><br><br>
    <a href="mt_newsletter.php">Envoyer une lettre de nouvelle.<a><br><br>
    <a href="../newsletter.php">Voir les lettres de nouvelles.<a><br><br>
    <a href="mt_fidelity.php">Gerer les points de fidelites.<a><br><br>
    <a href="mt_2009_12.php">Voir les participants au Super Challenge.<a>
    </div>
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