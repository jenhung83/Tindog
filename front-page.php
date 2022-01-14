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
	if(isset($feature) && !empty($feature)):
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
	<div class="user-carousel" data-flickity='{ 
		"cellAlign": "center", 
		"contain": true, 
		"wrapAround": true,
		"autoPlay": 5000, 
		"pauseAutoPlayOnHover": false,
		"setGallerySize": false,
		"pageDots": false }'>
		<?php $testimonial = get_field('testimonial_group');
		// echo'<pre>';var_dump($testimonial);echo'</pre>';
		//wrapAround: true

		if($testimonial != null):
			foreach($testimonial as $t):
			$t_comment=$t['comment'];
			$t_profile=$t['profile'];
			$t_name=$t['user_name'];
			// var_dump($t_comment);

		?>

  	<div class="carousel-cell f-v type-spacing c-2">
			<h2><?php echo $t_comment; ?></h2>

			<div class="f-h f-j-c f-a-c">
				<div class="image-container">
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

<session class="frontpage-press">

  <div class="marquee bg-sec" data-speed="10">
    <div class="marquee-inner">
      <?php $press = get_field('press');
      // var_dump($press);
      if (isset($press) && !empty($press)):
        foreach ($press as $p):
      ?>
      <div class="marquee-block"> 
        <?php echo get_responsive_image($p['ID'], 'medium', 300, $p['alt']); ?>     
      </div>
      <?php 
        endforeach;
      endif;
      ?>
    </div>

  </div>
</session>
<!-- 
	上面寫完ㄌㄜ 剩下pricing session and card component
	WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 -->
<session class="frontpage-pricing">
	<h1><?php // 不能這樣寫 還是用isset 不然網頁會壞掉 echo get_field('pricing_title') ? get_field('pricing_title') : '';?></h1>
  <?php 
    
    // include( locate_template( 'inc/components/comp-pricing-card.php', false, false ));?>
</session>
<!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14 --><!-- WIP 2022 01 14

下面寫完了～～
 -->



<session class="frontpage-download f-h bg-main">
  <?php 
  $heading = get_field('download_heading');
  $button = get_field('download_options');
    include( locate_template( 'inc/components/comp-image-heading-btn.php', false, false ));
  ?>
</session>



<?php get_footer();?>