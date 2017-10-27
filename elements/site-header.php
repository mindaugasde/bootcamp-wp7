<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only"><?php _e('Toggle navigation','vcs-starter'); ?></span>
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="<?php echo home_url(); ?>"><h1><span class="pe-7s-gleam bounce-in"></span> <?php bloginfo('name'); ?></h1></a>
        </div>
        <div class="collapse navbar-collapse">
            <?php megaSuperMenu('primary-navigation', 'nav navbar-nav navbar-right'); ?>
        </div>
    </div>
</header><!--/header-->