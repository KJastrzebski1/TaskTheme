<?php get_header(); ?>
<div class="row">
    <?php //slider ?>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php
            // The Query
            $the_query = new WP_Query(array(
                'post_type' => 'product'
            ));
            $i = 0;
            // The Loop
            if ($the_query->have_posts()) {

                while ($the_query->have_posts()) {
                    if ($i == 0) {
                        ?><div class="item active">
                        <?php
                        $i = 1;
                    } else {
                        ?><div class="item"><?php
                        }


                        $the_query->the_post();
                        echo get_the_post_thumbnail();
                        echo '<h1>' . get_the_title() . '</h1>';
                        echo '<p>' . get_the_content() . '</p>';
                        echo '</div>';
                    }
                } else {
                    // no posts found
                }
                /* Restore original Post Data */
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
                    ?><div class="col-md-3">
                    <?php
                    $the_query->the_post();
                    echo get_the_post_thumbnail();
                    echo '<h1>' . get_the_title() . '</h1>';
                    echo '<p>' . get_the_excerpt() . '</p>';
                    ?>
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
                // The Query
                $the_query = new WP_Query(array(
                    'post_type' => 'page'
                ));
                $i = 0;
                // The Loop
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        ?><li <?php if($i==0) {
                                   echo "class='active' ";
                                   $i++;
                               }?>><a href="#<?php echo str_replace(' ', '-',get_the_title()); ?>" data-toggle="tab">
                                   <?php echo get_the_title() ?>
                            </a></li> <?php
                    }
                } else {
                    
                }
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div> <?php //container             ?>
</div> <?php // top half             ?>
<div class="bottom-half">
    <div class="container">
        <div class="row tab-content">
            <?php
            // The Query
            $the_query = new WP_Query(array(
                'post_type' => 'page'
            ));
            $i = 0;
            // The Loop
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    ?><div id="<?php echo str_replace(' ', '-',get_the_title()); ?>" class="tab-pane fade <?php if($i==0) {
                                   echo 'in active';
                                   $i++;
                               }?>">
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
            <?php $the_query = new WP_Query(array(
                'post_type' => 'plans'
            ));
            $i = 0;
            // The Loop
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    ?><div class="col-md-6">
                        <?php
                        echo '<h3>'.get_the_title().'</h3>';
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