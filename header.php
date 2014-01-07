<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
 
 	
 
	<title><?php bloginfo('name') ?><?php if ( is_404() ) : ?> &raquo; <?php _e('Not Found') ?><?php elseif ( is_home() ) : ?> &raquo; <?php bloginfo('description') ?><?php else : ?><?php wp_title() ?><?php endif ?></title>
 
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /><?php wp_head(); ?>
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />	
	<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
	<!--[if lt IE 9]>
			<script src="<?php bloginfo('template_url'); ?>/js/html5shiv.js"></script>
	<![endif]-->
	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--[if IE]>
  <div style='border:solid #D41C1D; background: #FEEFDA; text-align: center; clear: both; position: relative;'>
    <div style='position: absolute; right: 3px; top: 3px; font-family: courier new; font-weight: bold;'>
    	<a href='#' onclick='javascript:this.parentNode.parentNode.style.display="none"; return false;'>X</a>
    </div>
    	<h2 style="color:#D41C1D;text-align:center">En utilisant Internet Explorer vous tuez des chatons. Changez de navigateur !</h2>
    </div>
  </div>
<![endif]-->

<nav>
        <div id="navCenter">
                	<button class="menuButton-1" title="Afficher le Menu" onclick="addClass('navCenter', 'big')"></button>
					<button class="menuButton-2" title="Masquer le Menu" onclick="removeClass('navCenter', 'big')"></button>
                <div id="logo">
                	<?php if ( get_theme_mod( 'themeslug_logo' ) ) : ?>
        				<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'>
        					<img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
        				</a>
					<?php else : ?>
      				  <h1 class='site-title'>
      				  	<a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a>
      				  </h1>
					<?php endif; ?>
                </div>
                <div id="search">
                	<?php get_search_form(); ?>
                	<button class="searchButton-1" title="Afficher le champ de recherches" onclick="addClass('search', 'large')"></button>
					<button class="searchButton-2" title="Masquer le champ de recherches" onclick="removeClass('search', 'large')"></button>
                </div>
           			<div id="navMenu">
           				<?php wp_nav_menu(); ?>
					</div>
        </div>
</nav>
