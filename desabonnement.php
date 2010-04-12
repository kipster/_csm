<?php
    /*
    $Id: privacy.php,v 1.22 2003/06/05 23:26:23 hpdl Exp $

    osCommerce, Open Source E-Commerce Solutions
    http://www.oscommerce.com

    Copyright (c) 2003 osCommerce

    Released under the GNU General Public License
    */

    require('includes/application_top.php');
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_DES);
    $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_DES));
    $page = $_POST['page'];
    $email = $_POST['email'];
    $id = $_POST['status'];
    if ($id == "sent" && empty($email)){$id = ""; $again = "try";}
    if (empty($id) && isset($_GET['email'])){$id='sent'; $page = 'des'; $email = $_GET['email'];}
    require('header_main.php');
?>

<!--- This_File --->
                                            <tr>
                                                <td>
                                                    <table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                        <tr>
                                                            <td class="main">
                                                                <br>
                                                                <?php
                                                                            if ($id == "sent"){
                                                                                include 'db_action.php';
                                                                                echo TEXT_OK;
                                                                                }
                                                                            else {
                                                                                if ($again == "try") {
                                                                ?>
                                                                                    <div style="text-align: left; font-weight : bold;">
                                                                                        <?php echo TEXT_ER1; ?><br><br>
                                                                                    </div>
                                                                <?php
                                                                                    ;}
                                                                ?>
                                                                        <br>
                                                                        <form method="post" action="desabonnement.php">
                                                                            <input name="status" value="sent" type="hidden">
                                                                            <input name="page" value="des" type="hidden">
                                                                            <table align="left" style="text-align: left; width: 80%;" border="1" cellpadding="2" cellspacing="2">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><div style="text-align: right; font-weight : bold;">Email :</div></td>
                                                                                        <td><input size=50 name="email" type="text"></td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td align="center" colspan="2" rowspan="1"><input type="submit" value="Valider ma d&eacute;sinscription"></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </form>
                                                                <?php
                                                                        ;}
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <!-- main_body_text_eof //-->
<!--- This_File_eof --->

<?php
    require('footer_main.php');
?>
