<?php
	
	/* 
	Template Name: Full Width
	*/
	
	//Display Header
	get_header();
	
	//Get Post ID
	global $wp_query; $post_id = $wp_query->post->ID;
	
	//Get Header Image
	$header_image = page_header(get_post_meta($post_id, 'qns_page_header_image_url', true));
	
	//Get Content ID/Class
	$content_id_class = content_id_class(get_post_meta($post_id, 'qns_page_sidebar', true));
	
	//Reset Query
	wp_reset_query();
	
?>
<nav class="main-navigation">
					
					<!-- Main Menu -->
					<?php wp_nav_menu( array(
						'theme_location' => 'primary',
						'container' => false,
						'items_wrap' => '<ul id="navigation">%3$s</ul>',
						'fallback_cb' => 'wp_page_menu_qns',
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0,
						'walker' => new description_walker() )
				 	); ?>
				
				<!-- .main-navigation -->
				</nav>
<div id="page-header" <?php echo $header_image; ?>>

	<h2><?php the_title(); ?></h2>
</div>


<!-- BEGIN .content-wrapper -->
<div id="textwrap">
<div class="content-wrapper clearfix">
	<?php the_content();?>
	<!-- BEGIN .main-content -->
	<div class="main-content full-width page-content">
    

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>			
			<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'qns').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>			
			<?php if ( comments_open() ) : comments_template(); endif; ?>
		<?php endwhile;endif; ?>
		
	<!-- END .main-content -->	
	</div>
</div>
<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>