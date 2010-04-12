<?php
require_once('_includes/_vision/inc/func.inc.php');
//require_once('inc/func.inc.php');
//include '_includes/script.js/fancybox/fancybox_header.php';
/**  setup  **/
$imgDir	= "_includes/_vision/img"; 		// image directory
$imgSub	= false;		// include sub directories when gathering images?
$imgId	= "lgImage"; 	// id tag for images

$getImg = lsDir($imgDir,$imgSub); // gather images
$numImgs = count($getImg); // count images

?>		
		<script type="text/javascript" charset="utf-8">
			var NumberOfImages = <?php echo $numImgs?>;
            var img = new Array(NumberOfImages);
            var txt = new Array(NumberOfImages);
            var imgNumber = 0;   

			<?php $i=0; foreach ($getImg as $image): ?>
				img[<?php echo $i?>] = "<?php echo $image?>";
				txt[<?php echo $i?>] = "<?php echo $i+1?>";
			<?php $i++; endforeach; ?>
		
			/* no need to change, unless you're a hacker */
			if (document.images) {
            preload_image_object = new Image();
                                   var i = 0;
                                   for(i=0; i<=<?php echo $numImgs-1?>; i++) preload_image_object.src = img[i];
                                 }
			function NextImage() { imgNumber++; if (imgNumber == NumberOfImages) imgNumber = 0; document.getElementById("<?php echo $imgId?>").src = img[imgNumber]; document.getElementById('details').innerHTML = txt[imgNumber]; }
			function PreviousImage() { imgNumber--; if (imgNumber < 0) imgNumber = NumberOfImages - 1; document.getElementById("<?php echo $imgId?>").src = img[imgNumber]; document.getElementById('details').innerHTML = txt[imgNumber]; }
		</script>
		
			<!-- content -->
			<!-- everything's stored within this div -->
			<div id="wb2_content">
				<div class="wb2_previous">
					<a href="#prev" onclick="PreviousImage();return false;" title="Photo pr&eacute;c&eacute;dente">
                    <img src="images/pixel_trans.gif" width="80px" height="120px">
                    <img src="_includes/_vision/img/controller/controller_prev.png">
                    <img src="images/pixel_trans.gif" width="80px" height="100px">
                    </a>
				</div>
                <!-- image -->
				<div class="wb2_photo">
                    <img src="<?php echo $getImg[0]?>" id="<?php echo $imgId?>" width="400" height="267" alt="" />
				</div>
                <div class="wb2_next">
                    <a href="#next" onclick="NextImage();return false;" title="Photo suivante">
                    <img src="images/pixel_trans.gif" width="80px" height="120px">
                    <img src="_includes/_vision/img/controller/controller_next.png">
                    <img src="images/pixel_trans.gif" width="80px" height="100px">
                    </a>
				</div>
                <div class="wb2_view">
                    <a href="view.php">D&eacute;couvrez notre galerie photo avec vos confections &agrave; partir de nos patrons...<br>Cliquez ici</a>
                </div>
			<!-- /content -->
            </div>