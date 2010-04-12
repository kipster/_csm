<?php
/**
 * Quantity Discounts in the order_total module
 * Version 1.0.1 for osCommerce
 * By Scott Wilson (swguy) 
 * @copyright That Software Guy (www.thatsoftwareguy.com) 
 * @copyright Portions Copyright 2004-2006 Zen Cart Team
 * @copyright Portions Copyright 2003 osCommerce
 */

  class ot_quantity_discount {
    var $title, $output;
    var $explanation; 

    // Add categories you wish to exclude to this list.
    // Go to Admin->Catalog->Categories/Products and look 
    // at the left hand side of the list to determine 
    // category id.   Note that 99999 and 99998 are just given
    // as examples.
    function exclude_category($category) {
        switch($category) {
           case 99999:
           case 99998:
                return true;
        }
        return false;
    }

    // Add categories which are "linked" and should not be used as 
    // the "master category" to this list.
    // Go to Admin->Catalog->Categories/Products and look 
    // at the left hand side of the list to determine 
    // category id.   Note that 99999 and 99998 are just given
    // as examples.
    function is_linked_category($category) {
        switch($category) {
           case 99999:
           case 99998:
                return true;
        }
        return false;
    }

    // Add products you wish to exclude to this list.
    // Go to Admin->Catalog->Categories/Products->[Your category]
    // and look at the left hand side of the list to determine 
    // product id.   Note that 99999 and 99998 are just given
    // as examples.
    function exclude_product($id) {
        switch($id) {
           case 99999:
           case 99998:
                return true;
        }
        return false;
    }

    // Add categories with special discounting policies to this list.
    // Note that 99999, 99998 and 99997 are just given as examples.
    // Note that the Discounting Units you specified in Admin 
    // (percentage, currency, currency/item) are also used here.
    function apply_special_category_discount($category, $count, &$disc_amount) {
        switch($category) {
           case 99999:
           case 99998:
                if ($count > 100) {
                   $disc_amount = 50; 
                }
                break; 
           case 99997:
                $disc_amount = 75;
                break;
        }
    }

    // Add items with special discounting policies to this list.
    // Note that 99999, 99998 and 99997 are just given as examples.
    // Note that the Discounting Units you specified in Admin 
    // (percentage, currency, currency/item) are also used here.
    function apply_special_item_discount($id, $count, &$disc_amount) {
        switch($id) {
           case 99999:
           case 99998:
                if ($count > 100) {
                   $disc_amount = 50; 
                }
                break; 
           case 99997:
                $disc_amount = 75;
                break; 
        }
    }


    function ot_quantity_discount() {
      $this->code = 'ot_quantity_discount';
      $this->title = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_TITLE;
      $this->description = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_DESCRIPTION;
      $this->sort_order = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_SORT_ORDER;
      $this->include_tax = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_INC_TAX;
      $this->calculate_tax = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_CALC_TAX;
      $this->total_basis = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_TOTAL_BASIS;
      $this->units = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_UNITS;
      $this->counting_method = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_COUNTING_METHOD;
      $this->total_level_1 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_1;
      $this->total_discount_1 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_1; 
      $this->total_level_2 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_2;
      $this->total_discount_2 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_2;
      $this->total_level_3 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_3;
      $this->total_discount_3 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_3;
      $this->total_level_4 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_4;
      $this->total_discount_4 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_4;
      $this->total_level_5 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_5; 
      $this->total_discount_5 = MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_5;
      $this->credit_class = true;
      $this->output = array();
      $this->extra_levels = array();
      $this->extra_discounts = array();
      $this->enabled = ((MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_STATUS == 'true') ? true: false);
      if ($this->enabled) { 
         $this->setup(); 
      }
    }

    function add_extra_level_discount($newlevel, $newdiscount) {
       $this->extra_levels[] = $newlevel;
       $this->extra_discounts[] = $newdiscount;
    }
 
    function print_amount($amount) {
      global $order, $currencies;
      return  $currencies->format($amount, true, $order->info['currency'], $order->info['currency_value']);
    }

    function get_disc_amount($count) {
      $disc_amount = 0;
      if ($count >= $this->total_level_1) 
          $disc_amount = $this->total_discount_1;
      if ($count >= $this->total_level_2) 
          $disc_amount = max($disc_amount, $this->total_discount_2);
      if ($count >= $this->total_level_3) 
          $disc_amount = max($disc_amount, $this->total_discount_3);
      if ($count >= $this->total_level_4) 
          $disc_amount = max($disc_amount, $this->total_discount_4);
      if ($count >= $this->total_level_5) 
          $disc_amount = max($disc_amount, $this->total_discount_5);
      for ($i = 0, $n=sizeof($this->extra_levels); $i < $n; $i++) {
          if ($count >= $this->extra_levels[$i]) {
             $disc_amount = max($disc_amount, $this->extra_discounts[$i]); 
          }
      }
      return $disc_amount; 
    }


    function get_order_total() {
       global  $order;
       $order_total_tax = $order->info['tax'];
       $order_total = $order->info['total'];
       if ($this->include_tax != 'true') $order_total -= $order->info['tax'];
       $orderTotalFull = $order_total;
       $order_total = array('totalFull'=>$orderTotalFull, 'total'=>$order_total, 'tax'=>$order_total_tax);
   
       return $order_total;
    }

    function is_discountable($products_id) {
       $products_id = (int) $products_id;
       $catlist = $this->get_catlist($products_id);

       foreach ($catlist as $cat) {
          if ($this->exclude_category($cat)) { 
              return false;
          }
       }
       if ($this->exclude_product($products_id)) return false;

       return true;
    }

    function get_master_category($products_id) {
       $products_id = (int) $products_id;
       $catlist = $this->get_catlist($products_id);

       $mcat = 0;
       foreach ($catlist as $cat) {
          // Assign the first category found as the product category
          $mcat = $cat;
          break;
       }
 
       // If the assigned category is a linked category, see if 
       // there's another one.
       reset($catlist); 
       if ($this->is_linked_category($mcat)) {
          foreach ($catlist as $cat) {
             // Use first non-linked category found 
             if (!$this->is_linked_category($cat)) {
                $mcat = $cat;
                break;
             }
          }
       }
       return $mcat;
    }

    function get_catlist($products_id) {
       $category_query = tep_db_query("select p2c.categories_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_id = '" . (int)$products_id . "' and p.products_status = '1' and p.products_id = p2c.products_id");
       $catlist = array(); 
       if (tep_db_num_rows($category_query)) {
         while ($category = tep_db_fetch_array($category_query)) {
            $catlist[] = $category['categories_id'];
         }
       }
   
       return $catlist;
    }

    function cat_compatible($products_id, $id2) {
       $category_query = tep_db_query("select p2c.categories_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where p.products_id = '" . (int)$products_id . "' and p.products_status = '1' and p.products_id = p2c.products_id");
       if (tep_db_num_rows($category_query)) {
         while ($category = tep_db_fetch_array($category_query)) {
            if ($category['categories_id'] == $id2) return true; 
         }
       }
   
       return false;
    }

    function get_category_name($cat_id, $language = '') {
      global $languages_id;
  
      if (empty($language)) $language = $languages_id;
  
      $category_query = tep_db_query("select categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " where categories_id = '" . (int)$cat_id . "' and language_id = '" . (int)$language . "'");
      $category = tep_db_fetch_array($category_query);
  
      return $category['categories_name'];
    }
  
    function get_tax_rate_from_desc($tax_desc) {
      $tax_rate = 0.00;
  
      $tax_descriptions = explode(' + ', $tax_desc);
      foreach ($tax_descriptions as $tax_description) {
        $tax_query_str = "SELECT tax_rate
                      FROM " . TABLE_TAX_RATES . "
                      WHERE tax_description = '" . $tax_desc . "'";
  
        $tax_query = tep_db_query($tax_query_str);
        if (tep_db_num_rows($tax_query)) { 
           while ($tax = tep_db_fetch_array($tax_query)) {
              $tax_rate += $tax['tax_rate'];
           }
        }
      }
      return $tax_rate;
    }

    function process() {
       global $order, $currencies;
       global $PHP_SELF;

       $od_amount = $this->calculate_deductions();
       if ($od_amount['total'] > 0) {
         reset($order->info['tax_groups']);
         while (list($key, $value) = each($order->info['tax_groups'])) {
           $tax_rate = $this->get_tax_rate_from_desc($key);
           if ($od_amount[$key]) {
             $order->info['tax_groups'][$key] -= $od_amount[$key];
             $order->info['total'] -=  $od_amount[$key];
           }
         }
         $order->info['total'] = $order->info['total'] - $od_amount['total'];
         $current_page = basename($PHP_SELF);
         if ($current_page != '' && $current_page == FILENAME_CHECKOUT_CONFIRMATION) {
            $this->title = '<span class="orderEdit"><a href="javascript:alert(\'' . $this->explanation . '\');">' . $this->title . '</a></span>'; 
         } 
         $this->output[] = array('title' => $this->title . ':',
         'text' => '-' . $currencies->format($od_amount['total'], true, $order->info['currency'], $order->info['currency_value']),
         'value' => $od_amount['total']);
   
       }
    }

    function calculate_deductions() {
       global $order, $currencies;
       global $languages_id; 
       global $cart; 
 
       $od_amount = array();
       $od_amount['tax'] = 0;

       $products = $cart->get_products();
       $prod_list = array();
       $prod_list_price = array();
       $cat_list = array();
       $cat_list_price = array();
       $all_items = 0;
       $cat_list_back = array();
       $prod_list_back = array(); 
       $all_items_price = 0;
       for ($i=0, $n=sizeof($products); $i<$n; $i++) {
          if (!$this->is_discountable($products[$i]['id']))  continue; 

          $products[$i]['category'] = $this->get_master_category($products[$i]['id']); 
          $price = $products[$i]['final_price'];
          $quantity = $products[$i]['quantity'];

          // OK, it's an item you want to include.  Add it to the lists: 
          // by category
          $cat_list_back[$products[$i]['category']] = &$products[$i]; 
          $cat_list[$products[$i]['category']] += $quantity;
          $cat_list_price[$products[$i]['category']] += ($price * $quantity);

          // by products
          $prod_list_back[$products[$i]['id']] = &$products[$i];
          $prod_list[$products[$i]['id']] += $quantity;
          $prod_list_price[$products[$i]['id']] += ($price * $quantity);

          // by cart total
          $all_items += $quantity;
          $all_items_price += ($price * $quantity);
       }

       $cart_array = false;
       $key_list = array();
       if ($this->total_basis == 'Total By Category') {
          $key_list = array_keys($cat_list); 
          $cart_array = true;
       } else if ($this->total_basis == 'Total By Item') {
          $key_list = array_keys($prod_list); 
          $cart_array = true;
       } 

       $discount = 0;
       $this->explanation = YOUR_CURRENT_QUANTITY_DISCOUNT . "\\n" . "\\n"; 
       if ($cart_array == true) {
          // Discount by category or item number
       while (list($keypos, $listpos) = each($key_list)) {
             if ($this->total_basis == 'Total By Category') {
                $description = $this->get_category_name(
                       $cat_list_back[$listpos]['category'], 
                       $languages_id) . " " . ITEMS;
                $count =  $cat_list[$listpos];
                $price =  $cat_list_price[$listpos];
                if ( !isset($this->counting_method) || ($this->counting_method == 'items')) { 
                   $disc_amount = $this->get_disc_amount($count); 
                } else {
                   $disc_amount = $this->get_disc_amount($price); 
                }
                $this->apply_special_category_discount(
                       $listpos, $count, $disc_amount);
             } else { 
                $description =  $prod_list_back[$listpos]['model'];
                $count =  $prod_list[$listpos];
                $price =  $prod_list_price[$listpos];
                if ( !isset($this->counting_method) || ($this->counting_method == 'items')) { 
                   $disc_amount = $this->get_disc_amount($count); 
                } else {
                   $disc_amount = $this->get_disc_amount($price); 
                }
                $this->apply_special_item_discount(
                       $listpos, $count, $disc_amount);
             }

             if ($disc_amount == 0)
                continue; 
              
             if ($this->units == 'currency') {
                $this_discount = $disc_amount; 
             } else if ($this->units == 'currency per item') {
                $this_discount = $disc_amount * $count; 
             } else  {
                $this_discount = $price * $disc_amount / 100;
             }

             // This is a discount, not a credit! :)
             if ($this_discount > $price)  {
                $this_discount = $price;
             }
             
             $this_discount_inc_tax = $this_discount; 
             if ($this->include_tax == 'true') {
                $this_discount_inc_tax = $this->gross_up($this_discount); 
             }

             $discount +=  $this_discount_inc_tax;

             // Build the discount explanation text string 
             $gross_expl = "";
             if ($this->include_tax == 'true') {
                  $gross_expl = "  (".GROSSED_UP." = " . $this->print_amount($this_discount_inc_tax) . ")\\n"; 
             } 
             if ($this->units == 'currency') {
                $this->explanation .= " " . 
                   $this->print_amount($this_discount) . OFF . 
                    $count . " " . 
                    $description . "@" .  
                   $this->print_amount($price) . $gross_expl . "\\n";
             } else if ($this->units == 'currency per item') {
                $this->explanation .= " " . 
                   $this->print_amount($disc_amount) . PER_ITEM_OFF . 
                    $count . " " . 
                    $description . "@" .  
                   $this->print_amount($price) . $gross_expl . "\\n";
             } else {
                $this->explanation .=  " " . $count . " " . 
                   $description . "@" .  
                   $this->print_amount($price) . " * " . $disc_amount .  "% = " . 
                   $this->print_amount($this_discount) . $gross_expl . "\\n"; 
             } 
          }
       } else {
          $count = $all_items; 
          $price = $all_items_price; 
          if ( !isset($this->counting_method) || ($this->counting_method == 'items')) { 
             $disc_amount = $this->get_disc_amount($count); 
          } else { 
             $disc_amount = $this->get_disc_amount($price); 
          }
          if ($this->units == 'currency') {
             $this_discount = $disc_amount; 
          } else if ($this->units == 'currency per item') {
             $this_discount = $disc_amount * $count; 
          } else  {
             $this_discount = $price * $disc_amount / 100;
          }
          if ($this_discount > $price)  {
             $this_discount = $price;
          }
          $this_discount_inc_tax = $this_discount; 
          if ($this->include_tax == 'true') {
             $this_discount_inc_tax = $this->gross_up($this_discount); 
          }

          // Discount by cart total
          $discount =  $this_discount_inc_tax;
          $gross_expl = "";
          if ($this->include_tax == 'true') {
             $gross_expl = "  (".GROSSED_UP." = " . $this->print_amount($this_discount_inc_tax) . ")\\n"; 
          } 
          if ($this->units == 'currency') {
              $this->explanation .= " " . 
                      $this->print_amount($this_discount) . OFF . 
                       $count . " " . 
                       ITEMS . " @ " .  
                      $this->print_amount($price) . $gross_expl . "\\n";
          } else if ($this->units == 'currency per item') {
              $this->explanation .= " " . 
                      $this->print_amount($disc_amount) . PER_ITEM_OFF . 
                       $count . " " . 
                       ITEMS . " @ " .  
                      $this->print_amount($price) . $gross_expl . "\\n";
          } else {
              $this->explanation .=  " " . $count . " " . 
                      ITEMS . " @ " .  
                      $this->print_amount($price) . " * " . $disc_amount .  "% = " . 
                      $this->print_amount($this_discount) . $gross_expl . "\\n"; 
          } 
       }
  
       $this->explanation .= "\\n\\n" . TOTAL_DISCOUNT . $this->print_amount($discount); 

       $od_amount['total'] = round($discount, 2); 
       switch ($this->calculate_tax) {
       case 'Standard':
          reset($order->info['tax_groups']);
          while (list($key, $value) = each($order->info['tax_groups']))
          {
             $tax_rate = $this->get_tax_rate_from_desc($key);
             if ($tax_rate > 0) {
                $od_amount[$key] = $tod_amount = round((($od_amount['total'] * $tax_rate)) /100, 2) ;
                $od_amount['tax'] += $tod_amount;
             }
          }
          break;
      }
      return $od_amount;
   }

   function gross_up($net) {
      global $order;
      $gross_up_amt = 0; 
      reset($order->info['tax_groups']);
      while (list($key, $value) = each($order->info['tax_groups']))
      {
          $tax_rate = $this->get_tax_rate_from_desc($key);
          if ($tax_rate > 0) {
             $gross_up_amt += round((($net * $tax_rate)) /100, 2) ;
          }
      }
      return $gross_up_amt + $net; 
   }

   function pre_confirmation_check($order_total) {
      $od_amount = $this->calculate_deductions();
      return $od_amount['total'] + $od_amount['tax'];
    }

    function credit_selection() {
      return $selection;
    }

    function collect_posts() {
    }

    function update_credit_account($i) {
    }

    function apply_credit() {
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_STATUS'");
        $this->_check = mysql_num_rows($check_query);
      }

      return $this->_check;
    }

    function keys() {
      return array('MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_STATUS', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_SORT_ORDER', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_INC_TAX', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_CALC_TAX', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_UNITS', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_TOTAL_BASIS', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_COUNTING_METHOD', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_1','MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_1','MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_2','MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_2','MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_3','MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_3','MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_4','MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_4','MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_5', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_5');
    }

    function install() {

      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('&copy; www.thatsoftwareguy.com<br />Module Installed', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_STATUS', 'true', '', '6', '1','tep_cfg_select_option(array(\'true\'), ', now())"); 
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort Order', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_SORT_ORDER', '4', 'Sort order of display.', '6', '2', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Include Tax', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_INC_TAX', 'false', 'Include Tax in calculation.', '6', '3','tep_cfg_select_option(array(\'true\', \'false\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Re-calculate Tax', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_CALC_TAX', 'Standard', 'Re-Calculate Tax', '6', '3','tep_cfg_select_option(array(\'None\', \'Standard\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Discount Basis', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_TOTAL_BASIS', 'Total By Category', 'How quantity totals are computed', '6', '4','tep_cfg_select_option(array(\'Total By Category\', \'Total By Item\', \'Total Items in Cart\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Discount Units', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_UNITS', 'percentage', 'Are AMOUNT values below expressed as a percentage or as currency units (e.g. dollars)', '6', '4', 'tep_cfg_select_option(array(\'currency\', \'percentage\', \'currency per item\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function ,date_added) values ('Counting Method', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_COUNTING_METHOD', 'items', 'Are LEVEL values below expressed in number of items or currency units (e.g. dollars spent)', '6', '4', 'tep_cfg_select_option(array(\'items\', \'currency\'), ', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Level 1', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_1', '0', 'Total required to reach this discount level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Amount 1', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_1', '0', 'Percent or amount off at this level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Level 2', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_2', '0', 'Total required to reach this discount level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Amount 2', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_2', '0', 'Percent or amount off at this level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Level 3', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_3', '0', 'Total required to reach this discount level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Amount 3', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_3', '0', 'Percent or amount off at this level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Level 4', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_4', '0', 'Total required to reach this discount level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Amount 4', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_4', '0', 'Percent or amount off at this level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Level 5', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_LEVEL_5', '0', 'Total required to reach this discount level', '6', '5', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Discount Amount 5', 'MODULE_ORDER_TOTAL_QUANTITY_DISCOUNT_AMOUNT_5', '0', 'Percent or amount off at this level', '6', '5', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function get_level_policy($discount, $level) {
        if ( !isset($this->counting_method) || ($this->counting_method == 'items')) { 
            $over_level = $level;
        } else {
            $over_level = $this->print_amount($level);  
        }

        if ($this->units == 'currency') {
            $off_amt = $this->print_amount($discount);
        } else if ($this->units == 'currency per item') {
            $off_amt = $this->print_amount($discount);
        } else {
            $off_amt = $discount . "%"; 
        }

        if ( !isset($this->counting_method) || ($this->counting_method == 'items')) { 
           if ($this->total_basis == 'Total By Category') {
               $basis = BASIS_CATEGORY;
           } else if ($this->total_basis == 'Total By Item') {
               $basis = BASIS_ITEM;
           } else {
               $basis = BASIS_CART;
           }
        } else {
           if ($this->total_basis == 'Total By Category') {
               $basis = BASIS_DS_CATEGORY;
           } else if ($this->total_basis == 'Total By Item') {
               $basis = BASIS_DS_ITEM;
           } else {
               $basis = BASIS_DS_CART;
           }
        }

        if ( !isset($this->counting_method) || ($this->counting_method == 'items')) { 
           $verb = BUY; 
        } else {
           $verb = SPEND; 
        }
 
        if ($this->units == 'currency per item') {
           $h_exp .= $verb . $over_level . $basis . GET . $off_amt . PER_ITEM_OFF;
        } else {
           $h_exp .= $verb . $over_level . $basis . GET . $off_amt . OFF ;
        }
        return $h_exp; 
    }

    // Users seeking more control over output should use get_discount_info()
    function get_html_policy($product = 0) {

        if ($this->total_level_1 > 0) {
           $h_exp .= $this->get_level_policy($this->total_discount_1, $this->total_level_1); 
           $h_exp .= "<br />"; 
        }
        if ($this->total_level_2 > 0) {
           $h_exp .= $this->get_level_policy($this->total_discount_2, $this->total_level_2); 
           $h_exp .= "<br />"; 
        }
        if ($this->total_level_3 > 0) {
           $h_exp .= $this->get_level_policy($this->total_discount_3, $this->total_level_3); 
           $h_exp .= "<br />"; 
        }
        if ($this->total_level_4 > 0) {
           $h_exp .= $this->get_level_policy($this->total_discount_4, $this->total_level_4); 
           $h_exp .= "<br />"; 
        }
        if ($this->total_level_5 > 0) {
           $h_exp .= $this->get_level_policy($this->total_discount_5, $this->total_level_5); 
           $h_exp .= "<br />"; 
        }

        for ($i = 0, $n=sizeof($this->extra_levels); $i < $n; $i++) {
           $h_exp .= $this->get_level_policy( $this->extra_discounts[$i], $this->extra_levels[$i]);
            $h_exp .= "<br />"; 
        }
  
        return $h_exp; 
    }

    // return info as an array; let people format it as they wish
    // Users seeking a preformatted html string should use get_html_policy()
    function get_discount_info($product = 0) {
        $response_arr = array(); 
        if ($this->total_level_1 > 0) {
           $h_exp = $this->get_level_policy($this->total_discount_1, $this->total_level_1); 
           $response_arr[] = $h_exp; 
        }

        if ($this->total_level_2 > 0) {
           $h_exp = $this->get_level_policy($this->total_discount_2, $this->total_level_2); 
           $response_arr[] = $h_exp; 
        }

        if ($this->total_level_3 > 0) {
           $h_exp = $this->get_level_policy($this->total_discount_3, $this->total_level_3); 
           $response_arr[] = $h_exp; 
        }

        if ($this->total_level_4 > 0) {
           $h_exp = $this->get_level_policy($this->total_discount_4, $this->total_level_4); 
           $response_arr[] = $h_exp; 
        }

        if ($this->total_level_5 > 0) {
           $h_exp = $this->get_level_policy($this->total_discount_5, $this->total_level_5); 
           $response_arr[] = $h_exp; 
        }

        for ($i = 0, $n=sizeof($this->extra_levels); $i < $n; $i++) {
           $h_exp = $this->get_level_policy( $this->extra_discounts[$i], $this->extra_levels[$i]);
           $response_arr[] = $h_exp; 
        }
        return $response_arr; 
    }

    // Just in case you only want a number and not a string
    function format_discount($discount, $naked) {
        if ($naked) return $discount;
        if ($this->units == 'currency') {
            $off_amt = $this->print_amount($discount);
        } else if ($this->units == 'currency per item') {
            $off_amt = $this->print_amount($discount);
        } else {
            $off_amt = $discount . "%"; 
        }
        return $off_amt; 
    } 
    function format_level($level, $naked) {
        if ($naked) return $level;
        if ( isset($this->counting_method) && ($this->counting_method == 'currency')) { 
            $req_level = $this->print_amount($level);
        } else {
            $req_level = $level;
        }
        return $req_level; 
    } 

    // I wish there were a few more ways to get this information. :)
    function get_discount_parms($naked = false, $product = 0) {
        $response_arr = array(); 
        $pos = 0; 

        if ($this->total_level_1 > 0) {
           $response_arr[$pos]['discount'] = $this->format_discount($this->total_discount_1, $naked);
           $response_arr[$pos]['level'] = $this->format_level($this->total_level_1, $naked);
           $pos++; 
        }

        if ($this->total_level_2 > 0) {
           $response_arr[$pos]['discount'] = $this->format_discount($this->total_discount_2, $naked);
           $response_arr[$pos]['level'] = $this->format_level($this->total_level_2, $naked);
           $pos++; 
        }

        if ($this->total_level_3 > 0) {
           $response_arr[$pos]['discount'] = $this->format_discount($this->total_discount_3, $naked);
           $response_arr[$pos]['level'] = $this->format_level($this->total_level_3, $naked);
           $pos++; 
        }

        if ($this->total_level_4 > 0) {
           $response_arr[$pos]['discount'] = $this->format_discount($this->total_discount_4, $naked);
           $response_arr[$pos]['level'] = $this->format_level($this->total_level_4, $naked);
           $pos++; 
        }

        if ($this->total_level_5 > 0) {
           $response_arr[$pos]['discount'] = $this->format_discount($this->total_discount_5, $naked);
           $response_arr[$pos]['level'] = $this->format_level($this->total_level_5, $naked);
           $pos++; 
        }

        for ($i = 0, $n=sizeof($this->extra_levels); $i < $n; $i++) {
           $response_arr[$pos]['discount'] = $this->format_discount($this->extra_discounts[$i], $naked);
           $response_arr[$pos]['level'] = $this->format_level($this->extra_levels[$i], $naked);
           $pos++; 
        }
        return $response_arr; 
    }


    function get_html_explanation() {
        $h_exp = $this->explanation; 
        $h_exp = str_replace(YOUR_CURRENT_QUANTITY_DISCOUNT, "<h2>".YOUR_CURRENT_QUANTITY_DISCOUNT."</h2>", $h_exp);
        $h_exp = str_replace("\\n","<br />", $h_exp); 
        return $h_exp; 
    }

    function  setup() {
       // Add extra levels and discounts here in this manner: 
       // "Buy more than 100 items, get 50 (% or $, as per admin) off" 
       $this->add_extra_level_discount(104, 35);
    }
  }
?>