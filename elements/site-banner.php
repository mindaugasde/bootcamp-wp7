<section id="main-slider" class="no-margin">
    <div class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="carousel-content center centered">
                                <span class="home-icon pe-7s-gleam bounce-in"></span>
                                <h2 class="boxed animation animated-item-1 fade-down"><?php the_field('i_sb_title', 'option'); ?></h2>
                                <p class="boxed animation animated-item-2 fade-up"><?php the_field('i_sb_description', 'option'); ?></p>
                                <br>
                                <?php if( $post = get_field('i_sb_link', 'option') ): ?>
                                <a class="btn btn-md animation bounce-in" href="#<?php echo $post->post_name; ?>"><?php the_field('i_sb_link_more_text', 'option'); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
</section><!--/#main-slider-->