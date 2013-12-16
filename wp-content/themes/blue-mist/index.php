<?php get_header(); ?>
<div id="main-block">
    <div id="content">
	<?php if (have_posts()) : ?>
        <ul>
		<?php while (have_posts()) : the_post(); ?>
			<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
                
                <div class="title">
                    <?php if (get_the_title()) : ?>
                        <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(array('before' => 'Permalink to: ', 'after' => '')); ?>"><?php the_title(); ?></a></h2>
                    <?php else:?>
                        <h2><a href="<?php the_permalink() ?>" rel="nofollow">Permalink</a></h2>
                    <?php endif; ?>
                    <span class="comments"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
                </div>
                <div class="postdata">
                    <span class="date"><?php the_time(get_option('date_format')) ?>&nbsp;/&nbsp;</span>
                    <span class="category"><?php the_category(', ') ?></span>
                </div>
                
        		<div class="entry">
			<?php the_post_thumbnail() ?>
        		    <?php the_content('Read the rest of this entry &raquo;'); ?>
        		</div>
                <?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
                            
                            
                            <?php wp_link_pages(); ?> 
                            
			</li>
		<?php endwhile; ?>
        </ul>
        
        <div class="navigation">
            <span class="alignleft"><?php next_posts_link('Previous Page') ?></span>
            <span class="alignright"><?php previous_posts_link('Next Page') ?></span>
        </div>
        
        
		
    	<?php else : ?>
    
    		<h2 class="t-center">Not Found</h2>
    		<p class="t-center">Sorry, but you are looking for something that isn't here.</p>

    	<?php endif; ?>
    </div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
