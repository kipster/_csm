<?php
if ($address != 'lot') {
    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOT);
    include 'header_main_head.php';
    };
?>                                                    <div id="lot">
                                                        Achet&eacute; plusieurs CDs dans la m&ecirc;me commande et b&eacute;n&eacute;ficier de r&eacute;ductions extraordinaires:<br><BR>
                                                        <?php
                                                        $value = "ot_quantity_discount.php"; 
                                                        require_once(DIR_WS_LANGUAGES . $language . 
                                                                '/modules/order_total/'. $value);
                                                        require_once(DIR_WS_MODULES . "order_total/" . $value);
                                                        $discount = new ot_quantity_discount();  
                                                        if (($discount->check() > 0) && 
                                                            ($discount->is_discountable((int)$HTTP_GET_VARS['products_id'])) ) { 
                                                           $dislist = $discount->get_discount_parms();
                                                           for ($i = 0; $i < sizeof($dislist); $i++) {
                                                               echo 'Pour <span class="lot_red">' . $dislist[$i]['level']; 
                                                               echo "</span> dépensées; ";
                                                               if ($i == (sizeof($dislist) - 1)) {
                                                                  echo " ou + "; 
                                                               }
                                                               echo '<span class="lot_red">' . $dislist[$i]['discount'] .  '</span> de remise sur le total<br>';
                                                           }
                                                         }
                                                        ?>
                                                        <br><br>La remise s'effectuera tr&egrave;s clairement et automatiquement lors de la confirmation de commande et avant tout paiement.
                                                    </div>