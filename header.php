<!doctype html>
<html 
	<?php 
		global $html_id, $html_class;

		echo (isset($html_id) && !empty($html_id)) 
			? ' id="'.$html_id.'" ' : '';

		echo (isset($html_class) && !empty($html_class)) 
			? ' class="'.implode(' ', $html_class).'" ' : '';

		language_attributes();
	?>
>
<head>
	<meta http-equiv="Content-Type" charset="<?php bloginfo('charset');?>" content="text/html;charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
	<link rel="pingback" href="<?php bloginfo('pingback_url');?>">
	<script src="https://use.fontawesome.com/6da02677a1.js"></script>
	<script>
		// site variables
		const siteUrl = '<?php echo get_site_url();?>';
		const root = document.documentElement;
	</script>

	<?php 
		wp_head();

		// inline CSS, to avoid style flash
		$html_init = get_inc('inc/html-css-reset');
		$html_init .= get_inc('inc/html-css-utilities');
		$html_init .= get_inc('inc/html-css-animations');
		$html_init .= get_inc('inc/html-css-first-paint');

		// echo with html_init without new lines and tabs
		echo preg_replace('/\s+/S', " ", $html_init);
	?>

</head>

<body <?php body_class();?>>

	<div class="global-skip">
		<a class="btn" href="#main">Skip to content</a>
	</div>

	<?php include( locate_template( 'inc/global-header.php', false, false ));?>

	<main id="main">