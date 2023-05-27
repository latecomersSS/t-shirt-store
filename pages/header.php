<head>
		<title>T-shirt Store | Home</title>

	<!--<script src="pages/js/jquery-1.10.2.min.js"></script>
    <script src="pages/js/jquery-ui.js"></script>
    <script src="pages/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="pages/css/bootstrap.min.css">
    <link href = "pages/css/jquery-ui.css" rel = "stylesheet">
    <link href="pages/css/style.css" rel="stylesheet"> -->

		<link href="./css/style1.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-alert-scroller---->
		<script src="./js/jquery.min.js"></script>
		<script type="text/javascript" src="./js/jquery.easy-ticker.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#demo').hide();
			$('.vticker').easyTicker();
		});
		</script>
		<!----start-alert-scroller---->
		<!-- start menu -->
		<link href="./css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
		<link href="css/owl.carousel.css" rel="stylesheet">
		<script type="text/javascript" src="./js/megamenu.js"></script>
		<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>
		<script src="./js/menu_jquery.js"></script>
		<!-- //End menu -->
		<!---slider---->
		<link rel="stylesheet" href="css/slippry.css">
		<script src="./js/jquery-ui.js" type="text/javascript"></script>
		<script src="./js/scripts-f0e4e0c2.js" type="text/javascript"></script>
		<script>
			  jQuery('#jquery-demo').slippry({
			  // general elements & wrapper
			  slippryWrapper: '<div class="sy-box jquery-demo" />', // wrapper to wrap everything, including pager
			  // options
			  adaptiveHeight: false, // height of the sliders adapts to current slide
			  useCSS: false, // true, false -> fallback to js if no browser support
			  autoHover: false,
			  transition: 'fade'
			});
		</script>
		<!----start-pricerage-seletion---->
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
		<script type='text/javascript'>//<![CDATA[ 
			$(window).load(function(){
			 $( "#slider-range" ).slider({
			            range: true,
			            min: 0,
			            max: 500,
			            values: [ 100, 400 ],
			            slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
			            }
			 });
			$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );
			
			});//]]>  
		</script>
		<!----//End-pricerage-seletion---->
		<!---move-top-top---->
		<script type="text/javascript" src="../js/move-top.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>
		<script type="text/javascript" src="../js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<!---//move-top-top---->


		<script type="text/javascript">
		$(document).ready(function(){
			$('#demo').hide();
			$('.vticker').easyTicker();
		});
		</script>	
		<!----start-alert-scroller---->
		<!-- start menu -->
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<!---//move-top-top---->
		<!-- Owl Carousel Assets -->
		
		<script src="js/jquery-1.9.1.min.js"></script> 
		     <!-- Owl Carousel Assets -->
		    <!-- Prettify -->
		    <script src="js/owl.carousel.js"></script>
		        <script>
		    $(document).ready(function() {
		
		      $("#owl-demo").owlCarousel({
		        items : 3,
		        lazyLoad : true,
		        autoPlay : true,
		        navigation : true,
			    navigationText : ["",""],
			    rewindNav : false,
			    scrollPerPage : false,
			    pagination : false,
    			paginationNumbers: false,
		      });
		
		    });
		    </script>

	<!-- Google Font 
	<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="./dist/css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="./dist/css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="./dist/css/elegant-icons.css" type="text/css">
	<link rel="stylesheet" href="./dist/css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="./dist/css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="./dist/css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="./dist/css/slicknav.min.css" type="text/css"> 
	<link rel="stylesheet" href="./dist/css/style1.css" type="text/css"> -->
		

		<!-- for filter -->

	


</head>