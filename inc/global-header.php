<header class="global-header f-h f-a-c bg-main">
	<div class="header-logo">
		<a
			href="<?php echo site_url();?>" 
			title="<?php echo get_bloginfo('name');?>">
			<?php //include( locate_template( 'assets-img/svg-logo.svg', false, false ));?>
			<?php include( locate_template( 'assets-img/tindog.svg', false, false ));?>
		</a>
	</div>

	
	<?php
		if(has_nav_menu('primary')) {
			$arg = array(
				'theme_location' => 'primary',
				'container' => false,
				'echo' => false,
				'items_wrap' => '%3$s'
			);
			echo '<nav class="global-sidebar-nav">
				<ul class="f-h t-b-1">'.strip_tags(wp_nav_menu($arg),'<li><a>').'</ul>
			</nav>';
		}
	?>

</header>