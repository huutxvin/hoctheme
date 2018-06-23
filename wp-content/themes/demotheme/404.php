<?php get_header(); ?>
<div class="content">
	<div id="main-content">
		<?php 
			_e('<h2>404 NOT FOUND</h2>','fulltext');
			get_search_form(); // Hien thi o tim kiem
			_e('<h3> Content categories: </h3>','fulltext');
			echo '<div class="404-cat-list">';
				wp_list_categories(array('title_li' => '')); // Hien thi cat list
			echo '</div>';
			_e('Tag Cloud','fulltext');
				wp_tag_cloud();	 // Hien thi the tags
		?>
	</div>
	<div id="sidebar">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>