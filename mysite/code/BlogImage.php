<?php
class BlogImage extends DataObject {
	
	private static $db = array(
		'Title' => 'Varchar',
		'Description' => 'Text'
	);
	
	private static $has_one = array(
		'BlogEntry' => 'PhotoBlogEntry',
		'Image' => 'Image'
	);
	
	public function onBeforeWrite() {
		// if (! $this->BlogEntry)
		parent::onBeforeWrite();
	}
	
}