<?php
/**
 * The template for displaying posts in the Video post format.
 *
 * @since 1.0.0
 */
?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="row">
			<div class="col-md-12">
			    <?php get_template_part( 'content', 'header' ); ?>

				<div class="entry-content">
					<?php the_content( __( 'Read more &rarr;', 'ward' ) );	?>
				</div><!-- .entry-content -->

			    <?php get_template_part( 'content', 'footer' ); ?>
			</div>
	    </div>
	</article><!-- #post -->