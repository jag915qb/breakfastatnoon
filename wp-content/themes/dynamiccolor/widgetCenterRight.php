<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */
?>

<ul>
<?php  if (function_exists('dynamic_sidebar') and dynamic_sidebar(4)) { } else { ?>
          <li>
          <h2 class="widgettitle">Recent Posts</h2>
			
            <ul>
				<?php $recent_posts = new WP_Query(); $recent_posts->query('showposts=7');?>
                <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?> 
                    <li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></li>
                <?php endwhile; ?>
            </ul> 
          </li>      
<?php } ?>
</ul>