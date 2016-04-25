<?php

function theme_scripts() {
    wp_enqueue_style('bootstrapcss', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css');
   // wp_enqueue_style('bootstraptheme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css');
    wp_enqueue_style('style', get_stylesheet_directory_uri().'/style.css');
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-2.2.3.min.js');
    wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js', ['jquery']);
}

add_action('wp_enqueue_scripts', "theme_scripts");
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
add_theme_support( 'post-thumbnails' ); 