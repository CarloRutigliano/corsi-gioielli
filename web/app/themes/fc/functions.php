<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',  // Scripts and stylesheets
  'lib/extras.php',  // Custom functions
  'lib/setup.php',   // Theme setup
  'lib/titles.php',  // Page titles
  'lib/wrapper.php',
  'lib/upload.php'  // Theme wrapper class
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);


function myprefix_unregister_tags() {
    unregister_taxonomy_for_object_type('post_tag', 'post');
}
add_action('init', 'myprefix_unregister_tags');

/**
 * @var $roleObject WP_Role
 */
$roleObject = get_role( 'editor' );
if (!$roleObject->has_cap( 'edit_theme_options' ) ) {
    $roleObject->add_cap( 'edit_theme_options' );
}
function hide_menu() {
    global $submenu;
    unset($submenu['themes.php'][6]); // remove customize link
    remove_submenu_page( 'themes.php', 'themes.php' ); // hide the theme selection submenu
    remove_submenu_page( 'themes.php', 'widgets.php' ); // hide the widgets submenu

}

add_action('admin_menu', 'hide_menu');
