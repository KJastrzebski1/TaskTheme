<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php bloginfo('name'); ?></title>
        <?php wp_head(); ?>
    </head>
    <body>
        <div>
            <div class="container">
                <a href="#"><img src="<?php echo get_theme_mod('main_logo'); ?>"></img></a>
                <nav class="navbar" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                        </button>
                        
                    </div>
                    <div class="collapse navbar-collapse navbar-ex1-collapse"> 
                        
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'top-menu',
                            'menu_class' => 'nav',
                            'walker' => new wp_bootstrap_navwalker()
                        ));
                        ?>
                    </div>
                </nav>