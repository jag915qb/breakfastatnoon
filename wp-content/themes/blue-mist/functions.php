<?php
define('HEADER_TEXTCOLOR', 'ffffff');
define('HEADER_IMAGE', get_template_directory_uri().'/images/header.gif');
define('HEADER_IMAGE_WIDTH', 770);
define('HEADER_IMAGE_HEIGHT', 135);
$content_width = 500;
add_custom_background();
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');


add_action( 'widgets_init', 'bluemist_widgets_init' );
function bluemist_widgets_init() {
        register_sidebar( array(
            'name'  => 'Sidebar',
            'id'    => 'sidebar',
            'description'   => 'Right Sidebar',
            'before_title'=>'<h3>',
            'after_title'=>'</h3>',
            'before_widget'=>'<div class="box">',
            'after_widget'=>'</div>'
        ) );
}

wp_register_style('bluemist_ie', get_template_directory_uri().'/ie.css');
wp_enqueue_style( 'bluemist_ie');

register_nav_menu('main', 'Main navigation menu');

function bluemist_header_style() {
    if (get_header_image ()) {
        ?><style type="text/css">
            #header {
                background: url(<?php header_image() ?>) no-repeat;
            }
        </style><?php
    }
}

if (!function_exists('bluemist_admin_header_style')) {
    function bluemist_admin_header_style() {
        ?><style type="text/css">
            #heading {
                width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
                height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            }
        </style><?php
    }
}
add_custom_image_header('bluemist_header_style', 'bluemist_admin_header_style');