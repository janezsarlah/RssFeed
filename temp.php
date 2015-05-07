<?php 

function getFeeds() {
	require_once 'rss-links.php';

	foreach ($links as $link) {
		$channel = file_get_contents($link);

		$content = new SimpleXmlElement($channel);
		
		displayFeeds($content);		
	}	
}


function displayFeeds($content) {
	
	echo '<div class="col-md-4"><h3><a href="' . $content->channel->link . '">' . $content->channel->title . '</a></h3><ul>';
	 
	for($i = 0; $i < 10; $i++) {
		$title = $content->channel->item[$i]->title;

		if(strlen($title) > 40) {
			$title = substr($title, 0, 40);
			$title = $title . " ...";
		} 

		$display = '<li><a href = "' . $content->channel->item[$i]->link . 
				   '" title = "' . $content->channel->item[$i]->title . 
				   '" target = "_blank">' . $title . '</a></li>';

		echo $display;
	}

	echo "</ul></div>";
}