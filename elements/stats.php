<?php
$post_data = get_post(115);
global $post;
$post = $post_data;

setup_postdata($post);
if( have_rows('i_sp_stat') ):
?>
<section id="stats" class="divider-section">
    <div class="gap"></div>
    <div class="container">
        <div class="row">
            <?php while ( have_rows('i_sp_stat') ) : the_row(); ?>
            <div class="col-md-3 col-xs-6">
                <div class="center bounce-in">
                    <span class="stat-icon"><span class="pe-7s-<?php the_sub_field('i_sp_s_icon'); ?> bounce-in"></span></span>
                    <h1><span class="counter"><?php the_sub_field('i_sp_s_counter'); ?></span></h1>
                    <h3><?php the_sub_field('i_sp_s_heading'); ?></h3>
                </div>
            </div>
            <?php endwhile; ?>
            <!-- Custom block -->

            <?php
            
            if( !get_post_meta( $post->ID, 'views' ) ){
                add_post_meta( $post->ID, 'views', 1 );
                $final = 1;
            } else {
                $views = get_post_meta( $post->ID, 'views' );
                $tmpViews = $views[0];
                $prev = (int) $tmpViews;
                $final = $prev + 1;
                update_post_meta( $post->ID, 'views', $final, $tmpViews );
            }

            ?>

            <div class="col-md-3 col-xs-6">
                <div class="center bounce-in">
                    <span class="stat-icon"><span class="pe-7s-box2 bounce-in"></span></span>
                    <h1><span class="counter"><?php echo $final; ?></span></h1>
                    <h3><?php _e('Aliens Visits'); ?></h3>
                </div>
            </div>

            <!-- end of custom block -->
        </div>
    </div>
    <div class="gap"></div> 
</section>
<?php endif; wp_reset_postdata(); ?>