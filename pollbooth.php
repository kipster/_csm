<?php
  
  //function to check that there is no HTML in the comment field.

function screenForm($field_value){
	$stripped = strip_tags($field_value);
// validation rules
	if (empty($field_value) || ($field_value!=$stripped) || stristr($field_value,'http') || stristr($field_value,'www')) { 
// something in the field value was HTML or post was empty or contained http or www
	return false;
	}
	else return true;
}  

  require('includes/application_top.php');
  require(DIR_WS_LANGUAGES . $language . '/pollbooth.php');
  $location = ' : <a href="' . tep_href_link('pollbooth.php', 'op=results', 'NONSSL') . '" class="headerNavigation"> ' . NAVBAR_TITLE_1 . '</a>';
  DEFINE('MAX_DISPLAY_NEW_COMMENTS', '5');
if (($HTTP_GET_VARS['action']=='do_comment')&& (screenForm($HTTP_POST_VARS['comment']))) {
   $comment_query_raw = "insert into phesis_comments (pollid, customer_id, name, date, host_name, comment,language_id) values ('" . $HTTP_GET_VARS['pollid'] . "', '" . $customer_id . "', '" . addslashes($HTTP_POST_VARS['comment_name']) . "', now(),'" . $REMOTE_ADDR . "','" . addslashes($HTTP_POST_VARS['comment']) . "','" . $languages_id . "')";
   $comment_query = tep_db_query($comment_query_raw);
  $HTTP_GET_VARS['action'] = '';
   $HTTP_GET_VARS['op'] = 'results';
}
  $breadcrumb->add(Sondage, tep_href_link('pollbooth.php?op=results&pollid=' . $pollid));

    include 'header_main.php';
    ?>
      </table>
      <table width="100%">
<?php 
if (!isset($HTTP_GET_VARS['op'])) {
        $HTTP_GET_VARS['op']="list";
        }
switch ($HTTP_GET_VARS['op']) {
     case "results":
        echo("<table align='center' valign='top'><tr><td>\n");
        include("poll_results.php");
        echo("</tr></table>\n");
        break;

/*     case 'comment':
        echo("<table align='center' valign='top'><tr><td>\n");
        include("poll_comment.php");
        echo("</tr></table>\n");
        break;
*/
     case 'list':
     echo("<table align='center' valign='top'><tr><td>\n");
        include("poll_list.php");
        echo("</tr></table>\n");
        break;

     case "vote":
        echo("<table align='center' valign='top'><tr><td>\n");
        include("poll_vote.php");
        echo("</tr></table>\n");
        break;
}
if (!$nolink) {
?>
<br><center><?php echo '<a href="' . tep_href_link(FILENAME_DEFAULT, '', 'NONSSL') . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>' . "</center>"; ?>
<?php
}
?>

<!-- body_text_eof //-->
<?php include 'footer_main.php'; ?>