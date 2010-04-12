<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */

    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_FAQD);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_FAQD));
    
    require('header_main.php');
?>

<!--- This_File --->
                                            <tr>
                                                <td class="main">
                                                    <div style="font-weight: bold; text-align: center;">
                                                        Nous vous recommandons de payer vos téléchargement par paypal, vous aurez accés à vos fichiers dès votre retour sur notre site après votre paiement. Voir example ci-dessous.<br>
                                                        <br>
                                                        <div style="text-align: center;"><a target="_blank" href="_includes/_faqdownload/d.success.png"><img style="border: 2px solid purple; width: 750px; height: 362px;" alt="Paiement Paypal" src="_includes/_faqdownload/d.success.png" align="middle"></a></div>
                                                        <br>
                                                        Pour retrouvez vos téléchargement, veuillez allez dans votre compte:<br>
                                                        <br>
                                                        <div style="text-align: center;"><a target="_blank" href="_includes/_faqdownload/d.opensession.png"><img style="border: 2px solid ; width: 750px; height: 338px;" alt="S'identifez" src="_includes/_faqdownload/d.opensession.png" align="middle"></a></div>
                                                        <br>
                                                        Sélectionnez la commande désirée et cliquez dessus:<br>
                                                        <br>
                                                        <div style="text-align: center;"><a target="_blank" href="_includes/_faqdownload/d.account.png"><img style="border: 2px solid purple; width: 750px; height: 336px;" alt="Mon compte" src="_includes/_faqdownload/d.account.png" align="middle"></a><br>
                                                        </div>
                                                        <br>
                                                        Allez au bas de la page et cliquez sur le lien du fichier à télécharger, prenez note des diverses informations relatives au téléchargement:<br>
                                                        <br>
                                                        <div style="text-align: center;"><a target="_blank" href="_includes/_faqdownload/d.ready.png"><img style="border: 2px solid purple; width: 750px; height: 266px;" alt="Option téléchargement" src="_includes/_faqdownload/d.ready.png" align="middle"></a></div>
                                                        <br>
                                                    </div>
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
