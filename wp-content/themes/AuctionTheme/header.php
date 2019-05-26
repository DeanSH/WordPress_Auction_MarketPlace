<?php
/***************************************************************************
*
*	AuctionTheme - copyright (c) - sitemile.com
*	The most popular auction theme for wordress on the internet. Launch your
*	auction site in minutes from purchasing. Turn-key solution.
*
*	Coder: Andrei Dragos Saioc
*	Email: sitemile[at]sitemile.com | andreisaioc[at]gmail.com
*	More info about the theme here: http://sitemile.com/p/auctionTheme
*	since v4.4.7.1
*
***************************************************************************/
	
 
?>

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?> >
	<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
	<title>
	<?php
		wp_title();
	?>
    </title>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <?php
	
		$opt = get_option('AuctionTheme_general_color_me');
		if($opt == "blue")
		{
			echo '<style>';
			echo '.main-thing-menu, #search_button, a.post_bid_btn:link, a.post_bid_btn:visited, .slider-post a.buttonlight:link, a.buttonlight:visited,
			  #steps ul li.active_step{ background:#1D63AF; border-color:#154880; color:#fff }';
			echo '.special_breadcrumb, #steps {  border-color:#1D63AF }';
			echo 'a:link, a:visited { color:#154880 }';
			echo '.main-thing-menu ul li a:hover, a.post_bid_btn:link, a.post_bid_btn:hover  { background:#2376D1 } ';
			 
		 
			 echo '#cssmenu2 > ul > li:hover > a, #cssmenu2 ul ul li a, #cssmenu2 .submenu-button.submenu-opened  { background: #2376D1 !important }';
			 		
			echo '.flat a:hover, .flat a.active, .flat a:hover:after, .flat a.active:after { background:#1D63AF  } ';
			echo '</style>';
			
		}
		elseif($opt == "red")
		{
			echo '<style>';
			echo '.main-thing-menu, #search_button, a.post_bid_btn:link, a.post_bid_btn:visited, .slider-post a.buttonlight:link, a.buttonlight:visited,
			  #steps ul li.active_step{ background:#CA2513; border-color:#008500;color:#fff  }';
			echo '.special_breadcrumb, #steps {  border-color:#1D63AF }';
			echo 'a:link, a:visited { color:#A71F10 }';
			echo '.main-thing-menu ul li a:hover, a.post_bid_btn:link, a.post_bid_btn:hover { background:#008500 !important } ';
			 
			 
		 
			 
			echo '.flat a:hover, .flat a.active, .flat a:hover:after, .flat a.active:after { background:#CA2513  } ';
			
			echo '</style>';
			
		}
	
		elseif($opt == "black")
		{
			echo '<style>';
			echo '.main-thing-menu, #search_button, a.post_bid_btn:link, a.post_bid_btn:visited, .slider-post a.buttonlight:link, a.buttonlight:visited,
			 #steps ul li.active_step{  background:#555; border-color:#222; color:#fff }';
			echo '.special_breadcrumb, #steps {  border-color:#555 }';
			echo 'a:link, a:visited { color:#555 }';
			echo '.main-thing-menu ul li a:hover, a.post_bid_btn:link, a.post_bid_btn:hover { background:#888 } ';
			 
			 
			 
			echo '.flat a:hover, .flat a.active, .flat a:hover:after, .flat a.active:after { background:#555  } ';
			echo '</style>';
			
		}
	
	
	?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); ?>

	<?php

		wp_head();

	?>	

    <?php do_action('AuctionTheme_before_head_tag_open'); ?>
   
     <!-- ########################################### -->
     
             <script type="text/javascript">
			 
			 <?php
			 	
				global $wp_query, $wp_rewrite, $post;
				
				$watchlist_pid = get_option('AuctionTheme_watch_list_id');
				
				if($post->ID == $watchlist_pid)
			 	$on_check_list = 1; else $on_check_list = 0;
				
			 
			 ?>
			
		var $ = jQuery;
			 
			var SITE_URL 			= '<?php echo get_bloginfo('siteurl'); ?>';
			var is_on_check_list 	= '<?php echo $on_check_list; ?>';
			var minus_watchlist 	= "<?php echo __('- watchlist','AuctionTheme'); ?>";
			var plus_watchlist 		= "<?php echo __('+ watchlist','AuctionTheme'); ?>";
			 
	function suggest(inputString){
		
		inputString = inputString.trim();
		
		if(inputString.length == 0) {
			jQuery('#suggestions').fadeOut();
		} else {  
		
		if(inputString != " " && inputString != "  ")
		{
		
		jQuery('#big-search').addClass('load');
			jQuery.post("<?php bloginfo('siteurl'); ?>/wp-admin/admin-ajax.php?action=autosuggest_it", {queryString: ""+inputString+""}, function(data){
				
				var stringa = data.charAt(data.length-1);
								if(stringa == '0') data = data.slice(0, -1);
								else data = data.slice(0, -2);
				
				
				if(data.length >0) {
					jQuery('#suggestions').fadeIn();
					jQuery('#suggestionsList').html(data);
					jQuery('#big-search').removeClass('load');
				}
			});
			
			}
		}
	}

	function fill(thisValue) {
		//jQuery('#big-search').val(thisValue);
		//setTimeout("jQuery('#suggestions').fadeOut();", 600);
	}
	 
			(function($){
			jQuery(document).ready(function(){
			
			jQuery("#cssmenu").menumaker({
			   title: "<?php _e('User Menu','ProjectTheme'); ?>",
			   format: "multitoggle"
			});
			
			jQuery("#cssmenu2").menumaker({
			   title: "<?php _e('Main Menu','ProjectTheme'); ?>",
			   format: "multitoggle"
			});
			
			});
			})(jQuery);
	
	
	jQuery(function(){
		
	jQuery('.expiration_auction_p').each(function(index) 
	{
		var until_now = jQuery(this).html();
		jQuery(this).countdown({until: until_now, format: 'dHMS', compact: false});
											   
	
	});
											 
		
	<?php
		
		if(auctiontheme_is_home()):
	
	?>	
		
	  jQuery('#slider2').bxSlider({
		auto: true,
		speed: 1000,
		pause: 5000,
		autoControls: false,
		 displaySlideQty: 5,
    	moveSlideQty: 1
	  });
	  
	  
	  
	  jQuery("#auction-home-page-main-inner").show();	
	  
	  
	  <?php endif; ?>
	  
	});	
		
	
		
	</script>
     <?php
	 	
		$AuctionTheme_color_for_footer = str_replace("#","", get_option('AuctionTheme_color_for_footer'));
		if(!empty($AuctionTheme_color_for_footer))
		{
			echo '<style> #footer { background:#'.$AuctionTheme_color_for_footer.' }</style>';	
		}
		
		
		$AuctionTheme_color_for_bk = str_replace("#","",get_option('AuctionTheme_color_for_bk'));
		if(!empty($AuctionTheme_color_for_bk))
		{
			echo '<style> body { background:#'.$AuctionTheme_color_for_bk.' }</style>';	
		}
		
		$AuctionTheme_color_for_top_links = str_replace("#","",get_option('AuctionTheme_color_for_top_links'));
		$AuctionTheme_color_for_top_links2 = str_replace("#","",get_option('AuctionTheme_color_for_top_links2'));
		
		if(!empty($AuctionTheme_color_for_top_links))
		{
			echo '<style> .top-links ul li a:link, .top-links ul li a:visited { background:#'.$AuctionTheme_color_for_top_links.' }
			.top-links ul li a:hover { background:#'.$AuctionTheme_color_for_top_links2.' }
			
			</style>';	
		}
		
		//----------------------
		
		$AuctionTheme_color_for_main_links = str_replace("#","",get_option('AuctionTheme_color_for_main_links'));

		
		if(!empty($AuctionTheme_color_for_main_links))
		{
			$AuctionTheme_color_for_main_links2 = str_replace("#","",get_option('AuctionTheme_color_for_main_links2'));
			$AuctionTheme_color_for_main_links3 = str_replace("#","",get_option('AuctionTheme_color_for_main_links3'));
			$AuctionTheme_color_for_main_links4 = str_replace("#","",get_option('AuctionTheme_color_for_main_links4'));
		
			echo '<style> 
			
			.main-thing-menu { background: #'.$AuctionTheme_color_for_main_links.'; border-color:#'.$AuctionTheme_color_for_main_links4.' }
			.main-thing-menu ul li a:link, .main-thing-menu ul li a:visited 
			{ background:#'.$AuctionTheme_color_for_main_links.'; color:#'.$AuctionTheme_color_for_main_links3.';  }
			#cssmenu2 > ul > li > a { color:#'.$AuctionTheme_color_for_main_links3.'; }
			#cssmenu2 > ul > li:hover > a, #cssmenu2 ul ul li a,  #cssmenu2 .submenu-button.submenu-opened { background:#'.$AuctionTheme_color_for_main_links2.'; }
			.main-thing-menu ul li a:hover { background:#'.$AuctionTheme_color_for_main_links2.';  color:#'.$AuctionTheme_color_for_main_links3.' }
			
			</style>';	
		}
		
		//----------------------
		
		$AuctionTheme_color_for_text_footer = str_replace("#","",get_option('AuctionTheme_color_for_text_footer'));
		
		if(!empty($AuctionTheme_color_for_top_links))
		{
			echo '<style> 
			
			#footer-widget-area,#site-info, #footer-widget-area div ul li .widget-title, #footer .textwidget{ color:#'.$AuctionTheme_color_for_text_footer.' }
			#footer a:link, #footer a:visited { color:#'.$AuctionTheme_color_for_text_footer.' }
			#footer a:hover { color:#'.$AuctionTheme_color_for_text_footer.' }
			#site-info { border-color: #'.$AuctionTheme_color_for_text_footer.'  }
			
			</style>';	
		}
		
		
		
		//----------------------
		
	 	$AuctionTheme_home_page_layout = get_option('AuctionTheme_home_page_layout');
		if(AuctionTheme_is_home()):
			if($AuctionTheme_home_page_layout == "4"):
				echo '<style>#content { float:right; width:695px } #left-sidebar { float:left; }</style>';
			endif;
			
			if($AuctionTheme_home_page_layout == "5"):
				echo '<style>#content { width:100%; }  </style>';
			endif;
			
			if($AuctionTheme_home_page_layout == "3"):
				echo '<style>#content { width:410px } .title_holder { width:257px; margin-bottom:15px } #left-sidebar{	float:left;margin-right:15px;}
				 </style>';
			endif;
			
			
			if($AuctionTheme_home_page_layout == "2"):
				echo '<style>#content { width:410px } #left-sidebar{ float:right } #left-sidebar{ margin-right:15px; } .title_holder { width:257px; margin-bottom:15px }
				 </style>';
			endif;
		
		endif;
	 
	 
	 ?>
     
     <!-- ########################################## -->
     
	</head>
	<body <?php body_class(); ?> >
    
    
  <?php  
    
    global $default_search;
		
		?>

        
		<div id="header">
			<div class="top-bar-bg" style="background:#000;">
			
					
			
			
            <div class="main_wrapper">
            
            <!-- <div class="rss_icon_div"><a href="<?php bloginfo('siteurl') ?>/?feed=rss2&post_type=auction"><img src="<?php bloginfo('template_url') ?>/images/rss_icon.png" width="20" height="20" /></a></div> -->
            
            <div class="top-links" id="cssmenu" style="color:#fff;font-weight:bold;">
							
                            <ul>
							<?php 
								
								if(current_user_can('level_10')) {?> <li><a href="<?php bloginfo('siteurl'); ?>/wp-admin"><?php 
								echo __("Wp-Admin","AuctionTheme"); ?></a></li> <?php }
							
								if(is_home())
								$home_class_active = 'active';	
								
								global $wp_query, $pagenow;
								$vars = $wp_query->query_vars;
								$special_page = $vars['special_page'];
								
								if($special_page == "post-new") 	$post_new_class 	= 'active';	
								if($special_page == "adv-sea") 		$adv_sea_new_class 	= 'active';
								if($special_page == "account") 		$account_new_class 	= 'active';
								if($special_page == "blog") 		$blog_new_class 	= 'active';	
								if($special_page == "watch") 		$watch_class 		= 'active';									
								if($pagenow == "wp-login.php" and !isset($_GET['action'])) 		$class_log 			= "active";	
								if($pagenow == "wp-login.php" and $_GET['action'] == 'register') 	$class_register 	= "active";	
					 			
								
									$AuctionTheme_show_blue_menu = get_option('AuctionTheme_show_main_menu');
									
									if($AuctionTheme_show_blue_menu != "yes"):
							?>
							
							<li><a href="<?php bloginfo('siteurl') ?>" class="<?php echo $home_class_active; ?>"><?php echo __("Home","AuctionTheme"); ?></a> </li>
                            
                            
                            <?php
							
							endif;
							
							$menu_name = 'primary-auctiontheme-header';

							if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
							$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
						
							$menu_items = wp_get_nav_menu_items($menu->term_id);
					
						
							foreach ( (array) $menu_items as $key => $menu_item ) {
								$title = $menu_item->title;
								$url = $menu_item->url;
								
								if(!empty($title))
								{echo '<li><a href="' . $url . '">' . $title . '</a></li>'; }
							}
								
							}
							
							
							?>
                            <li><a class="<?php echo $watch_class; ?>" href="<?php echo AuctionTheme_watch_list(); ?>"><?php echo __("Watch List","AuctionTheme"); ?></a> </li>
                            <?php
							
								if(AuctionTheme_is_able_to_post_auctions()):
							
							?>
							<li><a href="<?php echo AuctionTheme_post_new_link(); ?>" class="<?php echo $post_new_class; ?>"><?php 
							echo __("Post New Auction","AuctionTheme"); ?></a> </li>
                            
                            <?php endif; ?>
                            
							<?php if(get_option('auctionTheme_enable_blog') == "yes") { ?>
                            <li><a class="<?php echo $blog_new_class; ?>" href="<?php echo AuctionTheme_blog_link(); ?>"><?php echo __("Blog","AuctionTheme"); ?></a> </li>
							<?php } ?>
                            
                            <?php
							
							if($AuctionTheme_show_blue_menu != "yes"):
							
							?>
                            
                            <li><a href="<?php echo AuctionTheme_advanced_search_link(); ?>" 
                            class="<?php echo $adv_sea_new_class; ?>"><?php _e("Advanced Search","AuctionTheme");?></a></li> 
							<?php
							
								endif;
							
								if(is_user_logged_in())
								{
								
									global $current_user;
									get_currentuserinfo();
									$user = $current_user->user_login;
									?>
									
							<li><a href="<?php echo AuctionTheme_my_account_link(); ?>" 
                            class="<?php echo $account_new_class; ?>"><?php echo __("MyAccount","AuctionTheme"); ?> - <?php echo $user; ?></a></li>
							<li><a href="<?php echo wp_logout_url(); ?>"><?php echo __("Log Out","AuctionTheme"); ?></a></li>
									
									<?php
								}
								else
									{
										
							
							?>
							
							<li><a class="<?php echo $class_register; ?>" href="<?php bloginfo('siteurl') ?>/wp-login.php?action=register"><?php echo __("Register","AuctionTheme"); ?></a></li>
							<li><a class="<?php echo $class_log; ?>" href="<?php bloginfo('siteurl') ?>/wp-login.php"><?php echo __("Log In","AuctionTheme"); ?></a></li>
							<?php } ?>
                            
                            </ul>
						</div>
            
            
            </div>
			</div> <!-- end top-bar-bg -->
		
			<div class="middle-header-bg" style="background:#fff; color:#008500;">
				<div class="middle-header main_wrapper">
						<div class="logo-holder">
						<?php
							$logo = get_option('auctionTheme_logo_url');
							if(empty($logo)) $logo = get_bloginfo('template_url').'/images/logo.png';
						?>
						<a href="<?php bloginfo('siteurl'); ?>"><img id="logo" alt="<?php bloginfo('name'); ?> <?php bloginfo('description'); ?>" src="<?php echo $logo; ?>" />
						<h1>Berries NZ</h1>
						</a>
						</div>
                        
                        <?php
						
							$AuctionTheme_enable_header_banner = get_option('AuctionTheme_enable_header_banner');
							if($AuctionTheme_enable_header_banner != "no"):
							
							$AuctionTheme_adv_code_header_banner_content = get_option('AuctionTheme_adv_code_header_banner_content');
						?>
                        
                        <div class="banner_area1">
                        	<?php if(empty($AuctionTheme_adv_code_header_banner_content)): ?>
                        	<br><br><br><img src="<?php bloginfo('template_url') ?>/images/berries-head.jpg"/><br>
							<p style="font-size:1.5em;text-align:right;font-family:Comic Sans MS;font-style:italic;"><strong>Fresh Produce Direct From The Growers!</strong></p>
                        	<?php else: echo stripslashes($AuctionTheme_adv_code_header_banner_content); endif?>
                            
                        </div>
                        
                        <?php endif; ?>
                       

                        
				</div>
				
			</div> <!-- middle-header-bg -->
			
			
		</div>	
     
       <!-- main menu place here -->
       
       
       <?php
		
			$AuctionTheme_show_main_menu = get_option('AuctionTheme_show_main_menu');
			if($AuctionTheme_show_main_menu != 'no'):
			
		
							
			$menu_name = 'primary-auction-main-header';

			if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
			$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
						
			$menu_items = wp_get_nav_menu_items($menu->term_id);
					
			$m = 0;			
			foreach ( (array) $menu_items as $key => $menu_item ) {
								$title = $menu_item->title;
								$url = $menu_item->url;
								if(!empty($title))
								$m++;
			}}
							
							
						
			
		?>
        <div class="content_super_div">
        
        <div class="main-thing-menu"> <div class="ex_arrange">
        <div class="main_wrapper_menu"> 
      	
        <?php
		
			if($m == 0):
		
		?> <div id="cssmenu2">
        <ul>
            <li class="padded_menu"><a href="<?php bloginfo('siteurl'); ?>" class="hm_cls"><?php _e('Home','AuctionTheme'); ?></a></li>
            <li><a href="<?php echo get_post_type_archive_link('auction'); ?>"><?php _e('All Auctions','AuctionTheme'); ?></a></li> 
            <li><a href="<?php echo AuctionTheme_adv_search_featured_ac(); ?>"><?php _e('All Featured Auctions','AuctionTheme'); ?></a></li> 
            <li><a href="<?php echo get_permalink(get_option('AuctionTheme_adv_search_id')); ?>"><?php _e('Advanced Search','AuctionTheme'); ?></a></li>         
            </ul> </div>
        	<?php else: 
			
			$event = 'hover';
			$effect = 'fade';
			$fullWidth = ',fullWidth: true';
			$speed = 0;
			$submenu_width = 200;
			$menuwidth = 100;
		
		?>
        
 
       
       
        <div class="dcjq-mega-menu" id="<?php echo 'cssmenu2'; ?>">		
		<?php
			
			$menu_name = 'primary-auction-main-header';

			if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) 
			$nav_menu = wp_get_nav_menu_object( $locations[ $menu_name ] );					
							 
			
			wp_nav_menu( array( 'fallback_cb' => '', 'menu' => $nav_menu, 'container' => false ) );
		
		?>		
		 
        </div>
        
            <?php endif; ?>
        
        </div> </div> </div>  </div>  
        
        <?php	
		else:
		//--------
		
		
		
		endif;	?>
       
       
       <!-- main menu ending -->
       
       <!-- start your search bar -->
       
       <div class="my_search_placeholder_box">
        <div id="suggest" >
                            <form method="get" action="<?php echo AuctionTheme_advanced_search_link(); ?>/">
                            <?php
							
							if(AuctionTheme_using_permalinks() == false)
							echo '<input type="hidden" value="'.get_option('AuctionTheme_adv_search_id').'" name="page_id" />';
							
							?>
                            <input type="text" onfocus="this.value=''" id="big-search" name="term" autocomplete="off" onkeyup="suggest(this.value);" 
                            onblur="fill();" placeholder="<?php echo $default_search; ?>"  value="<?php if(isset($_GET['term'])) echo strip_tags($_GET['term']); ?>" />
                         
                            <input type="submit" id="search_button"  name="search_me" value="<?php _e('Search','AuctionTheme') ?>" />
                            </form>
                            
                            <div class="suggestionsBox" id="suggestions" style="z-index:999;display: none;"> 
                            <img src="<?php echo get_bloginfo('template_url');?>/images/arrow.png" style="position: relative; top: -12px; left: 30px;" alt="upArrow" />
                            <div class="suggestionList" id="suggestionsList"> &nbsp; </div>
                            </div>
                    	</div>
                      
       
       </div>
       
      <!-- end your search bar -->  
       
          <?php include 'home-slider.php'; ?>
        
        <div id="main">
        