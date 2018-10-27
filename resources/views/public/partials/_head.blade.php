<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>MacapatKu @yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="MacapatKu, Artikel Macapat, Macapat, Artikel" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link rel="shortcut icon" href="{{ asset('public/images/favicon.png')}}">
<link href="/public/css/bootstrap-3.1.1.min.css" rel="stylesheet" type="text/css">
<!-- Custom Theme files -->
<link href="/public/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
<link href="/public/css/style.css" rel='stylesheet' type='text/css' />
<script src="/public/js/jquery.min.js"> </script>
<script type="text/javascript" src="/public/js/move-top.js"></script>
<script type="text/javascript" src="/public/js/easing.js"></script>
<link rel="stylesheet" href="/public/css/flexslider.css" type="text/css" media="screen" />
<!--/script-->
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},900);
				});
			});
</script>

@yield('css')
</head>
<body>
