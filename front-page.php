<?php
/**
 * Custom Front Page
 *
 * @author Nate Finch
 * @link http://finchproservices.com
 *
 */

// Execute custom home page. If no widgets active, then loop
add_action( 'genesis_meta', 'n8f_custom_home_loop' );

function n8f_custom_home_loop() {
	if ( is_active_sidebar( 'home-featured-full' ) || is_active_sidebar( 'home-featured-left' ) || is_active_sidebar( 'home-featured-right' ) || is_active_sidebar( 'home-middle-1' ) || is_active_sidebar( 'home-middle-2' ) || is_active_sidebar( 'home-middle-3' ) || is_active_sidebar( 'home-bottom' ) ) {

		remove_action( 'genesis_loop', 'genesis_do_loop' );
		add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
		add_action( 'genesis_before_content', 'n8f_home_do_featured' );
		add_action( 'genesis_before_content', 'n8f_home_do_middle' );
	}
}


// Home feature widget section
function n8f_home_do_featured() {

	if ( is_active_sidebar( 'home-featured-full' ) || is_active_sidebar( 'home-featured-left' ) || is_active_sidebar( 'home-featured-right' ) ) {

		echo '<section id="home-featured" class="clearfix"><div class="wrap">';

		genesis_widget_area( 'home-featured-full', array(
			'before' => '<main class="home-featured-full">',
			'after'  => '</main>',
		) );

		echo '<section id="home-featured-halves">';

		genesis_widget_area( 'home-featured-left', array(
			'before' => '<aside class="home-featured-left one-half first">',
			'after'  => '</aside>',
		) );

		genesis_widget_area( 'home-featured-right', array(
			'before' => '<aside class="home-featured-right one-half">',
			'after'  => '</aside>',
		) );

		genesis_widget_area( 'home-featured-trailer', array(
			'before' => '<main id="home-featured-trailer" class="home-featured-full">',
			'after'  => '</main>',
		) );

		echo '</section><!-- end home-featured-halves --></div><!-- end wrap --></section><!-- end home-featured -->';
	}
}

// Home middle widget section

function n8f_home_do_middle() {

	if ( is_active_sidebar( 'home-middle-1' ) || is_active_sidebar( 'home-middle-2' ) || is_active_sidebar( 'home-middle-3' ) ) {

		echo '<section id="home-middle" class="clearfix"><div class="wrap">';

		genesis_widget_area( 'home-middle-1', array(
			'before' => '<aside class="home-middle-1 widget-area one-third first">',
			'after'  => '</aside>',
		) );

		genesis_widget_area( 'home-middle-2', array(
			'before' => '<aside class="home-middle-2 widget-area one-third">',
			'after'  => '</aside>',
		) );

		genesis_widget_area( 'home-middle-3', array(
			'before' => '<aside class="home-middle-3 widget-area one-third">',
			'after'  => '</aside>',

		) );

		echo '</div><!-- end wrap --></section><!-- end home-middle -->';

		echo '<section id="home-reviews" class="clearfix"><div class="wrap">';

		genesis_widget_area( 'home-reviews', array(
			'before' => '<div class="home-featured-full widget-area">',
			'after'  => '</div>',
		) );

		echo '</div><!-- end wrap --></section><!-- end home-reviews-->';
	}
}


genesis();


?>