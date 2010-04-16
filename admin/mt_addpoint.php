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
if (isset($_GET[custid])){
    $custid = $_GET[custid];
    $getname = tep_db_query("SELECT `customers_firstname`, `customers_lastname` FROM `customers` WHERE `customers_id` = " . $custid . " LIMIT 0, 30 ");
    $gnr = tep_db_fetch_array($getname);
    $name = $gnr['customers_firstname'] . ' ' . $gnr['customers_lastname'];
    $last = $gnr['customers_lastname'];
    ?>
    <h1> Mettre a jour les points de <b><?php echo $name; ?>.</h1>
    <form enctype="multipart/form-data" action="mt_addpoint.php" method="POST">
    <input name="status" value="sent" type="hidden">
    <input name="name" value="<?php echo $name; ?>" type="hidden">
    <input name="last" value="<?php echo $last; ?>" type="hidden">
    <input name="customer" value="<?php echo $custid ?>" type="hidden">
    Utilise un chiffre negatif (-25) pour enlever et un chiffre positif pour ajouter.<br><input type="text" name="addpoints" />
    <input type="submit" value="Add" />
    <?php
}

if ($_POST['status'] == sent) {
    $custid = $_POST['customer'];
    $points = $_POST['addpoints'];
    $name = $_POST['name'];
    $last = $_POST['last'];
    $customer_points = tep_db_query("update " . TABLE_CUSTOMERS . " set points=points+" . $points . " where customers_id = '" . $custid . "'");
    echo "Les points (" . $points . ") de " . $name . " ont ete mis a jour.";
}
?>
<p><a href="customers.php?search=<?php echo $last; ?>">Retour</a></p>

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
