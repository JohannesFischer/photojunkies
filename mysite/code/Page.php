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
		
		$theme_folder = 'themes/' . SSViewer::current_theme();
		$css_folder = $theme_folder . '/css/';
		
		$css_files = array(
			'foundation/normalize.css',
			'foundation/foundation.min.css',
			'typography.css',
			'form.css',
			'app.css'
		);
		
		foreach ($css_files as $file) {
			Requirements::css($css_folder . $file);
		}
		
		$js_files = array(
			'javascript/jquery.js'
		);
		
		foreach ($js_files as $file) {
			Requirements::javascript($theme_folder . $file);
		}
	}
	
	public function getEntryImage() {
		return BlogImage::get()->filter('BlogEntryID', $this->ID)->First();
	}
	
	public function getTags($limit = 10) {
		$entries = PhotoBlogEntry::get();
		
		$output = new ArrayList();
		$b = array();
		
		foreach ($entries as $entry) {
			$tags = preg_split(" *, *", trim($entry->Tags));
			if ($tags[0] == '') continue;
			
			$link = $entry->getParent() ? $entry->getParent()->Link('tag') : '';
			foreach($tags as $tag) {
				if (in_array($tag, $b)) continue;
				$b[] = $tag;
				
				$output->push(new ArrayData(array(
					'Tag' => Convert::raw2xml($tag),
					'Link' => $link . '/' . urlencode($tag),
					'URLTag' => urlencode($tag)
				)));
			}
		}
		
		return $output->limit($limit);
	}
	
	public function IsNotOne($i = 0) {
		return $i != 1;
	}
	
	public function getFontFamily() {
		return $this->FontFamily;
	}

}