<?php 

include_once 'rss-links.php';

class SitePost {
	var $data;
	var $ts;
	var $link;
	var $title;
}

class SiteFeed {
	var $posts = array();

	function __construct($urls) {
		
	}
}

$feed = new SiteFeed($urls);






