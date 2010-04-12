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
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_2009_12_U);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_2009_12_U));
    
    require('header_main.php');
?>

<!--- This_File --->
                                            <tr>
                                                <td>
                                                    <div>
                                                        <?php
                                                        $file = $_POST['status'];
                                                        $email = $_POST['email'];
                                                        $name = $_POST['nom'];
                                                        
                                                        if ($file == sent) {
                                                        
                                                            if (empty($email) or empty($name)){
                                                                $again = "try";
                                                            }
                                                            
                                                            else {
                                                                $target_path = "./_includes/_events/2009_12/images_customers/";
                                                                $target_path = $target_path . basename( $name . '_' . $_FILES['uploadedfile']['name']);
                                                                
                                                                if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
                                                                    $ta = "Merci beaucoup,<br><br>Nous avons bien reçu le fichier : ".  basename( $_FILES['uploadedfile']['name']);
                                                                    $file_name = basename( $name . '_' . $_FILES['uploadedfile']['name']);
                                                                    include 'db_action.php';
                                                                }
                                                                else {                                                            
                                                                    $sorry = "Désolé, le fichier n'a pas été sélectionné.";
                                                                }
                                                            }
                                                        }
                                                        
                                                        if (isset($ta)){
                                                            echo $ta;
                                                            }
                                                        
                                                        if (empty($ta)){
                                                            if ($again == "try") {
                                                                ?>
                                                                <div style="text-align: left; font-weight : bold;">
                                                                    Veuillez entrer votre nom et une adresse email. Merci beaucoup.<br><br>
                                                                </div>
                                                                <?php
                                                            }
                                                            
                                                            if (isset($sorry)){
                                                                echo $sorry;
                                                                }
                                                        ?>
                                                        <form enctype="multipart/form-data" action="2009_12_u.php" method="POST">
                                                        <div class="e_2009_12_fcol1">
                                                            Nom & Pr&eacute;nom :<br><br>
                                                            Email :
                                                        </div>
                                                        <div class="e_2009_12_fcol2">
                                                            <input size=40 name="nom" type="text"><br><br>
                                                            <input size=40 name="email" type="text">
                                                            </div>
                                                        <input name="page" value="2009_12_u" type="hidden">
                                                        <h1>Cliquez sur le bouton parcourir et séléctionnez votre photo.</h1>
                                                        <input name="status" value="sent" type="hidden">
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                                                        Sélectionnez votre fichier: <input name="uploadedfile" type="file" /><br />
                                                        <br><input type="submit" value="Envoyer le fichier" />
                                                        </form>
                                                        <br><br>
                                                        Ou envoyez nous votre photo &agrave; l'email suivant : <a class="e_2009_12_link" href="mailto:info@coudresurmesure.fr">info@coudresurmesure.fr</a>.
                                                        <?php
                                                        };
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
