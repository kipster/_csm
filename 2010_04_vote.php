<?php
                    /*
                    //End of challenge, display result
                    $page = '2009_12_gallery2';
                    $display = 'result';
                    include 'db_action.php';
                    */

                    //Challenge & voting system on
                    
                    $display = 'form';
                    if (empty($_GET['page']) && isset($page) && empty($_POST['status'])){
                        $echo = 'no';
                        $display = 'result';
                        include 'db_action.php';
                    }
                    if (isset($_GET['page'])){
                        $echo = 'yes';
                        $page = $_GET['page'];
                        $display = 'result';
                        include 'db_action.php';
                    }
                    
                    if (isset($_POST['status'])){
                        if (isset($_POST['tenue'])){
                            $tenue = $_POST['tenue'];
                            $display = 'result';
                            include 'db_action.php';
                            
                        }
                        else {
                            $error = 'Veuillez sélectionner une tenue avant de voter<br>';
                        }
                    }
                    if ($display == 'form'){
                        if (isset($error)){echo $error;}
                    ?>
                        <h3>Veuillez selectionner votre tenue pr&eacute;f&eacute;r&eacute;e.</h3>
                        <form action="2010_04_gallery.php" method="post">
                        <input type="radio" name="tenue" value="1" /> Tenue 1
                        <br />
                        <input type="radio" name="tenue" value="2" /> Tenue 2
                        <br>
                        <input type="radio" name="tenue" value="3" /> Tenue 3
                        <br>
                        <input type="radio" name="tenue" value="4" /> Tenue 4
                        <br>
                        <input type="radio" name="tenue" value="5" /> Tenue 5
                        <br><br>                        
                        <input name="status" value="sent" type="hidden">
                        <input name="page" value="2010_04_gallery" type="hidden">
                        <input type="submit" />
                        </form>
                        <br><b><a style="color: purple;" href="<?php echo tep_href_link('2010_04_gallery.php', 'page=2010_04_result', 'SSL') ?>">[Voir les r&eacute;sultats]</a></b>
                    <?php
                    }
                    ?>
