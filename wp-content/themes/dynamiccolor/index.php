<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */

get_header(); ?>

<div class="im-content-wrapper" align="center">
	<div class="im-mainContent-top"></div>
	<div class="im-content-frame">
        <div class="im-mainContent">
        
        	<?php if (have_posts()) : ?>
            <?php  $count = 0; ?>
				<?php while (have_posts()) : the_post(); ?>
                
                <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                	<?php ++$count; ?>
                    <h2 style="margin-bottom:0px;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_title(); ?></a>
                    </h2>
                    <small><?php the_time('F jS, Y') ?> <!-- by <?php the_author() ?> --></small>
    
                   <div class="entry">
                    	 <?php $permalink = ' <a class="readMore" href="'.get_permalink().'">Read More...</a>';  ?>
                    	<?php $truncateContent = truncate::doTruncate(strip_tags(get_the_content(), ''), 300, '.', $permalink); ?> 
                        <?php if (is_home() && $count == 1){ ?>
							<p><?php the_content(); ?></p>
						<?php } else {  ?>
                        	<p><?php echo $truncateContent; ?></p>
						<?php } ?>
                        
                    </div> 
    
                    <p class="postmetadata">
						<?php the_tags('Tags: ', ', ', '<br />'); ?> 
                    	Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  
						<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
                    </p>
                </div>
            
				<?php endwhile; ?>
    			
                <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;  ?>
                <?php if ($count >= 10 || $paged > 1){ ?>
           		<div class="navigation">
                    <?php next_posts_link('&laquo; Older Entries') ?> | <?php previous_posts_link('Newer Entries &raquo;') ?>
            	</div>
                <?php } ?>
    
        <?php else : ?>
    
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that isn't here.</p>
            <?php get_search_form(); ?>
    
        <?php endif; ?>
            
        </div><!-- /mainContent -->
         
        <?php get_sidebar(); ?>
          
        <br clear="all" /> <!-- important keeps content area same size as sidebar -->
    </div>
    <div class="im-mainContent-bottom"></div>
</div><!-- /wrapper -->

<?php get_footer(); ?>