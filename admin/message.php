<?php
include'config/autoload.php';
include'config/authorization.php';

// current page
$current_page['1'] = 'message';
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
<title>Messages</title>

<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugin/font-awesome/css/font-awesome.min.css"/>

<script type="text/javascript" src="js/lib/jquery-1.11.1.min.js"></script>

</head>
<body>
<?php include'header.php';?>
<div class="topbar">
	<div class="title">Main message board between admin and user.</div>
	<div class="btn" id="btn-new-message">New Message<i class="fa fa-plus-circle" aria-hidden="true"></i></div>
</div>
<div class="container">
	<div class="page">
		<?php $message->listMessage(array('type' => 'message-items'));?>
	</div>
</div>

<form class="form-dialog" id="message-dialog" action="javascript:createMessage();" >
	<div class="input">
		<input type="text" id="topic" class="input-text" placeholder="Topic..." autofocus autocomplete="off">
		<textarea class="input-textarea" id="message" placeholder="Enter Messages..."></textarea>
		<input type="hidden" id="message_id">
	</div>
	<div class="control">
		<button type="submit" class="btn-submit" onclick="">Send Message</button>
		<div class="btn" id="close-message-dialog">CLOSE</div>
	</div>
</form>

<div id="filter"></div>

<script type="text/javascript" src="js/service/min/message.service.min.js"></script>
<script type="text/javascript" src="js/message.js"></script>
</body>
</html>