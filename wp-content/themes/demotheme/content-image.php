<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	<div class="entry-thumbnail"> <!-- hien thi anh dai dien cua post -->
		<?php demo_thumbnail('large'); ?>
	</div>	
	<div class="entry-header"> <!-- hien thi tieu de cua post -->
		<?php demo_entry_header(); ?>
		<?php 
			$attachment = get_children(array('post_parent' => $post->ID)); 
			$attachment_number = count($attachment);
			printf(__('This image post contains %1$s photos','fulltext'), $attachment_number);
		?>
	</div>	
	<div class="entry-content"> <!-- hien thi noi dung post -->
		<?php demo_entry_content(); ?>
		<?php (is_single() ? demo_entry_tag() : ''); ?>
	</div>	
</article>