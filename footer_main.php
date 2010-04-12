                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- OsCommerce_inside_this_div_eof //-->

                </div>
                <!-- Column_center_eof //-->
            </div>
            <!-- Body_main //-->

            <!-- footer //-->
            <div id="footer">
                <div id="footer_horizontal">
                    <img src="_includes/_images/h_horizontal.gif">
                </div>
                <div id="footer_osc">
                    <a target="_blank" href="http://www.oscommerce-fr.info/">
                    Une solution: <br>
                    <img src="_includes/_images/osc_logo.gif" alt="Logo osCommerce"></a>
                </div>
                <?php
                if ($address == 'index'){ echo '<div id="footer_vertical_index">';}
                else {echo '<div id="footer_vertical">';}
                ?>
                    <img src="_includes/_images/f_vertical.gif">
                </div>
                <div id="footer_boutton">
                    <img src="_includes/_images/h_boutton.gif">
                </div>
                <div id="footer_text">
                    <a href="contact_us.php">Contactez-nous</a> ~ 
                    <a href="shipping.php">Livraison</a> ~ 
                    <a href="presentation.php">Qui sommes-nous</a> ~ 
                    <a href="help.php">R&eacute;ponses &agrave; vos questions</a> ~ 
                    <a target= "_blank" href="includes/content/pap.pdf">Pas &agrave; pas pour r&eacute;aliser nos patrons</a>
                </div>

                <div id="copyright">
                    &copy; 2009 Emmanuel Masson - Cr&eacute;ation "<a target="_blank" href="http://www.gardmultimedia.fr">Gard Multimedia</a>".
                </div>
            </div>
            <!-- footer_eof //-->

        </div>
        <!--- The_shop_eof //-->

    </body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>