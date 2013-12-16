<?php get_header(); 
global $eo_options;
$sldr = of_get_option('show_slider');
$sldr_p = of_get_option('slider_p');
$sh_high = of_get_option('show_highlights');
$sh_feat = of_get_option('show_featurettes');

// if($sldr && $sldr_p == "contain" && is_home()) eo_get_template_part( 'inc/carousel' );
// eo-todo: move the main container out of header inside index 
// eo_review: instead of modifying index.php file with is_home, create a home template ??>
           <?php   if(is_home()) eo_get_template_part( 'inc/jumbo' ); ?>

			<div id="content" class="clearfix">
           <?php   if(is_home() && $sh_high) eo_get_template_part( 'inc/highlights' ); ?>
           <?php   if(is_home() && $sh_feat) eo_get_template_part( 'inc/featurettes' ); ?>
           <?php  //get_template_part( $eo_theme . 'inc/carousel' ); ?>

			
				<div id="main" class="col-sm-8 clearfix" role="main">
				<?php if ($eo_options["inf_scroll"] == "1") echo '<div class="postshold">' ?>
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php get_template_part( 'content', get_post_format() ); ?>					
					<?php endwhile; ?>	
					
					<?php if (function_exists('eo_page_navi')) {
						eo_page_navi(); // custom page navi function derived from bones 
						} else { // if it is disabled, display regular wp prev & next links ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(_e('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(_e('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "bonestheme"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
					<?php if ($eo_options["inf_scroll"] == "1") echo '</div> <!-- end .postshold -->' ?>
				</div> <!-- end #main -->
    
				<?php get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php get_footer(); ?>