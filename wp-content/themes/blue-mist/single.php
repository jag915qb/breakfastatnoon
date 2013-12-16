<?php get_header(); ?>
<div id="main-block">
    <div id="content">
	<?php if (have_posts()) : ?>
        <ul>
		<?php while (have_posts()) : the_post(); ?>
			<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
                
                <div class="title">
            	    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute( array('before' => 'Permalink to: ', 'after' => '')); ?>"><?php the_title(); ?></a></h2>
                    <span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
                </div>
                <div class="postdata">
                    <span class="date"><?php the_time(get_option('date_format')) ?>&nbsp;/&nbsp;</span>
                    <span class="category"><?php the_category(', ') ?></span>
                </div>
        		<div class="entry">
				<?php the_post_thumbnail() ?>
        		    <?php the_content('Read the rest of this entry &raquo;'); ?>
                            <?php wp_link_pages() ?>
        		</div>
        		<p>Posted by <?php the_author() ?> @ <?php the_time() ?> <?php edit_post_link('Edit'); ?></p>
        		<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
			</li>
		<?php endwhile; ?>
        </ul>
        <div class="navigation">
                <span class="alignleft"><?php next_post_link('Previous Page') ?></span>
                <span class="alignright"><?php previous_post_link('Next Page') ?></span>
            </div>
        <?php comments_template(); ?>
        
            
		
    	<?php else : ?>
            <h2 class="t-center">No posts found matched your criteria</h2>
    	<?php endif; ?>
    </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
