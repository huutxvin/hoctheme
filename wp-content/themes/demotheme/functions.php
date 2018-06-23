<?php 
// Luu tru cac chuc nang cua trang web khi tai lai trang
/**
	@ Khai bao hang gia tri
		@THEME_URL = lay duong da thu muc theme
		@ CORE = lay duong dan thu muc /core
**/
	define('THEME_URL', get_stylesheet_directory());
	define('CORE', THEME_URL . '/core');

/**
	@ Nhung file /core/init.php
**/
	require_once(CORE . '/init.php');

/** 
	@ Thiet lap chieu rong noi dung
**/
	if(!isset($content_width)){
		 $content_width = 620; //Chi chap nhan don vi la px
	}
/**
	@ Khai bao chuc nang theme
**/
	if(!function_exists('demo_theme_setup')){ //Kiem tra xem ham da ton tai hay chua 
		function demo_theme_setup(){ // Neu chua co thi tao ra ham
			/* Thiet lap TextDomain */
			$languages_folder = THEME_URL. '/languages'; //Lay duong da thu muc languages
			load_theme_textdomain('fulltext', $languages_folder);

			/* Tu dong them link RSS len </head> */
			add_theme_support('automatic-feed-links'); // Ham co san cua W-p

			/* Them post-thumbnail */
			add_theme_support('post-thumbnails');

			/* Post Formats */
			add_theme_support('post-formats', array(
				'image',
				'video',
				'gallery',
				'quote',
				'link'
			));
			add_theme_support( 'html5', array(
				'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
			) );
			/* Theme the <title> */
			add_theme_support('title-tag');

			/* Them custom background */
			$default_background = array( // Chon mau mac dinh
				'default-color' => '#e8e8e8'
			);
			add_theme_support('custom-background', $default_background);

			/* Them menu */
			register_nav_menus( array(
				// 'top-menu'	=> __( 'Top Menu Navigation', 'fulltext' ),
				'primary-menu'	=> __( 'Primary Navigation', 'fulltext' )
			));

			/* Them sidebar */
			$sidebar = array( // Cau hinh sidebar
				'name'          => __('Main Sidebar', 'fulltext'),
				'id'	        => 'main-sidebar',
				'description'   => __('Default sidebar'),
				'class'         => 'main-sidebar',
				'before-title'  => '<h3 class="widgettitle">',
				'after-title' 	=> '</h3>'
			);
			register_sidebar($sidebar);
		}
		add_action('init','demo_theme_setup'); // De ham thuc thi tu dong
	}

/* TEMPALTE FUNCTIONS */
	if(!function_exists('demo_header')){
		function demo_header(){ ?>
			<div class="site-name"
				<?php if(is_home()){
					printf('<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename') );
				}else{
					printf('<p><a href="%1$s" title="%2$s">%3$s</a></p>',
					get_bloginfo('url'),
					get_bloginfo('description'),
					get_bloginfo('sitename') );
				} ?>
			</div>
			<div class="site-description"><?php bloginfo('description'); ?></div><?php
		}
	}
/* Thiet lap menu */
	if(!function_exists('demo_menu')){
		function demo_menu($menu){
			$menu = array( // Cau hinh menu
				'theme_location'  => $menu,
				'contaier' 	      => 'nav',
				'container_class' => $menu,
				'items_wrap'      => '<ul id="%1$s" class="%2$s sf-menu">%3$s</ul>' // Them vung chon menu, sf-menu(class cua superfish)
			);
			wp_nav_menu($menu);
		}
	}
/* Tao phan trang */
   if(!function_exists('demo_pagination')){
   		function demo_pagination(){
   			if($GLOBALS['wp_query']->max_num_pages < 2 ){
   				return "";
   			} ?>
   			<nav class="pagination" role="navigation">
   				<?php if(get_next_posts_link()) : ?>
   					<div class="prev"><?php next_posts_link(__('Older Posts','fulltext')); ?></div>
   				<?php endif; ?>
   				<?php if(get_previous_posts_link()) : ?>
   					<div class="next"><?php previous_posts_link(__('Newest Posts','fulltext')); ?></div>
   				<?php endif; ?>		
   			</nav>
   		<?php }
    }
