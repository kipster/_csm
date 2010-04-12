<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>
<title>Editer ma page d'accueil</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>

<!-- OF COURSE YOU NEED TO ADAPT NEXT LINE TO YOUR tiny_mce.js PATH -->
<script type="text/javascript" src="includes/javascript/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
	// General options
		mode : "textareas",
        relative_urls : false,
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount",
        force_br_newlines : true,
        forced_root_block : '',
        
		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
</head>
<body>

<form method="post" action="mt_welcome_page.php?result=process" Name="welcome_page">
	<div>
		<h3>Salut ma soeur,</h3>
        <p>Tu peux &eacute;diter ta page d'accueil ici... Il est pas g&eacute;nial ton fr&egrave;re, m&ecirc;me si un peu lent...</p>
        <p>Pour inserer une image clique sur l'icone image et copie le lien de l'image.  Dans appearance, choisir la taille de l'image, pour info le carr&eacute; il fait 615x440. Je conseille 150x100. Ne met que la hauteur: 100, il s'occupera du reste.</p>
        
		<!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
		<div>
			<textarea id="wp" name="content" rows="15" cols="80" style="width:615; height:480">

<?php

$query = "SELECT content FROM welcome_page Where id=0";
$result = mysql_query($query);


$row = mysql_fetch_assoc($result);

$contents = $row['content'];

echo $contents;

?>
			</textarea>
		</div>

		<!-- Some integration calls -->
		<a href="javascript:;" onmousedown="tinyMCE.get('wp').show();">[Editeur de texte]</a>
		<a href="javascript:;" onmousedown="tinyMCE.get('wp').hide();">[Language Magique]</a>

		<br />
		<input type="submit" name="save" value="Submit" />
		<input type="reset" name="reset" value="Reset" />
	</div>
</form>
</body>
</html>
