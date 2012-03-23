<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd"> 
<html> 

<!-- Mirrored from www.gallyapp.com/tf_themes/weadmin/login_black.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 31 Dec 2003 19:08:44 GMT -->
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
 
<!-- Website Title --> 
<title>WeAdmin | Login</title>

<!-- Meta data for SEO -->
<meta name="description" content="">
<meta name="keywords" content="">

<!-- Template stylesheet -->
<link href="css/black/screen.css" rel="stylesheet" type="text/css" media="all">
<link href="css/black/datepicker.css" rel="stylesheet" type="text/css" media="all">
<link href="js/visualize/visualize.css" rel="stylesheet" type="text/css" media="all">
<link href="js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css" media="all">
<link href="js/fancybox/jquery.fancybox-1.3.0.css" rel="stylesheet" type="text/css" media="all">

<!--[if IE]>
	<link href="css/ie.css" rel="stylesheet" type="text/css" media="all">
	<meta http-equiv="X-UA-Compatible" content="IE=7" />
<![endif]-->

<!-- Jquery and plugins -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/jquery.img.preload.js"></script>
<script type="text/javascript" src="js/hint.js"></script>
<script type="text/javascript" src="js/visualize/jquery.visualize.js"></script>
<script type="text/javascript" src="js/jwysiwyg/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" charset="utf-8"> 
$(function(){ 
    // find all the input elements with title attributes
    $('input[title!=""]').hint();
    $('#login_info').click(function(){
		$(this).fadeOut('fast');
	});
});
</script>
</head>
<body class="login">

	<!-- Begin login window -->
	<div id="login_wrapper">
		<div id="login_info" class="alert_success noshadow" style="width:350px;margin:auto;padding:auto;">
			<p>Just click Login for demo or select other skins below</p>
			<p>
				<span style="float:left;width:20px;height:20px;display:block;background:#084AAD;cursor:pointer;margin-right:5px" onclick="location.href='login_blue.html'"></span>
				<span style="float:left;width:20px;height:20px;display:block;background:#BF2317;cursor:pointer;margin-right:5px" onclick="location.href='login_red.html'"></span>
				<span style="float:left;width:20px;height:20px;display:block;background:#67CF00;cursor:pointer;margin-right:5px" onclick="location.href='login_green.html'"></span>
			</p>
			<br class="clear"/><br/>
		</div>
		<br class="clear"/>
		<div id="login_top_window">
			<img src="images/blue/top_login_window.png" alt="top window"/>
		</div>
		
		<!-- Begin content -->
		<div id="login_body_window">
			<div class="inner">
				<img src="images/login_logo.png" alt="logo"/>
				<form action="http://www.gallyapp.com/tf_themes/weadmin/dashboard_black.html" method="get" id="form_login" name="form_login">
					<p>
						<input type="text" id="username" name="username" style="width:285px" title="Username"/>
					</p>
					<p>
						<input type="password" id="password" name="password" style="width:285px" title="******"/>
					</p>
					<p style="margin-top:50px">
						<input type="submit" id="submit" name="submit" value="Login" class="Login" style="margin-right:5px"/>
						<input type="checkbox" id="remember" name="remember"/>Remember my password
					</p>
				</form>
			</div>
		</div>
		<!-- End content -->
		
		<div id="login_footer_window">
			<img src="images/blue/footer_login_window.png" alt="footer window"/>
		</div>
		<div id="login_reflect">
			<img src="images/blue/reflect.png" alt="window reflect"/>
		</div>
	</div>
	<!-- End login window -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-203192-11']);
  _gaq.push(['_setDomainName', 'none']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
	
</body>

<!-- Mirrored from www.gallyapp.com/tf_themes/weadmin/login_black.html by HTTrack Website Copier/3.x [XR&CO'2010], Wed, 31 Dec 2003 19:08:53 GMT -->
</html>
