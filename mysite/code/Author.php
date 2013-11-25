<?php
class Author extends Member {
	
    private static $db = array(
		'Description' => 'HTMLText'
	);
	
	private static $has_one = array(
		'Image' => 'Image'
	);
	
	static $summary_fields = array(
		'FirstName',
		'Surname',
		'Email',
		'Locale',
		'ApiAccess'
	);
	
	public function RecentPosts($id) {
		$parent = PhotoBlogHolder::get()->filter('OwnerID', $id)->First();
		
		return Page::get()->filter('ParentID', $parent->ID)->Sort('Created DESC');
	}
	
}