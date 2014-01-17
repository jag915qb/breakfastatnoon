<?php get_header(); ?>
<?php get_sidebar(); ?>
<div id="contentcontainer">
	<div id="content" class="narrowcolumn">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div class="post">
				<div class="bg_title">
					<div class="bg_titlebottom">
						<div class="title">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_category(', ') ?></small>
						</div>
					</div>
				</div>

				<p class="postmetadata"><?php if ( function_exists('the_tags') ) { the_tags( '<p>Tags: ', ', ', '</p>'); } ?> <?php the_author() ?> <?php the_time('F jS, Y') ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
			
			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>
</div>
<?php get_footer(); ?>