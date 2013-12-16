<?php
global $eo_const, $eo_options;
(of_get_option('highl_postcnt') ) ? $postcnt = intval(of_get_option('highl_postcnt')) : $postcnt = 4;
$cat = intval(of_get_option('highl_postcat'));
$orderby = of_get_option('highl_ord_by');
$ord = of_get_option('highl_ord');
$high_args = array(
	'ignore_sticky_posts' => 1
);
if($postcnt) $high_args["posts_per_page"] = $postcnt;
if($orderby) $high_args["orderby"] = $orderby;
if($ord) $high_args["order"] = $ord;
if($cat && $cat != 0) $high_args["cat"] = $cat;
// The Query
$high_qy = new WP_Query( $high_args );
?>  

<div id="highlights" class="row">
<?php // Highlights Loop
	while ( $high_qy->have_posts() ) {
	$high_qy->the_post();
	$customimg = get_post_meta($post->ID,"_eo_cust_post_feat_img",true);
?>
    <div class="col-sm-6 col-md-4 col-lg-3">
    <?php	if ( has_post_thumbnail() ) { 
		the_post_thumbnail( 'eo-highlight',array('class' => 'img-circle') );
	 }
	 else if($customimg) {
		?>	<img class="hold img-circle" src="<?php echo $customimg?>"  alt="<?php get_the_title() ?>">
	<?php
	 }
	else if ($eo_options["use_placeholder"] == "1" ){ 
		if( is_array($eo_const['say_hi'] ) ) {
			$hia = $eo_const['say_hi'];
			$himx = count($hia);
			$hin = array_rand($hia);
			$hi_txt = $hia[$hin];
		}
	?> 
	<img class="hold img-circle" src="data:image/png;base64," data-src="<?php echo get_template_directory_uri().'/library/bootstrap/js/holder.js/140x140/auto/highlights/text:'.esc_attr($hi_txt); ?>" alt="<?php get_the_title() ?>" data-holder-invisible="true">
	<?php }  else if ($eo_options["use_placeholder"] != "1" && $eo_options["use_placeholder_img"] == "1") {	 ?>
	<img class="hold img-circle" src="<?php echo get_template_directory_uri().'/rsc/img/ph.jpg' ?>" alt="<?php get_the_title() ?>">
	<?php } ?>
      <h2><?php	echo  get_the_title()  ?></h2>
		<?php the_excerpt(); ?>
        <p><a class="btn btn-info" href="<?php the_permalink() ?>"><span class="glyphicon glyphicon-star"></span>Read More &raquo;</a></p>
    </div><!-- /.col-lg-4 -->
		<?php } // end highlight loop ?>
</div><!-- /.row -->