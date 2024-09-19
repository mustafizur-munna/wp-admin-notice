<?php

/*
 * Plugin Name: WP Admin Notice
*/

class WP_Notice{
    private static $instance;

    public static function get_instance(){
        if( ! isset( self::$instance ) ){
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct(){
        if ( version_compare( get_bloginfo( 'version' ), '6.7', '<' ) ){
            $this->show_wp_notice();
        }
    }

    private function show_wp_notice(){
        add_action( 'admin_notices', function(){
            ?>
                <div class="notice notice-warning is-dismissible">
                    <p>Please update the plugin!</p>
                </div>
            <?php
        } );
    }
}

WP_Notice::get_instance();