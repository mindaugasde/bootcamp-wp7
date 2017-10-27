<?php get_header(); ?>

<?php 

// The number of all posts for a given query
$posts_found = $GLOBALS['wp_query']->found_posts;
// The number of posts for just the page
$posts_count = $GLOBALS['wp_query']->post_count;

if(have_posts()): ?>

	<?php while (have_posts()) : the_post(); ?>

<li class="portfolio-item isotope-item" style="height: 500px; position: relative; z-index: 9999999; background-color: #fff;">
    <div class="item-inner">
        <?php if( has_post_thumbnail() ): ?>
        <img src="<?php the_post_thumbnail_url(); ?>" alt="">
        <?php endif; ?>
        <h5><?php the_title(); ?></h5>
        <?php if( has_post_thumbnail() ): ?>
        <?php endif; ?>          
    </div>           
</li><!--/.portfolio-item-->

<?php endwhile; ?>

<?php else: ?>

	

<?php endif; ?>

<?php get_footer(); ?>