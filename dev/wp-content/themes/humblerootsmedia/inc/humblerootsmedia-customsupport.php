<?php

// Add custom header support
$args = array(
	'flex-width'    => true,
	'width'         => 1200,
	'flex-height'    => true,
	'height'        => 675,
	'default-image' => get_template_directory_uri() . '/images/camera.jpg',
);
add_theme_support( 'custom-header', $args );

// Add featured image support for posts and pages
// Featured image will override header image if it is larger
add_theme_support( 'post-thumbnails' );

function humblerootsmedia_customize_register( $wp_customize ) {
  // Add Option to Change the Slide Image
  $wp_customize->add_section( 'humblerootsmedia_section_slide_image' , array(
    'title'      => __( 'Slide Image', 'humblerootsmedia' ),
    'description' => 'Change Slide Image',
    'priority'  => 60
  ));
  $wp_customize->add_setting( 'humblerootsmedia_slide_image', array(
    'default'     => get_bloginfo('template_directory') . '/images/film.jpg'
  ));
  $wp_customize->add_control(
  new WP_Customize_Image_Control( $wp_customize, 'humblerootsmedia_slide_image', array(
  	'label'        => __( 'Slide Image', 'humblerootsmedia' ),
    'description' => __( 'Image that displays in the slide that goes to the Humble Thoughts page.', 'humblerootsmedia' ),
  	'section'    => 'humblerootsmedia_section_slide_image',
  	'settings'   => 'humblerootsmedia_slide_image'
  )));
}
add_action( 'customize_register', 'humblerootsmedia_customize_register' );