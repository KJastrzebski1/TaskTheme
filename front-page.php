<?php get_header(); ?>
<div class="row">
    <?php //slider ?>
    <div id="myCarousel" class="carousel slide css3-shadow" data-ride="carousel">
        <!-- Indicators -->
        <?php
        $the_query = new WP_Query(array(
            'post_type' => 'product'
        ));
        ?>
        <div class="carousel-inner" role="listbox">
            <?php
            $i = 0;
            // The Loop
            if ($the_query->have_posts()) {

                while ($the_query->have_posts()) {
                    if ($i == 0) {
                        echo '<div class="item active">';
                        $i = 1;
                    } else {
                        echo '<div class="item">';
                    }


                    $the_query->the_post();
                    echo '<div class="slider-desc">';
                    echo '<h1>' . get_the_title() . '</h1>';
                    echo '<p>' . get_the_content() . '</p>';
                    echo '<a href="' . get_post_permalink() . '"><button>Buy now</button></a>';
                    echo '</div>';
                    echo get_the_post_thumbnail();
                    echo '</div>';
                }
            } else {
            }
            wp_reset_postdata();
            ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<div class="row">
    <?php
    // The Query
    $the_query = new WP_Query(array(
        'post_type' => 'abilities',
        'posts_per_page' => 4
    ));
    $i = 0;
    // The Loop
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            ?><div class="col-md-3 ability">
            <?php
            $the_query->the_post();
            echo get_the_post_thumbnail();
            echo '<h4>' . get_the_title() . '</h4>';
            echo '<p>' . get_the_excerpt() . '</p>';
            ?>
                <a href="<?php echo get_post_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri() . '/img/arrow.gif'; ?>"></a>
            </div> <?php
        }
    } else {
    }
    wp_reset_postdata();
    ?>
</div>
<div class="row">
    <ul class="nav nav-tabs">
        <?php
        $menu_objects = wp_get_nav_menu_items('tabs-menu');
        $posts_array = array();
        foreach ($menu_objects as $page) {
            $posts_array[] = $page->object_id;
        }
        $the_query = new WP_Query(array(
            'post_type' => 'page',
            'post__in' => $posts_array
        ));
        $i = 0;
        // The Loop
        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                ?><li <?php
                if ($i == 0) {
                    echo "class='active' ";
                    $i++;
                }
                ?>><a href="#<?php echo str_replace(' ', '-', get_the_title()); ?>" data-toggle="tab">
                            <?php echo get_the_title() ?>
                    </a></li> <?php
            }
        } else {
            
        }
        wp_reset_postdata();
        ?>
    </ul>
</div>
</div> <?php //container                  ?>
</div> <?php // top half                  ?>
<div class="bottom-half">
    <div class="container">
        <div class="row tab-content">
            <?php
            $i = 0;
            // The Loop
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    ?><div id="<?php echo str_replace(' ', '-', get_the_title()); ?>" class="tab-pane fade <?php
                    if ($i == 0) {
                        echo 'in active';
                        $i++;
                    }
                    ?>">
                             <?php
                             echo get_the_post_thumbnail();
                             echo get_the_title();
                             echo get_the_content();
                             ?>

                    </div>
                    <?php
                }
            } else {
                
            }
            wp_reset_postdata();
            ?>
        </div>
        <div class="row">
            <?php
            $the_query = new WP_Query(array(
                'post_type' => 'plans'
            ));
            $i = 0;
            // The Loop
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    ?><div class="col-md-6">
                        <?php
                        echo '<h3>' . get_the_title() . '</h3>';
                        echo get_the_content();
                        ?>

                    </div>
                    <?php
                }
            } else {
                
            }
            wp_reset_postdata();
            ?>
        </div>

        <?php get_footer(); ?>