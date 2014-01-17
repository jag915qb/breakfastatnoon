<?php get_header(); ?>
<div class="contentLayout">
<div class="sidebar1">

					<?php include (TEMPLATEPATH . '/sidebar1.php'); ?>
					
</div>
<div class="content">


<div class="Block">
  <div class="Block-body">

<div class="BlockHeader">
Search Results
  <div class="l"></div>
  <div class="r"><div></div></div>
</div>


<div class="BlockContent">
  <div class="BlockContent-body">

<?php if (have_posts()) : ?>
	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>
	<?php while (have_posts()) : the_post(); ?>
		<div class="post">
			<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
			<small><?php the_time('l, F jS, Y') ?></small>
			<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
		</div>
	<?php endwhile; ?>
	<div class="navigation">
		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
	</div>
<?php else : ?>
	<h2 class="center">No posts found. Try a different search?</h2>
<?php endif; ?>

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