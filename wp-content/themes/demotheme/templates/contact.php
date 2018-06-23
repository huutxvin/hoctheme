<?php  
	/*Template Name: Contact */
?>
<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="contact-info">
			<h4>Address:</h4>
			<p>Some where</p>
		</div>
		<div class="contact-form">
			<?php echo do_shortcode('[contact-form-7 id="550" title="Contact form 1"]'); // Su dung Plugin Contact Form 7 ?> 
		</div>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>