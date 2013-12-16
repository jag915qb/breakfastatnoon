<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */

get_header();
?>

<div class="im-content-wrapper" align="center">
	<div class="im-mainContent-top"></div>
	<div class="im-content-frame">
    	
        <div class="im-mainContent">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
                    <div <?php post_class() ?> id="post-<?php the_ID(); ?>">
                        <h2 class="pageTitle"><?php the_title(); ?></h2>
            
                        <div class="entry">
                            <?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
                        </div>
                        
                        <div class="postmetadata">
                        	<?php $args = array('child_of'     => get_the_ID(),'title_li'     => __(' ')); ?> 
                        	<?php wp_list_pages($args);?> 
                        	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => ' ', 'next_or_number' => 'number')); ?>
							<?php edit_post_link('Edit this page.', '', ''); ?>
                    	</div>
                    
                    </div>
            	
                <?php comments_template(); ?>
            
                <?php endwhile; else: ?>
            
                    <p>Sorry, no posts matched your criteria.</p>
                    
                     <?php $args = array(
                        'smallest'  => 8, 
                        'largest'   => 22,
                        'unit'      => 'pt', 
                        'number'    => 45,  
                        'format'    => 'flat',
                        'separator' => ', ',
                        'orderby'   => 'name', 
                        'order'     => 'ASC',
                        'link'      => 'view', 
                        'taxonomy'  => 'post_tag', 
                        'echo'      => true ); ?>
                    
                    <?php wp_tag_cloud( $args ); ?> 
                    
                    
                    
            
            <?php endif; ?>

        </div><!-- /mainContent -->
         
         <?php get_sidebar(); ?>
         <br clear="all" /> <!-- important keeps content area same size as sidebar -->
        
    </div>
    <div class="im-mainContent-bottom"></div>
</div><!-- /wrapper -->

<?php get_footer(); ?>
