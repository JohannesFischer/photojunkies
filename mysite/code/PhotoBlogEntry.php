<?php
/**
 * An individual photo blog entry page type.
 * 
 * @package photoblog
 */
class PhotoBlogEntry extends BlogEntry {
	private static $db = array(
	);
	
	private static $default_parent = 'PhotoBlogHolder';
	
	static $can_be_root = true;
	
	static $description = "An individual photo blog entry";
	
	static $singular_name = 'Photo Blog Entry Page';
	
	static $plural_name = 'Photo Blog Entry Pages';
	
	private static $has_many = array(
		'Images' => 'BlogImage'
	);
	
	private static $defaults = array(
		'AllowComments' => 1
	);
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		
		$fields->removeFieldFromTab('Root.Main', 'Date');
		$fields->removeFieldFromTab('Root.Main', 'Author');
		
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
	}
	
	public function HasMoreThanTwoImages() {
		return $this->Images()->Count();
	}
	
}