<?php
$post_data = get_post(131);
global $post;
$post = $post_data;

setup_postdata($post);
?>
<section id="portfolio" class="white">
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
            'post_type' => 'Portfolio',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'DESC',
            'paged' => $page
        ));

        if ( $my_query->have_posts() ) :
        
        // Generating Filter

        $i = 1; $catList = array(); while ($my_query->have_posts()) : $my_query->the_post();

            $cat = get_the_category();
            
            for( $j = 0; $j < sizeof($cat); $j++ ){

                $exist = false;

                for( $k = 0; $k < sizeof($catList); $k++ ){

                    if( $cat[$j]->slug == $catList[$k] ){
                        $exist = true;
                    }

                }

                if( !$exist ){
                    array_push( $catList, $cat[$j]->slug );
                }

            }

        $i++; endwhile;
        ?>
        <ul class="portfolio-filter fade-down center">
            <li><a class="btn btn-outlined btn-primary active" href="#" data-filter="*"><?php _e('All', 'vcs-starter'); ?></a></li>
            <?php for( $l = 0; $l < sizeof($catList); $l++ ): ?>
            <li><a class="btn btn-outlined btn-primary" href="#" data-filter=".<?php echo $catList[$l]; ?>"><?php echo ucwords($catList[$l]); ?></a></li>
            <?php endfor; ?>
        </ul><!--/#portfolio-filter-->



        <ul class="portfolio-items col-3 isotope fade-up">
            <?php $i = 1; while ($my_query->have_posts()) : $my_query->the_post(); ?>
            <?php
            $cat = get_the_category();

            // Generate categories list
            $output = "";
            for( $i=0; $i < sizeof($cat); $i++ ){
                if( $i == sizeof($cat) - 1 ){
                    $output .= $cat[$i]->slug;
                } else {
                    $output .= $cat[$i]->slug . " ";
                }
            }
            ?>
            <li class="portfolio-item isotope-item <?php echo $output; ?>">
                <div class="item-inner">
                    <?php if( has_post_thumbnail() ): ?>
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                    <?php endif; ?>
                    <h5><?php the_title(); ?></h5>
                    <?php if( has_post_thumbnail() ): ?>
                    <div class="overlay">
                        <a class="preview btn btn-outlined btn-primary" href="<?php the_permalink(); ?>" rel="prettyPhoto"><i class="fa fa-eye"></i></a>             
                    </div>
                    <?php endif; ?>          
                </div>           
            </li><!--/.portfolio-item-->
            <?php $i++; endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); unset($my_query); endif; ?>
    </div>
</section>