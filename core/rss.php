<?php 

ini_set('display_errors',1);  
error_reporting(E_ALL);

function getFeed() {
	$xml = 'http://www.24ur.com/rss';

	$channel = file_get_contents($xml);

	$content = new SimpleXmlElement($channel);

	echo "<ul>";
     
    foreach($content->channel->item as $item) {
        echo "<li><a href = '$item->link' title = '$item->title' target = '_blank'>" . $item->title . "</a></li>";
    }
    echo "</ul>";
}

getFeed();
