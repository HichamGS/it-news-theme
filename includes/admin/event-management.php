<?php
define( 'METABOX_ID', 'my_meta_' );
class Kamino_Event_Management
{

    public function __construct()
    {
        add_action( 'init', array( $this, 'add_event_metabox_page' ) );
    }
    public function add_event_metabox_page()
    {
        if ( ! class_exists( 'WPAlchemy_MetaBox' ) ) {
            require_once 'metaboxes/MetaBox.php'; // Assuming subdirectory of current theme directory.
            require_once 'metaboxes/MediaAccess.php'; // Assuming subdirectory of current theme directory.
        }
        wp_enqueue_style('jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
        wp_enqueue_style('events-style', get_template_directory_uri() . '/includes/admin/metaboxes/css/event.css');


        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-slider');
        // wp_enqueue_script('jquery-style', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js');
        // wp_enqueue_script('timepicker', get_template_directory_uri() . '/includes/admin/metaboxes/js/jquery-ui-timepicker-addon.js', array('jquery', 'jquery-ui-core', 'jquery-ui-datepicker'), '1.5.0', false);
        wp_enqueue_script('kamino-event-admin', get_template_directory_uri() . '/includes/admin/metaboxes/js/event.js', array('jquery'), "", false);


        global $wpalchemy_media_access;
        $wpalchemy_media_access = new WPAlchemy_MediaAccess();
        $event_meta = new WPAlchemy_MetaBox(
            array(
                'id' => 'kamino_event_meta',
                    'types' => array( 'page' ), // array( 'downloads' )
                    'template' => get_stylesheet_directory() . '/includes/admin/metaboxes/events.php',
                    'priority' => 'default',
                    'mode' => WPALCHEMY_MODE_EXTRACT,
                    'prefix' => METABOX_ID
                )
        );
    }
}
if( is_admin() )
    $my_settings_page = new Kamino_Event_Management();