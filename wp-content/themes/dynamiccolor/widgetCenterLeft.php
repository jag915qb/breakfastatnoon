<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */
?>

<ul>
<?php  if (function_exists('dynamic_sidebar') and dynamic_sidebar(3)) { } else { ?>
	
        <li>
        	<h2 class="widgettitle">Meta</h2>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <li><a href="<?php bloginfo('rss2_url') ?>" title="Syndicate this site using RSS 2.0">
                	Entries <abbr title="Really Simple Syndication">RSS</abbr></a>
                </li>
                <li><a href="<?php bloginfo('comments_rss2_url') ?>" title="The latest comments to all posts in RSS">
                	Comments <abbr title="Really Simple Syndication">RSS</abbr></a>
                </li>
                <li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform.">
                	WordPress.org</a>
                </li>
                <?php wp_meta(); ?>
            </ul>
       </li>
                
<?php } ?>
</ul>