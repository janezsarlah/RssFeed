<?php 

ini_set('display_errors',1);  
error_reporting(E_ALL);
	
include 'rss-links.php';

foreach ($links as $link) {
	$channel = file_get_contents($link);

	$content = new SimpleXmlElement($channel);

	echo "<ul>";
	 
	foreach($content->channel->item as $item) {
	    echo "<li><a href = '$item->link' title = '$item->title' target = '_blank'>" . $item->title . "</a></li>";
	}
	echo "</ul>";
}


