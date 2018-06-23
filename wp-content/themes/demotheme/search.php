<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="search-info">
			<?php 
				$search_query = new WP_Query('s='.$s.'&showpost=-1'); // Cac gia tri nhap vao o tim kiem
				$search_keyword = wp_specialchars($s, 1); // Loai bo ki tu dac biet
				$search_count = $search_query->post_count; // Lay cac bai viet tim duoc
				printf(__('Founded %1$s articles.','fulltext'), $search_count);
			?>
		</div>
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