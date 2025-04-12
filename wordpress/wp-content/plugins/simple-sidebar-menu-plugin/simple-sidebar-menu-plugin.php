<?php
/*
Plugin Name: Admin Menu Test
Plugin URI: http://example.com
Description: A simple plugin that adds a menu item in the WordPress sidebar and displays a settings page when clicked.
Version: 1.0
Author: Your Name
Author URI: http://example.com
License: GPL2
*/

// Hook to add a menu item in the admin sidebar
add_action('admin_menu', 'simple_sidebar_menu_plugin_menu');

// Create the menu item
function simple_sidebar_menu_plugin_menu() {
    add_menu_page(
        'Simple Sidebar Menu',  // Page title
        'Simple Menu',          // Menu title
        'manage_options',       // Capability required to access the menu
        'simple-sidebar-menu',  // Menu slug
        'simple_sidebar_menu_plugin_settings_page',  // Function to call for displaying the settings page
        'dashicons-admin-generic', // Icon for the menu item
        6  // Position in the sidebar
    );
}

// Create the settings page
function simple_sidebar_menu_plugin_settings_page() {
    ?>
    <div class="wrap">
        <h1>Simple Sidebar Menu Plugin Settings</h1>
        <form method="post" action="options.php">
            <?php
            // Output settings fields
            settings_fields('simple_sidebar_menu_plugin_settings_group');
            do_settings_sections('simple-sidebar-menu');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Complex Setting</th>
                    <td><input type="text" name="simple_sidebar_menu_plugin_sample_setting" value="<?php echo esc_attr(get_option('simple_sidebar_menu_plugin_sample_setting')); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// Register settings
add_action('admin_init', 'simple_sidebar_menu_plugin_register_settings');

// Register the plugin's settings
function simple_sidebar_menu_plugin_register_settings() {
    // Register a setting for the plugin
    register_setting('simple_sidebar_menu_plugin_settings_group', 'simple_sidebar_menu_plugin_sample_setting');
}
