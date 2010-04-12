<!-- body_text for default index//-->
<div id="welcome_page">
    <div class="col650">
      <div id="welcome_page_header">
        <img src="_includes/_images/m_button_new.gif" alt="Les nouveaut&eacute;s">
      </div>
      <div id="welcome_page_box1">
        <div id="welcome_page_text1">
        <?php include 'admin/includes/modules/welcomepage/show.php' ?>
        </div>
      </div>
      
      <div id="welcome_page_header">
        <a href="view.php"><img src="_includes/_images/m_button_photo.gif" alt="La galerie photo"></a>
      </div>
      <div id="welcome_page_box2">
        <?php 
        include '_includes/_vision/index.php';
        ?>
      </div>
      
      <div id="welcome_page_header">
        <img src="_includes/_images/m_button_newsletter.gif" alt="La galerie photo">
      </div>
      <div id="welcome_page_box3">
          <?php
          if ($id == "sent" && empty($email)){$id = ""; $again = "try";}
          if ($id == "sent") {$name = $_POST['name'];
                            $email = $_POST['email'];
                            include 'db_action.php';
          }
          else {
          if ($again == "try") {
            ?>
                                <div style="text-align: left; font-weight : bold;">
                                    Veuillez entrer une adresse email.<br>
                                </div>
            <?php
                                                                                    ;}
          ?>
          <i>Pour connaitre la sortie de nos nouveaux CDs et suivre nos nouvelles, laissez vos coordonn&eacute;es:<br></i>
          <form method="post" action="index.php">
              <input name="status" value="sent" type="hidden">
              <input name="page" value="news" type="hidden">
              <div id="wb3_form">Nom : <input size=40 name="name" type="text"> Email : <input size=40 name="email" type="text"><br>
              <input type="submit" value="Envoyer le formulaire">
              </div>        
              </form>
              <?php
              ;}
              ?>
      </div>
    </div>
    <div class="col250">
        <div id="wb4_lot">
        <a class="newiframe" rel="group" title="Achetez par lot" href="lot_text.php?iframe&width=950&height=450">Achetez nos CDs<br>par 2, 3, 4, 5...<br><br>Faites encore plus<br>d'&eacute;conomies!!!</a>
        </div>
       <div id="wb5_submenu">
            <div id="wb5_col1">
                <div class="wb5_box"><a href="video.php"><img src="_includes/_images/m_bouton.gif"></a></div>
                <div class="wb5_box"><a class="newiframe" rel="group" title="Télécharger nos CDs" href="download_info.php?iframe&width=950&height=450""><img src="_includes/_images/m_bouton.gif"></a></div>
            </div>
            <div id="wb5_col2">
                <div class="wb5_box wb5_box_text"><a href="video.php">Nos vidéos explicatives</a><br>Comment utiliser nos CDs.</div>
                <div class="wb5_box wb5_box_text"><a class="newiframe" rel="group" title="Télécharger nos CDs" href="download_info.php?iframe&width=950&height=450""><small>Télécharger nos CDs!</small></a><br>Comment ça marche?</div>
            </div>        
        </div>
        <div id="wb6_shipping">
        <a href="shipping.php">Livraison gratuite<br>à partir de 50 €</a>
        </div>
        <div id="wb7_bs">
            <div id="wb7_header">
                <div id="wb7_col1">
                    <img src="_includes/_images/m_bouton.gif">
                </div>
                <div id="wb7_col2">
                    Meilleurs Ventes
                </div>
                <div id="wb7_col3">
                    <img src="_includes/_images/m_bouton.gif">
                </div>
            </div>
            <div id="wb7_main">
                <?php
                    $best_sellers_query = tep_db_query("select distinct p.products_id, pd.products_name, p.products_image, p.products_price, p.products_tax_class_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_ordered > 0 and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.products_ordered desc, pd.products_name limit " . MAX_DISPLAY_BESTSELLERS);
                    $rows = 0;
                        while ($best_sellers = tep_db_fetch_array($best_sellers_query)) {
                            
                            if ($new_price = tep_get_products_special_price($best_sellers['products_id'])) {
                                $products_price = '<div class="wb7_price"><small><small><s>' . $currencies->display_price($best_sellers['products_price'], tep_get_tax_rate($best_sellers['products_tax_class_id'])) . '</s></small></small><br><span class="productSpecialPrice">' . $currencies->display_price($new_price, tep_get_tax_rate($best_sellers['products_tax_class_id'])) . '</span></div>';
                            } else {
                                $products_price = '<div class="wb7_price">' . $currencies->display_price($best_sellers['products_price'], tep_get_tax_rate($best_sellers['products_tax_class_id'])) . '</div>';
                            }
                            
                            $rows++;
                            $bestsellers_list .= '<div class="wb7_number">' . $rows . '</div>' . $products_price;
                            $bestsellers_list .= '<div id="wb7_bs_list"><a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $best_sellers['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $best_sellers['products_image'], $best_sellers['products_name'], 70, 70) . '<br>';
                            $bestsellers_list .= $best_sellers['products_name'] . '</a><br></div>';
                        }
                    echo $bestsellers_list;
                ?>
            </div>
        </div>
    </div>
</div>
