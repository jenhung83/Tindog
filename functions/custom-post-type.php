<?php
	function lorem_post_type() {
		register_post_type('profiles',
			array(
				'labels' => array(
					'name' => 'Profiles',
					'singular_name' => 'Profile'
				),
				'supports' => array('title'),
				'menu_position' => 5,
				'menu_icon' => 'dashicons-admin-users',
				'public' => true,
				'rewrite' => array( 'with_front' => false ),
				'exclude_from_search' => true,
				'has_archive' => false
			)
		);
	}
	add_action('init', 'lorem_post_type');

	function lorem_taxonomy() {
		register_taxonomy( 'profile_types', 'profiles',
			array(
				'hierarchical' => true,  
				'label' => 'Profile Types',
				'query_var' => true,
			)
		);
	}
	add_action( 'init', 'lorem_taxonomy');
?>