<?php
/**
 * An individual photo blog entry page type.
 * 
 * @package photoblog
 */
class PhotoBlogHolder extends BlogHolder {
	private static $allowed_children = array(
		'PhotoBlogEntry'
	);
	
	private static $db = array(
	);
	
	private static $has_one = array(
		'Owner' => 'Author'
	);
	
	static $default_parent = 'BlogTree';
	
	static $description = "A Photo Blog Holder";
	
	static $singular_name = 'Photo Blog Holder';
	
	private static $defaults = array(
	);
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->removeFieldFromTab('Root.Main', 'AllowCustomAuthors');
		$fields->removeFieldFromTab('Root.Main', 'Content');
		$fields->removeFieldFromTab('Root.Main', 'ShowFullEntry');
		$fields->removeFieldFromTab('Root.Main', 'TrackBacksEnabled');
		
		return $fields;
	}
	
	function blogOwners($sort = array('FirstName'=>'ASC','Surname'=>'ASC'), $direction = null) {
		$members = Author::get(); 
		$members->sort($sort);
		
		$this->extend('extendBlogOwners', $members);
		
		return $members;
	}
	
}

class PhotoBlogHolder_Controller extends BlogHolder_Controller {

	function init() {
		parent::init();
	}
	
}
