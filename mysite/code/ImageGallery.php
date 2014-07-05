<?php
class ImageGallery extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);
	
}
class ImageGallery_Controller extends Page_Controller {
	
	public static $allowed_actions = array(
		'renderImages'
	);
	
	public function init() {
		parent::init();
		
		$theme_folder = 'themes/' . SSViewer::current_theme();
		
		Requirements::javascript($theme_folder . '/javascript/ImageGallery.js');
	}
	
	public function getImages($start, $limit) {
		if ($limit == 0) return array();
		return BlogImage::get()
		       ->sort('Created', 'DESC')
		       ->exclude('BlogEntryID', 0)
		       ->limit($limit, $start);
	}
	
	public function renderImages() {
		$params = $this->request->getVars();
		$start = isset($params['start']) ? (int)$params['start'] : 0;
		$limit = isset($params['limit']) ? (int)$params['limit'] : 0;
		
		return $this->renderWith('ImageGalleryImages', array(
			'Images' => $this->getImages($start, $limit)
		));
	}

}