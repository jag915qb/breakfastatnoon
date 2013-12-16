<?php	$blog_jumbo = of_get_option('blog_jumbo');
	if ($blog_jumbo){
	?>
	<div class="clearfix row">
		<div class="jumbotron">
			<h1><?php bloginfo('title'); ?></h1>
			<p><?php bloginfo('description'); ?></p>
            <p><a class="btn btn-primary btn-lg" href="#main"><span class="glyphicon glyphicon-chevron-down"></span> Posts</a></p>
		</div>
	</div>
<?php	}	?>