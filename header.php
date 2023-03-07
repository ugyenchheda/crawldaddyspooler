<?php 

// Fetch options stored in $smof_data
global $smof_data;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<!-- BEGIN head -->
<head>

	<script async src="https://i.simpli.fi/dpx.js?cid=60565&action=100&segment=crawldaddyswtoc&m=1&sifi_tuid=33721"></script>
<!-- Meta Tags -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge;chrome=1" >
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
	
	<?php 
		// Dislay Google Analytics Code
		if( $smof_data['google_analytics'] ) { 
			echo $smof_data['google_analytics'];
		}
		
		// Dislay Favicon
		if( $smof_data['favicon_url'] ) { 			
			echo '<link rel="shortcut icon" href="' . $smof_data['favicon_url'] . '" type="image/x-icon" />';
		}
	?>
	
	<!-- Title -->
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	
	<?php wp_head(); ?>

	<?php echo custom_css(); ?>
	
<!-- END head -->
</head>

<!-- BEGIN body -->
<body <?php body_class('loading'); ?>>

	<!-- BEGIN #background-wrapper -->
	<div id="background-wrapper">
	
	<!-- BEGIN #wrapper -->
	<div id="wrapper">
		
		<!-- BEGIN #header-gmap -->
		<div id="header-gmap">
			
			<div id="map-canvas"></div>
			
		<!-- END #header-gmap -->
		</div>
		
		<!-- BEGIN #topbar -->
		<div id="topbar">
			
			<!-- #topbar-wrapper -->
			<div id="topbar-wrapper" class="clearfix">
				
				<!-- BEGIN .topbar-left -->
				<div class="newteb topbar-left">
					
					<p>101 South Godley Station Blvd, Pooler GA, 31322 &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <span class="tellfon"><a style="line-height:0px;"href="tel:(912) 988-3610">(912) 988-3610</a></span></p>
					
				<!-- END .topbar-left -->
				</div>
				
				<!-- BEGIN .topbar-right -->
				<div class="eclub topbar-right ">
					<a style="overflow:scroll;"href="https://www.google.com/maps/place/Crawl+Daddy's/@32.131757,-81.257627,17z/data=!4m5!3m4!1s0x0:0xa515e1547a6e21b0!8m2!3d32.1317574!4d-81.2576273?hl=en-US" target="_blank"><img src="http://www.crawldaddyspooler.com/wp-content/uploads/2016/07/eclub-1.png" /></a>
                    
					<?php if(is_plugin_active('quitenicebooking/quitenicebooking.php')) { ?>
						<?php $quitenicebooking_settings = get_option('quitenicebooking'); ?>
						<?php if (empty($quitenicebooking_settings['hide_booking_system'])) { ?>
							<a href="<?php echo get_permalink($quitenicebooking_settings['step_1_page_id']); ?>" class="button0"><?php _e('Book Now','qns'); ?></a>
						<?php } ?>
					<?php } ?>
					
					<!-- Secondary Navigation -->
					<?php wp_nav_menu( array(
						'theme_location' => 'secondary',
						'container' =>false,
						'items_wrap' => '<ul id="language-selection">%3$s</ul>',
						'fallback_cb' => false,
						'echo' => true,
						'before' => '',
						'after' => '',
						'link_before' => '',
						'link_after' => '',
						'depth' => 0 )
					); ?>

					<?php if( ($smof_data['phone_number']) or ($smof_data['email_address']) ) { ?>
						<ul class="header-contact">
					<?php } ?>
						
						<?php if($smof_data['phone_number'] != '') { ?>
							<li class="phone_icon"><?php echo $smof_data['phone_number']; ?></li>
						<?php } ?>

						<?php if($smof_data['email_address'] != '') { ?>
							<li class="email_icon"><a href="mailto:<?php echo $smof_data['email_address']; ?>"><?php echo $smof_data['email_address']; ?></a></li>
						<?php } ?>
						
					<?php if( ($smof_data['phone_number']) or ($smof_data['email_address']) ) { ?>
						</ul>
					<?php } ?>

				<!-- END .topbar-right -->
				</div>
			
			<!-- END #topbar-right -->
			</div>
			
		<!-- END #topbar -->
		</div>
		
		<div id="banner">
		
			<!-- BEGIN .content-wrapper -->
			<div class="content-wrapper bannerwrap">
                <div class="topbar-left">
                <a href="https://www.facebook.com/Crawldaddys-Cajun-Seafood-and-Raw-Bar-1148666215187352/" target="_blank"><img src="http://www.crawldaddyspooler.com/wp-content/uploads/2016/04/f.jpg"/></a>
                <a href="http://www.yelp.com/biz/crawl-daddys-pooler" target="_blank"><img src="http://www.crawldaddyspooler.com/wp-content/uploads/2016/04/yalp.jpg"/></a>
                <a href="https://plus.google.com/113211492386752551825/about" target="_blank"><img src="http://www.crawldaddyspooler.com/wp-content/uploads/2016/04/g.jpg"/></a>
                </div>
			<div style="line-height:138px"class="topbar-right">
                <a href="https://www.instagram.com/crawldaddyspooler" target="_blank"><img src="http://www.crawldaddyspooler.com/wp-content/uploads/2016/07/t.jpg"/></a>
                <a href=""><img src="http://www.crawldaddyspooler.com/wp-content/uploads/2016/04/in.jpg"/></a>
                <a href="https://www.tripadvisor.com/Restaurant_Review-g35194-d10280676-Reviews-Crawl_Daddy_s-Pooler_Georgia.html" target="_blank"><img src="http://www.crawldaddyspooler.com/wp-content/uploads/2016/04/trip.jpg"/></a>
                </div>
                </div>

				<?php if( $smof_data['text_logo'] ) : ?>
					<div id="logo">
						<h1>
							<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?>
							<span id="tagline"><?php bloginfo( 'description' ) ?></span></a>
						</h1>
					</div>

				<?php elseif( $smof_data['image_logo'] ) : ?>
					<div id="logo" class="site-title-image">
						<h1>
							<a href="<?php echo home_url(); ?>"><img src="<?php echo $smof_data['image_logo']; ?>" alt="" /></a>
							<span id="tagline"><?php bloginfo( 'description' ) ?></span>
						</h1>
					</div>

				<?php else : ?>	
					<div id="logo">
						<h1>	
							<a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ) ?>
							<span id="tagline"><?php bloginfo( 'description' ) ?></span></a>
						</h1>
					
				<?php endif ?>
				
				<!-- .main-navigation -->
				
				
				<!-- BEGIN .mobile-menu-wrapper -->
				<div class="mobile-menu-wrapper clearfix">
					<div class="mobile-menu-button"></div>
					<div class="mobile-menu-title"><?php _e('Navigation','qns'); ?></div>
					
					<!-- mobile-menu-inner -->
					<div class="mobile-menu-inner">				
						
						<!-- Mobile Menu -->
						<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'container' => false,
							'items_wrap' => '<ul id="mobile-menu">%3$s</ul>',
							'fallback_cb' => 'wp_page_mobile_menu_qns',
							'echo' => true,
							'before' => '',
							'after' => '',
							'link_before' => '',
							'link_after' => '',
							'depth' => 0 )
					 	); ?>

					<!-- mobile-menu-inner -->
					</div>

				<!-- END .mobile-menu-wrapper -->
				</div>

			<!-- END .content-wrapper -->
			</div>
		
		</div>
        