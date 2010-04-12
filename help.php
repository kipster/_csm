<?php
/*
  $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_HELP);

  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_HELP));
    include 'header_main.php';
?>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td class="main">
<big><a target="_blank" href="includes/content/pap.pdf"><? echo TEXT_SBS_HEADING; ?></a></big><br>
<? echo TEXT_SBS;?><br><br>
<big><a href="faq.php"><? echo TEXT_FAQ_HEADING?></a></big><br>
<? echo TEXT_FAQ;?><br><br>
<big><a target="_blank" href="includes/content/explications.pdf"><? echo TEXT_INSTRUCTION_HEADING?></a></big><br>
<? echo TEXT_INSTRUCTION;?><br><br>
            </td>
          </tr>
        </table></td>
      </tr>
 <tr</table></td>
<!-- body_text_eof //-->
<?php include 'footer_main.php'; ?>