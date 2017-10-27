<?php
$post_data = get_post(168);
global $post;
$post = $post_data;
setup_postdata($post);
?>
<section id="contact" class="white">
    <div class="container">
        <div class="gap"></div>
        <div class="center gap fade-down section-heading">
            <h2 class="main-title"><?php the_title(); ?></h2>
            <hr>
            <?php the_content(); ?>
        </div>
        <?php wp_reset_postdata(); ?>    
        <div class="gap"></div>
        <div class="row">
            <div class="col-md-4 fade-up">
                <h3><?php _e('Contact Information', 'vcs-starter'); ?></h3>
                <p>
                    <?php if( $address = get_field('i_cp_address', 'option') ): ?>
                    <span class="icon icon-home"></span><?php echo $address; ?><br/>
                    <?php endif; ?>
                    <?php
                    if( $phone = get_field('i_cp_phone', 'option') ):
                    $hrefPhone = str_replace(" ", "", $phone);
                    ?>
                    <span class="icon icon-phone"></span><a href="tel:<?php echo $hrefPhone; ?>"><?php echo $phone; ?></a><br/>
                    <?php endif; ?>
                    <?php
                    if( $mobile = get_field('i_cp_mobile', 'option') ):
                    $hrefMobile = str_replace(" ", "", $mobile);
                    ?>
                    <span class="icon icon-mobile"></span><a href="tel:<?php echo $hrefMobile; ?>"><?php echo $mobile; ?></a><br/>
                    <?php endif; ?>
                    <?php if( $mail = get_field('i_cp_mail', 'option') ): ?>
                    <span class="icon icon-envelop"></span> <a href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a> <br/>
                    <?php endif; ?>
                    <?php if( $twitter = get_field('i_cp_twitter', 'option') ): ?>
                    <span class="icon icon-twitter"></span> <a target="_blank" href="//twitter.com/<?php echo $twitter; ?>">@<?php echo $twitter; ?></a> <br/>
                    <?php endif; ?>
                </p>
            </div><!-- col -->
        
            <div class="col-md-8 fade-up">
                <h3><?php _e('Drop Us A Message', 'vcs-starter'); ?></h3>
                <br>
                <br>
                <div id="message"></div>

                <?php echo do_shortcode('[contact-form-7 id="38" title="Contact Form" html_id="contactform"]'); ?>
                
            </div><!-- col -->
        </div><!-- row -->  
        <div class="gap"></div>         
    </div>
</section>