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
		
		$theme_folder = 'themes/' . SSViewer::current_theme();
		$css_folder = $theme_folder . '/css/';
		
		$css_files = array(
			'foundation/normalize.css',
			'foundation/foundation.min.css',
			'typography.css',
			'form.css',
			'app.less'
		);
		
		foreach ($css_files as $file) {
			Requirements::css($css_folder . $file);
		}
	}
	
	public function getEntryImage() {
		return BlogImage::get()->filter('BlogEntryID', $this->ID)->First();
	}
	
	public function IsNotOne($i = 0) {
		return $i != 1;
	}

}