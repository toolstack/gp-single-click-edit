<?php
/*
Plugin Name: GP Single Click Edit
Plugin URI: http://glot-o-matic.com/gp-single-click-edit
Description: Enable editing of a translation with a single click as well as a double click in GlotPress.
Version: 1.0
Author: Greg Ross
Author URI: http://toolstack.com
Tags: glotpress, glotpress plugin 
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

class GP_Single_Click_Edit {
	public $id = 'gp-single-click-edit';

	public function __construct() {
		wp_register_script( 'gp-single-click-edit', plugins_url( 'gp-single-click-edit.js', __FILE__ ), array( 'jquery', 'gp-common', 'gp-editor', 'gp-translations-page' ) );
		
		add_action( 'gp_pre_tmpl_load', array( $this, 'gp_pre_tmpl_load' ), 10, 2 );
	}

	public function gp_pre_tmpl_load( $template, $args ) {
		gp_enqueue_script( 'gp-single-click-edit' );
	}

}

// Add an action to WordPress's init hook to setup the plugin.  Don't just setup the plugin here as the GlotPress plugin may not have loaded yet.
add_action( 'gp_init', 'gp_single_click_edit_init' );

// This function creates the plugin.
function gp_single_click_edit_init() {
	GLOBAL $gp_single_click_edit;
	
	$gp_single_click_edit = new GP_Single_Click_Edit;
}
