<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */

    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CONDITIONS);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_CONDITIONS));
    
    require('header_main.php');
?>

<!--- This_File --->
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tr>
                                                            <td class="main">
                                                                <big><a href="condition.php?answer=1">Article 1 : Champ d'application</a></big>
                                                                <?
                                                                if ($answer == "1") {echo TEXT_GENERAL;};
                                                                ?>
                                                                <br>
                                                                <big><a href="condition.php?answer=2">Article 2 : Prix</a></big>
                                                                <?
                                                                if ($answer == "2") {echo TEXT_PRICE;};
                                                                ?>
                                                                <br>
                                                                <big><a href="condition.php?answer=3">Article 3 : Paiement</a></big>
                                                                <?
                                                                if ($answer == "3") {echo TEXT_PAYMENT;};
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                                <tr>
                                                                    <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                                    <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                                                                    <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                                </tr>
                                                            </table>
                                                        </tr>
                                                        </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <!-- main_body_text_eof //-->
<!--- This_File_eof --->

<?php
    require('footer_main.php');
?>