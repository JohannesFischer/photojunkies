<?php
/**
 * An individual photo blog entry page type.
 * 
 * @package photoblog
 */
class PhotoBlogEntry extends BlogEntry {
	
	private static $default_parent = 'PhotoBlogHolder';
	
	static $can_be_root = false;
	
	static $description = 'An individual photo blog entry';
	
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
        $config->addComponent(new GridFieldSortableRows('SortOrder'));
		$fields->addFieldToTab('Root.Images', new GridField('Images', 'Images', $this->Images(), $config));
		
		return $fields;
	}
	
	public function onBeforeDelete() {
		// delete has many relation
		$images = $this->Images();
		
		foreach($images as $image) {
			$image->delete();
		}
	 
		parent::onBeforeDelete();
	  }
	
	public function onBeforeWrite() {
		// add space when there's none after a comma
		if ($this->Tags) {
			$tags = strtolower($this->Tags);
			$this->Tags = preg_replace('/,(?!\s)/', ', ', $tags);
		}
		
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
	
	public function hasMoreThanFourImages() {
		return $this->Images()->Count() >= 4;
	}
	
	public function FirstImage() {
		return $this->Images()->First();
	}
	
	private function getPreviousID($entries) {
		while(key($entries) != $this->ID) next($entries);		
		prev($entries);
		return key($entries);
	}
	
	public function nextEntry() {
		$entries = PhotoBlogEntry::get()->filter('ParentID', $this->ParentID)->sort('Created DESC')->map('ID')->toArray();
		
		if ($id = $this->getPreviousID($entries)) {		
			return PhotoBlogEntry::get()->byID($id);
		}
		
		return false;
	}
	
	public function previousEntry() {
		$entries = PhotoBlogEntry::get()->filter('ParentID', $this->ParentID)->sort('Created ASC')->map('ID')->toArray();
		
		if ($id = $this->getPreviousID($entries)) {		
			return PhotoBlogEntry::get()->byID($id);
		}
		
		return false;
	}
	
}