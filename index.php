<?php 
	$html_id = 'template-page-'.get_post_field( 'post_name', get_post() );
	get_header();
?>

<section class="page-content">
<div class="c-2">
	<?php 
		if(have_posts()){
			while(have_posts()):the_post();
				echo '<div class="content-header cr-white">
					<h1 class="t-h-1">'.get_the_title().'</h1>
				</div>';

				echo '<div class="content-layout cr-white">';
					the_content();
				echo '</div>';
			endwhile;
		}
	?>
</div>
</section>

<?php get_footer();?>