<?php 
	$html_id = 'template-error';
	get_header();
?>

<section class="error-content">
<div class="c type-spacing">
	<h1 class="t-h-1">nothing to explore here...</h1>
	<?php echo get_button('Back to Home', site_url()); ?>
</div>
</section>

<?php get_footer();?>