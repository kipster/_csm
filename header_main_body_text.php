                                    <!-- main_body_text --->
                                    <td width="100%" valign="top">
                                        <?php include 'form.php'; ?>
                                        <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '20'); ?></td>
                                            </tr>
                                            <tr>
                                                <td class="pageHeading">
                                                <?php
                                                    if ($address == product_info) {
                                                ?>
                                                <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                    <tr>
                                                        <td class="pageHeading" valign="top"><?php echo $products_name; ?></td>
                                                        <td class="pageHeading" align="right" valign="top"><?php echo $products_price; ?></td>
                                                    </tr>
                                                </table>
                                                <?php
                                                    }
                                                else {
                                                    echo HEADING_TITLE;
                                                }
                                                ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                            </tr>