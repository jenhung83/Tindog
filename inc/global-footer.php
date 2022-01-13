<footer class="global-footer">

	<div class="c-5">
		<div>
			<?php
				$social_media = get_field('social_media', 'option');										
				if ($social_media != null):
					echo'<div class="social-media">';
						foreach( $social_media as $item ):
						$media_slug = strtolower($item['media']['title']);
						?>					
						<a href="<?php echo $item['media']['url']; ?>" class="t-l-1" aria-label="<?php echo $item['media']['title']; ?>">
						<?php include( locate_template( 'assets-img/svg-social-'.$media_slug.'.svg', false, false )); ?>
						</a>
						<?php 
						endforeach;							
					echo'</div>';
				endif;?>
		</div>

	<?php
		if(has_nav_menu('footer-menu')) {
			$arg = array(
				'theme_location' => 'footer-menu',
				'container' => false,
				'echo' => false,
				'items_wrap' => '%3$s'
			);					
			echo '<ul class="footer-menu f-h user-select-disable">'.str_replace (
			'<a', 
			'<a data-barba-prevent="self" ', 
			strip_tags(
					wp_nav_menu( $arg ),
			'<li><a>' ) ).'</ul>';							
		}
	?>

		<?php 
		$copyright = get_field('copyright', 'option');										
		if ($copyright != null):?>
		<p class="text-muted">&copy;&nbsp;<?php echo $copyright; ?></p>
		<?php endif;?>
	</div>
</footer>