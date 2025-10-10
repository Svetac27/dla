<?php

include 'endpoints.class.php';
define('APP_VERSION', isset($_GET['version']) && !empty($_GET['version']) ? $_GET['version'] : time());
function availableColors () {
    return [
        '#E62A4F',
        '#F9C9D3',
        '#D9DC42',
        '#FCBE04',
        '#D9EAF3'
    ];
}

function colorClasses ($color = null) {
    $colors = [
        '#E62A4F' => 'red',
        '#F9C9D3' => 'mid-red',
        '#D9DC42' => 'green',
        '#FCBE04' => 'yellow',
        '#D9EAF3' => 'mid-blue'
    ];

    if (isset($color) && isset($colors[$color])) {
        return $colors[$color];
    } else if (isset($color)) {
        return $color;
    } return $colors;
}


function test_files() {
    if (isset($_GET['testmode'])) {
        $testmode = $_GET['testmode'];
        $result = [];
        if (substr($testmode, -4) === '.css') {
            $result['css'] = $testmode;
        } elseif (substr($testmode, -3) === '.js') {
            $result['js'] = $testmode;
        } elseif (substr($testmode, -4) === '.all') {
            $result['css'] = substr($testmode, 0, -4) . '.css';
            $result['js'] = substr($testmode, 0, -4) . '.js';
        } else {
            $result['css'] = 'test.css';
            $result['js'] = 'test.js';
        }

        return $result;
    }
    return false;
}

function add_css() {
    $css = get_stylesheet_directory_uri() . '/assets' . (isset(test_files()['css']) ? '/' . test_files()['css'] : '/app.css');
    wp_enqueue_style( 'style', $css, [], '1.0.' . APP_VERSION);
}

add_action( 'wp_enqueue_scripts', 'add_css' );

function enqueue_vue_scripts() {
    wp_enqueue_script(
        'custom-js',
        get_template_directory_uri() . '/assets/js/' . (test_files()['js'] ?? 'app.js'),
        [],
        APP_VERSION,
        true
    );
    // wp_enqueue_script('vendors', get_template_directory_uri() . '/dla-app/dist/js/chunk-vendors.js?'.time(), array(), null, true);
}

add_action('wp_enqueue_scripts', 'enqueue_vue_scripts');



//Remove Gutenberg Block Library CSS from loading on the frontend
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-blocks-style' ); // Remove WooCommerce block CSS
}
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );


function dlap_blocks() {
    register_block_type( __DIR__ . '/blocks/tiles/tile-info/build' );
    register_block_type( __DIR__ . '/blocks/tiles/tile-campaign/build' );
    register_block_type( __DIR__ . '/blocks/tiles/tile-list/build' );
	register_block_type( __DIR__ . '/blocks/tiles/figure-with-text/build' );
	register_block_type( __DIR__ . '/blocks/tiles/progress-bar-with-figure/build' );
	register_block_type( __DIR__ . '/blocks/tiles/tile-with-circle-progress/build' );
	register_block_type( __DIR__ . '/blocks/tiles/icon-with-text/build' );
	register_block_type( __DIR__ . '/blocks/tiles/figure-with-title/build' );
	register_block_type( __DIR__ . '/blocks/tiles/figure-with-text-and-collapsible/build' );
	register_block_type( __DIR__ . '/blocks/tiles/tile-with-link/build' );
}
add_action( 'init', 'dlap_blocks' );


function getMenus () {
    return CustomEndpoints::get_menus();
}
add_filter( 'wp_get_nav_menu_items', 'prefix_nav_menu_classes', 10, 3 );

function prefix_nav_menu_classes($items, $menu, $args) {
    _wp_menu_item_classes_by_context($items);
    return $items;
}


/* PWA */
function register_service_worker() {
    if (!is_admin()) {
      echo '<link rel="manifest" href="/manifest.json?'.APP_VERSION.'">';
      echo '
      <script>
        if (typeof navigator.serviceWorker !== "undefined") {
            navigator.serviceWorker.register("'.get_template_directory_uri().'/serviceWorker.js?'.APP_VERSION.'")
        }
    </script>';
    }
  }
  add_action('wp_head', 'register_service_worker');



//Allow SVG in upload
function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg_thumb_display() {
    echo '<style>
        td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
            width: 100% !important;
            height: auto !important;
        }
    </style>';
}
add_action('admin_head', 'fix_svg_thumb_display');


function is_mobile_or_tablet() {
    return true;
}


// Add custom fields to the General Settings page
function custom_general_settings_fields() {
    add_settings_field(
        'footnote',
        'Foot footnote',
        'render_footnote_form',
        'general'
    );

    register_setting('general', 'footnote');
}
add_action('admin_init', 'custom_general_settings_fields');

// Render the custom field
function render_footnote_form() {
    $footnote = get_option('footnote');
    echo '<div><input type="text" class="regular-text ltr" name="footnote" value="' . esc_attr($footnote ??  '') . '" />    </div>';
}

function add_testmode_to_links($content) {
    // Check if 'testmode' parameter exists in the URL
    if (isset($_GET['testmode'])) {
        $testmode = sanitize_text_field($_GET['testmode']);
        // Use regex to find all href links and append the testmode parameter
        $content = preg_replace_callback('/href=["\']([^"\']+)["\']/', function($matches) use ($testmode) {
            $url = $matches[1];
            // Parse URL to check for existing query parameters
            $url_parts = parse_url($url);
            $query = isset($url_parts['query']) ? $url_parts['query'] : '';
            $separator = empty($query) ? '?' : '&';

            // Append 'testmode' to the URL
            $new_url = $url . $separator . 'testmode';
            return 'href="' . esc_url($new_url) . '"';
        }, $content);
    }
    return $content;
}
add_filter('the_content', 'add_testmode_to_links');
add_filter('widget_text', 'add_testmode_to_links');
add_filter('widget_custom_html_content', 'add_testmode_to_links');

function isV2 () {
    return true;
}

function custom_register_api_routes() {
    register_rest_route(
        'api/v1', // The namespace for the API route
        '/data/', // The route (can be anything, e.g., '/data/')
        array(
            'methods'  => ['GET', 'POST'], // HTTP method (GET, POST, PUT, DELETE)
            'callback' => 'custom_get_data', // The function to call when this route is accessed
        )
    );
}
add_action('rest_api_init', 'custom_register_api_routes');

// The callback function to handle the API request
function custom_get_data() {
    // You can perform any logic here, e.g., querying the database
    $data = array(
        'message' => 'Successfully synced!',
        'status' => 'success'
    );

    // Return the data in JSON format
    return rest_ensure_response($data);
}

function custom_clear_sessions_api_route() {
    register_rest_route(
        'api/v1',
        '/clear-sessions/',
        array(
            'methods'  => 'GET',
            'callback' => 'custom_clear_sessions'
        )
    );
}
add_action('rest_api_init', 'custom_clear_sessions_api_route');

function custom_clear_sessions() {
    if (session_status() === PHP_SESSION_ACTIVE) {
        // Unset all session variables
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }

    wp_clear_auth_cookie();

    $response = array(
        'message' => 'All sessions cleared successfully',
        'status' => 'success'
    );

    return rest_ensure_response($response);
}
