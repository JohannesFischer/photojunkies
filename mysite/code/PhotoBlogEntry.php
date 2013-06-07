<?php
/**
 * An individual photo blog entry page type.
 * 
 * @package photoblog
 */
class PhotoBlogEntry extends BlogEntry {
	static $db = array(
	);
	
	static $default_parent = 'PhotoBlogHolder';
	
	static $can_be_root = true;
	
	static $description = "An individual photo blog entry";
	
	static $singular_name = 'Photo Blog Entry Page';
	
	static $plural_name = 'Photo Blog Entry Pages';
	
	static $has_many = array(
		'Images' => 'BlogImage'
	);
	
	static $defaults = array(
		'AllowComments' => 1
	);
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->removeFieldFromTab('Root.Main', 'Date');
		$fields->removeFieldFromTab('Root.Main', 'Author');
		
		//$config = GridFieldConfig_RecordViewer::create();
		$config  = GridFieldConfig_RelationEditor::create();
		$gridField = new GridField('Images', 'Images', $this->Images(), $config);		
		$fields->addFieldToTab('Root.Images', $gridField);
		
		return $fields;
	}
	
	public function onBeforeWrite() {
		// @todo add space when there's none after a comma
		if ( ! $this->Author) {
			$p = $this->Parent();
			$author = Member::get()->byId($p->OwnerID);
			$this-> Author = $author->FirstName;
		}
		parent::onBeforeWrite();
	}
	
}

class PhotoBlogEntry_Controller extends BlogEntry_Controller {

	function init() {
		parent::init();
	}
	
	public function hasMoreThanOneImage() {
		return $this->Images()->Count() > 1;
	}
	
	public function FirstImage() {
		return $blog_image = $this->Images()->First();
		//return File::get()->byId($blog_image);
	}
	
}