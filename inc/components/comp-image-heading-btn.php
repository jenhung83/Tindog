<div class="comp-image-heading-btn f-h f-w">
	<!-- this session separates into two areas - <div class="text-area"> and <div class="image-area">
		<div class="text-area">:
		heading + buttons (render button icon if any)

		<div class="image-area">:
		render if there's any.
	-->
	<div class="text-area<?php echo (isset($image)&&!empty($image)?'':'-full');?> type-spacing">
		<?php if($heading != null):?>
		<h1 class="cr-white"><?php echo $heading; ?></h1>
		<div>
			<?php
			// echo'<pre>';var_dump($button);echo'</pre>';
			foreach($button as $i => $j) :
			// 看有多少東東 就生出幾個像下面的<a class="btn btn-dark">
				$button_icon = $j['icon'];
				$button_text = $j['text'];
				$button_url = $j['url'];
				$button_color = ($i % 2 == 0) ? "dark" : "outline-light";
				// var_dump($i);echo'<hr />';
				// var_dump($j);echo'<hr />';
			?>	

			<a class="btn btn-<?php echo $button_color ?>" href="<?php echo $button_url; ?>">
				<i class="fa <?php echo $button_icon; ?>" aria-hidden="true"></i>
				<?php echo $button_text; ?>
			</a>

			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>

	<?php if($image != null):?>
	<div class="image-area image-container">
		<span class="object-fit">
			<?php 
			// echo'<pre>';var_dump($image);;echo'</pre>';
			 echo get_responsive_image($image['ID'], 'medium', 600, $image['alt']); ?>
		</span>

	</div>
	<?php endif; ?>
</div>
<!-- must clear the variables -->
<?php $heading=$button=$button_icon=$button_text=$button_url=$button_color=$image= null ?>