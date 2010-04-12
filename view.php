<?php
/*
  $Id: login.php,v 1.80 2003/06/05 23:28:24 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_PHOTOS);
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_PHOTOS));
  include '_includes/script.js/fancybox/fancybox_header.php';
  include 'header_main.php';
  $address = 'index';
?>
        <tr>
          <td>
            <table width="100%">
                <tbody>
<?php
$dir = './_includes/_vision/img/';
$link = '<td align="center" valign="center"><a class="zoom" rel="group" title="Galerie Photo" href="' . $dir;
$linkend = '">';
$src = '<img src="' . $dir;
$srcend = '"width="270px" height="180px"></td>';

$i = 0;
if ($handle = opendir($dir)) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && $file != "bg" && $file != "bg" && $file != "controller" && $file != "corners") {
            if ($i == 0)     {$image1 = $file;
                              $i++;
                              }
            elseif ($i == 1) {$image2 = $file;
                              $i++;
                              }
            elseif ($i == 2) {$image3 = $file;
                              $i=0;
                              echo  '<tr>' . 
                                    $link . $image1 . $linkend . $src . $image1 . $srcend .
                                    $link . $image2 . $linkend . $src . $image2 . $srcend . 
                                    $link . $image3 . $linkend . $src . $image3 . $srcend . 
                                    '</tr>';
                              }
        }
    }
    closedir($handle);
}
if ($i != 0) {
        echo  '<tr>';
            if ($i == 1 || $i == 2) {
                echo $link . $image1 . $linkend . $src . $image1 . $srcend;
                    if ($i == 2) {
                        echo $link . $image2 . $linkend . $src . $image2 . $srcend;
                                 }
                    else {
                        echo '<td></td>';
                          }
            }
        echo '<td></td></tr>';
}        
?>
                    </tbody>
                </table>
            </td>
        </tr>
      </table>
    </td>
<!-- body_text_eof //-->
<?php include 'footer_main.php'; ?>