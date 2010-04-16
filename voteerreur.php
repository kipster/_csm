<?php
/*
  $Id: login.php,v 1.80 2003/06/05 23:28:24 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/


require('includes/application_top.php');

require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_2009_12);
$breadcrumb->add('Erreur', tep_href_link('2010_04_gallery.php'));
include 'header_main.php';

if (isset($POST['status'])){
    $custid = $_POST['custid'];
    $tenue = $_POST['tenue'];
}

if (isset($_GET['custid'])){
    $custid = $_GET['custid'];
    $tenue = $_GET['tenue'];
}

$getcustinfo = tep_db_query("SELECT `customers_firstname`, `customers_lastname`, `customers_email_address` FROM `customers` WHERE `customers_id` = '" . $custid . "'LIMIT 0, 30 ");
$gcir = tep_db_fetch_array($getcustinfo);

$custfirstn = $gcir['customers_firstname'];
$custlasstn = $gcir['customers_lastname'];
$custemail = $gcir['customers_email_address'];
$to = $custemail;

if ($_GET['status'] == 'erreur'){
    $text = '
    <form enctype="multipart/form-data" action="voteerreur.php" method="POST">
    <input name="status" value="sent" type="hidden">
    <input name="custid" value="' . $custid . '" type="hidden">
    <input name="tenue" value="' . $tenue . '" type="hidden">
    <p>Il semblerait que votre ordinateur ou votre compte ait d&eacute;ja vot&eacute;, si il y a une raison pour cela ou que vous pensez que ce message vous est adress&eacute; par erreur, donnez un descriptif rapide ci-dessous<p>
    <p><textarea name="raison"></textarea></b></p>
    <input type="submit" value="Envoyer" />
    </form>
    ';
}

elseif ($_GET['status'] == 'force'){
    $subject = 'Votre vote a été accepté';
    $headers = 'From: "CoudreSurMesure" <info@coudresurmesure.fr>' . "\n";
    $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
    $headers .='Content-Transfer-Encoding: 8bit'; 
    $message = '<html><head></head><body>';
    $message .= '<p>Bonjour,</p><p>Votre vote a &eacute;t&eacute; accept&eacute; pour la tenue ' . $tenue . '.</p><p>En vous remerciant,</p><p>L\'&eacute;quipe de CoudreSurMesure.</p>';   
    $message .= '</body></html>';
    if (mail ($to,$subject,$message,$headers)){
        $text = 'Le message est envoye a ' . $custfirstn . ' ' . $custlastn . '.';
        $page = '2010_04_force';
        include 'db_action.php';
    }
}

elseif ($_GET['status'] == 'reject'){
    $subject = 'Votre vote n\'a pas été accepté';
    $headers = 'From: "CoudreSurMesure" <info@coudresurmesure.fr>' . "\n";
    $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
    $headers .='Content-Transfer-Encoding: 8bit'; 
    $message = '<html><head></head><body>';
    $message .= '<p>Bonjour,</p><p>Votre vote n\'a pas &eacute;t&eacute; accept&eacute; pour la tenue ' . $tenue . '. Nous avons &eacute;stim&eacute; qu\'il ne respectait pas les regles de notre concours. Veuillez nous r&eacute;pondre directement pour plus d\'informations.</p><p>En vous remerciant,</p><p>L\'&eacute;quipe de CoudreSurMesure.</p>';   
    $message .= '</body></html>';
    if (mail ($to,$subject,$message,$headers)){
        $text = 'Le message est envoye a ' . $custfirstn . ' ' . $custlastn . '.';
    }
}

elseif ($_POST['status'] == 'sent'){
    $to = 'info@coudresurmesure.fr';
    $subject = 'Je veux revoter...';
    $headers = 'From: "' . $custfirstn . ' ' . $custlasstn . '" <' . $custemail . '>' . "\n";
    $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
    $headers .='Content-Transfer-Encoding: 8bit'; 
    $message .= '<html><head></head><body>';
    $message = '<p>Bonjour,</p><p>Je desire revote, parceque:</p><p><i>';
    $message .= $_POST['raison'];
    $message .= '</i></p><p><a href="http://www.coudresurmesure.fr/shop/voteerreur.php?status=force&custid=' . $custid . '&tenue=' . $tenue . '">Clique ici pour accepter et forcer le vote</a></p>';
    $message .= '<p><a href="http://www.coudresurmesure.fr/shop/voteerreur.php?status=reject&custid=' . $custid . '&tenue=' . $tenue . '">Clique ici pour rejeter le vote et informer le client par email</a></p><p>A la prochaine, ton frere.</p>';
    $message .='</body></html>';
    if (mail ($to,$subject,$message,$headers)){$text = 'Votre message est envoy&eacute, Merci.';}
}
  
else {$text = 'Vous n\'avez pas suivi un lien autorise pour arriver ici, veuillez <a href="index.php">cliquer ici.</a>';}
?>
            <tr>
              <td> 
              <?php echo $text; ?>
              </td>
                                            </tr>
                                            <tr>
                                                <table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                    <tr>
                                                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                        <td align="right"><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT) . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                                                        <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                    </tr>
                                                </table>
                                            </tr>

                                        </table>
                                    </td>
                                    <!-- main_body_text_eof //-->
<!--- This_File_eof --->

<?php
    require('footer_main.php');
?>

                          

