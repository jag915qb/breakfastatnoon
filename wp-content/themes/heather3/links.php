<?php get_header(); ?>
<div class="contentLayout">
<div class="sidebar1">

					<?php include (TEMPLATEPATH . '/sidebar1.php'); ?>
					
</div>
<div class="content">


<div class="Block">
  <div class="Block-body">

<div class="BlockHeader">
Links
  <div class="l"></div>
  <div class="r"><div></div></div>
</div>


<div class="BlockContent">
  <div class="BlockContent-body">

<ul>
<?php get_links_list(); ?>
</ul>

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