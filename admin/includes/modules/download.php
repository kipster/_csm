<?php
/*
  $Id: downloads.php,v 1.3 2003/06/09 22:49:58 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- downloads //-->
<?php

    $last_order = $HTTP_GET_VARS['oID'];


//Reset order status
if (isset($update)){
    $qqq = "UPDATE `orders_products_download` SET `download_count` = '$update' WHERE `orders_products_download_id` = '$opd' LIMIT 1";
    $rrr = mysql_query($qqq);
    }
      
    
// Now get all downloadable products in that order
// BOF: WebMakers.com Added: Downloads Controller
// DEFINE WHICH ORDERS_STATUS TO USE IN downloads_controller.php
// USE last_modified instead of date_purchased
// original  $downloads_query = tep_db_query("select                                                                                   date_format(o.date_purchased, '%Y-%m-%d') as date_purchased_day, opd.download_maxdays, op.products_name, opd.orders_products_download_id, opd.orders_products_filename, opd.download_count, opd.download_maxdays from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_PRODUCTS . " op, " . TABLE_ORDERS_PRODUCTS_DOWNLOAD . " opd where o.customers_id = '" . (int)$customer_id . "' and o.orders_id = '" . (int)$last_order . "' and o.orders_id = op.orders_id and op.orders_products_id = opd.orders_products_id and opd.orders_products_filename != ''");
             $downloads_query = tep_db_query("select o.orders_status, date_format(o.date_purchased, '%Y-%m-%d') as date_purchased_2_day, date_format(o.last_modified, '%Y-%m-%d') as date_purchased_day, opd.download_maxdays, op.products_name, opd.orders_products_download_id, opd.orders_products_filename, opd.download_count, opd.download_maxdays from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_PRODUCTS . " op, " . TABLE_ORDERS_PRODUCTS_DOWNLOAD . " opd where o.orders_status >= '" . DOWNLOADS_CONTROLLER_ORDERS_STATUS . "' and o.orders_id = '" . (int)$last_order . "' and o.orders_id = op.orders_id and op.orders_products_id = opd.orders_products_id and opd.orders_products_filename != ''");

  if (tep_db_num_rows($downloads_query) > 0) {
?>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
<!-- list of products -->
<?php
    while ($downloads = tep_db_fetch_array($downloads_query)) {
// MySQL 3.22 does not have INTERVAL
      if (empty($downloads['date_purchased_day'])){ $downloads['date_purchased_day'] = $downloads['date_purchased_2_day'];}
      
      
      list($dt_year, $dt_month, $dt_day) = explode('-', $downloads['date_purchased_day']);
      $download_timestamp = mktime(23, 59, 59, $dt_month, $dt_day + $downloads['download_maxdays'], $dt_year);
      $download_expiry = date('Y-m-d H:i:s', $download_timestamp);
?>
          <tr>
<!-- left box -->
<?php
// The link will appear only if:
// - Download remaining count is > 0, AND
// - No expiry date is enforced (maxdays == 0), OR
// - The expiry date is not reached
      if ( ($downloads['download_count'] > 0) && (($downloads['download_maxdays'] == 0) || ($download_timestamp > time())) ) {
// WebMakers.com Added: Downloads Controller Show Button
// original MS1        echo '            <td class="main"><a href="' . tep_href_link(FILENAME_DOWNLOAD, 'order=' . $last_order . '&id=' . $downloads['orders_products_download_id']) . '">' . $downloads['products_name'] . '</a></td>' . "\n";
        echo '            <td class="main">' . $downloads['products_name'] . '<br><b>Le telechargement est disponible</b></td>' . "\n";
      } else {
        echo '            <td class="main">' . $downloads['products_name'] . '<br><b>Le lien n\'est plus disponible</b></td>' . "\n";
      }
?>
<!-- right box -->
<?php
// BOF: WebMakers.com Added: Downloads Controller
      echo '            <td class="main" align="center">Date d\'expiration du lien :<br><b>' . tep_date_long($download_expiry) . '</b></td>' . "\n" .
           '            <td class="main" align="center">Nombre de telechargements restant<br><b>' . $downloads['download_count'] . '</b><br>
                        <form action="?page=' . $page . '&oID=' . $oID . '&action=edit&opd=' . $downloads['orders_products_download_id'] . '" method="post">
                        Remettre le compteur &agrave;: <input type="text" name="update" />
                        <input type="submit" />
                        </form>
                        </td>' . "\n" .
           '          </tr>' . "\n";
// EOF: WebMakers.com Added: Downloads Controller
    }
?>
          </tr>
        </table></td>
<?php
  }
?>
<?php
// BOF: WebMakers.com Added: Downloads Controller
// If there is a download in the order and they cannot get it, tell customer about download rules
  $downloads_check_query = tep_db_query("select o.orders_id, opd.orders_products_download_id from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_PRODUCTS_DOWNLOAD . " opd where o.orders_id = opd.orders_id and o.orders_id = '" . (int)$last_order . "' and opd.orders_products_filename != ''");

if (tep_db_num_rows($downloads_check_query) > 0 and tep_db_num_rows($downloads_query) < 1) {
// if (tep_db_num_rows($downloads_query) < 1) {
?>
       <td colspan="3" align="center" valign="top" class="main" height="30"><FONT FACE="Arial" SIZE=1 COLOR="FF000"><?php echo DOWNLOADS_CONTROLLER_ON_HOLD_MSG ?></FONT></td>
<?php
}
// EOF: WebMakers.com Added: Downloads Controller
?>
<!-- downloads_eof //-->
