<?php
	show_admin_bar(false);
	// register additional build functions
	require_once(get_template_directory().'/functions/utilities.php');
	require_once(get_template_directory().'/functions/custom-post-type.php');
	require_once(get_template_directory().'/functions/acf-add-options.php');

	// enqueue scripts and stylesheets
	function tindog_theme_styles() {
		wp_enqueue_style('flickity', get_template_directory_uri().'/assets-css/flickity.css');	
		wp_enqueue_style('styles', get_template_directory_uri().'/assets-css/css/styles.min.css',array(),time());
		// wp_enqueue_style('main',get_template_directory_uri().'/assets-css/css/styles.min.css',array(),time()); //從kombrewcha複製來的	
	}
	add_action('wp_enqueue_scripts', 'tindog_theme_styles');

	function tindog_theme_scripts() {
		// flickity was not added in starter yoyo
		wp_enqueue_script('plugin-flickity', get_template_directory_uri().'/assets-js/plugin-flickity.js', '', '', true);
		wp_enqueue_script('polyfill-intersection-observer', get_template_directory_uri().'/assets-js/polyfill-intersection-observer.js', '', '', true);
		wp_enqueue_script('polyfill-smooth-scroll', get_template_directory_uri().'/assets-js/polyfill-smooth-scroll.js', '', '', true);
		wp_enqueue_script('polyfill-focus-visible', get_template_directory_uri().'/assets-js/polyfill-focus-visible.js', '', '', true);
		wp_enqueue_script('lazy-sizes', get_template_directory_uri().'/assets-js/plugin-lazy-sizes.js', '', '', true);
		wp_enqueue_script('reframe', get_template_directory_uri().'/assets-js/plugin-reframe.js', '', '', true);
		wp_enqueue_script('infinite-scrolling', get_template_directory_uri().'/assets-js/plugin-infinite-scrolling.js', '', false);
		wp_enqueue_script('initialize', get_template_directory_uri().'/assets-js/initialize.js', '', false);
		wp_enqueue_script('index', get_template_directory_uri().'/assets-js/index.js', '', false);
	}
	add_action('wp_enqueue_scripts', 'tindog_theme_scripts');

	// append more wordpress functionalities
	function tindog_theme_setup() {
		add_theme_support('menus');
		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_editor_style(array('assets-css/editor-style.css'));
	}
	add_action('after_setup_theme','tindog_theme_setup');

	function tindog_register_theme_menus() {
		register_nav_menus(
			array(
				'primary' => 'Primary'
			)
		);
		register_nav_menus( //在這裏register menu 才會有選項可以用～～
			array(
				'footer-menu' => 'Footer Menu'
			)
		);
	}
	add_action('init','tindog_register_theme_menus');

	// disable core WP features for better optimization
	function tindog_disable_emojis() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );	
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	}
	add_action( 'init', 'tindog_disable_emojis' );

	function tindog_remove_menus() {
		// remove_menu_page('index.php');
		// remove_menu_page('edit.php');
		// remove_menu_page('edit-comments.php');
	}
	add_action('admin_menu', 'tindog_remove_menus');


	//disable Yoast SEO @Person schema on posts
	add_filter( 'wpseo_schema_needs_author', '__return_false' );

	//change Yoast SEO article schema author to the organization
	add_filter( 'wpseo_schema_article', 'change_article_author' );

	// disable auto p tag wrap in contact form 7
	add_filter('wpcf7_form_elements',function($content){
		$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
		return $content;
	});
	add_filter('wpcf7_autop_or_not', '__return_false');

	if(!isset($content_width)) {
		$content_width = 900;
	}

	// change excerpt length
	function tindog_excerpt_length($length) {
		return 28;
	}
	add_filter('excerpt_length','tindog_excerpt_length',999);

	function tindog_excerpt_more($more) {
		return '...';
	}
	add_filter('excerpt_more','tindog_excerpt_more');

	// admin login screen skinning
	function tindog_admin_skinning() {
		?>
			<style type="text/css">

				body.login {
					background: #F2F2F2 !important
				}

				body.login #login form {
					box-shadow: none !important;
					border-color: #000000 !important;
				}

				body.login div#login h1 a {
					width: 120px !important;
					height: 70px !important;
					background-image: url(<?php echo get_template_directory_uri().'/assets-img/svg-logo.svg';?>);
					/* filter: invert(100); */
					background-size: 100% !important;
					pointer-events: none;
				}

				.login label {
					font-family: "Helvetica", monospace;
					font-weight: 400;
				}

				.login form .input,
				.login input[type=text] {
					background-color: #ffffff !important;
					box-shadow: none !important;
					border: 1px solid #000000;
					margin-top: 2px !important;
					border-radius: 0px !important;
				}

				body.login input[type="submit"] {
					display: block !important;
					width: 100% !important;
					height: 40px !important;
					line-height: 40px !important;
					margin: 30px 0 0 !important;
					border: none !important;
					text-shadow: none !important;
					background: #000000 !important;
					border-radius: 0 !important
				}

				body.login #nav {
					text-align: center;
				}

				body.login #nav a {
					color: #000 !important;
				}

				body.login #backtoblog {
					display: none !important;
				}

			</style>
		<?php
	}
	add_action('login_enqueue_scripts', 'tindog_admin_skinning');
?>