/* Hien thi thumbnail */
	if (!function_exists('demo_thumbnail')) {
 		function demo_thumbnail($size){
 			// Kiem tra thumbnail chi hien thi o trang chu va trang luu tru, ko hien thi o trang bai viet
 			// Ko phai la single && post co anh dai dien posts && ko co password || ko thuoc format
 			if (!is_single() && has_post_thumbnail() && !post_password_required() || has_post_format('image')) : ?>
 				<figure class="post-thumbnail"><?php the_post_thumbnail($size); ?></figure> <!-- Goi anh dai dien cua post -->
 			<?php endif; ?>
 		<?php }
 	}
/* Hien thi tieu de cua post */
	if( !function_exists('demo_entry_header')){
		function demo_entry_header(){ ?>
			<!-- Neu o trang chu tieu de o the <h2>
			Neu o trang single thi o the <h1> -->
			<?php if(is_single()) : ?>
				<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
			<?php else : ?>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>	
			<?php endif; ?>
		<?php }
	}
/* Hien thi cac du lieu cau bai viet */
	if(!function_exists('demo_entry_meta')){
		function demo_entry_meta(){ ?>
			<?php if(!is_page()) : ?> <!-- Khong hien thi o mot page -->
			<div class="entry-meta">
			<?php 
				printf(__('<span class="author">Posted by %1$s','fulltext'), get_the_author() );
				printf(__('<span class="date-published"> at %1$s','fulltext'), get_the_date() );
				printf(__('<span class="category"> in %1$s </br>','fulltext'), get_the_category_list(',') );
				if(comments_open()):
					echo '<span class="meta-reply">';
						comments_popup_link(
							__('Leave a comment','fulltext'), // Neu chua co binh luan
							__('One comment','fulltext'), // Neu co 1 binh luan
							__('% comments','fulltext'), // Neu co nhieu binh luan
							__('Read all comments','fulltext') // Xem tat ca binh luan
						);
					echo '</span>';
				endif;
			?>
			</div>
			<?php endif; ?>
		<?php }
	}
/* Hien thi noi dung bai viet */
	if(!function_exists('demo_entry_content')){
		function demo_entry_content(){
			if(!is_single() && !is_page() ){
				the_excerpt();// Hien thi doan rut gon o trang chu
			}else{
				the_content(); // Hien thi toan bo noi dung bai viet
				// Phan trang trong single
				$link_page = array(
					'before'           => __('<p>Page: ','fulltext'),
					'after'            => __('</p>'),
					'nextpagelink' 	   => __('Next Page', 'fulltext'),
					'previouspagelink' => __('Previous Page', 'fulltext')
				);
				wp_link_pages($link_page);
			}
		}
	}
/* Hien thi Read more */
	function demo_readmore(){
		return '<a class="read-more" href="'.get_permalink(get_the_ID()).'">'.__('...read more','fulltext').'</a>';		
	}
	add_filter('excerpt_more','demo_readmore');	
/* Hien thi tags */
	if(!function_exists('demo_entry_tag')){
		function demo_entry_tag(){
			if(has_tag()):
				echo '<div class="entry-tag">';
				printf(__('Tagged in %1$s','fulltext'), get_the_tag_list('',','));
				echo '</div>';
			endif;
		}
	}
/* Nhung file style.css */
	function demo_style(){
		wp_register_style('main-style',get_template_directory_uri().'/style.css','all'); // Them vao bo nho
		wp_enqueue_style('main-style');// Goi file style

		/* Reset CSS */
		wp_register_style('reset-style',get_template_directory_uri().'/reset.css','all'); // Them vao bo nho
		wp_enqueue_style('reset-style');// Goi file style


		/* Superfish Menu */
		wp_register_style('superfish-style',get_template_directory_uri().'/superfish.css','all'); 
		wp_enqueue_style('superfish-style');
		wp_register_script('superfish-script', get_template_directory_uri().'/superfish.js', array('jquery'));
		wp_enqueue_script('superfish-script');

		// Custom Script
		wp_register_script('custom-script', get_template_directory_uri().'/custom.js', array('jquery'));
		wp_enqueue_script('custom-script');

	}
	add_action('wp_enqueue_scripts','demo_style'); // Ham hoat dong ham demo_style == hook: wp_enwueue_scripts		 	 	
?>
