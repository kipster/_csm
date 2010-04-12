<?php
$video1 = '<object width="560" height="340"><param name="movie" value="http://www.youtube.com/v/iQdOpXlil7Y&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/iQdOpXlil7Y&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="340"></embed></object>';
$video2 = '<object width="560" height="340"><param name="movie" value="http://www.youtube.com/v/H-TTu-VmHDI&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/H-TTu-VmHDI&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="340"></embed></object>';
$video3 = '<object width="560" height="340"><param name="movie" value="http://www.youtube.com/v/5Cy2w950-f0&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/5Cy2w950-f0&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="340"></embed></object>';
$video4 = '<object width="560" height="340"><param name="movie" value="http://www.youtube.com/v/oMz9JC1Xe6A&hl=en_US&fs=1&"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/oMz9JC1Xe6A&hl=en_US&fs=1&" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="560" height="340"></embed></object>';

if (isset($n)){
    if ($n == '1') {echo $video1;}
    elseif ($n == '2') {echo $video2;}
    elseif ($n == '3') {echo $video3;}
    elseif ($n == '4') {echo $video4;}
    else {echo 'Veuillez utiliser les liens appropreés';}
    }
else {
?>
<div>
    <div id="video_col1">
    <a class="zoom" rel="group" title="Comment Imprimer la notice" href="video_body.php?n=1"><img src="_includes/_images/_videos/notice.jpg"><br>Comment imprimer la notice d'utilisation</a>
    <br><br>
    <a class="zoom" rel="group" title="Comprendre le Mode de travail" href="video_body.php?n=3"><img src="_includes/_images/_videos/mode.jpg"><br>Comprendre le mode de travail</a>
    </div>
    <div id="video_col2">
    <a class="zoom" rel="group" title="Reconnaitre les icones" href="video_body.php?n=2"><img src="_includes/_images/_videos/icones.jpg"><br>Reconnaitre les icones</a>
    <br><br>
    <a class="zoom" rel="group" title="Comment imprimer nos patrons" href="video_body.php?n=4"><img src="_includes/_images/_videos/impression.jpg"><br>Comment imprimer vos patrons</a>
    </div>
</div>
<?php
 }
?>