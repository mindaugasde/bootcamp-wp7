<section id="services" class="white">

    <?php
    $post_data = get_post(70);
    global $post;
    $post = $post_data;

    setup_postdata($post);
    ?>

    <div class="container">
    <div class="gap"></div> 
        <div class="row">
            <div class="col-md-12">
                <div class="center gap fade-down section-heading">
                    <h2 class="main-title"><?php the_title(); ?></h2>
                    <hr>
                    <?php the_content(); ?>
                </div>                
            </div>
        </div>

        <?php
        // Count repeater size
        if( have_rows('i_swd_block') ):
            $counter = 0;
            while ( have_rows('i_swd_block') ) : the_row();
                $counter++;
            endwhile;
        endif;
        ?>

        <?php if( have_rows('i_swd_block') ): ?>
        <div class="row">

            <?php $i = 1; while ( have_rows('i_swd_block') ) : the_row(); ?>

            <div class="col-md-4 col-sm-6">
                <div class="service-block">
                    <div class="pull-left bounce-in">
                        <i class="fa fa-<?php the_sub_field('i_swd_b_icon'); ?> fa fa-md"></i>
                    </div>
                    <div class="media-body fade-up">
                        <h3 class="media-heading"><?php the_sub_field('i_swd_b_heading'); ?></h3>
                        <?php the_sub_field('i_swd_b_content'); ?>
                    </div>
                </div>
            </div>

            <?php if( ($i % 3 == 0) && ($i != $counter) ): ?>

            </div>
            <div class="gap"></div>
            <div class="row">

            <?php endif; ?>

            <?php $i++; endwhile; ?>
            
        </div>
        <?php endif; ?>
    </div>
    <?php wp_reset_postdata(); ?>

    <?php
    $post_data = get_post(72);
    global $post;
    $post = $post_data;

    setup_postdata($post);
    ?>

    <div class="gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="center gap fade-down section-heading">
                    <h2 class="main-title"><?php the_title(); ?></h2>
                    <hr>
                    <?php the_content(); ?>
                </div>               
            </div>
        </div>
    </div>
    <?php wp_reset_postdata(); ?>

    <?php

    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $my_query = new WP_Query(array(
        'post_type' => 'Skills',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'order' => 'DESC',
        'paged' => $page
    ));

    if ( $my_query->have_posts() ) :

    ?>

    <div class="container">     
        <div class="row">
            <?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post(); ?>

            <div class="col-md-3">
                <div class="tile-progress tile-<?php the_field('i_sp_color'); ?> bounce-in">
                    <div class="tile-header">
                        <h3><?php the_title(); ?></h3>
                        <?php if( $desc = get_field('i_sp_description') ): ?>
                        <span><?php echo $desc; ?></span>
                        <?php endif; ?>
                    </div>
                    <?php $progress = get_field('i_sp_progress'); ?>
                    <div class="tile-progressbar">
                        <span data-fill="<?php echo $progress; ?>%" style="width: <?php echo $progress; ?>%;"></span>
                    </div>
                    <div class="tile-footer">
                        <h4>
                            <span class="pct-counter counter"><?php echo $progress; ?></span>%
                        </h4>
                    </div>
                </div>
            </div>

            <?php $i++; endwhile; ?>            
        </div><!--/.row-->
        <div class="gap"></div>
    </div>
    <?php wp_reset_postdata(); unset($my_query); endif; ?>
</section>