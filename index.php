<!doctype hrml>
<html lang="en">
<head>
	<title>Rss Feeds</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
	<?php require_once 'core/rss.php'; ?>
	
	<div class="container">
		<div class="row"><?php getFeeds(); ?></div>
		

	</div>
</body>
</html>