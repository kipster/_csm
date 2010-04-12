<?php
/*
  $Id: create_account.php,v 1.11 2003/07/05 13:58:31 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Cr&eacute;er un compte');

define('HEADING_TITLE', 'Information de mon compte');


define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>REMARQUE:</b></font></small> Si vous avez déjà un compte chez nous, veuillez vous connecter à la page d\'<a href="%s"><u>ouverture de session</u></a>.');

define('EMAIL_SUBJECT', 'Bienvenue sur ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Cher Mr. %s,' . "\n\n");
define('EMAIL_GREET_MS', 'Cher Mme. %s,' . "\n\n");
define('EMAIL_GREET_NONE', 'Cher %s' . "\n\n");
define('EMAIL_WELCOME', 'Nous sommes heureux de vous accueillir dans notre boutique en ligne <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Vous pouvez maintenant utiliser les <b>services réservés</b> à nos clients :'
. "\n" . '<li><b>Panier permanent</b></li> - Tous les produits ajoutés à votre panier en ligne sont conservés entre vos visites jusqu\'à la finalisation de votre commande. Vous pouvez donc commencer vos achats aujourd\'hui et conclure votre commande lors de votre prochaine visite.'
. "\n" . '<li><b>Carnet d\'adresses </b></li> - Nous pouvons livrer vos produits à une adresse différente de la vôtre ! C\'est parfait pour envoyer des cadeaux à vos proches et amis.'
. "\n" . '<li><b>Historique des commandes</b></li> - Chacune de vos commandes dans notre boutique est conservée. Vous pouvez à tout moment consulter l\'historique ou connaître l\'avancement de votre dernière commande si elle n\'a pas encore été livrée.'
. "\n\n");
define('EMAIL_CONTACT', 'Pour plus d\'informations à propos de nos services en ligne, vous pouvez contacter le gestionnaire de la boutique par courrier électronique : ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b><u>REMARQUE IMPORTANTE :</u></b>Vous recevez cet email car il fait suite à l\'inscription d\'un nouveau client dans notre boutique en ligne. Si vous ne vous êtes pas inscrit sur ' . STORE_NAME . ', merci de le signaler au gestionnaire de la boutique à cette adresse : ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
?>
