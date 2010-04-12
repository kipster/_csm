<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */

    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PRESENTATION);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_PRESENTATION));
    
    require('header_main.php');
?>

<!--- This_File --->
                                            <tr>
                                                <td>
                                                <big><a href="presentation.php?answer=1"><? echo TEXT_US_HEADING?></a></big>
                                                <?
                                                if ($answer == "1") {echo TEXT_US;};
                                                ?>
                                                <br>
                                                <big><a href="presentation.php?answer=2"><? echo TEXT_HISTORY_HEADING?></a></big>
                                                <?
                                                if ($answer == "2") {echo TEXT_HISTORY;};
                                                ?>
                                                <br>
                                                <big><a href="presentation.php?answer=3"><? echo TEXT_ADDRESS_HEADING?></a></big>
                                                <?
                                                if ($answer == "3") {echo TEXT_ADDRESS;};
                                                ?>
                                                <br>
                                                <big><a href="presentation.php?answer=4"><? echo TEXT_LEKO_HEADING?></a></big>
                                                <?
                                                if ($answer == "4") {echo TEXT_LEKO;};
                                                ?>
                                                <br>
                                                <big><a href="presentation.php?answer=5"><? echo TEXT_MANUAL_HEADING?></a></big>
                                                <?
                                                if ($answer == "5") {echo TEXT_MANUAL;};
                                                ?>
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
<!--- This_File_eof --->

<?php
    require('footer_main.php');
?>