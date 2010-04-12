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
<link rel="stylesheet" type="text/css" href="../stylesheetevent.css" media="screen" charset="utf-8">
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
        <h1>Voici les participants au super challenge.</h1><br>
        <?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?><?php
        include 'includes/modules/welcomepage/config.php';
        include 'includes/modules/welcomepage/opendb.php';
        
        $with = '<h1>Inscrit avec le CD 1</h1>';
        $without = '<h1>Inscrit sans le CD 1</h1>';
        
        $query  = "SELECT * FROM `2009_12`";
        $result = mysql_query($query);

        while($row = mysql_fetch_assoc($result))
        {
            if (empty($row['file_name'])){
                $file_name = '';
            }
            
            else {
                $path = '../_include/_events/2009_12/images_customers/' . $row['file_name'];
                $file_name = '<br><a target="_blank" href="' . $path . '"><img src="' . $path . '" width="75px"></a>';
            }
            if ($row['check'] == 'on') {
                if (empty($row['adresse2'])){
                    $adresse = $row['adresse1'];
                    }
                else {$adresse = $row['adresse1'] . '<br>' . $row['adresse2'];
                }
                $without .= '<div class="e_2009_12_acol"><b>' . $row['name'] . '</b><br>' . $adresse . '<br>' . $row['cp'] . ' ' . $row['ville'] . '<br><i>' . $row ['email'] . '</i>' . $file_name . '<br><br></div>';}
            else {$with .= '<div class="e_2009_12_acol1"><b>' . $row['name'] . '</b></div><div class="e_2009_12_acol2"><i>' . $row ['email'] . '</i>' . $file_name . '</div><div class="e_2009_12_aline"></div>';}
        }

        include 'includes/modules/welcomepage/closedb.php';
        
        echo $with . $without;
        
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
