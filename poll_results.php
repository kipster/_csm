<tr><td>
<table align="center">
<?PHP
 if (isset($HTTP_GET_VARS['pollid'])) {
 $pollid=$HTTP_GET_VARS['pollid'];

 } else {
 $pollid=1;
  }
$poll_query = tep_db_query("SELECT pollid, timeStamp FROM phesis_poll_desc WHERE pollid='".$pollid."'");
$polls = tep_db_fetch_array($poll_query);
$title_query = tep_db_query("SELECT optionText from phesis_poll_data where pollid='".$pollid."' and voteid='0' and language_id = '" . $languages_id . "'");
$title = tep_db_fetch_array($title_query);
?>
<tr><td colspan="2" align="center" class="main"><font size="+1"><b><?php echo $title['optionText']?></b></font></td></tr>
 <tr><td>&nbsp;</td></tr>
<?php
$result=tep_db_query("SELECT SUM(optionCount) AS sum FROM phesis_poll_data WHERE pollid='".$pollid."'");
$polls=tep_db_fetch_array($result);
$sum=$polls['sum'];
for($i = 1; $i <= 12; $i++) {
$result=tep_db_query("SELECT pollid, optiontext, optioncount, voteid FROM phesis_poll_data WHERE (language_id = '" . $languages_id . "') and (pollid='".$pollid."') AND (voteid='".$i."')");
$polls=tep_db_fetch_array($result);
$optiontext=$polls['optiontext'];
$optioncount=$polls['optioncount'];
if ($optiontext) {
?>
<?php
 if ($sum) {
$percent = 100 * $optioncount / $sum;
} else {
$percent = 0;
 }
?>
<tr><td align="right" class="main">
<b><?php echo $optiontext; ?></b> : <? printf(" %.2f%% (%d)", $percent, $optioncount); ?></td>

 <td align="left">
<?php
$percentInt = (int)$percent * 4 * 1 * .5;
$percent2 = (int)$percent;
 if ($percent > 0) {
?>
<img src="images/leftbar.gif" height="15" width="7" Alt="<?echo $percent2?> %"><img src="images/mainbar.gif" height="15" width="<?echo $percentInt?>" Alt="<?echo $percent2?> %"><img src="images/rightbar.gif" height="15" width="7" Alt="<?echo $percent2?> %">

<?php
  } else {
?>
<img src="images/leftbar.gif" height="15" width="7" Alt="<? echo $percent2?> %"><img src="images/mainbar.gif" height="15" width="3" Alt="<? echo $percent2?> %"><img src="images/rightbar.gif" height="15" width="7" Alt="<? echo $percent2?> %">

<?php
 }


// printf(" %.2f%% (%d)", $percent, $optioncount);
?>

<?php
}
 }
?>
<tr><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
