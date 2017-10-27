<?php
if( $section = get_field('i_hps_about_us_section') ):
$post_data = get_post( $section[0] );
global $post;
$post = $post_data;

setup_postdata($post);
?>
<section id="about-us" class="white">
    <div class="container">
        <div class="gap"></div>
        <div class="center gap fade-down section-heading">
            <h2 class="main-title"><?php the_title(); ?></h2>
            <hr>
            <?php the_content(); ?>
        </div>
        <?php wp_reset_postdata(); ?>

        <?php
        $page = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $my_query = new WP_Query(array(
            'post_type' => 'Members',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'DESC',
            'paged' => $page
        ));

        if ( $my_query->have_posts() ) :
        ?>

        <div class="gap"></div>

        <div id="meet-the-team" class="row">

            <?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post(); ?>

            <div class="col-md-3 col-xs-6">
                <div class="center team-member">
                    <?php if( has_post_thumbnail() ): ?>
                    <div class="team-image">
                        <?php the_post_thumbnail('full', array( 'class' => 'img-responsive img-thumbnail bounce-in' )); ?>
                        <div class="overlay">
                            <a class="preview btn btn-outlined btn-primary" href="<?php the_post_thumbnail_url(); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>
                        </div>  
                    </div>
                    <?php endif; ?>
                    <div class="team-content fade-up">
                        <h5><?php the_title(); if( $position = get_field('i_mp_position') ): ?><small class="role muted"><?php echo $position; ?></small><?php endif; ?></h5>
                        <?php the_content(); ?>
                        <?php
                        if( have_rows('i_sn_network') ):
                        while ( have_rows('i_sn_network') ) : the_row();
                        ?>
                        <?php $icon = get_sub_field('i_sn_n_icon'); ?>
                        <a class="btn btn-social btn-<?php echo $icon; ?>" href="<?php the_sub_field('i_sn_n_url'); ?>" target="_blank"><i class="fa fa-<?php echo $icon; ?>"></i></a> 
                        <?php endwhile; endif; ?>
                    </div>
                </div>
            </div>

            <?php $i++; endwhile; ?>

        </div><!--/#meet-the-team-->
        <?php wp_reset_postdata(); unset($my_query); endif; ?>

        <div class="gap"></div>  
        <div class="gap"></div>   
    </div>      
</section>
<?php endif; ?>