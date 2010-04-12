<?php

if ($address == write_review) {
    echo tep_draw_form('product_reviews_write', tep_href_link(FILENAME_PRODUCT_REVIEWS_WRITE, 'action=process&products_id=' . $HTTP_GET_VARS['products_id']), 'post', 'onSubmit="return checkForm();"');
    }
    
if ($address == create_account) {    
    echo tep_draw_form('create_account', tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL'), 'post', 'onSubmit="return check_form(create_account);"') . tep_draw_hidden_field('action', 'process');
    }
    
if ($address == shopping_cart) {    
    echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_SHOPPING_CART, 'action=update_product'));
    }
    
if ($address == product_info) {    
    echo tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product'));
    }
    
if ($address == checkout) {    
    echo tep_draw_form('checkout_payment', tep_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL'), 'post', 'onsubmit="return check_form();"');
    }
    
if ($address == pass) {    
    echo tep_draw_form('password_forgotten', tep_href_link(FILENAME_PASSWORD_FORGOTTEN, 'action=process', 'SSL'));
    }
?>