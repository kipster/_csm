<?php
/*
  $Id: information.php,v 1.6 2003/02/10 22:31:00 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- information //-->
          <tr>
            <td>
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('text' => BOX_HEADING_INFORMATION);

  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('text' => '<a class="infoBoxContents" href="' . tep_href_link(FILENAME_INFO) . '">' . BOX_INFORMATION_INFO . '</a><br>' .
                                         '<a class="infoBoxContents" href="' . tep_href_link(FILENAME_HELP) . '">' . BOX_INFORMATION_HELP . '</a><br>' .
                                         '<a class="infoBoxContents" href="' . tep_href_link(FILENAME_SHIPPING) . '">' . BOX_INFORMATION_SHIPPING . '</a><br>' .
                                         '<a class="infoBoxContents" href="' . tep_href_link(FILENAME_CONTACT_US) . '">' . BOX_INFORMATION_CONTACT_US . '</a>');
  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- information_eof //-->
