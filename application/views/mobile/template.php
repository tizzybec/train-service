<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>列车服务</title>
		<link rel="shortcut icon" href="assets/favicon.ico"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
		<meta http-equiv="pragma" content="no-cache" />
		<meta http-equiv="Cache-Control" content="no-cache, must-revalidate">
		<meta http-equiv="expires" content="Wed, 26 Feb 1997 08:21:57 GMT">
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

		<link href="/resources/webapp/build/enyo.css" rel="stylesheet" type="text/css"/>
		<link href="/resources/webapp/build/app.css" rel="stylesheet" type="text/css"/>
		<!--<script src="http://debug.phonegap.com/target/target-script-min.js#xjtu-dinsy"></script>-->

		<script src="/resources/webapp/build/enyo.js"></script>
		<script src="/webapp/appdata?<?php echo $params;?>" type="text/javascript"></script>
		<script src="/resources/webapp/build/app.js" type="text/javascript"></script>
		<!--<link href="/mobile/webpage/app_css" rel="stylesheet" type="text/css"/>-->
		<!--<script src="/mobile/webpage/app_js" type="text/javascript">-->
	</head>
	<body class="enyo-unselectable">
		<script>
			new App.<?php echo $appname;?>().renderInto(document.body);
		</script>
	</body>
</html>
