<!doctype hrml>
<html lang="en">
<head>
	<title>Latest Blog Posts</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="bower_components/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>
<body>
	<div class="navbar navbar-default" role="navigation">
		<div class="mod-container container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span> 
					<span class="icon-bar"></span>
				</button>

				<a style="font-weight: 600" class="navbar-brand" href="/">Latest Blog Posts</a>
			</div>
		</div>
	</div>

	<div class="container">
		<?php include_once 'core/RssFeeds.php'; ?>
	</div>

	<footer class="footer">
      	<div class="container">
        	<div class="col-md-12">
        		<p>Source code <a href="https://github.com/janezsarlah/RssFeed" target="_blank">RssFeed</a></p>
				<p><h6>Created by <a href="https://twitter.com/janezsarlah" target="_blank">@janezsarlah</a></h6></p>
			</div>
      	</div>
    </footer>
</body>
</html>