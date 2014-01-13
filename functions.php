<?php

function themeslug_theme_customizer( $wp_customize ) {
$wp_customize->add_section( 'themeslug_logo_section' , array(
    'title'       => __( 'Logo', 'themeslug' ),
    'priority'    => 30,
    'description' => 'Upload a logo to replace the default site name and description in the header',
) );
$wp_customize->add_setting( 'themeslug_logo' );
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
    'label'    => __( 'Logo', 'themeslug' ),
    'section'  => 'themeslug_logo_section',
    'settings' => 'themeslug_logo',
) ) );
}
add_action('customize_register', 'themeslug_theme_customizer');

add_filter('smilies_src','gkp_new_folder_smiley',10,3);
function gkp_new_folder_smiley($img_src, $img, $siteurl)  {
    return get_template_directory_uri().'/smileys/'.$img;
}

function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 5) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li class="arrowPrevious">%s</li>' . "\n", get_previous_posts_link('') );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li class="arrowNext">%s</li>' . "\n", get_next_posts_link('') );

	echo '</ul>' . "\n";

}

function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_content();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 150, 150, true ); // Normal post thumbnails
add_image_size( '404-post-thumbnail', 600,335, true ); // 404 thumbnail size
add_image_size( 'archives-post-thumbnail', 312, 192, true ); // Archives thumbnail size


function getpostgk_img($postId) {
$iPostID = $postId;

$arrImages =& get_children('post_type=attachment&post_mime_type=image&post_parent=' . $iPostID );
if($arrImages) {

$arrKeys = array_keys($arrImages);

foreach($arrImages as $oImage) {
$arrNewImages[] = $oImage;
}

for($i = 0; $i < sizeof($arrNewImages) - 1; $i++) {
for($j = 0; $j < sizeof($arrNewImages) - 1; $j++) {
if((int)$arrNewImages[$j]->menu_order > (int)$arrNewImages[$j + 1]->menu_order) {
$oTemp = $arrNewImages[$j];
$arrNewImages[$j] = $arrNewImages[$j + 1];
$arrNewImages[$j + 1] = $oTemp;
}
}
}

$arrKeys = array();
foreach($arrNewImages as $oNewImage) {
$arrKeys[] = $oNewImage->ID;
}

$iNum = $arrKeys[0];
$sThumbUrl = wp_get_attachment_thumb_url($iNum);

$sImgString ='<img src="' . $sThumbUrl . '" width="60" height="60" alt="" title="" />';

echo $sImgString;
}
}



add_filter( 'avatar_defaults', 'newgravatar' );
    function newgravatar ($avatar_defaults) {
    $myavatar = get_bloginfo('template_directory') . '/layout/gravatar.jpg';
    $avatar_defaults[$myavatar] = "WPBeginner";
    return $avatar_defaults;
}
    

?>
