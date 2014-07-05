<?php
class BlogImage extends DataObject {
	
	private static $db = array(
		'AverageColor' => 'Varchar(12)',
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
		//
		//if ($this->ImageID != 0) {
		//	$color = $this->findAverageColor();
		//	$this->AverageColor = $color;
		//}
	}
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName('AverageColor');
		$fields->removeByName('BlogEntryID');
		$fields->removeByName('SortOrder');
		return $fields;
	}
	
	private function fromRGB($r, $g, $b) {
		$r = dechex($r);
		if (strlen($r) < 2) $r='0' . $r;
		
		$g = dechex($g);
		if (strlen($g) < 2) $g='0' . $g;
		
		$b = dechex($b);
		if (strlen($b) < 2) $b='0' . $b;
		
		return $r . $g . $b;
	}
	
	private function findAverageColor() {
		//$img = $this->Image();
		if ( ! $this->ImageID) return false;
		
		$img = File::get_by_id('Image', $this->ImageID);
		
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