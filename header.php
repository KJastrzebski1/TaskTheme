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
        <div class="row top-menu-bar">
            <?php wp_nav_menu('top-menu'); ?>
        </div>