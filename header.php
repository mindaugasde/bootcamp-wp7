<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>

    <link rel="shortcut icon" href="<?php echo ASSETS_URL . '/assets/images/ico/favicon.ico'; ?>">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo ASSETS_URL . '/assets/images/ico/apple-touch-icon-144x144.png'; ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo ASSETS_URL . '/assets/images/ico/apple-touch-icon-114x114.png'; ?>">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo ASSETS_URL . '/assets/images/ico/apple-touch-icon-72x72.png'; ?>">
    <link rel="apple-touch-icon" href="<?php echo ASSETS_URL . '/assets/images/ico/apple-touch-icon-57x57.png'; ?>">

    <?php wp_head(); ?>

    <script type="text/javascript">
    jQuery(document).ready(function($){
	'use strict';
      	jQuery('body').backstretch([
            <?php if( have_rows('i_sb_slides', 'option') ): ?>
                <?php while ( have_rows('i_sb_slides', 'option') ) : the_row(); ?>

                    <?php echo '"' . get_sub_field('i_sb_s_image', 'option') . '",'; ?>

                <?php endwhile; ?>
            <?php endif; ?>
            <?php $sec = get_field('i_sb_slide_duration', 'option'); ?>
	    ], {duration: <?php echo $sec * 1000; ?>, fade: <?php echo $sec * 100; ?>, centeredY: true });

        <?php
        $lat = get_field('i_mp_latitude', 'option');
        $lan = get_field('i_mp_longtitude', 'option');

        if( (isset($lat) && $lat) && (isset($lan) && $lan) ):
        ?>
		$("#mapwrapper").gMap({ controls: false,
         	scrollwheel: true,
         	markers: [{ 	
              	latitude: <?php echo $lat; ?>,
				longitude: <?php echo $lan; ?>,
          	icon: { image: "<?php echo ASSETS_URL . '/assets/images/marker.png'; ?>",
              	iconsize: [44,44],
          		iconanchor: [12,46],
          		infowindowanchor: [12, 0] } }],
          	icon: { 
              	image: "<?php echo ASSETS_URL . '/assets/images/marker.png'; ?>", 
             	iconsize: [26, 46],
              	iconanchor: [12, 46],
              	infowindowanchor: [12, 0] },
         	latitude: <?php echo $lat; ?>,
         	longitude: <?php echo $lan; ?>,
          	zoom: <?php echo ($zoom = get_field('i_mp_zoom', 'option')) ? $zoom : 0; ?> });
            <?php endif; ?>
    });
    
    </script>
</head><!--/head-->
<body>
<div id="preloader"></div>

    <?php get_template_part('elements/site-header'); ?>

    <?php get_template_part('elements/site-banner'); ?>