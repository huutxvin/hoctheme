<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<?php if(have_posts()) : while(have_posts()) : the_post();// Kiem tra co bai viet ko, neu co thi lap luon bai viet do ?>
			<?php get_template_part('content', get_post_format() ); ?>
		<?php endwhile ?>
		<?php demo_pagination(); ?>
		<?php else: ?>
			<?php get_template_part('content','none'); ?>
		<?php endif; ?>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
