<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="entry-thumbnail"> <!-- hien thi anh dai dien cua post -->
		<?php demo_thumbnail('thumbnail'); ?>
	</div>	
	<div class="entry-header"> <!-- hien thi tieu de cua post -->
		<?php demo_entry_header(); ?>
		<?php demo_entry_meta(); ?>
	</div>	
	<div class="entry-content"> <!-- hien thi noi dung post -->
		<?php demo_entry_content(); ?>
		<?php (is_single() ? demo_entry_tag() : ''); ?>
	</div>	
</article>