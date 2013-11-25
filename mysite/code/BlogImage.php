<?php
class BlogImage extends DataObject {
	
	private static $db = array(
		'Title' => 'Varchar',
		'Description' => 'Text',
		'SortOrder' => 'Int'
	);
	
	private static $has_one = array(
		'BlogEntry' => 'PhotoBlogEntry',
		'Image' => 'Image'
	);

	public static $default_sort = 'SortOrder';
	
	public function onBeforeWrite() {
		$this->BlogEntryID = $this->BlogEntry()->ID;
		parent::onBeforeWrite();
	}
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('BlogEntryID');
		$fields->removeByName('SortOrder');
		return $fields;
	}
	
}