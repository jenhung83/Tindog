<?php //新加上的 原本不在starter裏面

	add_action('acf/init', 'my_acf_op_init');
	function my_acf_op_init() {
	  // Check function exists.
    if( function_exists('acf_add_options_page') ) {

				// https://www.advancedcustomfields.com/resources/acf_add_options_page/
        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Sitewide General Settings'),	// 上方頁面標題
            'menu_title'  => __('Sitewide Settings'),	//側邊欄位名
            'redirect'    => false,	//設成false(default)點選側邊欄 會直接跳轉到第一個child頁面(Find Retailers)
        ));

        // Add sub page.
        $footer = acf_add_options_page(array(
            'page_title'  => __('Footer Settings'),
            'menu_title'  => __('Footer'),
            'parent_slug' => $parent['menu_slug'],
        ));
    }
	}
?>