<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<div class="archive-title">
			<?php  
				if(is_tag()): // Neu bai viet luu tru o tag
					printf(__('Posts tagged: %1$s','fulltext'), single_tag_title('', false) );
				elseif(is_category()) : // Neu bai viet luu tru o trang category
					printf(__('Post categorized: %1$s','fulltext'), single_cat_title('', false) );
				elseif(is_day()) : // Neu laf bai viet hang ngay
					printf(__('Daily Archives: %1$s','fulltext'), get_the_time('l, F j, Y'));
				elseif(is_month()) : // Neu la bai viet hang thang
					printf(__('Monthly Archives: %1$s','fulltext'), get_the_time('F Y'));
				elseif(is_year()) :
					printf(__('Yearly Archives: %1$s','fulltext'), get_the_time('Y'));
				endif;			
			?>
		</div>
		<?php if(is_tag() || is_category()) : ?>
			<div class="archive-description">
				<?php echo term_description(); ?> <!-- Hien thi mo ta cua category -->
			</div>
		<?php endif; ?>	
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