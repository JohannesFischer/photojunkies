<?php
class BlogImage extends DataObject {
	
	private static $db = array(
		//'AverageColor' => 'Varchar(11)',
		'Title' => 'Varchar',
		'Description' => 'Text',
		'SortOrder' => 'Int'
	);
	
	private static $has_one = array(
		'BlogEntry' => 'PhotoBlogEntry',
		'Image' => 'Image'
	);

	public static $default_sort = 'SortOrder';
	
	public function onBeforeWrite() {
		parent::onBeforeWrite();
		$this->BlogEntryID = $this->BlogEntry()->ID;
	}
	
	public function onAfterWrite() {
		parent::onAfterWrite();
		// get average color
		//$image = $this->Image();
		//$file_id = isset($_POST['Image']['Files'][0]) ? $_POST['Image']['Files'][0] : 0;
		//
		//if ($file_id != 0 && ! $this->AverageColor) {
		//	$this->AverageColor = $this->findAverageColor($file_id);
		//	$this->write();
		//}
	}
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		//$fields->removeByName('AverageColor');
		$fields->removeByName('BlogEntryID');
		$fields->removeByName('SortOrder');
		return $fields;
	}
	
	private function findAverageColor($file_id) {		
		$img = File::get_by_id('Image', $file_id);
		if ( ! $img) return false;
		
		$image = imagecreatefromjpeg($_SERVER["DOCUMENT_ROOT"] . '/' . $img->Filename);
		$width = imagesx($image);
		$height = imagesy($image);
		$pixel = imagecreatetruecolor(1, 1);
		imagecopyresampled($pixel, $image, 0, 0, 0, 0, 1, 1, $width, $height);
		$rgb = imagecolorat($pixel, 0, 0);
		$color = imagecolorsforindex($pixel, $rgb);
		
		//return $this->fromRGB($color['red'], $color['green'], $color['blue']);
		return $color['red'] .','. $color['green'] .','. $color['blue'];
	}
	
}