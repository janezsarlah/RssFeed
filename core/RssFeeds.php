<?php 

include_once 'RssLinks.php';
include_once 'Site.php';

class RssFeeds {
	var $posts = array();
	var $rowCounter = 0;
	var $postCounter = 0;
	var $maxPosts = 5;
	var $maxTitleLenght = 40;

	public function __construct($urls) {

		foreach ($urls as $url) {
			$content = simplexml_load_file($url);
			$items = $content->xpath(sprintf('/rss/channel/item[position() <= %d]', $this->maxPosts));

			foreach ($items as $item) {
				$post = new Site();
				$post->title = (string) $content->channel->title;
				$post->postTitle = (string) $item->title;
				$post->link = (string) $item->link;

				$this->posts[] = $post;
			}
		}
	}

	
	public function displayFeeds() {

		foreach ($this->posts as $post) {

			if($this->rowCounter == 0)
				echo '<div class="row">';

			$this->rowCounter++;

			if($this->postCounter == 0)
				echo '<div class="col-md-4"><div class="site-header">' . $this->trimmedTitle($post->title) . '</div><ol>';

			$this->postCounter++;

			echo '<li class="ellipsis"><a href = "' . $post->link . 
				   '" title = "' . $post->postTitle . 
				   '" target = "_blank">' . $this->postCounter . '. ' . $post->postTitle . '</a></li>';

			if($this->postCounter == $this->maxPosts) {
				$this->postCounter = 0;
				echo '</ol></div>';
			}
			
			if($this->rowCounter == ($this->maxPosts*3)) {
				$this->rowCounter = 0;
				echo '</div>';
			}	
		}		
	}

	private function trimmedTitle($title) {

		if(substr($title, 0, strpos($title, '-')))
			$title = substr($title, 0, strpos($title, '-'));
		else if(substr($title, 0, strpos($title, ':'))) 
			$title = substr($title, 0, strpos($title, ':'));
		
		return $title;
	}
}

$display = new RssFeeds($urls);
$display->displayFeeds();


