<?php
class AboutPage extends Page {

	private static $db = array(
	);

	private static $has_one = array(
	);
	
}
class AboutPage_Controller extends Page_Controller {
	
	public function getAuthors() {
		return Author::get();
	}

}