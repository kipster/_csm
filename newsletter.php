<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */

    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_NL);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_NL));
    include 'header_main.php';
?>
                                            <tr>
                                                <td>
                                                    <?php
                                                        if (isset($id)){
                                                        echo '<h1>' . $sub . '</h1>';
                                                        echo $mess . '<p><a href="index.php"><img width="750px" src="_includes/_newsletter/' . $id . '.jpg"></a></p><br>';
                                                        echo '<a href="newsletter.php">Voir toutes les lettres de nouvelles.</a>';
                                                        }

                                                        else {
                                                        include '_includes/_newsletter/nl.php';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <!-- main_body_text_eof //-->
    <?php include 'footer_main.php'; ?>