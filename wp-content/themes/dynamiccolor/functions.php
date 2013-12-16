<?php
/**
 * @package WordPress
 * @subpackage DynamicColor
 */

$content_width	= '730';
 
if ( function_exists('register_sidebar') ) {
	register_sidebar(array('before_widget' => '<li id="%1$s" class="widget %2$s">','after_widget' => 
						   '</li>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
	
	register_sidebars(1, array('name'=>'Footer Left', 'before_title'=>'<h2 class="widgettitle">','after_title'=>'</h2>'));
	register_sidebars(1, array('name'=>'Footer Center Left', 'before_title'=>'<h2 class="widgettitle">','after_title'=>'</h2>'));
	register_sidebars(1, array('name'=>'Footer Center Right', 'before_title'=>'<h2 class="widgettitle">','after_title'=>'</h2>'));
		register_sidebars(1, array('name'=>'Footer Right', 'before_title'=>'<h2 class="widgettitle">','after_title'=>'</h2>'));
}



//Add the menu to the Settings sidenav in wp-admin
function dcolor_admin_menu() {
	add_menu_page('DynamicColor', 'DynamicColor', 8, 'functions.php', 'dcolor_panel_setting');
	
}
add_action('admin_menu', 'dcolor_admin_menu');


function dcolor_panel_setting(){ 
	$dcolorOptions = get_option("dcolorOptions");
	if (!$dcolorOptions['color']){ $dcolorOptions['color'] == 'blue';}
	
	if (!empty($_POST['dcolorSubmit'])){
		
			$dcolorOptions['color'] = $_POST['color'];
			$dcolorOptions['feed'] = $_POST['feed'];
			$dcolorOptions['facebook'] = $_POST['facebook'];
			$dcolorOptions['twitter'] = $_POST['twitter'];
			$dcolorOptions['buzz'] = $_POST['buzz'];
			$dcolorOptions['linkedin'] = $_POST['linkedin'];
			$dcolorOptions['friendfeed'] = $_POST['friendfeed'];
			$dcolorOptions['myspace'] = $_POST['myspace'];
			$dcolorOptions['you'] = $_POST['you'];
			
			update_option("dcolorOptions", $dcolorOptions);
			echo '<div class="savedBox"><b>Your settings have been saved</b></div>';
	}
	
	if (!$dcolorOptions['feed']){ $dcolorOptions['feed'] = get_bloginfo('rss2_url');}
	
	?>
	
	<style type="text/css"> 
       .settingsArea	{ background-color:#f1f1f1; padding:10px; width:730px; border:1px solid #e3e3e3; margin:10px 0px; position:relative; }
	   .savedBox		{ position:relative; width:700px; border:2px solid #229585; background-color:#c2f7f0; padding:10px;  margin:20px 0px 0px}
	   .errorBox		{ position:relative; width:700px; border:2px solid #f7a468; background-color:#f7d8c2; padding:10px; margin:20px 0px 0px}
	   .highlight		{ border:2px solid #f7a468; background-color:#f7d8c2}
	   .preview img				{ margin:5px 0px 1px; border:1px solid #555555 }
	   .colorSelection img 		{filter:alpha(opacity=60); -moz-opacity:0.6; opacity:0.6; border:1px solid #555555; margin:5px 0px 1px;}
	   .colorSelection img:hover {filter:alpha(opacity=100); -moz-opacity:1; opacity:1;}
	   
	   .rssNotes		{ background-color:#f5f6f7; border:1px solid #e3e3e3; padding:10px; font-size:90%; color:#666}
	   
		tagline			{ font-size:85%; color:#a6a6a6; font-weight:normal; position:relative; top:-14px; left:10px;}
		tagline	a		{ color:#a6a6a6; text-decoration:none}
		tagline	a:hover	{ color:#242424; text-decoration:none}
		
		small			{ color:#a6a6a6}
		h3				{ margin:0px; padding:0px; color:#526b7f}
		.link			{ position:relative; top:3px; width:100px; float:left; font-weight:bold; font-size:90%}
		
		.text			{ position:absolute; left: 150px; width:250px;}
	</style>
    


    <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-includes/js/jquery/jquery.js"></script> 
       <script language="JavaScript" type="text/javascript">
	   /* <![CDATA[ */

		jQuery(document).ready(function(){
			jQuery(".errorBox").animate( {opacity: 1.0}, 3000, function() {
				jQuery(".errorBox").animate( {opacity: 0.5}, 2000, function() {
					jQuery(".errorBox").slideUp("slow");
				});
			}); 
		
			jQuery(".savedBox").animate( {opacity: 1.0}, 3000, function() {
				jQuery(".savedBox").animate( {opacity: 0.5}, 2000, function() {
					jQuery(".savedBox").slideUp("slow");
				});
			}); 
		});
		
		function changeColor(color){
			document.getElementById('color').value = color;
			document.getElementById('changeMe').innerHTML = '<img src="<?php bloginfo('template_url'); ?>/images/'+color+'Preview.png" width="400" height="300" alt="Preview" />';
		}
		/* ]]> */

	</script>
        
     <div class="wrap">
		<h2>DynamicColor</h2>
        <tagline>by <a href="http://wordpress.gordonfrench.com/dynamicColor/">Gordon French</a></tagline>
     
     	 <form method="post" action="admin.php?page=functions.php"/>
         	
            <input type="hidden" id="color" name="color" value="<?php echo $dcolorOptions['color']; ?>" /> 
            
        	<div class="settingsArea">
            	
                <div class="preview" style="margin:0px 0px 10px; width:410px; float:left;">
                	<h3>Current Color</h3>
                    <small>Preview or current color.</small>
                	<p id="changeMe">
                    	<img src="<?php bloginfo('template_url'); ?>/images/<?php echo $dcolorOptions['color']; ?>Preview.png" width="400" height="300" alt="Preview" />
                    </p>
                </div>
                
                <div class="colorSelection" style="margin-left:410px;"> 
                    <h3>Select Color</h3>
                    <small>Simply Click an image, then press save.</small>
                    <p>
                    <img onclick="changeColor('blue')" src="<?php bloginfo('template_url'); ?>/images/bluePreview.png" width="150" height="92" alt="Blue preview" />
                    <img onclick="changeColor('green')" src="<?php bloginfo('template_url'); ?>/images/greenPreview.png" width="150" height="92" alt="Green preview" />
                    <img onclick="changeColor('orange')" src="<?php bloginfo('template_url'); ?>/images/orangePreview.png" width="150" height="92" alt="Orange preview" />
                    <img onclick="changeColor('red')" src="<?php bloginfo('template_url'); ?>/images/redPreview.png" width="150" height="92" alt="Red preview" />
                    <img onclick="changeColor('purple')" src="<?php bloginfo('template_url'); ?>/images/purplePreview.png" width="150" height="92" alt="Purple preview" />
                    <img onclick="changeColor('black')" src="<?php bloginfo('template_url'); ?>/images/blackPreview.png" width="150" height="92" alt="Black preview" />
                    </p>
                </div>
                 
               <br clear="all"/>
               	 <h3>Social Network</h3>
                 <small>Simply add your network link and the correct image will appear in the footer.<br />
						Full http:// please.</small>
                 <p><img src="<?php bloginfo('template_url'); ?>/images/social/feed.png"/>
                 <b>RSS Feed:</b> 	<input class="text" type="text" name="feed" value="<?php echo $dcolorOptions['feed']; ?>"/> </p>
                 
                 <p><img src="<?php bloginfo('template_url'); ?>/images/social/facebook.png"/>
                 <b>FaceBook:</b> 	<input class="text" type="text" name="facebook" value="<?php echo $dcolorOptions['facebook']; ?>"/> </p>
                 
                 <p><img src="<?php bloginfo('template_url'); ?>/images/social/twitter.png"/>
                 <b>Twitter:</b> 	<input class="text" type="text" name="twitter" value="<?php echo $dcolorOptions['twitter']; ?>"/> </p>
                 
                 <p><img src="<?php bloginfo('template_url'); ?>/images/social/buzz.png"/>
                 <b>Google Buzz:</b> 	<input class="text" type="text" name="buzz" value="<?php echo $dcolorOptions['buzz']; ?>"/> </p>
                 
                 <p><img src="<?php bloginfo('template_url'); ?>/images/social/linkedin.png"/>
                 <b>Linked In:</b> 	<input class="text" type="text" name="linkedin" value="<?php echo $dcolorOptions['linkedin']; ?>"/> </p>
                 
                 <p><img src="<?php bloginfo('template_url'); ?>/images/social/friendfeed.png"/>
                 <b>FriendFeed:</b> 	<input class="text" type="text" name="friendfeed" value="<?php echo $dcolorOptions['friendfeed']; ?>"/> </p>
                 
                 <p><img src="<?php bloginfo('template_url'); ?>/images/social/myspace.png"/>
                 <b>My Space:</b> 	<input class="text" type="text" name="myspace" value="<?php echo $dcolorOptions['myspace']; ?>"/> </p>
                 
                 <p><img src="<?php bloginfo('template_url'); ?>/images/social/youtube.png"/>
                 <b>youTube:</b> 	<input class="text" type="text" name="you" value="<?php echo $dcolorOptions['you']; ?>"/> </p>
            </div>
            
            <input type="hidden" id="dcolorSubmit" name="dcolorSubmit" value="1" />        
            <input name="save" value="Save" type="submit" />
       </form>
     
     
     </div>
     
<?php }

class truncate{
	/* Public function for truncating content
	*  Requires an string and a length
	*
	* Structure:
	* $truncateString = 'text ro truncate'
	*
	* Example:
	*	$truncateString = truncate::doTruncate($_POST['truncate'], 100);
	*					
	* Returns:
	* return truncated string;
	*/	
	public static function doTruncate($truncateString, $limit, $break=".", $pad="...") { 
	// return with no change if string is shorter than $limit  
	if(strlen($truncateString) <= $limit) return $truncateString; 
		// is $break present between $limit and the end of the string?  
		if(false !== ($breakpoint = strpos($truncateString, $break, $limit))) { 
			if($breakpoint < strlen($truncateString) - 1) { 
				$truncateString = substr($truncateString, 0, $breakpoint) . $pad; 
			}
		} 
		return $truncateString;
	}
}
?>