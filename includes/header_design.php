<!--- Header_design--->
<a href="">
<div id=header_logo_space>
</div>
</a>

<div id=header_menu>
<a class="header_button" href="shopping_cart.php"><span>Votre panier</span></a><br><br>
<a class="header_button" href="contact_us.php"><span>Contactez nous</span></a><br><br>
<a class="header_button" href="account.php"><span><?php if (tep_session_is_registered('customer_id')) {echo 'Mon compte';} else {echo 'Identifiez-Vous ou créez votre compte';} ?></span></a>
</div>

<!-- Breadcrumb //-->
                    <div id="breadcrumb">
                        <?php include 'breadcrumb.php'; ?>
                    </div>
                    <!-- Breadcrumb_eof //-->
<!--- Header_design_eof --->