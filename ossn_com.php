<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Core Team
 * @copyright (C) OpenTeknik LLC
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */
/**
 * Initialize the Gadgets
 *
 * @return void
 */
ossn_register_callback('ossn', 'init', function () {
		ossn_extend_view('css/ossn.default', 'dashboard/css');
		ossn_add_hook('gadget', 'allowed:types', function($hook, $type, $return){
					$return[] = 'user/dashboard';
					return $return;
		});	
		if(ossn_isLoggedin()){
				ossn_register_page('dashboard', 'dashboard_page_handler');
				ossn_register_menu_item('newsfeed', array(
						'name'   => 'dashboard',
						'text'   => ossn_print('dashboard'),
						'href'    => ossn_site_url('dashboard'),
						'parent' => 'links',
				));			
		}
});
/**
 * Dashboard page handler
 *
 * @return void
 */
function dashboard_page_handler($pages): void {
		$page = false;
		if(isset($pages[0])) {
				$page = $pages[0];
		}
		switch($page) {
			case 'editor':
				$title = ossn_print('dashboard:editor');
				ossn_load_js('gadgets.core');
				ossn_load_css('gadgets.core');
				$contents = array(
						'content' => ossn_plugin_view('dashboard/editor'),
				);
				$content = ossn_set_page_layout('contents', $contents);
				echo ossn_view_page($title, $content);

				break;			
		default:
				$title = ossn_print('dashboard');
				$contents = array(
						'content' => ossn_plugin_view('dashboard/dashboard'),
				);
				$content = ossn_set_page_layout('contents', $contents);
				echo ossn_view_page($title, $content);
		}
}