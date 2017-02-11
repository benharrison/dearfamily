<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://feeds2.feedburner.com/bmgb" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="icon" type="image/png" href="<?php theme_url('favicon.png') ?>" />

        <link rel="stylesheet" href="<?php theme_url('css/normalize.css'); ?>">
        <link rel="stylesheet" href="<?php theme_url('css/main.css'); ?>">
        
<?php 
//wp_get_archives('type=monthly&format=link');
//comments_popup_script(); // off by default
//wp_head(); 
?>
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

        <script src="<?php theme_url('js/modernizr.custom.js') ?>"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an outdated browser. <a href="http://browsehappy.com/">Upgrade your browser today</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to better experience this site.</p>
        <![endif]-->
        <header>
            <h1 id="logo"><a href="<?php bloginfo("url"); ?>"><strong><?php bloginfo("name"); ?></strong></a></h1>
            <div id="image_data">
                <span id="current_image_filename" style="display:none;"></span>
                <span id="current_image_index"></span>/<span id="total_images"></span>
                <a id="slideshow_toggle" href="#" title="Click to toggle automatic slideshow"></a>
            </div>
        </header>

        <div class="container" class="group">
            <?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

                <article class="post post-<?php the_ID(); ?>">
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                    
                    <div class="post_date">
                        <?php the_time('l F jS, Y') ?>
                    </div>
                    
                    <div class="entry">
                    <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile; ?>
                <div class="navigation">
                    <?php posts_nav_link('&nbsp;', '<strong>Previous Page</strong>', '<strong>Next Page</strong>'); ?>
                </div>
            <?php else : ?>
                <div class="post">
                    <h2>Not Found</h2>
                </div>
            <?php endif; ?>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php theme_url('js/jquery-1.8.1.min.js'); ?>"><\/script>')</script>
        <script src="<?php theme_url('js/jquery.backstretch.min.js') ?>"></script>
        <script src="<?php theme_url('js/background-images.js') ?>"></script>
        <script src="<?php theme_url('js/fitvids.js') ?>"></script>

        <script src="<?php theme_url('js/yepnope.1.5.4-min.js') ?>"></script>
        <script>
            yepnope({
                test : Modernizr.mq('(min-width: 0px)'),
                nope : ["<?php theme_url('js/respond.min.js') ?>"]
            });
            
            $(document).ready(function(){
                $('article').fitVids();
                $('img').removeAttr('height').removeAttr('width');
            });
        </script>
        
<?php $domain = strtolower(trim($_SERVER['HTTP_HOST']));
      if ($domain == 'iheart.stephyharrison.com') { ?>
        <script>
            var _gaq=[['_setAccount','UA-34528841-2'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
<?php } ?>
    </body>
</html>
