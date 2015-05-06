<?php 

ini_set('display_errors',1);  
error_reporting(E_ALL);

function getFeeds() {
	require_once 'rss-links.php';

	foreach ($links as $link) {
		$channel = file_get_contents($link);

		$content = new SimpleXmlElement($channel);

		displayFeeds($content);
	}	
}

function displayFeeds($content) {
	
	echo '<h3><a href="' . $content->channel->link . '">' . $content->channel->title . '</a></h3>';
	echo '<div class="col-md-4"><ul>';
	 
	for($i = 0; $i < 2; $i++) {
		$title = $content->channel->item[$i]->title;

		if(strlen($title) > 70) {
			$title = substr($title, 0, 70);
			$title = $title . " ...";
		} 

		$display = '<li><a href = "' . $content->channel->item[$i]->link . 
				   '" title = "' . $content->channel->item[$i]->title . 
				   '" target = "_blank">' . $title . '</a></li>';

		echo $display;
	}

	echo "</ul></div>";
}





