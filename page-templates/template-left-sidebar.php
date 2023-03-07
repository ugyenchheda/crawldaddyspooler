<?php
	
	/* 
	Template Name: Left Sidebar
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



<!-- BEGIN .content-wrapper -->

<div class="content-wrapper clearfix">
	
	<!-- BEGIN .main-content -->
	<div class="main-content right-main-content page-content">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php the_content(); ?>			
			<?php wp_link_pages(array('before' => '<p><strong>'.__('Pages:', 'qns').'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>			
			<?php if ( comments_open() ) : comments_template(); endif; ?>
		<?php endwhile;endif; ?>
		
	<!-- END .main-content -->	
	</div>

	<?php get_sidebar(); ?>
/* ------------------------------------------------
	Display Slideshow
------------------------------------------------ */

if ($smof_data['slideshow_display']) { ?>

<!-- BEGIN #slider -->
<div id="slider">
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
	<?php if ($smof_data['homepage_slider']) { ?>

		<div class="slider">
			<ul class="slides">
				<?php $slides = $smof_data['homepage_slider']; ?>	
				<?php foreach ($slides as $slide) { ?>
					<li>
						<?php if ( $slide['link'] ) { echo '<a href="' . $slide['link'] . '" target="_blank" class="slide-link">'; } ?>
						<img src="<?php echo $slide['url']; ?>" alt="" />
						<?php if ( $slide['description'] ) { 
							echo '<div class="slider-caption-wrapper"><div class="slider-caption">' . $slide['description'] . '</div></div>'; 
						} ?>
						<?php if ( $slide['link'] ) { echo '</a>'; } ?>
					</li>
				<?php } ?>
			</ul>
		</div>

	<?php } else { ?>
		<p><?php _e('No Slides','qns'); ?></p>
	<?php }



/* ------------------------------------------------
	Display Slideshow Booking Form
------------------------------------------------ */

if(is_plugin_active('quitenicebooking/quitenicebooking.php')) {
	if ( $smof_data['display_slideshow_booking'] && empty($quitenicebooking->settings['hide_booking_system']) ) {echo do_shortcode("[booking_form]");}
} ?>

<!-- END #slider -->
</div>





/* ------------------------------------------------
	Display Three Blocks
------------------------------------------------ */
?>


<!-- BEGIN .content-wrapper -->
<div id="textwrap">
<div class="content-wrapper clearfix">
	
	<!-- BEGIN .clearfix -->
	
<?php get_sidebar(); ?>    
<?php the_content();?>
		<!-- BEGIN .one-third -->
			
		</div>

	<!-- END .clearfix -->
	</div>
	
	<hr class="space1" />


</div>

<?php
/* ------------------------------------------------
	Display Testimonials Slider
------------------------------------------------ */
?>
	
	<h3 class="title-style1"><?php _e('Testimonials','qns'); ?><span class="title-block"></span></h3>
	<div class="text-slider-wrapper">
		<div class="text-slider">
			<ul class="slides">
		
				<?php $count = 0;
		
				$args = array(
					'post_type' => 'testimonial',
					'posts_per_page' => '10'
				);

				$testimonial_posts = new WP_Query($args);

				if($testimonial_posts->have_posts()) : 
					while($testimonial_posts->have_posts()) : 
						$testimonial_posts->the_post(); ?>

						<?php $current_num = $testimonial_posts->current_post + 1; ?>

						<?php if ( $testimonial_posts->current_post == 0 ) {
							echo '<li>';
						} elseif ( $testimonial_posts->current_post % 2 == 0 ) {
							echo '<li>';
						} ?>

						<?php	
							// Get testimonial date
							$testimonial_guest = get_post_meta($post->ID, $prefix.'testimonial_guest', true);
							$testimonial_room = get_post_meta($post->ID, $prefix.'testimonial_room', true);			
						?>

						<div class="one-half testimonial-one-half">
							<div class="testimonial-wrapper clearfix">
								<div class="testimonial-image">
								
								<?php if(has_post_thumbnail()) {
									$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'image-style2' );
									echo '<img src="' . $src[0] . '" alt="" />';
								}
									
								else {
									echo '<img src="' . get_template_directory_uri() .'/images/user.png" alt="" />';
								} ?>
								
								</div>
								<div class="testimonial-text"><?php the_content(); ?></div>
								<div class="testimonial-speech"></div>
							</div>
							<p class="testimonial-author"><?php echo $testimonial_guest; ?> - <span><?php echo $testimonial_room ?></span></p>
						</div>

						<?php if ( $current_num % 2 == 0 ) {
							echo '</li>';
						} elseif ( $current_num == $testimonial_posts->post_count ) {
							echo '</li>';
						} ?>

					<?php endwhile; else : ?>
						<p><?php _e('No testimonials have been added yet','qns'); ?></p>
					<?php endif; ?>

			</ul>
		</div>
	</div>

<!-- BEGIN .content-wrapper -->
</div>
<!-- END .content-wrapper -->
</div>

<?php get_footer(); ?>