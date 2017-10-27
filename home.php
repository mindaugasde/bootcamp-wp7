<?php 

get_header();

// The number of all posts for a given query
$posts_found = $GLOBALS['wp_query']->found_posts;
// The number of posts for just the page
$posts_count = $GLOBALS['wp_query']->post_count;

if(have_posts()): ?>

	<?php while (have_posts()) : the_post(); ?>

		<div style="height: 500px; position: relative; z-index: 9999999; background-color: #fff;">

            <h2><?php the_title(); ?></h2>

            <?php the_content(); ?>

            <a href="<?php the_permalink(); ?>">Paspausk mane!</a>

        </div>

	<?php endwhile; ?>

<?php else: ?>

	

<?php endif; ?>

<?php get_footer(); ?>