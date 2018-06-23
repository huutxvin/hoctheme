<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="entry-header"> <!-- hien thi tieu de cua post -->
		<?php demo_entry_header(); ?>
	</div>	
	<div class="entry-content"> <!-- hien thi noi dung post -->
		<?php the_content(); ?>
		<?php (is_single() ? demo_entry_tag() : ''); ?>
	</div>	
</article>