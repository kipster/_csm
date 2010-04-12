<?php
if ($address == '2009_12') {
    echo '<link rel="stylesheet" type="text/css" href="stylesheetevent.css" media="screen" charset="utf-8">';
    } 
    
if ($address == write_review) {
    include 'script_popup_windows.php';
    include 'script_product_review_write.php';
    }
    
if ($address == product_info) {
    include '_includes/script.js/fancybox/fancybox_header.php';
    include 'script_popup_windows.php';    
    }
    
if ($address == home or $address == video or $address == '2009_12') {
    include '_includes/script.js/fancybox/fancybox_header.php';
}

if ($address == login){
    include 'script_open_session.php';
}

if ($address == checkout){
    include 'script_checkout.php';
}
    
?>