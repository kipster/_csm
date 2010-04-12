    
    <link rel="stylesheet" type="text/css" href="_includes/script.js/fancybox/jquery.fancybox-1.2.5.css" media="screen" charset="utf-8" />
        
    <script type="text/javascript" src="_includes/script.js/jquery.js"></script>
	<script type="text/javascript" src="_includes/script.js/fancybox/jquery.fancybox-1.2.5.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
        
            $('a.newiframe').each(function(){
                    var fWidth = parseInt($(this).attr('href').match(/width=[0-9]+/i)
                [0].replace('width=',''));
                    var fHeight =  parseInt($(this).attr('href').match(/height=[0-9]+/i)
                [0].replace('height=',''));
                    $(this).fancybox({'frameWidth':fWidth,'frameHeight':fHeight});
            });
        
			$("a.zoom").fancybox();

			$("a.zoom1").fancybox({
				'overlayOpacity'	:	0.7,
				'overlayColor'		:	'#FFF'
			});

			$("a.zoom2").fancybox({
				'zoomSpeedIn'		:	500,
				'zoomSpeedOut'		:	500,
				'overlayShow'		:	false
			});
		});
	</script>