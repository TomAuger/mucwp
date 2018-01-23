<?php

/**
 * Simple plugin to remove all memory of comments from a site.
 * The comments themselves aren't removed, just any trace of them in Admin menus etc.
 *
 * @TODO: What I actually stated above. ATM it just removes the "comments" Admin menu item.
 */
class AS_Remove_Comments {
	function __construct() {
		add_action( 'admin_menu', array( $this, 'remove_comments_admin_menu_item' ), 99 );
	}

	public function remove_comments_admin_menu_item(){
		remove_menu_page( 'edit-comments.php' );
	}
}

$as_remove_comments_plugin = new AS_Remove_Comments();