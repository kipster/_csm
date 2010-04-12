<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */
    $address = 'z_file';
    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_Z_FILE);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_Z_FILE));
    
    require('header_main.php');
?>

<!--- This_File --->
                                            <tr>
                                                <td>
                                                    <div>
                                                        <?php echo XXX_TEXT; ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <!-- main_body_text_eof //-->
<!--- This_File_eof --->

<?php
    require('footer_main.php');
?>
