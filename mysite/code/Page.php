<?php
class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);
	
}

class Page_Controller extends ContentController {

	public $FontFamily;

	public function init() {
		parent::init();
		
		// Google Font Family
		$this->FontFamily = 'Numans';
		
		if ($this->URLSegment == 'Security') { return; }
		
		$theme_folder = 'themes/' . SSViewer::current_theme();
		$css_folder = $theme_folder . '/css/';
		
		Requirements::set_combined_files_folder($theme_folder . '/_combinedfiles');
		
		$css_files = array(
			$css_folder . 'foundation/normalize.css',
			$css_folder . 'foundation/foundation.min.css',
			$css_folder . 'typography.css',
			$css_folder . 'form.css',
			$css_folder . 'app.css'
		);
		
		// combine CSS
		Requirements::combine_files('css_min.css', $css_files);
		
		$js_folder = $theme_folder . '/javascript/';
		
		$js_files = array(
			$js_folder . 'jquery.js',
			$js_folder . 'script.js',
			$js_folder . 'modernizr.js',
			$js_folder . 'foundation/foundation.min.js',
			$js_folder . 'foundation/foundation/foundation.topbar.js',
			$js_folder . 'foundation/foundation/foundation.interchange.js',
			$js_folder . 'foundation/foundation/foundation.orbit.js'
		);
		
		// combine JS
		Requirements::combine_files('js_min.css', $js_files);
		
		Requirements::customScript(<<<JS
jQuery(document).foundation();
JS
);
	}
	
	public function getEntryImage() {
		return BlogImage::get()->filter('BlogEntryID', $this->ID)->First();
	}
	
	public function getTags($limit = 10) {	
		$output = TagCloud::TagsCollection();
		
		return $output->limit($limit);
	}
	
	public function IsNotOne($i = 0) {
		return $i != 1;
	}
	
	public function isDev() {
		return Director::isDev();
	}
	
	public function getFontFamily() {
		return $this->FontFamily;
	}

}