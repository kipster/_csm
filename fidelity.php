<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */
    $address = 'fidelity';
    require('includes/application_top.php');
    
    if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
    }
    
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_2009_12_U);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_2009_12_U));
    
    require('header_main.php');
?>

<!--- This_File --->
                                            <tr>
                                                <td>
                                                    <div>
                                                    
                                                    <?php
                                                    //Display for logged in customer
                                                    //$orders_query = tep_db_query("select o.orders_id, o.date_purchased, o.orders_status, ot.value, ot.text as order_total from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot where o.customers_id = '" . (int)$customer_id . "' and o.orders_id = ot.orders_id and ot.class = 'ot_total' and orders_status > 1 order by orders_id desc limit 30");

                                                    //Loop for all customers
                                                    
                                                    $points_value_query  = tep_db_query("select par_euro, valeur from fidelity");
                                                    $points_value_result = tep_db_fetch_array($points_value_query);
                                                    $multiplyby = $points_value_result['par_euro'];
                                                    
                                                    $i = 1;
                                                    while ($i < 1000){
                                                        $orders_query = tep_db_query("select o.orders_id, o.date_purchased, o.orders_status, ot.value, ot.text as order_total from " . TABLE_ORDERS . " o, " . TABLE_ORDERS_TOTAL . " ot where o.customers_id = '" . $i . "' and o.orders_id = ot.orders_id and ot.class = 'ot_total' and orders_status > 1 order by orders_id desc limit 30");
                                                        $points = 0;                                                
                                                        while ($orders = tep_db_fetch_array($orders_query)) {
                                                            $order_attribute_query = tep_db_query("select products_options_values from " . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . " where orders_id = '" . $orders['orders_id'] . "'");
                                                            $pp = 0;
                                                            while ($order_attribute_result = tep_db_fetch_array($order_attribute_query)){
                                                                if ($order_attribute_result['products_options_values'] == 'La Poste par Lettre') {$pp = 2;}
                                                                }
                                                            
                                                            if ($orders['value'] > 52){$total = $orders['value'];} else {$total = $orders['value'] - $pp;}
                                                                //echo 'Commande du ' . tep_date_short($orders['date_purchased']) . ' Total sans les frais de port: ' . $orders['order_total'] . ' - ' . $total . '<br>';
                                                                $total = intval($total) * $multiplyby;
                                                                $order_points = tep_db_query("update " . TABLE_ORDERS . " set fidelity=" . $total . " where orders_id = '" . $orders['orders_id'] . "'");
                                                                $points = $points + $total;
                                                        }
                                                        
                                                        //Add the points to current value
                                                        //$customer_points = tep_db_query("update " . TABLE_CUSTOMERS . " set points=points+" . $point . " where customers_id = '" . (int)$customer_id . "'");
                                                        //Replace point with current value
                                                        //$customer_points = tep_db_query("update " . TABLE_CUSTOMERS . " set points=" . $points . " where customers_id = '" . (int)$customer_id . "'");
                                                        $customer_points = tep_db_query("update " . TABLE_CUSTOMERS . " set points=" . $points . " where customers_id = '" . $i . "'");
                                                        $i++;
                                                        }
                                                        
                                                        echo $i . 'plus FINISH';
                                                    ?>                                                    
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
