<?php
	$html_id = 'frontpage';
	get_header();	
?>

<section class="frontpage-hero bg-main">
	<?php
		$heading = get_field('hero_title');
		$image = get_field('hero_image');		
		$button = get_field('hero_download');

		include( locate_template( 'inc/components/comp-image-heading-btn.php', false, false ));
				
	?>

</section>
<session class="frontpage-feature bg-white f-h">
	<?php 
	$feature = get_field('feature_group');
	// var_dump($feature);
	echo '<div class="f-h c-1">';
	if($feature):
		foreach($feature as $f):
		$f_icon = $f['feature_fa_icon'];
		$f_heading = $f["feature_heading"];
		$f_content = $f["feature_content"];
		echo '<div class="feature-item"><i class="cr-sec featureIcon fa '.$f_icon.' fa-3x" aria-hidden="true"></i><h3 class="cr-black">'.$f_heading.'</h3><p class="cr-grey">'.$f_content.'</p></div>';
		endforeach;
	endif;
	echo '</div>';
	?>
</session>
<session class="frontpage-testimonial bg-sec f-v cr-white">
	<div class="main-carousel" data-flickity='{ 
		"cellAlign": "center", 
		"contain": true, 
		"wrapAround": true,
		"autoPlay": 3500, 
		"pauseAutoPlayOnHover": false,
		"setGallerySize": false }'>
		<?php $testimonial = get_field('testimonial_group');
		// echo'<pre>';var_dump($testimonial);echo'</pre>';
		//wrapAround: true

		if($testimonial):
			foreach($testimonial as $t):
			$t_comment=$t['comment'];
			$t_profile=$t['profile'];
			$t_name=$t['user_name'];
			// var_dump($t_comment);

		?>

  	<div class="carousel-cell f-v type-spacing c-2">
			<h2><?php echo $t_comment; ?></h2>

			<div class="f-h f-j-c f-a-c">
				<div class="image-area image-container">
					<span class="">
						<?php 
						// echo'<pre>';var_dump($image);;echo'</pre>';
						echo get_responsive_image($t_profile['ID'], 'medium', 150, $t_profile['alt']); ?>
					</span>
				</div>
				<em><?php echo $t_name; ?></em>
			</div>

		</div>
		<?php
			endforeach;
		endif;
		?>

	</div>
</session>

<?php get_footer();?>