<?php get_header(); ?>
<div class="contentLayout">
<div class="sidebar1">

					<?php include (TEMPLATEPATH . '/sidebar1.php'); ?>
					
</div>
<div class="content">


<div class="Block">
  <div class="Block-body">


<div class="BlockContent">
  <div class="BlockContent-body">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 
    <div id="post-<?php the_ID(); ?>" <?php if (function_exists('post_class') ){ post_class(); } else { echo 'class="post"'; } ?> >
        <h2><?php the_title(); ?></h2>
        <div class="entry">
	        <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
		    <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
        </div>
    </div>
<?php endwhile; endif; ?>
<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

  </div>
  <div class="BlockContent-tl"></div>
  <div class="BlockContent-tr"><div></div></div>
  <div class="BlockContent-bl"><div></div></div>
  <div class="BlockContent-br"><div></div></div>
  <div class="BlockContent-tc"><div></div></div>
  <div class="BlockContent-bc"><div></div></div>
  <div class="BlockContent-cl"><div></div></div>
  <div class="BlockContent-cr"><div></div></div>
  <div class="BlockContent-cc"></div>
</div>


  </div>
</div>


</div>
<div class="sidebar2">

					<?php include (TEMPLATEPATH . '/sidebar2.php'); ?>
					
</div>

</div>

<?php get_footer(); ?>