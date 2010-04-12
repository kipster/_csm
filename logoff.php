<?php
/*
  $Id: logoff.php,v 1.13 2003/06/05 23:28:24 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGOFF);

  $breadcrumb->add(NAVBAR_TITLE);

  tep_session_unregister('customer_id');
  tep_session_unregister('customer_default_address_id');
  tep_session_unregister('customer_first_name');
  tep_session_unregister('customer_country_id');
  tep_session_unregister('customer_zone_id');
  tep_session_unregister('comments');

  $cart->reset();
      include 'header_main.php';
?>

              <tr>
                <td class="main"><?php echo TEXT_MAIN; ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox">
          <tr class="infoBoxContents2">
            <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
<!-- body_text_eof //-->
<?php include 'footer_main.php'; ?>