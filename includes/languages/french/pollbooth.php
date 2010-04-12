<?php
/*
  $Id: pollbooth.php,v 1.5 2003/04/06 21:45:33 wilt Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Copyright (c) 2000,2001 The Exchange Project

  Released under the GNU General Public License
*/
if (!isset($HTTP_GET_VARS['op'])) {
	$HTTP_GET_VARS['op']="list";
	}
if ($HTTP_GET_VARS['op']=='results') {
  define('TOP_BAR_TITLE', 'Sondage');
  define('HEADING_TITLE', 'Résultat du sondage');
  define('SUB_BAR_TITLE', 'Résultat du sondage');
}
if ($HTTP_GET_VARS['op']=='list') {
  define('TOP_BAR_TITLE', 'Sondage');
  define('HEADING_TITLE', 'Général');
  define('SUB_BAR_TITLE', 'Sondages Précédent');
}
if ($HTTP_GET_VARS['op']=='vote') {
  define('TOP_BAR_TITLE', 'Sondage');
  define('HEADING_TITLE', 'Merci pour votre réponse');
  define('SUB_BAR_TITLE', 'Votez pour ce sondage');
}
if ($HTTP_GET_VARS['op']=='comment') {
  define('HEADING_TITLE', 'Commentaire sur ce sondage');
}
define('_WARNING', 'Warning : ');
define('_ALREADY_VOTED', 'Désolé, vous avez déja voté.');
define('_NO_VOTE_SELECTED', 'Choisissez une option.');
define('_TOTALVOTES', 'Nombre de votes totals');
define('_OTHERPOLLS', 'Autres Sondages');
define('NAVBAR_TITLE_1', 'Sondage');
define('_POLLRESULTS', 'Résultats du sondage');
define('_VOTING', 'Votez');
define('_RESULTS', 'Voir les Résultas');
define('_VOTES', 'Votes');
define('_VOTE', 'VOTEZ');
define('_COMMENT', 'Commentaire');
define('_COMMENTS', 'Commentaires');
define('_COMMENTS_POSTED', 'Commentaires Postés');
define('_COMMENTS_BY', 'Comment made by ');
define('_COMMENTS_ON', ' on ');
define('_YOURNAME', 'Votre Nom:');
define('_YOURCOMMENT', 'Votre Commentaire:');
define('_PUBLIC','Public');
define('_PRIVATE','Private');
define('_POLLOPEN','Sondage disponible');
define('_POLLCLOSED','Désolé, ce sondage est fermé.');
define('_POLLPRIVATE','Private Poll, you must be logged in to vote');
define('_ADD_COMMENTS', 'Add Comment');
define('TEXT_DISPLAY_NUMBER_OF_COMMENTS', 'Voir les <b>%d</b> to <b>%d</b> (of <b>%d</b> commentaires)');
?>
