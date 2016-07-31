<?php include'config/autoload.php';?>
<?php
if(!$user_online){
	header("Location: login.php");
	die();
}else if($user->status == 'deactive'){
    header("Location: profile.php");
    die();
}

// current page
$current_page['1'] = 'index';
?>
<!doctype html>
<html lang="en-US" itemscope itemtype="http://schema.org/Blog" prefix="og: http://ogp.me/ns#">
<head>

<!--[if lt IE 9]>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<![endif]-->

<!-- Meta Tag -->
<meta charset="utf-8">

<!-- Viewport (Responsive) -->
<meta name="viewport" content="width=device-width">
<meta name="viewport" content="user-scalable=no">
<meta name="viewport" content="initial-scale=1,maximum-scale=1">

<?php include'favicon.php';?>
<title>Daily Report</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/min/auto_hidden.min.js"></script>

</head>
<body>
<header class="header">
	<div class="header-items">
		<div class="topic">Daily output report</div>
		<div class="caption">Describes the procedure used to send Message Queuing test messages, for IT professionals.</div>
	</div>
	<a class="btn" href="report_header_editor.php?action=create"><i class="fa fa-plus" aria-hidden="true"></i>New report</a>
</header>
<?php include'header.php';?>
<div class="container">
	<?php $report->listAllHeader($user->line_default,array('type' => 'report-header-items','user_id' => $user->id));?>
</div>

<script>
	;(function( $, window, document, undefined ){
	'use strict';

	var elSelector		= '.navigator',
		$element		= $( elSelector );

	if(!$element.length) return true;

	var elHeight		= 0,
		elTop			= 0,
		$document		= $( document ),
		dHeight			= 0,
		$window			= $( window ),
		wHeight			= 0,
		wScrollCurrent	= 0,
		wScrollBefore	= 0,
		wScrollDiff		= 0;

	$window.on( 'scroll', function(){
		elHeight		= $element.outerHeight();
		dHeight			= $document.height();
		wHeight			= $window.height();
		wScrollCurrent	= $window.scrollTop();
		wScrollDiff		= wScrollBefore - wScrollCurrent;
		elTop			= parseInt( $element.css( 'top' ) ) + wScrollDiff;

		if( wScrollCurrent <= 0 ) // scrolled to the very top; element sticks to the top
			$element.css( 'top', 0 );

		else if( wScrollDiff > 0 ) // scrolled up; element slides in
			$element.css( 'top', elTop > 0 ? 0 : elTop );

		else if( wScrollDiff < 0 ){
			if( wScrollCurrent + wHeight >= dHeight - elHeight )  // scrolled to the very bottom; element slides in
				$element.css( 'top', ( elTop = wScrollCurrent + wHeight - dHeight ) < 0 ? elTop : 0 );

			else // scrolled down; element slides out
				$element.css( 'top', Math.abs( elTop ) > elHeight ? -elHeight : elTop );
		}

		wScrollBefore = wScrollCurrent;
	});
})( jQuery, window, document );
</script>
</body>
</html>