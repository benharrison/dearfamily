<?php
if ( function_exists('register_sidebar') )
    register_sidebar();
    
function theme_url($path = "")
{
    if ($path != "")
    {
        echo get_bloginfo('template_url');
        echo '/';
        echo $path;
    }
}
?>