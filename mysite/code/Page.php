<?php
class Page extends SiteTree {

	public static $db = array(
	);

	public static $has_one = array(
	);
	
}
class Page_Controller extends ContentController {

	public function init() {
		parent::init();
	}
	
	public function getEntryImage() {
		return BlogImage::get()->filter('BlogEntryID', $this->ID)->First();
	}

}