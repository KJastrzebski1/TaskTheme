<?php

require_once 'wp_bootstrap_navwalker.php';

function theme_scripts() {
    wp_enqueue_style('bootstrapcss', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
   // wp_enqueue_style('bootstraptheme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-2.2.3.min.js');
    wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', ['jquery']);
}


add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'top-menu', __( 'Top Menu', 'theme-slug' ) );
  register_nav_menu( 'tabs-menu', __( 'Tabs Menu', 'theme-slug' ) );
}
function tasktheme_customize_register($wp_customize){
    $wp_customize->add_setting('main_logo', array(
        'transport' => 'refresh'
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'logo_control', array(
        'label'     => __( 'Top Logo', 'theme-slug'),
        'section'   => 'title_tagline',
        'settings'  => 'main_logo',
        'priority'  => 1
    )));
}
add_action( 'customize_register', 'tasktheme_customize_register' );
add_action('wp_enqueue_scripts', "theme_scripts");
function wpdocs_custom_excerpt_length( $length = 10 ) {
    return 10;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
add_theme_support( 'post-thumbnails' ); 