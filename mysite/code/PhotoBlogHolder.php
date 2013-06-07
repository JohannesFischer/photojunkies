<?php
/**
 * An individual photo blog entry page type.
 * 
 * @package photoblog
 */
class PhotoBlogHolder extends BlogHolder {
	static $allowed_children = array(
		'PhotoBlogEntry'
	);
	
	static $db = array(
	);
	
	static $default_parent = 'BlogTree';
	
	static $description = "A Photo Blog Holder";
	
	static $singular_name = 'Photo Blog Holder';
	
	static $defaults = array(
	);
	
}

class PhotoBlogHolder_Controller extends BlogHolder_Controller {

	function init() {
		parent::init();
	}
	
}
