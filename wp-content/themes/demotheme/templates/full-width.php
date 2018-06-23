<?php  
	/* Template Name: Full Width */
?>
<?php get_header(); ?>
<div class="content">
	<div id="main-content" class="full-width">
		<?php if(have_posts()) : while(have_posts()) : the_post();// Kiem tra co bai viet ko, neu co thi lap luon bai viet do ?>
			<?php get_template_part('content', get_post_format() ); ?>
			<?php get_template_part('author-bio'); ?>
			<?php comments_template(); ?>
		<?php endwhile ?>
		<?php else: ?>
			<?php get_template_part('content','none'); ?>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>