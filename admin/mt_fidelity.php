<?php
/*
  $Id: configuration.php,v 1.43 2003/06/29 22:50:51 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  $points_value_query  = tep_db_query("select par_euro, valeur from fidelity");
  $points_value_result = tep_db_fetch_array($points_value_query);
  $multiplyby = $points_value_result['par_euro'];
  $value = $points_value_result['valeur'];
  
  if ($_POST['status'] == sent) {
      $pareuro = $_POST['pareuro'];
      $valeur = $_POST['valeur'];
      if (empty($pareuro)) {$pareuro = $multiplyby;}
      if (empty($valeur)) {$valeur = $value;}
      tep_db_query("UPDATE `fidelity` SET `par_euro` = '" . $pareuro . "', `valeur` = '" . $valeur . "' WHERE `key` = 0 LIMIT 1;");
      $multiplyby = $pareuro;
      $value = $valeur;
  }
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
        <h1>Gerer les points de fidelites.</h1>
        <h2>En ce moment:</h2>
        <p>Le client gagne <b><?php echo $multiplyby; ?></b> point<?php if ($multiplyby > 1){echo 's';} ?> par euro d&eacute;pens&eacute;.<br>
        Chaque point a une valeur de <b><?php echo $value; ?></b> euro.</p>
        <h2>Changer la valeur ou le nombre de point</h2>
        <form enctype="multipart/form-data" action="mt_fidelity.php" method="POST">
        <input name="status" value="sent" type="hidden">
        <b>Gagner <input type="text" name="pareuro" /> point(s) euro d&eacute;pens&eacute;.</b><br />
        <b>Chaque point a une valeur de <input type="text" name="valeur" /> euro.</b><br />
        <input type="submit" value="Mettre a jour" />
        </form>
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
