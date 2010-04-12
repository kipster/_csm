<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */

    require('includes/application_top.php');

    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_INFO);
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_HELP);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_INFO));
    
    include 'header_main.php';
?>
                                            <tr>
                                                <td>
                                                    <table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                        <tr>
                                                            <td class="main">
                                                                <big><a href="shipping.php"><? echo TEXT_SHIPPING_HEADING?></a></big><br>
                                                                <? echo TEXT_SHIPPING;?><br><br>
                                                                <big><a href="conditions.php"><? echo TEXT_CONDITION_HEADING?></a></big><br>
                                                                <? echo TEXT_CONDITION;?><br><br>
                                                                <big><a href="presentation.php"><? echo TEXT_US_HEADING?></a></big><br>
                                                                <? echo TEXT_US;?><br><br>
                                                                <big><a href="faq.php"><? echo TEXT_FAQ_HEADING?></a></big><br>
                                                                <? echo TEXT_FAQ;?><br><br>
                                                                <big><a href="contact_us.php"><? echo TEXT_CONTACT_HEADING?></a></big><br>
                                                                <? echo TEXT_CONTACT;?><br><br>
                                                                <big><a target="_blank" href="includes/content/pap.pdf"><? echo TEXT_SBS_HEADING; ?></a></big><br>
                                                                <? echo TEXT_SBS;?><br><br>
                                                                <big><a target="_blank" href="includes/content/explications.pdf"><? echo TEXT_INSTRUCTION_HEADING?></a></big><br>
                                                                <? echo TEXT_INSTRUCTION;?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
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
                                    <!-- main_body_text_eof //-->
    <?php include 'footer_main.php'; ?>