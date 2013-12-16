<?php /**/
global $eo_options;
/*var_dump($eo_options);*/

$oo = of_get_option( 'eo_custom_footer_js' );
//if($heading_typography) var_dump($eo_options["eo_typo_heading"]);

	$eo_fnts_prep = get_option ( 'eo_all_fonts_arr' );
//var_dump($oo);
//var_dump($eo_fnts_prep["gwf_font"]["font_faces"]);

$ua_key = of_get_option("google_ua_key");
$gencl_uakey = eo_get_gen_clss("google_ua_key");
$ga_subd = of_get_option("ga_subd");
$ga_topl = of_get_option("ga_topl");
(of_get_option("ga_advs")) ? $ht = 'https://' : $ht = 'https://ssl';
//if(

if(!empty($ua_key) && strpos($gencl_uakey,"lvalidl") !== false ) { ?>
<?php $the_domain =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']); ?>
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccosunt', '<?php echo $ua_key ?>']);
  <?php if($ga_subd) echo "_gaq.push(['_setDomainName', $the_domain]);"?>
  <?php if($ga_subd && $ga_topl) echo "_gaq.push(['_setAllowLinker', true]);" ?>
  _gaq.push(['_trackPageview']);
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? '<?php echo $ht ?>' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>

<?php 
}
else if( !empty($ua_key) ){
	eo_alert("wrong Analytic UA ID","warning");
}
?>

