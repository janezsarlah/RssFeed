<?php 

include_once 'RssLinks.php';
include_once 'Site.php';

class RssFeeds {
	var $posts = array();
	var $rowCounter = 0;
	var $postCounter = 0;
	var $maxTitleLenght = 40;

	public function __construct($urls) {

		foreach ($urls as $url) {
			$content = simplexml_load_file($url);
			$items = $content->xpath(sprintf('/rss/channel/item[position() <= %d]', 5));

			foreach ($items as $item) {
				$post = new Site();
				$post->title = (string) $content->channel->title;
				$post->postTitle = (string) $item->title;
				//$post->postTitleSummary = $this->titleSummary($item->title);
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
				echo '<div class="col-md-4"><ol>';

			$this->postCounter++;

			echo '<li class="ellipsis"><a href = "' . $post->link . 
				   '" title = "' . $post->postTitle . 
				   '" target = "_blank">' . $this->postCounter . '. ' . $post->postTitle . '</a></li>';

			if($this->postCounter == 5) {
				$this->postCounter = 0;
				echo '</ol></div>';
			}
			
			if($this->rowCounter == 15) {
				$this->rowCounter = 0;
				echo '</div>';
			}	
		}		
	}

	private function titleSummary($summary) {
		if(strlen($summary) > $this->maxTitleLenght)
			$summary = substr($summary, 0, $this->maxTitleLenght) . '...';

		return $summary;
	}
}

$display = new RssFeeds($urls);
$display->displayFeeds();


