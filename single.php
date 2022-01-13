<?php
	$post_type = get_post_type();
	$html_id = 'template-'.$post_type.'-single';
	get_header();
?>

	<?php 
		while(have_posts()):the_post();
			the_title();
			the_content();
		endwhile;
	?>

<?php get_footer();?>