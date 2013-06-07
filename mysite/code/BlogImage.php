<?php
class BlogImage extends DataObject {
	
	static $db = array(
		'Title' => 'Varchar',
		'Description' => 'Text'
	);
	
	static $has_one = array(
		'BlogEntry' => 'PhotoBlogEntry',
		'Image' => 'Image'
	);
	
	public function onBeforeWrite() {
		// if (! $this->BlogEntry)
		parent::onBeforeWrite();
	}
	
}