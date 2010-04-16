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
  
  if (!tep_session_is_registered('customer_id')) {
  $login = 'off';
  }else{
  $custid_query = tep_db_query("select customers_id from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
  $custid_result = tep_db_fetch_array($custid_query);
  $id = $custid_result['customers_id'];
  }
  
if ($_GET['login'] == 'on'){
  if (!tep_session_is_registered('customer_id')) {
    $navigation->set_snapshot();
    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));
  }
}


//$id = 4;
   
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_2010_04);
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_2010_04));
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
                                    <!-- <img src="_includes/_events/2010_04/results.jpg"> -->
                                    <br>
                                    <h2>Cliquer sur chaque image pour l'agrandir.</h2>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%">
                        <tbody>
                            <?php
                            $dir = './_includes/_events/2010_04/gallery/';
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
                    <div style="color: purple; font-weight: bold; border-style: outset; border-color: purple;"><h1>Sondage</h1><h3>Challenge de Printemps</h3></div>
                    <?php
                        if ($login != 'off'){include '2010_04_vote.php';}
                        else {$page = '2010_04_result';
                            include '2010_04_vote.php';
                            echo '<p class="borderred pad5">Seul les clients avec un compte sur coudresurmesure.fr peuvent voter.<br>Pour vous enregistrer ou cr&eacute;er un compte, veuillez<a href="' . tep_href_link('2010_04_gallery.php', 'login=on', 'SSL') . '"> cliquer ici</a>.</p>';
                            }
                    ?>
                </div>
            </td>
        </tr>
      </table>
    </td>
<!-- body_text_eof //-->
<?php include 'footer_main.php'; ?>
