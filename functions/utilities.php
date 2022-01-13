<?php
	function get_inc($template_name, $part_name=null) {
		ob_start();
		get_template_part($template_name, $part_name);
		$var = ob_get_contents();
		ob_end_clean();
		return $var;
	}

	function get_responsive_image($image_id, $image_size, $max_width, $alt = null, $class = null) {
		// check the image ID is not blank
		if(!empty($image_id != '')) {

			// set the default src image size
			$image_src = wp_get_attachment_image_url( $image_id, $image_size );

			// set the srcset with various image sizes
			$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

			// generate the markup for the responsive image
			return '<img 
				src="'.$image_src.'" 
				srcset="'.$image_srcset.'" 
				sizes="(max-width: '.$max_width.'px) 100vw, '.$max_width.'px" 
				alt="'.(!empty($alt) ? $alt : '').'" 
				class="'.(!empty($class) ? $class : '').'">';
		}
	}

	function get_button($label, $url, $new_tab = false, $class = false) {
		// check the url and label is not blank

		if(!empty($label) && !empty($url)) {
			// generate the markup for the button
			return '<a 
				href="'.$url.'" '.
				(($new_tab == true) ? ' target="_blank"' : '').' 
				title="'.esc_attr($label).'" 
				class="btn '.$class.'">
			<span>'.$label.'</span></a>';
		}
	}

	function format_slug($string) {
		//Lower case everything
		$string = strtolower($string);
		// replace accent characters
		$string = htmlentities($string, ENT_COMPAT, "UTF-8");
		$string = preg_replace('/&([a-zA-Z])(uml|acute|grave|circ|tilde|ring);/','$1',$string);
		//Make alphanumeric (removes all other characters)
		$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
		//Clean up multiple dashes or whitespaces
		$string = preg_replace("/[\s-]+/", " ", $string);
		//Convert whitespaces and underscore to dash
		$string = preg_replace("/[\s_]/", "-", $string);
		return $string;
	}

	function format_price($price, $decimals = 0) {
		if(!empty($price)) {
			return '<span class="price">'.
				number_format($price, $decimals).
			'</span>';
		}
	}
?>