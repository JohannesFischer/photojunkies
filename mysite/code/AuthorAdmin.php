<?php

class AuthorAdmin extends ModelAdmin {
	public static $managed_models = array(
		'Author'
	);
	
	static $url_segment = 'author';
	static $menu_title = 'Author Admin';
}