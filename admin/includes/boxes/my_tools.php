<?php
/*
  $Id: tools.php,v 1.21 2003/07/09 01:18:53 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- Welcome_Page_Editor //-->
          <tr>
            <td>
<?php
  $heading = array();
  $contents = array();

  $heading[] = array('text'  => BOX_HEADING_MT,
                     'link'  => tep_href_link(FILENAME_MT, 'selected_box=my_tools'));
    if ($selected_box == 'my_tools') {
    $contents[] = array('text'  => '<a href="' . tep_href_link(FILENAME_MT_WP) . '" class="menuBoxContentLink">' . BOX_MT_WP . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_MT_UP) . '" class="menuBoxContentLink">' . BOX_MT_UP . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_MT_CUSTOMER) . '" class="menuBoxContentLink">' . BOX_MT_CUSTOMERS . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_MT_NEWS) . '" class="menuBoxContentLink">' . BOX_MT_NEWS . '</a><br>' .
                                   '<a href="' . tep_href_link(FILENAME_MT_2009_12) . '" class="menuBoxContentLink">' . BOX_MT_2009_12 . '</a>');
  }
                     
  $box = new box;
  echo $box->menuBox($heading, $contents);
?>
            </td>
          </tr>
<!-- Welcome_Page_Editor_eof //-->