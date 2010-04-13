<?php
/*
  $Id: login.php,v 1.80 2003/06/05 23:28:24 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  $address = '2009_12';
  require('includes/application_top.php');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_2009_12);
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_2009_12));
  include 'header_main.php';
  
  $tenue = $_POST['tenue'];
?>
            <tr>
              <td>
                <div id="e_2009_12_col1">
                    <table width="100%">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <img src="_includes/_events/2009_12/results.jpg">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%">
                        <tbody>
                            <?php
                            $dir = './_includes/_events/2009_12/gallery/';
                            $link = '<td align="center" valign="center"><a class="zoom" rel="group" title="Galerie Photo" href="' . $dir;
                            $linkend = '">';
                            $src = '<img src="' . $dir;
                            $srcmid = '"width="200px"><br><b>Tenue ';
                            $srcend = '</b><br></td>';

                            $i = 0;
                            $j = 0;
                            if ($handle = opendir($dir)) {
                                while (false !== ($file = readdir($handle))) {
                                    if ($file != "." && $file != ".." && $file != "bg" && $file != "bg" && $file != "controller" && $file != "corners") {
                                        if ($i == 0)     {$image1 = $file;
                                                          $i++;
                                                          $j++;
                                                          $t1 = $j;
                                                          }
                                        elseif ($i == 1) {$image2 = $file;
                                                          $i++;
                                                          $j++;
                                                          $t2 = $j;
                                                          }
                                        elseif ($i == 2) {$image3 = $file;
                                                          $i=0;
                                                          $j++;
                                                          $t3 = $j;
                                                                echo  '<tr>' .
                                                                $link . $image1 . $linkend . $src . $image1 . $srcmid . $t1 . $srcend .
                                                                $link . $image2 . $linkend . $src . $image2 . $srcmid . $t2 . $srcend . 
                                                                $link . $image3 . $linkend . $src . $image3 . $srcmid . $t3 . $srcend . 
                                                                '</tr>';
                                                          }
                                    }
                                }
                                closedir($handle);
                            }
                            if ($i != 0) {
                                    echo  '<tr>';
                                        if ($i == 1 || $i == 2) {
                                            echo $link . $image1 . $linkend . $src . $image1 . $srcmid . $t1 . $srcend;
                                                if ($i == 2) {
                                                    echo $link . $image2 . $linkend . $src . $image2 . $srcmid . $t2 . $srcend;
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
                </div>
                <div id="e_2009_12_col2" style="text-align: center">
                    <div style="color: purple; font-weight: bold; border-style: outset; border-color: purple;"><h1>Sondage</h1><h3>Super Challenge de Noel</h3></div>
                    <?php
                        include '2009_12_vote.php';
                    ?>
                </div>
            </td>
        </tr>
      </table>
    </td>
<!-- body_text_eof //-->
<?php include 'footer_main.php'; ?>
