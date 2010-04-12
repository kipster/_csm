<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */
    $address = '2009_12';
    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_2009_12_F);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_2009_12_F));
    
    require('header_main.php');
    
    $id = $_POST['status'];
    $email = $_POST['email'];
?>

<!--- This_File --->
                                            <tr>
                                                <td>
                                                    <div id="e_2009_12_form">
                                                        <?php
                                                        if ($id == "sent" && empty($email)){$id = ''; $again = "try";}
                                                        if ($id == "sent") {
                                                                        $name = $_POST['nom'];
                                                                        $email = $_POST['email'];
                                                                        $adresse1 = $_POST['adresse1'];
                                                                        $adresse2 = $_POST['adresse2'];
                                                                        $cp = $_POST['cp'];
                                                                        $ville = $_POST['ville'];
                                                                        $hauteur = $_POST['hauteur'];
                                                                        $poitrine = $_POST['poitrine'];
                                                                        $taille = $_POST['taille'];
                                                                        $hanche = $_POST['hanche'];
                                                                        $check = $_POST['check'];
                                                                        
                                                                        include 'db_action.php';
                                                        }
                                                        else {
                                                        if ($again == "try") {
                                                        ?>
                                                                            <div style="text-align: left; font-weight : bold;">
                                                                                Veuillez entrer une adresse email. Merci.<br><br>
                                                                            </div>
                                                        <?php
                                                                                                                                ;}
                                                        ?>
                                                        <i>Lorsque que votre tenue est r&eacute;alis&eacute;e, <a href="2009_12_u.php">cliquez ici pour charger votre photo directement </a>ou envoyer la par email &agrave; <a class="e_2009_12_link" href="mailto:info@coudresurmesure.fr">info@coudresurmesure.fr</a>.<br></i>
                                                        <br><form method="post" action="2009_12_F.php">
                                                        <input name="status" value="sent" type="hidden">
                                                        <input name="page" value="2009_12" type="hidden">
                                                        <div>
                                                            <div class="e_2009_12_fcol1">
                                                                Nom & Pr&eacute;nom :<br><br>
                                                                Email :
                                                            </div>
                                                            <div class="e_2009_12_fcol2">
                                                                <input size=40 name="nom" type="text"><br><br>
                                                                <input size=40 name="email" type="text">
                                                            </div>
                                                            <div class="e_2009_12_line">
                                                                <div class="e_2009_12_input">
                                                                    <input type="submit" value="Je confirme m'inscrire pour le Super Challenge et je vous enverrai une photo de ma cr&eacute;ation avant le 15 d&eacute;cembre 2009"></center>
                                                                </div>
                                                                <center><br>Si vos n'avez pas encore le CD 1, vous pouvez bien sur le <a target="_blank" href="product_info.php?cPath=3&products_id=47">commander en cliquant ici</a> ou bien remplir le formulaire ci-dessous pour recevoir par la poste le patron &agrave; vos mesures gratuitement.</center>
                                                                <br><br>
                                                                <b><big>Si vous d&eacute;sirez recevoir le patron par lettre cliquez ici. <input type="checkbox" name="check"></big></b><br>Remplissez toutes les informations suivantes.<br>Merci.
                                                            </div>
                                                            <div class="e_2009_12_order">
                                                                <div class="e_2009_12_fcol1">
                                                                    Adresse :<br><br>
                                                                    <br><br>
                                                                    Code Postal :<br><br>
                                                                    Ville :<br><br>
                                                                </div>
                                                                <div class="e_2009_12_fcol2">
                                                                    <input size=40 name="adresse1" type="text"><br><br>
                                                                    <input size=40 name="adresse2" type="text"><br><br>
                                                                    <input size=40 name="cp" type="text"><br><br>
                                                                    <input size=40 name="ville" type="text">
                                                                </div>
                                                                <div class="e_2009_12_line">
                                                                    Vos mensurations :<br>
                                                                    <br>
                                                                    <div class="e_2009_12_25"><img src="_includes/_events/2009_12/hauteur.jpg" width="75" height="190"><br>Hauteur (en cm) :<br><input size=20 name="hauteur"</div>
                                                                    <div class="e_2009_12_25"><img src="_includes/_events/2009_12/poitrine.jpg" width="75" height="190"><br>Tour de poitrine (en cm) :<br><input size=20 name="poitrine"</div>
                                                                    <div class="e_2009_12_25"><img src="_includes/_events/2009_12/taille.jpg" width="75" height="190"><br>Tour de taille (en cm) :<br><input size=20 name="taille"</div>
                                                                    <div class="e_2009_12_25"><img src="_includes/_events/2009_12/hanche.jpg" width="75" height="190"><br>Tour de hanche (en cm) :<br><input size=20 name="hanche"</div>
                                                                </div>
                                                            </div>
                                                            <div class="e_2009_12_line">
                                                                <div class="e_2009_12_input">
                                                                <input type="submit" value="Je confirme m'inscrire pour le Super Challenge et je vous enverrai une photo de ma cr&eacute;ation avant le 15 d&eacute;cembre 2009"></center>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                        <?php
                                                        ;}
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
