<?php

if ( ! function_exists( 'larche_setup' ) ) {
	function lacrhe_setup() {
		load_theme_textdomain( 'larche', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
				'audio',
				'chat',
			)
		);

    	add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );
		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'larche' ),
				'footer'  => __( 'Secondary menu', 'larche' ),
			)
		);
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);		
	}
}

register_nav_menus(
    array(
        'primary' => esc_html__( 'Primary menu', 'larche' ),
        'footer'  => __( 'Secondary menu', 'larche' ),
    )
);
add_action( 'after_setup_theme', 'larche_setup' );
/**
 * Move jQuery to the footer. 
 */
function my_mce_buttons_2($buttons) {
    /**
    * Add in a core button that's disabled by default
    */
    $buttons[] = 'superscript';
    $buttons[] = 'subscript';return $buttons;
    }
    add_filter('mce_buttons_2', 'my_mce_buttons_2');
function wpse_173601_enqueue_scripts() {
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
}
add_action( 'wp_enqueue_scripts', 'wpse_173601_enqueue_scripts' );
function larche_scripts() {
	$p_cache = rand();
	wp_enqueue_style( 'larche-style', get_template_directory_uri() . '/style.css', array(), '1.2'.$p_cache.'' );
    if(is_page_template( 'templates/communities.php' )){
        wp_enqueue_style('communities-landing-style',  get_template_directory_uri() . '/css/community-landing-page.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_singular( 'community' )){
        wp_enqueue_style('community-default-style',  get_template_directory_uri() . '/css/community-default-page.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/resources.php' )){
        wp_enqueue_style('resources-landing-style',  get_template_directory_uri() . '/css/resources-page.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/newsandupdates.php' )){
        wp_enqueue_style('newsandupdates-landing-style',  get_template_directory_uri() . '/css/news-updates.css', array(), ''.$p_cache.'', 'all');
        wp_enqueue_script( 'load-more-news', get_template_directory_uri() . '/js/load-more-news.js', array(), ''.$p_cache.'', true );
    }
    if(is_page_template( 'templates/products.php' )){
        wp_enqueue_style('product-page-style',  get_template_directory_uri() . '/css/product-page.css', array(), ''.$p_cache.'', 'all');
        wp_enqueue_script( 'load-more-products', get_template_directory_uri() . '/js/load-more-products.js', array(), ''.$p_cache.'', true );
    }
    if(is_page_template( 'templates/calendar.php' )){
        wp_enqueue_script( 'load-more', get_template_directory_uri() . '/js/load-more.js', array(), ''.$p_cache.'', true );
    }
    if(is_page_template( 'templates/careers.php' )){
        wp_enqueue_style('product-page-style',  get_template_directory_uri() . '/css/careers.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/programs.php' )){
        wp_enqueue_style('program-list',  get_template_directory_uri() . '/css/programs.css', array(), ''.$p_cache.'', 'all');
        wp_enqueue_script( 'load-more-program', get_template_directory_uri() . '/js/load-more-programs.js', array(), ''.$p_cache.'', true );

    }
     wp_enqueue_style('jqyery-style',  get_template_directory_uri() . '/css/jquery.selectBox.css', array(), ''.$p_cache.'', 'all');
     wp_enqueue_style('slick-style',  get_template_directory_uri() . '/css/slick.css', array(), ''.$p_cache.'', 'all');
     wp_enqueue_style('uniform-default-style',  get_template_directory_uri() . '/css/uniform.default.css', array(), ''.$p_cache.'', 'all');
	 wp_enqueue_script('jquery-selectbox-script',  get_template_directory_uri() . '/js/jquery.selectBox.js', array(), '1.2'.$p_cache.'', 'all');
     wp_enqueue_script( 'jquery-slick', get_template_directory_uri() . '/js/slick.min.js', array(), ''.$p_cache.'', true );
     wp_enqueue_script( 'jquery-customslick', get_template_directory_uri() . '/js/custom-slick.js', array(), ''.$p_cache.'', true );
     wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/js/custom-script.js', array(), ''.$p_cache.'', true );

    wp_enqueue_script( 'counter-script', get_template_directory_uri() . '/js/Counter.js', array(), ''.$p_cache.'', true );
    //wp_enqueue_script( 'jquery-3.6.0.min', get_template_directory_uri() . '/js/jquery-3.6.0.min.js', array(), '1.2'.$p_cache.'', true );


    if(is_singular( 'news' )){
        wp_enqueue_style('news-single-style',  get_template_directory_uri() . '/css/post-page.css', array(), ''.$p_cache.'', 'all');
    }

    if ( is_page() && !is_page_template()){
        wp_enqueue_style('default-style',  get_template_directory_uri() . '/css/default-page.css', array(), ''.$p_cache.'', 'all');       
        }
	
    
    if(is_page_template( 'templates/confirmation.php' )){
        wp_enqueue_style('confirmation-style',  get_template_directory_uri() . '/css/confirmation.css', array(), ''.$p_cache.'', 'all');
    }

	if(is_page_template( 'templates/contact.php' )){
        wp_enqueue_style('contact-style',  get_template_directory_uri() . '/css/contact.css', array(), ''.$p_cache.'', 'all');
    }

    if(is_page_template( 'templates/governance.php' )){
        wp_enqueue_style('governance-style',  get_template_directory_uri() . '/css/governance.css', array(), ''.$p_cache.'', 'all');
    }

    if(is_page_template( 'templates/donategive.php' )){
        wp_enqueue_style('donate-give-style',  get_template_directory_uri() . '/css/donate-ways-to-give-page.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/calendar.php' )){
        wp_enqueue_style('calendar-style',  get_template_directory_uri() . '/css/calendar.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/home.php' )){
        wp_enqueue_style('home-style',  get_template_directory_uri() . '/css/home-page.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/inaction.php' )){
        wp_enqueue_style('inaction-style',  get_template_directory_uri() . '/css/in-action-page.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/campaign.php' )){
        wp_enqueue_style('campaign-style',  get_template_directory_uri() . '/css/campaign-page.css', array(), ''.$p_cache.'', 'all');
    }

    if(is_page_template( 'templates/program.php' )){
        wp_enqueue_style('programs-default-page-style',  get_template_directory_uri() . '/css/programs-default-page.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/donate.php' )){
        wp_enqueue_style('donate-why-supprt-us-style',  get_template_directory_uri() . '/css/donate-why-support-us-page.css', array(), ''.$p_cache.'', 'all');
    }
    if(is_page_template( 'templates/about.php' )){
        wp_enqueue_style('about-style',  get_template_directory_uri() . '/css/about-page.css', array(), ''.$p_cache.'', 'all');
    }


}
add_action( 'wp_enqueue_scripts', 'larche_scripts' );
if( function_exists('acf_add_options_sub_page') )
{
   acf_add_options_sub_page(array(
       'title' => 'Header Options',
      'parent' => 'themes.php',
   ));
}
if(function_exists('acf_add_options_sub_page')) {
       acf_add_options_sub_page(array(
               'title' => 'Footer Options',
               'parent' => 'themes.php',
       ));
}


function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
add_filter( 'big_image_size_threshold', '__return_false' );
function add_my_custom_body_class( $classes ) {
    global $post; 
    if(is_page(array(8,404,407,660, 586))) {
        $classes[] = 'white_header';
    }
    return $classes;
}
add_filter( 'body_class', 'add_my_custom_body_class');


function my_admin_scripts() {
    $localize = array(
        'ajaxurl' => admin_url( 'admin-ajax.php' )
    );
    wp_enqueue_script( 'my-resource-ajax-request', get_template_directory_uri() . '/js/ajax-resource.js', array( 'jquery' ) );
    wp_localize_script( 'my-resource-ajax-request', 'MyAjax', $localize);
}  

add_action( 'wp_enqueue_scripts', 'my_admin_scripts' );

add_action( 'wp_ajax_load-resource-content', 'my_load_ajax_resource_content' );
add_action ( 'wp_ajax_nopriv_load-resource-content', 'my_load_ajax_resource_content' );

function my_load_ajax_resource_content () {
    global $post;
    $cat_id = $_POST['cat_id'];
    $args = array(
        'numberposts' => -1,
        'post_type'   => 'post',
        'cat'         => $cat_id
    );

    $resources = get_posts( $args );
    $s==0;
    foreach( $resources as $post ) {
       
        if($s== 0 || $s== 5){
          $color_resource = "green";
          }
          else if($s== 1 || $s== 6){
              $color_resource = "orange";
           } 
           elseif($s==2 || $s== 7){
              $color_resource = "red";
           }
           elseif($s==3 || $s== 8 ){
              $color_resource = "violet";
           } 
           elseif($s==4 || $s== 9 ){
              $color_resource = "pink";
           }

           else{
              $color_resource= "";
           }
          
           $categories = get_the_category($post->ID );
           foreach($categories as $category) {
                $cat_list .=" ".$category->slug;
                $resource_icon = get_field('resource_icon','term_'.$category->term_id);
            }
        $grid_class ="resource-item ".$color_resource;
        $community_short_description = get_field('community_short_description', $post->ID);
        $res ='<div class="'.$grid_class.'" data-cat ="">
          <div class="resource-icon">
          <figure>
		    <img src="'.$resource_icon['url'].'" alt="'.$resource_icon['alt'].'">
		 </figure>  
          </div>
          <h4>'.get_the_title($post->ID).'</h4>
          '.$community_short_description.'
        </div>';
        echo $res;
    $s++;
    }


    die(1);
}  


function get_default_banner()
{ 
    $hero_banner_desktop_image = get_field('hero_banner_desktop_image');
    $hero_banner_image_m = get_field('hero_banner_mobile_image');
	$hero_banner_image_mobile = $hero_banner_image_m ? $hero_banner_image_m : $hero_banner_image;
    $banner_h = get_field('hero_banner_heading');
	if(empty($banner_h)){
		$banner_heading = get_the_title();
	} else {
		$banner_heading = $banner_h;
	}
    $hero_banner_sub_heading = get_field('hero_banner_sub_heading');
    $hero_banner_description = get_field('hero_banner_description');
    $hero_banner_button_text = get_field('hero_banner_button_text');
    $hero_banner_button_link = get_field('hero_banner_button_link');
    $hero_colour_picker = get_field('hero_colour_picker');
 ?>
 <?php if(empty($hero_banner_desktop_image)){ 
$full_width_default_banner = "full_width";
 }
 else{
    $full_width_default_banner = "";
 }?>
<section class="hero-banner-section pos-relative" style ="background:<?php echo $hero_colour_picker; ?>">
    <div class="hero-banner-wrap">
        <div class="container">
            <div class="hero-banner-main flex">
                <div class="hero-banner-txt <?php echo $full_width_default_banner; ?>">
                    <?php if(!empty($hero_banner_sub_heading)){ ?>
                    <span class="optional-text"><?php echo $hero_banner_sub_heading; ?></span>
                    <?php } ?>
                    <?php if(!empty($banner_heading)){ ?>
                    <h1><?php echo $banner_heading; ?></h1>
                    <?php } ?>
                    <?php if(!empty($hero_banner_description)){ ?>
                    <?php echo $hero_banner_description; ?>
                    <?php } ?>
                    <?php if(!empty($hero_banner_button_text) && ($hero_banner_button_link)){ ?>
                    <a href="<?php echo $hero_banner_button_link; ?>"
                        class="button outline-btn white"><?php echo $hero_banner_button_text; ?></a>
                </div>
                <?php } ?>
                <!-- end of hero banner txt -->
                <?php if(!empty($hero_banner_desktop_image)){ ?>
                <div class="hero-banner-image">
                    <div class="banner-img">
                       <div class="img-shape-1 shapes pos-absolute">
                        <?php include get_theme_file_path( '/svgs/default-banner-img-shape-1-svg.php' ); ?>
                        </div>
                        <picture class="object-fit">
                            <source srcset="<?php echo $hero_banner_desktop_image['url']; ?>" media="(min-width: 768px)"
                                alt="<?php echo $hero_banner_desktop_image['alt']; ?>">
                            <img src="<?php echo $hero_banner_image_mobile['url']; ?>"
                                alt="<?php echo $hero_banner_image_mobile['alt']; ?>">
                        </picture>
                        <div class="img-shape-2 shapes pos-absolute">
                        <?php include get_theme_file_path( '/svgs/default-banner-img-shape-2-svg.php' ); ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- end of hero banner image -->
            </div>
            <!-- end of hero banner main -->
        </div>
    </div>
</section>
<?php }
function default_shortintro_svg_shortcode() {
	ob_start();
	?>
<?php include get_theme_file_path( '/svgs/default-short-intro-svg.php' ); ?>
<?php
	return ob_get_clean();
}
add_shortcode('default_shortintro_animation_svg', 'default_shortintro_svg_shortcode'); 


function home_donation_svg_shortcode() {
	ob_start();
	?>
<?php include get_theme_file_path( '/svgs/home-donation-svg.php' ); ?>
<?php
	return ob_get_clean();
}
add_shortcode('home_donation_animation_svg', 'home_donation_svg_shortcode'); 

function home_short_behind_svg_shortcode() {
	ob_start();
	?>
<?php include get_theme_file_path( '/svgs/home-short-behind-svg.php' ); ?>
<?php
	return ob_get_clean();
}
add_shortcode('home_short_behind_animation_svg', 'home_short_behind_svg_shortcode'); 




function get_short_intro(){
	$short_introduction_heading1 = get_field('short_introduction_heading1');
    $short_introduction_heading1_highlight = get_field('short_introduction_heading1_highlight');
    $short_introduction_heading2 = get_field('short_introduction_heading2');
    $short_introduction_heading2_highlight = get_field('short_introduction_heading2_highlight');
    $short_introduction_heading3 = get_field('short_introduction_heading3');
    $short_introduction_heading3_highlight = get_field('short_introduction_heading3_highlight');

	$short_introduction_description = get_field('short_introduction_description');
	$short_introduction_button_text = get_field('short_introduction_button_text');
	$short_introduction_button_link = get_field('short_introduction_button_link');
?>
<?php if(empty($short_introduction_description) ){ 
    $full_width_short_intro = "full_width"; 
}else{
    $full_width_short_intro = "";

}?>


    <section class="intro-module fluid-width">
        <div class="container">
            <div class="container-md">
                <div class="intro-main flex">
                    
                    <div class="intro-lt <?php echo $full_width_short_intro; ?>">
                        <h2>
                        <?php if($short_introduction_heading1_highlight == 'yes'){ ?>
                            <span> <?php echo $short_introduction_heading1; ?>
                            <?php include get_theme_file_path( '/svgs/default-short-intro-svg.php' ); ?>
                            </span><?php } else {  echo $short_introduction_heading1;  } ?>
                            <?php if($short_introduction_heading2_highlight == 'yes'){ ?>
                            <span> <?php echo $short_introduction_heading2; ?>
                            <?php include get_theme_file_path( '/svgs/default-short-intro-svg.php' ); ?>
                            </span><?php } else {  echo $short_introduction_heading2;  } ?>
                            <?php if($short_introduction_heading3_highlight == 'yes'){ ?>
                            <span> <?php echo $short_introduction_heading3; ?>
                            <?php include get_theme_file_path( '/svgs/default-short-intro-svg.php' ); ?>
                            </span><?php } else {  echo $short_introduction_heading3;  } ?>
                        </h2>
                    </div>
                                
                    <div class="intro-rt">
                        <?php echo $short_introduction_description; ?>
                        <?php if(!empty($short_introduction_button_text) && ($short_introduction_button_link)){ ?>
                        <a href="<?php echo $short_introduction_button_link; ?>"
                        class="button outline-btn pink"><?php echo $short_introduction_button_text; ?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } 



function get_features(){
	 if (have_rows('features')) { ?>
                <section class="features-module fluid-width">
                    <div class="container">
                        <div class="features-module-main flex">
                        <?php $f==0; while (have_rows('features')) { the_row();
                            $features_icon = get_sub_field('features_icon');
                            $features_heading = get_sub_field('features_heading');
                            $features_description = get_sub_field('features_description');
                            if($f== 0 || $f== 3 || $f== 6 ){
                                $feature_class = "light-orange";
                                }
                                else if($f== 1 || $f== 4 || $f== 7){
                                    $feature_class = "light-green";
                                 } 
                                 elseif($f==2 || $f== 5 || $f== 8){
                                    $feature_class = "light-blue";
                                 } 
                                 else{
                                    $feature_class= "";
                                 }
           				?>
                        <div class="features-module-grid flex">
                            <?php if(!empty($features_icon)){ ?>
                              <div class="features-icon <?php echo $feature_class; ?> ">
                                <figure>
                                  <img src="<?php echo $features_icon['url']; ?>"
                                   alt="<?php echo $features_icon['alt']; ?>">
                                </figure>
                               </div>
                            <?php } ?>
                                <?php if(!empty($features_heading) || ($features_description)){ ?>
                                <div class="features-txt">
                                    <h5><?php echo $features_heading; ?></h5>
                                    <?php echo $features_description; ?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php $f++; } wp_reset_postdata(); ?>
                            <!-- end of feature module grid -->
                        </div>
                    </div>
                </section>
        <?php  } ?>
   <?php }



function get_cta_panel()

{
    $cta_panel_desktop_image = get_field('cta_panel_desktop_image');
    $cta_panel_colour_picker = get_field('cta_panel_colour_picker');
    $cta_panel_m_image = get_field('cta_panel_mobile_image');
    $cta_panel_mobile_image = $cta_panel_m_image ? $cta_panel_m_image : $cta_panel_desktop_image;
    $cta_panel_sub_heading = get_field('cta_panel_sub_heading');
    $cta_panel_svg_color = get_field('cta_panel_svg_color');
    $cta_panel_heading1 = get_field('cta_panel_heading1');
    $cta_panel_heading1_highlight = get_field('cta_panel_heading1_highlight');
    $cta_panel_heading2 = get_field('cta_panel_heading2');
    $cta_panel_heading2_highlight = get_field('cta_panel_heading2_highlight');
    $cta_panel_heading3 = get_field('cta_panel_heading3');
    $cta_panel_heading3_highlight = get_field('cta_panel_heading3_highlight');
    $cta_panel_description = get_field('cta_panel_description');
    $cta_panel_button_text = get_field('cta_panel_button_text');
    $cta_panel_button_link = get_field('cta_panel_button_link');
	$cta_panel_desktop_image = get_field('cta_panel_desktop_image');


	?>

    <?php if(empty($cta_panel_desktop_image)){ 

        $full_width_cta_panel = "full_width";

    }

    else{

        $full_width_cta_panel = "";

    }?>
    <?php if(is_page_template( 'templates/inaction.php' )){ ?>
        <section class="common-cta-section violetbg"style ="background:<?php echo $cta_panel_colour_picker; ?>">
    <?php } 
    
    else if(is_page_template( 'templates/program.php' )){ ?>
        <section class="common-cta-section violetbg"style ="background:<?php echo $cta_panel_colour_picker; ?>">
    <?php }

    else if(is_page_template( 'templates/about.php' )){ ?>
        <section class="common-cta-section greenbg pink-shape"style ="background:<?php echo $cta_panel_colour_picker; ?>">
    <?php }
    else{ ?>
         <section class="common-cta-section fluid-width" style ="background:<?php echo $cta_panel_colour_picker; ?>">
    <?php }?>
    

                

                    <div class="container-lg">

                        <div class="common-cta-main flex ">

                            <div class="common-cta-text <?php echo $full_width_cta_panel; ?>">

                                <?php if(!empty($cta_panel_sub_heading)){ ?>

                                <span class="optional-text"><?php echo $cta_panel_sub_heading; ?></span>

                                <?php } ?>

                                

                                <div class="h1">
                                <?php if($cta_panel_heading1_highlight == 'yes'){ ?>
                                    <span>
                                    <?php echo $community_short_heaidng1; ?>
                                                    </span>
                                <?php } else { echo $cta_panel_heading1; } ?>
                                <?php if($cta_panel_heading2_highlight == 'yes'){ ?>
                                    <span>
                                    <?php echo $cta_panel_heading2; ?>
                                    
                                    </span>
                                <?php } else { echo $cta_panel_heading2; } ?>
                                <?php if($cta_panel_heading3_highlight == 'yes'){ ?>
                                    <span>
                                    <?php echo $cta_panel_heading3; ?>
                                    
                                    </span>
                                <?php } else { echo $cta_panel_heading3; } ?>    
                                </div>

                                

                                <?php if(!empty($cta_panel_description)){ ?>

                                <?php echo $cta_panel_description; ?>

                                <?php } ?>

                                <?php if(!empty($cta_panel_button_text) && ($cta_panel_button_link) ){ ?>

                                <a href="<?php echo $cta_panel_button_link; ?>"

                                    class="button outline-btn white"><?php echo $cta_panel_button_text; ?></a>

                                <?php } ?>

                            </div>

                            <?php if(!empty($cta_panel_desktop_image)){ ?>

                            <div class="common-cta-image">

                                <div class="common-cta-thumb">

                                    <picture class="object-fit">

                                        <source srcset="<?php echo $cta_panel_desktop_image['url']; ?>"

                                            media="(min-width: 768px)">

                                        <img src="<?php echo $cta_panel_mobile_image['url']; ?>"

                                            alt="<?php echo $cta_panel_mobile_image['alt']; ?>">

                                    </picture>

                                </div>

                                <div class="cta-icon">

                                <?php include get_theme_file_path( '/svgs/cta-panel-icon-svg.php' ); ?>

                                </div>

                                <?php } ?>

                            </div>

                        </div>

                    </div>

                </section>

                <?php }



function get_tiled()

{

	$default_tiled_heading = get_field('default_tiled_heading');

	$default_tiled_button_text = get_field('default_tiled_button_text');

	$default_tiled_button_link = get_field('default_tiled_button_link');

	?>

                <?php if(have_rows('default_tiled')){ ?>

                <section class="tiled-module pos-relative fluid-width">

                    <div class="container">

                        <div class="tiled-wrap">

                            <div class="heading flex">

                                <?php if(!empty($default_tiled_heading)) { ?>

                                <div class="heading-lt">

                                    <h3><?php echo $default_tiled_heading; ?></h3>

                                </div>

                                <?php } ?>

                                <?php if(!empty($default_tiled_button_text) && ($default_tiled_button_link)) { ?>

                                <div class="heading-rt  hide-in-tab hide-in-mobile">

                                    <div class="flexend"><a href="<?php echo $default_tiled_button_link; ?>"

                                            class="button outline-btn violet"><?php echo $default_tiled_button_text; ?></a>

                                    </div>

                                </div>

                            </div>

                            <?php } ?>

                            <div class="tiled-slider">

                                <?php

            			$s==0; while (have_rows('default_tiled')) { the_row();

              			$default_tiled_desktop_image = get_sub_field('default_tiled_desktop_image');

              			$default_tiled_m_image = get_sub_field('default_tiled_mobile_image');
                          $default_tiled_mobile_image = $default_tiled_m_image ? $default_tiled_m_image : $default_tiled_desktop_image;

              			$default_tiled_link = get_sub_field('default_tiled_link');

						$default_tiled_heading = get_sub_field('default_tiled_heading');

              			$default_tiled_description = get_sub_field('default_tiled_description');

              			$default_tiled_link_text = get_sub_field('default_tiled_link_text');

              			$add_color_class = get_sub_field('add_color_class');

            				?>

                                <div class="tiled-grid <?php echo $add_color_class; ?>">

                                    <?php if(!empty($default_tiled_desktop_image)){ ?>

                                    <div class="tiled-thumb">

                                        <picture class="object-fit"> <a href="<?php echo $default_tiled_link; ?>">

                                                <source srcset="<?php echo $default_tiled_desktop_image['url']; ?>"

                                                    media="(min-width: 768px)">

                                                <img src="<?php echo $default_tiled_mobile_image['url']; ?>"

                                                    alt="<?php echo $default_tiled_mobile_image['alt']; ?>">

                                            </a> </picture>

                                    </div>

                                    <?php } ?>

                                    <!-- end of tiled thumb -->

                                    <div class="tiled-content">

                                        <?php if(!empty($default_tiled_heading)){ ?>

                                        <h5><a

                                                href="<?php echo $default_tiled_link; ?>"><?php echo $default_tiled_heading; ?></a>

                                        </h5>

                                        <?php } ?>

                                        <?php echo $default_tiled_description; ?>

                                        <?php if(!empty($default_tiled_link_text) ){ ?>

                                        <a href="<?php echo $default_tiled_link; ?>"

                                            class="readmore"><?php echo $default_tiled_link_text; ?></a>

                                        <?php } ?>

                                    </div>

                                    <!-- end of tiled content -->

                                </div>

                                <?php $s++; }wp_reset_postdata(); ?>



                            </div>

                            <!-- end of tiled slider -->

                            <?php if(!empty($default_tiled_button_text) && ($default_tiled_button_link)) { ?>

                            <div class="btn hide-in-desktop"><a href="<?php echo $default_tiled_button_link; ?>"

                                    class="button outline-btn violet"><?php echo $default_tiled_button_text; ?></a>

                            </div>

                            <?php } ?>

                        </div>

                    </div>

                </section>



                <?php }

}



function global_feature_animation_svg_shortcode() {
    ob_start();
    ?>
<?php 
include get_theme_file_path( '/svgs/global-feature-animation-svg.php' ); ?>
                <?php
    return ob_get_clean();
}
add_shortcode('global_feature_animation_svg', 'global_feature_animation_svg_shortcode');



function get_communities_and_career(){



    if (have_rows('communities_and_career')) {

    ?>

                <section class="repeater-section fluid-width  pos-relative">

                    <div class="container">

                        <div class="repeater-wrap">

                            <div class="repeater-main">

                                <?php

            			$s=1; $p=1; while (have_rows('communities_and_career')) { the_row();

              			$communities_and_career_desktop_image = get_sub_field('communities_and_career_desktop_image');

              			$communities_and_career_heading = get_sub_field('communities_and_career_heading');

              			$communities_and_career_description = get_sub_field('communities_and_career_description');

                          $communities_and_career_video_type = get_sub_field('communities_and_career_video_type');

              			$communities_and_career_video_id = get_sub_field('communities_and_career_video_id');

              			                       
                                    if($s%2==0){

                                        $repeater_reverse = "reverse pink";
            
                                        }
            
                                        else{
            
                                             $repeater_reverse = "green";
            
                                         } 
                            ?>

                            <?php if(empty($communities_and_career_desktop_image)){ 

                                $full_width_community_career = "full_width";

                            }

                            else{

                                $full_width_community_career = "";

                            }

                                ?>
                           <?php  if($communities_and_career_video_type == 'vimeo'){
                        if(!empty($communities_and_career_video_id)){
                        $career_video_popup = "https://player.vimeo.com/video/". $communities_and_career_video_id."";}
                    } else if($communities_and_career_video_type == 'youtube'){
                        if(!empty($communities_and_career_video_id)){
                        $career_video_popup = "http://www.youtube.com/watch?v=". $communities_and_career_video_id."";}
                    } else {
                        $career_video_popup = "";
                    }
                ?>


                                <div class="repeater-list <?php echo $repeater_reverse; ?> flex flex-vcenter <?php echo $full_width_community_career; ?>">



                                    <?php if($p==1){ ?>

                                    <?php if(!empty($communities_and_career_desktop_image)){ ?>

                                    <div class="repeater-image pos-relative">



                                        <figure class="repeater-thumb object-fit">

                                            <img src="<?php echo $communities_and_career_desktop_image['url']; ?>"

                                                alt="<?php echo $communities_and_career_desktop_image['alt']; ?>">

                                        </figure>
                                        <?php if( !empty($career_video_popup) )  { ?>
                                        <div class="play-btn-main flex flex-center"> 
                                        
                                            <a class="play-btn flex flex-center" href="<?php echo $career_video_popup; ?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play-white-button.svg" alt="play-icon"> </a>        
                                        
                                        </div>
                                        <?php }?>


                                        <div class="tp-shape-6 shapes pos-absolute">
                                        <?php include get_theme_file_path( '/svgs/communities-career-tp-shape-6-svg.php' ); ?>
                                            

                                        </div>

                                        <div class="tp-shape-7 shapes pos-absolute">
                                        <?php include get_theme_file_path( '/svgs/communities-career-tp-shape-7-svg.php' ); ?>

                                        </div>

                                    </div>

                                    <?php } } else {?>

                                    <?php if(!empty($communities_and_career_desktop_image)){ ?>

                                    <div class="repeater-image pos-relative">

                                        <div class="tp-shape-1 shapes pos-absolute">

                                        <?php include get_theme_file_path( '/svgs/pink-tp-shape-1-svg.php' ); ?>

                                        </div>

                                        <figure class="repeater-thumb object-fit">

                                            <img src="<?php echo $communities_and_career_desktop_image['url']; ?>"

                                                alt="<?php echo $communities_and_career_desktop_image['alt']; ?>">

                                        </figure>
                                        <div class="play-btn-main flex flex-center"> 
                                        <?php if( !empty($career_video_popup) )  { ?>
                                            <a class="play-btn flex flex-center" href="<?php echo $career_video_popup; ?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play-white-button.svg" alt="play-icon"> </a>        
                                        <?php }?>
                                        </div>

                                        <div class="tp-shape-2 shapes pos-absolute">

                                           
                                        <?php include get_theme_file_path( '/svgs/pink-tp-shape-2-svg.php' ); ?>
                                        </div>

                                        <div class="tp-shape-3 shapes pos-absolute">

                                        <?php include get_theme_file_path( '/svgs/pink-tp-shape-3-svg.php' ); ?>

                                        </div>

                                    </div>

                                    <?php } } ?>



                                    <div class="repeater-content">

                                        <h2><?php echo $communities_and_career_heading; ?></h2>

                                        <?php echo $communities_and_career_description; ?>

                                    </div>

                                </div>

                                <?php $s++; $p++; } ?>



                            </div>

                        </div>

                    </div>

                </section>

                <?php }



    }



    function get_optional_cta(){

        $optional_cta_heading = get_field('optional_cta_heading');

        $optional_cta_button_text = get_field('optional_cta_button_text');

        $optional_cta_button_link = get_field('optional_cta_button_link');

        ?>

                <section class="two-paths-module fluid-width">

                    <div class="container">
                    <?php if(is_page_template( 'templates/confirmation.php' )){ ?>
        <hr>
    <?php } else{

    } ?>

                        <div class="two-path-main">

                            <div class="heading flex">

                                <?php if(!empty($optional_cta_heading)){ ?>

                                <div class="heading-lt">

                                    <h2><?php echo $optional_cta_heading; ?></h2>

                                </div>

                                <?php } ?>

                                <?php if(!empty($optional_cta_button_text) && ($optional_cta_button_link) ){ ?>

                                <div class="heading-rt">

                                    <div class="flexend">

                                        <a href="<?php echo $optional_cta_button_link; ?>"

                                            class="button blue"><?php echo $optional_cta_button_text; ?></a>

                                    </div>

                                </div>

                                <?php } ?>

                            </div>

                            <?php if(have_rows('optional_ctas')){ ?>

                            <div class="two-path-wrap flex">

                                <?php

            			$i=1; $j=1; while (have_rows('optional_ctas')) { the_row();

              			$optional_ctas_desktop_image = get_sub_field('optional_ctas_desktop_image');

              			$optional_ctas_heading = get_sub_field('optional_ctas_heading');

              			$optional_ctas_description = get_sub_field('optional_ctas_description');

                        $optional_ctas_link_text = get_sub_field('optional_ctas_link_text');

              			$optional_ctas_paths_link = get_sub_field('optional_ctas_paths_link');

                         if($i%2==0){

                            $two_path_color = "orange";

                            }

                            else{

                                 $two_path_color = "green";

                             }                             

            				?>
                                <div class="two-path-grid <?php echo $two_path_color; ?>">
                                    <?php if($j==1){ ?>
                                    <?php if(!empty($optional_ctas_desktop_image)){ ?>
                                    <div class="two-path-thumb pos-relative">
                                        <div class="tp-shape-1 shapes pos-absolute">
                                        <?php include get_theme_file_path( '/svgs/optional-cta-tp-shape-1-svg.php' ); ?>
                                        </div>
                                        <figure class="object-fit">
                                            <img src="<?php echo $optional_ctas_desktop_image['url']; ?>"
                                                alt="<?php echo $optional_ctas_desktop_image['alt']; ?>">
                                        </figure>
                                        <div class="tp-shape-2 shapes pos-absolute">
                                        <?php include get_theme_file_path( '/svgs/optional-cta-tp-shape-2-svg.php' ); ?>

                                        </div>

                                        <div class="tp-shape-3 shapes pos-absolute">

                                        <?php include get_theme_file_path( '/svgs/optional-cta-tp-shape-3-svg.php' ); ?>

                                        </div>

                                    </div>

                                    <?php } } else { ?>

                                    <?php if(!empty($optional_ctas_desktop_image)){ ?>

                                    <div class="two-path-thumb pos-relative">

                                        <div class="tp-shape-4 shapes pos-absolute">
                                        <?php include get_theme_file_path( '/svgs/optional-cta-tp-shape-4-svg.php' ); ?>
                                           

                                        </div>

                                        <figure class="object-fit">

                                            <img src="<?php echo $optional_ctas_desktop_image['url']; ?>"

                                                alt="<?php echo $optional_ctas_desktop_image['alt']; ?>">

                                        </figure>

                                        <div class="tp-shape-5 shapes pos-absolute">

                                        <?php include get_theme_file_path( '/svgs/optional-cta-tp-shape-5-svg.php' ); ?>

                                        </div>



                                    </div>

                                    <?php } } ?>

                                    <div class="two-path-cnt">

                                        <?php if(!empty($optional_ctas_heading)) { ?>

                                        <h3><?php echo $optional_ctas_heading; ?></h3>

                                        <?php } ?>

                                        <?php echo $optional_ctas_description; ?>

                                        <?php if(!empty($optional_ctas_link_text) && ($optional_ctas_paths_link)) { ?>

                                        <a href="<?php echo $optional_ctas_paths_link; ?>"

                                            class="readmore"><?php echo $optional_ctas_link_text; ?></a>

                                        <?php } ?>

                                    </div>



                                </div>

                                <?php $i++; $j++; } ?>



                                <!--end of two path grid -->



                            </div>



                        </div>

                    </div>

                </section>

                <?php } wp_reset_postdata();

    } 



    function get_note_shortcode()

    { 

        $note_icon = get_field('note_icon');

        $note_description = get_field('note_description');

        $note_button_text = get_field('note_button_text');

        $note_button_link = get_field('note_button_link');

        if(is_page_template( 'templates/campaign.php' )){ 

            $link_color = "";
            }
            else {
                $link_color = "orange";   
            }

 if(!empty($note_description)){

    if(is_page_template( 'templates/campaign.php' )){ 

    $note_shortcode .= '<section class="support-module light-green">';
    }
    else{

     $note_shortcode .= '<section class="support-module light-orange">';
    }

    $note_shortcode .= '<div class="container">' ;

    $note_shortcode .=  '<div class="support-wrap flex flex-vcenter">' ;

    if(!empty($note_icon)){

    $note_shortcode .= '<div class="support-lt shapes">';

    

    $note_shortcode .= '<svg width="82" height="82" viewBox="0 0 82 82" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="m8.673 67.65.158.158c0 .157.158.315.158.315.157.158.315.473.473.63.473.316.946.632 1.419.79.473.157 1.104.157 1.735 0 .315 0 .63-.159.788-.316.789 0 4.258-1.42 3.942-1.42 2.05-.788 4.258-.63 5.993.474l3.154 2.05 3.153 2.05c1.104.63 2.208 1.419 3.47 2.05 5.046 2.365 10.88 2.365 15.927.315 1.261-.473 2.523-1.104 3.627-1.892 1.103-.789 2.05-1.577 3.153-2.366l5.835-4.888c.158-.158 11.985-9.935 11.827-9.777a7.003 7.003 0 0 0 1.261-1.735c.316-.63.631-1.419.631-2.207 0-.789-.473-1.735-.946-2.208-1.104-.946-2.365-1.42-3.942-1.262 3.311-3.627 5.992-7.727 7.727-12.3 1.892-5.361 2.05-11.511.157-17.03-.946-2.681-2.523-5.362-4.415-7.57-2.05-2.207-4.573-3.942-7.57-4.888-2.995-.946-6.15-.788-9.145.158-2.366.788-4.416 2.207-6.308 3.942a15.508 15.508 0 0 0-6.15-3.785c-2.839-.946-5.992-1.103-8.989-.315-2.996.788-5.519 2.523-7.569 4.73-5.519 5.993-7.727 15.455-4.73 24.285 1.103 3.47 2.838 6.466 4.888 9.304-.158-.157-.316-.157-.63-.315-5.362-2.05-11.04-1.577-15.928 1.104l-6.623 3.784-1.577.946c-.946.474-1.577 1.577-1.734 2.681 0 .473 0 1.104.157 1.577 0 .158.158.316.158.316l.315.157c0 .158 1.104 2.366 1.104 2.208 0 0 5.362 10.88 5.046 10.25zm17.82-48.096c.946-2.366 2.365-4.573 4.1-6.466 1.734-1.734 3.942-3.153 6.307-3.784 2.366-.631 4.889-.631 7.096.315 2.366.789 4.258 2.366 5.993 4.258.63.788 1.734.63 2.365 0C56.14 9.46 61.343 8.042 65.6 9.46c4.731 1.42 8.516 5.677 10.25 10.408 1.893 4.889 1.893 10.408.316 15.454-1.577 5.046-4.573 9.62-8.2 13.72-.316.157-.631.472-.947.63l-.63.788c-.631.474-1.262.947-1.893 1.262a49.49 49.49 0 0 1-3.942 2.208c-2.523 1.104-5.204 2.05-7.885 2.523-.473-.946-1.261-1.735-2.207-1.893-.316 0-.631-.157-.789-.157-.63-.158-.946 0-1.577-.158l-2.838-.473c-3.785-1.104-7.412-2.523-10.25-5.046l-.158-.158c-.157-.158-2.365-1.577-2.207-1.577-2.997-3.627-5.362-7.884-6.781-12.3-1.42-4.888-1.104-10.407.63-15.138zM5.362 52.984l1.577-.946 6.623-3.942c2.05-1.261 4.258-1.892 6.623-2.208 2.365-.157 4.73.158 6.938.947 1.104.473 2.208.946 3.154 1.576l3.154 2.05h-.158c3.312 2.839 7.254 4.258 11.354 5.204 1.104.158 2.05.316 3.154.473h2.05c.158 0 .315.158.473.158.63.315.946.946.63 1.577-.157.63-.788 1.262-1.576 1.735-3.47 1.419-7.57 2.207-11.354 1.261-1.892-.63-3.627-1.577-5.361-2.523a54.356 54.356 0 0 1-5.047-3.154c1.577 1.262 3.154 2.523 4.889 3.627 1.734 1.104 3.47 2.208 5.361 2.839 4.1 1.103 8.2.63 12.3-.789.947-.473 2.05-1.261 2.523-2.523a4.5 4.5 0 0 0 0-2.05h.158c.316 0 .473 0 .789-.158a35.884 35.884 0 0 0 7.096-1.734c1.419-.631 2.838-1.262 4.257-2.05.631-.316 1.42-.789 2.05-1.262l.947-.63.946-.474h.157l.158-.157c1.577-.631 3.312-.316 4.416.788.315.316.473.789.473 1.104 0 .788-.789 1.892-1.42 2.523l-12.142 9.146-5.992 4.573c-.946.789-2.05 1.577-2.996 2.208-.947.63-2.05 1.261-3.154 1.577-4.416 1.734-9.462 1.577-13.72-.473-2.05-.946-4.257-2.523-6.307-3.942l-3.312-2.05c-2.523-1.577-5.834-1.735-8.673-.631-.157 0-4.257 1.734-3.942 1.734h-.315s-.158 0-.158-.157v-.158l-.158-.158c-.158-.157-6.15-12.142-5.992-11.984l-.158-.473-.473.157V53.3s0-.158.158-.316z" fill="#FF7800"></path>
</svg>';

    

    $note_shortcode .= '</div>';

    } 



    $note_shortcode .= '<div class="support-rt">' .$note_description. '';

    if(!empty($note_button_text) && ($note_button_link)){              

    $note_shortcode .='<a href="'.$note_button_link.'" class="readmore '.$link_color.'">'.$note_button_text.'</a>';

    }

    

    $note_shortcode .= '</div>';

    $note_shortcode .= '</div>';

    $note_shortcode .= '</div>';

    $note_shortcode .='</section>';

                }

                return $note_shortcode;

   } 

    add_shortcode('note', 'get_note_shortcode');



    function get_testinomial_shortcode()

    {   

        $testimonial = get_field('testimonial');

        $testimonial_icon = get_field('testimonial_icon');

        $testimonial_name = get_field('testimonial_name');

        $testimonial_position_role = get_field('testimonial_position_role');

        $testimonial_background_color = get_field('testimonial_background_color');



if(!empty($testimonial)){

    $testimonial_shortcode = "";

    $testimonial_shortcode .= '<section class="single-testimonial" style ="background:' .$testimonial_background_color. '">';

    $testimonial_shortcode .= '<div class="container">';

    $testimonial_shortcode .= '<div class="single-testimonail-wrap">';

    $testimonial_shortcode .= '<div class="testimonial-cnt">' .$testimonial. '';

    $testimonial_shortcode .= '</div>';

    $testimonial_shortcode .= '<div class="author flex">';

    if(!empty($testimonial_icon)){

    $testimonial_shortcode .= '<div class="author-thumb">';

    

    $testimonial_shortcode .= '<figure class="object-fit">';

    $testimonial_shortcode .= '<img src="'.$testimonial_icon['url'].'" alt="'.$testimonial_icon['alt'].'">';

    

    $testimonial_shortcode .=  '</figure>';

    $testimonial_shortcode .='</div>';

    }

    $testimonial_shortcode .='<div class="author-info">';

    $testimonial_shortcode .='<div class="author-name">' .$testimonial_name. '';

    $testimonial_shortcode .= '</div>';

    $testimonial_shortcode .= '<div class="author-pos">' .$testimonial_position_role. ''; 

    $testimonial_shortcode .='</div>';

    $testimonial_shortcode .='</div>';

    $testimonial_shortcode .='</div>';

    $testimonial_shortcode .='</div>';

    $testimonial_shortcode .='</div>';

    $testimonial_shortcode .= '</section>';

        }

        return $testimonial_shortcode;

        }



    

    add_shortcode('testimonial', 'get_testinomial_shortcode');



    



    function get_faqs_shortcode()

    {

        $faqs_shortcode = "";

        

        if( have_rows('campaign_faqs') ):



    

    

        $faqs_shortcode .= '<section class="accordion-module">';

        $faqs_shortcode .='<div class="container">';

        $faqs_shortcode .= '<div class="accordion-main">';

        while ( have_rows('campaign_faqs') ) : the_row();

        $campaign_faqs_question = get_sub_field('campaign_faqs_question');

        $campaign_faqs_answer = get_sub_field('campaign_faqs_answer');

        if(!empty($campaign_faqs_question) && ($campaign_faqs_answer)){

            $faqs_shortcode .='<div class="accordion">';

            $faqs_shortcode .= '<div class="accordion-item">';

            $faqs_shortcode .= '<a href="#" class="heading">'. $campaign_faqs_question.'</a>';

           

            $faqs_shortcode .='<div class="content">' .$campaign_faqs_answer. '';

                      

            $faqs_shortcode .='</div>';

            $faqs_shortcode .='</div>';

            $faqs_shortcode .='</div>';

                }

                endwhile;

                  

                  

                $faqs_shortcode .='</div>';

                $faqs_shortcode .='</div>';

            endif;

           

            $faqs_shortcode .='</section>';

            return $faqs_shortcode;

    }

    add_shortcode('faq', 'get_faqs_shortcode');





    function get_imagewithsvg_shortcode(){



        $short_image_svg = get_field('short_image_svg');

       



        if(!empty($short_image_svg)){

            $imagewithsvg_shortcode = "";

            $imagewithsvg_shortcode .= '<div class="default-thumb pos-relative">';

            $imagewithsvg_shortcode .='<div class="lc-shape-1 shapes pos-absolute">';

            $imagewithsvg_shortcode .= '<svg xmlns="http://www.w3.org/2000/svg" width="158" height="209" viewBox="0 0 158 209" fill="none">
            <path d="M73.7453 164.353C73.6917 164.299 73.6112 164.272 73.5039 164.191C73.5844 164.272 73.6648 164.326 73.7453 164.353Z" fill="#FF7800"/>
            <path d="M69.7753 167.447L69.668 167.34C69.668 167.367 69.7216 167.394 69.7753 167.447Z" fill="#FF7800"/>
            <path d="M75.8105 162.334C75.8374 162.361 75.8374 162.361 75.8642 162.361C75.891 162.334 75.9447 162.28 75.9983 162.227L75.8105 162.334Z" fill="#FF7800"/>
            <path d="M62.9095 174.902L62.9364 174.849C62.9095 174.876 62.8827 174.876 62.9095 174.902Z" fill="#FF7800"/>
            <path d="M67.1465 170.569C67.2538 170.65 67.2806 170.704 67.2806 170.731C67.3074 170.731 67.3074 170.704 67.1465 170.569Z" fill="#FF7800"/>
            <path d="M82.1948 164.164L81.7656 164.03C81.9266 164.111 82.1143 164.191 82.1948 164.164Z" fill="#FF7800"/>
            <path d="M82.0082 160.774C81.9814 160.774 81.9546 160.747 81.9277 160.747C81.9546 160.747 81.9814 160.747 82.0082 160.774Z" fill="#FF7800"/>
            <path d="M79.9414 160.935C79.9682 160.962 80.0219 161.043 80.0755 161.097C80.0755 161.07 80.1023 161.016 79.9414 160.935Z" fill="#FF7800"/>
            <path d="M80.1566 161.177C80.1298 161.15 80.103 161.123 80.0762 161.096C80.0762 161.123 80.0762 161.15 80.1566 161.177Z" fill="#FF7800"/>
            <path d="M45.5279 206.39C45.4743 206.443 45.6888 206.686 45.8766 206.901L45.5279 206.39Z" fill="#FF7800"/>
            <path d="M58.0814 182.438L57.9473 182.33C57.9741 182.384 58.0277 182.411 58.0814 182.438Z" fill="#FF7800"/>
            <path d="M82.4629 166.075C82.7848 166.344 82.2751 166.264 82.6238 166.452C82.597 166.344 82.9457 166.371 82.4629 166.075Z" fill="#FF7800"/>
            <path d="M48.5849 208.623H48.719C48.6654 208.596 48.5849 208.543 48.5312 208.516C48.5849 208.569 48.6117 208.596 48.5849 208.623Z" fill="#FF7800"/>
            <path d="M53.0107 190.242C52.9839 190.215 52.9839 190.215 52.957 190.188L53.0107 190.242Z" fill="#FF7800"/>
            <path d="M52.1519 190.296C52.125 190.242 52.125 190.189 52.0982 190.135C52.0446 190.162 52.0714 190.215 52.1519 190.296Z" fill="#FF7800"/>
            <path d="M45.9023 206.901L46.1169 207.197C46.0901 207.116 45.9828 207.009 45.9023 206.901Z" fill="#FF7800"/>
            <path d="M49.8452 195.113C49.8452 195.087 49.8452 195.06 49.8184 195.033C49.7916 195.06 49.7916 195.087 49.8452 195.113Z" fill="#FF7800"/>
            <path d="M67.5503 170.381C67.604 170.381 67.6308 170.381 67.6576 170.381C67.5503 170.327 67.4967 170.3 67.5503 170.381Z" fill="#FF7800"/>
            <path d="M75.087 178.912C74.9797 178.912 75.1943 179.154 75.4357 179.343C75.4625 179.289 75.4357 179.208 75.087 178.912Z" fill="#FF7800"/>
            <path d="M77.4749 177.297C77.3944 177.271 77.3408 177.244 77.2871 177.244C77.3408 177.271 77.4212 177.297 77.4749 177.297Z" fill="#FF7800"/>
            <path d="M75.0614 181.954C75.0614 181.926 75.0342 181.926 75.0614 181.954C75.0342 181.926 75.0342 181.926 75.0614 181.954Z" fill="#FF7800"/>
            <path d="M73.8801 190.054C74.0678 189.273 73.8264 187.982 74.4165 187.47C73.7459 186.878 73.8532 186.663 73.7996 186.34L74.8189 186.932L74.6043 186.555C74.953 186.663 74.7116 186.798 75.1676 186.905L74.5775 186.475C74.953 186.69 75.0871 186.179 75.6236 186.905L76.026 186.232C76.1333 186.098 75.2481 185.64 75.5968 185.64C75.9187 185.775 75.7577 185.829 76.1333 186.017C77.1794 185.963 74.5238 184.295 75.2481 184.106L75.3554 184.214C75.1408 183.972 75.2481 183.837 75.114 183.756C74.0678 183.218 75.6236 184.16 74.9262 183.945C74.0947 183.434 74.5775 183.487 73.9337 183.111C74.3093 183.191 73.8532 182.841 73.8532 182.707C74.4702 182.868 74.2288 182.411 74.9798 182.68C74.7653 182.438 73.9874 181.846 74.041 181.657C74.7653 181.926 74.658 182.061 75.0067 182.061L74.5238 181.738C74.6848 181.657 74.7921 181.765 75.0335 181.9C75.1408 181.765 74.4165 181.388 74.8457 181.388L75.2749 181.765C75.1676 181.523 75.2749 181.523 75.4359 181.361C75.7041 181.523 75.6504 181.603 75.5431 181.603C76.3479 181.926 75.3286 181.254 75.4359 181.227C75.2213 181.119 75.0335 181.173 74.5775 180.823C74.7116 180.796 74.0142 180.231 74.658 180.5L75.0871 180.877C74.8189 180.446 74.5238 180.419 74.8457 180.312C74.8726 180.339 75.0067 180.419 75.114 180.473C74.5507 179.962 75.2481 180.123 75.409 179.935L75.5163 180.043C75.409 179.854 74.9799 179.558 75.0335 179.531C74.6848 179.477 74.5507 179.37 74.0678 179.101C74.9798 179.424 73.2631 178.293 73.8801 178.347C74.1483 178.509 74.4702 178.778 74.1215 178.67C74.8994 179.262 75.6236 179.693 75.9187 180.07C75.7846 179.854 75.7309 179.666 76.0796 179.908L75.3286 179.424C75.3554 179.343 75.409 179.343 75.4359 179.289C74.953 178.966 74.5507 178.939 74.3093 178.589C74.1483 178.293 75.1676 178.993 74.8189 178.751C74.6311 178.347 74.041 178.159 74.4165 178.132C74.4702 178.186 74.5775 178.32 74.497 178.293C74.8994 178.347 74.5775 177.863 75.5163 178.374C75.7041 178.509 75.9992 178.697 75.8919 178.697L75.7577 178.616C76.3479 179.181 75.6504 178.374 76.4552 178.912C75.9455 178.616 76.1869 178.482 76.321 178.455L75.7309 178.132C74.202 176.813 76.8575 178.832 76.8039 178.401C76.5356 177.97 76.5893 178.374 76.2674 178.024C76.4552 177.943 76.9916 178.213 76.8575 177.863C77.1258 177.943 77.4745 178.024 78.1451 178.401C77.9573 178.132 78.6279 178.213 78.0378 177.782C77.394 177.647 78.6011 178.374 77.6354 178.105L77.0453 177.674C77.1794 177.54 76.9648 177.136 77.2599 177.163C77.1258 177.109 76.9648 177.028 76.8307 176.948C76.7234 176.571 76.1333 176.14 76.4552 176.033C77.0453 176.329 76.8843 176.409 76.8575 176.544C77.394 176.679 76.9916 176.409 77.2867 176.302C77.7964 176.598 77.1794 176.436 77.6354 176.759L77.6086 176.409C77.6354 176.436 77.6622 176.436 77.7159 176.463C76.8843 175.925 77.9036 176.329 77.7427 176.033C77.9573 175.683 76.8575 174.956 76.2942 174.391C76.5625 174.472 76.777 174.579 76.9648 174.741C76.5356 174.606 76.8307 174.768 77.0453 174.929C77.0185 174.768 78.0378 175.145 78.3328 175.414C78.1987 175.091 77.85 175.225 77.6622 174.956L77.8768 174.741C77.4208 174.526 77.2867 174.553 77.0185 174.23C76.9648 174.041 77.0721 174.041 77.2062 173.907C77.394 174.041 77.8768 174.23 77.7964 174.337C78.0109 174.364 78.0914 174.256 77.6891 173.987C77.2062 173.907 77.4745 173.503 76.7234 173.234L77.2062 173.288C77.1794 173.315 77.4476 173.503 77.3403 173.503C78.0109 173.826 77.233 173.261 77.2062 173.18C77.3672 173.207 77.5013 173.072 77.7695 173.207C77.6086 173.045 77.8232 173.019 78.1719 173.18C78.0914 173.019 77.7427 172.938 77.5549 172.776L77.7695 172.561C78.1451 172.749 79.1644 173.315 79.2717 173.449C79.0034 173.153 78.2255 172.803 78.3328 172.669C78.9766 173.153 78.9766 172.776 79.7545 173.395C80.3178 173.611 80.4519 173.341 80.3446 173.126C79.835 172.722 79.9423 173.099 79.379 172.749C79.379 172.265 77.8232 171.323 78.2524 171.215L78.0378 171.188C77.8232 170.839 77.8768 170.892 77.4476 170.516C78.1182 170.973 79.4594 171.431 79.4863 171.054C79.1375 170.812 78.7084 170.812 78.1719 170.462V170.22C78.2255 170.247 78.3328 170.327 78.4133 170.408C78.2524 170.085 79.5131 170.623 78.7084 170.112L79.835 170.543L79.3521 170.354C79.0034 170.139 79.0303 169.87 78.8961 169.762C78.6279 169.358 78.9498 169.439 79.4863 169.601C79.1644 169.466 78.4669 169.17 78.4401 168.955C79.5935 169.628 79.0571 168.874 79.6472 169.224C79.674 169.143 80.0764 169.251 79.6204 168.982L80.3446 169.412C79.3521 168.82 79.5131 168.632 79.4326 168.363C80.7738 169.17 79.4326 168.12 80.7202 168.739C79.8081 168.174 80.5324 168.228 79.7545 167.744C79.7813 167.582 80.6397 168.094 80.9616 168.228L80.6397 167.959C81.1225 168.147 81.3103 167.932 81.7126 167.959L80.9616 167.367L81.3639 167.528C81.1762 167.394 81.1225 167.205 80.7738 167.098L80.8543 167.044C79.9691 166.533 80.6665 166.802 80.3714 166.425C80.5324 166.479 80.747 166.613 80.8543 166.694C80.9079 166.613 81.3371 166.909 81.659 167.044C81.3907 166.963 80.2105 165.887 79.7008 165.86C79.3253 165.671 79.1375 165.402 79.3253 165.429L80.1568 165.833L79.3521 165.268C79.2985 165.079 79.835 165.322 79.9959 165.295C79.9959 165.429 81.4176 166.371 81.5517 166.129C81.5785 166.317 82.0077 166.64 82.115 166.802C82.1686 166.775 82.2759 166.775 82.571 167.071C82.4369 166.748 82.115 166.721 82.115 166.479C82.8392 166.883 83.0807 166.963 83.4294 166.936L82.8392 166.775C82.7588 166.721 82.7051 166.667 82.6515 166.64C82.5442 166.64 82.4369 166.587 82.1418 166.452C82.1686 166.425 81.3639 165.725 81.8199 165.941C80.586 165.51 81.1493 165.133 80.3983 164.864C80.2105 164.73 80.2373 164.568 80.6129 164.756C81.0689 165.214 81.498 165.106 81.9809 165.402C81.7931 165.241 81.3639 165.241 81.1493 164.999C81.1493 164.864 81.6322 165.053 81.9004 165.133L82.0077 165.241L82.4101 165.268C82.0613 165.053 81.7126 165.079 81.6053 164.837C81.7663 164.891 81.659 164.649 81.9541 164.81C82.4101 165.16 83.1075 165.456 83.1611 165.645C83.1611 165.51 83.2416 165.16 82.5174 164.918L82.5978 164.81C82.2491 164.703 81.6053 164.622 81.6322 164.326L81.7663 164.407L81.3103 163.949L81.7126 164.084C81.5249 163.976 81.3639 163.868 81.4176 163.815C81.6322 163.922 81.7663 163.922 82.0345 164.084C82.0882 163.895 81.7126 163.707 81.5249 163.572C81.5249 163.438 81.6858 163.492 82.0882 163.788C82.2491 163.707 82.3028 163.438 82.7319 163.545C82.4905 163.196 82.571 163.492 82.115 163.115C83.4562 163.653 82.9197 162.792 82.9197 162.415C81.7663 161.904 82.8392 162.254 81.8468 161.662C82.1686 161.904 82.8661 161.85 83.027 162.281L83.0002 162.065C83.6708 162.281 83.3221 162.577 84.2341 162.846C84.2877 162.657 83.1343 161.877 83.6708 161.904C84.4218 162.388 83.483 161.608 84.3414 162.119C84.6096 162.307 84.4755 162.334 84.5023 162.415L84.6633 162.469C84.8779 162.334 84.6633 162.173 84.3414 162.011C84.0195 161.823 83.5903 161.635 83.3757 161.366C83.4294 161.043 84.1268 161.446 84.5023 161.635C84.6901 161.662 84.6364 161.446 84.4755 161.258C84.8778 161.688 83.8049 161.339 83.3489 161.016C84.3146 161.339 83.644 160.612 83.2952 160.397C82.7051 160.37 82.6783 160.424 82.6246 160.477C82.571 160.531 82.5173 160.585 81.9004 160.504C82.1686 160.693 82.9734 161.123 82.5442 161.15C82.1955 160.827 82.0882 160.935 81.9541 160.881C82.4369 161.096 82.0882 161.123 82.2491 161.258C81.8468 161.123 81.2298 160.585 80.9347 160.666L82.0077 161.285C81.7931 161.285 81.2298 160.827 81.3907 161.123C80.8543 160.747 80.5056 160.693 80.4251 160.37C79.3521 160.128 80.7202 161.016 81.0152 161.419C80.9616 161.366 80.8274 161.285 80.747 161.231C81.0152 161.419 80.9616 161.5 80.9884 161.581C80.6665 161.581 80.5592 161.204 80.2373 161.096L80.1568 161.312C80.13 161.285 80.1032 161.285 80.0764 161.285C80.1837 161.419 80.2642 161.527 79.9959 161.392C79.674 161.15 79.3253 160.908 79.0839 160.72L79.7277 161.339C79.379 161.123 79.0034 161.177 78.8425 160.881L78.8157 161.285L78.0646 160.908C78.1451 161.043 78.306 161.123 78.4401 161.096C78.2255 161.123 79.4594 162.281 78.0378 161.419C78.4938 162.011 78.1987 161.958 78.4133 162.469C77.8768 161.877 77.4208 162.254 77.233 161.85C76.8307 161.823 77.6086 162.281 77.6622 162.469C77.2867 162.415 76.6161 161.958 76.4015 161.688L76.6697 162.011L76.5356 161.931L76.8843 162.281C76.4283 162.2 76.1333 161.904 75.9723 161.985L76.5893 162.361L76.1601 162.227C76.482 162.361 76.5625 162.496 76.5625 162.63L76.4283 162.55L76.482 162.738C76.1601 162.415 76.2942 162.765 75.865 162.442C75.7846 162.523 75.7846 162.523 75.8114 162.765L76.2674 162.98C76.5088 163.411 75.5968 162.63 75.4627 162.792L75.9723 163.061C74.9799 162.846 76.1869 163.788 75.5431 163.68C75.4895 163.492 74.8726 163.196 75.0335 163.276C75.114 163.545 74.8189 163.734 75.3554 164.272C74.5775 163.922 74.3629 163.815 73.9337 163.815C73.9069 163.976 73.9605 164.03 74.3629 164.299C74.0142 164.272 74.2824 164.73 73.7459 164.434C74.1483 164.703 73.585 164.487 73.9069 164.783L73.6923 164.676L74.202 164.945C72.9412 164.514 74.6311 165.671 73.5045 165.349L73.3972 165.241L73.5314 165.456C73.2899 165.349 73.1826 165.241 72.9144 165.053L72.5657 165.429L72.9949 165.564C72.9949 165.698 73.4509 166.021 73.0754 165.968C72.4316 165.349 72.9681 166.102 72.3511 165.779L72.217 165.564C72.1902 165.725 72.1902 165.725 72.6998 165.994C72.7803 166.264 71.6805 165.564 72.1365 166.021L72.217 165.914C72.5389 166.048 72.8876 166.371 72.8339 166.425C72.7535 166.398 72.4852 166.317 72.4584 166.237C72.5657 166.479 72.1902 166.533 72.3779 166.694C72.1902 166.667 71.8415 166.452 71.7342 166.317C72.0024 166.856 71.5732 166.398 71.8415 166.909L71.5464 166.748L71.8415 167.044L71.144 166.829L71.5464 166.99C71.5464 167.125 71.7073 167.286 71.4927 167.286L71.0904 166.99C71.1709 167.394 70.2052 166.883 70.6612 167.475C70.5807 167.448 70.4734 167.34 70.393 167.259C70.9294 167.878 69.5346 166.99 70.2052 167.69C70.0711 167.582 69.8833 167.528 69.776 167.448L69.9906 167.717L69.4273 167.367L70.232 167.932L69.6151 167.663L69.8565 167.851C68.7031 167.34 69.4273 167.959 68.5153 167.636L69.2664 168.04C70.5271 169.305 67.9252 168.443 68.3275 169.305L67.7642 168.955L68.3275 169.547C67.8179 169.385 67.8715 169.197 67.5765 169.062C67.7642 169.439 68.3812 169.628 68.3812 169.977C67.9252 169.87 67.9788 169.681 67.8179 169.52C67.9788 169.897 68.0861 170.435 67.6838 170.381C67.7642 170.435 67.8447 170.489 67.8984 170.516C68.0593 170.812 67.6838 170.866 67.6301 171.054C67.3619 170.892 67.3619 170.839 67.335 170.758C67.2546 170.785 67.04 170.758 67.2814 170.973L66.8254 170.623C66.6645 170.704 66.9595 171.188 66.3694 170.892C66.6108 171 67.0132 171.269 66.9327 171.35C66.0207 170.892 67.1205 171.861 66.5572 171.754C66.3694 171.619 66.3962 171.458 66.3694 171.485C66.1012 171.431 66.4499 171.754 66.6645 171.996L66.3157 171.754L66.5572 172.453C65.6451 171.996 66.4499 172.911 65.8329 172.507C65.7256 172.642 66.2889 172.615 66.2889 172.857C65.8866 172.696 66.3694 173.126 65.8061 172.776L65.7524 172.722L65.7256 172.884L65.216 172.48C65.2696 172.669 65.7793 173.072 66.2084 173.341C65.8329 173.261 65.9939 173.557 65.4574 173.315L65.3501 173.207C65.4037 173.637 63.5261 172.776 64.3308 173.584C64.2503 173.557 64.1162 173.476 64.143 173.449L64.0089 173.611L63.6065 173.315L64.0625 173.987L63.7943 173.826C63.5529 173.96 63.5261 174.364 63.4456 174.66L63.3383 174.553C63.6065 175.091 62.9091 174.66 63.0969 175.037C63.0164 174.983 62.9896 174.956 62.9896 174.956L62.8823 175.145L62.6409 174.929C63.1774 175.441 61.6216 174.849 62.1849 175.064C62.3995 175.306 62.6677 175.629 62.9896 175.871C62.9091 176.087 62.5872 175.71 62.2922 175.683C62.1849 175.817 62.6409 176.14 62.2653 176.167L61.9971 176.006C61.9971 176.14 62.158 176.302 62.1312 176.463L62.0239 176.356C62.5068 176.921 61.0314 176.113 62.1849 177.028C61.8898 176.975 61.9703 177.244 61.407 176.894C61.6216 177.378 61.6752 177.674 61.7289 178.078C60.7632 177.567 61.7557 178.159 61.1387 177.997L61.6484 178.293C61.4875 178.697 60.0121 178.374 59.9853 178.885L59.4757 178.589L59.9853 178.993C59.5025 179.289 58.966 179.72 58.7514 180.043C58.9392 180.312 59.4488 180.85 59.1538 180.931L59.1001 180.877C59.2074 181.361 59.2074 181.819 58.7246 181.98C58.5368 181.819 58.3491 181.765 58.2418 181.657C58.7514 182.061 58.1613 181.873 58.0808 181.926L58.51 182.061C58.9124 182.438 58.3759 182.303 58.0003 182.142L58.4295 182.626C58.3759 182.599 58.2954 182.572 58.2149 182.519L58.4564 182.707L57.7589 182.384C57.8662 182.492 57.9199 182.815 58.51 183.245C58.2954 183.138 58.0272 183.164 57.9735 182.976L57.4371 183.407L57.7321 183.46C58.2418 183.756 58.4564 184.106 58.1613 184.053C57.8394 183.703 57.4639 183.622 57.0615 183.434C57.2761 183.676 57.5443 183.649 57.7858 183.837C58.054 184.133 58.1076 184.429 57.8662 184.349L57.7053 184.16C57.8126 184.402 56.9006 183.918 56.8737 184.079C57.1956 184.429 56.7933 184.295 57.6516 184.806C57.7321 185.075 57.0347 184.51 56.9274 184.51C57.2761 184.833 56.8737 184.914 56.4446 184.671C57.6248 185.533 55.7203 184.833 56.7396 185.506L56.069 185.264C56.3373 185.452 56.9542 185.856 57.0079 186.044C56.6323 185.963 56.1763 185.64 55.8544 185.479L56.8469 186.205C55.3716 186.098 55.613 187.336 54.2987 187.417C54.3255 187.847 54.5937 188.52 54.245 188.762L54.1377 188.628L53.6549 188.789L54.2718 188.843C54.3523 189.004 54.5132 189.166 54.4596 189.247C53.789 189.327 52.9575 189.489 53.1989 190.269C54.2182 191.319 52.0186 189.785 52.7161 190.619C52.6088 190.538 52.4478 190.404 52.3673 190.323C52.5819 190.888 52.6624 191.157 53.1721 191.911C52.0186 191.13 53.0648 192.126 52.4746 191.696L52.9306 192.019C52.5819 191.911 52.3942 191.992 52.0723 191.749L52.5819 192.261L52.0723 191.965C51.9113 192.126 52.0723 192.745 51.0261 192.207C51.4822 193.122 50.8116 193.66 50.2751 194.091C50.6238 194.414 50.5701 194.602 50.5165 194.764L49.8459 194.521C49.9532 194.764 50.597 195.383 50.141 195.248C50.0605 195.194 50.0337 195.167 50.0068 195.14C50.0337 195.356 49.6581 195.275 50.1141 195.732C49.98 195.84 49.6045 195.786 49.068 195.383C50.0337 196.028 48.7461 195.598 48.7461 195.598C48.7461 195.598 48.3169 195.948 47.7268 196.567C47.1367 197.159 46.3856 198.02 45.7418 199.043C45.42 199.554 45.1517 200.119 44.9371 200.684C44.7225 201.249 44.5616 201.868 44.508 202.487C44.4007 203.752 44.7225 205.071 45.715 206.39C46.1442 206.766 46.332 207.143 46.9489 207.466C47.0294 207.708 46.171 207.197 46.627 207.547C47.0562 207.601 47.8073 208.435 48.5047 208.677L48.5584 208.866C48.8802 209.108 48.2901 208.462 48.8534 208.892L47.9951 208.247C48.1828 208.247 48.3974 208.327 48.7193 208.516C48.4242 208.193 47.2708 207.332 47.9146 207.493L47.9414 207.574C48.0219 207.385 48.5852 207.87 48.7461 207.924L48.7193 207.951L49.2558 208.112C48.8802 208.004 49.4972 208.677 49.4972 208.543C49.8727 208.516 49.2558 208.435 49.229 208.22C49.2558 208.112 49.685 208.435 49.9532 208.65L50.0337 208.462C50.436 208.758 49.9264 208.543 50.4092 208.785L50.1141 208.273C51.1871 208.946 49.7654 207.708 50.8116 208.3C50.9457 208.623 51.1603 208.516 51.4822 208.785L51.6699 208.381C51.8309 208.435 51.9382 208.704 51.9113 208.596C52.2332 208.731 51.7236 208.327 51.7772 208.273C52.0723 208.435 51.9382 208.004 52.6356 208.489C53.2525 208.57 51.8309 207.789 52.3673 207.843C52.7965 208.085 52.3405 208.085 52.8502 208.273V207.924C53.0379 208.085 53.4939 208.435 53.3598 208.462C54.3255 208.22 56.7665 209.35 56.6055 208.381C57.1688 208.623 56.9006 208.677 57.1956 208.946C56.8201 208.085 58.6709 209.081 58.8587 208.677L58.4564 208.408C60.0658 208.758 59.7171 207.654 60.6291 207.439L60.3072 207.305C59.9585 206.955 60.0121 206.82 59.878 206.578C60.0926 206.713 60.7096 207.224 60.6559 206.955C60.495 206.901 60.2804 206.847 60.0926 206.713C61.4875 206.928 61.9166 205.717 62.9628 205.259C63.3383 203.968 64.9209 203.295 65.3769 202.057C65.2964 202.245 64.3308 201.519 64.6258 201.545C66.584 202.326 64.7063 200.765 66.128 201.196C65.967 200.2 67.8447 200.603 66.879 199.177L67.3887 199.473C67.6569 199.527 67.3351 199.285 67.3619 199.177L67.496 199.258C67.8179 199.15 67.496 198.585 67.7911 198.612L67.2278 198.262C67.2546 198.101 67.7106 198.477 67.4692 198.128L67.7374 198.316L67.3082 197.832C68.2739 198.451 67.6301 197.509 68.1129 197.697C68.0325 197.428 67.8179 196.836 68.1666 196.701C68.7031 196.97 68.8908 196.647 69.2664 196.62C69.3737 196.163 69.5614 195.49 70.0443 195.113L69.4005 194.737L69.4273 194.575C69.5614 194.656 69.6419 194.683 69.6955 194.764C70.4734 195.113 69.6687 194.333 70.1784 194.494C69.5614 194.198 70.0443 194.521 69.9638 194.602C69.5882 194.521 69.0518 194.037 69.4541 194.091L69.5883 194.171L69.32 193.875C69.8297 194.171 70.0979 194.225 70.6076 194.521C70.7417 194.037 70.0711 193.203 70.5807 192.907C71.1172 193.283 70.6344 192.503 71.5464 193.176C71.3318 192.691 70.7417 192.745 70.1247 192.207C70.1784 192.153 69.9638 191.911 70.3393 192.099C70.5539 192.288 70.9563 192.395 71.0099 192.53L71.0367 192.315C71.1172 192.341 71.2245 192.476 71.2782 192.53C70.9294 191.83 72.2975 192.288 71.9219 191.615C71.6 191.373 71.7342 191.669 71.4123 191.453C70.9026 190.7 72.217 191.561 71.8951 190.942L72.3511 191.292C72.0829 190.996 71.6805 190.7 72.1633 190.781C72.7535 191.104 72.5389 191.211 72.7535 191.453C72.8339 191.346 72.8608 190.996 72.2975 190.754C72.1902 190.511 72.7266 190.781 72.9144 190.807C72.7803 190.727 72.4584 190.7 72.2438 190.458C72.673 190.485 72.8339 190.188 73.0217 190C73.1558 190.081 73.3704 190.215 73.4509 190.269C72.6193 189.596 73.8801 190.377 73.8801 190.054Z" fill="#FF7800"/>
            <path d="M77.9564 176.517L77.8223 176.544C77.9564 176.625 78.0905 176.705 78.1978 176.84L77.9564 176.517Z" fill="#FF7800"/>
            <path d="M75.0879 180.554C75.1147 180.581 75.1684 180.634 75.222 180.688C75.222 180.634 75.1684 180.581 75.0879 180.554Z" fill="#FF7800"/>
            <path d="M75.4897 182.168C75.4093 182.034 75.2215 182.007 75.0605 181.953C75.1678 182.007 75.302 182.088 75.4897 182.168Z" fill="#FF7800"/>
            <path d="M77.8223 173.234C77.8759 173.288 77.9296 173.342 78.0637 173.395C77.9564 173.315 77.8759 173.288 77.8223 173.234Z" fill="#FF7800"/>
            <path d="M80.9082 166.667C80.9082 166.694 80.9082 166.721 80.935 166.802C81.0155 166.775 80.9619 166.721 80.9082 166.667Z" fill="#FF7800"/>
            <path d="M77.0996 174.983C77.0996 175.01 77.1264 175.064 77.2337 175.171C77.2337 175.091 77.1801 175.037 77.0996 174.983Z" fill="#FF7800"/>
            <path d="M81.0428 166.937L80.9355 166.99C80.9624 167.017 80.9892 167.017 81.0428 167.044V166.937Z" fill="#FF7800"/>
            <path d="M82.1693 166.721C82.1425 166.748 82.1156 166.802 82.0352 166.802C82.2229 166.856 82.2497 166.802 82.1693 166.721Z" fill="#FF7800"/>
            <path d="M78.4941 170.381C78.6819 170.597 78.6283 170.516 78.4941 170.381Z" fill="#FF7800"/>
            <path d="M81.7925 167.905H81.7656L81.8997 168.013L81.7925 167.905Z" fill="#FF7800"/>
            <path d="M82.625 166.452C82.625 166.479 82.6518 166.506 82.7055 166.56C82.7323 166.56 82.7591 166.56 82.8128 166.533C82.7323 166.506 82.6786 166.479 82.625 166.452Z" fill="#FF7800"/>
            <path d="M80.1572 169.493C79.9694 169.331 79.8085 169.251 79.7012 169.197C79.7012 169.224 79.8085 169.304 80.1572 169.493Z" fill="#FF7800"/>
            <path d="M52.3944 132.274C52.3676 132.193 52.3408 132.112 52.2871 132.004C52.3139 132.112 52.3676 132.193 52.3944 132.274Z" fill="#FF7800"/>
            <path d="M47.5679 132.623L47.5411 132.462C47.5142 132.489 47.5142 132.543 47.5679 132.623Z" fill="#FF7800"/>
            <path d="M55.1855 131.896C55.1855 131.923 55.2124 131.95 55.2124 131.977C55.266 131.977 55.3197 131.977 55.4001 131.95L55.1855 131.896Z" fill="#FF7800"/>
            <path d="M38.2852 135.53L38.3388 135.503C38.312 135.503 38.2852 135.503 38.2852 135.53Z" fill="#FF7800"/>
            <path d="M43.8379 133.888C43.8915 133.996 43.8915 134.05 43.8647 134.103C43.9184 134.103 43.9184 134.077 43.8379 133.888Z" fill="#FF7800"/>
            <path d="M58.8337 137.387L58.6191 137.01C58.6996 137.171 58.7801 137.36 58.8337 137.387Z" fill="#FF7800"/>
            <path d="M59.0483 133.619C59.0483 133.673 59.0215 133.754 59.0215 133.834C59.0751 133.808 59.102 133.781 59.0483 133.619Z" fill="#FF7800"/>
            <path d="M12.1856 157.329C12.1052 157.356 12.2661 157.652 12.4002 157.921L12.1856 157.329Z" fill="#FF7800"/>
            <path d="M30.9906 139.997L30.9102 139.836C30.937 139.917 30.9638 139.971 30.9906 139.997Z" fill="#FF7800"/>
            <path d="M14.5467 160.289L14.4395 160.262C14.4931 160.316 14.5199 160.316 14.5467 160.289Z" fill="#FF7800"/>
            <path d="M58.1621 138.921C58.2694 139.351 57.9475 138.921 58.1085 139.298C58.1621 139.217 58.3767 139.459 58.1621 138.921Z" fill="#FF7800"/>
            <path d="M38.6616 154.288L38.6348 154.341C38.6616 154.341 38.6616 154.315 38.6616 154.288Z" fill="#FF7800"/>
            <path d="M14.5478 160.289L14.6551 160.316C14.6014 160.262 14.5478 160.208 14.4941 160.154C14.521 160.235 14.5478 160.289 14.5478 160.289Z" fill="#FF7800"/>
            <path d="M23.6674 145.003C23.6674 144.976 23.6406 144.949 23.6406 144.922L23.6674 145.003Z" fill="#FF7800"/>
            <path d="M22.8887 144.707C22.8887 144.653 22.8887 144.599 22.8887 144.545C22.8082 144.545 22.835 144.626 22.8887 144.707Z" fill="#FF7800"/>
            <path d="M12.4004 157.921L12.5345 158.244C12.5345 158.19 12.4809 158.055 12.4004 157.921Z" fill="#FF7800"/>
            <path d="M19.2135 148.259C19.2135 148.233 19.2135 148.206 19.2135 148.179C19.1867 148.206 19.1867 148.233 19.2135 148.259Z" fill="#FF7800"/>
            <path d="M44.2676 133.915C44.2944 133.942 44.3212 133.942 44.3481 133.969C44.3212 133.888 44.2676 133.834 44.2676 133.915Z" fill="#FF7800"/>
            <path d="M47.0028 144.895C46.8955 144.841 47.0028 145.137 47.1369 145.433C47.1637 145.406 47.1637 145.326 47.0028 144.895Z" fill="#FF7800"/>
            <path d="M46.6816 145.46C46.7085 145.46 46.7085 145.487 46.7353 145.487C46.7085 145.46 46.6816 145.46 46.6816 145.46Z" fill="#FF7800"/>
            <path d="M50.1425 144.384L50.1152 144.357C50.1152 144.357 50.1152 144.384 50.1425 144.384Z" fill="#FF7800"/>
            <path d="M49.5794 144.815C49.5258 144.761 49.4721 144.707 49.4453 144.68C49.4721 144.734 49.5258 144.788 49.5794 144.815Z" fill="#FF7800"/>
            <path d="M42.0681 153.588C42.4704 153.023 42.685 151.812 43.3825 151.677C43.0069 150.87 43.1679 150.735 43.2483 150.439L43.8921 151.408L43.8385 151.004C44.0799 151.273 43.8385 151.247 44.1872 151.569L43.8385 150.924C44.0799 151.273 44.3481 150.924 44.5627 151.785L45.126 151.435C45.2601 151.381 44.67 150.574 44.9651 150.735C45.1797 151.004 45.0455 150.977 45.2869 151.3C46.1721 151.758 44.5359 149.094 45.2065 149.282L45.2601 149.443C45.1528 149.147 45.3138 149.094 45.2065 148.959C44.5359 147.99 45.4747 149.551 44.9919 149.04C44.4822 148.205 44.8578 148.502 44.4554 147.856C44.7505 148.098 44.4822 147.586 44.5359 147.479C44.9919 147.909 44.9651 147.425 45.4747 148.017C45.3674 147.721 44.9382 146.833 45.0455 146.725C45.5552 147.317 45.4211 147.371 45.7161 147.533L45.4211 147.021C45.582 147.021 45.6625 147.183 45.7966 147.398C45.9307 147.344 45.4747 146.671 45.8234 146.887L46.038 147.425C46.038 147.156 46.1453 147.21 46.3063 147.156C46.4672 147.452 46.4135 147.452 46.3063 147.398C46.8427 148.071 46.2526 146.994 46.3599 147.048C46.2258 146.833 46.038 146.806 45.7966 146.295C45.9307 146.349 45.5552 145.514 45.9575 146.079L46.1721 146.618C46.0917 146.133 45.8771 145.945 46.199 146.026C46.199 146.079 46.2794 146.187 46.3599 146.295C46.0917 145.595 46.6013 146.079 46.8159 145.999L46.8696 146.16C46.8427 145.945 46.6013 145.487 46.6818 145.487C46.4135 145.272 46.3599 145.111 46.0648 144.626C46.6818 145.353 45.6893 143.55 46.2258 143.9C46.3867 144.196 46.5477 144.545 46.3063 144.303C46.7354 145.191 47.1646 145.891 47.2451 146.375C47.2183 146.133 47.2451 145.945 47.4329 146.322L46.9768 145.541C47.0037 145.487 47.0841 145.514 47.111 145.487C46.8427 144.976 46.5208 144.734 46.4404 144.357C46.4135 144.034 47.0037 145.111 46.7891 144.761C46.7891 144.33 46.3599 143.873 46.6818 144.034C46.7086 144.115 46.7623 144.276 46.6818 144.196C47.0037 144.438 46.8964 143.873 47.5133 144.788C47.6206 145.003 47.7816 145.299 47.7011 145.245L47.6206 145.111C47.8889 145.864 47.6206 144.868 48.0766 145.73C47.7547 145.218 48.023 145.245 48.1571 145.299L47.7816 144.734C47.0305 142.85 48.4522 145.891 48.5595 145.514C48.5058 145.03 48.3985 145.38 48.2644 144.922C48.4253 144.949 48.774 145.434 48.8009 145.111C48.9886 145.326 49.2569 145.568 49.6324 146.214C49.5788 145.891 50.0884 146.322 49.7934 145.676C49.3105 145.218 50.0079 146.456 49.3373 145.73L49.0155 145.057C49.1764 145.003 49.1764 144.599 49.391 144.761C49.3105 144.653 49.2032 144.492 49.1228 144.357C49.1764 144.007 48.8813 143.334 49.1764 143.415C49.5251 143.98 49.3642 143.953 49.3105 144.034C49.7129 144.438 49.4715 144.007 49.7665 144.061C50.0616 144.572 49.6324 144.115 49.8738 144.626L49.9811 144.357C50.0079 144.384 50.0079 144.411 50.0348 144.465C49.5788 143.603 50.2494 144.438 50.2225 144.115C50.5444 143.953 49.9275 142.769 49.7129 141.989C49.9006 142.204 50.0348 142.392 50.1152 142.635C49.8202 142.312 50.0079 142.581 50.1152 142.823C50.1689 142.688 50.8127 143.523 50.9468 143.9C50.9736 143.55 50.6249 143.496 50.5981 143.173L50.8663 143.092C50.5981 142.662 50.4639 142.608 50.3835 142.231C50.4103 142.043 50.5176 142.123 50.6517 142.069C50.759 142.285 51.0541 142.715 50.9468 142.742C51.1077 142.877 51.215 142.85 51.0004 142.392C50.6249 142.069 51.0272 141.881 50.5444 141.262L50.92 141.585C50.8931 141.585 51.0272 141.881 50.9468 141.827C51.3491 142.473 50.9468 141.585 50.9736 141.477C51.1077 141.585 51.2687 141.558 51.4028 141.827C51.3491 141.612 51.5369 141.693 51.7515 142.043C51.7515 141.881 51.5101 141.612 51.4296 141.37L51.6978 141.289C51.9124 141.666 52.4757 142.662 52.5294 142.823C52.4221 142.446 51.9661 141.72 52.127 141.693C52.4489 142.446 52.6099 142.15 52.9586 143.065C53.3073 143.55 53.5219 143.415 53.5219 143.173C53.2805 142.554 53.2268 142.904 52.9049 142.339C53.1195 141.962 52.288 140.32 52.6903 140.482L52.5294 140.347C52.5026 139.943 52.5294 140.024 52.3684 139.486C52.7172 140.239 53.5755 141.343 53.7365 141.074C53.5755 140.697 53.2268 140.455 52.9586 139.863L53.0659 139.674C53.1195 139.728 53.1463 139.863 53.1732 139.97C53.2 139.62 53.9511 140.778 53.5487 139.89L54.2461 140.885L53.9511 140.455C53.7901 140.078 53.8974 139.89 53.8706 139.728C53.8438 139.244 54.0583 139.513 54.3802 139.943C54.1925 139.647 53.7633 139.001 53.8438 138.813C54.4339 139.997 54.3534 139.109 54.6485 139.728C54.7021 139.674 54.9704 139.997 54.7289 139.513L55.0777 140.266C54.568 139.217 54.8094 139.163 54.8631 138.921C55.5337 140.347 54.9704 138.732 55.6678 139.97C55.2386 139.001 55.7482 139.459 55.3727 138.625C55.48 138.517 55.8824 139.432 56.0701 139.728L55.9628 139.351C56.2311 139.782 56.4725 139.728 56.7676 139.997L56.4993 139.082L56.7139 139.459C56.6334 139.244 56.6603 139.055 56.4725 138.759L56.553 138.786C56.1238 137.844 56.5261 138.49 56.4725 138.033C56.5798 138.167 56.6603 138.409 56.6871 138.544C56.7676 138.517 56.9553 139.028 57.1163 139.324C56.9553 139.109 56.5798 137.548 56.2311 137.198C56.0433 136.822 56.0165 136.499 56.1774 136.633L56.6066 137.467L56.2847 136.552C56.3384 136.391 56.6066 136.902 56.7407 136.956C56.6871 137.037 57.2772 138.652 57.465 138.544C57.4113 138.705 57.5454 139.19 57.5723 139.405C57.6259 139.432 57.6796 139.486 57.7869 139.89C57.8405 139.567 57.5991 139.351 57.7332 139.163C58.0551 139.917 58.216 140.159 58.4575 140.347L58.1087 139.836C58.0819 139.728 58.0551 139.674 58.0283 139.62C57.9478 139.567 57.8942 139.432 57.76 139.163C57.7869 139.163 57.5454 138.14 57.76 138.598C57.0894 137.494 57.6527 137.548 57.2504 136.902C57.1699 136.66 57.2772 136.579 57.4382 136.956C57.5454 137.602 57.8942 137.79 58.1087 138.329C58.0551 138.086 57.76 137.817 57.7064 137.494C57.76 137.414 58.0283 137.844 58.1624 138.086L58.1892 138.248L58.4575 138.544C58.3233 138.167 58.0819 137.952 58.1087 137.71C58.216 137.844 58.2429 137.602 58.3502 137.925C58.5111 138.463 58.833 139.163 58.7793 139.324C58.833 139.244 59.0476 139.055 58.6452 138.383H58.7525C58.5648 138.086 58.1624 137.548 58.3233 137.387L58.377 137.548L58.2965 136.902L58.5111 137.279C58.4306 137.091 58.377 136.902 58.4306 136.902C58.5379 137.118 58.6184 137.198 58.7257 137.521C58.8598 137.441 58.6989 137.037 58.6184 136.822C58.672 136.741 58.7525 136.902 58.8866 137.36C59.0208 137.414 59.1817 137.252 59.3695 137.656C59.3695 137.252 59.289 137.494 59.1817 136.929C59.745 138.275 59.745 137.333 59.7718 137.145C59.6377 136.526 59.6377 136.499 59.6377 136.472C59.6377 136.445 59.6645 136.445 59.5572 135.88C59.5572 135.987 59.5841 136.095 59.6109 136.203C59.6109 136.256 59.6377 136.31 59.6377 136.364V136.391V136.31C59.6377 136.256 59.6377 136.23 59.6109 136.176C59.5841 136.068 59.5841 135.987 59.5841 135.934C59.6109 136.041 59.6109 136.203 59.6914 136.633C59.6377 136.23 59.5841 135.853 59.5304 135.503C59.5036 135.153 59.5304 135.557 59.5841 135.987C59.6109 136.176 59.6377 136.364 59.6645 136.472C59.6645 136.552 59.6645 136.499 59.6109 136.176C59.5304 135.557 59.4768 135.072 59.4768 134.642C59.4768 134.238 59.5304 133.861 59.6377 133.727C59.6109 133.781 59.6645 133.7 59.6645 133.7H59.6377C59.6109 133.7 59.6109 133.7 59.6377 133.7C59.6645 133.7 59.6645 133.7 59.6645 133.7C59.6377 133.7 59.6109 133.754 59.5841 133.807C59.6109 133.781 59.6109 133.754 59.6109 133.727C59.6645 133.646 59.6645 133.673 59.6377 133.673C59.6109 133.673 59.5841 133.673 59.5841 133.673C59.5572 133.673 59.5304 133.673 59.5036 133.673C59.4231 133.646 59.3963 133.646 59.3963 133.646H59.3695C59.3426 133.619 59.2622 133.619 59.0744 133.511C58.833 133.377 58.6452 133.215 58.5111 133.135C58.377 133.027 58.2965 132.973 58.2429 132.919C58.216 132.892 58.1892 132.866 58.1624 132.839C58.0819 132.758 57.8673 132.596 57.6527 132.381C57.4113 132.166 57.1699 131.924 56.9821 131.735C57.1967 131.951 57.3577 132.112 57.5454 132.273C57.7064 132.435 57.8405 132.543 57.9478 132.65C58.0283 132.704 58.0819 132.758 58.1356 132.812C58.1624 132.839 58.1356 132.812 58.0551 132.731C57.921 132.623 57.7332 132.462 57.5186 132.247C57.304 132.031 57.0894 131.816 56.8212 131.574C56.848 131.601 56.8749 131.628 56.9017 131.681C56.9285 131.735 56.9821 131.762 57.009 131.816C57.1163 131.924 57.1967 132.031 57.2236 132.112C57.6259 132.462 57.6796 132.462 57.6796 132.462C57.6796 132.462 57.6796 132.462 57.7064 132.489C57.7332 132.516 57.76 132.543 57.8137 132.596C57.921 132.677 58.0283 132.785 58.1892 132.919C58.2697 132.973 58.3233 133.027 58.4038 133.108C58.4843 133.162 58.5648 133.242 58.6452 133.296C58.7257 133.35 58.8062 133.404 58.8866 133.458C58.9403 133.484 59.0208 133.538 59.1012 133.592C59.1549 133.619 59.2085 133.646 59.2622 133.673C59.3158 133.7 59.3963 133.727 59.4231 133.727C59.1012 133.619 59.4768 133.754 59.5036 133.727C59.4768 133.727 59.5572 133.727 59.5572 133.727C59.5572 133.727 59.4768 133.807 59.4499 133.888C59.4231 133.969 59.4499 133.888 59.4499 133.861C59.4499 133.861 59.4499 133.834 59.4499 133.888C59.4499 133.915 59.4231 133.942 59.4231 133.969C59.3963 134.023 59.3963 134.077 59.3963 134.184C59.3963 134.238 59.3963 134.292 59.3963 134.346C59.3695 134.534 59.3963 134.48 59.3963 134.507C59.3963 134.534 59.3963 134.561 59.3963 135.018C59.3963 134.965 59.3963 134.911 59.3963 134.884C59.3963 134.83 59.3963 134.803 59.3963 134.776C59.3963 134.642 59.3963 134.534 59.3963 134.453C59.3963 134.265 59.4231 134.13 59.4499 134.023C59.4768 133.754 59.3963 133.646 59.3426 133.673C59.289 133.673 59.2622 133.807 59.2353 133.969C59.2085 134.319 59.2353 134.83 59.2085 135.072C59.2085 134.992 59.1817 134.83 59.1817 134.749C59.2085 135.072 59.1549 135.072 59.1281 135.153C58.9671 134.911 59.0744 134.588 58.9939 134.265L58.8062 134.346C58.7793 134.319 58.7793 134.292 58.7793 134.265C58.7793 134.453 58.7525 134.561 58.6452 134.265C58.5916 133.861 58.5111 133.458 58.4843 133.135C58.4843 133.431 58.4843 133.727 58.4843 134.023C58.4038 133.619 58.1087 133.404 58.1892 133.081C58.0819 133.162 58.0015 133.269 57.8942 133.35L57.5991 132.569C57.5723 132.731 57.6259 132.892 57.7332 132.946C57.5454 132.812 57.7064 134.507 57.2236 132.919C57.1967 133.646 57.009 133.431 56.8748 133.942C56.8212 133.135 56.2579 133.135 56.3652 132.704C56.0701 132.435 56.392 133.269 56.3115 133.458C56.0701 133.162 55.8019 132.381 55.8287 132.058V132.462L55.7751 132.3L55.8287 132.785C55.5337 132.435 55.48 132.031 55.3191 131.977L55.5605 132.677L55.2922 132.327C55.4532 132.623 55.4264 132.785 55.3727 132.892L55.3191 132.731L55.2654 132.919C55.2118 132.462 55.1045 132.812 54.9435 132.3C54.8362 132.3 54.8362 132.327 54.7021 132.516L54.9435 132.973C54.8899 133.484 54.6216 132.3 54.4339 132.327L54.6753 132.866C54.0047 132.085 54.4607 133.565 54.0047 133.081C54.0583 132.919 53.7633 132.3 53.8169 132.462C53.7365 132.731 53.3877 132.704 53.5219 133.431C53.0927 132.704 52.9854 132.462 52.6367 132.22C52.5294 132.327 52.5562 132.408 52.7172 132.866C52.4489 132.623 52.4221 133.188 52.1539 132.623C52.3416 133.081 51.9929 132.596 52.1002 133L51.9661 132.785L52.2343 133.296C51.4296 132.247 52.1807 134.13 51.4564 133.215L51.4296 133.054V133.296C51.2955 133.081 51.2687 132.919 51.1345 132.623L50.6517 132.731L50.9468 133.081C50.8931 133.188 51.0809 133.7 50.8127 133.458C50.5981 132.596 50.6517 133.511 50.3298 132.919V132.677C50.2225 132.785 50.2225 132.785 50.4908 133.296C50.4103 133.565 49.8738 132.354 50.0079 133L50.1152 132.973C50.303 133.269 50.4371 133.727 50.3567 133.754C50.303 133.673 50.1421 133.484 50.1421 133.377C50.1152 133.646 49.7934 133.484 49.847 133.7C49.6861 133.565 49.5251 133.188 49.4983 133.027C49.4715 133.619 49.3105 133 49.2837 133.592L49.1228 133.296L49.2032 133.7L48.7472 133.162L48.9886 133.511C48.935 133.619 48.9886 133.834 48.774 133.727L48.5863 133.269C48.4522 133.646 47.9157 132.704 47.9962 133.431C47.9425 133.35 47.8889 133.215 47.8889 133.135C48.023 133.942 47.2987 132.462 47.5133 133.404C47.4597 133.242 47.3256 133.081 47.2719 132.946L47.3256 133.269L47.0305 132.677L47.406 133.592L47.0305 133.027L47.1378 133.323C46.4135 132.273 46.7354 133.188 46.1185 132.435L46.5477 133.162C47.0037 134.884 45.2333 132.785 45.1528 133.727L44.8309 133.135L45.0187 133.915C44.67 133.511 44.8041 133.377 44.6164 133.108C44.5895 133.538 45.0187 133.996 44.8846 134.292C44.5359 133.969 44.6968 133.834 44.6164 133.619C44.5627 134.023 44.4286 134.507 44.0799 134.292C44.1335 134.373 44.1603 134.48 44.1872 134.507C44.1872 134.857 43.8653 134.696 43.7312 134.83C43.5702 134.561 43.597 134.507 43.597 134.426C43.5166 134.426 43.3288 134.292 43.4361 134.588L43.2215 134.05C43.0337 134.023 43.0606 134.615 42.7119 134.05C42.846 134.265 43.0874 134.696 42.9801 134.722C42.4168 133.888 42.8996 135.261 42.4704 134.884C42.3631 134.669 42.4704 134.561 42.4168 134.561C42.2022 134.373 42.3631 134.83 42.4436 135.153L42.2559 134.776L42.1486 135.476C41.5853 134.642 41.8535 135.826 41.5048 135.18C41.3438 135.234 41.8535 135.503 41.7462 135.691C41.478 135.368 41.6926 135.96 41.3707 135.395L41.3438 135.315L41.2365 135.422L40.9951 134.83C40.9683 135.018 41.2097 135.611 41.478 136.041C41.1829 135.799 41.2097 136.122 40.861 135.637L40.8074 135.476C40.6732 135.853 39.4125 134.238 39.7612 135.315C39.7076 135.234 39.6271 135.099 39.6539 135.099L39.4662 135.18L39.2516 134.749L39.3589 135.557L39.1979 135.261C38.9297 135.261 38.7419 135.584 38.5542 135.826L38.5005 135.664C38.5005 136.256 38.0713 135.557 38.0713 135.987C38.0445 135.907 38.0177 135.88 38.0177 135.853L37.8567 135.96L37.7226 135.664C37.964 136.337 36.8643 135.099 37.2666 135.557C37.3471 135.88 37.4276 136.256 37.6422 136.633C37.4812 136.768 37.3739 136.31 37.1057 136.149C36.9447 136.203 37.2398 136.714 36.8911 136.579L36.7301 136.283C36.6765 136.391 36.757 136.633 36.6497 136.741L36.596 136.579C36.7838 137.279 35.8181 135.907 36.4619 137.225C36.2473 137.064 36.1937 137.333 35.845 136.768C35.845 137.279 35.7645 137.575 35.6572 137.952C35.0402 137.064 35.6304 138.033 35.1744 137.602L35.4962 138.086C35.2012 138.383 34.0209 137.414 33.7795 137.844L33.4576 137.36L33.7259 137.952C33.1626 137.979 32.5188 138.14 32.1969 138.356C32.2506 138.679 32.492 139.378 32.2237 139.298L32.1969 139.217C32.0896 139.701 31.9287 140.105 31.419 140.024C31.3117 139.809 31.1776 139.674 31.124 139.54C31.419 140.132 30.963 139.701 30.8825 139.728L31.2044 140.024C31.419 140.535 30.9898 140.186 30.7216 139.863L30.9362 140.482C30.8825 140.428 30.8289 140.374 30.7752 140.293L30.9362 140.562L30.4265 139.97C30.4802 140.132 30.3997 140.401 30.7484 141.047C30.5875 140.858 30.3461 140.778 30.3729 140.589L29.7291 140.751L29.9705 140.912C30.3192 141.397 30.3729 141.8 30.1315 141.639C29.9705 141.181 29.6755 140.939 29.3804 140.616C29.4877 140.912 29.7291 140.993 29.8901 141.289C30.0242 141.666 29.9437 141.962 29.7559 141.773L29.6755 141.558C29.6755 141.827 29.0585 141.02 28.9512 141.154C29.1122 141.612 28.7903 141.316 29.3804 142.123C29.3536 142.392 28.9244 141.612 28.8171 141.558C29.0317 141.989 28.6293 141.881 28.3074 141.504C29.0585 142.769 27.61 141.343 28.2806 142.392L27.7441 141.908C27.9319 142.177 28.3343 142.796 28.3074 142.984C28.0124 142.769 27.6905 142.258 27.4759 142.016L28.1197 143.065C26.8321 142.366 26.6175 143.603 25.3836 143.146C25.2764 143.55 25.2764 144.249 24.874 144.33L24.8203 144.169L24.3107 144.115L24.874 144.411C24.9008 144.572 24.9813 144.815 24.9008 144.841C24.257 144.68 23.4523 144.492 23.4255 145.299C23.9888 146.645 22.5135 144.411 22.8622 145.434C22.8086 145.326 22.7013 145.137 22.6208 145.03C22.6208 145.622 22.6208 145.918 22.8354 146.779C22.0307 145.622 22.6744 146.941 22.2721 146.322L22.594 146.806C22.3257 146.564 22.1111 146.591 21.8965 146.241L22.1916 146.914L21.8429 146.456C21.6551 146.537 21.6015 147.183 20.7968 146.295C20.9309 147.29 20.153 147.56 19.5361 147.748C19.7506 148.179 19.6433 148.313 19.5629 148.448L19.0264 147.99C19.0532 148.259 19.4556 149.04 19.08 148.771C19.0264 148.717 18.9996 148.663 18.9727 148.609C18.9459 148.824 18.5972 148.609 18.8923 149.201C18.7313 149.282 18.4094 149.067 18.0339 148.528C18.7313 149.443 17.6584 148.609 17.6584 148.609C17.6584 148.609 15.5929 149.309 13.8494 150.816C12.1058 152.323 10.6842 154.637 11.9181 157.679C12.24 158.163 12.3204 158.567 12.8033 159.024C12.8301 159.266 12.1327 158.54 12.4814 158.997C12.8837 159.159 13.3934 160.181 13.9835 160.585V160.773C14.2249 161.096 13.8226 160.316 14.2518 160.908L13.5812 160.074C13.7689 160.128 13.9299 160.262 14.1981 160.531C14.0103 160.154 13.1251 158.997 13.6884 159.347V159.428C13.7957 159.293 14.2249 159.885 14.359 159.993L14.3322 160.02L14.7882 160.343C14.4663 160.128 14.8955 160.935 14.9223 160.827C15.2711 160.935 14.7078 160.666 14.7614 160.451C14.7882 160.343 15.1369 160.8 15.3515 161.069L15.4588 160.935C15.7807 161.312 15.3515 160.989 15.7271 161.339L15.5661 160.8C16.3977 161.742 15.3784 160.181 16.2099 161.016C16.2635 161.339 16.4781 161.339 16.7195 161.662L16.961 161.366C17.0951 161.473 17.1219 161.742 17.1219 161.635C17.3901 161.85 17.0146 161.312 17.0683 161.312C17.3097 161.554 17.2828 161.123 17.7925 161.769C18.3558 162.038 17.2024 160.881 17.6852 161.096C18.0339 161.473 17.6047 161.312 18.0339 161.635L18.1144 161.339C18.2485 161.554 18.5972 162.011 18.4631 161.985C19.4019 162.065 21.3869 163.895 21.4405 162.98C21.8965 163.384 21.6551 163.33 21.8429 163.68C21.682 162.765 23.1573 164.299 23.3987 164.003L23.1036 163.599C24.4716 164.46 24.3912 163.357 25.2764 163.492L25.0081 163.276C24.7667 162.846 24.8472 162.738 24.7935 162.496C24.9545 162.684 25.3836 163.384 25.4105 163.115C25.2764 163.007 25.0886 162.9 24.9545 162.684C26.1615 163.384 26.8053 162.469 27.8514 162.442C28.522 161.446 30.0778 161.473 30.7752 160.558C30.6679 160.693 29.9974 159.67 30.2656 159.832C31.7946 161.285 30.5338 159.186 31.6873 160.101C31.7946 159.186 33.3503 160.289 32.8675 158.647L33.2162 159.105C33.4576 159.266 33.2162 158.917 33.2699 158.809L33.3772 158.943C33.699 158.997 33.5381 158.351 33.8332 158.513L33.4576 157.975C33.5381 157.84 33.8063 158.351 33.699 157.975L33.8868 158.244L33.6454 157.652C34.316 158.594 33.9941 157.517 34.3965 157.867C34.4233 157.598 34.3965 157.006 34.7183 157.033C35.0939 157.49 35.3621 157.302 35.7108 157.409C35.9522 157.06 36.301 156.575 36.8106 156.468L36.3814 155.849L36.4619 155.741C36.5424 155.875 36.6228 155.929 36.6497 156.01C37.213 156.656 36.757 155.633 37.1325 155.983C36.6765 155.472 36.9984 155.956 36.9179 155.983C36.6228 155.741 36.301 155.095 36.6228 155.31L36.7033 155.445L36.5692 155.068C36.9179 155.552 37.1325 155.714 37.4812 156.171C37.7494 155.822 37.4276 154.826 37.9372 154.799C38.2591 155.364 38.0982 154.476 38.6883 155.472C38.6615 154.96 38.125 154.745 37.7763 154.018C37.8567 153.992 37.7226 153.696 37.9909 154.018C38.125 154.261 38.42 154.557 38.4469 154.664L38.5542 154.503C38.6078 154.557 38.6883 154.718 38.6883 154.799C38.6078 154.045 39.6271 155.041 39.5198 154.315C39.3052 153.965 39.3589 154.288 39.1443 153.938C38.9565 153.077 39.7881 154.395 39.7076 153.722L39.9758 154.234C39.8417 153.857 39.6003 153.426 40.0027 153.722C40.405 154.261 40.1904 154.261 40.2977 154.557C40.405 154.53 40.5391 154.207 40.1368 153.749C40.1368 153.48 40.4855 153.965 40.6464 154.072C40.5659 153.938 40.2977 153.776 40.1904 153.48C40.5391 153.696 40.7805 153.534 40.9951 153.453C41.0756 153.588 41.2365 153.803 41.2634 153.857C41.1561 152.646 41.9876 153.884 42.0681 153.588Z" fill="#FF7800"/>
            <path d="M50.2494 144.438L50.1152 144.384C50.1957 144.518 50.2762 144.653 50.303 144.814L50.2494 144.438Z" fill="#FF7800"/>
            <path d="M46.3867 146.268C46.4135 146.321 46.4135 146.375 46.4404 146.429C46.4672 146.402 46.4135 146.321 46.3867 146.268Z" fill="#FF7800"/>
            <path d="M46.1193 147.802C46.1193 147.64 45.9583 147.533 45.8242 147.398C45.9047 147.506 45.9852 147.64 46.1193 147.802Z" fill="#FF7800"/>
            <path d="M51.4824 141.72C51.5092 141.774 51.5361 141.854 51.5897 141.989C51.5629 141.854 51.5361 141.774 51.4824 141.72Z" fill="#FF7800"/>
            <path d="M57.5458 139.19C57.519 139.163 57.519 139.136 57.4922 139.109C57.4922 139.136 57.519 139.163 57.5458 139.19Z" fill="#FF7800"/>
            <path d="M56.7944 138.382C56.7676 138.382 56.7676 138.409 56.7676 138.49C56.7944 138.517 56.7944 138.463 56.7944 138.382Z" fill="#FF7800"/>
            <path d="M50.1953 142.715C50.1953 142.742 50.1953 142.796 50.249 142.931C50.2758 142.904 50.2221 142.823 50.1953 142.715Z" fill="#FF7800"/>
            <path d="M56.7675 138.651L56.6602 138.625C56.687 138.651 56.687 138.705 56.7138 138.732L56.7675 138.651Z" fill="#FF7800"/>
            <path d="M57.679 139.217C57.6522 139.217 57.5986 139.217 57.5449 139.19C57.6522 139.325 57.679 139.324 57.679 139.217Z" fill="#FF7800"/>
            <path d="M53.2539 139.809C53.3076 140.105 53.3076 139.971 53.2539 139.809Z" fill="#FF7800"/>
            <path d="M58.1094 139.297C58.1094 139.324 58.1094 139.351 58.1094 139.432C58.1362 139.459 58.163 139.459 58.1898 139.486C58.163 139.405 58.1362 139.351 58.1094 139.297Z" fill="#FF7800"/>
            <path d="M54.9437 140.078C54.8633 139.836 54.7828 139.701 54.7291 139.566C54.7023 139.593 54.756 139.728 54.9437 140.078Z" fill="#FF7800"/>
            <path d="M38.2319 94.004C38.2319 93.9233 38.2319 93.8426 38.2051 93.708C38.2051 93.8157 38.2319 93.9233 38.2319 94.004Z" fill="#FF7800"/>
            <path d="M34.4492 92.3894L34.476 92.2549C34.4492 92.2549 34.4492 92.3087 34.4492 92.3894Z" fill="#FF7800"/>
            <path d="M40.459 94.6772C40.459 94.7042 40.459 94.7311 40.459 94.758C40.4858 94.758 40.5395 94.7849 40.6199 94.8118L40.459 94.6772Z" fill="#FF7800"/>
            <path d="M26.6172 91.017L26.6708 90.9901C26.644 90.9901 26.644 90.9632 26.6172 91.017Z" fill="#FF7800"/>
            <path d="M31.2573 91.9858C31.2573 92.1204 31.2305 92.1473 31.2305 92.2011C31.2573 92.2011 31.2841 92.1742 31.2573 91.9858Z" fill="#FF7800"/>
            <path d="M41.8793 101.082L41.7988 100.651C41.8257 100.813 41.8525 101.028 41.8793 101.082Z" fill="#FF7800"/>
            <path d="M43.0341 97.5029C43.0073 97.5298 43.0073 97.6106 42.9805 97.6913C43.0073 97.6913 43.0341 97.6913 43.0341 97.5029Z" fill="#FF7800"/>
            <path d="M42.9531 97.8259C42.9531 97.799 42.9799 97.7452 42.9799 97.7183C42.9799 97.7183 42.9531 97.7452 42.9531 97.8259Z" fill="#FF7800"/>
            <path d="M0.732169 94.7037C0.678521 94.6768 0.59805 94.9998 0.517578 95.2689L0.732169 94.7037Z" fill="#FF7800"/>
            <path d="M19.8576 91.5014V91.313C19.8308 91.3668 19.8576 91.4476 19.8576 91.5014Z" fill="#FF7800"/>
            <path d="M0.24948 98.4718L0.222656 98.3911C0.222656 98.4449 0.24948 98.4718 0.24948 98.4718Z" fill="#FF7800"/>
            <path d="M40.8612 102.293C40.8344 102.724 40.6734 102.212 40.7003 102.643C40.7539 102.562 40.8612 102.885 40.8612 102.293Z" fill="#FF7800"/>
            <path d="M20.0448 107.703L20.0176 107.73C20.0448 107.73 20.0448 107.73 20.0448 107.703Z" fill="#FF7800"/>
            <path d="M0.25 98.4714L0.276824 98.5791C0.276824 98.4983 0.276824 98.4445 0.276824 98.3638C0.276824 98.4176 0.276824 98.4714 0.25 98.4714Z" fill="#FF7800"/>
            <path d="M12.5352 91.286C12.562 91.2321 12.5888 91.2052 12.5888 91.1514C12.562 91.0976 12.562 91.1783 12.5352 91.286Z" fill="#FF7800"/>
            <path d="M0.516932 95.269L0.382812 95.592C0.43646 95.5651 0.490108 95.4305 0.516932 95.269Z" fill="#FF7800"/>
            <path d="M8.7793 92.1471C8.7793 92.1471 8.80612 92.1202 8.80612 92.0933C8.7793 92.0933 8.7793 92.1202 8.7793 92.1471Z" fill="#FF7800"/>
            <path d="M31.5801 92.201C31.6069 92.2279 31.6069 92.2548 31.6337 92.2817C31.6337 92.1741 31.6069 92.1202 31.5801 92.201Z" fill="#FF7800"/>
            <path d="M30.0766 103.262C30.0229 103.181 29.9961 103.477 29.9961 103.8C30.0229 103.8 30.0497 103.719 30.0766 103.262Z" fill="#FF7800"/>
            <path d="M29.6484 103.639C29.6484 103.666 29.6753 103.666 29.6753 103.692C29.6484 103.639 29.6484 103.639 29.6484 103.639Z" fill="#FF7800"/>
            <path d="M32.1161 104.285C32.0893 104.204 32.0893 104.15 32.0625 104.096C32.0893 104.177 32.0893 104.258 32.1161 104.285Z" fill="#FF7800"/>
            <path d="M28.3075 104.985C28.2803 104.985 28.2803 104.957 28.3075 104.985C28.2803 104.985 28.2803 104.985 28.3075 104.985Z" fill="#FF7800"/>
            <path d="M22.9959 108.752C23.5324 108.429 24.1762 107.487 24.7663 107.676C24.7931 106.787 24.9809 106.734 25.115 106.518L25.2491 107.676L25.3564 107.299C25.4637 107.649 25.276 107.541 25.4101 107.945L25.3833 107.218C25.4369 107.622 25.7856 107.46 25.6247 108.321L26.2148 108.268C26.3489 108.295 26.188 107.299 26.3489 107.568C26.4026 107.918 26.3221 107.81 26.3757 108.214C26.8854 109.021 26.6172 105.899 27.0732 106.384L27.0463 106.545C27.0732 106.222 27.2073 106.249 27.2073 106.088C27.0195 104.931 27.2073 106.734 27.0195 106.061C26.9122 105.065 27.1 105.523 27.0195 104.769C27.1536 105.119 27.1536 104.554 27.2073 104.473C27.4219 105.065 27.556 104.608 27.7438 105.388C27.7706 105.065 27.7438 104.096 27.8779 104.042C28.0656 104.796 27.9315 104.796 28.1193 105.065L28.0925 104.5C28.2266 104.581 28.2266 104.742 28.2534 105.011C28.3875 105.011 28.2802 104.204 28.468 104.554L28.4412 105.119C28.5216 104.877 28.6021 104.984 28.7631 105.011C28.7899 105.334 28.7362 105.334 28.6826 105.227C28.8704 106.061 28.7899 104.85 28.8435 104.931C28.7899 104.688 28.6826 104.581 28.6826 104.016C28.7631 104.123 28.7631 103.208 28.8972 103.881L28.8704 104.446C28.9776 103.989 28.8704 103.72 29.0849 103.935C29.0849 103.989 29.1118 104.123 29.1118 104.231C29.1386 103.477 29.38 104.123 29.5678 104.177L29.5409 104.338C29.5946 104.15 29.5678 103.612 29.6214 103.666C29.4873 103.343 29.4873 103.181 29.4337 102.616C29.6751 103.558 29.5141 101.513 29.8092 102.024C29.836 102.347 29.836 102.751 29.7287 102.401C29.7555 103.37 29.836 104.204 29.7555 104.661C29.8092 104.419 29.8897 104.285 29.9165 104.688L29.836 103.773C29.8897 103.746 29.9165 103.8 29.9701 103.8C29.9433 103.235 29.7555 102.885 29.836 102.482C29.9433 102.186 29.997 103.397 29.9701 102.993C30.1042 102.616 29.9433 102.024 30.1579 102.293C30.1579 102.374 30.1311 102.535 30.1042 102.455C30.2652 102.804 30.3993 102.266 30.5334 103.343C30.5334 103.585 30.5603 103.908 30.5066 103.827L30.4798 103.666C30.4261 104.473 30.5603 103.45 30.6407 104.419C30.5603 103.827 30.748 103.962 30.8553 104.042L30.748 103.37C30.8017 101.351 30.8821 104.688 31.0967 104.392C31.204 103.935 31.0163 104.204 31.0699 103.746C31.204 103.854 31.2845 104.446 31.4186 104.123C31.4991 104.392 31.6332 104.715 31.7137 105.469C31.7673 105.146 32.0356 105.765 32.0356 105.038C31.7942 104.419 31.9551 105.846 31.66 104.877L31.6332 104.15C31.7673 104.177 31.9014 103.8 32.0356 104.042C32.0087 103.908 31.9819 103.719 31.9819 103.558C32.1429 103.262 32.116 102.535 32.3306 102.724C32.4111 103.397 32.3038 103.289 32.2233 103.343C32.4111 103.854 32.3575 103.37 32.572 103.558C32.6525 104.15 32.4379 103.531 32.4916 104.096L32.6793 103.881C32.6793 103.908 32.6793 103.962 32.6793 103.989C32.5989 103.02 32.8403 104.069 32.9476 103.746C33.2426 103.72 33.1622 102.401 33.2426 101.62C33.3231 101.889 33.3499 102.132 33.3499 102.374C33.2426 101.943 33.2695 102.293 33.2695 102.535C33.3499 102.428 33.5914 103.477 33.5645 103.881C33.6986 103.585 33.4572 103.37 33.5109 103.074L33.7255 103.127C33.645 102.643 33.5645 102.535 33.645 102.132C33.7255 101.997 33.7791 102.078 33.9132 102.105C33.9132 102.347 34.0205 102.858 33.9401 102.831C34.0205 103.02 34.1278 103.02 34.101 102.535C33.9132 102.105 34.2888 102.078 34.101 101.324L34.2888 101.755C34.2619 101.755 34.2888 102.078 34.2351 101.997C34.3424 102.751 34.3156 101.782 34.3692 101.701C34.4229 101.836 34.557 101.889 34.6107 102.186C34.6375 101.97 34.7448 102.132 34.8253 102.508C34.8789 102.347 34.7716 102.024 34.7716 101.755L34.9862 101.809C35.0398 102.239 35.174 103.397 35.1471 103.558C35.2008 103.154 35.0667 102.32 35.2008 102.347C35.2008 103.154 35.4154 102.966 35.4154 103.935C35.5495 104.527 35.7373 104.473 35.8446 104.258C35.8446 103.612 35.6836 103.908 35.63 103.235C35.925 102.966 35.7641 101.163 36.0323 101.459L35.9519 101.27C36.0591 100.894 36.0591 100.974 36.086 100.409C36.1128 101.217 36.4347 102.589 36.6761 102.401C36.6493 101.997 36.4615 101.62 36.4615 100.974L36.6224 100.84C36.6493 100.894 36.6224 101.055 36.6224 101.136C36.7297 100.84 36.9712 102.186 36.9443 101.217L37.1858 102.401L37.0785 101.889C37.0516 101.486 37.2126 101.351 37.2394 101.19C37.3735 100.732 37.454 101.082 37.5881 101.593C37.5345 101.27 37.4003 100.49 37.5076 100.355C37.6149 101.674 37.8027 100.84 37.8563 101.513C37.91 101.486 38.0173 101.889 37.9905 101.351L38.0441 102.186C37.9636 101.028 38.1514 101.082 38.2855 100.867C38.366 102.428 38.4465 100.732 38.6074 102.159C38.5538 101.082 38.822 101.728 38.7952 100.813C38.9025 100.759 38.9561 101.755 39.0098 102.078L39.0366 101.674C39.1171 102.159 39.3317 102.239 39.4926 102.562L39.5462 101.62L39.6267 102.051C39.6267 101.809 39.7072 101.674 39.6267 101.324L39.6804 101.378C39.6267 100.355 39.7608 101.082 39.8413 100.652C39.8681 100.813 39.895 101.055 39.8681 101.19C39.9218 101.19 39.9486 101.728 40.0023 102.078C39.9486 101.809 40.1096 100.221 39.9218 99.7634C39.895 99.3328 39.9754 99.0368 40.0291 99.2252L40.1364 100.14V99.1713C40.2168 99.0368 40.2973 99.6288 40.3778 99.7096C40.2973 99.7634 40.3241 101.486 40.5119 101.459C40.4046 101.593 40.4046 102.105 40.351 102.293C40.4046 102.32 40.4314 102.428 40.3778 102.804C40.5119 102.508 40.4046 102.239 40.5387 102.105C40.5656 102.939 40.646 103.181 40.7801 103.477L40.646 102.885C40.646 102.778 40.646 102.724 40.646 102.67C40.5924 102.589 40.5924 102.455 40.5656 102.132C40.5924 102.132 40.6729 101.109 40.7265 101.593C40.4851 100.302 40.9411 100.598 40.807 99.8172C40.807 99.575 40.9143 99.5212 40.9411 99.9249C40.8338 100.544 41.102 100.867 41.102 101.432C41.1289 101.19 40.9679 100.813 41.0216 100.517C41.102 100.463 41.1825 100.974 41.2362 101.217L41.2093 101.378L41.3434 101.755C41.3434 101.351 41.1825 101.055 41.2898 100.84C41.3166 101.001 41.4239 100.786 41.4507 101.109C41.4239 101.674 41.5044 102.428 41.4239 102.589C41.5044 102.535 41.7458 102.428 41.6117 101.647L41.6922 101.674C41.6117 101.324 41.4239 100.705 41.6117 100.598V100.759L41.719 100.14L41.7995 100.571C41.7995 100.355 41.7995 100.167 41.8531 100.167C41.8799 100.409 41.9336 100.517 41.9336 100.84C42.0677 100.786 42.0409 100.382 42.0409 100.14C42.1213 100.086 42.1482 100.248 42.1482 100.732C42.2555 100.84 42.4432 100.732 42.5237 101.163C42.6578 100.786 42.4969 101.001 42.5505 100.436C42.7115 101.889 43.0333 101.001 43.2479 100.813C43.1675 99.5481 43.3016 100.678 43.3284 99.5212C43.2748 99.9249 43.5698 100.49 43.3821 100.867L43.4894 100.732C43.5698 101.432 43.3016 101.244 43.4357 102.212C43.5698 102.159 43.6235 100.786 43.8112 101.244C43.7576 102.132 43.9185 100.948 43.8917 101.943C43.8649 102.266 43.8112 102.159 43.7844 102.239L43.8112 102.401C44.1063 102.643 43.8917 101.351 44.0258 100.732C44.2136 100.625 44.1599 101.432 44.1868 101.863C44.2136 102.024 44.2941 101.889 44.3477 101.674C44.2404 102.212 44.1331 101.109 44.1868 100.544C44.2672 101.567 44.455 100.625 44.5087 100.221C44.2404 99.1444 44.3209 100.167 44.0795 99.0099C44.0527 99.3328 44.0527 100.248 43.9185 99.8711C43.999 99.4136 43.9185 99.3597 43.8917 99.2252C43.9185 99.7634 43.7844 99.4405 43.7576 99.6558C43.7039 99.2252 43.8381 98.4447 43.6771 98.2294V99.4674C43.6235 99.279 43.7039 98.5524 43.5698 98.8484C43.6235 98.2025 43.543 97.8526 43.7039 97.6373C43.4894 96.5878 43.3821 98.2025 43.2479 98.66C43.2748 98.5793 43.2748 98.4178 43.2748 98.3371C43.2479 98.66 43.1943 98.6331 43.1406 98.7138C43.0333 98.4447 43.2211 98.1487 43.1675 97.8257L42.9797 97.8526C42.9797 97.7988 42.9797 97.7988 42.9797 97.7719C42.9261 97.9334 42.8992 98.041 42.8724 97.745C42.9261 97.3413 42.9261 96.9376 42.9529 96.6147L42.7919 97.4759C42.7919 97.0722 42.6042 96.7762 42.7383 96.4801L42.47 96.6685L42.4164 95.8342C42.3628 95.9957 42.3628 96.1572 42.4432 96.2379C42.3359 96.0495 42.0677 97.7181 42.0677 96.0764C41.8799 96.7762 41.7995 96.507 41.5312 96.9376C41.6922 96.1572 41.263 95.9688 41.4507 95.6189C41.3166 95.2691 41.3166 96.1572 41.2362 96.3186C41.1289 95.9688 41.1289 95.1345 41.2093 94.8385L41.102 95.2152V95.0538L41.0216 95.5382C40.8874 95.1076 40.9679 94.7039 40.8338 94.5963V95.3229L40.7265 94.8923C40.7801 95.2422 40.7265 95.3767 40.646 95.4306V95.2691L40.5656 95.4036C40.646 94.9461 40.4583 95.2422 40.4851 94.7308C40.4046 94.7039 40.4046 94.7039 40.2437 94.8385L40.2973 95.3498C40.1095 95.8073 40.2437 94.5963 40.0827 94.5694L40.1364 95.1614C39.8413 94.1926 39.7608 95.7266 39.5462 95.1076C39.6267 94.973 39.5731 94.3002 39.5731 94.4617C39.439 94.677 39.1707 94.5424 39.0634 95.2691C38.9561 94.4348 38.9293 94.1926 38.7415 93.8158C38.6342 93.8696 38.6074 93.9504 38.6074 94.4348C38.4733 94.1119 38.2855 94.6232 38.2587 94.0042C38.2587 94.4886 38.1514 93.9235 38.1246 94.3272L38.0978 94.0849L38.1514 94.677C37.8563 93.3852 37.8832 95.4305 37.5881 94.3272L37.6149 94.1657L37.5613 94.4079C37.5345 94.1657 37.5613 94.0042 37.5345 93.6543L37.1321 93.5736L37.2394 94.0042C37.1589 94.058 37.1589 94.6232 37.0248 94.2733C37.1053 93.3852 36.8907 94.2464 36.8102 93.5736L36.8639 93.3314C36.7566 93.3852 36.7566 93.3852 36.8102 93.9773C36.6761 94.1926 36.6224 92.8739 36.542 93.5198L36.6493 93.5467C36.7029 93.8696 36.6761 94.3541 36.6224 94.3541C36.5956 94.2733 36.542 94.0042 36.5688 93.9235C36.4615 94.1657 36.2737 93.8696 36.2469 94.1119C36.1664 93.9235 36.1396 93.5198 36.1664 93.3583C35.9519 93.8966 36.0323 93.2507 35.8446 93.7889L35.8177 93.466L35.7641 93.8696L35.5763 93.1699L35.6568 93.6005C35.5763 93.6543 35.5495 93.8966 35.4422 93.7082V93.2237C35.2276 93.5198 35.0935 92.4164 34.9325 93.143C34.9057 93.0623 34.9325 92.9008 34.9325 92.8201C34.7984 93.6005 34.6911 91.9589 34.5838 92.9277C34.5838 92.7662 34.5302 92.5509 34.5302 92.4164L34.4765 92.7393L34.3424 92.0396L34.3692 93.0085L34.2351 92.3357V92.6586C34.0205 91.3937 33.9669 92.3626 33.7255 91.4206L33.8328 92.2549C33.645 94.0042 32.9476 91.3668 32.6257 92.2011L32.572 91.5552L32.4647 92.3357C32.3306 91.8243 32.4648 91.7705 32.4111 91.4206C32.277 91.7974 32.4379 92.3895 32.2502 92.6048C32.0892 92.1742 32.2502 92.1203 32.277 91.8781C32.116 92.228 31.8478 92.6048 31.66 92.2549C31.66 92.3356 31.66 92.4702 31.6869 92.4971C31.5796 92.7932 31.365 92.524 31.2309 92.5779C31.204 92.2818 31.2309 92.228 31.2577 92.1473C31.204 92.1203 31.0967 91.9051 31.0967 92.228V91.6628C30.9626 91.5552 30.8017 92.0934 30.7212 91.4206C30.7748 91.6628 30.8017 92.1742 30.7212 92.1473C30.5603 91.1515 30.5066 92.6048 30.292 92.0665C30.292 91.8243 30.3993 91.7705 30.3725 91.7436C30.2652 91.4745 30.2384 91.9589 30.2115 92.2818L30.1847 91.8781L29.8897 92.4702C29.7287 91.4745 29.5678 92.6586 29.5141 91.9051C29.38 91.8781 29.6751 92.3357 29.5141 92.4702C29.4337 92.0665 29.38 92.6855 29.3264 92.0396V91.9589L29.2191 92.0127V91.3668C29.1386 91.5283 29.1386 92.1742 29.1922 92.6586C29.0581 92.3087 28.9508 92.6048 28.8435 92.0396L28.8704 91.8781C28.6289 92.1742 28.2534 90.1558 28.1461 91.2592C28.1193 91.1784 28.0925 91.017 28.1461 91.017L27.9852 90.99L27.9583 90.5056L27.7706 91.2861L27.7438 90.9631C27.556 90.8555 27.2877 91.0439 27.0732 91.1784L27.1 91.017C26.9122 91.5552 26.8317 90.7209 26.6976 91.0977C26.6976 91.017 26.6976 90.9631 26.6976 90.9631L26.5367 90.99V90.6671C26.483 91.3937 26.0807 89.779 26.2416 90.3711C26.2148 90.694 26.1343 91.0708 26.1611 91.5014C26.0002 91.5552 26.0807 91.0708 25.9197 90.8017C25.7856 90.7747 25.8393 91.3399 25.6247 91.0708L25.5978 90.7478C25.5174 90.8017 25.4905 91.0439 25.3833 91.1246L25.4101 90.9631C25.3028 91.6628 25.0614 90.0212 25.0882 91.4745C24.9809 91.2053 24.8468 91.4475 24.7931 90.7747C24.6054 91.2322 24.4444 91.4475 24.2567 91.7436C24.0957 90.6671 24.203 91.8243 24.0152 91.2053L24.0957 91.7705C23.7738 91.8781 23.2642 90.4787 22.9423 90.7478L22.8618 90.1558V90.8017C22.4595 90.5594 21.9498 90.398 21.6279 90.4249C21.5743 90.7478 21.4938 91.4475 21.306 91.2592V91.1784C21.0646 91.5283 20.8232 91.8243 20.4745 91.5014C20.4745 91.2592 20.4208 91.0977 20.4477 90.9362C20.4477 91.5821 20.2867 90.99 20.2063 90.9631L20.3135 91.3937C20.2867 91.9589 20.099 91.4475 20.0185 91.017L19.938 91.6628C19.9112 91.609 19.9112 91.5283 19.8844 91.4206V91.7436L19.7234 90.99C19.6966 91.1515 19.5625 91.3668 19.5625 92.0934C19.5357 91.8512 19.3747 91.6628 19.4552 91.5014L18.9455 91.313L19.0528 91.5821C19.1333 92.1742 18.9992 92.5509 18.9187 92.2818C18.9724 91.7974 18.8382 91.4475 18.7578 91.0439C18.7309 91.3668 18.8651 91.5552 18.8651 91.8781C18.8114 92.2818 18.6773 92.4971 18.5968 92.228L18.6236 91.9858C18.5432 92.2011 18.3822 91.2053 18.2749 91.2592C18.2213 91.7436 18.114 91.313 18.2213 92.3087C18.0872 92.524 18.0872 91.6359 18.0335 91.5552C18.0067 92.0396 17.7921 91.7436 17.7116 91.2592C17.7653 92.7393 17.2824 90.7747 17.3629 92.0127L17.1752 91.3399C17.202 91.6628 17.2556 92.4164 17.1752 92.5509C17.041 92.2011 17.0142 91.6359 16.9606 91.2861L17.0142 92.524C16.3704 91.2592 15.7803 92.2011 15.1097 91.1784C14.8951 91.4475 14.6269 92.0396 14.305 91.9051L14.3318 91.7436L14.0099 91.4206L14.2782 91.9589C14.2245 92.0934 14.1977 92.3357 14.1441 92.3357C13.7954 91.8512 13.3125 91.2592 12.9638 91.9051C12.8297 93.3314 12.6956 90.6671 12.5346 91.7167C12.5346 91.5821 12.5346 91.3937 12.5346 91.2322C12.32 91.7167 12.1859 91.9858 11.9982 92.8201C11.9177 91.4206 11.8372 92.8739 11.8104 92.1203L11.8372 92.6855C11.7567 92.3356 11.6226 92.228 11.5958 91.8243L11.5421 92.5509L11.4885 91.9589C11.3276 91.932 11.0325 92.4164 10.8984 91.2322C10.5765 92.1473 9.98636 91.9051 9.50353 91.7167C9.47671 92.2011 9.34259 92.2549 9.2353 92.3087L9.10118 91.609C8.99388 91.8243 8.94023 92.7124 8.80611 92.2549C8.80611 92.1742 8.80611 92.1204 8.80611 92.0665C8.69882 92.2011 8.59152 91.8512 8.51105 92.4971C8.40376 92.4702 8.26964 92.0934 8.26964 91.4475C8.29646 92.6048 8.0014 91.2861 8.0014 91.2861C8.0014 91.2861 7.62586 91.1246 7.03574 90.99C6.47244 90.8286 5.69455 90.694 4.88983 90.7209C4.67524 90.7478 4.48747 90.7478 4.29971 90.7747C4.11194 90.8017 3.92417 90.8555 3.70958 90.9093C3.33405 91.0439 2.93169 91.2323 2.58298 91.5552C1.91238 92.1204 1.26861 93.0623 0.758958 94.5963C0.651662 95.1614 0.490719 95.5113 0.463895 96.1841C0.329776 96.3994 0.410248 95.3767 0.329776 95.9419C0.437072 96.3187 0.115185 97.3951 0.168833 98.1218L0.00788996 98.3909C-0.0457577 98.7946 0.195657 97.9334 0.0883615 98.6869L0.249305 97.6373C0.302952 97.7988 0.329776 98.041 0.302952 98.3909C0.410248 97.9872 0.624839 96.534 0.70531 97.1798L0.651662 97.2337C0.785782 97.2068 0.651662 97.9334 0.678486 98.0949H0.651662L0.70531 98.6331C0.651662 98.2563 0.410248 99.1175 0.490719 99.0637C0.624839 99.3866 0.463895 98.7946 0.598015 98.6869C0.678486 98.6331 0.598015 99.1983 0.571191 99.5212L0.70531 99.4943C0.651662 99.9787 0.624839 99.4674 0.624839 99.9787L0.866253 99.4674C0.785782 100.732 1.10767 98.8753 1.10767 100.059C0.946725 100.355 1.08084 100.49 1.0272 100.894L1.34908 100.84C1.37591 101.028 1.24179 101.217 1.29543 101.163C1.32226 101.513 1.42955 100.867 1.45638 100.867C1.45638 101.217 1.69779 100.867 1.64414 101.701C1.83191 102.266 1.80509 100.652 1.99286 101.136C1.99286 101.647 1.83191 101.244 1.88556 101.782C1.96603 101.728 2.0465 101.674 2.10015 101.593C2.07333 101.836 2.01968 102.401 1.93921 102.293C2.47568 102.966 2.7171 105.657 3.33405 104.984C3.3877 105.576 3.25358 105.388 3.19993 105.792C3.62911 105.011 3.76323 107.137 4.13876 107.057V106.572C4.62159 108.133 5.21172 107.191 5.77502 107.837L5.69455 107.487C5.77502 107.003 5.88231 106.949 5.98961 106.734C6.01643 106.976 5.93596 107.783 6.0969 107.595C6.07008 107.406 5.98961 107.245 6.01643 107.003C6.49926 108.295 7.51857 107.972 8.29646 108.564C9.31577 108.133 10.5228 109.075 11.4885 108.698C11.3276 108.752 11.3276 107.514 11.4617 107.783C11.9177 109.829 11.9713 107.406 12.4005 108.806C12.937 108.106 13.6076 109.882 14.0099 108.241L14.0636 108.833C14.1709 109.102 14.1441 108.698 14.2245 108.618V108.779C14.4391 108.994 14.6269 108.375 14.761 108.644L14.7074 107.972C14.8147 107.918 14.8147 108.483 14.8951 108.079L14.922 108.402L15.0024 107.756C15.0829 108.914 15.3511 107.81 15.4853 108.348C15.6194 108.133 15.8608 107.595 16.129 107.81C16.2363 108.402 16.5046 108.375 16.7191 108.644C17.041 108.456 17.5239 108.214 18.0067 108.402L17.9262 107.649L18.0335 107.595C18.0603 107.756 18.0603 107.837 18.0603 107.918C18.2213 108.752 18.3018 107.622 18.4359 108.16C18.3018 107.487 18.3554 108.052 18.2749 108.052C18.1408 107.703 18.1676 106.976 18.3286 107.326V107.487L18.3822 107.084C18.4359 107.676 18.5432 107.918 18.6236 108.51C18.9992 108.348 19.1601 107.299 19.5625 107.541C19.5893 108.187 19.8307 107.353 19.8575 108.483C20.0453 108.025 19.7234 107.568 19.7502 106.761C19.8039 106.761 19.8575 106.465 19.9112 106.868C19.9112 107.137 20.0453 107.541 19.9917 107.649L20.1258 107.541C20.1526 107.622 20.1258 107.783 20.1258 107.864C20.3672 107.191 20.7695 108.537 20.9841 107.864C20.9573 107.46 20.85 107.756 20.85 107.353C21.0378 106.491 21.1719 108.052 21.3865 107.46V108.025C21.4401 107.622 21.4133 107.137 21.6011 107.568C21.7084 108.241 21.5474 108.133 21.4938 108.429C21.6011 108.456 21.8157 108.241 21.6816 107.649C21.7889 107.406 21.8693 107.999 21.9498 108.187C21.923 108.025 21.7889 107.756 21.8425 107.433C22.0303 107.783 22.2717 107.756 22.4863 107.783C22.5131 107.945 22.5399 108.187 22.5399 108.268C22.674 107.46 22.8082 108.94 22.9959 108.752Z" fill="#FF7800"/>
            <path d="M32.7875 104.258L32.707 104.15C32.7339 104.284 32.7339 104.473 32.707 104.634L32.7875 104.258Z" fill="#FF7800"/>
            <path d="M28.3598 105.469C28.4134 105.307 28.3329 105.146 28.2793 104.984C28.3061 105.119 28.3329 105.28 28.3598 105.469Z" fill="#FF7800"/>
            <path d="M34.6367 102.293C34.6367 102.347 34.6367 102.454 34.6367 102.589C34.6635 102.454 34.6635 102.374 34.6367 102.293Z" fill="#FF7800"/>
            <path d="M40.2436 102.32C40.2436 102.293 40.2168 102.266 40.2168 102.212C40.2436 102.266 40.2436 102.293 40.2436 102.32Z" fill="#FF7800"/>
            <path d="M39.8954 101.297C39.8686 101.297 39.8686 101.324 39.8418 101.405C39.8686 101.432 39.8686 101.378 39.8954 101.297Z" fill="#FF7800"/>
            <path d="M33.2964 102.67C33.2695 102.697 33.2695 102.751 33.2695 102.885C33.2964 102.858 33.2964 102.778 33.2964 102.67Z" fill="#FF7800"/>
            <path d="M39.7602 101.54L39.6797 101.486C39.6797 101.54 39.6797 101.567 39.6797 101.62L39.7602 101.54Z" fill="#FF7800"/>
            <path d="M40.3514 102.401C40.3246 102.374 40.271 102.374 40.2441 102.32C40.2978 102.482 40.3246 102.482 40.3514 102.401Z" fill="#FF7800"/>
            <path d="M36.6232 101.244C36.6232 101.271 36.6232 101.271 36.6232 101.244C36.6232 101.432 36.5964 101.567 36.6232 101.244Z" fill="#FF7800"/>
            <path d="M40.6987 102.643C40.6987 102.67 40.6719 102.697 40.6719 102.778C40.6719 102.805 40.6987 102.831 40.7255 102.858C40.6987 102.751 40.6987 102.697 40.6987 102.643Z" fill="#FF7800"/>
            <path d="M37.8834 102.186C37.8834 101.943 37.8834 101.782 37.8834 101.647C37.8566 101.647 37.8566 101.755 37.8834 102.186Z" fill="#FF7800"/>
            <path d="M60.3359 64.6431C60.3896 64.5893 60.4432 64.5085 60.5237 64.4009C60.4164 64.5085 60.3628 64.5893 60.3359 64.6431Z" fill="#FF7800"/>
            <path d="M57.5449 60.4177L57.679 60.3369C57.6254 60.3369 57.5986 60.3638 57.5449 60.4177Z" fill="#FF7800"/>
            <path d="M62.2119 66.877C62.185 66.9039 62.185 66.9039 62.1582 66.9308C62.185 66.9577 62.2387 67.0115 62.2923 67.0923L62.2119 66.877Z" fill="#FF7800"/>
            <path d="M50.5977 52.8822L50.6513 52.9092C50.6513 52.8822 50.6513 52.8553 50.5977 52.8822Z" fill="#FF7800"/>
            <path d="M54.6214 57.5112C54.5409 57.592 54.4872 57.6189 54.4336 57.6458C54.4604 57.6727 54.4872 57.6727 54.6214 57.5112Z" fill="#FF7800"/>
            <path d="M59.9857 73.1205L60.1466 72.7168C60.0393 72.8783 59.9588 73.0667 59.9857 73.1205Z" fill="#FF7800"/>
            <path d="M63.3387 71.1021C63.285 71.129 63.2314 71.1828 63.1777 71.2366C63.2046 71.2097 63.2582 71.2366 63.3387 71.1021Z" fill="#FF7800"/>
            <path d="M63.0977 71.2902C63.1245 71.2633 63.1513 71.2364 63.1781 71.2095C63.1513 71.2095 63.1245 71.2095 63.0977 71.2902Z" fill="#FF7800"/>
            <path d="M18.785 33.5325C18.7046 33.4787 18.49 33.7209 18.2754 33.9093L18.785 33.5325Z" fill="#FF7800"/>
            <path d="M43.3281 47.3655L43.4354 47.231C43.4086 47.2579 43.3549 47.3117 43.3281 47.3655Z" fill="#FF7800"/>
            <path d="M16.801 36.7619V36.6543C16.7742 36.7081 16.801 36.735 16.801 36.7619Z" fill="#FF7800"/>
            <path d="M58.0274 73.2549C57.7323 73.5778 57.8396 73.0396 57.625 73.3894C57.7323 73.3894 57.6786 73.7393 58.0274 73.2549Z" fill="#FF7800"/>
            <path d="M16.8008 36.7618V36.8964C16.8276 36.8426 16.8544 36.7618 16.8813 36.708C16.8544 36.7349 16.8276 36.7618 16.8008 36.7618Z" fill="#FF7800"/>
            <path d="M35.6562 41.6871C35.6831 41.6602 35.6831 41.6602 35.7099 41.6333L35.6562 41.6871Z" fill="#FF7800"/>
            <path d="M35.6309 40.8257C35.6845 40.7988 35.7382 40.7988 35.7918 40.7719C35.765 40.6911 35.7113 40.745 35.6309 40.8257Z" fill="#FF7800"/>
            <path d="M18.2755 33.9092L17.9805 34.1245C18.0609 34.0976 18.1682 34.0168 18.2755 33.9092Z" fill="#FF7800"/>
            <path d="M30.748 38.1612C30.7749 38.1612 30.8017 38.1612 30.8285 38.1343C30.8017 38.1343 30.7749 38.1343 30.748 38.1612Z" fill="#FF7800"/>
            <path d="M54.7827 57.9152C54.7827 57.9421 54.7827 57.9959 54.7559 58.0229C54.8363 57.9421 54.8632 57.8883 54.7827 57.9152Z" fill="#FF7800"/>
            <path d="M45.6625 64.7507C45.6625 64.6431 45.4211 64.8315 45.1797 65.0737C45.2602 65.1006 45.3406 65.0468 45.6625 64.7507Z" fill="#FF7800"/>
            <path d="M47.8086 67.6846L47.8358 67.6572C47.8086 67.6572 47.8086 67.6572 47.8086 67.6846Z" fill="#FF7800"/>
            <path d="M47.1113 67.2533C47.1382 67.1726 47.165 67.1188 47.165 67.0649C47.1382 67.1457 47.1113 67.2264 47.1113 67.2533Z" fill="#FF7800"/>
            <path d="M34.6647 62.6515C35.4158 62.8937 36.7302 62.7592 37.1862 63.405C37.8299 62.7861 38.0445 62.8937 38.3396 62.8668L37.6958 63.8356L38.0713 63.6473C37.9372 63.9702 37.8299 63.728 37.669 64.1855L38.1518 63.6473C37.9104 63.9971 38.4201 64.1586 37.6422 64.6699L38.2591 65.1274C38.3664 65.262 38.9029 64.4008 38.9029 64.7237C38.7419 65.0198 38.7151 64.8852 38.4737 65.2351C38.4469 66.2846 40.3246 63.7818 40.4587 64.5084L40.3246 64.6161C40.566 64.4277 40.7001 64.5354 40.7806 64.4008C41.3975 63.405 40.3246 64.8583 40.5928 64.2124C41.1829 63.405 41.0756 63.8895 41.5048 63.2705C41.3975 63.6473 41.773 63.2167 41.9072 63.2436C41.6926 63.8626 42.1754 63.6473 41.8267 64.3739C42.0681 64.1586 42.7387 63.432 42.8996 63.5127C42.5778 64.2393 42.4436 64.1048 42.4436 64.4546L42.7923 63.9971C42.8728 64.1586 42.7655 64.2662 42.6046 64.5084C42.7387 64.6161 43.1679 63.9433 43.1411 64.3739L42.7119 64.7507C42.9533 64.6699 42.9533 64.7776 43.1142 64.939C42.9265 65.2082 42.8728 65.1274 42.8728 65.0198C42.4705 65.7733 43.2484 64.8314 43.2484 64.939C43.3825 64.7237 43.3288 64.5354 43.7044 64.1317C43.7312 64.2662 44.3481 63.6203 43.9994 64.2393L43.5971 64.6161C44.0262 64.3739 44.1067 64.1048 44.1872 64.4277C44.1604 64.4546 44.0799 64.5892 43.9994 64.6699C44.5627 64.1586 44.3481 64.8314 44.5091 65.0198L44.375 65.1274C44.5627 65.0198 44.9114 64.643 44.9383 64.6968C45.0187 64.347 45.1528 64.2393 45.4479 63.7818C45.0455 64.6699 46.3063 63.0552 46.2258 63.6742C46.038 63.9433 45.743 64.2393 45.8771 63.8895C45.2333 64.6161 44.7505 65.2889 44.3481 65.558C44.5627 65.4504 44.7505 65.3965 44.5091 65.7195L45.0724 64.9929C45.1528 65.0198 45.1528 65.1005 45.2065 65.1274C45.5552 64.6699 45.6357 64.2931 45.9844 64.0509C46.3063 63.9164 45.5284 64.8583 45.7966 64.5354C46.199 64.3739 46.4404 63.8087 46.4672 64.1855C46.4136 64.2393 46.2794 64.347 46.3063 64.2662C46.2258 64.6699 46.7355 64.3739 46.1453 65.2889C45.9844 65.4773 45.7966 65.7464 45.7966 65.6388L45.9039 65.5042C45.287 66.0424 46.1453 65.4235 45.5284 66.177C45.8503 65.6926 45.9576 65.9348 45.9844 66.0963L46.3331 65.5311C47.7816 64.1048 45.5552 66.6076 45.9844 66.6076C46.4136 66.3654 46.0112 66.4192 46.4136 66.0963C46.4672 66.2847 46.1722 66.796 46.5209 66.6883C46.4136 66.9305 46.3063 67.3073 45.9039 67.9263C46.199 67.7648 46.038 68.4376 46.5209 67.8725C46.7086 67.2266 45.8771 68.3838 46.2258 67.4419L46.7086 66.8767C46.8427 67.0113 47.2451 66.8498 47.1915 67.1458C47.2451 67.0113 47.3524 66.8498 47.4597 66.7422C47.8352 66.6614 48.3181 66.1232 48.3985 66.4461C48.0498 67.0113 47.9962 66.8229 47.8621 66.8229C47.7011 67.3611 47.9693 66.9575 48.0766 67.2804C47.7548 67.7648 47.9693 67.1458 47.5938 67.6033L47.9425 67.6303C47.9157 67.6572 47.8889 67.6841 47.8621 67.7379C48.4522 66.9575 47.9962 67.9263 48.2912 67.7917C48.6131 68.0339 49.4178 66.9844 50.0616 66.473C49.9543 66.7152 49.8202 66.9305 49.6593 67.1189C49.8202 66.7152 49.6324 66.9844 49.4715 67.1728C49.6324 67.1728 49.1764 68.1416 48.8814 68.4107C49.2301 68.3031 49.1228 67.9532 49.391 67.7648L49.6056 67.9801C49.8738 67.5495 49.847 67.3881 50.1957 67.1728C50.3835 67.1458 50.3835 67.2535 50.4908 67.388C50.3298 67.5764 50.1153 68.0339 50.008 67.9532C49.9811 68.1685 50.0616 68.2492 50.3835 67.8725C50.4908 67.3881 50.8931 67.711 51.215 66.9844L51.1077 67.4688C51.0809 67.4419 50.8932 67.711 50.8932 67.5764C50.5176 68.2223 51.1346 67.4957 51.2419 67.4688C51.215 67.6303 51.3223 67.7917 51.1614 68.0339C51.3223 67.8994 51.3492 68.1147 51.1614 68.4376C51.3223 68.3569 51.4565 68.0339 51.6174 67.8456L51.832 68.0609C51.6174 68.4107 50.9736 69.3796 50.8395 69.4872C51.1614 69.245 51.5637 68.4915 51.6979 68.626C51.1614 69.245 51.5369 69.2719 50.8663 69.9985C50.5981 70.5368 50.8663 70.6982 51.1077 70.6175C51.5637 70.1331 51.1882 70.2138 51.5637 69.6756C52.0734 69.7294 53.1195 68.2492 53.2 68.6798L53.2268 68.4915C53.6024 68.3031 53.5487 68.3569 53.9511 67.9532C53.4414 68.5991 52.9049 69.8909 53.2537 69.9447C53.5219 69.6218 53.5487 69.1912 53.9511 68.6798L54.1925 68.7067C54.1657 68.7606 54.0852 68.8682 53.9779 68.949C54.2998 68.8144 53.6828 70.0524 54.273 69.2719L53.7633 70.3753L53.9779 69.9178C54.2193 69.5948 54.4875 69.6218 54.5948 69.5141C55.024 69.2719 54.8899 69.5948 54.7021 70.1062C54.8631 69.8101 55.2118 69.1104 55.4264 69.1104C54.6753 70.2138 55.4532 69.7294 55.0508 70.2946C55.1313 70.3215 54.9972 70.7252 55.3191 70.2946L54.8363 70.9674C55.5069 70.0254 55.6678 70.2138 55.9629 70.16C55.0509 71.4249 56.2043 70.1869 55.48 71.4249C56.097 70.5637 56.0165 71.2634 56.553 70.5368C56.7139 70.5906 56.1506 71.398 55.9897 71.694L56.2579 71.398C56.0433 71.8555 56.2579 72.0708 56.2043 72.4745L56.848 71.7747L56.6603 72.1515C56.8212 71.9631 57.009 71.9362 57.1163 71.5864L57.1699 71.694C57.7332 70.8328 57.4382 71.5325 57.8137 71.2634C57.7601 71.4249 57.5991 71.6133 57.5186 71.7209C57.5723 71.7747 57.2772 72.2053 57.1163 72.5014C57.2236 72.2592 58.377 71.1288 58.4575 70.6175C58.6721 70.2677 58.9671 70.0793 58.9135 70.2677L58.4575 71.075L59.0744 70.3215C59.2622 70.2946 58.994 70.8059 59.0208 70.9674C58.8867 70.9674 57.8405 72.313 58.0819 72.4475C57.8942 72.4745 57.5455 72.8512 57.3845 72.9589C57.4113 73.0127 57.3845 73.1203 57.0895 73.3895C57.4382 73.2818 57.465 72.9589 57.7064 72.9858C57.2504 73.6586 57.1431 73.9277 57.1699 74.2776L57.3845 73.6855C57.4382 73.6048 57.4918 73.5509 57.5186 73.524C57.5186 73.4164 57.5723 73.3087 57.7332 73.0396C57.7601 73.0665 58.5111 72.313 58.2697 72.7705C58.7794 71.5594 59.1281 72.1515 59.45 71.4249C59.6109 71.2365 59.745 71.2903 59.5573 71.6402C59.0744 72.0708 59.1549 72.5014 58.833 72.9858C59.0208 72.8243 59.0476 72.3937 59.289 72.1784C59.4231 72.1784 59.2085 72.6628 59.1281 72.905L58.994 73.0127L58.9403 73.4164C59.1817 73.0934 59.1817 72.7436 59.4231 72.6359C59.3695 72.7974 59.6109 72.7167 59.4231 72.9858C59.0476 73.4164 58.6989 74.0892 58.5111 74.143C58.6452 74.143 58.994 74.2776 59.289 73.524L59.3963 73.6317C59.5036 73.2818 59.6645 72.6359 59.9328 72.6898L59.8523 72.8243L60.3351 72.3937L60.1742 72.7974C60.2815 72.609 60.4156 72.4745 60.4693 72.5283C60.362 72.7436 60.362 72.8781 60.1742 73.1473C60.362 73.228 60.5766 72.8512 60.7375 72.6628C60.8716 72.6628 60.818 72.8512 60.4961 73.228C60.5766 73.4164 60.8448 73.4702 60.7107 73.8739C61.0862 73.6586 60.7643 73.7124 61.1667 73.2818C60.5497 74.6005 61.4617 74.1161 61.8373 74.143C62.4006 73.0127 61.9982 74.0623 62.642 73.1203C62.3738 73.4164 62.4274 74.1161 61.9714 74.2776L62.186 74.2507C61.9446 74.9235 61.6495 74.5467 61.3276 75.4617C61.5422 75.5424 62.3469 74.4121 62.3201 74.9504C61.8105 75.677 62.642 74.7889 62.0787 75.5963C61.8641 75.8385 61.8641 75.7308 61.7568 75.7577L61.7032 75.9192C61.9714 76.3767 62.3469 75.0849 62.8566 74.6813C63.1517 74.7351 62.6956 75.4079 62.5079 75.7847C62.4542 75.9461 62.642 75.9192 62.8298 75.7577C62.4006 76.1345 62.8298 75.1118 63.1785 74.6543C62.7761 75.5963 63.5004 74.9504 63.7418 74.6274C63.9295 73.4971 63.5272 74.439 63.7954 73.2549C63.5808 73.4971 63.1517 74.3045 63.1517 73.8739C63.5004 73.5509 63.3931 73.4164 63.4467 73.2818C63.2053 73.7662 63.2053 73.3895 63.0444 73.5509C63.2053 73.1473 63.7686 72.5821 63.6881 72.2861L63.0175 73.3356C63.0444 73.1203 63.5004 72.5821 63.2053 72.7436C63.6077 72.2322 63.6881 71.8555 64.01 71.8286C64.3051 70.779 63.3394 72.0977 62.9102 72.3668C62.9639 72.313 63.0444 72.1784 63.1248 72.1246C62.9102 72.3668 62.8566 72.313 62.7493 72.3399C62.7761 72.0169 63.1517 71.9362 63.2858 71.6133L63.0712 71.5056C63.098 71.4787 63.098 71.4518 63.1248 71.4249C62.9907 71.5325 62.8834 71.6133 63.0175 71.3172C63.2858 71.0212 63.5272 70.6713 63.7418 70.4291L63.0712 71.0212C63.3126 70.6982 63.2589 70.3215 63.5808 70.16C63.4467 70.16 63.3126 70.1331 63.1785 70.1062L63.5808 69.3795C63.4199 69.4603 63.3394 69.5949 63.3662 69.7294C63.3662 69.4872 62.1323 70.6713 63.0444 69.2988C62.4274 69.7294 62.5079 69.4334 61.9714 69.5949C62.6152 69.0835 62.2396 68.5991 62.6688 68.4645C62.7225 68.0609 62.2128 68.8144 62.025 68.8682C62.1055 68.4914 62.5883 67.8456 62.8834 67.6572L62.5615 67.8994L62.642 67.7648L62.2665 68.0878C62.4006 67.6303 62.6956 67.3611 62.642 67.1997L62.2128 67.7917L62.3738 67.388C62.2128 67.6841 62.0787 67.7648 61.9446 67.7648L62.025 67.6303L61.8373 67.6841C62.186 67.3881 61.8373 67.4957 62.1592 67.0651C62.0787 66.9844 62.0787 66.9844 61.8373 66.9844L61.5959 67.415C61.1399 67.6303 61.9982 66.7691 61.8373 66.6345L61.5422 67.1189C61.8373 66.1232 60.818 67.2804 60.9789 66.6345C61.1667 66.5807 61.5154 66.0155 61.4081 66.1501C61.1399 66.2308 60.9521 65.9079 60.3888 66.3923C60.7912 65.6388 60.9253 65.4235 60.9521 64.9929C60.7912 64.939 60.7375 64.9929 60.4156 65.3965C60.4693 65.0467 59.9864 65.2889 60.3083 64.7776C60.0133 65.1543 60.2547 64.6161 59.9596 64.9121L60.0937 64.6968L59.7718 65.1813C60.2815 63.9433 58.994 65.558 59.4231 64.4546L59.5573 64.347L59.3427 64.4815C59.4768 64.2662 59.5841 64.1586 59.7718 63.8895L59.4231 63.5127L59.2622 63.9433C59.1281 63.9433 58.7525 64.347 58.8598 63.9971C59.5036 63.405 58.7525 63.8626 59.1013 63.2974L59.3158 63.1628C59.1549 63.109 59.1549 63.109 58.833 63.6203C58.5648 63.6742 59.3427 62.6246 58.8598 63.0552L58.9403 63.1628C58.7794 63.4589 58.4307 63.8087 58.377 63.7549C58.4038 63.6742 58.5111 63.432 58.5916 63.405C58.3502 63.5127 58.3234 63.1359 58.1356 63.2705C58.1624 63.0821 58.4307 62.7592 58.5379 62.6515C57.9746 62.8937 58.4843 62.4631 57.921 62.7053L58.1088 62.4362L57.7869 62.7053L58.0551 62.0325L57.8674 62.4093C57.7332 62.4093 57.5723 62.5439 57.5723 62.3286L57.8942 61.9518C57.4918 62.0056 58.0819 61.0637 57.4382 61.4674C57.465 61.3866 57.5991 61.279 57.6528 61.2252C57.009 61.7096 57.9746 60.3909 57.2236 61.0099C57.3309 60.8753 57.4113 60.6869 57.5186 60.5793L57.2504 60.7677L57.6259 60.2294L56.9822 60.983L57.3041 60.3909L57.0895 60.6331C57.7064 59.5028 57.009 60.2025 57.4113 59.3144L56.9553 60.0141C55.6142 61.1713 56.6603 58.6147 55.7751 58.9645L56.1506 58.4263L55.5337 58.9376C55.7214 58.4263 55.9092 58.507 56.0702 58.211C55.6678 58.3725 55.4264 58.9645 55.1045 58.9376C55.2386 58.4801 55.4264 58.5609 55.6142 58.3994C55.2118 58.507 54.7021 58.5878 54.7558 58.1841C54.7021 58.2648 54.6217 58.3456 54.6217 58.3725C54.2998 58.507 54.2998 58.1303 54.112 58.0495C54.2998 57.8073 54.3534 57.7804 54.4339 57.7804C54.4071 57.6997 54.4339 57.4844 54.2193 57.6997L54.5948 57.2691C54.5412 57.0807 54.0047 57.3498 54.3803 56.7847C54.2461 56.9999 53.9511 57.4036 53.8706 57.296C54.3803 56.4348 53.3341 57.4305 53.4951 56.8654C53.656 56.677 53.817 56.7308 53.7901 56.7039C53.8706 56.4348 53.5219 56.7577 53.2537 56.973L53.5219 56.6501L52.7976 56.8385C53.3073 55.9773 52.3416 56.7039 52.7976 56.1118C52.6904 55.9773 52.6635 56.5694 52.4221 56.5424C52.6099 56.1657 52.1539 56.5963 52.5294 56.058L52.5831 56.0042L52.4221 55.9504L52.8781 55.466C52.6904 55.4929 52.2343 55.9773 51.9661 56.381C52.0734 56.0042 51.7515 56.1657 52.0466 55.6274L52.1807 55.5198C51.7515 55.5198 52.744 53.7167 51.8856 54.4702C51.9125 54.3895 52.0198 54.2549 52.0466 54.2818L51.8856 54.1203L52.2075 53.7436L51.4833 54.1473L51.671 53.8781C51.5637 53.6359 51.1614 53.5552 50.8663 53.4745L51.0004 53.3668C50.4371 53.5821 50.92 52.9362 50.5176 53.0708C50.5713 53.0169 50.5981 52.99 50.6249 52.9631L50.4371 52.8555L50.6517 52.6133C50.1153 53.0977 50.8127 51.5906 50.5444 52.1288C50.303 52.3441 49.9543 52.5594 49.6861 52.8555C49.4715 52.7478 49.8738 52.4787 49.9275 52.1558C49.8202 52.0212 49.4447 52.4787 49.4447 52.1019L49.6324 51.8328C49.4983 51.8059 49.3105 51.9674 49.1764 51.9135L49.3105 51.8059C48.7204 52.2365 49.6324 50.8371 48.6399 51.8866C48.7204 51.6175 48.4254 51.6713 48.8277 51.1331C48.3181 51.2946 48.023 51.3215 47.6206 51.3753C48.2108 50.4603 47.5402 51.4022 47.7279 50.7832L47.406 51.2677C47.0037 51.0793 47.4329 49.626 46.9232 49.5184L47.2451 49.0339L46.7891 49.4914C46.5209 48.9801 46.1185 48.388 45.7966 48.1458C45.5016 48.3073 44.9383 48.7648 44.8846 48.4688L44.9383 48.415C44.4554 48.4688 43.9726 48.4419 43.8385 47.9305C43.9994 47.7422 44.0799 47.5807 44.1872 47.473C43.7312 47.9305 43.9726 47.3654 43.9189 47.2846L43.758 47.6883C43.3556 48.0651 43.5166 47.5538 43.7312 47.1501L43.2215 47.5538C43.2484 47.4999 43.2752 47.4192 43.3288 47.3385L43.1142 47.5807L43.4898 46.9079C43.3556 47.0155 43.0606 47.0424 42.5778 47.5807C42.7119 47.3654 42.6851 47.0963 42.8728 47.0694L42.4705 46.5042L42.39 46.8002C42.0681 47.2846 41.6926 47.473 41.7462 47.177C42.1218 46.881 42.229 46.5042 42.4436 46.1274C42.1754 46.3427 42.2022 46.5849 41.9876 46.8271C41.6657 47.0694 41.3707 47.0963 41.4512 46.8541L41.6389 46.6926C41.3975 46.7733 41.9072 45.9121 41.773 45.8583C41.3975 46.1543 41.5585 45.7507 40.9951 46.5849C40.7269 46.6388 41.317 45.9929 41.3439 45.8583C40.9952 46.1812 40.9415 45.7776 41.2097 45.347C40.2709 46.4773 41.0756 44.5934 40.3246 45.5892L40.5928 44.9164C40.405 45.1855 39.949 45.7776 39.7613 45.8045C39.8685 45.4277 40.2173 44.9971 40.3782 44.7011L39.6003 45.643C39.7881 44.1628 38.5005 44.3243 38.5005 42.9787C38.0713 42.9787 37.3739 43.194 37.1325 42.8172L37.2666 42.7096L37.1325 42.1982L37.052 42.8441C36.8911 42.898 36.7033 43.0594 36.6497 43.0056C36.5692 42.3328 36.4619 41.4716 35.6304 41.66C34.5306 42.6019 36.1669 40.5028 35.2817 41.1487C35.389 41.0679 35.4963 40.9065 35.6036 40.7988C35.0403 40.9603 34.7184 41.0679 33.9673 41.5254C34.7988 40.3951 33.7527 41.4178 34.2087 40.8257L33.86 41.2832C33.9941 40.9603 33.9137 40.745 34.1551 40.422L33.6186 40.9065L33.9405 40.422C33.7795 40.2606 33.1358 40.3951 33.7259 39.3456C32.787 39.7492 32.2506 39.0495 31.8214 38.4844C31.4727 38.8342 31.2849 38.7535 31.124 38.6997L31.3922 38.0269C31.1508 38.1076 30.507 38.7535 30.6411 38.296C30.6948 38.2422 30.7216 38.1883 30.7484 38.1614C30.5338 38.1883 30.6143 37.7847 30.1315 38.2422C29.9974 38.1076 30.0778 37.7039 30.4802 37.2195C29.8096 38.1614 30.2656 36.8696 30.2656 36.8696C30.2656 36.8696 29.8901 36.4121 29.2731 35.7662C28.6562 35.1203 27.7173 34.313 26.6176 33.6402C25.5446 32.9674 24.2034 32.4022 22.8622 32.2677C22.2185 32.2138 21.4674 32.2407 20.77 32.4291C20.0725 32.6175 19.4019 32.9674 18.7582 33.5056C18.4095 33.9631 18.0339 34.1784 17.7657 34.7974C17.5243 34.905 17.9535 33.99 17.6316 34.4745C17.6316 34.932 16.8537 35.7393 16.6659 36.466L16.4781 36.5198C16.2636 36.8696 16.8537 36.2237 16.4781 36.8427L17.0414 35.9277C17.0683 36.1161 16.9878 36.3583 16.8537 36.6813C17.1487 36.3583 17.9266 35.1473 17.8193 35.8201L17.7389 35.847C17.9266 35.9277 17.4975 36.4929 17.4438 36.6813L17.417 36.6543L17.2829 37.1926C17.3633 36.8158 16.7464 37.4617 16.8537 37.4617C16.9073 37.8385 16.9342 37.1926 17.1487 37.1926C17.2829 37.1926 16.961 37.677 16.7732 37.973L16.961 38.0269C16.6927 38.4575 16.8537 37.9461 16.6659 38.4305L17.1487 38.1076C16.5586 39.211 17.6852 37.7308 17.1756 38.8073C16.8805 38.9688 16.961 39.1841 16.7464 39.507L17.1487 39.6685C17.0951 39.83 16.8537 39.9376 16.9342 39.9107C16.8269 40.2606 17.2024 39.7223 17.2292 39.7492C17.0683 40.0722 17.4975 39.9107 17.0683 40.6104C17.0146 41.2294 17.7389 39.7761 17.712 40.3413C17.4706 40.7988 17.4706 40.3144 17.2829 40.8257H17.6047C17.4438 41.0141 17.1219 41.4985 17.0951 41.3371C17.3902 42.3059 16.2904 44.7818 17.2024 44.5665C16.961 45.1317 16.9342 44.8626 16.6659 45.1586C17.4975 44.7549 16.5318 46.6388 16.9073 46.8002L17.1756 46.3965C16.8269 48.0113 17.8998 47.6345 18.0876 48.5226L18.2217 48.1997C18.5704 47.8498 18.7045 47.9036 18.9191 47.7691C18.785 47.9844 18.2753 48.6033 18.5436 48.5495C18.5972 48.388 18.6509 48.1728 18.8118 47.9844C18.5704 49.3569 19.7238 49.7875 20.153 50.8371C21.4137 51.2407 22.0039 52.8286 23.2109 53.2861C23.0232 53.2053 23.8011 52.2365 23.7474 52.5594C22.889 54.4971 24.4985 52.6671 24.0157 54.0665C25.0081 53.932 24.4985 55.7889 25.9738 54.8739L25.6519 55.3583C25.5714 55.6274 25.8397 55.3314 25.947 55.3314L25.8397 55.466C25.9201 55.7889 26.5103 55.4929 26.4566 55.7889L26.8322 55.2507C26.9931 55.3045 26.5907 55.7082 26.9395 55.4929L26.7517 55.762L27.2613 55.3583C26.5907 56.3002 27.5564 55.6813 27.3418 56.1657C27.61 56.1118 28.2002 55.9235 28.3075 56.2733C28.0124 56.7847 28.3075 56.9999 28.3343 57.3767C28.7903 57.5113 29.4341 57.7266 29.7828 58.2379L30.212 57.6189L30.3729 57.6728C30.2656 57.8073 30.2388 57.8881 30.1851 57.9419C29.7828 58.6954 30.6143 57.9419 30.3997 58.4263C30.7216 57.8342 30.3729 58.2917 30.3193 58.211C30.4266 57.8342 30.9362 57.3229 30.8557 57.7266L30.7484 57.8611L31.0703 57.6189C30.7484 58.1033 30.668 58.3994 30.3461 58.8569C30.8289 59.0184 31.6873 58.3994 31.9287 58.9376C31.4995 59.449 32.331 59.0184 31.58 59.8796C32.0896 59.7181 32.0628 59.0991 32.6529 58.5339C32.7066 58.5878 32.9748 58.3994 32.7334 58.7492C32.5456 58.9376 32.3847 59.3413 32.2774 59.3951L32.492 59.449C32.4652 59.5297 32.331 59.6373 32.2774 59.6912C33.0016 59.3951 32.4383 60.7407 33.1358 60.4178C33.404 60.0948 33.0821 60.2294 33.3504 59.9065C34.1282 59.449 33.1894 60.7138 33.8332 60.4178L33.4576 60.8484C33.7795 60.6062 34.1014 60.2294 33.9941 60.7138C33.6186 61.279 33.5381 61.0637 33.2967 61.279C33.3772 61.3866 33.7527 61.4135 34.0209 60.8753C34.2624 60.7946 33.9673 61.3059 33.9405 61.4943C34.0478 61.3597 34.0746 61.0368 34.3428 60.8484C34.2892 61.279 34.5574 61.4405 34.7452 61.6558C34.6379 61.7903 34.5306 62.0056 34.4501 62.0594C35.2012 61.4405 34.3428 62.6246 34.6647 62.6515Z" fill="#FF7800"/>
            <path d="M47.835 67.8186L47.8082 67.6841C47.7277 67.8186 47.6204 67.9532 47.4863 68.0609L47.835 67.8186Z" fill="#FF7800"/>
            <path d="M44.0267 64.6162C43.973 64.6431 43.9462 64.6969 43.8926 64.7508C43.9462 64.7239 43.9999 64.67 44.0267 64.6162Z" fill="#FF7800"/>
            <path d="M42.3906 64.8852C42.5516 64.8044 42.5784 64.6161 42.6589 64.4546C42.5784 64.5622 42.4711 64.6968 42.3906 64.8852Z" fill="#FF7800"/>
            <path d="M51.135 67.98C51.0814 68.0338 51.0277 68.0876 50.9473 68.1953C51.0277 68.1145 51.0814 68.0338 51.135 67.98Z" fill="#FF7800"/>
            <path d="M57.5189 71.6669C57.4921 71.64 57.4652 71.6669 57.3848 71.6938C57.4116 71.7476 57.4652 71.7207 57.5189 71.6669Z" fill="#FF7800"/>
            <path d="M49.4456 67.0918C49.4188 67.0918 49.3651 67.1187 49.2578 67.2264C49.3115 67.2533 49.3919 67.1725 49.4456 67.0918Z" fill="#FF7800"/>
            <path d="M57.2513 71.7478L57.1977 71.6401C57.1708 71.667 57.144 71.694 57.1172 71.7478H57.2513Z" fill="#FF7800"/>
            <path d="M57.3846 72.9051C57.3578 72.8512 57.3042 72.8243 57.3042 72.7705C57.2505 72.9589 57.2773 72.9858 57.3846 72.9051Z" fill="#FF7800"/>
            <path d="M53.9502 68.895C53.8161 69.0296 53.7088 69.0834 53.9502 68.895Z" fill="#FF7800"/>
            <path d="M56.2044 72.4473V72.4204L56.0703 72.555L56.2044 72.4473Z" fill="#FF7800"/>
            <path d="M57.6268 73.3896C57.6 73.3896 57.5732 73.4166 57.5195 73.4704C57.5195 73.4973 57.5195 73.5242 57.5195 73.578C57.5732 73.4973 57.6 73.4435 57.6268 73.3896Z" fill="#FF7800"/>
            <path d="M54.7285 70.6713C54.8895 70.4829 54.9968 70.3484 55.0772 70.2407C55.0236 70.2407 54.9431 70.3215 54.7285 70.6713Z" fill="#FF7800"/>
            <path d="M96.9492 50.0295H97.1102C97.0833 50.0026 97.0297 50.0295 96.9492 50.0295Z" fill="#FF7800"/>
            <path d="M97.3793 58.749C97.3525 58.749 97.3257 58.749 97.2988 58.7759C97.2988 58.8298 97.2988 58.8836 97.3256 58.9912L97.3793 58.749Z" fill="#FF7800"/>
            <path d="M94.9375 38.9688L94.9643 39.0226C94.9643 38.9957 94.9911 38.9688 94.9375 38.9688Z" fill="#FF7800"/>
            <path d="M95.9841 45.5889C95.85 45.6158 95.7964 45.5889 95.7695 45.5889C95.7695 45.6158 95.7964 45.6427 95.9841 45.5889Z" fill="#FF7800"/>
            <path d="M91.9336 62.5708L92.3091 62.3286C92.1214 62.4093 91.9604 62.4901 91.9336 62.5708Z" fill="#FF7800"/>
            <path d="M95.8767 63.1089C95.823 63.1089 95.7426 63.1089 95.6621 63.082C95.6889 63.1089 95.7158 63.1628 95.8767 63.1089Z" fill="#FF7800"/>
            <path d="M95.5547 63.0818C95.5815 63.0818 95.6352 63.0818 95.662 63.0818C95.662 63.0818 95.6352 63.0549 95.5547 63.0818Z" fill="#FF7800"/>
            <path d="M77.5832 2.71793C77.5564 2.6372 77.2345 2.69102 76.9395 2.71793H77.5832Z" fill="#FF7800"/>
            <path d="M91.4512 29.5763L91.6121 29.5225C91.5585 29.5225 91.478 29.5494 91.4512 29.5763Z" fill="#FF7800"/>
            <path d="M74.0684 4.11741L74.122 4.00977C74.0684 4.0905 74.0684 4.11741 74.0684 4.11741Z" fill="#FF7800"/>
            <path d="M90.2442 61.4404C89.815 61.5211 90.2173 61.1443 89.8418 61.3058C89.9491 61.3596 89.6809 61.6019 90.2442 61.4404Z" fill="#FF7800"/>
            <path d="M75.7587 33.7208L75.7051 33.667C75.7051 33.6939 75.7319 33.7208 75.7587 33.7208Z" fill="#FF7800"/>
            <path d="M74.0693 4.11719L74.0156 4.22484C74.0693 4.19792 74.1497 4.1441 74.2034 4.11719C74.1229 4.1441 74.0961 4.1441 74.0693 4.11719Z" fill="#FF7800"/>
            <path d="M88.0703 19.0805C88.124 19.1075 88.1776 19.1075 88.2313 19.1344C88.2581 19.0536 88.1776 19.0536 88.0703 19.0805Z" fill="#FF7800"/>
            <path d="M76.9654 2.71777H76.5898C76.6703 2.7716 76.8044 2.74469 76.9654 2.71777Z" fill="#FF7800"/>
            <path d="M85.2012 13.8324C85.228 13.8324 85.228 13.8593 85.2816 13.8593C85.2548 13.8324 85.2548 13.8055 85.2012 13.8324Z" fill="#FF7800"/>
            <path d="M95.9027 46.0732C95.8759 46.1002 95.8491 46.1271 95.8223 46.154C95.9296 46.1271 96.01 46.0732 95.9027 46.0732Z" fill="#FF7800"/>
            <path d="M84.4227 46.4504C84.4763 46.3427 84.1544 46.3697 83.8594 46.4504C83.8862 46.5042 83.9935 46.5311 84.4227 46.4504Z" fill="#FF7800"/>
            <path d="M83.8862 45.9121C83.8862 45.939 83.8594 45.939 83.8594 45.9659C83.8862 45.939 83.8862 45.939 83.8862 45.9121Z" fill="#FF7800"/>
            <path d="M84.3164 49.5183C84.3969 49.4645 84.4505 49.4376 84.4774 49.3838C84.3969 49.4376 84.3432 49.4914 84.3164 49.5183Z" fill="#FF7800"/>
            <path d="M76.0271 37.9462C76.5635 38.619 77.7706 39.2649 77.8243 40.1261C78.7094 39.9646 78.8167 40.1799 79.1118 40.3683L78.0388 40.8258L78.468 40.8796C78.173 41.0949 78.1998 40.7989 77.8511 41.1219L78.5485 40.9335C78.173 41.0949 78.4949 41.5525 77.5828 41.5255L77.8779 42.306C77.9047 42.4944 78.8167 42.0369 78.629 42.3329C78.3339 42.4944 78.3875 42.3598 78.012 42.5213C77.4487 43.4094 80.3725 42.3329 80.1043 43.0595H79.9433C80.2652 43.0326 80.292 43.221 80.453 43.1672C81.5259 42.6559 79.836 43.3017 80.3993 42.8981C81.3114 42.5482 80.9895 42.8981 81.6601 42.602C81.365 42.8712 81.9283 42.7366 82.0356 42.8173C81.5259 43.221 82.0624 43.3287 81.3918 43.7593C81.7137 43.7323 82.6525 43.4632 82.7867 43.6516C82.1161 44.0822 82.0892 43.8938 81.9015 44.1898L82.438 44.0015C82.4111 44.1898 82.2502 44.2168 82.0088 44.3244C82.0624 44.5128 82.7867 44.1629 82.5453 44.5128L81.982 44.5935C82.2502 44.6743 82.1697 44.755 82.2234 44.9972C81.9283 45.1049 81.9015 45.0241 81.9551 44.9165C81.2041 45.3471 82.3843 44.9703 82.3038 45.078C82.5184 44.9703 82.5721 44.7819 83.1354 44.6474C83.0817 44.7819 83.9401 44.5935 83.35 44.9165L82.7867 44.9972C83.2963 45.051 83.5109 44.8627 83.4036 45.1856C83.35 45.1856 83.2158 45.2394 83.1085 45.2932C83.8596 45.1856 83.3231 45.6431 83.3768 45.9122H83.2158C83.4304 45.9391 83.9401 45.8046 83.9133 45.8584C84.1547 45.5893 84.3424 45.5624 84.8521 45.3471C84.0474 45.8853 85.9787 45.2125 85.5763 45.7238C85.2813 45.8315 84.8789 45.9122 85.174 45.6969C84.2352 45.9661 83.4573 46.2352 82.9744 46.2352C83.2158 46.2621 83.4036 46.3428 83.0013 46.4774L83.8596 46.1814C83.9133 46.2352 83.8864 46.3159 83.8864 46.3697C84.4229 46.1814 84.6912 45.8853 85.1203 45.9122C85.469 45.993 84.2888 46.3428 84.6912 46.2352C85.1203 46.3428 85.63 45.9661 85.4422 46.3159C85.3618 46.3159 85.2008 46.3428 85.2813 46.289C85.013 46.585 85.6032 46.6389 84.6107 47.0964C84.3693 47.1502 84.0742 47.2848 84.1279 47.1771L84.2888 47.1233C83.4841 47.2309 84.557 47.204 83.6182 47.5C84.1547 47.2578 84.1279 47.5539 84.0742 47.7153L84.6912 47.4462C86.6761 47.0695 83.4573 47.9037 83.8328 48.1729C84.3424 48.2267 83.9669 48.0114 84.4497 47.9845C84.3961 48.1729 83.8596 48.442 84.2352 48.5765C84.0206 48.738 83.7255 48.9802 83.0281 49.2763C83.35 49.3032 82.8671 49.8145 83.5914 49.6261C84.0742 49.1686 82.7867 49.6799 83.5646 49.061L84.262 48.8726C84.2888 49.061 84.7448 49.1686 84.5302 49.4108C84.6643 49.3301 84.8253 49.2493 84.9862 49.2224C85.3349 49.3839 86.0592 49.1955 85.9519 49.5454C85.3349 49.8145 85.3886 49.6261 85.3081 49.5454C84.8789 49.8952 85.3349 49.7338 85.2276 50.0836C84.6912 50.2989 85.2008 49.8952 84.6375 50.0836L84.9326 50.2989C84.9058 50.2989 84.8521 50.3258 84.8253 50.3527C85.7373 50.0298 84.8253 50.5949 85.174 50.6757C85.3349 51.0794 86.5688 50.6757 87.4004 50.6219C87.1858 50.7833 86.9444 50.891 86.703 50.9448C87.0785 50.6757 86.7566 50.8372 86.5152 50.891C86.6761 50.9986 85.7373 51.5369 85.3349 51.6176C85.6836 51.7253 85.7909 51.3485 86.1128 51.3754L86.1665 51.6983C86.6225 51.4831 86.6761 51.3216 87.1053 51.3485C87.2931 51.4292 87.2126 51.5369 87.2394 51.7253C86.998 51.7791 86.542 52.0482 86.542 51.9136C86.4079 52.0751 86.4347 52.2097 86.8907 52.0751C87.2394 51.7253 87.4004 52.2366 88.071 51.806L87.7223 52.1559C87.7223 52.102 87.4004 52.2366 87.4808 52.1289C86.7834 52.4519 87.7491 52.2097 87.8295 52.2366C87.7223 52.3442 87.7223 52.5595 87.454 52.6672C87.6686 52.6403 87.5613 52.8556 87.2126 53.017C87.3735 53.044 87.6686 52.8556 87.91 52.7748L87.9637 53.0978C87.5881 53.2593 86.5152 53.7168 86.3274 53.7168C86.7298 53.6899 87.5077 53.3131 87.5345 53.5015C86.7298 53.6899 87.0517 53.959 86.086 54.1743C85.5763 54.4972 85.7105 54.7663 85.9519 54.8471C86.5957 54.7125 86.2201 54.551 86.8371 54.3088C87.2126 54.6587 88.9293 54.0397 88.7684 54.4703L88.9025 54.3088C89.3317 54.3627 89.2512 54.3896 89.8145 54.3088C89.0366 54.551 87.8564 55.3315 88.1514 55.6006C88.5538 55.4661 88.822 55.1431 89.439 54.9547L89.6267 55.1431C89.5731 55.17 89.439 55.1969 89.3317 55.2238C89.6804 55.3046 88.4733 55.9774 89.3853 55.6813L88.3392 56.3272L88.7952 56.0581C89.1707 55.9505 89.3853 56.1119 89.5463 56.1119C90.0559 56.1658 89.7609 56.3811 89.3049 56.704C89.5999 56.5425 90.2973 56.1658 90.4583 56.3003C89.2244 56.7847 90.1364 56.8386 89.4926 57.0808C89.5463 57.1346 89.1976 57.4306 89.7072 57.2423L88.9293 57.5383C90.0023 57.1346 90.0559 57.4306 90.3242 57.5383C88.8489 58.0496 90.5119 57.7267 89.2244 58.3187C90.2437 57.9689 89.7609 58.534 90.6192 58.238C90.7265 58.3726 89.7877 58.7224 89.4926 58.8839L89.895 58.8032C89.4658 59.0723 89.4926 59.3683 89.2512 59.6644L90.1901 59.476L89.8145 59.6913C90.0559 59.6374 90.2169 59.7182 90.5119 59.5029L90.4851 59.6105C91.4508 59.2607 90.807 59.6374 91.263 59.6374C91.1289 59.7451 90.8875 59.8258 90.7533 59.8258C90.7802 59.9066 90.2705 60.068 89.9755 60.2295C90.19 60.068 91.7995 59.8797 92.1482 59.476C92.5237 59.3145 92.8724 59.3414 92.7383 59.476L91.9068 59.8527L92.8456 59.6105C93.0334 59.6913 92.4969 59.9604 92.4433 60.1219C92.336 60.0411 90.6997 60.5255 90.8338 60.7947C90.6729 60.687 90.1632 60.7947 89.9486 60.7947C89.9486 60.8754 89.8682 60.9292 89.4658 60.9831C89.8145 61.0907 90.0291 60.8485 90.2169 61.0369C89.439 61.3329 89.2244 61.4675 89.0366 61.7635L89.5463 61.4136C89.6536 61.3867 89.7072 61.3598 89.7609 61.3598C89.8145 61.2791 89.9486 61.1983 90.2169 61.0907C90.2169 61.1445 91.263 60.983 90.807 61.1983C91.9336 60.5255 91.88 61.2253 92.5505 60.8216C92.792 60.7678 92.8993 60.9023 92.4969 61.0638C91.8531 61.0907 91.6654 61.5482 91.1289 61.7097C91.3703 61.6828 91.6385 61.3329 91.9604 61.3329C92.0409 61.4136 91.6117 61.6828 91.3971 61.8442H91.2362L90.9411 62.1403C91.3435 62.0326 91.5312 61.7366 91.7995 61.8173C91.6654 61.925 91.9068 62.0057 91.6117 62.1134C91.0484 62.2479 90.3778 62.5709 90.1901 62.4901C90.2973 62.5709 90.5119 62.8938 91.1825 62.4901L91.2094 62.6247C91.5044 62.4094 92.0141 61.9519 92.2018 62.1941L92.0409 62.2479L92.6847 62.221L92.3091 62.4632C92.4969 62.3825 92.6847 62.3556 92.7115 62.4094C92.4969 62.517 92.4164 62.6247 92.0945 62.7323C92.2018 62.9207 92.6042 62.7593 92.8188 62.6785C92.9261 62.7593 92.7651 62.8669 92.2823 63.0015C92.2287 63.1899 92.4433 63.4321 92.0677 63.6743C92.4969 63.755 92.2018 63.5666 92.792 63.4859C91.5044 64.1856 92.5237 64.3471 92.8188 64.6162C93.9722 64.078 92.9797 64.6431 94.0795 64.3202C93.6772 64.4009 93.2748 64.993 92.8456 64.8046L93.0334 64.9391C92.4432 65.3159 92.4433 64.8315 91.6117 65.3428C91.719 65.5312 93.0602 65.1544 92.7115 65.5581C91.8531 65.8003 93.0602 65.6389 92.1214 65.9349C91.7995 65.9887 91.88 65.908 91.7727 65.8542L91.6117 65.9618C91.5312 66.5001 92.631 65.7196 93.3016 65.7196C93.5162 65.9349 92.7115 66.1771 92.336 66.3386C92.2018 66.4462 92.3628 66.527 92.6042 66.5001C92.0409 66.527 93.0066 66.0156 93.5699 65.8811C92.6578 66.3655 93.6503 66.3117 94.0527 66.2309C94.911 65.4774 93.999 65.9618 94.9379 65.1814C94.616 65.2352 93.7576 65.585 94.0527 65.2352C94.5355 65.2083 94.5355 65.0468 94.6428 64.9661C94.16 65.1814 94.3746 64.8853 94.16 64.9122C94.5355 64.6969 95.3402 64.6162 95.4475 64.3202L94.2673 64.7238C94.4014 64.5624 95.1256 64.4278 94.7769 64.374C95.4207 64.2394 95.6889 63.9972 95.984 64.1587C96.8692 63.4859 95.2866 63.9165 94.7769 63.8357C94.8574 63.8357 95.0183 63.7819 95.0988 63.7819C94.7769 63.8357 94.7501 63.755 94.6696 63.7012C94.8842 63.459 95.2329 63.6204 95.528 63.459L95.4207 63.2168C95.4475 63.1898 95.4743 63.1899 95.5012 63.1899C95.3134 63.1899 95.2061 63.1629 95.4743 63.0284C95.8767 62.9476 96.2791 62.84 96.5741 62.7862L95.6889 62.84C96.0913 62.7323 96.2791 62.3825 96.601 62.4632L96.3059 62.1403L97.0838 61.8173C96.9228 61.7904 96.7619 61.8442 96.7082 61.9788C96.8424 61.7904 95.1256 61.925 96.6814 61.4136C95.9304 61.3598 96.1449 61.1714 95.6085 60.9561C96.44 60.9561 96.4132 60.2833 96.8424 60.4448C97.1106 60.1488 96.2522 60.4179 96.0913 60.3372C96.3864 60.0949 97.1642 59.8527 97.4861 59.8797L97.0838 59.8527L97.2447 59.7989L96.7619 59.8258C97.1106 59.5298 97.5398 59.5029 97.5666 59.3145L96.8692 59.5567L97.2447 59.2876C96.9497 59.4491 96.7619 59.4221 96.6814 59.3145L96.8424 59.2607L96.6546 59.1799C97.1106 59.153 96.7619 58.9916 97.2715 58.8839C97.2715 58.7493 97.2447 58.7493 97.057 58.5879L96.601 58.8032C96.0913 58.6955 97.2984 58.534 97.2447 58.2918L96.7082 58.5071C97.513 57.8343 95.984 58.1573 96.4937 57.6998C96.6814 57.7805 97.2984 57.5114 97.1374 57.5652C96.8692 57.4306 96.896 57.0539 96.1449 57.1077C96.896 56.7309 97.1374 56.6233 97.4057 56.2734C97.2984 56.1389 97.2179 56.1389 96.7351 56.2734C96.9765 56.0043 96.4132 55.8966 97.0033 55.6813C96.5473 55.8159 97.0301 55.5199 96.6278 55.5737L96.8424 55.4661L96.3059 55.6813C97.4057 54.9547 95.4475 55.493 96.4132 54.8202H96.5741L96.3327 54.7933C96.5741 54.6856 96.7351 54.6856 97.0301 54.551L96.9228 53.9859L96.5473 54.255C96.44 54.1743 95.9035 54.2819 96.1718 54.0397C97.057 53.9321 96.1449 53.8513 96.7619 53.5822L97.0301 53.6091C96.9228 53.4746 96.9228 53.4746 96.3864 53.6898C96.1181 53.5553 97.3788 53.1516 96.7082 53.2054L96.7351 53.34C96.44 53.5015 95.9572 53.5822 95.9304 53.4746C96.0108 53.4207 96.2254 53.2593 96.3059 53.3131C96.0376 53.2323 96.2254 52.8825 95.984 52.9094C96.1181 52.7479 96.5205 52.6403 96.6814 52.6403C96.0913 52.4788 96.7351 52.4519 96.1181 52.2904L96.44 52.1828L96.0376 52.2097L96.6278 51.7791L96.2522 51.9944C96.1449 51.9136 95.9035 51.9136 96.0376 51.7253L96.5205 51.5907C96.1449 51.3754 97.1374 50.9448 96.3864 50.891C96.4668 50.8372 96.6278 50.8372 96.7082 50.8102C95.8767 50.8102 97.4325 50.272 96.4668 50.3527C96.6278 50.2989 96.8155 50.2182 96.9497 50.1644H96.601L97.2179 49.9221L96.2791 50.1644L96.896 49.8414L96.5741 49.7876C97.7007 49.1955 96.7351 49.357 97.5666 48.8187L96.7887 49.1417C94.9915 49.3032 97.2715 47.7153 96.3327 47.4462L96.9497 47.204L96.1449 47.2578C96.5741 46.9349 96.7082 47.1233 97.0033 46.9618C96.5741 46.8542 96.0645 47.204 95.7694 46.9887C96.1181 46.6658 96.2522 46.8542 96.4937 46.8542C96.0913 46.6927 95.6085 46.4505 95.8767 46.1006C95.7962 46.1275 95.6889 46.1544 95.6353 46.1814C95.2866 46.1006 95.4743 45.7508 95.3671 45.5893C95.6621 45.4816 95.7158 45.5085 95.7962 45.5355C95.7962 45.4547 95.9572 45.2663 95.6621 45.3202L96.2254 45.1856C96.2791 44.9972 95.6889 44.8896 96.2791 44.6204C96.0376 44.7281 95.5816 44.9165 95.5548 44.755C96.4668 44.3244 95.0183 44.5397 95.4475 44.136C95.6889 44.0822 95.7962 44.2168 95.7962 44.1629C96.0108 43.9476 95.528 44.0284 95.2061 44.0553L95.6085 43.9207L94.8842 43.6247C95.7962 43.1672 94.5623 43.221 95.2598 42.9788C95.2329 42.7904 94.911 43.3017 94.6965 43.1134C95.072 42.8981 94.4282 42.9788 95.0452 42.7635H95.1256L95.0183 42.6289L95.6621 42.4944C95.4743 42.4136 94.8306 42.5482 94.3746 42.7366C94.6696 42.4675 94.3209 42.4136 94.8306 42.1445H94.9915C94.616 41.8754 96.4132 40.9066 95.2866 41.0142C95.3671 40.9604 95.528 40.9066 95.528 40.9604L95.4743 40.7182L95.9572 40.5836L95.1256 40.5029L95.4207 40.3952C95.4475 40.0992 95.1525 39.8032 94.9379 39.534H95.0988C94.4819 39.3995 95.2598 39.1034 94.8306 38.9689C94.911 38.942 94.9379 38.942 94.9647 38.942L94.8574 38.7267L95.1793 38.6459C94.455 38.7536 95.8499 37.8386 95.3402 38.1615C95.0183 38.1884 94.5892 38.1615 94.2136 38.2961C94.0795 38.0808 94.5892 38.0808 94.7769 37.8386C94.7501 37.6502 94.1868 37.8386 94.3746 37.4887L94.6965 37.3811C94.5892 37.3003 94.3477 37.3003 94.2404 37.1658H94.4014C93.6503 37.1658 95.1793 36.493 93.7576 36.8428C93.9722 36.6275 93.704 36.5199 94.3209 36.2777C93.8113 36.1162 93.5162 35.9547 93.1407 35.7394C94.1332 35.2819 93.0602 35.6856 93.543 35.2819L93.0066 35.5241C92.7651 35.1204 93.8917 34.0709 93.4894 33.6672L94.0259 33.425L93.3821 33.5595C93.4357 32.9406 93.3553 32.187 93.2211 31.7564C92.8724 31.7295 92.1482 31.7833 92.2555 31.4873H92.336C91.88 31.2451 91.4776 30.9221 91.6385 30.3839C91.88 30.3301 92.0141 30.2224 92.175 30.1955C91.5312 30.3301 92.0409 29.9802 92.0409 29.8726L91.6654 30.1417C91.1021 30.2224 91.5312 29.8726 91.9068 29.6573L91.263 29.7111C91.3167 29.6842 91.3971 29.6304 91.4776 29.5765L91.1825 29.6573L91.8531 29.2805C91.6922 29.2805 91.3971 29.119 90.6997 29.3343C90.9411 29.2267 91.0484 28.9845 91.2362 29.0652L91.1825 28.3117L90.9679 28.527C90.4315 28.7692 90.0023 28.6884 90.2169 28.5C90.6997 28.4462 90.9948 28.204 91.3703 27.9887C91.0484 28.0156 90.9143 28.2578 90.6192 28.3386C90.2169 28.3655 89.9218 28.204 90.1364 28.0425L90.3778 28.0156C90.1096 27.9349 91.0216 27.4774 90.9143 27.3428C90.4315 27.3697 90.7802 27.1275 89.8682 27.5312C89.5999 27.3967 90.4583 27.2083 90.5388 27.1006C90.0559 27.1814 90.2169 26.8046 90.6729 26.5624C89.278 27.0199 90.9411 25.8357 89.7877 26.2394L90.3778 25.8088C90.0828 25.9165 89.3585 26.1856 89.1976 26.1049C89.4658 25.8357 90.0291 25.6474 90.3242 25.4859L89.1439 25.8627C90.0559 24.6516 88.8757 24.0326 89.5463 22.8216C89.1707 22.5794 88.4465 22.3372 88.4465 21.8527L88.527 21.7989L88.6611 21.2607L88.2587 21.772C88.0978 21.7451 87.8564 21.772 87.8295 21.6644C88.1246 21.0185 88.4465 20.1842 87.6418 19.8612C86.1933 20.0496 88.6879 19.1346 87.615 19.1884C87.7491 19.1615 87.9368 19.1077 88.071 19.0808C87.4808 18.8924 87.1858 18.7848 86.2469 18.7309C87.5613 18.2196 86.1128 18.5156 86.8102 18.2465L86.2738 18.4349C86.5688 18.2196 86.5957 17.9774 86.9712 17.8428L86.2469 17.9505L86.7834 17.7083C86.7298 17.4661 86.1128 17.1969 87.1321 16.6318C86.1128 16.4434 85.9787 15.5015 85.9251 14.721C85.4422 14.8017 85.3349 14.6403 85.2276 14.5057L85.7909 14.0751C85.5227 13.9944 84.6643 14.1828 85.013 13.8598C85.0935 13.8329 85.1472 13.806 85.174 13.806C84.9862 13.6983 85.2545 13.4023 84.6107 13.51C84.5839 13.3216 84.8521 12.9986 85.4691 12.8102C84.3961 13.2408 85.4691 12.3797 85.4691 12.3797C85.4691 12.3797 85.174 9.87682 84.0474 7.42781C82.9208 4.95189 80.9358 2.5567 77.5828 2.71818C77.0195 2.87965 76.6172 2.82583 76.0271 3.17568C75.7588 3.09495 76.644 2.63744 76.1075 2.82583C75.8393 3.17568 74.7127 3.33716 74.1762 3.84849L73.9884 3.76775C73.6129 3.90231 74.4981 3.76775 73.8007 4.03687L74.7932 3.6601C74.6859 3.82158 74.5249 3.98305 74.203 4.17144C74.6322 4.11761 75.9734 3.60628 75.5174 4.0907L75.4369 4.03687C75.5711 4.22526 74.8468 4.44056 74.7127 4.54821V4.49438L74.2835 4.87115C74.5517 4.60203 73.6666 4.73659 73.7738 4.81733C73.6129 5.16719 73.9884 4.65585 74.1762 4.7635C74.2835 4.84424 73.747 5.03263 73.4251 5.16719L73.5324 5.35557C73.0764 5.54396 73.5056 5.22101 73.0764 5.49013L73.6666 5.51704C72.54 6.05529 74.3372 5.54396 73.291 6.13602C72.9423 6.0822 72.9155 6.32441 72.54 6.45897L72.7814 6.86265C72.6472 6.9703 72.379 6.88957 72.4595 6.94339C72.1644 7.15869 72.8082 6.94339 72.8082 6.99721C72.5131 7.15869 72.9691 7.32016 72.1912 7.64311C71.8157 8.15444 73.2106 7.34707 72.8887 7.80458C72.4327 8.04679 72.6741 7.64311 72.2717 7.96605L72.5668 8.18135C72.3254 8.26209 71.7889 8.45047 71.8425 8.289C71.5743 9.31166 69.2943 10.7918 70.2063 11.2224C69.6966 11.5454 69.8039 11.3032 69.4016 11.4108C70.3404 11.5992 68.4895 12.6488 68.7578 13.0525L69.2138 12.8641C68.0604 14.0751 69.2138 14.425 68.9187 15.3669L69.2138 15.1516C69.6966 15.044 69.8039 15.1785 70.0453 15.2054C69.8307 15.3131 69.026 15.5284 69.3211 15.6629C69.4552 15.5553 69.5893 15.3938 69.8307 15.34C68.8919 16.4165 69.6966 17.5199 69.5357 18.7309C70.4209 19.8882 70.1258 21.6644 70.9305 22.8216C70.8232 22.6332 71.9767 22.2564 71.7889 22.4986C70.0453 23.7097 72.4058 23.0638 71.2524 24.0057C72.1644 24.4901 70.7964 25.8357 72.54 25.9165L72.0035 26.1587C71.7889 26.374 72.1912 26.2394 72.2717 26.3202L72.1108 26.374C72.0035 26.7238 72.7009 26.8046 72.4863 27.0468L73.1033 26.8046C73.2105 26.9391 72.6741 27.0737 73.0764 27.1006L72.7814 27.2352L73.4251 27.1814C72.3522 27.6119 73.5056 27.6389 73.0764 27.9618C73.3447 28.0695 73.9616 28.2578 73.8811 28.6615C73.3447 28.9576 73.5056 29.3074 73.3178 29.6573C73.6397 30.061 74.0957 30.6261 74.1226 31.2989L74.82 31.0029L74.9273 31.1374C74.7663 31.1913 74.7127 31.2451 74.6322 31.272C73.8811 31.7026 75.0077 31.5142 74.5786 31.8372C75.1687 31.5142 74.6322 31.7026 74.6054 31.595C74.8736 31.3258 75.5979 31.1644 75.3296 31.4873L75.1687 31.5411L75.5711 31.5142C75.0346 31.7564 74.82 31.9448 74.2835 32.187C74.6054 32.6445 75.6783 32.5907 75.6247 33.2097C75.0077 33.3981 75.9198 33.5057 74.8468 33.8556C75.3565 33.9901 75.6783 33.4519 76.4831 33.2904C76.5099 33.3712 76.8318 33.3442 76.4562 33.5326C76.188 33.5865 75.8393 33.8556 75.732 33.8287L75.8929 33.9901C75.8125 34.044 75.6515 34.044 75.5711 34.0709C76.3489 34.2323 75.1955 35.0935 75.9466 35.2281C76.3489 35.0935 76.0002 35.0397 76.3758 34.9051C77.2878 34.959 75.8393 35.5241 76.5099 35.6587L75.9466 35.7933C76.3489 35.7663 76.8318 35.6318 76.4831 35.9816C75.8661 36.2777 75.9198 36.0355 75.5979 36.0624C75.6247 36.1969 75.9198 36.4661 76.4294 36.1431C76.6976 36.2238 76.1612 36.493 76.0271 36.6544C76.188 36.6006 76.3758 36.3315 76.6976 36.3046C76.4294 36.6544 76.5904 36.9774 76.6172 37.2465C76.4562 37.3003 76.2416 37.408 76.1612 37.4349C77.1268 37.1927 75.732 37.7309 76.0271 37.9462Z" fill="#FF7800"/>
            <path d="M84.6641 50.4602L84.7177 50.3257C84.5836 50.3795 84.4227 50.4333 84.2617 50.4602H84.6641Z" fill="#FF7800"/>
            <path d="M83.1077 45.3467C83.054 45.3467 83.0004 45.3467 82.9199 45.3736C82.9467 45.3736 83.0272 45.3736 83.1077 45.3467Z" fill="#FF7800"/>
            <path d="M81.5254 44.5664C81.6863 44.5933 81.8205 44.4587 81.9814 44.3511C81.8473 44.4049 81.7132 44.4587 81.5254 44.5664Z" fill="#FF7800"/>
            <path d="M87.4011 52.6133C87.3474 52.6133 87.2401 52.6402 87.1328 52.694C87.2401 52.6671 87.3206 52.6402 87.4011 52.6133Z" fill="#FF7800"/>
            <path d="M89.9219 60.5792C89.9487 60.5523 89.9755 60.5523 90.0023 60.5254C89.9755 60.5254 89.9487 60.5523 89.9219 60.5792Z" fill="#FF7800"/>
            <path d="M90.7527 59.7716C90.7527 59.7447 90.7258 59.7178 90.6185 59.7178C90.5917 59.7716 90.6722 59.7716 90.7527 59.7716Z" fill="#FF7800"/>
            <path d="M86.4353 50.8102C86.4085 50.7833 86.3548 50.7833 86.2207 50.8102C86.2207 50.864 86.328 50.8371 86.4353 50.8102Z" fill="#FF7800"/>
            <path d="M90.4589 59.6912L90.4857 59.5566C90.432 59.5836 90.4052 59.5836 90.3516 59.6105L90.4589 59.6912Z" fill="#FF7800"/>
            <path d="M89.9217 60.7406C89.9217 60.6867 89.8949 60.6329 89.9485 60.5791C89.7876 60.6868 89.7876 60.7406 89.9217 60.7406Z" fill="#FF7800"/>
            <path d="M89.2783 55.1699C89.0905 55.1968 88.9564 55.1699 89.2783 55.1699Z" fill="#FF7800"/>
            <path d="M89.1981 59.6101C89.2249 59.6101 89.2249 59.5832 89.1981 59.6101Z" fill="#FF7800"/>
            <path d="M89.8421 61.3058C89.8152 61.2789 89.7884 61.2789 89.7079 61.3058C89.6811 61.3327 89.6811 61.3597 89.6543 61.3866C89.7348 61.3327 89.7884 61.3327 89.8421 61.3058Z" fill="#FF7800"/>
            <path d="M88.957 57.1613C89.1984 57.1075 89.3594 57.0536 89.4667 56.9998C89.4667 56.9729 89.3326 56.9998 88.957 57.1613Z" fill="#FF7800"/>
            <path d="M130.186 55.2778C130.239 55.3047 130.32 55.3586 130.454 55.4124C130.346 55.3586 130.266 55.3047 130.186 55.2778Z" fill="#FF7800"/>
            <path d="M134.289 51.2676L134.396 51.3752C134.396 51.3214 134.37 51.2945 134.289 51.2676Z" fill="#FF7800"/>
            <path d="M128.011 57.8072C127.985 57.7803 127.985 57.7803 127.958 57.7803C127.931 57.8072 127.877 57.861 127.797 57.9687L128.011 57.8072Z" fill="#FF7800"/>
            <path d="M141.183 41.6602L141.156 41.7409C141.183 41.714 141.21 41.714 141.183 41.6602Z" fill="#FF7800"/>
            <path d="M136.971 47.3114C136.863 47.2306 136.837 47.1768 136.81 47.1499C136.783 47.1499 136.81 47.2037 136.971 47.3114Z" fill="#FF7800"/>
            <path d="M121.494 56.381L121.923 56.4887C121.762 56.4079 121.575 56.3541 121.494 56.381Z" fill="#FF7800"/>
            <path d="M121.574 60.0679C121.601 60.0679 121.628 60.0948 121.655 60.0948C121.628 60.0948 121.601 60.0948 121.574 60.0679Z" fill="#FF7800"/>
            <path d="M123.72 59.745C123.693 59.6911 123.639 59.6373 123.586 59.5835C123.586 59.6373 123.559 59.6642 123.72 59.745Z" fill="#FF7800"/>
            <path d="M123.506 59.5029C123.533 59.5298 123.56 59.5568 123.586 59.5837C123.586 59.5568 123.586 59.5298 123.506 59.5029Z" fill="#FF7800"/>
            <path d="M154.997 1.74944C155.051 1.66871 154.756 1.48032 154.541 1.31885L154.997 1.74944Z" fill="#FF7800"/>
            <path d="M145.689 32.1333L145.85 32.214C145.797 32.1871 145.743 32.1602 145.689 32.1333Z" fill="#FF7800"/>
            <path d="M151.482 0.376522L151.59 0.349609C151.509 0.349609 151.482 0.349609 151.482 0.376522Z" fill="#FF7800"/>
            <path d="M121.227 54.3358C120.878 54.0667 121.441 54.1205 121.066 53.9321C121.092 54.0398 120.744 54.0129 121.227 54.3358Z" fill="#FF7800"/>
            <path d="M151.484 0.376953L151.35 0.403865C151.43 0.430777 151.484 0.430778 151.564 0.45769C151.511 0.430778 151.484 0.403865 151.484 0.376953Z" fill="#FF7800"/>
            <path d="M150.061 22.0679C150.087 22.0948 150.087 22.0948 150.114 22.1217L150.061 22.0679Z" fill="#FF7800"/>
            <path d="M150.92 21.772C150.947 21.8258 150.974 21.8796 151 21.9334C151.081 21.9065 151.027 21.8527 150.92 21.772Z" fill="#FF7800"/>
            <path d="M154.542 1.31887L154.273 1.07666C154.3 1.13048 154.408 1.21122 154.542 1.31887Z" fill="#FF7800"/>
            <path d="M152.664 15.6899C152.664 15.7169 152.664 15.7438 152.691 15.7707C152.691 15.7438 152.691 15.7169 152.664 15.6899Z" fill="#FF7800"/>
            <path d="M136.568 47.6074C136.515 47.6074 136.488 47.6074 136.461 47.6074C136.541 47.6343 136.622 47.6612 136.568 47.6074Z" fill="#FF7800"/>
            <path d="M128.495 39.3188C128.602 39.2919 128.387 39.0766 128.119 38.8882C128.066 38.9689 128.119 39.0497 128.495 39.3188Z" fill="#FF7800"/>
            <path d="M128.495 38.5381C128.468 38.5381 128.468 38.5381 128.441 38.5381C128.468 38.565 128.495 38.565 128.495 38.5381Z" fill="#FF7800"/>
            <path d="M125.812 42.3062C125.812 42.3062 125.839 42.3062 125.866 42.3331C125.839 42.3062 125.839 42.3062 125.812 42.3062Z" fill="#FF7800"/>
            <path d="M126.135 41.4448C126.215 41.4717 126.296 41.4717 126.323 41.4717C126.269 41.4448 126.188 41.4448 126.135 41.4448Z" fill="#FF7800"/>
            <path d="M128.897 27.0467C128.79 27.9079 129.139 29.2804 128.575 29.9263C129.3 30.4377 129.219 30.7068 129.3 31.0297L128.227 30.5722L128.468 30.9221C128.119 30.8683 128.334 30.6799 127.878 30.653L128.495 31.0297C128.119 30.8683 128.012 31.4334 127.395 30.7606L127.047 31.5411C126.939 31.7025 127.878 32.0524 127.529 32.1062C127.207 31.9986 127.342 31.9447 126.966 31.7833C125.92 31.9986 128.736 33.3711 128.012 33.694L127.878 33.5864C128.119 33.8017 128.012 33.9632 128.146 34.0439C129.246 34.4476 127.61 33.694 128.307 33.8017C129.192 34.2323 128.71 34.2323 129.38 34.5283C129.005 34.5014 129.487 34.8243 129.487 34.9589C128.844 34.8782 129.112 35.3357 128.334 35.1742C128.575 35.3895 129.407 35.9008 129.353 36.1161C128.575 35.9277 128.683 35.7663 128.334 35.847L128.844 36.1161C128.683 36.2507 128.549 36.143 128.307 36.0354C128.2 36.1969 128.951 36.4929 128.522 36.5736L128.066 36.2238C128.2 36.466 128.066 36.4929 127.932 36.6813C127.637 36.5467 127.69 36.466 127.824 36.4391C126.993 36.1969 128.066 36.7889 127.959 36.8159C128.2 36.8966 128.361 36.7889 128.844 37.1119C128.71 37.1657 129.434 37.677 128.79 37.4617L128.334 37.1119C128.629 37.5156 128.924 37.5425 128.602 37.704C128.575 37.677 128.441 37.6232 128.334 37.5694C128.924 38.0538 128.227 37.9731 128.066 38.1884L127.959 38.0807C128.093 38.2691 128.522 38.5382 128.468 38.5651C128.844 38.5651 128.978 38.6728 129.487 38.8881C128.549 38.6728 130.346 39.6416 129.702 39.6955C129.407 39.5609 129.085 39.3187 129.434 39.3725C128.602 38.8612 127.851 38.5113 127.529 38.1345C127.69 38.3498 127.744 38.5382 127.395 38.3229L128.2 38.7266C128.2 38.8074 128.119 38.8343 128.093 38.8881C128.602 39.1572 129.005 39.1572 129.273 39.4532C129.461 39.7493 128.388 39.1572 128.736 39.3456C128.951 39.7493 129.568 39.8569 129.192 39.9646C129.139 39.9108 129.005 39.8031 129.112 39.8031C128.71 39.83 129.058 40.2875 128.066 39.8838C127.851 39.7493 127.556 39.6147 127.69 39.5878L127.851 39.6685C127.234 39.1572 127.985 39.9108 127.1 39.4532C127.637 39.6955 127.395 39.8838 127.261 39.9377L127.878 40.1799C129.514 41.3909 126.698 39.5878 126.751 40.0722C127.047 40.4759 126.966 40.0722 127.315 40.3952C127.127 40.5028 126.564 40.3144 126.725 40.6374C126.456 40.5836 126.081 40.5566 125.383 40.2606C125.598 40.5297 124.874 40.5297 125.518 40.9065C126.188 40.9334 124.927 40.3413 125.92 40.5028L126.537 40.8796C126.403 41.0411 126.644 41.4447 126.322 41.4717C126.456 41.4986 126.644 41.5793 126.778 41.66C126.912 42.0368 127.529 42.4405 127.207 42.602C126.591 42.3598 126.751 42.2521 126.751 42.1176C126.188 42.0637 126.644 42.279 126.322 42.4405C125.786 42.1983 126.43 42.279 125.947 42.0099L125.974 42.3867C125.947 42.3598 125.893 42.3598 125.866 42.3329C126.725 42.7904 125.679 42.5212 125.866 42.8173C125.652 43.221 126.805 43.8668 127.422 44.432C127.154 44.3782 126.912 44.2974 126.725 44.1629C127.154 44.2436 126.859 44.1091 126.644 43.9745C126.671 44.1629 125.625 43.8668 125.33 43.6246C125.491 43.9745 125.839 43.7592 126.054 44.0283L125.839 44.2974C126.295 44.4858 126.456 44.4051 126.725 44.728C126.778 44.9164 126.671 44.9433 126.537 45.1048C126.322 44.9702 125.839 44.8357 125.92 44.7011C125.705 44.7011 125.625 44.8357 126.027 45.0779C126.537 45.0779 126.269 45.5623 127.02 45.7776H126.51C126.537 45.7507 126.242 45.5892 126.376 45.5623C125.678 45.2932 126.483 45.8045 126.537 45.9122C126.376 45.9122 126.215 46.0467 125.947 45.9391C126.108 46.1006 125.893 46.1544 125.518 46.0198C125.598 46.1813 125.947 46.2351 126.161 46.3697L125.947 46.6388C125.571 46.4773 124.498 45.9929 124.391 45.8853C124.686 46.1813 125.491 46.4773 125.357 46.6119C124.686 46.1544 124.686 46.5581 123.881 45.9929C123.291 45.8314 123.184 46.1275 123.291 46.3697C123.828 46.7464 123.694 46.3697 124.284 46.6657C124.284 47.204 125.92 48.0382 125.464 48.2266H125.678C125.92 48.6034 125.866 48.5227 126.295 48.8994C125.598 48.4957 124.203 48.1459 124.203 48.5765C124.552 48.7918 125.008 48.7379 125.544 49.0878V49.3569C125.491 49.3569 125.357 49.2493 125.276 49.1955C125.437 49.5184 124.15 49.0878 124.981 49.5722L123.801 49.2493L124.31 49.4108C124.659 49.6261 124.659 49.8952 124.766 50.0028C125.062 50.4334 124.713 50.3527 124.176 50.245C124.498 50.3527 125.222 50.5949 125.249 50.8371C124.069 50.245 124.632 50.9986 124.015 50.6756C123.989 50.7564 123.559 50.7025 124.042 50.9447L123.318 50.568C124.337 51.1062 124.176 51.3215 124.257 51.6176C122.889 50.864 124.257 51.8867 122.942 51.3484C123.881 51.8598 123.13 51.8867 123.935 52.3173C123.908 52.5057 123.023 52.0212 122.701 51.9136L123.023 52.1558C122.54 52.0212 122.326 52.2634 121.923 52.2904L122.674 52.8824L122.272 52.7479C122.46 52.8824 122.54 53.0708 122.889 53.1515L122.808 53.2054C123.72 53.6629 122.996 53.4476 123.291 53.8244C123.13 53.7974 122.916 53.6629 122.808 53.5821C122.755 53.6629 122.299 53.3938 121.977 53.2861C122.245 53.3399 123.452 54.4164 123.989 54.3895C124.364 54.551 124.579 54.847 124.364 54.847L123.506 54.4702L124.31 55.0085C124.364 55.1969 123.801 54.9816 123.667 55.0623C123.667 54.9278 122.218 54.0127 122.084 54.3088C122.057 54.1204 121.628 53.7974 121.494 53.636C121.44 53.6898 121.333 53.6629 121.038 53.3938C121.172 53.7436 121.494 53.7167 121.494 53.9858C120.77 53.6091 120.501 53.5552 120.153 53.6091L120.77 53.7436C120.85 53.7974 120.904 53.8513 120.957 53.8782C121.065 53.8782 121.199 53.9051 121.467 54.0397C121.44 54.0666 122.245 54.7663 121.789 54.551C123.05 54.9008 122.486 55.3853 123.238 55.6006C123.452 55.7351 123.398 55.8966 123.023 55.7351C122.567 55.2776 122.111 55.4391 121.628 55.143C121.816 55.3314 122.245 55.2776 122.486 55.5198C122.486 55.6544 121.977 55.4929 121.735 55.4391L121.628 55.3314H121.226C121.574 55.5467 121.923 55.4929 122.03 55.7351C121.843 55.7082 121.977 55.9504 121.682 55.7889C121.226 55.466 120.528 55.17 120.448 54.9816C120.448 55.1161 120.341 55.4929 121.118 55.7082L121.038 55.8159C121.387 55.8966 122.057 55.9504 122.03 56.2734L121.896 56.1926L122.352 56.6501L121.923 56.5425C122.111 56.6232 122.272 56.7578 122.218 56.8116C121.977 56.704 121.87 56.7309 121.574 56.5694C121.521 56.7847 121.896 56.9462 122.084 57.0807C122.084 57.2153 121.896 57.1884 121.494 56.8923C121.306 57 121.279 57.296 120.85 57.1884C121.065 57.5651 121.038 57.2153 121.467 57.5921C120.099 57.1076 120.636 57.9957 120.609 58.3994C121.762 58.8838 120.689 58.5609 121.682 59.153C121.36 58.9108 120.662 59.0184 120.501 58.5609L120.528 58.8031C119.858 58.6147 120.206 58.2649 119.268 58.0227C119.214 58.238 120.367 58.9915 119.831 59.0184C119.08 58.534 119.992 59.3414 119.16 58.83C118.892 58.6416 119.026 58.6147 118.999 58.5071L118.812 58.4532C118.356 58.7493 119.67 59.0722 120.099 59.5566C120.072 59.8796 119.375 59.449 118.999 59.2606C118.812 59.2337 118.892 59.4221 119.053 59.5836C118.651 59.1799 119.697 59.5566 120.153 59.8796C119.187 59.5297 119.885 60.2295 120.206 60.4717C121.36 60.6062 120.394 60.2295 121.601 60.4178C121.333 60.2295 120.528 59.7989 120.957 59.7719C121.279 60.1218 121.414 59.9872 121.574 60.0411C121.092 59.8258 121.467 59.7989 121.306 59.6374C121.709 59.7719 122.326 60.3371 122.621 60.2025L121.548 59.5836C121.762 59.5836 122.326 60.0411 122.165 59.7181C122.674 60.1218 123.077 60.1487 123.13 60.4717C124.203 60.66 122.862 59.7719 122.567 59.3413C122.621 59.3952 122.782 59.4759 122.835 59.5297C122.567 59.3413 122.647 59.2606 122.594 59.153C122.916 59.1261 123.023 59.5297 123.345 59.6374L123.452 59.3952C123.479 59.4221 123.506 59.4221 123.533 59.4221C123.425 59.2875 123.345 59.1799 123.64 59.2875C123.962 59.5297 124.31 59.745 124.579 59.9603L123.935 59.3144C124.284 59.5297 124.659 59.4221 124.847 59.745L124.901 59.2875L125.652 59.6374C125.571 59.4759 125.41 59.3952 125.276 59.4759C125.518 59.449 124.284 58.238 125.705 59.0722C125.249 58.4802 125.544 58.4802 125.357 57.9419C125.893 58.5609 126.376 58.0765 126.564 58.534C126.966 58.534 126.188 58.0765 126.135 57.8881C126.51 57.915 127.207 58.3456 127.422 58.6147L127.154 58.2918L127.288 58.3725L126.939 58.0227C127.422 58.0765 127.69 58.3725 127.878 58.2649L127.234 57.8881L127.663 57.9688C127.342 57.8612 127.261 57.6997 127.261 57.5651L127.395 57.6459L127.342 57.4575C127.663 57.7804 127.556 57.4037 127.985 57.6997C128.066 57.5921 128.066 57.5921 128.066 57.3229L127.61 57.1346C127.368 56.677 128.28 57.4575 128.441 57.2691L127.905 57.0269C128.924 57.1615 127.69 56.2464 128.361 56.3003C128.415 56.4887 129.031 56.7578 128.897 56.677C128.817 56.381 129.112 56.1388 128.602 55.6006C129.38 55.8966 129.622 56.0042 130.078 55.9504C130.104 55.762 130.051 55.7082 129.648 55.4391C130.024 55.4391 129.729 54.9278 130.265 55.1969C129.836 54.9547 130.426 55.1161 130.104 54.847L130.346 54.9547L129.809 54.7125C131.097 55.0354 129.38 53.932 130.534 54.1742L130.641 54.2819L130.507 54.0666C130.748 54.1742 130.855 54.2819 131.151 54.4433L131.499 53.9589L131.043 53.8782C131.043 53.7436 130.587 53.4207 130.963 53.4476C131.633 54.0397 131.07 53.2861 131.687 53.5552L131.848 53.7705C131.875 53.5821 131.875 53.5821 131.338 53.3399C131.258 53.0439 132.411 53.6898 131.928 53.2323L131.848 53.3399C131.526 53.2323 131.151 52.9362 131.204 52.8555C131.285 52.8824 131.553 52.9363 131.58 53.017C131.472 52.7748 131.848 52.6671 131.687 52.4787C131.902 52.4787 132.25 52.694 132.358 52.8017C132.063 52.2365 132.545 52.694 132.25 52.1289L132.545 52.2904L132.25 51.9943L132.948 52.1289L132.545 51.9943C132.545 51.8598 132.384 51.6714 132.599 51.6445L133.001 51.9136C132.921 51.483 133.913 51.9136 133.457 51.3215C133.538 51.3484 133.672 51.4561 133.726 51.5099C133.162 50.8909 134.611 51.6714 133.913 50.9986C134.048 51.0793 134.262 51.1331 134.369 51.2139L134.155 50.9447L134.745 51.2408L133.913 50.7025L134.557 50.9178L134.289 50.7295C135.496 51.16 134.718 50.5411 135.684 50.7564L134.906 50.4334C133.592 49.2224 136.301 49.7875 135.872 48.8725L136.462 49.1685L135.872 48.6034C136.408 48.711 136.354 48.9263 136.676 49.034C136.462 48.6303 135.845 48.4957 135.818 48.1459C136.301 48.1997 136.22 48.415 136.408 48.5765C136.247 48.1728 136.113 47.6076 136.542 47.5538C136.462 47.5 136.354 47.4462 136.328 47.4462C136.14 47.1232 136.542 47.0156 136.596 46.8003C136.864 46.9348 136.891 47.0156 136.918 47.0963C136.998 47.0425 137.213 47.0425 136.971 46.8272L137.454 47.1501C137.642 47.0425 137.293 46.5312 137.937 46.7734C137.696 46.6926 137.266 46.4504 137.347 46.3428C138.286 46.6926 137.132 45.8045 137.722 45.8045C137.937 45.9391 137.91 46.1006 137.937 46.0736C138.232 46.0736 137.857 45.7776 137.615 45.5623L137.964 45.7776L137.696 45.051C138.634 45.4008 137.776 44.5127 138.42 44.8626C138.527 44.7011 137.937 44.8357 137.937 44.5396C138.339 44.6473 137.857 44.2436 138.447 44.5396L138.5 44.5935L138.527 44.4051L139.064 44.7819C139.01 44.5935 138.473 44.2167 138.017 44.0014C138.393 44.0283 138.232 43.7054 138.795 43.8938L138.903 44.0014C138.849 43.517 140.807 44.136 139.922 43.4093C140.002 43.4363 140.163 43.4901 140.137 43.5439L140.271 43.3286L140.7 43.5977L140.19 42.898L140.485 43.0326C140.727 42.8442 140.754 42.3867 140.807 42.0368L140.914 42.1445C140.619 41.5793 141.344 41.9292 141.129 41.5255C141.21 41.5793 141.236 41.6062 141.236 41.6062L141.317 41.364L141.585 41.5524C141.022 41.0949 142.658 41.4447 142.041 41.3102C141.8 41.0949 141.531 40.7719 141.183 40.5566C141.263 40.2875 141.585 40.6643 141.934 40.6374C142.041 40.4759 141.531 40.2068 141.934 40.0722L142.229 40.2068C142.229 40.0722 142.041 39.9108 142.068 39.7224L142.202 39.83C141.692 39.2918 143.248 39.9108 142.014 39.1034C142.309 39.1034 142.202 38.8074 142.819 39.1034C142.578 38.5921 142.497 38.2691 142.417 37.8385C143.436 38.2422 142.39 37.7309 143.034 37.8116L142.497 37.5963C142.631 37.1119 144.16 37.1657 144.187 36.5736L144.723 36.7889L144.187 36.4391C144.67 36.0085 145.206 35.3895 145.394 34.9589C145.179 34.6898 144.643 34.2054 144.911 34.0708L144.965 34.1246C144.831 33.5864 144.777 33.0751 145.26 32.779C145.475 32.9136 145.662 32.9405 145.77 33.0481C145.233 32.6983 145.85 32.779 145.904 32.6983L145.448 32.6445C144.992 32.2946 145.555 32.3484 145.984 32.4561L145.501 32.0255C145.555 32.0255 145.662 32.0524 145.743 32.0793L145.474 31.9178L146.226 32.1331C146.091 32.0255 146.038 31.7025 145.394 31.3258C145.635 31.4065 145.904 31.2989 145.957 31.5142L146.467 30.8952H146.172C145.635 30.6799 145.394 30.33 145.662 30.33C146.038 30.653 146.413 30.6799 146.843 30.7875C146.601 30.5722 146.333 30.6799 146.065 30.4915C145.77 30.2224 145.689 29.8994 145.957 29.9263L146.145 30.0878C146.011 29.8456 146.977 30.1685 147.003 29.9802C146.628 29.6572 147.084 29.711 146.145 29.3612C146.038 29.0651 146.816 29.5496 146.923 29.5227C146.521 29.2266 146.923 29.0651 147.406 29.2266C146.091 28.5269 148.13 28.8768 147.003 28.3385L147.728 28.4462C147.433 28.3116 146.762 27.9887 146.682 27.8003C147.057 27.8003 147.594 28.0694 147.915 28.1501L146.816 27.585C148.345 27.3428 147.969 25.9972 149.31 25.5935C149.23 25.1091 148.881 24.4362 149.23 24.0595L149.364 24.1671L149.847 23.8711L149.203 23.9787C149.123 23.8173 148.908 23.6558 148.962 23.5751C149.632 23.3059 150.464 22.9023 150.115 22.068C148.962 21.153 151.376 22.2833 150.571 21.5297C150.678 21.6105 150.866 21.6912 150.973 21.7719C150.705 21.2068 150.544 20.9108 149.954 20.211C151.242 20.7762 150.035 19.9419 150.705 20.2649L150.196 20.0227C150.544 20.0765 150.759 19.915 151.108 20.0765L150.517 19.6459L151.054 19.8343C151.188 19.619 150.947 18.9462 152.073 19.2691C151.483 18.381 152.073 17.5736 152.556 16.9547C152.154 16.6855 152.207 16.4433 152.207 16.2819L152.932 16.3626C152.797 16.1204 152.046 15.636 152.529 15.636C152.61 15.6629 152.663 15.6898 152.69 15.7167C152.61 15.5014 153.039 15.4745 152.502 15.0708C152.61 14.9093 153.012 14.8555 153.602 15.1515C152.529 14.721 153.897 14.8286 153.897 14.8286C153.897 14.8286 155.453 12.7025 156.392 9.98441C157.331 7.26628 157.572 3.98299 155.051 1.77619C154.541 1.50707 154.273 1.15721 153.602 1.02265C153.468 0.78044 154.434 1.04956 153.897 0.834264C153.468 0.941913 152.529 0.269108 151.778 0.242196L151.698 0.0538109C151.322 -0.107662 152.073 0.403669 151.376 0.107635L152.368 0.511318C152.18 0.565142 151.939 0.565142 151.59 0.484406C151.939 0.726615 153.28 1.29177 152.583 1.3456L152.556 1.26486C152.529 1.48016 151.859 1.15721 151.671 1.15721L151.698 1.10339H151.134C151.51 1.10339 150.786 0.565142 150.812 0.726615C150.437 0.888089 151.081 0.753528 151.134 0.968825C151.134 1.10339 150.625 0.888088 150.303 0.753528L150.276 0.968825C149.82 0.807352 150.356 0.834264 149.847 0.753528L150.249 1.18412C149.042 0.807352 150.705 1.66854 149.552 1.39942C149.337 1.10339 149.149 1.26486 148.774 1.10339L148.667 1.58781C148.479 1.56089 148.345 1.3456 148.371 1.42633C148.023 1.39942 148.613 1.66854 148.586 1.72237C148.237 1.64163 148.479 2.07222 147.701 1.77619C147.057 1.91075 148.64 2.26061 148.103 2.39517C147.62 2.26061 148.076 2.12605 147.54 2.07222L147.594 2.449C147.379 2.34135 146.843 2.09914 146.977 2.04531C146.065 2.63738 143.409 2.15296 143.758 3.1218C143.168 3.01415 143.409 2.9065 143.06 2.6912C143.624 3.49857 141.558 2.98724 141.451 3.47166L141.907 3.66004C140.244 3.74078 140.807 4.84418 139.949 5.3286L140.297 5.35551C140.7 5.62463 140.7 5.78611 140.861 6.0014C140.619 5.92067 139.895 5.5439 140.029 5.81302C140.217 5.83993 140.405 5.81302 140.646 5.92067C139.198 6.08214 139.01 7.48157 138.044 8.26203C137.883 9.7422 136.408 10.8725 136.167 12.2989C136.22 12.0836 137.32 12.6218 136.998 12.6756C134.906 12.3258 137.025 13.5368 135.55 13.4292C135.872 14.4518 133.913 14.4518 135.094 15.7705L134.557 15.5552C134.262 15.5552 134.638 15.7436 134.638 15.8782L134.477 15.8244C134.182 16.0127 134.584 16.551 134.262 16.6048L134.879 16.8739C134.852 17.0623 134.369 16.7663 134.664 17.0623L134.369 16.9278L134.879 17.3583C133.806 16.9008 134.611 17.762 134.074 17.6813C134.182 17.9504 134.477 18.5425 134.155 18.7578C133.592 18.5963 133.431 18.9731 133.055 19.0807C133.001 19.619 132.894 20.3456 132.465 20.8569L133.162 21.1261L133.136 21.2875C132.975 21.2337 132.894 21.2068 132.84 21.153C132.009 20.9377 132.921 21.6105 132.384 21.5297C133.055 21.7181 132.519 21.449 132.572 21.3683C132.948 21.3683 133.565 21.7719 133.162 21.7989L133.001 21.745L133.323 22.0142C132.787 21.7989 132.492 21.7989 131.955 21.5836C131.875 22.1487 132.653 22.8753 132.17 23.3059C131.607 23.0099 132.17 23.7365 131.177 23.1983C131.446 23.6827 132.036 23.4943 132.706 23.9518C132.653 24.0326 132.894 24.2479 132.519 24.1133C132.277 23.9518 131.848 23.9249 131.794 23.7904V24.0326C131.714 24.0057 131.58 23.898 131.526 23.8442C131.955 24.5439 130.507 24.3017 130.963 24.9476C131.338 25.136 131.124 24.8399 131.499 25.0283C132.089 25.7549 130.668 25.0821 131.07 25.6742L130.587 25.3782C130.882 25.6473 131.312 25.8895 130.829 25.9164C130.212 25.6742 130.399 25.5396 130.158 25.3244C130.078 25.432 130.104 25.8357 130.695 25.9972C130.829 26.2394 130.265 26.051 130.051 26.0779C130.212 26.1586 130.534 26.1048 130.775 26.3201C130.346 26.3739 130.212 26.7238 130.051 26.966C129.89 26.8853 129.675 26.8045 129.595 26.7507C130.185 27.2889 128.844 26.67 128.897 27.0467Z" fill="#FF7800"/>
            <path d="M125.678 42.3596L125.813 42.3057C125.678 42.2519 125.517 42.1712 125.41 42.0366L125.678 42.3596Z" fill="#FF7800"/>
            <path d="M128.388 37.5427C128.334 37.5158 128.308 37.462 128.254 37.4351C128.254 37.462 128.308 37.5158 128.388 37.5427Z" fill="#FF7800"/>
            <path d="M127.879 35.8472C127.959 35.9817 128.174 35.9817 128.335 36.0086C128.228 35.9548 128.067 35.901 127.879 35.8472Z" fill="#FF7800"/>
            <path d="M125.919 45.9393C125.865 45.8855 125.785 45.8317 125.678 45.7778C125.758 45.8586 125.839 45.9124 125.919 45.9393Z" fill="#FF7800"/>
            <path d="M122.835 53.5281C122.862 53.5012 122.835 53.4743 122.808 53.3936C122.728 53.4205 122.755 53.4743 122.835 53.5281Z" fill="#FF7800"/>
            <path d="M126.618 43.9476C126.618 43.9207 126.591 43.8669 126.457 43.7861C126.457 43.813 126.538 43.8938 126.618 43.9476Z" fill="#FF7800"/>
            <path d="M122.701 53.2322L122.808 53.1515C122.782 53.1246 122.728 53.1246 122.701 53.0977V53.2322Z" fill="#FF7800"/>
            <path d="M121.547 53.5819C121.6 53.555 121.627 53.5012 121.681 53.4743C121.493 53.4474 121.466 53.5012 121.547 53.5819Z" fill="#FF7800"/>
            <path d="M125.302 49.1685C125.168 49.034 125.088 48.9532 125.302 49.1685Z" fill="#FF7800"/>
            <path d="M121.924 52.2634H121.951L121.816 52.1558L121.924 52.2634Z" fill="#FF7800"/>
            <path d="M121.065 53.9319C121.065 53.905 121.038 53.878 120.984 53.8242C120.957 53.8242 120.931 53.8511 120.877 53.8511C120.984 53.878 121.011 53.905 121.065 53.9319Z" fill="#FF7800"/>
            <path d="M123.586 50.3257C123.801 50.4602 123.935 50.541 124.042 50.6217C124.042 50.5948 123.961 50.5141 123.586 50.3257Z" fill="#FF7800"/>
          </svg>';

                $imagewithsvg_shortcode .= '</div>';
                $imagewithsvg_shortcode .= '<figure class="object-fit">';
                $imagewithsvg_shortcode .= '<img src="'.$short_image_svg['url'].'" alt="'.$short_image_svg['alt'].'">';

                $imagewithsvg_shortcode .= '</figure>';

                $imagewithsvg_shortcode .='<div class="lc-shape-2 shapes pos-absolute">';

                $imagewithsvg_shortcode .= '<svg width="362" height="401" viewBox="0 0 362 401" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M147.248 276.19C147.181 276.22 147.114 276.25 146.997 276.295C147.097 276.266 147.181 276.22 147.248 276.19Z" fill="#FF7800"/>
                <path d="M150.316 286.566L150.137 286.51C150.2 286.578 150.266 286.581 150.316 286.566Z" fill="#FF7800"/>
                <path d="M144.62 270.221C144.653 270.222 144.67 270.206 144.687 270.19C144.641 270.106 144.58 269.972 144.489 269.77C144.516 269.936 144.559 270.086 144.62 270.221Z" fill="#FF7800"/>
                <path d="M154.954 308.377L154.927 308.243C154.924 308.309 154.907 308.325 154.954 308.377Z" fill="#FF7800"/>
                <path d="M152.973 295.359C153.105 295.364 153.152 295.415 153.199 295.466C153.202 295.4 153.156 295.316 152.973 295.359Z" fill="#FF7800"/>
                <path d="M147.721 264.02L147.507 264.407C147.628 264.296 147.733 264.136 147.721 264.02Z" fill="#FF7800"/>
                <path d="M142.38 259.369C142.363 259.384 142.345 259.4 142.311 259.432C142.361 259.417 142.363 259.384 142.38 259.369Z" fill="#FF7800"/>
                <path d="M142.659 262.466C142.723 262.501 142.821 262.505 142.92 262.509C142.857 262.441 142.794 262.373 142.659 262.466Z" fill="#FF7800"/>
                <path d="M143.053 262.516C143.02 262.514 142.954 262.511 142.921 262.51C142.953 262.544 143.002 262.563 143.053 262.516Z" fill="#FF7800"/>
                <path d="M129.792 381.727C129.671 381.871 129.807 382.189 129.894 382.49L129.792 381.727Z" fill="#FF7800"/>
                <path d="M155.627 327.656L155.464 327.617C155.528 327.653 155.577 327.671 155.627 327.656Z" fill="#FF7800"/>
                <path d="M132.398 384.083L132.249 384.125C132.33 384.145 132.364 384.114 132.398 384.083Z" fill="#FF7800"/>
                <path d="M150.618 266.52C151.063 266.489 150.876 267.075 151.196 266.874C151.037 266.735 151.135 266.327 150.618 266.52Z" fill="#FF7800"/>
                <path d="M169.763 334.204L169.773 334.353C169.776 334.287 169.794 334.238 169.763 334.204Z" fill="#FF7800"/>
                <path d="M132.4 384.082L132.566 384.023C132.502 383.988 132.453 383.97 132.389 383.934C132.419 384.001 132.401 384.05 132.4 384.082Z" fill="#FF7800"/>
                <path d="M150.137 346.739C150.121 346.721 150.123 346.688 150.091 346.654L150.137 346.739Z" fill="#FF7800"/>
                <path d="M149.101 347.435C149.088 347.353 149.075 347.27 149.079 347.171C149.009 347.267 149.038 347.367 149.101 347.435Z" fill="#FF7800"/>
                <path d="M129.876 382.473L129.926 382.903C129.98 382.79 129.936 382.64 129.876 382.473Z" fill="#FF7800"/>
                <path d="M143.959 358.07C143.96 358.037 143.979 357.988 143.98 357.955C143.946 357.987 143.945 358.02 143.959 358.07Z" fill="#FF7800"/>
                <path d="M152.928 294.482C152.962 294.45 152.948 294.4 152.982 294.369C152.882 294.398 152.832 294.412 152.928 294.482Z" fill="#FF7800"/>
                <path d="M164.9 299.567C164.844 299.746 165.184 299.875 165.494 299.937C165.468 299.771 165.342 299.634 164.9 299.567Z" fill="#FF7800"/>
                <path d="M163.559 291.244C163.559 291.244 163.525 291.242 163.508 291.258C163.525 291.242 163.525 291.242 163.559 291.244Z" fill="#FF7800"/>
                <path d="M164.24 293.087C164.171 293.15 164.136 293.215 164.117 293.263C164.169 293.216 164.204 293.152 164.24 293.087Z" fill="#FF7800"/>
                <path d="M172.043 324.489C171.984 323.497 171.717 322.349 171.516 321.203C171.439 320.64 171.33 320.075 171.252 319.544C171.192 318.997 171.163 318.485 171.216 317.992C170.39 317.614 170.315 317.017 170.093 316.398L171.17 316.259L170.778 315.765C171.101 315.531 171.01 316.154 171.389 315.74L170.703 315.581C171.085 315.514 170.872 314.252 171.697 315.043C171.658 314.382 171.57 313.702 171.531 313.041C171.532 312.596 170.614 312.873 170.833 312.354C171.134 312.234 171.074 312.512 171.44 312.427C171.768 311.648 171.173 311.279 170.576 310.942C169.979 310.605 169.315 310.299 169.459 309.596L169.62 309.701C169.314 309.508 169.298 309.078 169.132 309.105C168.08 309.443 169.753 309.261 169.172 309.766C168.244 309.862 168.612 309.332 167.931 309.453C168.209 309.102 167.669 308.998 167.564 308.746C168.047 308.205 167.543 307.624 168.205 307.139C167.883 306.961 166.963 306.86 166.833 306.409C167.479 305.94 167.527 306.37 167.696 305.866L167.151 305.894C167.166 305.499 167.314 305.521 167.579 305.498C167.513 305.084 166.795 305.303 167.032 304.735L167.585 304.921C167.302 304.581 167.375 304.418 167.314 303.872C167.613 303.818 167.637 304.049 167.582 304.196C168.309 303.746 167.154 303.767 167.193 303.603C166.975 303.71 166.96 304.072 166.401 304.018C166.429 303.738 165.56 303.622 166.15 303.299L166.72 303.469C166.211 303.021 166.017 303.326 166.076 302.669C166.125 302.688 166.242 302.643 166.358 302.631C165.593 302.386 166.113 301.747 166.021 301.166L166.183 301.239C165.944 301.048 165.45 301.029 165.455 300.897C165.241 301.284 165.062 301.228 164.577 301.39C165.328 300.76 163.439 300.983 163.769 300.171C164.068 300.117 164.478 300.182 164.186 300.451C165.126 300.472 165.874 300.32 166.389 300.636C166.118 300.412 165.915 300.123 166.311 300.106L165.466 300.221C165.406 300.054 165.412 299.922 165.4 299.806C164.853 299.867 164.636 300.354 164.202 300.056C163.837 299.696 164.978 299.625 164.598 299.659C164.139 299.163 163.674 299.656 163.798 299.035C163.896 299.071 164.058 299.144 163.989 299.207C164.206 298.721 163.581 298.284 164.52 297.892C164.751 297.901 165.051 297.814 164.994 297.993L164.844 298.037C165.675 298.283 164.56 297.729 165.471 297.616C164.954 297.777 164.927 297.199 164.955 296.919L164.385 297.161C162.369 296.835 165.584 296.878 165.12 296.101C164.576 295.684 165.011 296.361 164.492 296.143C164.49 295.763 164.98 295.469 164.57 295.024C164.759 294.817 164.99 294.414 165.642 294.192C165.272 293.963 165.652 293.137 164.941 293.159C164.55 293.869 165.803 293.473 165.123 294.386L164.413 294.408C164.316 293.959 163.839 293.512 163.969 293.137C163.866 293.232 163.698 293.325 163.566 293.32C163.109 292.791 162.415 292.829 162.424 292.187C162.996 291.912 162.997 292.291 163.12 292.527C163.472 291.98 163.021 292.111 163.015 291.451C163.518 291.24 163.113 291.867 163.645 291.756L163.274 291.148C163.307 291.149 163.341 291.118 163.374 291.119C162.476 291.315 163.297 290.588 162.88 290.275C162.539 289.322 161.358 289.589 160.494 289.341C160.667 289.117 160.87 288.993 161.102 288.969C160.807 289.336 161.077 289.182 161.341 289.192C161.138 288.904 161.909 288.192 162.335 288.242C161.89 287.829 161.959 288.59 161.571 288.377L161.369 287.676C160.963 287.924 160.968 288.205 160.499 287.972C160.262 287.715 160.302 287.552 160.186 287.152C160.418 287.128 160.794 286.78 160.881 287.08C160.974 286.836 160.871 286.519 160.423 286.584C160.202 287.169 159.786 286.031 159.235 286.603L159.456 286.018C159.485 286.118 159.77 286.014 159.746 286.195C160.355 285.823 159.427 285.918 159.299 285.814C159.373 285.619 159.275 285.203 159.51 285.08C159.265 285.021 159.297 284.643 159.586 284.44C159.378 284.284 159.167 284.605 158.935 284.629C158.878 284.396 158.789 284.162 158.715 283.945C159.052 283.76 160.029 283.27 160.208 283.327C159.766 283.227 159.105 283.679 158.989 283.279C159.768 283.194 159.299 282.549 160.274 282.505C160.687 282.059 160.399 281.438 160.063 281.177C159.419 281.202 159.91 281.699 159.341 281.908C158.717 281.026 157.141 281.657 157.091 280.847L157.015 281.108C156.499 280.824 156.597 280.827 156.005 280.804C156.738 280.602 157.642 279.45 157.141 278.804C156.757 278.904 156.683 279.511 156.084 279.653L155.755 279.228C155.79 279.163 155.922 279.168 156.054 279.174C155.62 278.876 156.581 277.957 155.713 278.22L156.509 277.295L156.163 277.677C155.796 277.795 155.466 277.37 155.286 277.346C154.671 277.058 154.882 276.737 155.165 276.253C154.925 276.474 154.393 276.998 154.108 276.69C155.203 276.122 154.115 275.701 154.687 275.426C154.594 275.291 154.794 274.82 154.339 275.05L155.028 274.73C154.053 275.187 153.812 274.617 153.429 274.305C154.756 273.714 153.083 273.896 154.138 273.079C153.232 273.473 153.402 272.523 152.613 272.871C152.394 272.566 153.219 272.153 153.443 271.914L153.029 271.948C153.342 271.564 153.07 270.927 153.124 270.401L152.18 270.513L152.457 270.194C152.223 270.251 151.968 270.043 151.773 270.381L151.715 270.181C150.887 270.66 151.357 270.068 150.785 269.931C150.857 269.768 151.076 269.662 151.224 269.684C151.116 269.498 151.585 269.319 151.809 269.08C151.666 269.338 149.968 269.321 149.89 270.027C149.568 270.262 149.161 270.131 149.22 269.886L149.885 269.335L148.984 269.596C148.711 269.404 149.107 269.007 149.069 268.726C149.242 268.914 150.765 268.363 150.393 267.788C150.68 268.03 151.162 267.933 151.423 268.01C151.379 267.859 151.416 267.762 151.829 267.762C151.314 267.445 151.279 267.888 150.916 267.495C151.575 267.108 151.717 266.85 151.688 266.338L151.384 266.936C151.299 266.982 151.233 266.98 151.183 266.994C151.177 267.159 151.091 267.238 150.853 267.427C150.807 267.342 149.732 267.416 150.074 267.099C149.337 268.192 148.816 266.803 148.376 267.495C148.159 267.569 147.923 267.279 148.213 267.043C148.936 267.104 148.77 266.306 149.258 266.078C148.994 266.068 148.953 266.676 148.608 266.646C148.434 266.458 148.715 266.04 148.84 265.798L149.02 265.821L149.075 265.296C148.706 265.446 148.75 265.976 148.379 265.78C148.451 265.618 148.097 265.406 148.367 265.252C148.901 265.107 149.415 264.633 149.704 264.809C149.515 264.604 148.98 263.956 148.573 264.649C148.527 264.565 148.465 264.464 148.419 264.38C148.257 264.719 148.06 265.503 147.633 265.041L147.752 264.964L147.028 264.935L147.257 264.565C147.104 264.674 146.921 264.717 146.827 264.581C146.999 264.423 146.989 264.241 147.244 264.07C146.945 263.712 146.655 263.948 146.438 264.022C146.247 263.849 146.32 263.654 146.755 263.506C146.638 263.139 146.194 262.693 146.393 262.255C145.84 262.069 146.321 262.418 145.724 262.493C146.576 261.389 145.228 260.891 144.622 260.372C143.795 261.23 144.378 260.28 143.45 260.788C143.85 260.705 143.743 259.662 144.406 260.001L144.07 259.74C144.424 259.128 144.867 260.019 145.315 259.129C145 258.754 143.791 259.301 143.803 258.592C144.576 258.227 143.331 258.425 144.124 257.978C144.425 257.891 144.451 258.057 144.596 258.145L144.652 257.966C144.197 256.991 143.682 258.324 142.91 258.244C142.449 257.814 143.123 257.444 143.414 257.175C143.471 256.996 143.181 256.82 142.901 256.825C143.528 256.817 142.931 257.717 142.396 257.894C142.972 257.108 141.884 257.099 141.483 257.215C141.248 258.542 141.825 257.723 141.492 259.046C141.792 258.959 142.458 258.408 142.483 259.019C141.954 259.031 142.124 259.318 142.069 259.464C142.397 259.098 142.442 259.627 142.689 259.621C142.444 259.974 141.616 260.073 141.76 260.574L142.725 259.968C142.714 260.232 142.015 260.402 142.469 260.585C141.868 260.759 141.768 261.201 141.287 260.852C140.896 261.975 142.323 261.354 142.975 261.545C142.876 261.541 142.757 261.619 142.674 261.632C142.975 261.545 143.1 261.714 143.245 261.803C143.227 262.231 142.664 261.895 142.456 262.151C142.582 262.288 142.691 262.441 142.818 262.577C142.783 262.609 142.766 262.625 142.749 262.641C142.963 262.666 143.125 262.738 142.919 262.928C142.52 263.011 142.167 263.179 141.866 263.266L142.856 263.272C142.503 263.439 142.611 264.037 142.139 263.87L142.758 264.472L142.177 264.977C142.405 265.051 142.539 264.991 142.484 264.725C142.493 264.906 142.953 264.957 143.261 265.085C143.536 265.211 143.677 265.398 143.003 265.767C143.903 265.951 143.822 266.311 144.612 266.754C143.677 266.635 144.255 267.845 143.61 267.49C143.54 267.998 144.282 267.598 144.554 267.79C144.438 268.215 143.733 268.517 143.325 268.419L143.815 268.537L143.696 268.614L144.223 268.635C144.055 269.14 143.611 269.106 143.712 269.456L144.318 269.15L144.103 269.57C144.327 269.332 144.538 269.422 144.729 269.595L144.61 269.673L144.883 269.865C144.373 269.828 144.92 270.179 144.419 270.325C144.525 270.576 144.542 270.56 144.875 270.887L145.218 270.57C145.881 270.877 144.642 270.944 144.871 271.398L145.312 271.085C145.109 271.622 145.382 271.814 145.673 271.957C145.964 272.1 146.272 272.228 146.142 272.602C145.869 272.41 145.392 272.787 145.527 272.726C145.927 273.022 146.163 273.724 146.968 273.805C146.385 274.343 146.198 274.484 146.124 275.091C146.344 275.364 146.426 275.384 146.876 275.253C146.776 275.694 147.472 276.035 146.999 276.313C147.433 276.165 147.068 276.629 147.482 276.596L147.295 276.737L147.752 276.441C146.965 277.548 148.818 277.011 148.183 278.041L148.002 278.018L148.31 278.145C148.123 278.286 147.943 278.263 147.657 278.4C147.824 278.753 147.974 279.122 148.109 279.473L148.355 279.087C148.512 279.291 149.06 279.197 148.895 279.603C147.957 279.55 149.045 279.971 148.537 280.314L148.228 280.187C148.431 280.475 148.431 280.475 148.904 280.197C149.287 280.509 148.116 280.925 148.821 281.035L148.7 280.766C148.94 280.545 149.435 280.531 149.51 280.715C149.457 280.796 149.299 281.037 149.171 280.933C149.509 281.16 149.485 281.753 149.747 281.796C149.688 282.041 149.304 282.142 149.124 282.118C149.88 282.593 149.176 282.45 149.915 282.941L149.646 283.062L150.089 283.129L149.653 283.722L149.961 283.437C150.118 283.641 150.38 283.685 150.334 284.013L149.869 284.093C150.392 284.625 149.497 285.134 150.341 285.464C150.289 285.545 150.125 285.505 150.011 285.484C150.891 285.749 149.453 286.221 150.484 286.443C150.318 286.469 150.181 286.596 150.063 286.641L150.437 286.771L149.868 286.979L150.781 286.834L150.27 287.242L150.583 287.238C149.614 287.975 150.602 288.014 149.93 288.73L150.62 288.377C151.554 288.529 151.578 289.173 151.484 289.862C151.39 290.551 151.195 291.302 151.771 291.754L151.186 291.945L152.051 292.16C151.688 292.591 151.506 292.189 151.234 292.376C151.747 292.759 152.162 292.28 152.537 292.79C152.255 293.24 152.074 292.837 151.829 292.778C152.305 293.226 152.92 293.926 152.734 294.446C152.817 294.433 152.933 294.421 152.952 294.372C153.336 294.651 153.247 295.241 153.413 295.627C153.145 295.716 153.066 295.63 152.971 295.527C152.982 295.676 152.855 295.952 153.183 295.998L152.622 296.009C152.625 296.355 153.299 296.81 152.712 297.067C152.93 296.961 153.364 296.846 153.419 297.112C152.577 297.54 154.021 297.729 153.683 298.326C153.452 298.35 153.316 298.031 153.329 298.114C153.153 298.404 153.628 298.472 153.986 298.585L153.621 298.637C153.89 298.928 154.159 299.218 154.428 299.509C153.57 299.921 154.836 300.432 154.155 300.554C154.222 300.936 154.468 300.137 154.699 300.559C154.36 300.776 154.998 300.917 154.414 301.075L154.332 301.056L154.468 301.374L153.826 301.333C154.031 301.588 154.672 301.63 155.106 301.515C154.86 301.868 155.211 302.178 154.706 302.423L154.544 302.35C154.962 303.043 153.242 303.965 154.383 304.306C154.314 304.37 154.148 304.396 154.152 304.297L154.2 304.761L153.739 304.743L154.572 305.336L154.273 305.39C154.252 305.917 154.585 306.656 154.791 307.291L154.629 307.218C155.231 307.836 154.468 307.938 154.895 308.4C154.796 308.396 154.78 308.379 154.764 308.362L154.862 308.811L154.551 308.749C155.267 308.975 153.863 309.86 154.386 309.567C154.71 309.712 155.094 309.991 155.491 309.973C155.603 310.472 155.121 310.157 154.909 310.511C154.927 310.875 155.455 310.862 155.285 311.4L154.97 311.437C155.044 311.654 155.286 311.779 155.373 312.079L155.211 312.007C155.903 312.446 154.405 312.784 155.781 313.002C155.573 313.258 155.805 313.646 155.192 313.705C155.663 314.317 155.89 314.804 156.195 315.443C155.197 315.635 156.288 315.578 155.743 316.019L156.274 315.94C156.354 316.405 156.069 316.922 155.784 317.438C155.516 317.972 155.281 318.474 155.393 318.973L154.863 319.019L155.467 319.191C155.362 319.731 155.271 320.354 155.182 320.944C155.092 321.534 155.037 322.093 155.019 322.521C155.305 322.796 155.947 323.25 155.715 323.686L155.634 323.633C155.767 324.018 155.899 324.435 155.932 324.849C155.957 325.048 155.965 325.262 155.924 325.459C155.899 325.672 155.825 325.867 155.734 326.078C155.506 326.003 155.354 326.079 155.194 325.974C155.761 326.211 155.174 326.468 155.15 326.649L155.569 326.484C156.052 326.766 155.545 327.076 155.13 327.143L155.69 327.577C155.64 327.591 155.54 327.62 155.457 327.634L155.733 327.727L155.002 327.863C155.13 327.967 155.258 328.483 155.908 328.707C155.661 328.713 155.433 329.051 155.346 328.751L154.962 330.088L155.25 329.918C155.792 329.955 156.07 330.428 155.783 330.598C155.401 330.253 155.029 330.47 154.632 330.52C154.886 330.761 155.13 330.441 155.405 330.567C155.724 330.843 155.817 331.391 155.567 331.464L155.376 331.291C155.51 331.643 154.571 331.623 154.575 331.936C154.957 332.281 154.522 332.429 155.441 332.531C155.539 332.98 154.78 332.571 154.66 332.682C155.045 332.961 154.645 333.456 154.184 333.438C155.467 333.934 153.469 334.416 154.561 334.739L153.861 334.91C154.155 334.987 154.806 335.21 154.875 335.527C154.505 335.71 154.002 335.509 153.671 335.529L154.725 335.982C153.927 336.561 153.614 337.357 153.301 338.186C153.227 338.381 153.152 338.609 153.078 338.804C152.987 339.015 152.88 339.208 152.773 339.402C152.56 339.79 152.298 340.159 151.922 340.474C151.923 340.853 151.971 341.317 151.969 341.762C151.968 342.207 151.884 342.666 151.654 343.036L151.561 342.9L150.956 343.586L151.665 343.185C151.721 343.418 151.878 343.622 151.788 343.8C151.394 344.164 150.949 344.575 150.617 345.04C150.268 345.521 150.015 346.072 150.038 346.716C150.929 347.955 148.786 346.7 149.353 347.761C149.258 347.659 149.098 347.553 149.003 347.451C149.026 347.683 149.036 347.864 149.061 348.063C149.07 348.245 149.079 348.427 149.121 348.61C149.172 348.975 149.257 349.341 149.433 349.875C148.321 349.222 149.233 350.346 148.653 349.993L149.086 350.29C148.723 350.309 148.446 350.628 148.109 350.401L148.546 351.011L148.06 350.795C147.829 351.198 147.737 352.266 146.644 351.976C146.732 352.656 146.504 353.405 146.147 354.084C145.772 354.778 145.252 355.418 144.8 355.994C145.08 356.4 144.9 356.789 144.772 357.097L144.047 357.069C144.031 357.464 144.546 358.194 144.017 358.239C143.952 358.203 143.921 358.169 143.906 358.119C143.826 358.479 143.376 358.577 143.699 359.166C143.472 359.471 142.989 359.6 142.544 359.187C143.426 359.799 141.992 359.792 141.992 359.792C141.992 359.792 141.94 359.84 141.853 359.952C141.766 360.064 141.628 360.223 141.438 360.43C141.092 360.845 140.588 361.469 139.998 362.204C138.8 363.691 137.183 365.755 135.574 368.034C132.373 372.576 129.07 378.037 129.792 381.809C130.087 382.266 130.08 382.843 130.697 383.098C130.631 383.507 129.792 383.046 130.155 383.439C130.739 383.281 131.139 384.401 131.962 384.433L131.883 384.76C132.136 385.034 131.808 384.164 132.284 384.644L131.569 383.973C131.853 383.868 132.084 383.877 132.408 384.022C132.243 383.603 131.275 382.659 132.087 382.575L132.047 382.738C132.294 382.352 132.716 382.913 132.897 382.936L132.828 383L133.455 382.991C133.009 383.023 133.354 383.878 133.462 383.651C134.016 383.392 133.183 383.624 133.347 383.218C133.455 382.991 133.836 383.369 134.076 383.56L134.322 383.173C134.672 383.484 134.115 383.396 134.604 383.547L134.569 382.787C135.55 383.403 134.52 381.944 135.54 382.429C135.487 382.922 135.861 382.64 136.13 382.931L136.691 382.095C136.871 382.119 136.806 382.528 136.845 382.365C137.206 382.412 136.812 381.951 136.882 381.855C137.19 381.983 137.335 381.246 137.925 381.748C138.759 381.516 137.331 380.933 138.067 380.698C138.487 380.912 137.833 381.167 138.408 381.239L138.681 380.606C138.821 380.793 139.202 381.171 138.966 381.294C140.542 380.25 143.103 380.961 143.6 379.265C144.187 379.42 143.8 379.619 143.983 379.989C144.106 378.576 145.971 379.358 146.534 378.489L146.166 378.194C148.174 377.894 148.516 375.961 149.957 374.978L149.579 374.947C149.35 374.493 149.526 374.203 149.508 373.84C149.719 373.93 150.205 374.559 150.324 374.069C150.126 374.062 149.876 374.134 149.735 373.947C150.634 373.719 151.441 372.942 152.27 372.018C153.081 371.11 153.868 370.003 154.775 369.197C155.149 368.503 155.573 367.794 156.046 367.103C156.519 366.412 157.024 365.756 157.513 365.082C158.002 364.409 158.492 363.703 158.932 363.011C159.16 362.673 159.372 362.319 159.585 361.964C159.797 361.61 159.96 361.237 160.124 360.864C159.925 361.301 159.03 360.574 159.433 360.392C160.504 360.417 160.653 359.994 160.722 359.519C160.806 359.06 160.793 358.565 161.608 358.415C161.746 357.431 162.384 356.747 162.907 356.042C163.169 355.673 163.414 355.32 163.546 354.913C163.678 354.505 163.698 354.011 163.539 353.461L164.042 353.662C164.378 353.51 164.056 353.3 164.117 353.022L164.246 353.093C164.695 352.583 164.519 351.636 164.892 351.387L164.341 351.134C164.439 350.759 164.852 351.138 164.692 350.62L164.967 350.746L164.614 350.089C165.586 350.523 165.099 349.102 165.664 348.993C165.67 348.449 165.596 347.407 166.051 346.765C166.609 346.82 166.91 345.908 167.375 345.415C167.498 344.826 167.642 344.123 167.852 343.389C168.03 342.654 168.243 341.887 168.535 341.173L167.849 341.014L167.898 340.62C168.044 340.675 168.128 340.629 168.192 340.698C169.036 340.615 168.196 339.774 168.748 339.581C168.086 339.621 168.59 339.823 168.499 340.033C168.094 340.248 167.519 339.797 167.977 339.469L168.123 339.524L167.842 339.15C168.382 339.254 168.687 339.035 169.227 339.138C169.379 337.825 168.663 336.775 169.208 335.51C169.484 335.636 169.51 335.39 169.568 335.177C169.626 334.965 169.733 334.772 170.219 334.988C169.957 334.121 169.363 334.955 168.69 334.467C168.748 334.255 168.495 333.981 168.89 333.997C169.115 334.137 169.553 333.923 169.611 334.124L169.616 333.58C169.7 333.533 169.827 333.67 169.89 333.739C169.683 333.137 169.932 332.685 170.164 332.249C170.396 331.813 170.612 331.359 170.386 330.839C170.028 330.726 170.222 331.212 169.864 331.099C169.231 330.036 170.655 330.306 170.232 329.333L170.9 329.54C170.584 329.198 170.145 329.032 170.592 328.588C171.22 328.547 171.052 329.051 171.322 329.309C171.385 328.965 171.288 328.104 170.718 328.313C170.554 327.894 171.102 327.8 171.292 327.593C171.144 327.571 170.849 327.938 170.579 327.681C170.962 327.168 171.03 326.313 171.106 325.64C171.254 325.662 171.503 325.622 171.566 325.691C170.814 325.117 172.194 325.237 172.043 324.489Z" fill="#FF7800"/>
                <path d="M163.555 290.964L163.544 291.228C163.661 291.183 163.827 291.156 164.006 291.212L163.555 290.964Z" fill="#FF7800"/>
                <path d="M166.448 302.734C166.497 302.753 166.546 302.771 166.627 302.791C166.597 302.724 166.514 302.737 166.448 302.734Z" fill="#FF7800"/>
                <path d="M168.098 305.427C167.924 305.239 167.8 305.449 167.678 305.592C167.794 305.58 167.945 305.537 168.098 305.427Z" fill="#FF7800"/>
                <path d="M159.647 285.187C159.729 285.207 159.812 285.193 159.93 285.148C159.799 285.11 159.732 285.141 159.647 285.187Z" fill="#FF7800"/>
                <path d="M151.712 268.299C151.711 268.332 151.71 268.364 151.658 268.412C151.693 268.38 151.711 268.332 151.712 268.299Z" fill="#FF7800"/>
                <path d="M151.39 269.671C151.405 269.721 151.469 269.756 151.582 269.811C151.568 269.728 151.488 269.675 151.39 269.671Z" fill="#FF7800"/>
                <path d="M161.482 289.324C161.529 289.375 161.592 289.444 161.723 289.449C161.679 289.332 161.58 289.328 161.482 289.324Z" fill="#FF7800"/>
                <path d="M151.807 269.92L151.879 270.17C151.913 270.139 151.946 270.14 151.98 270.108L151.807 269.92Z" fill="#FF7800"/>
                <path d="M151.595 267.964C151.624 268.064 151.701 268.183 151.697 268.281C151.786 268.104 151.725 268.003 151.595 267.964Z" fill="#FF7800"/>
                <path d="M156.19 279.248L156.206 279.265C156.533 279.344 156.371 279.271 156.19 279.248Z" fill="#FF7800"/>
                <path d="M153.304 270.38L153.303 270.413L153.484 270.403L153.304 270.38Z" fill="#FF7800"/>
                <path d="M151.213 266.891C151.244 266.926 151.293 266.944 151.375 266.931C151.361 266.881 151.379 266.833 151.349 266.766C151.281 266.829 151.247 266.86 151.213 266.891Z" fill="#FF7800"/>
                <path d="M155.318 275.332C155.069 275.372 154.919 275.416 154.817 275.478C154.863 275.562 154.979 275.55 155.318 275.332Z" fill="#FF7800"/>
                <path d="M242.809 51.4417C242.743 51.439 242.645 51.4349 242.529 51.4466C242.643 51.4677 242.726 51.4547 242.809 51.4417Z" fill="#FF7800"/>
                <path d="M242.489 67.7436L242.348 67.5563C242.376 67.6893 242.423 67.7407 242.489 67.7436Z" fill="#FF7800"/>
                <path d="M241.449 41.6839C241.482 41.6852 241.482 41.6852 241.515 41.6865C241.472 41.5363 241.446 41.3374 241.361 41.0041L241.449 41.6839Z" fill="#FF7800"/>
                <path d="M236.336 101.511L236.394 101.3C236.357 101.397 236.321 101.461 236.336 101.511Z" fill="#FF7800"/>
                <path d="M241.212 81.7281C241.308 81.7978 241.353 81.9148 241.382 82.0148C241.42 81.8845 241.424 81.7858 241.212 81.7281Z" fill="#FF7800"/>
                <path d="M245.653 34.8209L245.355 35.2214C245.506 35.1777 245.645 35.0183 245.653 34.8209Z" fill="#FF7800"/>
                <path d="M240.275 25.6154C240.258 25.6311 240.241 25.6467 240.207 25.6779C240.24 25.6792 240.257 25.6636 240.275 25.6154Z" fill="#FF7800"/>
                <path d="M240.385 29.9752C240.448 30.0438 240.544 30.1137 240.656 30.168C240.595 30.0666 240.534 29.9324 240.385 29.9752Z" fill="#FF7800"/>
                <path d="M240.799 30.2897C240.75 30.2712 240.703 30.2196 240.654 30.2011C240.701 30.2527 240.732 30.3202 240.799 30.2897Z" fill="#FF7800"/>
                <path d="M171.704 210.382C171.497 210.605 171.564 210.987 171.597 211.367L171.704 210.382Z" fill="#FF7800"/>
                <path d="M225.4 130.62L225.274 130.482C225.304 130.55 225.352 130.601 225.4 130.62Z" fill="#FF7800"/>
                <path d="M174.154 212.912L173.968 213.02C174.051 213.006 174.118 212.976 174.154 212.912Z" fill="#FF7800"/>
                <path d="M248.285 39.9332C248.755 40.1332 248.479 40.8653 248.828 40.7634C248.693 40.4444 248.846 39.9221 248.285 39.9332Z" fill="#FF7800"/>
                <path d="M235.654 143.449L235.58 143.644C235.617 143.547 235.635 143.498 235.654 143.449Z" fill="#FF7800"/>
                <path d="M174.154 212.913L174.391 212.79C174.326 212.754 174.26 212.752 174.195 212.716C174.191 212.815 174.173 212.864 174.154 212.913Z" fill="#FF7800"/>
                <path d="M208.825 158.925C208.827 158.892 208.828 158.859 208.814 158.809L208.825 158.925Z" fill="#FF7800"/>
                <path d="M207.311 160.031C207.349 159.9 207.37 159.786 207.409 159.656C207.272 159.782 207.266 159.914 207.311 160.031Z" fill="#FF7800"/>
                <path d="M171.581 211.35L171.526 211.908C171.599 211.746 171.606 211.549 171.581 211.35Z" fill="#FF7800"/>
                <path d="M196.684 175.757C196.703 175.708 196.739 175.644 196.757 175.595C196.706 175.642 196.67 175.707 196.684 175.757Z" fill="#FF7800"/>
                <path d="M241.582 80.4392C241.616 80.4078 241.651 80.3436 241.67 80.295C241.588 80.2752 241.522 80.2725 241.582 80.4392Z" fill="#FF7800"/>
                <path d="M249.793 94.321C249.67 94.5304 249.886 94.902 250.139 95.1432C250.198 94.8981 250.142 94.6649 249.793 94.321Z" fill="#FF7800"/>
                <path d="M252.598 82.0027L252.564 82.0014C252.564 82.0014 252.564 82.0014 252.598 82.0027Z" fill="#FF7800"/>
                <path d="M252.339 84.961C252.255 85.007 252.186 85.07 252.134 85.15C252.235 85.0883 252.319 85.0424 252.339 84.961Z" fill="#FF7800"/>
                <path d="M242.802 131.416C242.914 131.091 243.027 130.733 243.141 130.375C243.239 130 243.352 129.642 243.467 129.251C243.679 128.485 243.893 127.686 244.09 126.903C244.303 126.104 244.5 125.321 244.761 124.573C244.892 124.2 245.005 123.842 245.152 123.485C245.281 123.144 245.41 122.803 245.555 122.479C245.012 121.618 245.293 120.789 245.412 119.887L246.458 120.159L246.375 119.348C246.778 119.166 246.367 119.957 246.943 119.585L246.401 119.102C246.794 119.183 247.28 117.374 247.601 118.82C247.919 117.893 248.253 116.983 248.538 116.056C248.776 115.455 247.788 115.417 248.257 114.826C248.605 114.79 248.377 115.127 248.77 115.208C249.483 114.297 249.183 113.56 248.799 112.837C248.433 112.098 248.017 111.373 248.547 110.504L248.638 110.705C248.456 110.303 248.662 109.701 248.515 109.646C247.395 109.603 248.99 110.159 248.199 110.54C247.337 110.226 247.937 109.673 247.266 109.532C247.709 109.187 247.279 108.791 247.345 108.382C248.091 107.884 247.936 106.823 248.773 106.526C248.591 106.124 247.79 105.532 247.934 104.83C248.755 104.516 248.582 105.119 249.003 104.509L248.501 104.275C248.721 103.724 248.848 103.86 249.076 103.935C249.249 103.332 248.492 103.27 249.014 102.598L249.421 103.142C249.364 102.53 249.503 102.338 249.716 101.572C250.01 101.649 249.915 101.958 249.791 102.168C250.658 101.938 249.625 101.37 249.749 101.161C249.501 101.168 249.282 101.686 248.835 101.307C249.015 100.951 248.313 100.331 248.995 100.209L249.402 100.752C249.174 99.8536 248.847 100.187 249.246 99.3127C249.276 99.3798 249.408 99.385 249.505 99.4217C248.957 98.6919 249.709 98.0623 249.941 97.2147L250.049 97.4002C249.949 97.0174 249.515 96.7204 249.588 96.5585C249.191 96.9878 249.066 96.8182 248.54 96.7647C249.532 96.2927 247.745 95.597 248.444 94.6358C248.738 94.7132 249.056 95.0221 248.682 95.2711C249.519 95.798 250.238 95.9908 250.522 96.7103C250.392 96.2604 250.379 95.7657 250.735 95.9443L249.937 95.6661C249.964 95.42 250.038 95.2252 250.077 95.062C249.574 94.8611 249.14 95.3878 248.884 94.7683C248.73 94.0869 249.799 94.5899 249.443 94.4112C249.283 93.4824 248.622 93.9014 249.051 93.0945C249.113 93.1957 249.221 93.3812 249.119 93.4431C249.57 92.9006 249.229 91.9483 250.253 91.9223C250.463 92.0458 250.757 92.1232 250.633 92.3325L250.485 92.3103C251.097 93.1084 250.377 91.713 251.254 92.0767C250.711 92.039 250.976 91.1927 251.122 90.836L250.478 90.8603C248.841 89.2973 251.672 91.1211 251.642 89.8185C251.347 88.9503 251.417 90.0897 251.075 89.5492C251.261 89.0293 251.828 88.8867 251.681 88.0408C251.952 87.8537 252.332 87.4402 253.04 87.4843C252.831 86.949 253.544 86.0378 252.915 85.6673C252.224 86.4311 253.521 86.597 252.513 87.4637L251.884 87.0932C251.994 86.4221 251.799 85.5249 252.081 85.0746C251.929 85.1511 251.763 85.1776 251.634 85.1066C251.476 84.112 250.846 83.7744 251.147 82.8636C251.777 82.7894 251.607 83.3264 251.622 83.7553C252.189 83.2009 251.731 83.117 252.031 82.2062C252.576 82.211 251.94 82.8287 252.445 82.9967C252.427 82.6335 252.407 82.3033 252.389 81.9401C252.422 81.9414 252.455 81.9427 252.503 81.9611C251.622 81.729 252.634 81.1754 252.43 80.5085C252.557 78.9979 251.381 78.6884 250.69 77.8048C250.946 77.6006 251.18 77.5438 251.406 77.6515C250.996 77.9979 251.296 77.9437 251.537 78.1014C251.475 77.5883 252.488 77.0348 252.838 77.345C252.623 76.5294 252.349 77.6059 252.105 77.1022L252.232 76.0034C251.765 76.117 251.635 76.4908 251.312 75.9016C251.216 75.4201 251.324 75.1937 251.366 74.5529C251.593 74.6605 252.066 74.3825 252.031 74.8588C252.207 74.5692 252.26 74.0771 251.805 73.8946C251.349 74.5687 251.439 72.7436 250.709 73.2587L251.165 72.5846C251.158 72.7491 251.455 72.7607 251.363 73.0042C252.08 72.818 251.187 72.4372 251.115 72.1873C251.273 71.9464 251.331 71.3226 251.598 71.2671C251.392 71.0449 251.562 70.5079 251.913 70.4063C251.777 70.088 251.452 70.3883 251.225 70.2806L251.286 69.1792C251.668 69.1118 252.761 69.0226 252.903 69.1765C252.541 68.7505 251.754 69.0328 251.796 68.3919C252.169 68.5548 252.309 68.3625 252.482 68.1716C252.655 67.9806 252.81 67.8055 253.278 68.0709C253.821 67.6967 253.765 66.6402 253.557 66.0719C252.96 65.7356 253.234 66.7183 252.625 66.678C252.359 65.0861 250.676 65.0534 250.906 63.8598L250.745 64.1665C250.345 63.459 250.441 63.5286 249.895 63.1449C250.648 63.3061 251.914 62.2023 251.665 61.0065C251.272 60.9253 250.992 61.7216 250.371 61.5655C250.316 61.2998 250.244 61.0499 250.188 60.7841C250.257 60.7209 250.386 60.7918 250.481 60.8944C250.162 60.2065 251.346 59.4949 250.46 59.3615L251.501 58.529L251.042 58.857C250.665 58.7929 250.482 58.0115 250.306 57.8564C249.792 57.095 250.087 56.7605 250.519 56.2667C250.232 56.4367 249.554 56.8715 249.364 56.2546C250.592 56.1048 249.668 54.8661 250.314 54.809C250.274 54.5603 250.592 54.0456 250.079 54.075L250.841 54.0059C249.766 54.0792 249.688 53.1371 249.385 52.4664C250.856 52.4085 249.152 51.6995 250.411 51.172C249.42 51.1992 249.799 49.962 248.957 49.9786C248.814 49.4458 249.726 49.3332 250.015 49.1303L249.61 48.9333C250.004 48.5697 249.915 47.5119 250.09 46.8434L249.116 46.4429L249.458 46.1597C249.228 46.1178 248.999 45.6641 248.737 46.0327L248.733 45.7196C247.785 45.8967 248.385 45.3435 247.862 44.8124C247.984 44.636 248.199 44.6279 248.36 44.733C248.306 44.4344 248.8 44.4537 249.074 44.2008C248.882 44.4734 247.139 43.4828 246.92 44.4133C246.551 44.5636 246.172 44.1534 246.268 43.8112L247.059 43.4302L246.107 43.2942C245.877 42.8734 246.353 42.5295 246.369 42.1348C246.519 42.5031 248.182 42.5845 247.908 41.6018C248.152 42.1056 248.674 42.2577 248.913 42.4812C248.905 42.2668 248.943 42.1365 249.379 42.3676C248.93 41.6417 248.807 42.23 248.508 41.4605C249.257 41.3085 249.45 41.036 249.513 40.2807C249.372 40.5058 249.248 40.7151 249.107 40.9403C249.008 40.9364 248.926 40.9167 248.878 40.8983C248.852 41.1115 248.75 41.2064 248.465 41.3106C248.439 41.1448 247.319 40.6563 247.725 40.4086C246.791 41.4923 246.45 39.3044 245.91 39.9918C245.664 39.9657 245.47 39.4474 245.839 39.2971C246.579 39.7872 246.545 38.5833 247.092 38.5223C246.802 38.3462 246.686 39.1819 246.315 38.9532C246.165 38.585 246.545 38.1715 246.704 37.8976L246.881 38.0198C246.94 37.7751 246.983 37.5461 247.041 37.3342C246.644 37.3516 246.598 38.0912 246.238 37.5994C246.345 37.4058 245.985 36.9141 246.284 36.8598C246.858 36.9646 247.468 36.5601 247.747 36.9993C247.564 36.6298 247.085 35.4249 246.577 36.1464L246.464 35.6807C246.25 36.0678 245.947 37.0444 245.553 36.1723L245.703 36.1288L244.962 35.6715L245.259 35.2713C245.074 35.3464 244.878 35.3058 244.805 35.0559C245.008 34.932 245.019 34.6689 245.303 34.5975C245.032 33.928 244.678 34.1284 244.431 34.1023C244.248 33.7327 244.338 33.555 244.832 33.5743C244.739 33.027 244.345 32.155 244.579 31.6534C244.009 31.0711 244.473 31.847 243.854 31.6251C244.871 30.5611 243.458 29.1715 242.84 28.126C241.886 28.8795 242.586 27.8855 241.521 28.1075C241.962 28.2071 241.907 26.7058 242.616 27.5407L242.242 26.9989C242.648 26.3393 243.118 27.7745 243.668 26.824C243.348 26.169 241.975 26.2636 242.03 25.2938C242.908 25.2128 241.521 24.8127 242.42 24.6172C242.766 24.6471 242.788 24.9116 242.929 25.0983L243.02 24.8877C242.804 24.105 242.523 24.1105 242.204 24.2463C241.885 24.3821 241.512 24.6311 241.077 24.367C240.566 23.5399 241.331 23.405 241.669 23.1876C241.76 22.977 241.412 22.601 241.121 22.4578C241.834 22.7822 241.122 23.6604 240.545 23.6544C241.204 22.8564 239.987 22.3312 239.545 22.2644C239.246 23.9331 239.906 23.1352 239.494 24.75C239.839 24.78 240.597 24.3977 240.613 25.2385C240.029 24.9851 240.191 25.4692 240.134 25.6482C240.511 25.3004 240.531 26.0425 240.807 26.1686C240.528 26.5202 239.6 26.2039 239.733 26.9998L240.853 26.6646C240.822 27.0094 240.035 26.8798 240.544 27.361C239.87 27.2852 239.733 27.8235 239.216 27.1279C238.734 28.4599 240.322 28.3572 241.042 28.9289C240.944 28.8922 240.794 28.9357 240.696 28.899C241.042 28.9289 241.162 29.2301 241.286 29.4327C241.229 30.0235 240.666 29.2438 240.409 29.4808L240.741 30.2516C240.707 30.2832 240.689 30.299 240.672 30.3148C240.898 30.4554 241.073 30.6105 240.834 30.7989C240.393 30.6993 240.01 30.7667 239.666 30.7038L240.734 31.2398C240.336 31.2901 240.4 32.1493 239.907 31.6852L240.537 32.8465L239.845 33.2313C240.066 33.4706 240.217 33.4271 240.183 33.0468C240.164 33.5074 242.107 34.4399 240.609 34.7438C241.553 35.489 241.453 35.9299 242.17 36.9793C241.207 36.2828 241.638 38.2929 241.012 37.4448C240.87 38.1147 241.7 37.9823 241.965 38.3716C241.779 38.8915 241.002 38.9106 240.587 38.5649L241.099 38.9803L240.948 39.0238L241.513 39.3588C241.274 39.959 240.806 39.6937 240.835 40.2055L241.515 40.1167L241.233 40.567C241.506 40.347 241.71 40.6021 241.877 40.9546L241.727 40.9981L241.975 41.4032C241.459 41.0865 241.94 41.8466 241.416 41.7602C241.483 42.1418 241.499 42.1589 241.803 42.7967L242.225 42.5661C242.836 43.3643 241.557 42.7706 241.708 43.5179L242.21 43.3398C241.598 44.6009 243.134 44.9903 242.767 45.8985C242.537 45.4777 241.949 45.7348 242.115 45.7083C242.469 46.3317 242.54 47.4382 243.326 48.0125C242.616 48.4132 242.398 48.5199 242.201 49.303C242.346 49.8029 242.409 49.8712 242.901 49.9563C242.68 50.5078 243.289 51.3718 242.74 51.4986C243.2 51.5495 242.721 51.9591 243.141 52.1732L242.923 52.28L243.439 52.1519C242.373 53.2305 244.339 53.5708 243.439 54.623L243.279 54.485L243.546 54.8413C243.311 54.931 243.151 54.793 242.853 54.8143C242.874 55.1116 242.913 55.3932 242.934 55.6905L242.981 56.5655L243.344 56.1678C243.428 56.5335 243.981 56.7199 243.715 57.1872C242.832 56.5762 243.757 57.7819 243.156 57.9561L242.89 57.5998C243.002 58.0984 243.002 58.0984 243.533 58.0203C243.787 58.6727 242.569 58.5922 243.207 59.1443L243.208 58.6995C243.512 58.5466 243.98 58.812 244.001 59.1093C243.915 59.1884 243.708 59.4109 243.617 59.2097C243.861 59.7134 243.646 60.5452 243.884 60.7687C243.74 61.0596 243.346 61.0112 243.204 60.8574C243.479 61.3953 243.474 61.5269 243.452 61.6743C243.446 61.8059 243.425 61.9204 243.683 62.4741L243.37 62.4783L243.751 62.8556L243.132 63.4575L243.521 63.2256C243.605 63.5913 243.811 63.8135 243.678 64.2531L243.222 64.1035C243.382 64.6204 243.204 64.943 243.061 65.2339C242.933 65.5419 242.839 65.8183 243.166 66.3088C243.08 66.3878 242.938 66.234 242.859 66.1485C243.598 67.0505 242.07 66.8756 242.958 67.7669C242.812 67.7117 242.626 67.8198 242.496 67.7818L242.792 68.2052L242.166 68.1807L243.077 68.5128L242.439 68.7845L242.746 68.9447C241.572 69.3931 242.454 70.0371 241.572 70.6286L242.336 70.5266C242.732 70.921 242.897 71.3393 242.88 71.767C242.862 72.1946 242.712 72.65 242.544 73.1212C242.361 73.5753 242.161 74.0452 242.026 74.5177C241.909 74.9744 241.856 75.4666 242.002 75.9336L241.394 75.8604L242.072 76.6611C241.561 77.0366 241.555 76.3774 241.253 76.4974C241.549 77.3326 242.128 76.894 242.255 77.8544C241.806 78.3311 241.817 77.6561 241.613 77.401C241.856 78.3166 242.066 79.6756 241.678 80.2865C241.76 80.3062 241.873 80.36 241.907 80.3284C242.146 80.9637 241.769 81.7233 241.742 82.3812C241.464 82.3209 241.438 82.1551 241.394 82.0052C241.335 82.25 241.108 82.5541 241.379 82.7789L240.88 82.4793C240.728 82.9676 241.1 83.987 240.471 84.0284C240.72 83.9887 241.179 84.0725 241.078 84.5133C240.116 84.6405 241.309 85.7579 240.722 86.3939C240.512 86.2704 240.532 85.777 240.494 85.9073C240.217 86.226 240.598 86.6033 240.848 86.9425L240.491 86.7968C240.6 87.3612 240.677 87.9242 240.769 88.5044C239.808 88.5987 240.657 90.0651 240.005 89.842C239.883 90.4302 240.501 89.4165 240.471 90.1731C240.053 90.3051 240.542 90.8678 239.952 90.746L239.89 90.6447L239.836 91.1697L239.309 90.7373C239.356 91.2004 239.901 91.6171 240.342 91.7167C239.948 92.0802 240.103 92.7287 239.522 92.8213L239.414 92.6359C239.431 93.8556 237.418 94.2548 238.248 95.358C238.146 95.4199 238 95.3648 238.038 95.2345L237.862 95.936L237.46 95.6732C237.607 96.1073 237.77 96.5584 237.901 97.0083L237.607 96.931C237.313 97.6773 237.179 98.9406 237.039 99.9565L236.931 99.771C237.114 100.964 236.38 100.754 236.51 101.616C236.43 101.564 236.414 101.547 236.4 101.497L236.239 102.215L235.984 101.975C236.235 102.314 235.941 102.648 235.652 102.851C235.363 103.054 235.078 103.158 235.395 103.088C235.578 103.458 235.785 104.059 236.123 104.253C235.927 105.036 235.691 104.335 235.311 104.749C235.124 105.302 235.609 105.551 235.12 106.224L234.827 106.114C234.779 106.474 234.916 106.76 234.814 107.266L234.705 107.081C235.078 108.067 233.537 107.81 234.635 108.824C234.311 109.092 234.283 109.783 233.698 109.562C233.751 110.684 233.685 111.506 233.593 112.573C232.592 112.418 233.584 112.803 232.824 113.218L233.347 113.337C233.138 114.038 232.6 114.692 232.029 115.345C231.458 115.998 230.918 116.686 230.755 117.47L230.233 117.318L230.674 117.829C230.247 118.603 229.765 119.491 229.335 120.331C228.921 121.187 228.493 121.994 228.22 122.626C228.297 123.156 228.641 124.043 228.172 124.634L228.143 124.534C227.893 125.809 227.559 127.131 226.705 128.267C226.547 128.096 226.33 128.137 226.255 127.953C226.663 128.496 225.944 128.715 225.819 128.957L226.32 128.812C226.627 129.384 225.937 129.703 225.492 129.702C225.58 129.969 225.668 130.236 225.739 130.519C225.656 130.533 225.573 130.546 225.491 130.526L225.697 130.748L224.905 130.75C224.963 130.95 224.765 131.766 225.255 132.296C225.026 132.254 224.596 132.682 224.68 132.224L223.496 134.171L223.884 133.972C224.387 134.173 224.39 134.931 224.018 135.147C223.828 134.53 223.356 134.775 222.91 134.774C223.026 135.174 223.456 134.746 223.643 135.017C223.716 135.267 223.703 135.596 223.625 135.89C223.564 136.167 223.423 136.392 223.257 136.419L223.17 136.119C223.097 136.693 222.149 136.458 221.932 136.944C222.088 137.559 221.572 137.687 222.45 138.018C222.29 138.704 221.759 137.958 221.587 138.116C221.815 138.603 221.127 139.301 220.652 139.2C221.67 140.162 219.359 140.583 220.289 141.245C220.023 141.301 219.74 141.372 219.458 141.41C219.715 141.585 220.259 142.002 220.141 142.459C219.638 142.669 219.223 142.324 218.894 142.278L219.737 143.085C218.6 143.848 217.793 145.036 217.017 146.257C216.63 146.868 216.209 147.478 215.757 148.053C215.304 148.629 214.82 149.17 214.259 149.593C214.054 150.161 213.862 150.846 213.603 151.528C213.474 151.868 213.345 152.209 213.184 152.516C213.006 152.839 212.812 153.144 212.586 153.415L212.545 153.2L211.514 154.214L212.511 153.643C212.465 153.971 212.502 154.285 212.343 154.526C211.712 155.045 211.01 155.66 210.404 156.378C210.092 156.728 209.796 157.128 209.565 157.531C209.317 157.95 209.102 158.37 208.95 158.858C209.359 160.604 207.529 158.901 207.667 160.389C207.624 160.239 207.497 160.103 207.437 159.969C207.087 161.273 206.894 161.957 206.802 163.436C205.813 162.574 206.361 164.127 205.852 163.646L206.216 164.039C205.785 164.088 205.304 164.564 205.052 164.258L205.265 165.106L204.798 164.841C204.328 165.432 203.77 166.992 202.644 166.668C202.541 167.174 202.357 167.661 202.088 168.194C201.836 168.712 201.485 169.225 201.134 169.739C200.4 170.764 199.534 171.752 198.774 172.612C198.934 173.129 198.581 173.708 198.299 174.158L197.438 174.224C197.268 174.761 197.576 175.712 196.926 175.867C196.878 175.816 196.831 175.765 196.832 175.732C196.613 176.251 196.011 176.458 196.178 177.222C195.78 177.684 195.159 177.94 194.783 177.431C195.596 178.138 193.888 178.352 193.888 178.352C193.888 178.352 193.56 178.718 192.99 179.338C192.403 179.974 191.589 180.914 190.603 182.045C190.118 182.62 189.581 183.241 188.993 183.91C188.422 184.563 187.815 185.281 187.174 186.03C186.551 186.764 185.891 187.561 185.232 188.359C184.573 189.157 183.879 189.987 183.217 190.851C177.793 197.657 172.141 205.624 171.899 210.408C172.141 210.945 171.946 211.695 172.614 211.902C172.411 212.438 171.536 212.041 171.865 212.466C172.622 212.117 172.78 213.523 173.742 213.396L173.543 213.833C173.778 214.155 173.624 213.062 174.081 213.591L173.401 212.856C173.756 212.655 174.054 212.634 174.396 212.73C174.334 212.217 173.436 211.177 174.453 210.903L174.345 211.13C174.763 210.586 175.118 211.209 175.333 211.201L175.213 211.312L175.977 211.177C175.428 211.304 175.583 212.364 175.794 212.043C176.539 211.578 175.48 212.047 175.766 211.498C175.977 211.177 176.307 211.602 176.529 211.808L176.948 211.264C177.298 211.574 176.621 211.597 177.178 211.685L177.35 210.703C178.348 211.335 177.525 209.623 178.615 210.011C178.424 210.663 178.954 210.206 179.172 210.544L180.112 209.329C180.327 209.32 180.139 209.873 180.231 209.663C180.66 209.646 180.319 209.106 180.422 209.011C180.747 209.123 181.151 208.117 181.707 208.649C182.766 208.18 181.234 207.692 182.194 207.219C182.632 207.417 181.788 207.878 182.433 207.854L182.947 206.968C183.054 207.186 183.4 207.595 183.077 207.83C185.291 206.137 188.129 206.561 189.246 204.232C189.903 204.324 189.361 204.665 189.493 205.082C190.08 203.21 192.049 203.897 192.991 202.649L192.64 202.338C195.098 201.561 196.091 199.03 198.085 197.477L197.655 197.493C197.511 196.96 197.827 196.511 197.911 196.053C198.122 196.144 198.504 196.9 198.796 196.22C198.581 196.228 198.262 196.364 198.138 196.161C199.261 195.727 200.462 194.588 201.704 193.253C202.947 191.917 204.213 190.402 205.498 189.216C206.148 188.237 206.88 187.277 207.628 186.334C208.376 185.392 209.172 184.467 209.986 183.527C211.563 181.661 213.124 179.778 214.374 177.834C213.988 178.411 213.249 177.51 213.771 177.25C216.183 177.179 214.967 175.007 216.9 174.555C217.157 173.906 217.525 173.377 217.942 172.866C218.358 172.355 218.805 171.911 219.221 171.433C220.052 170.477 220.785 169.484 220.893 168.022L221.361 168.288C221.78 168.123 221.529 167.817 221.708 167.461L221.82 167.548C222.18 167.216 222.381 166.746 222.58 166.309C222.779 165.872 222.927 165.482 223.197 165.328L222.7 164.963C222.968 164.463 223.26 164.985 223.271 164.31L223.528 164.485L223.398 163.623C224.264 164.25 224.324 162.358 224.972 162.235C225.199 161.519 225.551 160.149 226.295 159.304C226.869 159.409 227.558 158.266 228.259 157.684C228.636 156.925 229.084 156.036 229.617 155.101C230.15 154.167 230.685 153.166 231.314 152.301L230.7 151.981L230.935 151.479C231.064 151.55 231.18 151.538 231.192 151.654C232.099 151.673 231.621 150.435 232.271 150.279C231.58 150.219 231.995 150.565 231.82 150.822C231.299 151.049 230.931 150.342 231.54 149.971L231.67 150.042L231.559 149.51C232.061 149.744 232.466 149.529 232.952 149.746C233.365 148.922 233.48 148.119 233.661 147.319C233.842 146.519 234.054 145.753 234.613 144.984C235.057 145.429 235.126 143.719 235.87 144.522C236.049 143.343 235.021 144.291 234.607 143.501C234.767 143.227 234.668 142.811 235.042 142.941C235.198 143.178 235.733 143.001 235.705 143.28L235.998 142.567C236.098 142.538 236.156 142.738 236.168 142.853C236.333 141.213 238.021 140.702 238.082 139.189C237.779 138.93 237.734 139.636 237.43 139.377C237.362 137.793 238.586 138.566 238.676 137.153L239.019 137.627C238.876 137.094 238.544 136.736 239.239 136.285C239.86 136.441 239.44 137.018 239.555 137.45C239.679 137.241 239.826 136.852 239.873 136.524C239.903 136.179 239.831 135.929 239.498 135.982C239.539 135.374 240.131 135.43 240.404 135.21C240.275 135.139 239.814 135.533 239.699 135.1C240.332 134.548 240.823 133.431 241.253 132.591C241.382 132.662 241.628 132.688 241.673 132.805C241.3 131.819 242.529 132.46 242.802 131.416Z" fill="#FF7800"/>
                <path d="M252.728 81.6284L252.597 82.003C252.729 82.0082 252.892 82.0477 253.033 82.2348L252.728 81.6284Z" fill="#FF7800"/>
                <path d="M249.552 99.5065C249.599 99.5579 249.63 99.6251 249.677 99.6766C249.681 99.578 249.616 99.5422 249.552 99.5065Z" fill="#FF7800"/>
                <path d="M249.588 104.06C249.535 103.729 249.312 103.967 249.126 104.075C249.241 104.096 249.388 104.118 249.588 104.06Z" fill="#FF7800"/>
                <path d="M251.642 71.2728C251.705 71.3411 251.785 71.3937 251.918 71.3656C251.806 71.2789 251.725 71.2593 251.642 71.2728Z" fill="#FF7800"/>
                <path d="M249.062 43.0178C249.044 43.0665 249.042 43.0995 248.991 43.1469C249.042 43.0995 249.061 43.0507 249.062 43.0178Z" fill="#FF7800"/>
                <path d="M248.475 44.7574C248.488 44.8405 248.534 44.9249 248.628 45.0607C248.634 44.8958 248.571 44.8273 248.475 44.7574Z" fill="#FF7800"/>
                <path d="M251.578 78.1321C251.59 78.2481 251.636 78.3324 251.763 78.4363C251.77 78.2716 251.691 78.186 251.578 78.1321Z" fill="#FF7800"/>
                <path d="M248.829 45.3502L248.847 45.7462C248.88 45.7475 248.913 45.7489 248.963 45.7345L248.829 45.3502Z" fill="#FF7800"/>
                <path d="M249.018 42.4874C249.029 42.6363 249.087 42.8366 249.065 42.9842C249.188 42.7747 249.145 42.6245 249.018 42.4874Z" fill="#FF7800"/>
                <path d="M250.55 60.9474C250.566 60.9646 250.566 60.9646 250.565 60.9975C250.867 61.2578 250.726 61.0704 250.55 60.9474Z" fill="#FF7800"/>
                <path d="M250.216 46.8277C250.199 46.8436 250.215 46.8607 250.198 46.8766L250.393 46.9508L250.216 46.8277Z" fill="#FF7800"/>
                <path d="M248.846 40.7485C248.876 40.8156 248.923 40.8668 249.003 40.9194C249.006 40.8536 249.009 40.7879 249.013 40.6892C248.946 40.7195 248.879 40.7498 248.846 40.7485Z" fill="#FF7800"/>
                <path d="M250.926 54.9414C250.682 54.8498 250.517 54.8437 250.401 54.8559C250.446 54.9731 250.542 55.0427 250.926 54.9414Z" fill="#FF7800"/>
                <path d="M163.743 244.385C163.74 244.451 163.721 244.532 163.7 244.646C163.736 244.549 163.74 244.451 163.743 244.385Z" fill="#FF7800"/>
                <path d="M170.984 247.104L170.879 247.232C170.929 247.217 170.981 247.17 170.984 247.104Z" fill="#FF7800"/>
                <path d="M159.267 243.367C159.268 243.334 159.268 243.334 159.269 243.301C159.204 243.298 159.106 243.262 158.942 243.255L159.267 243.367Z" fill="#FF7800"/>
                <path d="M186.809 252.354L186.709 252.35C186.742 252.351 186.774 252.386 186.809 252.354Z" fill="#FF7800"/>
                <path d="M177.387 248.979C177.441 248.867 177.508 248.836 177.559 248.822C177.494 248.786 177.444 248.801 177.387 248.979Z" fill="#FF7800"/>
                <path d="M156.786 237.389C156.813 237.522 156.874 237.656 156.934 237.79C156.925 237.608 156.85 237.424 156.786 237.389Z" fill="#FF7800"/>
                <path d="M154.268 239.953C154.317 239.971 154.384 239.941 154.469 239.894C154.403 239.892 154.388 239.842 154.268 239.953Z" fill="#FF7800"/>
                <path d="M154.568 239.866C154.551 239.882 154.501 239.896 154.451 239.911C154.484 239.912 154.517 239.913 154.568 239.866Z" fill="#FF7800"/>
                <path d="M248.202 235.313C248.305 235.185 248.103 234.896 247.965 234.643L248.202 235.313Z" fill="#FF7800"/>
                <path d="M202.474 255.222L202.434 255.385C202.453 255.336 202.471 255.288 202.474 255.222Z" fill="#FF7800"/>
                <path d="M245.265 233.356L245.383 233.311C245.317 233.309 245.3 233.324 245.265 233.356Z" fill="#FF7800"/>
                <path d="M159.472 236.317C159.62 235.926 159.931 236.4 159.93 236.021C159.762 236.08 159.544 235.775 159.472 236.317Z" fill="#FF7800"/>
                <path d="M206.83 240.595L206.914 240.582C206.865 240.563 206.848 240.579 206.83 240.595Z" fill="#FF7800"/>
                <path d="M245.265 233.356L245.131 233.416C245.195 233.452 245.261 233.454 245.325 233.49C245.295 233.423 245.263 233.389 245.265 233.356Z" fill="#FF7800"/>
                <path d="M220.169 254.96C220.152 254.976 220.151 255.009 220.149 255.042L220.169 254.96Z" fill="#FF7800"/>
                <path d="M221.237 255.435C221.185 255.482 221.117 255.545 221.065 255.592C221.163 255.629 221.2 255.532 221.237 255.435Z" fill="#FF7800"/>
                <path d="M247.966 234.643L247.817 234.275C247.813 234.373 247.873 234.507 247.966 234.643Z" fill="#FF7800"/>
                <path d="M231.264 252.055C231.229 252.086 231.212 252.102 231.177 252.134C231.211 252.135 231.245 252.103 231.264 252.055Z" fill="#FF7800"/>
                <path d="M176.823 248.642C176.808 248.592 176.792 248.574 176.761 248.54C176.741 248.622 176.738 248.688 176.823 248.642Z" fill="#FF7800"/>
                <path d="M184.651 240.038C184.728 240.157 184.937 239.901 185.064 239.626C184.967 239.589 184.865 239.651 184.651 240.038Z" fill="#FF7800"/>
                <path d="M185.725 239.968C185.709 239.951 185.693 239.934 185.694 239.9C185.709 239.951 185.725 239.968 185.725 239.968Z" fill="#FF7800"/>
                <path d="M179.269 237.793L179.268 237.827C179.268 237.827 179.268 237.827 179.269 237.793Z" fill="#FF7800"/>
                <path d="M180.612 238.016C180.625 238.099 180.64 238.15 180.67 238.217C180.657 238.134 180.644 238.051 180.612 238.016Z" fill="#FF7800"/>
                <path d="M201.479 238.833C200.884 238.875 200.201 239.03 199.504 239.135C199.156 239.171 198.824 239.224 198.478 239.227C198.149 239.214 197.821 239.168 197.561 239.059C197.184 239.819 196.806 239.788 196.405 239.904L196.548 238.821L196.174 239.104C196.105 238.755 196.444 238.949 196.296 238.515L196.057 239.148C196.105 238.755 195.314 238.757 195.967 238.09L194.772 237.862C194.511 237.785 194.457 238.723 194.19 238.399C194.186 238.086 194.33 238.207 194.378 237.813C193.642 236.845 192.967 239.687 192.202 239.031L192.306 238.903C192.098 239.159 191.854 239.067 191.798 239.213C191.689 240.297 192.052 238.662 192.206 239.344C192.005 240.227 191.793 239.757 191.666 240.444C191.532 240.093 191.315 240.579 191.133 240.588C190.943 239.971 190.436 240.281 190.368 239.52C190.159 239.775 189.829 240.62 189.499 240.607C189.414 239.862 189.69 239.955 189.44 239.615L189.287 240.137C189.045 240.012 189.133 239.867 189.192 239.622C188.932 239.546 188.819 240.284 188.555 239.894L188.854 239.428C188.568 239.565 188.473 239.462 188.148 239.35C188.226 239.057 188.356 239.095 188.434 239.213C188.417 238.405 188.044 239.478 187.949 239.376C187.94 239.606 188.148 239.763 187.93 240.249C187.771 240.111 187.41 240.888 187.419 240.245L187.718 239.779C187.26 240.107 187.397 240.393 187.029 240.098C187.063 240.067 187.069 239.935 187.105 239.837C186.718 240.449 186.498 239.764 186.107 239.65L186.211 239.522C186.024 239.663 185.841 240.118 185.76 240.065C185.928 240.418 185.823 240.546 185.736 241.07C185.625 240.159 185.074 241.968 184.702 241.359C184.78 241.066 184.975 240.727 185.028 241.059C185.376 240.199 185.554 239.463 185.93 239.115C185.709 239.288 185.459 239.361 185.589 238.987L185.359 239.802C185.243 239.814 185.164 239.729 185.082 239.709C184.913 240.213 185.128 240.618 184.804 240.885C184.465 241.103 184.822 240.012 184.709 240.37C184.237 240.616 184.361 241.231 184.029 240.871C184.08 240.824 184.184 240.696 184.198 240.779C183.999 240.392 183.505 240.785 183.627 239.784C183.718 239.573 183.796 239.279 183.858 239.381L183.836 239.528C184.29 238.886 183.55 239.665 183.832 238.803C183.745 239.327 183.373 239.131 183.23 239.01L183.156 239.617C182.198 241.294 183.451 238.425 182.82 238.532C182.362 238.861 182.911 238.734 182.616 239.101C182.408 238.945 182.413 238.401 181.994 238.566C181.939 238.3 181.804 237.948 181.931 237.261C181.658 237.481 181.322 236.808 181.065 237.458C181.32 238.111 181.586 236.819 181.827 237.801L181.554 238.433C181.262 238.323 180.806 238.585 180.636 238.298C180.646 238.447 180.64 238.612 180.584 238.758C180.099 238.92 179.842 239.57 179.459 239.258C179.517 238.634 179.758 238.792 179.94 238.782C179.764 238.248 179.663 238.689 179.279 238.41C179.366 237.886 179.555 238.503 179.708 237.982L179.21 238.061C179.212 238.028 179.213 237.995 179.231 237.947C178.982 238.811 178.892 237.785 178.553 238.003C177.882 237.861 177.538 239.035 177.018 239.674C176.962 239.408 176.972 239.177 177.063 238.967C177.144 239.399 177.19 239.071 177.281 238.86C177.032 238.9 176.957 237.891 177.135 237.568C176.715 237.766 177.181 238.064 176.892 238.3L176.403 238.149C176.384 238.61 176.544 238.749 176.218 239.049C175.984 239.139 175.889 239.036 175.612 238.943C175.703 238.732 175.657 238.236 175.852 238.309C175.744 238.124 175.533 238.033 175.367 238.472C175.612 238.943 174.778 238.762 174.879 239.524L174.635 239.053C174.716 239.073 174.761 238.778 174.856 238.88C174.901 238.173 174.553 239.033 174.436 239.078C174.359 238.927 174.067 238.817 174.094 238.537C173.972 238.714 173.749 238.507 173.747 238.161C173.561 238.269 173.662 238.619 173.571 238.83L173.083 238.679C173.131 238.285 173.257 237.218 173.361 237.091C173.117 237.411 173.101 238.218 172.825 238.125C173.117 237.411 172.52 237.487 172.917 236.645C172.841 236.081 172.365 236.013 172.062 236.166C171.792 236.733 172.294 236.554 172.171 237.143C171.408 237.245 171.095 238.898 170.598 238.533L170.706 238.718C170.315 239.016 170.367 238.936 170.1 239.437C170.311 238.703 170.019 237.356 169.422 237.431C169.324 237.807 169.622 238.198 169.466 238.785L169.084 238.853C169.054 238.786 169.125 238.656 169.178 238.576C168.806 238.792 168.693 237.502 168.493 238.384L168.291 237.239L168.37 237.737C168.273 238.112 167.891 238.179 167.787 238.307C167.36 238.67 167.274 238.337 167.096 237.835C167.133 238.15 167.203 238.878 166.902 238.965C167.05 237.751 166.329 238.448 166.405 237.808C166.273 237.803 166.107 237.417 166.054 237.91L166.15 237.155C166.009 238.205 165.584 238.122 165.215 238.273C165.438 236.83 164.833 238.34 164.787 237.019C164.633 237.986 164.147 237.357 164.015 238.176C163.75 238.199 163.853 237.28 163.816 236.965L163.67 237.322C163.574 236.84 163.084 236.722 162.816 236.398L162.485 237.243L162.402 236.844C162.344 237.056 162.108 237.178 162.227 237.513L162.081 237.458C162.009 238.411 161.857 237.696 161.543 238.113C161.484 237.946 161.509 237.732 161.58 237.603C161.433 237.581 161.518 237.089 161.449 236.773C161.538 237.008 160.837 238.448 161.215 238.891C161.232 239.288 160.974 239.558 160.849 239.388L160.784 238.528L160.584 239.411C160.365 239.518 160.272 238.97 160.111 238.865C160.294 238.822 160.588 237.251 160.094 237.232C160.346 237.126 160.496 236.67 160.652 236.495C160.554 236.458 160.508 236.374 160.687 236.018C160.281 236.266 160.534 236.54 160.151 236.64C160.198 235.867 160.093 235.616 159.757 235.355L159.998 235.925C159.994 236.024 159.959 236.089 159.94 236.137C160.019 236.223 160.064 236.34 160.068 236.654C159.986 236.634 159.601 237.592 159.554 237.128C159.901 238.329 158.874 238.041 159.108 238.776C159.066 239.005 158.801 239.028 158.783 238.664C159.103 238.083 158.554 237.798 158.608 237.272C158.484 237.482 158.849 237.843 158.689 238.117C158.506 238.159 158.36 237.692 158.271 237.457L158.359 237.312L158.076 236.971C158.027 237.365 158.363 237.626 158.091 237.813C158.015 237.662 157.744 237.849 157.756 237.552C157.876 237.03 157.789 236.317 158.025 236.194C157.824 236.253 157.21 236.344 157.479 237.047L157.25 237.005C157.401 237.341 157.807 237.917 157.358 238.015L157.364 237.85L157.061 238.416L156.912 238.014C156.921 238.196 156.865 238.375 156.766 238.371C156.742 238.139 156.663 238.054 156.659 237.74C156.443 237.781 156.444 238.161 156.419 238.374C156.302 238.419 156.259 238.269 156.343 237.811C156.215 237.707 155.998 237.781 156.097 237.372C155.985 237.698 156.057 237.536 155.939 238.026C155.976 237.928 155.997 237.814 156.018 237.699C155.962 237.845 155.941 237.96 155.886 238.106C155.866 238.188 155.831 238.252 155.795 238.317C155.776 238.366 155.757 238.447 155.721 238.512C155.686 238.576 155.65 238.641 155.614 238.705C155.596 238.754 155.56 238.819 155.542 238.868C155.401 239.093 155.33 239.222 155.244 239.301L155.21 239.333C155.193 239.349 155.176 239.364 155.176 239.364C155.193 239.349 155.176 239.364 155.193 239.349C155.193 239.349 155.193 239.349 155.21 239.333C155.227 239.317 155.244 239.301 155.26 239.318L154.591 239.556C154.573 239.572 154.558 239.555 154.54 239.57C154.573 239.572 154.558 239.555 154.508 239.569C154.508 239.569 154.49 239.585 154.475 239.568L154.457 239.584C154.44 239.599 154.425 239.582 154.407 239.598L154.374 239.597C154.374 239.597 154.374 239.597 154.49 239.585C154.407 239.598 154.374 239.597 154.374 239.597C154.39 239.614 154.39 239.614 154.374 239.597L154.44 239.599C154.44 239.599 154.44 239.599 154.39 239.614C154.324 239.611 154.407 239.598 154.519 239.685C154.631 239.772 154.805 239.96 154.913 240.146C154.883 240.078 154.929 240.163 154.959 240.23C154.99 240.297 155.005 240.314 154.99 240.297C154.991 240.264 154.945 240.18 154.867 240.061L154.897 240.128C155.005 240.314 154.972 240.313 154.988 240.33C154.972 240.313 154.972 240.313 154.972 240.313C154.972 240.313 154.957 240.296 154.974 240.28C154.975 240.247 154.959 240.23 154.945 240.18C154.917 240.047 154.924 239.882 154.928 239.783C154.932 239.685 154.934 239.619 154.936 239.586C154.937 239.553 154.937 239.553 154.938 239.52C154.94 239.487 154.958 239.438 154.977 239.39C154.995 239.341 155.013 239.292 155.049 239.228C155.086 239.13 155.136 239.115 155.136 239.115C155.136 239.115 155.119 239.131 155.068 239.179C155.05 239.195 155.032 239.243 155.031 239.276C155.029 239.309 154.995 239.341 154.994 239.374C154.955 239.504 154.953 239.57 154.991 239.44C155.011 239.358 155.049 239.228 155.1 239.18C155.136 239.115 155.203 239.085 155.153 239.1C155.153 239.1 155.12 239.098 155.103 239.114L155.07 239.113C155.053 239.129 155.037 239.112 155.037 239.112C155.004 239.11 154.987 239.126 154.971 239.109C154.938 239.108 154.905 239.106 154.873 239.105C154.84 239.104 154.824 239.087 154.791 239.086C154.758 239.084 154.725 239.083 154.693 239.049C154.66 239.047 154.645 239.03 154.612 239.029C154.612 239.029 154.596 239.012 154.579 239.028L154.563 239.011C153.994 238.807 153.409 238.586 152.873 238.384C153.442 238.588 153.994 238.807 154.563 239.011L154.579 239.028L154.612 239.029C154.628 239.046 154.66 239.047 154.676 239.065C154.725 239.083 154.758 239.084 154.807 239.103C154.855 239.121 154.937 239.141 154.987 239.126C155.02 239.127 155.053 239.129 155.086 239.13C155.119 239.131 155.119 239.131 155.136 239.115C155.136 239.115 155.186 239.101 155.153 239.1L155.136 239.115C155.119 239.131 155.066 239.212 155.029 239.309C154.975 239.422 154.95 239.636 154.955 239.916C154.953 239.982 154.951 240.015 154.965 240.098C154.963 240.131 154.978 240.181 154.976 240.214C154.992 240.231 154.991 240.264 154.991 240.264C154.991 240.264 154.99 240.297 155.007 240.281C154.992 240.231 155.022 240.298 154.991 240.264C154.991 240.264 154.991 240.264 154.961 240.197C154.93 240.13 154.868 240.028 154.838 239.961C154.791 239.91 154.838 239.961 154.854 239.978C154.838 239.961 154.806 239.927 154.792 239.877C154.746 239.793 154.683 239.724 154.634 239.706L154.713 239.792L154.697 239.774L154.666 239.74C154.634 239.706 154.618 239.689 154.618 239.689C154.618 239.689 154.602 239.672 154.587 239.655C154.571 239.638 154.571 239.638 154.555 239.62C154.539 239.603 154.506 239.602 154.49 239.585C154.539 239.603 154.555 239.62 154.555 239.62C154.41 239.532 154.298 239.445 154.338 239.282C154.112 239.141 153.962 239.185 153.942 239.267C153.905 239.364 154 239.467 154.147 239.522C154.228 239.542 154.31 239.561 154.393 239.548C154.426 239.549 154.509 239.536 154.509 239.536C154.526 239.52 154.559 239.522 154.576 239.506L154.609 239.507L154.626 239.491L154.743 239.446L154.76 239.431C154.811 239.416 154.843 239.417 154.894 239.403C154.977 239.39 155.044 239.359 155.078 239.328C155.011 239.358 154.876 239.419 154.809 239.449C154.944 239.388 155.011 239.358 155.061 239.343C155.111 239.329 155.111 239.329 155.145 239.297C155.042 239.392 154.957 239.471 154.838 239.549C154.72 239.627 154.587 239.655 154.451 239.748C154.482 239.782 154.514 239.817 154.53 239.834C154.561 239.868 154.593 239.902 154.626 239.904C154.592 239.935 154.608 239.952 154.59 239.968C154.742 239.892 154.843 239.83 154.701 240.088C154.427 240.341 154.136 240.61 153.866 240.764C154.182 240.694 154.452 240.54 154.689 240.384C154.584 240.545 154.576 240.743 154.57 240.874C154.564 241.039 154.541 241.186 154.31 241.21C154.57 241.286 154.833 241.33 155.08 241.323C155.037 241.585 154.993 241.847 154.967 242.093C155.201 242.004 155.224 241.856 155.031 241.717C155.142 241.836 155.483 241.553 155.703 241.413C155.923 241.273 156.088 241.28 155.976 242.017C156.268 241.716 156.437 241.623 156.637 241.565C156.822 241.49 157.021 241.465 157.292 241.277C156.868 241.986 157.816 242.188 157.342 242.5C157.625 242.84 157.675 242.001 157.878 241.877C158.08 242.199 157.999 242.97 157.774 243.242L158.019 242.889L158.013 243.053L158.244 242.617C158.475 243.039 158.296 243.394 158.522 243.502L158.583 242.812L158.732 243.213C158.662 242.897 158.816 242.755 158.999 242.713L158.993 242.877L159.196 242.753C158.981 243.174 159.388 242.893 159.285 243.4C159.466 243.423 159.466 243.423 159.8 243.305L159.753 242.841C160.197 242.463 159.758 243.534 160.102 243.597L160.107 243.053C160.581 243.978 160.968 242.575 161.306 243.182C161.087 243.289 161.111 243.933 161.118 243.768C161.438 243.6 161.942 243.768 162.298 243.122C162.365 243.916 162.373 244.131 162.688 244.506C162.92 244.482 162.972 244.402 163.089 243.977C163.29 244.299 163.768 243.888 163.746 244.448C163.846 244.007 163.939 244.555 164.103 244.182L164.109 244.429L164.148 243.887C164.461 245.119 164.915 243.274 165.235 244.342L165.146 244.486L165.352 244.297C165.358 244.544 165.271 244.656 165.225 244.984L166.042 245.181L165.927 244.748C166.111 244.706 166.279 244.201 166.447 244.554C166.037 245.313 166.725 244.614 166.699 245.24L166.494 245.43C166.726 245.406 166.726 245.406 166.78 244.88C167.116 244.728 166.869 245.939 167.221 245.392L167.025 245.351C167.005 245.021 167.203 244.616 167.35 244.639C167.364 244.722 167.436 244.972 167.334 245.034C167.606 244.846 167.939 245.173 168.079 244.98C168.187 245.166 168.089 245.541 168.018 245.671C168.611 245.281 168.243 245.811 168.836 245.422L168.791 245.717L169.019 245.38L169.173 246.062L169.141 245.648C169.307 245.622 169.463 245.414 169.636 245.635L169.487 246.058C170.022 245.881 169.932 246.883 170.499 246.328C170.512 246.411 170.424 246.556 170.372 246.603C170.91 245.948 170.553 247.451 171.128 246.666C171.073 246.812 171.098 247.011 171.06 247.142L171.301 246.887L171.194 247.493L171.509 246.631L171.533 247.275L171.659 247C171.677 248.188 172.106 247.38 172.251 248.293L172.331 247.521C172.838 246.799 173.206 247.094 173.569 247.487C173.949 247.898 174.307 248.423 174.813 248.146L174.69 248.734L175.178 248.094C175.273 248.609 174.961 248.58 174.964 248.894C175.42 248.631 175.295 248.049 175.777 247.953C175.941 248.404 175.611 248.391 175.456 248.567C175.926 248.354 176.627 248.151 176.859 248.539C176.879 248.457 176.916 248.36 176.917 248.327C177.256 248.109 177.572 248.451 177.884 248.48C177.823 248.758 177.723 248.787 177.639 248.833C177.752 248.887 177.859 249.106 178.001 248.847L177.784 249.334C177.992 249.49 178.552 249.1 178.494 249.724C178.52 249.478 178.62 249.036 178.815 249.11C178.728 250.047 179.453 248.838 179.694 249.408C179.603 249.619 179.355 249.626 179.421 249.628C179.542 249.897 179.789 249.511 179.997 249.255L179.884 249.614L180.772 249.269C180.685 250.205 181.529 249.299 181.338 249.951C181.615 250.044 181.192 249.483 181.556 249.465C181.573 249.861 181.923 249.347 181.768 249.935L181.716 249.982L181.98 249.992L181.694 250.542C181.928 250.452 182.214 249.902 182.314 249.461C182.447 249.846 182.786 249.628 182.763 250.188L182.659 250.316C183.275 250.191 183.262 252.137 183.909 251.222C183.923 251.305 183.883 251.468 183.819 251.433L184.16 251.561L183.978 251.983L184.709 251.435L184.631 251.728C184.986 251.94 185.63 251.916 186.141 251.919L186.037 252.047C186.677 251.709 186.499 252.444 186.971 252.199C186.951 252.281 186.917 252.312 186.9 252.328L187.261 252.375L187.134 252.651C187.538 252.056 187.737 253.647 187.678 253.068C187.887 252.812 188.228 252.528 188.341 252.17C188.735 252.219 188.358 252.567 188.56 252.888C188.836 252.981 188.989 252.459 189.321 252.819L189.243 253.112C189.442 253.087 189.598 252.912 189.846 252.905L189.741 253.033C190.275 252.477 190.081 254.019 190.676 252.773C190.797 253.041 191.164 252.924 191.042 253.512C191.631 253.222 192.08 253.124 192.631 252.964C192.541 253.967 192.748 252.92 192.97 253.538L193.042 252.997C193.798 253.059 194.416 254.518 195.26 254.436L195.189 254.977L195.442 254.426C195.653 254.517 195.879 254.625 196.123 254.717C196.367 254.809 196.61 254.901 196.838 254.976C197.327 255.127 197.784 255.243 198.144 255.323C198.418 255.07 198.87 254.494 199.207 254.722L199.154 254.802C199.857 254.566 200.555 254.428 201.248 254.835C201.173 255.063 201.232 255.23 201.128 255.358C201.365 254.79 201.556 255.374 201.719 255.414L201.518 255.093C201.768 254.608 202.011 255.145 202.078 255.527L202.463 254.981C202.477 255.031 202.506 255.131 202.503 255.197L202.597 254.92L202.699 255.65C202.804 255.522 203.271 255.375 203.447 254.706C203.453 254.954 203.759 255.147 203.49 255.269C203.881 255.383 204.29 255.481 204.698 255.58L204.527 255.326C204.532 254.782 204.941 254.468 205.095 254.738C204.814 255.155 205.031 255.494 205.097 255.909C205.29 255.636 204.968 255.425 205.079 255.133C205.307 254.795 205.759 254.632 205.848 254.866L205.725 255.076C206.029 254.89 206.106 255.833 206.388 255.794C206.669 255.376 206.818 255.778 206.822 254.855C207.192 254.671 206.929 255.485 207.056 255.589C207.238 255.168 207.739 255.435 207.802 255.915C208.038 254.556 208.787 256.432 208.867 255.281L209.171 255.919C209.183 255.623 209.244 254.933 209.496 254.794C209.731 255.117 209.66 255.658 209.729 255.974L209.875 254.826C210.542 255.445 211.299 255.508 212.088 255.572C212.483 255.587 212.878 255.603 213.288 255.668C213.698 255.734 214.072 255.864 214.459 256.077C214.778 255.941 215.134 255.707 215.487 255.54C215.857 255.356 216.242 255.223 216.636 255.271L216.563 255.433L217.346 255.662L216.737 255.209C216.891 255.067 216.984 254.823 217.148 254.83C218.024 255.194 219.227 255.636 220.148 254.881C220.583 253.496 220.782 255.944 221.252 254.908C221.214 255.038 221.223 255.22 221.201 255.367C221.817 254.798 222.142 254.53 222.673 253.627C222.869 254.905 223.106 253.512 223.194 254.192L223.15 253.663C223.37 253.935 223.748 253.966 223.782 254.347L223.926 253.643L224.086 254.161C224.501 254.095 225.237 253.447 225.724 254.456C226.124 253.927 226.715 253.604 227.383 253.399C228.035 253.177 228.765 253.074 229.413 252.951C229.449 252.474 229.785 252.322 230.055 252.168L230.579 252.667C230.789 252.378 230.807 251.505 231.225 251.785C231.255 251.852 231.252 251.918 231.251 251.951C231.475 251.713 231.895 251.927 231.922 251.268C232.239 251.165 232.694 251.348 232.835 251.947C232.64 251.461 232.823 251.419 233.051 251.494C233.279 251.569 233.567 251.778 233.567 251.778C233.567 251.778 233.634 251.747 233.768 251.72C233.885 251.675 234.085 251.617 234.318 251.56C234.553 251.47 234.837 251.366 235.172 251.247C235.507 251.128 235.876 250.978 236.295 250.813C237.939 250.118 240.145 249.001 242.224 247.334C243.264 246.501 244.274 245.568 245.157 244.53C245.607 244.02 246.024 243.476 246.392 242.946C246.585 242.673 246.744 242.399 246.936 242.127C247.096 241.852 247.24 241.561 247.399 241.287C247.543 240.996 247.669 240.721 247.796 240.445C247.922 240.17 248 239.876 248.094 239.599C248.281 239.046 248.418 238.507 248.472 237.982C248.526 237.456 248.546 236.962 248.483 236.482C248.42 236.001 248.305 235.568 248.125 235.132C247.744 234.754 247.65 234.24 247.03 234.051C246.995 233.703 247.888 234.051 247.456 233.721C246.954 233.899 246.315 232.967 245.556 232.971L245.567 232.707C245.263 232.481 245.779 233.177 245.217 232.809L246.036 233.352C245.801 233.442 245.571 233.433 245.245 233.321C245.496 233.661 246.585 234.462 245.856 234.532L245.862 234.401C245.717 234.725 245.208 234.243 245.028 234.22C245.045 234.204 245.062 234.188 245.063 234.155C244.866 234.147 244.668 234.14 244.471 234.132C244.883 234.131 244.385 233.386 244.327 233.599C243.874 233.795 244.589 233.642 244.527 233.953C244.471 234.132 244.054 233.819 243.797 233.644L243.654 233.935C243.285 233.673 243.792 233.776 243.32 233.609L243.494 234.209C242.496 233.609 243.697 234.91 242.693 234.442C242.643 234.044 242.355 234.247 242.085 233.989L241.714 234.585C241.551 234.545 241.531 234.215 241.526 234.347C241.183 234.251 241.627 234.697 241.576 234.744C241.285 234.601 241.278 235.178 240.688 234.677C239.994 234.715 241.333 235.444 240.688 235.501C240.286 235.238 240.817 235.16 240.328 235.009L240.178 235.465C240.037 235.278 239.656 234.9 239.839 234.858C239.538 234.978 239.157 235.012 238.779 234.981C238.401 234.95 237.975 234.867 237.631 234.804C236.909 234.71 236.319 234.621 236.181 235.193C235.699 234.877 235.996 234.856 235.812 234.519C235.825 235.014 235.447 234.983 234.991 234.833C234.551 234.7 234.082 234.468 233.908 234.692L234.207 235.05C233.427 234.756 233.026 234.905 232.653 235.154C232.467 235.262 232.28 235.403 232.094 235.511C231.908 235.62 231.674 235.709 231.41 235.699L231.666 235.907C231.813 236.341 231.659 236.484 231.648 236.747C231.507 236.56 231.206 235.856 231.078 236.164C231.206 236.268 231.384 236.358 231.49 236.576C230.842 236.287 230.211 236.394 229.576 236.6C229.243 236.686 228.908 236.805 228.591 236.908C228.257 236.994 227.908 237.063 227.562 237.066C227.204 237.332 226.801 237.514 226.399 237.663C225.965 237.811 225.515 237.909 225.066 238.007C224.152 238.185 223.256 238.315 222.465 238.697C222.717 238.591 222.92 239.704 222.647 239.512C222.12 238.667 221.9 238.806 221.726 239.031C221.536 239.237 221.36 239.527 220.904 238.965C220.474 239.394 219.937 239.224 219.427 239.188C218.934 239.136 218.455 239.166 218.108 239.994L217.998 239.462C217.825 239.241 217.826 239.62 217.692 239.681L217.681 239.532C217.291 239.385 216.937 239.998 216.698 239.774L216.773 240.37C216.556 240.444 216.61 239.919 216.414 240.29L216.377 239.976L216.204 240.579C216.099 239.503 215.577 240.588 215.349 240.1C215.094 240.305 214.594 240.829 214.156 240.664C214.029 240.115 213.5 240.16 213.147 239.915C212.513 240.088 211.58 240.316 210.746 240.135L210.784 240.829L210.568 240.87C210.558 240.721 210.544 240.638 210.564 240.556C210.381 239.774 210.059 240.801 209.865 240.315C209.971 240.946 210.025 240.42 210.14 240.441C210.324 240.778 210.149 241.447 209.916 241.092L209.922 240.927L209.759 241.3C209.731 240.755 209.593 240.502 209.566 239.957C208.867 240.094 208.336 240.997 207.588 240.737C207.695 240.131 207.039 240.864 207.246 239.817C206.769 240.194 207.277 240.675 207.05 241.392C206.936 241.371 206.776 241.645 206.775 241.266C206.851 241.005 206.701 240.636 206.821 240.526L206.505 240.596C206.492 240.513 206.547 240.366 206.583 240.302C205.933 240.87 205.541 239.552 204.957 240.123C204.892 240.5 205.167 240.247 205.102 240.623C204.496 241.342 204.686 239.898 204.122 240.387L204.275 239.865C204.08 240.204 203.962 240.661 203.733 240.207C203.758 239.581 204.017 239.723 204.176 239.449C204.013 239.41 203.497 239.505 203.59 240.086C203.335 240.257 203.308 239.712 203.2 239.527C203.177 239.674 203.38 239.962 203.205 240.219C202.923 239.846 202.43 239.793 202.055 239.696C202.077 239.549 202.087 239.318 202.122 239.254C201.727 240.063 201.93 238.702 201.479 238.833Z" fill="#FF7800"/>
                <path d="M179.126 237.673L179.269 237.794C179.308 237.663 179.33 237.516 179.452 237.373L179.126 237.673Z" fill="#FF7800"/>
                <path d="M187.087 239.763C187.121 239.731 187.14 239.682 187.175 239.618C187.125 239.632 187.107 239.681 187.087 239.763Z" fill="#FF7800"/>
                <path d="M189.226 239.096C189.058 239.189 189.148 239.39 189.174 239.556C189.213 239.425 189.251 239.295 189.226 239.096Z" fill="#FF7800"/>
                <path d="M174.162 238.399C174.214 238.352 174.234 238.27 174.239 238.138C174.202 238.236 174.166 238.3 174.162 238.399Z" fill="#FF7800"/>
                <path d="M161.668 237.4C161.701 237.401 161.752 237.386 161.82 237.323C161.773 237.272 161.721 237.319 161.668 237.4Z" fill="#FF7800"/>
                <path d="M177.314 238.732C177.364 238.717 177.432 238.687 177.486 238.574C177.403 238.587 177.35 238.667 177.314 238.732Z" fill="#FF7800"/>
                <path d="M161.975 237.182L162.17 237.256C162.171 237.223 162.173 237.19 162.191 237.141L161.975 237.182Z" fill="#FF7800"/>
                <path d="M160.726 236.304C160.807 236.324 160.906 236.328 160.969 236.396C160.877 236.227 160.796 236.208 160.726 236.304Z" fill="#FF7800"/>
                <path d="M169.263 238.402L169.28 238.386C169.471 238.147 169.368 238.242 169.263 238.402Z" fill="#FF7800"/>
                <path d="M162.875 236.165L162.891 236.182L162.964 236.02L162.875 236.165Z" fill="#FF7800"/>
                <path d="M159.93 236.022C159.98 236.007 159.997 235.991 160.017 235.91C159.985 235.876 159.952 235.874 159.921 235.84C159.918 235.906 159.915 235.972 159.93 236.022Z" fill="#FF7800"/>
                <path d="M166.628 237.118C166.553 237.346 166.515 237.476 166.51 237.607C166.56 237.593 166.629 237.497 166.628 237.118Z" fill="#FF7800"/>
              </svg>';

                $imagewithsvg_shortcode .= '</div>';

                $imagewithsvg_shortcode .= '</div>';

        }

            return $imagewithsvg_shortcode;

    }

    add_shortcode('imagewithsvg', 'get_imagewithsvg_shortcode');

  

function get_feature_panel_footer(){

    $feature_panel_desktop_image = get_field('feature_panel_desktop_image');

    $feature_panel_mobile_image = get_field('feature_panel_mobile_image');

    $feature_panel_sub_heading = get_field('feature_panel_sub_heading');

    $feature_panel_heading1 = get_field('feature_panel_heading1');
    $feature_panel_heading1_highlight = get_field('feature_panel_heading1_highlight');
    $feature_panel_heading2 = get_field('feature_panel_heading2');
    $feature_panel_heading2_highlight = get_field('feature_panel_heading2_highlight');
    $feature_panel_heading3 = get_field('feature_panel_heading3');
    $feature_panel_heading3_highlight = get_field('feature_panel_heading3_highlight');


    $feature_panel_description = get_field('feature_panel_description');

    $feature_panel_button_text = get_field('feature_panel_button_text');

    $feature_panel_button_link = get_field('feature_panel_button_link');
    $feature_panel_colour_picker = get_field('feature_panel_colour_picker');
    $feature_panel_svg_color = get_field('feature_panel_svg_color');



    ?>

    <?php if(empty($feature_panel_desktop_image)){ 

        $full_width_feature_footer = "full_width";

    }

    else{

        $full_width_feature_footer = "";

    } 
  ?>
<?php if(is_page_template( 'templates/home.php' )){ ?>
        <section class="feature-panel-section <?php echo $feature_panel_svg_color; ?>" style ="background:<?php echo $feature_panel_colour_picker; ?>">
    <?php } 
        else if(is_page_template( 'templates/contact.php' )){ ?>
            <section class="feature-panel-section <?php echo $feature_panel_svg_color; ?>" style ="background:<?php echo $feature_panel_colour_picker; ?>">
        <?php } 
    else if(is_page_template( 'templates/inaction.php' )){ ?>
        <section class="feature-panel-section <?php echo $feature_panel_svg_color; ?>" style ="background:<?php echo $feature_panel_colour_picker; ?>">
    <?php } 
   else if(is_page_template( 'templates/campaign.php' )){ ?>
        <section class="feature-panel-section violetbg orange-shape" style ="background:<?php echo $feature_panel_colour_picker; ?>">
    <?php } 
    else if(is_page_template( 'templates/about.php' )){ ?>
        <section class="feature-panel-section bluebg orange-shape" style ="background:<?php echo $feature_panel_colour_picker; ?>">
    <?php } 
        else if(is_page_template( 'templates/calendar.php' )){ ?>
            <section class="feature-panel-section bluebg <?php echo $feature_panel_svg_color; ?>" style ="background:<?php echo $feature_panel_colour_picker; ?>">
        <?php }
    else { ?>
        <section class="feature-panel-section bluebg orange-shape fluid-width" style ="background:<?php echo $feature_panel_colour_picker; ?>">
    <?php } ?>
    

              <div class="container-lg">

                <div class="feature-panel-main flex">

                  <div class="feature-panel-image">

                    <?php if(!empty($feature_panel_desktop_image)){ ?>

                    <div class="feature-panel-thumb">

                      <picture class="object-fit">

                        <source srcset="<?php echo $feature_panel_desktop_image['url']; ?>" media="(min-width: 768px)">

                        <img src="<?php echo $feature_panel_mobile_image['url']; ?>" alt="<?php echo $feature_panel_mobile_image['alt']; ?>"> </picture>

                    </div>

                    <?php } ?>

                    <div class="feature-icon shapes">

                    <?php include get_theme_file_path( '/svgs/feature-panel-footer-svg.php' ); ?>

                    </div>

                  </div>

                  <div class="feature-panel-text <?php echo $full_width_feature_footer; ?>"> 

                    <?php if(!empty($feature_panel_sub_heading)){?>

                    <span class="optional-text">

                        <?php echo $feature_panel_sub_heading; ?></span>

                    <?php } ?>
                    <h2>
                     <?php if($feature_panel_heading1_highlight == 'yes'){ ?>
                            <span>
                            <?php echo $feature_panel_heading1; ?>
                            <?php include get_theme_file_path( '/svgs/global-feature-animation-svg.php' ); ?>
                            </span>
                          <?php } else {  echo $feature_panel_heading1;  } ?>
                          <?php if($feature_panel_heading2_highlight == 'yes'){ ?>
                            <span>
                            <?php echo $feature_panel_heading2; ?>
                            <?php include get_theme_file_path( '/svgs/global-feature-animation-svg.php' ); ?>
                            </span>
                          <?php } else {  echo $feature_panel_heading2;  } ?>
                          <?php if($feature_panel_heading3_highlight == 'yes'){ ?>
                            <span>
                            <?php echo $feature_panel_heading3; ?>
                            <?php include get_theme_file_path( '/svgs/global-feature-animation-svg.php' ); ?>
                            </span>
                          <?php } else {  echo $feature_panel_heading3;  } ?>
                    </h2>

                    
                        <?php echo $feature_panel_description; ?>

                    <?php if(!empty($feature_panel_button_text) && ($feature_panel_button_link)){?>

                    <a href="<?php echo $feature_panel_button_link; ?>" class="button outline-btn white"><?php echo $feature_panel_button_text; ?></a> 

                    <?php } ?>

                 </div>



                </div>

              </div>

            </section>

<?php }	

function get_annual_report(){
    $annual_report_desktop_image = get_field('annual_report_desktop_image');
$annual_report_mobile_image = get_field('annual_report_mobile_image');
$annual_report_sub_heading = get_field('annual_report_sub_heading');
$annual_report_heading = get_field('annual_report_heading');
$annual_report_button_text = get_field('annual_report_button_text');
$annual_report_button_link = get_field('annual_report_button_link');
$annual_report_download_link_text = get_field('annual_report_download_link_text');
$annual_report_upload_file = get_field('annual_report_upload_file');
$annual_report_background_colour = get_field('annual_report_background_colour');
if(empty($annual_report_desktop_image)){ 
    $full_width_annual = "full_width";  
      
    }
    else{
      $full_width_annual = ""; 
    }
?>
<?php if(!empty($annual_report_sub_heading) || ($annual_report_heading) || ($annual_report_button_text) || ($annual_report_button_link) || ($annual_report_download_link_text) || ($annual_report_upload_file) ||($annual_report_desktop_image) || ($annual_report_mobile_image)){ ?>
    <section class="annual-report-module">
      <div class="container">
        <div class="annual-report-main flex" style ="background:<?php echo $annual_report_background_colour; ?>">
          <div class="annual-report-text <?php echo $full_width_annual; ?>">
            <div class="annual-txt"> 
              <?php if(!empty($annual_report_sub_heading)){ ?>
                <span class="optional-text"><?php echo $annual_report_sub_heading; ?></span>
              <?php } ?>
              <?php if(!empty($annual_report_heading)){ ?>
               <h3><?php echo $annual_report_heading; ?></h3>
              <?php } ?>
              
              <div class="annual-btns flex">
                <?php if(!empty($annual_report_button_text) && ($annual_report_button_link)){ ?>
                    <a href="<?php echo $annual_report_button_link; ?>" class="button outline-btn white"><?php echo $annual_report_button_text; ?></a> 
                <?php } ?>
                <?php if(!empty($annual_report_download_link_text) && ($annual_report_upload_file)){ ?>
                    <a href="<?php echo $annual_report_upload_file['url']; ?>" class="readmore more"><?php echo $annual_report_download_link_text; ?></a> 
                <?php } ?>
             </div>
            </div>
          </div>
          <?php if(!empty($annual_report_desktop_image)){ ?>
          <div class="annual-report-image">
            <div class="annual-report-thumb">
              <picture class="object-fit">
                <source srcset="<?php echo $annual_report_desktop_image['url']; ?>" media="(min-width: 768px)">
                <img src="<?php echo $annual_report_mobile_image['url']; ?>" alt="<?php echo $annual_report_mobile_image['alt']; ?>"/> </picture>
            </div>
            <div class="annual-report-icon">
            <?php include get_theme_file_path( '/svgs/annual-report-svg.php' ); ?>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
</section>
    
   



<?php }
}


function get_donation(){
    $donation_helps_icon = get_field('donation_helps_icon');
    $donation_helps_heading1 = get_field('donation_helps_heading1');
    $donation_helps_heading1_highlight = get_field('donation_helps_heading1_highlight');
    $donation_helps_heading2 = get_field('donation_helps_heading2');
    $donation_helps_heading2_highlight = get_field('donation_helps_heading2_highlight');
    $donation_helps_heading3 = get_field('donation_helps_heading3');
    $donation_helps_heading3_highlight = get_field('donation_helps_heading3_highlight');

    $donation_helps_description = get_field('donation_helps_description');
    $donation_helps_button_text = get_field('donation_helps_button_text');
    $donation_helps_button_link = get_field('donation_helps_button_link');
    $donation_background_color = get_field('donation_background_color');
    ?>
<?php if(empty($donation_helps_icon)){ 
$full_width_donation = "full_width";

}
else{
    $full_width_donation = "";
}?>
<?php if(!empty($donation_helps_heading1 || $donation_helps_heading2 || $donation_helps_heading3 || $donation_helps_description || $donation_helps_button_text )){ ?>
<section class="donation-section text-violetblue pos-relative" style ="background:<?php echo $donation_background_color; ?>">
  <div class="container-lg">
    <div class="donation-main flex flex-vcenter">
    <?php if(!empty($donation_helps_heading1 || $donation_helps_heading2 || $donation_helps_heading3)){ ?> 
      <div class="donation-text <?php echo $full_width_donation; ?>">
        <h2>
        <?php if($donation_helps_heading1_highlight == 'yes'){ ?>
         <span> <?php echo $donation_helps_heading1; ?>
		 <?php include get_theme_file_path( '/svgs/home-donation-svg.php' ); ?>
         </span>
        <?php } else {  echo $donation_helps_heading1;  } ?>
        <?php if($donation_helps_heading2_highlight == 'yes'){ ?>
         <span> <?php echo $donation_helps_heading2; ?>
		 <?php include get_theme_file_path( '/svgs/home-donation-svg.php' ); ?>
         </span>
        <?php } else {  echo $donation_helps_heading2;  } ?>
        <?php if($donation_helps_heading3_highlight == 'yes'){ ?>
         <span> <?php echo $donation_helps_heading3; ?>
		 <?php include get_theme_file_path( '/svgs/home-donation-svg.php' ); ?>
         </span>
        <?php } else {  echo $donation_helps_heading3;  } ?>

        
        </h2>
         <?php echo $donation_helps_description; ?>
        <?php if(!empty($donation_helps_button_link && $donation_helps_button_text)){ ?>
        <a href="<?php echo $donation_helps_button_link; ?>" class="button outline-btn white"><?php echo $donation_helps_button_text; ?></a>
        <?php } ?>
      </div>
      <?php } ?>
      <?php if(!empty($donation_helps_icon)){ ?>
      <div class="donation-image flex pos-relative">
        <figure class="donation-thumb">
          <img src="<?php echo $donation_helps_icon['url']; ?>" alt="<?php echo $donation_helps_icon['alt']; ?>">
        </figure>
        <div class="circles">
          <div class="circle text-violetblue"></div>
          <div class="circle red"></div>
          <div class="circle orange"></div>
          <div class="circle green"></div>
          <div class="circle pink"></div>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</section>
<?php }
}
    
function get_statistics(){

 
if (have_rows('statistics')) { ?>
<section class="number-section">
      <div class="container">
        <div class="number-main flex " data-counter-main="counter-main">

        <?php $c==0; while (have_rows('statistics')) { the_row();
                $statistic_number = get_sub_field('statistic_number');
                $statistic_number_symbol = get_sub_field('statistic_number_symbol');
                $statistic_heading = get_sub_field('statistic_heading');
                $statistic_description = get_sub_field('statistic_description');
                $statistic_link_text = get_sub_field('statistic_link_text');
                $statistic_link = get_sub_field('statistic_link');
                if($c== 0 || $c== 3 || $c== 6 ){
                    $light_class = "light-pink";
                    }
                    else if($c== 1 || $c== 4 || $c== 7){
                        $light_class = "light-orange";
                     } 
                     elseif($c==2 || $c== 5 || $c== 8){
                        $light_class = "light-violet";
                     } 
                     else{
                        $light_class= "";
                     }

          ?>
          <?php if(!empty($statistic_number || $statistic_heading || $statistic_description || $statistic_link_text )){ ?>
          <div class="number-list <?php echo $light_class; ?> flex flex-center">
            <div class="number-list-inner">
                <?php if(!empty($statistic_number )){ ?>
                    <span class="number"><span class="counter" data-duration="2500" data-count-to="<?php echo $statistic_number ; ?>"><?php echo $statistic_number ; ?></span><?php echo $statistic_number_symbol; ?></span>
                <?php } ?>
                <?php if(!empty($statistic_heading)){ ?>
                    <span class="number-title"><?php echo $statistic_heading; ?></span>
                <?php } ?>
                <?php echo $statistic_description; ?>
              <?php if(!empty($statistic_link_text && $statistic_link)){ ?>
              <a href="<?php echo $statistic_link; ?>" class="number-btn"><?php echo $statistic_link_text; ?>
                <span><?php include get_theme_file_path( '/svgs/home-statistics-number-button-svg.php'); ?>
                         
                </span>
              </a>
              <?php } ?>
            </div>
          </div>
          <?php $c++; } } wp_reset_postdata(); ?>
         
    
        </div>
      </div>
</section>
<?php } ?>
<?php }

function shortcode_content_image( $atts = array() ) {

    $news_content_image = get_field('news_content_image');

        if(!empty($news_content_image)){
            $image_short_code = '<div class="default-thumb pos-relative">';
                $image_short_code .= '<div class="lc-shape-1 shapes pos-absolute">';
                    $image_short_code .= '<svg xmlns="http://www.w3.org/2000/svg" width="158" height="209" viewBox="0 0 158 209" fill="none">

                    <path d="M73.7453 164.353C73.6917 164.299 73.6112 164.272 73.5039 164.191C73.5844 164.272 73.6648 164.326 73.7453 164.353Z" fill="#FF7800"/>

                    <path d="M69.7753 167.447L69.668 167.34C69.668 167.367 69.7216 167.394 69.7753 167.447Z" fill="#FF7800"/>

                    <path d="M75.8105 162.334C75.8374 162.361 75.8374 162.361 75.8642 162.361C75.891 162.334 75.9447 162.28 75.9983 162.227L75.8105 162.334Z" fill="#FF7800"/>

                    <path d="M62.9095 174.902L62.9364 174.849C62.9095 174.876 62.8827 174.876 62.9095 174.902Z" fill="#FF7800"/>

                    <path d="M67.1465 170.569C67.2538 170.65 67.2806 170.704 67.2806 170.731C67.3074 170.731 67.3074 170.704 67.1465 170.569Z" fill="#FF7800"/>

                    <path d="M82.1948 164.164L81.7656 164.03C81.9266 164.111 82.1143 164.191 82.1948 164.164Z" fill="#FF7800"/>

                    <path d="M82.0082 160.774C81.9814 160.774 81.9546 160.747 81.9277 160.747C81.9546 160.747 81.9814 160.747 82.0082 160.774Z" fill="#FF7800"/>

                    <path d="M79.9414 160.935C79.9682 160.962 80.0219 161.043 80.0755 161.097C80.0755 161.07 80.1023 161.016 79.9414 160.935Z" fill="#FF7800"/>

                    <path d="M80.1566 161.177C80.1298 161.15 80.103 161.123 80.0762 161.096C80.0762 161.123 80.0762 161.15 80.1566 161.177Z" fill="#FF7800"/>

                    <path d="M45.5279 206.39C45.4743 206.443 45.6888 206.686 45.8766 206.901L45.5279 206.39Z" fill="#FF7800"/>

                    <path d="M58.0814 182.438L57.9473 182.33C57.9741 182.384 58.0277 182.411 58.0814 182.438Z" fill="#FF7800"/>

                    <path d="M82.4629 166.075C82.7848 166.344 82.2751 166.264 82.6238 166.452C82.597 166.344 82.9457 166.371 82.4629 166.075Z" fill="#FF7800"/>

                    <path d="M48.5849 208.623H48.719C48.6654 208.596 48.5849 208.543 48.5312 208.516C48.5849 208.569 48.6117 208.596 48.5849 208.623Z" fill="#FF7800"/>

                    <path d="M53.0107 190.242C52.9839 190.215 52.9839 190.215 52.957 190.188L53.0107 190.242Z" fill="#FF7800"/>

                    <path d="M52.1519 190.296C52.125 190.242 52.125 190.189 52.0982 190.135C52.0446 190.162 52.0714 190.215 52.1519 190.296Z" fill="#FF7800"/>

                    <path d="M45.9023 206.901L46.1169 207.197C46.0901 207.116 45.9828 207.009 45.9023 206.901Z" fill="#FF7800"/>

                    <path d="M49.8452 195.113C49.8452 195.087 49.8452 195.06 49.8184 195.033C49.7916 195.06 49.7916 195.087 49.8452 195.113Z" fill="#FF7800"/>

                    <path d="M67.5503 170.381C67.604 170.381 67.6308 170.381 67.6576 170.381C67.5503 170.327 67.4967 170.3 67.5503 170.381Z" fill="#FF7800"/>

                    <path d="M75.087 178.912C74.9797 178.912 75.1943 179.154 75.4357 179.343C75.4625 179.289 75.4357 179.208 75.087 178.912Z" fill="#FF7800"/>

                    <path d="M77.4749 177.297C77.3944 177.271 77.3408 177.244 77.2871 177.244C77.3408 177.271 77.4212 177.297 77.4749 177.297Z" fill="#FF7800"/>

                    <path d="M75.0614 181.954C75.0614 181.926 75.0342 181.926 75.0614 181.954C75.0342 181.926 75.0342 181.926 75.0614 181.954Z" fill="#FF7800"/>

                    <path d="M73.8801 190.054C74.0678 189.273 73.8264 187.982 74.4165 187.47C73.7459 186.878 73.8532 186.663 73.7996 186.34L74.8189 186.932L74.6043 186.555C74.953 186.663 74.7116 186.798 75.1676 186.905L74.5775 186.475C74.953 186.69 75.0871 186.179 75.6236 186.905L76.026 186.232C76.1333 186.098 75.2481 185.64 75.5968 185.64C75.9187 185.775 75.7577 185.829 76.1333 186.017C77.1794 185.963 74.5238 184.295 75.2481 184.106L75.3554 184.214C75.1408 183.972 75.2481 183.837 75.114 183.756C74.0678 183.218 75.6236 184.16 74.9262 183.945C74.0947 183.434 74.5775 183.487 73.9337 183.111C74.3093 183.191 73.8532 182.841 73.8532 182.707C74.4702 182.868 74.2288 182.411 74.9798 182.68C74.7653 182.438 73.9874 181.846 74.041 181.657C74.7653 181.926 74.658 182.061 75.0067 182.061L74.5238 181.738C74.6848 181.657 74.7921 181.765 75.0335 181.9C75.1408 181.765 74.4165 181.388 74.8457 181.388L75.2749 181.765C75.1676 181.523 75.2749 181.523 75.4359 181.361C75.7041 181.523 75.6504 181.603 75.5431 181.603C76.3479 181.926 75.3286 181.254 75.4359 181.227C75.2213 181.119 75.0335 181.173 74.5775 180.823C74.7116 180.796 74.0142 180.231 74.658 180.5L75.0871 180.877C74.8189 180.446 74.5238 180.419 74.8457 180.312C74.8726 180.339 75.0067 180.419 75.114 180.473C74.5507 179.962 75.2481 180.123 75.409 179.935L75.5163 180.043C75.409 179.854 74.9799 179.558 75.0335 179.531C74.6848 179.477 74.5507 179.37 74.0678 179.101C74.9798 179.424 73.2631 178.293 73.8801 178.347C74.1483 178.509 74.4702 178.778 74.1215 178.67C74.8994 179.262 75.6236 179.693 75.9187 180.07C75.7846 179.854 75.7309 179.666 76.0796 179.908L75.3286 179.424C75.3554 179.343 75.409 179.343 75.4359 179.289C74.953 178.966 74.5507 178.939 74.3093 178.589C74.1483 178.293 75.1676 178.993 74.8189 178.751C74.6311 178.347 74.041 178.159 74.4165 178.132C74.4702 178.186 74.5775 178.32 74.497 178.293C74.8994 178.347 74.5775 177.863 75.5163 178.374C75.7041 178.509 75.9992 178.697 75.8919 178.697L75.7577 178.616C76.3479 179.181 75.6504 178.374 76.4552 178.912C75.9455 178.616 76.1869 178.482 76.321 178.455L75.7309 178.132C74.202 176.813 76.8575 178.832 76.8039 178.401C76.5356 177.97 76.5893 178.374 76.2674 178.024C76.4552 177.943 76.9916 178.213 76.8575 177.863C77.1258 177.943 77.4745 178.024 78.1451 178.401C77.9573 178.132 78.6279 178.213 78.0378 177.782C77.394 177.647 78.6011 178.374 77.6354 178.105L77.0453 177.674C77.1794 177.54 76.9648 177.136 77.2599 177.163C77.1258 177.109 76.9648 177.028 76.8307 176.948C76.7234 176.571 76.1333 176.14 76.4552 176.033C77.0453 176.329 76.8843 176.409 76.8575 176.544C77.394 176.679 76.9916 176.409 77.2867 176.302C77.7964 176.598 77.1794 176.436 77.6354 176.759L77.6086 176.409C77.6354 176.436 77.6622 176.436 77.7159 176.463C76.8843 175.925 77.9036 176.329 77.7427 176.033C77.9573 175.683 76.8575 174.956 76.2942 174.391C76.5625 174.472 76.777 174.579 76.9648 174.741C76.5356 174.606 76.8307 174.768 77.0453 174.929C77.0185 174.768 78.0378 175.145 78.3328 175.414C78.1987 175.091 77.85 175.225 77.6622 174.956L77.8768 174.741C77.4208 174.526 77.2867 174.553 77.0185 174.23C76.9648 174.041 77.0721 174.041 77.2062 173.907C77.394 174.041 77.8768 174.23 77.7964 174.337C78.0109 174.364 78.0914 174.256 77.6891 173.987C77.2062 173.907 77.4745 173.503 76.7234 173.234L77.2062 173.288C77.1794 173.315 77.4476 173.503 77.3403 173.503C78.0109 173.826 77.233 173.261 77.2062 173.18C77.3672 173.207 77.5013 173.072 77.7695 173.207C77.6086 173.045 77.8232 173.019 78.1719 173.18C78.0914 173.019 77.7427 172.938 77.5549 172.776L77.7695 172.561C78.1451 172.749 79.1644 173.315 79.2717 173.449C79.0034 173.153 78.2255 172.803 78.3328 172.669C78.9766 173.153 78.9766 172.776 79.7545 173.395C80.3178 173.611 80.4519 173.341 80.3446 173.126C79.835 172.722 79.9423 173.099 79.379 172.749C79.379 172.265 77.8232 171.323 78.2524 171.215L78.0378 171.188C77.8232 170.839 77.8768 170.892 77.4476 170.516C78.1182 170.973 79.4594 171.431 79.4863 171.054C79.1375 170.812 78.7084 170.812 78.1719 170.462V170.22C78.2255 170.247 78.3328 170.327 78.4133 170.408C78.2524 170.085 79.5131 170.623 78.7084 170.112L79.835 170.543L79.3521 170.354C79.0034 170.139 79.0303 169.87 78.8961 169.762C78.6279 169.358 78.9498 169.439 79.4863 169.601C79.1644 169.466 78.4669 169.17 78.4401 168.955C79.5935 169.628 79.0571 168.874 79.6472 169.224C79.674 169.143 80.0764 169.251 79.6204 168.982L80.3446 169.412C79.3521 168.82 79.5131 168.632 79.4326 168.363C80.7738 169.17 79.4326 168.12 80.7202 168.739C79.8081 168.174 80.5324 168.228 79.7545 167.744C79.7813 167.582 80.6397 168.094 80.9616 168.228L80.6397 167.959C81.1225 168.147 81.3103 167.932 81.7126 167.959L80.9616 167.367L81.3639 167.528C81.1762 167.394 81.1225 167.205 80.7738 167.098L80.8543 167.044C79.9691 166.533 80.6665 166.802 80.3714 166.425C80.5324 166.479 80.747 166.613 80.8543 166.694C80.9079 166.613 81.3371 166.909 81.659 167.044C81.3907 166.963 80.2105 165.887 79.7008 165.86C79.3253 165.671 79.1375 165.402 79.3253 165.429L80.1568 165.833L79.3521 165.268C79.2985 165.079 79.835 165.322 79.9959 165.295C79.9959 165.429 81.4176 166.371 81.5517 166.129C81.5785 166.317 82.0077 166.64 82.115 166.802C82.1686 166.775 82.2759 166.775 82.571 167.071C82.4369 166.748 82.115 166.721 82.115 166.479C82.8392 166.883 83.0807 166.963 83.4294 166.936L82.8392 166.775C82.7588 166.721 82.7051 166.667 82.6515 166.64C82.5442 166.64 82.4369 166.587 82.1418 166.452C82.1686 166.425 81.3639 165.725 81.8199 165.941C80.586 165.51 81.1493 165.133 80.3983 164.864C80.2105 164.73 80.2373 164.568 80.6129 164.756C81.0689 165.214 81.498 165.106 81.9809 165.402C81.7931 165.241 81.3639 165.241 81.1493 164.999C81.1493 164.864 81.6322 165.053 81.9004 165.133L82.0077 165.241L82.4101 165.268C82.0613 165.053 81.7126 165.079 81.6053 164.837C81.7663 164.891 81.659 164.649 81.9541 164.81C82.4101 165.16 83.1075 165.456 83.1611 165.645C83.1611 165.51 83.2416 165.16 82.5174 164.918L82.5978 164.81C82.2491 164.703 81.6053 164.622 81.6322 164.326L81.7663 164.407L81.3103 163.949L81.7126 164.084C81.5249 163.976 81.3639 163.868 81.4176 163.815C81.6322 163.922 81.7663 163.922 82.0345 164.084C82.0882 163.895 81.7126 163.707 81.5249 163.572C81.5249 163.438 81.6858 163.492 82.0882 163.788C82.2491 163.707 82.3028 163.438 82.7319 163.545C82.4905 163.196 82.571 163.492 82.115 163.115C83.4562 163.653 82.9197 162.792 82.9197 162.415C81.7663 161.904 82.8392 162.254 81.8468 161.662C82.1686 161.904 82.8661 161.85 83.027 162.281L83.0002 162.065C83.6708 162.281 83.3221 162.577 84.2341 162.846C84.2877 162.657 83.1343 161.877 83.6708 161.904C84.4218 162.388 83.483 161.608 84.3414 162.119C84.6096 162.307 84.4755 162.334 84.5023 162.415L84.6633 162.469C84.8779 162.334 84.6633 162.173 84.3414 162.011C84.0195 161.823 83.5903 161.635 83.3757 161.366C83.4294 161.043 84.1268 161.446 84.5023 161.635C84.6901 161.662 84.6364 161.446 84.4755 161.258C84.8778 161.688 83.8049 161.339 83.3489 161.016C84.3146 161.339 83.644 160.612 83.2952 160.397C82.7051 160.37 82.6783 160.424 82.6246 160.477C82.571 160.531 82.5173 160.585 81.9004 160.504C82.1686 160.693 82.9734 161.123 82.5442 161.15C82.1955 160.827 82.0882 160.935 81.9541 160.881C82.4369 161.096 82.0882 161.123 82.2491 161.258C81.8468 161.123 81.2298 160.585 80.9347 160.666L82.0077 161.285C81.7931 161.285 81.2298 160.827 81.3907 161.123C80.8543 160.747 80.5056 160.693 80.4251 160.37C79.3521 160.128 80.7202 161.016 81.0152 161.419C80.9616 161.366 80.8274 161.285 80.747 161.231C81.0152 161.419 80.9616 161.5 80.9884 161.581C80.6665 161.581 80.5592 161.204 80.2373 161.096L80.1568 161.312C80.13 161.285 80.1032 161.285 80.0764 161.285C80.1837 161.419 80.2642 161.527 79.9959 161.392C79.674 161.15 79.3253 160.908 79.0839 160.72L79.7277 161.339C79.379 161.123 79.0034 161.177 78.8425 160.881L78.8157 161.285L78.0646 160.908C78.1451 161.043 78.306 161.123 78.4401 161.096C78.2255 161.123 79.4594 162.281 78.0378 161.419C78.4938 162.011 78.1987 161.958 78.4133 162.469C77.8768 161.877 77.4208 162.254 77.233 161.85C76.8307 161.823 77.6086 162.281 77.6622 162.469C77.2867 162.415 76.6161 161.958 76.4015 161.688L76.6697 162.011L76.5356 161.931L76.8843 162.281C76.4283 162.2 76.1333 161.904 75.9723 161.985L76.5893 162.361L76.1601 162.227C76.482 162.361 76.5625 162.496 76.5625 162.63L76.4283 162.55L76.482 162.738C76.1601 162.415 76.2942 162.765 75.865 162.442C75.7846 162.523 75.7846 162.523 75.8114 162.765L76.2674 162.98C76.5088 163.411 75.5968 162.63 75.4627 162.792L75.9723 163.061C74.9799 162.846 76.1869 163.788 75.5431 163.68C75.4895 163.492 74.8726 163.196 75.0335 163.276C75.114 163.545 74.8189 163.734 75.3554 164.272C74.5775 163.922 74.3629 163.815 73.9337 163.815C73.9069 163.976 73.9605 164.03 74.3629 164.299C74.0142 164.272 74.2824 164.73 73.7459 164.434C74.1483 164.703 73.585 164.487 73.9069 164.783L73.6923 164.676L74.202 164.945C72.9412 164.514 74.6311 165.671 73.5045 165.349L73.3972 165.241L73.5314 165.456C73.2899 165.349 73.1826 165.241 72.9144 165.053L72.5657 165.429L72.9949 165.564C72.9949 165.698 73.4509 166.021 73.0754 165.968C72.4316 165.349 72.9681 166.102 72.3511 165.779L72.217 165.564C72.1902 165.725 72.1902 165.725 72.6998 165.994C72.7803 166.264 71.6805 165.564 72.1365 166.021L72.217 165.914C72.5389 166.048 72.8876 166.371 72.8339 166.425C72.7535 166.398 72.4852 166.317 72.4584 166.237C72.5657 166.479 72.1902 166.533 72.3779 166.694C72.1902 166.667 71.8415 166.452 71.7342 166.317C72.0024 166.856 71.5732 166.398 71.8415 166.909L71.5464 166.748L71.8415 167.044L71.144 166.829L71.5464 166.99C71.5464 167.125 71.7073 167.286 71.4927 167.286L71.0904 166.99C71.1709 167.394 70.2052 166.883 70.6612 167.475C70.5807 167.448 70.4734 167.34 70.393 167.259C70.9294 167.878 69.5346 166.99 70.2052 167.69C70.0711 167.582 69.8833 167.528 69.776 167.448L69.9906 167.717L69.4273 167.367L70.232 167.932L69.6151 167.663L69.8565 167.851C68.7031 167.34 69.4273 167.959 68.5153 167.636L69.2664 168.04C70.5271 169.305 67.9252 168.443 68.3275 169.305L67.7642 168.955L68.3275 169.547C67.8179 169.385 67.8715 169.197 67.5765 169.062C67.7642 169.439 68.3812 169.628 68.3812 169.977C67.9252 169.87 67.9788 169.681 67.8179 169.52C67.9788 169.897 68.0861 170.435 67.6838 170.381C67.7642 170.435 67.8447 170.489 67.8984 170.516C68.0593 170.812 67.6838 170.866 67.6301 171.054C67.3619 170.892 67.3619 170.839 67.335 170.758C67.2546 170.785 67.04 170.758 67.2814 170.973L66.8254 170.623C66.6645 170.704 66.9595 171.188 66.3694 170.892C66.6108 171 67.0132 171.269 66.9327 171.35C66.0207 170.892 67.1205 171.861 66.5572 171.754C66.3694 171.619 66.3962 171.458 66.3694 171.485C66.1012 171.431 66.4499 171.754 66.6645 171.996L66.3157 171.754L66.5572 172.453C65.6451 171.996 66.4499 172.911 65.8329 172.507C65.7256 172.642 66.2889 172.615 66.2889 172.857C65.8866 172.696 66.3694 173.126 65.8061 172.776L65.7524 172.722L65.7256 172.884L65.216 172.48C65.2696 172.669 65.7793 173.072 66.2084 173.341C65.8329 173.261 65.9939 173.557 65.4574 173.315L65.3501 173.207C65.4037 173.637 63.5261 172.776 64.3308 173.584C64.2503 173.557 64.1162 173.476 64.143 173.449L64.0089 173.611L63.6065 173.315L64.0625 173.987L63.7943 173.826C63.5529 173.96 63.5261 174.364 63.4456 174.66L63.3383 174.553C63.6065 175.091 62.9091 174.66 63.0969 175.037C63.0164 174.983 62.9896 174.956 62.9896 174.956L62.8823 175.145L62.6409 174.929C63.1774 175.441 61.6216 174.849 62.1849 175.064C62.3995 175.306 62.6677 175.629 62.9896 175.871C62.9091 176.087 62.5872 175.71 62.2922 175.683C62.1849 175.817 62.6409 176.14 62.2653 176.167L61.9971 176.006C61.9971 176.14 62.158 176.302 62.1312 176.463L62.0239 176.356C62.5068 176.921 61.0314 176.113 62.1849 177.028C61.8898 176.975 61.9703 177.244 61.407 176.894C61.6216 177.378 61.6752 177.674 61.7289 178.078C60.7632 177.567 61.7557 178.159 61.1387 177.997L61.6484 178.293C61.4875 178.697 60.0121 178.374 59.9853 178.885L59.4757 178.589L59.9853 178.993C59.5025 179.289 58.966 179.72 58.7514 180.043C58.9392 180.312 59.4488 180.85 59.1538 180.931L59.1001 180.877C59.2074 181.361 59.2074 181.819 58.7246 181.98C58.5368 181.819 58.3491 181.765 58.2418 181.657C58.7514 182.061 58.1613 181.873 58.0808 181.926L58.51 182.061C58.9124 182.438 58.3759 182.303 58.0003 182.142L58.4295 182.626C58.3759 182.599 58.2954 182.572 58.2149 182.519L58.4564 182.707L57.7589 182.384C57.8662 182.492 57.9199 182.815 58.51 183.245C58.2954 183.138 58.0272 183.164 57.9735 182.976L57.4371 183.407L57.7321 183.46C58.2418 183.756 58.4564 184.106 58.1613 184.053C57.8394 183.703 57.4639 183.622 57.0615 183.434C57.2761 183.676 57.5443 183.649 57.7858 183.837C58.054 184.133 58.1076 184.429 57.8662 184.349L57.7053 184.16C57.8126 184.402 56.9006 183.918 56.8737 184.079C57.1956 184.429 56.7933 184.295 57.6516 184.806C57.7321 185.075 57.0347 184.51 56.9274 184.51C57.2761 184.833 56.8737 184.914 56.4446 184.671C57.6248 185.533 55.7203 184.833 56.7396 185.506L56.069 185.264C56.3373 185.452 56.9542 185.856 57.0079 186.044C56.6323 185.963 56.1763 185.64 55.8544 185.479L56.8469 186.205C55.3716 186.098 55.613 187.336 54.2987 187.417C54.3255 187.847 54.5937 188.52 54.245 188.762L54.1377 188.628L53.6549 188.789L54.2718 188.843C54.3523 189.004 54.5132 189.166 54.4596 189.247C53.789 189.327 52.9575 189.489 53.1989 190.269C54.2182 191.319 52.0186 189.785 52.7161 190.619C52.6088 190.538 52.4478 190.404 52.3673 190.323C52.5819 190.888 52.6624 191.157 53.1721 191.911C52.0186 191.13 53.0648 192.126 52.4746 191.696L52.9306 192.019C52.5819 191.911 52.3942 191.992 52.0723 191.749L52.5819 192.261L52.0723 191.965C51.9113 192.126 52.0723 192.745 51.0261 192.207C51.4822 193.122 50.8116 193.66 50.2751 194.091C50.6238 194.414 50.5701 194.602 50.5165 194.764L49.8459 194.521C49.9532 194.764 50.597 195.383 50.141 195.248C50.0605 195.194 50.0337 195.167 50.0068 195.14C50.0337 195.356 49.6581 195.275 50.1141 195.732C49.98 195.84 49.6045 195.786 49.068 195.383C50.0337 196.028 48.7461 195.598 48.7461 195.598C48.7461 195.598 48.3169 195.948 47.7268 196.567C47.1367 197.159 46.3856 198.02 45.7418 199.043C45.42 199.554 45.1517 200.119 44.9371 200.684C44.7225 201.249 44.5616 201.868 44.508 202.487C44.4007 203.752 44.7225 205.071 45.715 206.39C46.1442 206.766 46.332 207.143 46.9489 207.466C47.0294 207.708 46.171 207.197 46.627 207.547C47.0562 207.601 47.8073 208.435 48.5047 208.677L48.5584 208.866C48.8802 209.108 48.2901 208.462 48.8534 208.892L47.9951 208.247C48.1828 208.247 48.3974 208.327 48.7193 208.516C48.4242 208.193 47.2708 207.332 47.9146 207.493L47.9414 207.574C48.0219 207.385 48.5852 207.87 48.7461 207.924L48.7193 207.951L49.2558 208.112C48.8802 208.004 49.4972 208.677 49.4972 208.543C49.8727 208.516 49.2558 208.435 49.229 208.22C49.2558 208.112 49.685 208.435 49.9532 208.65L50.0337 208.462C50.436 208.758 49.9264 208.543 50.4092 208.785L50.1141 208.273C51.1871 208.946 49.7654 207.708 50.8116 208.3C50.9457 208.623 51.1603 208.516 51.4822 208.785L51.6699 208.381C51.8309 208.435 51.9382 208.704 51.9113 208.596C52.2332 208.731 51.7236 208.327 51.7772 208.273C52.0723 208.435 51.9382 208.004 52.6356 208.489C53.2525 208.57 51.8309 207.789 52.3673 207.843C52.7965 208.085 52.3405 208.085 52.8502 208.273V207.924C53.0379 208.085 53.4939 208.435 53.3598 208.462C54.3255 208.22 56.7665 209.35 56.6055 208.381C57.1688 208.623 56.9006 208.677 57.1956 208.946C56.8201 208.085 58.6709 209.081 58.8587 208.677L58.4564 208.408C60.0658 208.758 59.7171 207.654 60.6291 207.439L60.3072 207.305C59.9585 206.955 60.0121 206.82 59.878 206.578C60.0926 206.713 60.7096 207.224 60.6559 206.955C60.495 206.901 60.2804 206.847 60.0926 206.713C61.4875 206.928 61.9166 205.717 62.9628 205.259C63.3383 203.968 64.9209 203.295 65.3769 202.057C65.2964 202.245 64.3308 201.519 64.6258 201.545C66.584 202.326 64.7063 200.765 66.128 201.196C65.967 200.2 67.8447 200.603 66.879 199.177L67.3887 199.473C67.6569 199.527 67.3351 199.285 67.3619 199.177L67.496 199.258C67.8179 199.15 67.496 198.585 67.7911 198.612L67.2278 198.262C67.2546 198.101 67.7106 198.477 67.4692 198.128L67.7374 198.316L67.3082 197.832C68.2739 198.451 67.6301 197.509 68.1129 197.697C68.0325 197.428 67.8179 196.836 68.1666 196.701C68.7031 196.97 68.8908 196.647 69.2664 196.62C69.3737 196.163 69.5614 195.49 70.0443 195.113L69.4005 194.737L69.4273 194.575C69.5614 194.656 69.6419 194.683 69.6955 194.764C70.4734 195.113 69.6687 194.333 70.1784 194.494C69.5614 194.198 70.0443 194.521 69.9638 194.602C69.5882 194.521 69.0518 194.037 69.4541 194.091L69.5883 194.171L69.32 193.875C69.8297 194.171 70.0979 194.225 70.6076 194.521C70.7417 194.037 70.0711 193.203 70.5807 192.907C71.1172 193.283 70.6344 192.503 71.5464 193.176C71.3318 192.691 70.7417 192.745 70.1247 192.207C70.1784 192.153 69.9638 191.911 70.3393 192.099C70.5539 192.288 70.9563 192.395 71.0099 192.53L71.0367 192.315C71.1172 192.341 71.2245 192.476 71.2782 192.53C70.9294 191.83 72.2975 192.288 71.9219 191.615C71.6 191.373 71.7342 191.669 71.4123 191.453C70.9026 190.7 72.217 191.561 71.8951 190.942L72.3511 191.292C72.0829 190.996 71.6805 190.7 72.1633 190.781C72.7535 191.104 72.5389 191.211 72.7535 191.453C72.8339 191.346 72.8608 190.996 72.2975 190.754C72.1902 190.511 72.7266 190.781 72.9144 190.807C72.7803 190.727 72.4584 190.7 72.2438 190.458C72.673 190.485 72.8339 190.188 73.0217 190C73.1558 190.081 73.3704 190.215 73.4509 190.269C72.6193 189.596 73.8801 190.377 73.8801 190.054Z" fill="#FF7800"/>

                    <path d="M77.9564 176.517L77.8223 176.544C77.9564 176.625 78.0905 176.705 78.1978 176.84L77.9564 176.517Z" fill="#FF7800"/>

                    <path d="M75.0879 180.554C75.1147 180.581 75.1684 180.634 75.222 180.688C75.222 180.634 75.1684 180.581 75.0879 180.554Z" fill="#FF7800"/>

                    <path d="M75.4897 182.168C75.4093 182.034 75.2215 182.007 75.0605 181.953C75.1678 182.007 75.302 182.088 75.4897 182.168Z" fill="#FF7800"/>

                    <path d="M77.8223 173.234C77.8759 173.288 77.9296 173.342 78.0637 173.395C77.9564 173.315 77.8759 173.288 77.8223 173.234Z" fill="#FF7800"/>

                    <path d="M80.9082 166.667C80.9082 166.694 80.9082 166.721 80.935 166.802C81.0155 166.775 80.9619 166.721 80.9082 166.667Z" fill="#FF7800"/>

                    <path d="M77.0996 174.983C77.0996 175.01 77.1264 175.064 77.2337 175.171C77.2337 175.091 77.1801 175.037 77.0996 174.983Z" fill="#FF7800"/>

                    <path d="M81.0428 166.937L80.9355 166.99C80.9624 167.017 80.9892 167.017 81.0428 167.044V166.937Z" fill="#FF7800"/>

                    <path d="M82.1693 166.721C82.1425 166.748 82.1156 166.802 82.0352 166.802C82.2229 166.856 82.2497 166.802 82.1693 166.721Z" fill="#FF7800"/>

                    <path d="M78.4941 170.381C78.6819 170.597 78.6283 170.516 78.4941 170.381Z" fill="#FF7800"/>

                    <path d="M81.7925 167.905H81.7656L81.8997 168.013L81.7925 167.905Z" fill="#FF7800"/>

                    <path d="M82.625 166.452C82.625 166.479 82.6518 166.506 82.7055 166.56C82.7323 166.56 82.7591 166.56 82.8128 166.533C82.7323 166.506 82.6786 166.479 82.625 166.452Z" fill="#FF7800"/>

                    <path d="M80.1572 169.493C79.9694 169.331 79.8085 169.251 79.7012 169.197C79.7012 169.224 79.8085 169.304 80.1572 169.493Z" fill="#FF7800"/>

                    <path d="M52.3944 132.274C52.3676 132.193 52.3408 132.112 52.2871 132.004C52.3139 132.112 52.3676 132.193 52.3944 132.274Z" fill="#FF7800"/>

                    <path d="M47.5679 132.623L47.5411 132.462C47.5142 132.489 47.5142 132.543 47.5679 132.623Z" fill="#FF7800"/>

                    <path d="M55.1855 131.896C55.1855 131.923 55.2124 131.95 55.2124 131.977C55.266 131.977 55.3197 131.977 55.4001 131.95L55.1855 131.896Z" fill="#FF7800"/>

                    <path d="M38.2852 135.53L38.3388 135.503C38.312 135.503 38.2852 135.503 38.2852 135.53Z" fill="#FF7800"/>

                    <path d="M43.8379 133.888C43.8915 133.996 43.8915 134.05 43.8647 134.103C43.9184 134.103 43.9184 134.077 43.8379 133.888Z" fill="#FF7800"/>

                    <path d="M58.8337 137.387L58.6191 137.01C58.6996 137.171 58.7801 137.36 58.8337 137.387Z" fill="#FF7800"/>

                    <path d="M59.0483 133.619C59.0483 133.673 59.0215 133.754 59.0215 133.834C59.0751 133.808 59.102 133.781 59.0483 133.619Z" fill="#FF7800"/>

                    <path d="M12.1856 157.329C12.1052 157.356 12.2661 157.652 12.4002 157.921L12.1856 157.329Z" fill="#FF7800"/>

                    <path d="M30.9906 139.997L30.9102 139.836C30.937 139.917 30.9638 139.971 30.9906 139.997Z" fill="#FF7800"/>

                    <path d="M14.5467 160.289L14.4395 160.262C14.4931 160.316 14.5199 160.316 14.5467 160.289Z" fill="#FF7800"/>

                    <path d="M58.1621 138.921C58.2694 139.351 57.9475 138.921 58.1085 139.298C58.1621 139.217 58.3767 139.459 58.1621 138.921Z" fill="#FF7800"/>

                    <path d="M38.6616 154.288L38.6348 154.341C38.6616 154.341 38.6616 154.315 38.6616 154.288Z" fill="#FF7800"/>

                    <path d="M14.5478 160.289L14.6551 160.316C14.6014 160.262 14.5478 160.208 14.4941 160.154C14.521 160.235 14.5478 160.289 14.5478 160.289Z" fill="#FF7800"/>

                    <path d="M23.6674 145.003C23.6674 144.976 23.6406 144.949 23.6406 144.922L23.6674 145.003Z" fill="#FF7800"/>

                    <path d="M22.8887 144.707C22.8887 144.653 22.8887 144.599 22.8887 144.545C22.8082 144.545 22.835 144.626 22.8887 144.707Z" fill="#FF7800"/>

                    <path d="M12.4004 157.921L12.5345 158.244C12.5345 158.19 12.4809 158.055 12.4004 157.921Z" fill="#FF7800"/>

                    <path d="M19.2135 148.259C19.2135 148.233 19.2135 148.206 19.2135 148.179C19.1867 148.206 19.1867 148.233 19.2135 148.259Z" fill="#FF7800"/>

                    <path d="M44.2676 133.915C44.2944 133.942 44.3212 133.942 44.3481 133.969C44.3212 133.888 44.2676 133.834 44.2676 133.915Z" fill="#FF7800"/>

                    <path d="M47.0028 144.895C46.8955 144.841 47.0028 145.137 47.1369 145.433C47.1637 145.406 47.1637 145.326 47.0028 144.895Z" fill="#FF7800"/>

                    <path d="M46.6816 145.46C46.7085 145.46 46.7085 145.487 46.7353 145.487C46.7085 145.46 46.6816 145.46 46.6816 145.46Z" fill="#FF7800"/>

                    <path d="M50.1425 144.384L50.1152 144.357C50.1152 144.357 50.1152 144.384 50.1425 144.384Z" fill="#FF7800"/>

                    <path d="M49.5794 144.815C49.5258 144.761 49.4721 144.707 49.4453 144.68C49.4721 144.734 49.5258 144.788 49.5794 144.815Z" fill="#FF7800"/>

                    <path d="M42.0681 153.588C42.4704 153.023 42.685 151.812 43.3825 151.677C43.0069 150.87 43.1679 150.735 43.2483 150.439L43.8921 151.408L43.8385 151.004C44.0799 151.273 43.8385 151.247 44.1872 151.569L43.8385 150.924C44.0799 151.273 44.3481 150.924 44.5627 151.785L45.126 151.435C45.2601 151.381 44.67 150.574 44.9651 150.735C45.1797 151.004 45.0455 150.977 45.2869 151.3C46.1721 151.758 44.5359 149.094 45.2065 149.282L45.2601 149.443C45.1528 149.147 45.3138 149.094 45.2065 148.959C44.5359 147.99 45.4747 149.551 44.9919 149.04C44.4822 148.205 44.8578 148.502 44.4554 147.856C44.7505 148.098 44.4822 147.586 44.5359 147.479C44.9919 147.909 44.9651 147.425 45.4747 148.017C45.3674 147.721 44.9382 146.833 45.0455 146.725C45.5552 147.317 45.4211 147.371 45.7161 147.533L45.4211 147.021C45.582 147.021 45.6625 147.183 45.7966 147.398C45.9307 147.344 45.4747 146.671 45.8234 146.887L46.038 147.425C46.038 147.156 46.1453 147.21 46.3063 147.156C46.4672 147.452 46.4135 147.452 46.3063 147.398C46.8427 148.071 46.2526 146.994 46.3599 147.048C46.2258 146.833 46.038 146.806 45.7966 146.295C45.9307 146.349 45.5552 145.514 45.9575 146.079L46.1721 146.618C46.0917 146.133 45.8771 145.945 46.199 146.026C46.199 146.079 46.2794 146.187 46.3599 146.295C46.0917 145.595 46.6013 146.079 46.8159 145.999L46.8696 146.16C46.8427 145.945 46.6013 145.487 46.6818 145.487C46.4135 145.272 46.3599 145.111 46.0648 144.626C46.6818 145.353 45.6893 143.55 46.2258 143.9C46.3867 144.196 46.5477 144.545 46.3063 144.303C46.7354 145.191 47.1646 145.891 47.2451 146.375C47.2183 146.133 47.2451 145.945 47.4329 146.322L46.9768 145.541C47.0037 145.487 47.0841 145.514 47.111 145.487C46.8427 144.976 46.5208 144.734 46.4404 144.357C46.4135 144.034 47.0037 145.111 46.7891 144.761C46.7891 144.33 46.3599 143.873 46.6818 144.034C46.7086 144.115 46.7623 144.276 46.6818 144.196C47.0037 144.438 46.8964 143.873 47.5133 144.788C47.6206 145.003 47.7816 145.299 47.7011 145.245L47.6206 145.111C47.8889 145.864 47.6206 144.868 48.0766 145.73C47.7547 145.218 48.023 145.245 48.1571 145.299L47.7816 144.734C47.0305 142.85 48.4522 145.891 48.5595 145.514C48.5058 145.03 48.3985 145.38 48.2644 144.922C48.4253 144.949 48.774 145.434 48.8009 145.111C48.9886 145.326 49.2569 145.568 49.6324 146.214C49.5788 145.891 50.0884 146.322 49.7934 145.676C49.3105 145.218 50.0079 146.456 49.3373 145.73L49.0155 145.057C49.1764 145.003 49.1764 144.599 49.391 144.761C49.3105 144.653 49.2032 144.492 49.1228 144.357C49.1764 144.007 48.8813 143.334 49.1764 143.415C49.5251 143.98 49.3642 143.953 49.3105 144.034C49.7129 144.438 49.4715 144.007 49.7665 144.061C50.0616 144.572 49.6324 144.115 49.8738 144.626L49.9811 144.357C50.0079 144.384 50.0079 144.411 50.0348 144.465C49.5788 143.603 50.2494 144.438 50.2225 144.115C50.5444 143.953 49.9275 142.769 49.7129 141.989C49.9006 142.204 50.0348 142.392 50.1152 142.635C49.8202 142.312 50.0079 142.581 50.1152 142.823C50.1689 142.688 50.8127 143.523 50.9468 143.9C50.9736 143.55 50.6249 143.496 50.5981 143.173L50.8663 143.092C50.5981 142.662 50.4639 142.608 50.3835 142.231C50.4103 142.043 50.5176 142.123 50.6517 142.069C50.759 142.285 51.0541 142.715 50.9468 142.742C51.1077 142.877 51.215 142.85 51.0004 142.392C50.6249 142.069 51.0272 141.881 50.5444 141.262L50.92 141.585C50.8931 141.585 51.0272 141.881 50.9468 141.827C51.3491 142.473 50.9468 141.585 50.9736 141.477C51.1077 141.585 51.2687 141.558 51.4028 141.827C51.3491 141.612 51.5369 141.693 51.7515 142.043C51.7515 141.881 51.5101 141.612 51.4296 141.37L51.6978 141.289C51.9124 141.666 52.4757 142.662 52.5294 142.823C52.4221 142.446 51.9661 141.72 52.127 141.693C52.4489 142.446 52.6099 142.15 52.9586 143.065C53.3073 143.55 53.5219 143.415 53.5219 143.173C53.2805 142.554 53.2268 142.904 52.9049 142.339C53.1195 141.962 52.288 140.32 52.6903 140.482L52.5294 140.347C52.5026 139.943 52.5294 140.024 52.3684 139.486C52.7172 140.239 53.5755 141.343 53.7365 141.074C53.5755 140.697 53.2268 140.455 52.9586 139.863L53.0659 139.674C53.1195 139.728 53.1463 139.863 53.1732 139.97C53.2 139.62 53.9511 140.778 53.5487 139.89L54.2461 140.885L53.9511 140.455C53.7901 140.078 53.8974 139.89 53.8706 139.728C53.8438 139.244 54.0583 139.513 54.3802 139.943C54.1925 139.647 53.7633 139.001 53.8438 138.813C54.4339 139.997 54.3534 139.109 54.6485 139.728C54.7021 139.674 54.9704 139.997 54.7289 139.513L55.0777 140.266C54.568 139.217 54.8094 139.163 54.8631 138.921C55.5337 140.347 54.9704 138.732 55.6678 139.97C55.2386 139.001 55.7482 139.459 55.3727 138.625C55.48 138.517 55.8824 139.432 56.0701 139.728L55.9628 139.351C56.2311 139.782 56.4725 139.728 56.7676 139.997L56.4993 139.082L56.7139 139.459C56.6334 139.244 56.6603 139.055 56.4725 138.759L56.553 138.786C56.1238 137.844 56.5261 138.49 56.4725 138.033C56.5798 138.167 56.6603 138.409 56.6871 138.544C56.7676 138.517 56.9553 139.028 57.1163 139.324C56.9553 139.109 56.5798 137.548 56.2311 137.198C56.0433 136.822 56.0165 136.499 56.1774 136.633L56.6066 137.467L56.2847 136.552C56.3384 136.391 56.6066 136.902 56.7407 136.956C56.6871 137.037 57.2772 138.652 57.465 138.544C57.4113 138.705 57.5454 139.19 57.5723 139.405C57.6259 139.432 57.6796 139.486 57.7869 139.89C57.8405 139.567 57.5991 139.351 57.7332 139.163C58.0551 139.917 58.216 140.159 58.4575 140.347L58.1087 139.836C58.0819 139.728 58.0551 139.674 58.0283 139.62C57.9478 139.567 57.8942 139.432 57.76 139.163C57.7869 139.163 57.5454 138.14 57.76 138.598C57.0894 137.494 57.6527 137.548 57.2504 136.902C57.1699 136.66 57.2772 136.579 57.4382 136.956C57.5454 137.602 57.8942 137.79 58.1087 138.329C58.0551 138.086 57.76 137.817 57.7064 137.494C57.76 137.414 58.0283 137.844 58.1624 138.086L58.1892 138.248L58.4575 138.544C58.3233 138.167 58.0819 137.952 58.1087 137.71C58.216 137.844 58.2429 137.602 58.3502 137.925C58.5111 138.463 58.833 139.163 58.7793 139.324C58.833 139.244 59.0476 139.055 58.6452 138.383H58.7525C58.5648 138.086 58.1624 137.548 58.3233 137.387L58.377 137.548L58.2965 136.902L58.5111 137.279C58.4306 137.091 58.377 136.902 58.4306 136.902C58.5379 137.118 58.6184 137.198 58.7257 137.521C58.8598 137.441 58.6989 137.037 58.6184 136.822C58.672 136.741 58.7525 136.902 58.8866 137.36C59.0208 137.414 59.1817 137.252 59.3695 137.656C59.3695 137.252 59.289 137.494 59.1817 136.929C59.745 138.275 59.745 137.333 59.7718 137.145C59.6377 136.526 59.6377 136.499 59.6377 136.472C59.6377 136.445 59.6645 136.445 59.5572 135.88C59.5572 135.987 59.5841 136.095 59.6109 136.203C59.6109 136.256 59.6377 136.31 59.6377 136.364V136.391V136.31C59.6377 136.256 59.6377 136.23 59.6109 136.176C59.5841 136.068 59.5841 135.987 59.5841 135.934C59.6109 136.041 59.6109 136.203 59.6914 136.633C59.6377 136.23 59.5841 135.853 59.5304 135.503C59.5036 135.153 59.5304 135.557 59.5841 135.987C59.6109 136.176 59.6377 136.364 59.6645 136.472C59.6645 136.552 59.6645 136.499 59.6109 136.176C59.5304 135.557 59.4768 135.072 59.4768 134.642C59.4768 134.238 59.5304 133.861 59.6377 133.727C59.6109 133.781 59.6645 133.7 59.6645 133.7H59.6377C59.6109 133.7 59.6109 133.7 59.6377 133.7C59.6645 133.7 59.6645 133.7 59.6645 133.7C59.6377 133.7 59.6109 133.754 59.5841 133.807C59.6109 133.781 59.6109 133.754 59.6109 133.727C59.6645 133.646 59.6645 133.673 59.6377 133.673C59.6109 133.673 59.5841 133.673 59.5841 133.673C59.5572 133.673 59.5304 133.673 59.5036 133.673C59.4231 133.646 59.3963 133.646 59.3963 133.646H59.3695C59.3426 133.619 59.2622 133.619 59.0744 133.511C58.833 133.377 58.6452 133.215 58.5111 133.135C58.377 133.027 58.2965 132.973 58.2429 132.919C58.216 132.892 58.1892 132.866 58.1624 132.839C58.0819 132.758 57.8673 132.596 57.6527 132.381C57.4113 132.166 57.1699 131.924 56.9821 131.735C57.1967 131.951 57.3577 132.112 57.5454 132.273C57.7064 132.435 57.8405 132.543 57.9478 132.65C58.0283 132.704 58.0819 132.758 58.1356 132.812C58.1624 132.839 58.1356 132.812 58.0551 132.731C57.921 132.623 57.7332 132.462 57.5186 132.247C57.304 132.031 57.0894 131.816 56.8212 131.574C56.848 131.601 56.8749 131.628 56.9017 131.681C56.9285 131.735 56.9821 131.762 57.009 131.816C57.1163 131.924 57.1967 132.031 57.2236 132.112C57.6259 132.462 57.6796 132.462 57.6796 132.462C57.6796 132.462 57.6796 132.462 57.7064 132.489C57.7332 132.516 57.76 132.543 57.8137 132.596C57.921 132.677 58.0283 132.785 58.1892 132.919C58.2697 132.973 58.3233 133.027 58.4038 133.108C58.4843 133.162 58.5648 133.242 58.6452 133.296C58.7257 133.35 58.8062 133.404 58.8866 133.458C58.9403 133.484 59.0208 133.538 59.1012 133.592C59.1549 133.619 59.2085 133.646 59.2622 133.673C59.3158 133.7 59.3963 133.727 59.4231 133.727C59.1012 133.619 59.4768 133.754 59.5036 133.727C59.4768 133.727 59.5572 133.727 59.5572 133.727C59.5572 133.727 59.4768 133.807 59.4499 133.888C59.4231 133.969 59.4499 133.888 59.4499 133.861C59.4499 133.861 59.4499 133.834 59.4499 133.888C59.4499 133.915 59.4231 133.942 59.4231 133.969C59.3963 134.023 59.3963 134.077 59.3963 134.184C59.3963 134.238 59.3963 134.292 59.3963 134.346C59.3695 134.534 59.3963 134.48 59.3963 134.507C59.3963 134.534 59.3963 134.561 59.3963 135.018C59.3963 134.965 59.3963 134.911 59.3963 134.884C59.3963 134.83 59.3963 134.803 59.3963 134.776C59.3963 134.642 59.3963 134.534 59.3963 134.453C59.3963 134.265 59.4231 134.13 59.4499 134.023C59.4768 133.754 59.3963 133.646 59.3426 133.673C59.289 133.673 59.2622 133.807 59.2353 133.969C59.2085 134.319 59.2353 134.83 59.2085 135.072C59.2085 134.992 59.1817 134.83 59.1817 134.749C59.2085 135.072 59.1549 135.072 59.1281 135.153C58.9671 134.911 59.0744 134.588 58.9939 134.265L58.8062 134.346C58.7793 134.319 58.7793 134.292 58.7793 134.265C58.7793 134.453 58.7525 134.561 58.6452 134.265C58.5916 133.861 58.5111 133.458 58.4843 133.135C58.4843 133.431 58.4843 133.727 58.4843 134.023C58.4038 133.619 58.1087 133.404 58.1892 133.081C58.0819 133.162 58.0015 133.269 57.8942 133.35L57.5991 132.569C57.5723 132.731 57.6259 132.892 57.7332 132.946C57.5454 132.812 57.7064 134.507 57.2236 132.919C57.1967 133.646 57.009 133.431 56.8748 133.942C56.8212 133.135 56.2579 133.135 56.3652 132.704C56.0701 132.435 56.392 133.269 56.3115 133.458C56.0701 133.162 55.8019 132.381 55.8287 132.058V132.462L55.7751 132.3L55.8287 132.785C55.5337 132.435 55.48 132.031 55.3191 131.977L55.5605 132.677L55.2922 132.327C55.4532 132.623 55.4264 132.785 55.3727 132.892L55.3191 132.731L55.2654 132.919C55.2118 132.462 55.1045 132.812 54.9435 132.3C54.8362 132.3 54.8362 132.327 54.7021 132.516L54.9435 132.973C54.8899 133.484 54.6216 132.3 54.4339 132.327L54.6753 132.866C54.0047 132.085 54.4607 133.565 54.0047 133.081C54.0583 132.919 53.7633 132.3 53.8169 132.462C53.7365 132.731 53.3877 132.704 53.5219 133.431C53.0927 132.704 52.9854 132.462 52.6367 132.22C52.5294 132.327 52.5562 132.408 52.7172 132.866C52.4489 132.623 52.4221 133.188 52.1539 132.623C52.3416 133.081 51.9929 132.596 52.1002 133L51.9661 132.785L52.2343 133.296C51.4296 132.247 52.1807 134.13 51.4564 133.215L51.4296 133.054V133.296C51.2955 133.081 51.2687 132.919 51.1345 132.623L50.6517 132.731L50.9468 133.081C50.8931 133.188 51.0809 133.7 50.8127 133.458C50.5981 132.596 50.6517 133.511 50.3298 132.919V132.677C50.2225 132.785 50.2225 132.785 50.4908 133.296C50.4103 133.565 49.8738 132.354 50.0079 133L50.1152 132.973C50.303 133.269 50.4371 133.727 50.3567 133.754C50.303 133.673 50.1421 133.484 50.1421 133.377C50.1152 133.646 49.7934 133.484 49.847 133.7C49.6861 133.565 49.5251 133.188 49.4983 133.027C49.4715 133.619 49.3105 133 49.2837 133.592L49.1228 133.296L49.2032 133.7L48.7472 133.162L48.9886 133.511C48.935 133.619 48.9886 133.834 48.774 133.727L48.5863 133.269C48.4522 133.646 47.9157 132.704 47.9962 133.431C47.9425 133.35 47.8889 133.215 47.8889 133.135C48.023 133.942 47.2987 132.462 47.5133 133.404C47.4597 133.242 47.3256 133.081 47.2719 132.946L47.3256 133.269L47.0305 132.677L47.406 133.592L47.0305 133.027L47.1378 133.323C46.4135 132.273 46.7354 133.188 46.1185 132.435L46.5477 133.162C47.0037 134.884 45.2333 132.785 45.1528 133.727L44.8309 133.135L45.0187 133.915C44.67 133.511 44.8041 133.377 44.6164 133.108C44.5895 133.538 45.0187 133.996 44.8846 134.292C44.5359 133.969 44.6968 133.834 44.6164 133.619C44.5627 134.023 44.4286 134.507 44.0799 134.292C44.1335 134.373 44.1603 134.48 44.1872 134.507C44.1872 134.857 43.8653 134.696 43.7312 134.83C43.5702 134.561 43.597 134.507 43.597 134.426C43.5166 134.426 43.3288 134.292 43.4361 134.588L43.2215 134.05C43.0337 134.023 43.0606 134.615 42.7119 134.05C42.846 134.265 43.0874 134.696 42.9801 134.722C42.4168 133.888 42.8996 135.261 42.4704 134.884C42.3631 134.669 42.4704 134.561 42.4168 134.561C42.2022 134.373 42.3631 134.83 42.4436 135.153L42.2559 134.776L42.1486 135.476C41.5853 134.642 41.8535 135.826 41.5048 135.18C41.3438 135.234 41.8535 135.503 41.7462 135.691C41.478 135.368 41.6926 135.96 41.3707 135.395L41.3438 135.315L41.2365 135.422L40.9951 134.83C40.9683 135.018 41.2097 135.611 41.478 136.041C41.1829 135.799 41.2097 136.122 40.861 135.637L40.8074 135.476C40.6732 135.853 39.4125 134.238 39.7612 135.315C39.7076 135.234 39.6271 135.099 39.6539 135.099L39.4662 135.18L39.2516 134.749L39.3589 135.557L39.1979 135.261C38.9297 135.261 38.7419 135.584 38.5542 135.826L38.5005 135.664C38.5005 136.256 38.0713 135.557 38.0713 135.987C38.0445 135.907 38.0177 135.88 38.0177 135.853L37.8567 135.96L37.7226 135.664C37.964 136.337 36.8643 135.099 37.2666 135.557C37.3471 135.88 37.4276 136.256 37.6422 136.633C37.4812 136.768 37.3739 136.31 37.1057 136.149C36.9447 136.203 37.2398 136.714 36.8911 136.579L36.7301 136.283C36.6765 136.391 36.757 136.633 36.6497 136.741L36.596 136.579C36.7838 137.279 35.8181 135.907 36.4619 137.225C36.2473 137.064 36.1937 137.333 35.845 136.768C35.845 137.279 35.7645 137.575 35.6572 137.952C35.0402 137.064 35.6304 138.033 35.1744 137.602L35.4962 138.086C35.2012 138.383 34.0209 137.414 33.7795 137.844L33.4576 137.36L33.7259 137.952C33.1626 137.979 32.5188 138.14 32.1969 138.356C32.2506 138.679 32.492 139.378 32.2237 139.298L32.1969 139.217C32.0896 139.701 31.9287 140.105 31.419 140.024C31.3117 139.809 31.1776 139.674 31.124 139.54C31.419 140.132 30.963 139.701 30.8825 139.728L31.2044 140.024C31.419 140.535 30.9898 140.186 30.7216 139.863L30.9362 140.482C30.8825 140.428 30.8289 140.374 30.7752 140.293L30.9362 140.562L30.4265 139.97C30.4802 140.132 30.3997 140.401 30.7484 141.047C30.5875 140.858 30.3461 140.778 30.3729 140.589L29.7291 140.751L29.9705 140.912C30.3192 141.397 30.3729 141.8 30.1315 141.639C29.9705 141.181 29.6755 140.939 29.3804 140.616C29.4877 140.912 29.7291 140.993 29.8901 141.289C30.0242 141.666 29.9437 141.962 29.7559 141.773L29.6755 141.558C29.6755 141.827 29.0585 141.02 28.9512 141.154C29.1122 141.612 28.7903 141.316 29.3804 142.123C29.3536 142.392 28.9244 141.612 28.8171 141.558C29.0317 141.989 28.6293 141.881 28.3074 141.504C29.0585 142.769 27.61 141.343 28.2806 142.392L27.7441 141.908C27.9319 142.177 28.3343 142.796 28.3074 142.984C28.0124 142.769 27.6905 142.258 27.4759 142.016L28.1197 143.065C26.8321 142.366 26.6175 143.603 25.3836 143.146C25.2764 143.55 25.2764 144.249 24.874 144.33L24.8203 144.169L24.3107 144.115L24.874 144.411C24.9008 144.572 24.9813 144.815 24.9008 144.841C24.257 144.68 23.4523 144.492 23.4255 145.299C23.9888 146.645 22.5135 144.411 22.8622 145.434C22.8086 145.326 22.7013 145.137 22.6208 145.03C22.6208 145.622 22.6208 145.918 22.8354 146.779C22.0307 145.622 22.6744 146.941 22.2721 146.322L22.594 146.806C22.3257 146.564 22.1111 146.591 21.8965 146.241L22.1916 146.914L21.8429 146.456C21.6551 146.537 21.6015 147.183 20.7968 146.295C20.9309 147.29 20.153 147.56 19.5361 147.748C19.7506 148.179 19.6433 148.313 19.5629 148.448L19.0264 147.99C19.0532 148.259 19.4556 149.04 19.08 148.771C19.0264 148.717 18.9996 148.663 18.9727 148.609C18.9459 148.824 18.5972 148.609 18.8923 149.201C18.7313 149.282 18.4094 149.067 18.0339 148.528C18.7313 149.443 17.6584 148.609 17.6584 148.609C17.6584 148.609 15.5929 149.309 13.8494 150.816C12.1058 152.323 10.6842 154.637 11.9181 157.679C12.24 158.163 12.3204 158.567 12.8033 159.024C12.8301 159.266 12.1327 158.54 12.4814 158.997C12.8837 159.159 13.3934 160.181 13.9835 160.585V160.773C14.2249 161.096 13.8226 160.316 14.2518 160.908L13.5812 160.074C13.7689 160.128 13.9299 160.262 14.1981 160.531C14.0103 160.154 13.1251 158.997 13.6884 159.347V159.428C13.7957 159.293 14.2249 159.885 14.359 159.993L14.3322 160.02L14.7882 160.343C14.4663 160.128 14.8955 160.935 14.9223 160.827C15.2711 160.935 14.7078 160.666 14.7614 160.451C14.7882 160.343 15.1369 160.8 15.3515 161.069L15.4588 160.935C15.7807 161.312 15.3515 160.989 15.7271 161.339L15.5661 160.8C16.3977 161.742 15.3784 160.181 16.2099 161.016C16.2635 161.339 16.4781 161.339 16.7195 161.662L16.961 161.366C17.0951 161.473 17.1219 161.742 17.1219 161.635C17.3901 161.85 17.0146 161.312 17.0683 161.312C17.3097 161.554 17.2828 161.123 17.7925 161.769C18.3558 162.038 17.2024 160.881 17.6852 161.096C18.0339 161.473 17.6047 161.312 18.0339 161.635L18.1144 161.339C18.2485 161.554 18.5972 162.011 18.4631 161.985C19.4019 162.065 21.3869 163.895 21.4405 162.98C21.8965 163.384 21.6551 163.33 21.8429 163.68C21.682 162.765 23.1573 164.299 23.3987 164.003L23.1036 163.599C24.4716 164.46 24.3912 163.357 25.2764 163.492L25.0081 163.276C24.7667 162.846 24.8472 162.738 24.7935 162.496C24.9545 162.684 25.3836 163.384 25.4105 163.115C25.2764 163.007 25.0886 162.9 24.9545 162.684C26.1615 163.384 26.8053 162.469 27.8514 162.442C28.522 161.446 30.0778 161.473 30.7752 160.558C30.6679 160.693 29.9974 159.67 30.2656 159.832C31.7946 161.285 30.5338 159.186 31.6873 160.101C31.7946 159.186 33.3503 160.289 32.8675 158.647L33.2162 159.105C33.4576 159.266 33.2162 158.917 33.2699 158.809L33.3772 158.943C33.699 158.997 33.5381 158.351 33.8332 158.513L33.4576 157.975C33.5381 157.84 33.8063 158.351 33.699 157.975L33.8868 158.244L33.6454 157.652C34.316 158.594 33.9941 157.517 34.3965 157.867C34.4233 157.598 34.3965 157.006 34.7183 157.033C35.0939 157.49 35.3621 157.302 35.7108 157.409C35.9522 157.06 36.301 156.575 36.8106 156.468L36.3814 155.849L36.4619 155.741C36.5424 155.875 36.6228 155.929 36.6497 156.01C37.213 156.656 36.757 155.633 37.1325 155.983C36.6765 155.472 36.9984 155.956 36.9179 155.983C36.6228 155.741 36.301 155.095 36.6228 155.31L36.7033 155.445L36.5692 155.068C36.9179 155.552 37.1325 155.714 37.4812 156.171C37.7494 155.822 37.4276 154.826 37.9372 154.799C38.2591 155.364 38.0982 154.476 38.6883 155.472C38.6615 154.96 38.125 154.745 37.7763 154.018C37.8567 153.992 37.7226 153.696 37.9909 154.018C38.125 154.261 38.42 154.557 38.4469 154.664L38.5542 154.503C38.6078 154.557 38.6883 154.718 38.6883 154.799C38.6078 154.045 39.6271 155.041 39.5198 154.315C39.3052 153.965 39.3589 154.288 39.1443 153.938C38.9565 153.077 39.7881 154.395 39.7076 153.722L39.9758 154.234C39.8417 153.857 39.6003 153.426 40.0027 153.722C40.405 154.261 40.1904 154.261 40.2977 154.557C40.405 154.53 40.5391 154.207 40.1368 153.749C40.1368 153.48 40.4855 153.965 40.6464 154.072C40.5659 153.938 40.2977 153.776 40.1904 153.48C40.5391 153.696 40.7805 153.534 40.9951 153.453C41.0756 153.588 41.2365 153.803 41.2634 153.857C41.1561 152.646 41.9876 153.884 42.0681 153.588Z" fill="#FF7800"/>

                    <path d="M50.2494 144.438L50.1152 144.384C50.1957 144.518 50.2762 144.653 50.303 144.814L50.2494 144.438Z" fill="#FF7800"/>

                    <path d="M46.3867 146.268C46.4135 146.321 46.4135 146.375 46.4404 146.429C46.4672 146.402 46.4135 146.321 46.3867 146.268Z" fill="#FF7800"/>

                    <path d="M46.1193 147.802C46.1193 147.64 45.9583 147.533 45.8242 147.398C45.9047 147.506 45.9852 147.64 46.1193 147.802Z" fill="#FF7800"/>

                    <path d="M51.4824 141.72C51.5092 141.774 51.5361 141.854 51.5897 141.989C51.5629 141.854 51.5361 141.774 51.4824 141.72Z" fill="#FF7800"/>

                    <path d="M57.5458 139.19C57.519 139.163 57.519 139.136 57.4922 139.109C57.4922 139.136 57.519 139.163 57.5458 139.19Z" fill="#FF7800"/>

                    <path d="M56.7944 138.382C56.7676 138.382 56.7676 138.409 56.7676 138.49C56.7944 138.517 56.7944 138.463 56.7944 138.382Z" fill="#FF7800"/>

                    <path d="M50.1953 142.715C50.1953 142.742 50.1953 142.796 50.249 142.931C50.2758 142.904 50.2221 142.823 50.1953 142.715Z" fill="#FF7800"/>

                    <path d="M56.7675 138.651L56.6602 138.625C56.687 138.651 56.687 138.705 56.7138 138.732L56.7675 138.651Z" fill="#FF7800"/>

                    <path d="M57.679 139.217C57.6522 139.217 57.5986 139.217 57.5449 139.19C57.6522 139.325 57.679 139.324 57.679 139.217Z" fill="#FF7800"/>

                    <path d="M53.2539 139.809C53.3076 140.105 53.3076 139.971 53.2539 139.809Z" fill="#FF7800"/>

                    <path d="M58.1094 139.297C58.1094 139.324 58.1094 139.351 58.1094 139.432C58.1362 139.459 58.163 139.459 58.1898 139.486C58.163 139.405 58.1362 139.351 58.1094 139.297Z" fill="#FF7800"/>

                    <path d="M54.9437 140.078C54.8633 139.836 54.7828 139.701 54.7291 139.566C54.7023 139.593 54.756 139.728 54.9437 140.078Z" fill="#FF7800"/>

                    <path d="M38.2319 94.004C38.2319 93.9233 38.2319 93.8426 38.2051 93.708C38.2051 93.8157 38.2319 93.9233 38.2319 94.004Z" fill="#FF7800"/>

                    <path d="M34.4492 92.3894L34.476 92.2549C34.4492 92.2549 34.4492 92.3087 34.4492 92.3894Z" fill="#FF7800"/>

                    <path d="M40.459 94.6772C40.459 94.7042 40.459 94.7311 40.459 94.758C40.4858 94.758 40.5395 94.7849 40.6199 94.8118L40.459 94.6772Z" fill="#FF7800"/>

                    <path d="M26.6172 91.017L26.6708 90.9901C26.644 90.9901 26.644 90.9632 26.6172 91.017Z" fill="#FF7800"/>

                    <path d="M31.2573 91.9858C31.2573 92.1204 31.2305 92.1473 31.2305 92.2011C31.2573 92.2011 31.2841 92.1742 31.2573 91.9858Z" fill="#FF7800"/>

                    <path d="M41.8793 101.082L41.7988 100.651C41.8257 100.813 41.8525 101.028 41.8793 101.082Z" fill="#FF7800"/>

                    <path d="M43.0341 97.5029C43.0073 97.5298 43.0073 97.6106 42.9805 97.6913C43.0073 97.6913 43.0341 97.6913 43.0341 97.5029Z" fill="#FF7800"/>

                    <path d="M42.9531 97.8259C42.9531 97.799 42.9799 97.7452 42.9799 97.7183C42.9799 97.7183 42.9531 97.7452 42.9531 97.8259Z" fill="#FF7800"/>

                    <path d="M0.732169 94.7037C0.678521 94.6768 0.59805 94.9998 0.517578 95.2689L0.732169 94.7037Z" fill="#FF7800"/>

                    <path d="M19.8576 91.5014V91.313C19.8308 91.3668 19.8576 91.4476 19.8576 91.5014Z" fill="#FF7800"/>

                    <path d="M0.24948 98.4718L0.222656 98.3911C0.222656 98.4449 0.24948 98.4718 0.24948 98.4718Z" fill="#FF7800"/>

                    <path d="M40.8612 102.293C40.8344 102.724 40.6734 102.212 40.7003 102.643C40.7539 102.562 40.8612 102.885 40.8612 102.293Z" fill="#FF7800"/>

                    <path d="M20.0448 107.703L20.0176 107.73C20.0448 107.73 20.0448 107.73 20.0448 107.703Z" fill="#FF7800"/>

                    <path d="M0.25 98.4714L0.276824 98.5791C0.276824 98.4983 0.276824 98.4445 0.276824 98.3638C0.276824 98.4176 0.276824 98.4714 0.25 98.4714Z" fill="#FF7800"/>

                    <path d="M12.5352 91.286C12.562 91.2321 12.5888 91.2052 12.5888 91.1514C12.562 91.0976 12.562 91.1783 12.5352 91.286Z" fill="#FF7800"/>

                    <path d="M0.516932 95.269L0.382812 95.592C0.43646 95.5651 0.490108 95.4305 0.516932 95.269Z" fill="#FF7800"/>

                    <path d="M8.7793 92.1471C8.7793 92.1471 8.80612 92.1202 8.80612 92.0933C8.7793 92.0933 8.7793 92.1202 8.7793 92.1471Z" fill="#FF7800"/>

                    <path d="M31.5801 92.201C31.6069 92.2279 31.6069 92.2548 31.6337 92.2817C31.6337 92.1741 31.6069 92.1202 31.5801 92.201Z" fill="#FF7800"/>

                    <path d="M30.0766 103.262C30.0229 103.181 29.9961 103.477 29.9961 103.8C30.0229 103.8 30.0497 103.719 30.0766 103.262Z" fill="#FF7800"/>

                    <path d="M29.6484 103.639C29.6484 103.666 29.6753 103.666 29.6753 103.692C29.6484 103.639 29.6484 103.639 29.6484 103.639Z" fill="#FF7800"/>

                    <path d="M32.1161 104.285C32.0893 104.204 32.0893 104.15 32.0625 104.096C32.0893 104.177 32.0893 104.258 32.1161 104.285Z" fill="#FF7800"/>

                    <path d="M28.3075 104.985C28.2803 104.985 28.2803 104.957 28.3075 104.985C28.2803 104.985 28.2803 104.985 28.3075 104.985Z" fill="#FF7800"/>

                    <path d="M22.9959 108.752C23.5324 108.429 24.1762 107.487 24.7663 107.676C24.7931 106.787 24.9809 106.734 25.115 106.518L25.2491 107.676L25.3564 107.299C25.4637 107.649 25.276 107.541 25.4101 107.945L25.3833 107.218C25.4369 107.622 25.7856 107.46 25.6247 108.321L26.2148 108.268C26.3489 108.295 26.188 107.299 26.3489 107.568C26.4026 107.918 26.3221 107.81 26.3757 108.214C26.8854 109.021 26.6172 105.899 27.0732 106.384L27.0463 106.545C27.0732 106.222 27.2073 106.249 27.2073 106.088C27.0195 104.931 27.2073 106.734 27.0195 106.061C26.9122 105.065 27.1 105.523 27.0195 104.769C27.1536 105.119 27.1536 104.554 27.2073 104.473C27.4219 105.065 27.556 104.608 27.7438 105.388C27.7706 105.065 27.7438 104.096 27.8779 104.042C28.0656 104.796 27.9315 104.796 28.1193 105.065L28.0925 104.5C28.2266 104.581 28.2266 104.742 28.2534 105.011C28.3875 105.011 28.2802 104.204 28.468 104.554L28.4412 105.119C28.5216 104.877 28.6021 104.984 28.7631 105.011C28.7899 105.334 28.7362 105.334 28.6826 105.227C28.8704 106.061 28.7899 104.85 28.8435 104.931C28.7899 104.688 28.6826 104.581 28.6826 104.016C28.7631 104.123 28.7631 103.208 28.8972 103.881L28.8704 104.446C28.9776 103.989 28.8704 103.72 29.0849 103.935C29.0849 103.989 29.1118 104.123 29.1118 104.231C29.1386 103.477 29.38 104.123 29.5678 104.177L29.5409 104.338C29.5946 104.15 29.5678 103.612 29.6214 103.666C29.4873 103.343 29.4873 103.181 29.4337 102.616C29.6751 103.558 29.5141 101.513 29.8092 102.024C29.836 102.347 29.836 102.751 29.7287 102.401C29.7555 103.37 29.836 104.204 29.7555 104.661C29.8092 104.419 29.8897 104.285 29.9165 104.688L29.836 103.773C29.8897 103.746 29.9165 103.8 29.9701 103.8C29.9433 103.235 29.7555 102.885 29.836 102.482C29.9433 102.186 29.997 103.397 29.9701 102.993C30.1042 102.616 29.9433 102.024 30.1579 102.293C30.1579 102.374 30.1311 102.535 30.1042 102.455C30.2652 102.804 30.3993 102.266 30.5334 103.343C30.5334 103.585 30.5603 103.908 30.5066 103.827L30.4798 103.666C30.4261 104.473 30.5603 103.45 30.6407 104.419C30.5603 103.827 30.748 103.962 30.8553 104.042L30.748 103.37C30.8017 101.351 30.8821 104.688 31.0967 104.392C31.204 103.935 31.0163 104.204 31.0699 103.746C31.204 103.854 31.2845 104.446 31.4186 104.123C31.4991 104.392 31.6332 104.715 31.7137 105.469C31.7673 105.146 32.0356 105.765 32.0356 105.038C31.7942 104.419 31.9551 105.846 31.66 104.877L31.6332 104.15C31.7673 104.177 31.9014 103.8 32.0356 104.042C32.0087 103.908 31.9819 103.719 31.9819 103.558C32.1429 103.262 32.116 102.535 32.3306 102.724C32.4111 103.397 32.3038 103.289 32.2233 103.343C32.4111 103.854 32.3575 103.37 32.572 103.558C32.6525 104.15 32.4379 103.531 32.4916 104.096L32.6793 103.881C32.6793 103.908 32.6793 103.962 32.6793 103.989C32.5989 103.02 32.8403 104.069 32.9476 103.746C33.2426 103.72 33.1622 102.401 33.2426 101.62C33.3231 101.889 33.3499 102.132 33.3499 102.374C33.2426 101.943 33.2695 102.293 33.2695 102.535C33.3499 102.428 33.5914 103.477 33.5645 103.881C33.6986 103.585 33.4572 103.37 33.5109 103.074L33.7255 103.127C33.645 102.643 33.5645 102.535 33.645 102.132C33.7255 101.997 33.7791 102.078 33.9132 102.105C33.9132 102.347 34.0205 102.858 33.9401 102.831C34.0205 103.02 34.1278 103.02 34.101 102.535C33.9132 102.105 34.2888 102.078 34.101 101.324L34.2888 101.755C34.2619 101.755 34.2888 102.078 34.2351 101.997C34.3424 102.751 34.3156 101.782 34.3692 101.701C34.4229 101.836 34.557 101.889 34.6107 102.186C34.6375 101.97 34.7448 102.132 34.8253 102.508C34.8789 102.347 34.7716 102.024 34.7716 101.755L34.9862 101.809C35.0398 102.239 35.174 103.397 35.1471 103.558C35.2008 103.154 35.0667 102.32 35.2008 102.347C35.2008 103.154 35.4154 102.966 35.4154 103.935C35.5495 104.527 35.7373 104.473 35.8446 104.258C35.8446 103.612 35.6836 103.908 35.63 103.235C35.925 102.966 35.7641 101.163 36.0323 101.459L35.9519 101.27C36.0591 100.894 36.0591 100.974 36.086 100.409C36.1128 101.217 36.4347 102.589 36.6761 102.401C36.6493 101.997 36.4615 101.62 36.4615 100.974L36.6224 100.84C36.6493 100.894 36.6224 101.055 36.6224 101.136C36.7297 100.84 36.9712 102.186 36.9443 101.217L37.1858 102.401L37.0785 101.889C37.0516 101.486 37.2126 101.351 37.2394 101.19C37.3735 100.732 37.454 101.082 37.5881 101.593C37.5345 101.27 37.4003 100.49 37.5076 100.355C37.6149 101.674 37.8027 100.84 37.8563 101.513C37.91 101.486 38.0173 101.889 37.9905 101.351L38.0441 102.186C37.9636 101.028 38.1514 101.082 38.2855 100.867C38.366 102.428 38.4465 100.732 38.6074 102.159C38.5538 101.082 38.822 101.728 38.7952 100.813C38.9025 100.759 38.9561 101.755 39.0098 102.078L39.0366 101.674C39.1171 102.159 39.3317 102.239 39.4926 102.562L39.5462 101.62L39.6267 102.051C39.6267 101.809 39.7072 101.674 39.6267 101.324L39.6804 101.378C39.6267 100.355 39.7608 101.082 39.8413 100.652C39.8681 100.813 39.895 101.055 39.8681 101.19C39.9218 101.19 39.9486 101.728 40.0023 102.078C39.9486 101.809 40.1096 100.221 39.9218 99.7634C39.895 99.3328 39.9754 99.0368 40.0291 99.2252L40.1364 100.14V99.1713C40.2168 99.0368 40.2973 99.6288 40.3778 99.7096C40.2973 99.7634 40.3241 101.486 40.5119 101.459C40.4046 101.593 40.4046 102.105 40.351 102.293C40.4046 102.32 40.4314 102.428 40.3778 102.804C40.5119 102.508 40.4046 102.239 40.5387 102.105C40.5656 102.939 40.646 103.181 40.7801 103.477L40.646 102.885C40.646 102.778 40.646 102.724 40.646 102.67C40.5924 102.589 40.5924 102.455 40.5656 102.132C40.5924 102.132 40.6729 101.109 40.7265 101.593C40.4851 100.302 40.9411 100.598 40.807 99.8172C40.807 99.575 40.9143 99.5212 40.9411 99.9249C40.8338 100.544 41.102 100.867 41.102 101.432C41.1289 101.19 40.9679 100.813 41.0216 100.517C41.102 100.463 41.1825 100.974 41.2362 101.217L41.2093 101.378L41.3434 101.755C41.3434 101.351 41.1825 101.055 41.2898 100.84C41.3166 101.001 41.4239 100.786 41.4507 101.109C41.4239 101.674 41.5044 102.428 41.4239 102.589C41.5044 102.535 41.7458 102.428 41.6117 101.647L41.6922 101.674C41.6117 101.324 41.4239 100.705 41.6117 100.598V100.759L41.719 100.14L41.7995 100.571C41.7995 100.355 41.7995 100.167 41.8531 100.167C41.8799 100.409 41.9336 100.517 41.9336 100.84C42.0677 100.786 42.0409 100.382 42.0409 100.14C42.1213 100.086 42.1482 100.248 42.1482 100.732C42.2555 100.84 42.4432 100.732 42.5237 101.163C42.6578 100.786 42.4969 101.001 42.5505 100.436C42.7115 101.889 43.0333 101.001 43.2479 100.813C43.1675 99.5481 43.3016 100.678 43.3284 99.5212C43.2748 99.9249 43.5698 100.49 43.3821 100.867L43.4894 100.732C43.5698 101.432 43.3016 101.244 43.4357 102.212C43.5698 102.159 43.6235 100.786 43.8112 101.244C43.7576 102.132 43.9185 100.948 43.8917 101.943C43.8649 102.266 43.8112 102.159 43.7844 102.239L43.8112 102.401C44.1063 102.643 43.8917 101.351 44.0258 100.732C44.2136 100.625 44.1599 101.432 44.1868 101.863C44.2136 102.024 44.2941 101.889 44.3477 101.674C44.2404 102.212 44.1331 101.109 44.1868 100.544C44.2672 101.567 44.455 100.625 44.5087 100.221C44.2404 99.1444 44.3209 100.167 44.0795 99.0099C44.0527 99.3328 44.0527 100.248 43.9185 99.8711C43.999 99.4136 43.9185 99.3597 43.8917 99.2252C43.9185 99.7634 43.7844 99.4405 43.7576 99.6558C43.7039 99.2252 43.8381 98.4447 43.6771 98.2294V99.4674C43.6235 99.279 43.7039 98.5524 43.5698 98.8484C43.6235 98.2025 43.543 97.8526 43.7039 97.6373C43.4894 96.5878 43.3821 98.2025 43.2479 98.66C43.2748 98.5793 43.2748 98.4178 43.2748 98.3371C43.2479 98.66 43.1943 98.6331 43.1406 98.7138C43.0333 98.4447 43.2211 98.1487 43.1675 97.8257L42.9797 97.8526C42.9797 97.7988 42.9797 97.7988 42.9797 97.7719C42.9261 97.9334 42.8992 98.041 42.8724 97.745C42.9261 97.3413 42.9261 96.9376 42.9529 96.6147L42.7919 97.4759C42.7919 97.0722 42.6042 96.7762 42.7383 96.4801L42.47 96.6685L42.4164 95.8342C42.3628 95.9957 42.3628 96.1572 42.4432 96.2379C42.3359 96.0495 42.0677 97.7181 42.0677 96.0764C41.8799 96.7762 41.7995 96.507 41.5312 96.9376C41.6922 96.1572 41.263 95.9688 41.4507 95.6189C41.3166 95.2691 41.3166 96.1572 41.2362 96.3186C41.1289 95.9688 41.1289 95.1345 41.2093 94.8385L41.102 95.2152V95.0538L41.0216 95.5382C40.8874 95.1076 40.9679 94.7039 40.8338 94.5963V95.3229L40.7265 94.8923C40.7801 95.2422 40.7265 95.3767 40.646 95.4306V95.2691L40.5656 95.4036C40.646 94.9461 40.4583 95.2422 40.4851 94.7308C40.4046 94.7039 40.4046 94.7039 40.2437 94.8385L40.2973 95.3498C40.1095 95.8073 40.2437 94.5963 40.0827 94.5694L40.1364 95.1614C39.8413 94.1926 39.7608 95.7266 39.5462 95.1076C39.6267 94.973 39.5731 94.3002 39.5731 94.4617C39.439 94.677 39.1707 94.5424 39.0634 95.2691C38.9561 94.4348 38.9293 94.1926 38.7415 93.8158C38.6342 93.8696 38.6074 93.9504 38.6074 94.4348C38.4733 94.1119 38.2855 94.6232 38.2587 94.0042C38.2587 94.4886 38.1514 93.9235 38.1246 94.3272L38.0978 94.0849L38.1514 94.677C37.8563 93.3852 37.8832 95.4305 37.5881 94.3272L37.6149 94.1657L37.5613 94.4079C37.5345 94.1657 37.5613 94.0042 37.5345 93.6543L37.1321 93.5736L37.2394 94.0042C37.1589 94.058 37.1589 94.6232 37.0248 94.2733C37.1053 93.3852 36.8907 94.2464 36.8102 93.5736L36.8639 93.3314C36.7566 93.3852 36.7566 93.3852 36.8102 93.9773C36.6761 94.1926 36.6224 92.8739 36.542 93.5198L36.6493 93.5467C36.7029 93.8696 36.6761 94.3541 36.6224 94.3541C36.5956 94.2733 36.542 94.0042 36.5688 93.9235C36.4615 94.1657 36.2737 93.8696 36.2469 94.1119C36.1664 93.9235 36.1396 93.5198 36.1664 93.3583C35.9519 93.8966 36.0323 93.2507 35.8446 93.7889L35.8177 93.466L35.7641 93.8696L35.5763 93.1699L35.6568 93.6005C35.5763 93.6543 35.5495 93.8966 35.4422 93.7082V93.2237C35.2276 93.5198 35.0935 92.4164 34.9325 93.143C34.9057 93.0623 34.9325 92.9008 34.9325 92.8201C34.7984 93.6005 34.6911 91.9589 34.5838 92.9277C34.5838 92.7662 34.5302 92.5509 34.5302 92.4164L34.4765 92.7393L34.3424 92.0396L34.3692 93.0085L34.2351 92.3357V92.6586C34.0205 91.3937 33.9669 92.3626 33.7255 91.4206L33.8328 92.2549C33.645 94.0042 32.9476 91.3668 32.6257 92.2011L32.572 91.5552L32.4647 92.3357C32.3306 91.8243 32.4648 91.7705 32.4111 91.4206C32.277 91.7974 32.4379 92.3895 32.2502 92.6048C32.0892 92.1742 32.2502 92.1203 32.277 91.8781C32.116 92.228 31.8478 92.6048 31.66 92.2549C31.66 92.3356 31.66 92.4702 31.6869 92.4971C31.5796 92.7932 31.365 92.524 31.2309 92.5779C31.204 92.2818 31.2309 92.228 31.2577 92.1473C31.204 92.1203 31.0967 91.9051 31.0967 92.228V91.6628C30.9626 91.5552 30.8017 92.0934 30.7212 91.4206C30.7748 91.6628 30.8017 92.1742 30.7212 92.1473C30.5603 91.1515 30.5066 92.6048 30.292 92.0665C30.292 91.8243 30.3993 91.7705 30.3725 91.7436C30.2652 91.4745 30.2384 91.9589 30.2115 92.2818L30.1847 91.8781L29.8897 92.4702C29.7287 91.4745 29.5678 92.6586 29.5141 91.9051C29.38 91.8781 29.6751 92.3357 29.5141 92.4702C29.4337 92.0665 29.38 92.6855 29.3264 92.0396V91.9589L29.2191 92.0127V91.3668C29.1386 91.5283 29.1386 92.1742 29.1922 92.6586C29.0581 92.3087 28.9508 92.6048 28.8435 92.0396L28.8704 91.8781C28.6289 92.1742 28.2534 90.1558 28.1461 91.2592C28.1193 91.1784 28.0925 91.017 28.1461 91.017L27.9852 90.99L27.9583 90.5056L27.7706 91.2861L27.7438 90.9631C27.556 90.8555 27.2877 91.0439 27.0732 91.1784L27.1 91.017C26.9122 91.5552 26.8317 90.7209 26.6976 91.0977C26.6976 91.017 26.6976 90.9631 26.6976 90.9631L26.5367 90.99V90.6671C26.483 91.3937 26.0807 89.779 26.2416 90.3711C26.2148 90.694 26.1343 91.0708 26.1611 91.5014C26.0002 91.5552 26.0807 91.0708 25.9197 90.8017C25.7856 90.7747 25.8393 91.3399 25.6247 91.0708L25.5978 90.7478C25.5174 90.8017 25.4905 91.0439 25.3833 91.1246L25.4101 90.9631C25.3028 91.6628 25.0614 90.0212 25.0882 91.4745C24.9809 91.2053 24.8468 91.4475 24.7931 90.7747C24.6054 91.2322 24.4444 91.4475 24.2567 91.7436C24.0957 90.6671 24.203 91.8243 24.0152 91.2053L24.0957 91.7705C23.7738 91.8781 23.2642 90.4787 22.9423 90.7478L22.8618 90.1558V90.8017C22.4595 90.5594 21.9498 90.398 21.6279 90.4249C21.5743 90.7478 21.4938 91.4475 21.306 91.2592V91.1784C21.0646 91.5283 20.8232 91.8243 20.4745 91.5014C20.4745 91.2592 20.4208 91.0977 20.4477 90.9362C20.4477 91.5821 20.2867 90.99 20.2063 90.9631L20.3135 91.3937C20.2867 91.9589 20.099 91.4475 20.0185 91.017L19.938 91.6628C19.9112 91.609 19.9112 91.5283 19.8844 91.4206V91.7436L19.7234 90.99C19.6966 91.1515 19.5625 91.3668 19.5625 92.0934C19.5357 91.8512 19.3747 91.6628 19.4552 91.5014L18.9455 91.313L19.0528 91.5821C19.1333 92.1742 18.9992 92.5509 18.9187 92.2818C18.9724 91.7974 18.8382 91.4475 18.7578 91.0439C18.7309 91.3668 18.8651 91.5552 18.8651 91.8781C18.8114 92.2818 18.6773 92.4971 18.5968 92.228L18.6236 91.9858C18.5432 92.2011 18.3822 91.2053 18.2749 91.2592C18.2213 91.7436 18.114 91.313 18.2213 92.3087C18.0872 92.524 18.0872 91.6359 18.0335 91.5552C18.0067 92.0396 17.7921 91.7436 17.7116 91.2592C17.7653 92.7393 17.2824 90.7747 17.3629 92.0127L17.1752 91.3399C17.202 91.6628 17.2556 92.4164 17.1752 92.5509C17.041 92.2011 17.0142 91.6359 16.9606 91.2861L17.0142 92.524C16.3704 91.2592 15.7803 92.2011 15.1097 91.1784C14.8951 91.4475 14.6269 92.0396 14.305 91.9051L14.3318 91.7436L14.0099 91.4206L14.2782 91.9589C14.2245 92.0934 14.1977 92.3357 14.1441 92.3357C13.7954 91.8512 13.3125 91.2592 12.9638 91.9051C12.8297 93.3314 12.6956 90.6671 12.5346 91.7167C12.5346 91.5821 12.5346 91.3937 12.5346 91.2322C12.32 91.7167 12.1859 91.9858 11.9982 92.8201C11.9177 91.4206 11.8372 92.8739 11.8104 92.1203L11.8372 92.6855C11.7567 92.3356 11.6226 92.228 11.5958 91.8243L11.5421 92.5509L11.4885 91.9589C11.3276 91.932 11.0325 92.4164 10.8984 91.2322C10.5765 92.1473 9.98636 91.9051 9.50353 91.7167C9.47671 92.2011 9.34259 92.2549 9.2353 92.3087L9.10118 91.609C8.99388 91.8243 8.94023 92.7124 8.80611 92.2549C8.80611 92.1742 8.80611 92.1204 8.80611 92.0665C8.69882 92.2011 8.59152 91.8512 8.51105 92.4971C8.40376 92.4702 8.26964 92.0934 8.26964 91.4475C8.29646 92.6048 8.0014 91.2861 8.0014 91.2861C8.0014 91.2861 7.62586 91.1246 7.03574 90.99C6.47244 90.8286 5.69455 90.694 4.88983 90.7209C4.67524 90.7478 4.48747 90.7478 4.29971 90.7747C4.11194 90.8017 3.92417 90.8555 3.70958 90.9093C3.33405 91.0439 2.93169 91.2323 2.58298 91.5552C1.91238 92.1204 1.26861 93.0623 0.758958 94.5963C0.651662 95.1614 0.490719 95.5113 0.463895 96.1841C0.329776 96.3994 0.410248 95.3767 0.329776 95.9419C0.437072 96.3187 0.115185 97.3951 0.168833 98.1218L0.00788996 98.3909C-0.0457577 98.7946 0.195657 97.9334 0.0883615 98.6869L0.249305 97.6373C0.302952 97.7988 0.329776 98.041 0.302952 98.3909C0.410248 97.9872 0.624839 96.534 0.70531 97.1798L0.651662 97.2337C0.785782 97.2068 0.651662 97.9334 0.678486 98.0949H0.651662L0.70531 98.6331C0.651662 98.2563 0.410248 99.1175 0.490719 99.0637C0.624839 99.3866 0.463895 98.7946 0.598015 98.6869C0.678486 98.6331 0.598015 99.1983 0.571191 99.5212L0.70531 99.4943C0.651662 99.9787 0.624839 99.4674 0.624839 99.9787L0.866253 99.4674C0.785782 100.732 1.10767 98.8753 1.10767 100.059C0.946725 100.355 1.08084 100.49 1.0272 100.894L1.34908 100.84C1.37591 101.028 1.24179 101.217 1.29543 101.163C1.32226 101.513 1.42955 100.867 1.45638 100.867C1.45638 101.217 1.69779 100.867 1.64414 101.701C1.83191 102.266 1.80509 100.652 1.99286 101.136C1.99286 101.647 1.83191 101.244 1.88556 101.782C1.96603 101.728 2.0465 101.674 2.10015 101.593C2.07333 101.836 2.01968 102.401 1.93921 102.293C2.47568 102.966 2.7171 105.657 3.33405 104.984C3.3877 105.576 3.25358 105.388 3.19993 105.792C3.62911 105.011 3.76323 107.137 4.13876 107.057V106.572C4.62159 108.133 5.21172 107.191 5.77502 107.837L5.69455 107.487C5.77502 107.003 5.88231 106.949 5.98961 106.734C6.01643 106.976 5.93596 107.783 6.0969 107.595C6.07008 107.406 5.98961 107.245 6.01643 107.003C6.49926 108.295 7.51857 107.972 8.29646 108.564C9.31577 108.133 10.5228 109.075 11.4885 108.698C11.3276 108.752 11.3276 107.514 11.4617 107.783C11.9177 109.829 11.9713 107.406 12.4005 108.806C12.937 108.106 13.6076 109.882 14.0099 108.241L14.0636 108.833C14.1709 109.102 14.1441 108.698 14.2245 108.618V108.779C14.4391 108.994 14.6269 108.375 14.761 108.644L14.7074 107.972C14.8147 107.918 14.8147 108.483 14.8951 108.079L14.922 108.402L15.0024 107.756C15.0829 108.914 15.3511 107.81 15.4853 108.348C15.6194 108.133 15.8608 107.595 16.129 107.81C16.2363 108.402 16.5046 108.375 16.7191 108.644C17.041 108.456 17.5239 108.214 18.0067 108.402L17.9262 107.649L18.0335 107.595C18.0603 107.756 18.0603 107.837 18.0603 107.918C18.2213 108.752 18.3018 107.622 18.4359 108.16C18.3018 107.487 18.3554 108.052 18.2749 108.052C18.1408 107.703 18.1676 106.976 18.3286 107.326V107.487L18.3822 107.084C18.4359 107.676 18.5432 107.918 18.6236 108.51C18.9992 108.348 19.1601 107.299 19.5625 107.541C19.5893 108.187 19.8307 107.353 19.8575 108.483C20.0453 108.025 19.7234 107.568 19.7502 106.761C19.8039 106.761 19.8575 106.465 19.9112 106.868C19.9112 107.137 20.0453 107.541 19.9917 107.649L20.1258 107.541C20.1526 107.622 20.1258 107.783 20.1258 107.864C20.3672 107.191 20.7695 108.537 20.9841 107.864C20.9573 107.46 20.85 107.756 20.85 107.353C21.0378 106.491 21.1719 108.052 21.3865 107.46V108.025C21.4401 107.622 21.4133 107.137 21.6011 107.568C21.7084 108.241 21.5474 108.133 21.4938 108.429C21.6011 108.456 21.8157 108.241 21.6816 107.649C21.7889 107.406 21.8693 107.999 21.9498 108.187C21.923 108.025 21.7889 107.756 21.8425 107.433C22.0303 107.783 22.2717 107.756 22.4863 107.783C22.5131 107.945 22.5399 108.187 22.5399 108.268C22.674 107.46 22.8082 108.94 22.9959 108.752Z" fill="#FF7800"/>

                    <path d="M32.7875 104.258L32.707 104.15C32.7339 104.284 32.7339 104.473 32.707 104.634L32.7875 104.258Z" fill="#FF7800"/>

                    <path d="M28.3598 105.469C28.4134 105.307 28.3329 105.146 28.2793 104.984C28.3061 105.119 28.3329 105.28 28.3598 105.469Z" fill="#FF7800"/>

                    <path d="M34.6367 102.293C34.6367 102.347 34.6367 102.454 34.6367 102.589C34.6635 102.454 34.6635 102.374 34.6367 102.293Z" fill="#FF7800"/>

                    <path d="M40.2436 102.32C40.2436 102.293 40.2168 102.266 40.2168 102.212C40.2436 102.266 40.2436 102.293 40.2436 102.32Z" fill="#FF7800"/>

                    <path d="M39.8954 101.297C39.8686 101.297 39.8686 101.324 39.8418 101.405C39.8686 101.432 39.8686 101.378 39.8954 101.297Z" fill="#FF7800"/>

                    <path d="M33.2964 102.67C33.2695 102.697 33.2695 102.751 33.2695 102.885C33.2964 102.858 33.2964 102.778 33.2964 102.67Z" fill="#FF7800"/>

                    <path d="M39.7602 101.54L39.6797 101.486C39.6797 101.54 39.6797 101.567 39.6797 101.62L39.7602 101.54Z" fill="#FF7800"/>

                    <path d="M40.3514 102.401C40.3246 102.374 40.271 102.374 40.2441 102.32C40.2978 102.482 40.3246 102.482 40.3514 102.401Z" fill="#FF7800"/>

                    <path d="M36.6232 101.244C36.6232 101.271 36.6232 101.271 36.6232 101.244C36.6232 101.432 36.5964 101.567 36.6232 101.244Z" fill="#FF7800"/>

                    <path d="M40.6987 102.643C40.6987 102.67 40.6719 102.697 40.6719 102.778C40.6719 102.805 40.6987 102.831 40.7255 102.858C40.6987 102.751 40.6987 102.697 40.6987 102.643Z" fill="#FF7800"/>

                    <path d="M37.8834 102.186C37.8834 101.943 37.8834 101.782 37.8834 101.647C37.8566 101.647 37.8566 101.755 37.8834 102.186Z" fill="#FF7800"/>

                    <path d="M60.3359 64.6431C60.3896 64.5893 60.4432 64.5085 60.5237 64.4009C60.4164 64.5085 60.3628 64.5893 60.3359 64.6431Z" fill="#FF7800"/>

                    <path d="M57.5449 60.4177L57.679 60.3369C57.6254 60.3369 57.5986 60.3638 57.5449 60.4177Z" fill="#FF7800"/>

                    <path d="M62.2119 66.877C62.185 66.9039 62.185 66.9039 62.1582 66.9308C62.185 66.9577 62.2387 67.0115 62.2923 67.0923L62.2119 66.877Z" fill="#FF7800"/>

                    <path d="M50.5977 52.8822L50.6513 52.9092C50.6513 52.8822 50.6513 52.8553 50.5977 52.8822Z" fill="#FF7800"/>

                    <path d="M54.6214 57.5112C54.5409 57.592 54.4872 57.6189 54.4336 57.6458C54.4604 57.6727 54.4872 57.6727 54.6214 57.5112Z" fill="#FF7800"/>

                    <path d="M59.9857 73.1205L60.1466 72.7168C60.0393 72.8783 59.9588 73.0667 59.9857 73.1205Z" fill="#FF7800"/>

                    <path d="M63.3387 71.1021C63.285 71.129 63.2314 71.1828 63.1777 71.2366C63.2046 71.2097 63.2582 71.2366 63.3387 71.1021Z" fill="#FF7800"/>

                    <path d="M63.0977 71.2902C63.1245 71.2633 63.1513 71.2364 63.1781 71.2095C63.1513 71.2095 63.1245 71.2095 63.0977 71.2902Z" fill="#FF7800"/>

                    <path d="M18.785 33.5325C18.7046 33.4787 18.49 33.7209 18.2754 33.9093L18.785 33.5325Z" fill="#FF7800"/>

                    <path d="M43.3281 47.3655L43.4354 47.231C43.4086 47.2579 43.3549 47.3117 43.3281 47.3655Z" fill="#FF7800"/>

                    <path d="M16.801 36.7619V36.6543C16.7742 36.7081 16.801 36.735 16.801 36.7619Z" fill="#FF7800"/>

                    <path d="M58.0274 73.2549C57.7323 73.5778 57.8396 73.0396 57.625 73.3894C57.7323 73.3894 57.6786 73.7393 58.0274 73.2549Z" fill="#FF7800"/>

                    <path d="M16.8008 36.7618V36.8964C16.8276 36.8426 16.8544 36.7618 16.8813 36.708C16.8544 36.7349 16.8276 36.7618 16.8008 36.7618Z" fill="#FF7800"/>

                    <path d="M35.6562 41.6871C35.6831 41.6602 35.6831 41.6602 35.7099 41.6333L35.6562 41.6871Z" fill="#FF7800"/>

                    <path d="M35.6309 40.8257C35.6845 40.7988 35.7382 40.7988 35.7918 40.7719C35.765 40.6911 35.7113 40.745 35.6309 40.8257Z" fill="#FF7800"/>

                    <path d="M18.2755 33.9092L17.9805 34.1245C18.0609 34.0976 18.1682 34.0168 18.2755 33.9092Z" fill="#FF7800"/>

                    <path d="M30.748 38.1612C30.7749 38.1612 30.8017 38.1612 30.8285 38.1343C30.8017 38.1343 30.7749 38.1343 30.748 38.1612Z" fill="#FF7800"/>

                    <path d="M54.7827 57.9152C54.7827 57.9421 54.7827 57.9959 54.7559 58.0229C54.8363 57.9421 54.8632 57.8883 54.7827 57.9152Z" fill="#FF7800"/>

                    <path d="M45.6625 64.7507C45.6625 64.6431 45.4211 64.8315 45.1797 65.0737C45.2602 65.1006 45.3406 65.0468 45.6625 64.7507Z" fill="#FF7800"/>

                    <path d="M47.8086 67.6846L47.8358 67.6572C47.8086 67.6572 47.8086 67.6572 47.8086 67.6846Z" fill="#FF7800"/>

                    <path d="M47.1113 67.2533C47.1382 67.1726 47.165 67.1188 47.165 67.0649C47.1382 67.1457 47.1113 67.2264 47.1113 67.2533Z" fill="#FF7800"/>

                    <path d="M34.6647 62.6515C35.4158 62.8937 36.7302 62.7592 37.1862 63.405C37.8299 62.7861 38.0445 62.8937 38.3396 62.8668L37.6958 63.8356L38.0713 63.6473C37.9372 63.9702 37.8299 63.728 37.669 64.1855L38.1518 63.6473C37.9104 63.9971 38.4201 64.1586 37.6422 64.6699L38.2591 65.1274C38.3664 65.262 38.9029 64.4008 38.9029 64.7237C38.7419 65.0198 38.7151 64.8852 38.4737 65.2351C38.4469 66.2846 40.3246 63.7818 40.4587 64.5084L40.3246 64.6161C40.566 64.4277 40.7001 64.5354 40.7806 64.4008C41.3975 63.405 40.3246 64.8583 40.5928 64.2124C41.1829 63.405 41.0756 63.8895 41.5048 63.2705C41.3975 63.6473 41.773 63.2167 41.9072 63.2436C41.6926 63.8626 42.1754 63.6473 41.8267 64.3739C42.0681 64.1586 42.7387 63.432 42.8996 63.5127C42.5778 64.2393 42.4436 64.1048 42.4436 64.4546L42.7923 63.9971C42.8728 64.1586 42.7655 64.2662 42.6046 64.5084C42.7387 64.6161 43.1679 63.9433 43.1411 64.3739L42.7119 64.7507C42.9533 64.6699 42.9533 64.7776 43.1142 64.939C42.9265 65.2082 42.8728 65.1274 42.8728 65.0198C42.4705 65.7733 43.2484 64.8314 43.2484 64.939C43.3825 64.7237 43.3288 64.5354 43.7044 64.1317C43.7312 64.2662 44.3481 63.6203 43.9994 64.2393L43.5971 64.6161C44.0262 64.3739 44.1067 64.1048 44.1872 64.4277C44.1604 64.4546 44.0799 64.5892 43.9994 64.6699C44.5627 64.1586 44.3481 64.8314 44.5091 65.0198L44.375 65.1274C44.5627 65.0198 44.9114 64.643 44.9383 64.6968C45.0187 64.347 45.1528 64.2393 45.4479 63.7818C45.0455 64.6699 46.3063 63.0552 46.2258 63.6742C46.038 63.9433 45.743 64.2393 45.8771 63.8895C45.2333 64.6161 44.7505 65.2889 44.3481 65.558C44.5627 65.4504 44.7505 65.3965 44.5091 65.7195L45.0724 64.9929C45.1528 65.0198 45.1528 65.1005 45.2065 65.1274C45.5552 64.6699 45.6357 64.2931 45.9844 64.0509C46.3063 63.9164 45.5284 64.8583 45.7966 64.5354C46.199 64.3739 46.4404 63.8087 46.4672 64.1855C46.4136 64.2393 46.2794 64.347 46.3063 64.2662C46.2258 64.6699 46.7355 64.3739 46.1453 65.2889C45.9844 65.4773 45.7966 65.7464 45.7966 65.6388L45.9039 65.5042C45.287 66.0424 46.1453 65.4235 45.5284 66.177C45.8503 65.6926 45.9576 65.9348 45.9844 66.0963L46.3331 65.5311C47.7816 64.1048 45.5552 66.6076 45.9844 66.6076C46.4136 66.3654 46.0112 66.4192 46.4136 66.0963C46.4672 66.2847 46.1722 66.796 46.5209 66.6883C46.4136 66.9305 46.3063 67.3073 45.9039 67.9263C46.199 67.7648 46.038 68.4376 46.5209 67.8725C46.7086 67.2266 45.8771 68.3838 46.2258 67.4419L46.7086 66.8767C46.8427 67.0113 47.2451 66.8498 47.1915 67.1458C47.2451 67.0113 47.3524 66.8498 47.4597 66.7422C47.8352 66.6614 48.3181 66.1232 48.3985 66.4461C48.0498 67.0113 47.9962 66.8229 47.8621 66.8229C47.7011 67.3611 47.9693 66.9575 48.0766 67.2804C47.7548 67.7648 47.9693 67.1458 47.5938 67.6033L47.9425 67.6303C47.9157 67.6572 47.8889 67.6841 47.8621 67.7379C48.4522 66.9575 47.9962 67.9263 48.2912 67.7917C48.6131 68.0339 49.4178 66.9844 50.0616 66.473C49.9543 66.7152 49.8202 66.9305 49.6593 67.1189C49.8202 66.7152 49.6324 66.9844 49.4715 67.1728C49.6324 67.1728 49.1764 68.1416 48.8814 68.4107C49.2301 68.3031 49.1228 67.9532 49.391 67.7648L49.6056 67.9801C49.8738 67.5495 49.847 67.3881 50.1957 67.1728C50.3835 67.1458 50.3835 67.2535 50.4908 67.388C50.3298 67.5764 50.1153 68.0339 50.008 67.9532C49.9811 68.1685 50.0616 68.2492 50.3835 67.8725C50.4908 67.3881 50.8931 67.711 51.215 66.9844L51.1077 67.4688C51.0809 67.4419 50.8932 67.711 50.8932 67.5764C50.5176 68.2223 51.1346 67.4957 51.2419 67.4688C51.215 67.6303 51.3223 67.7917 51.1614 68.0339C51.3223 67.8994 51.3492 68.1147 51.1614 68.4376C51.3223 68.3569 51.4565 68.0339 51.6174 67.8456L51.832 68.0609C51.6174 68.4107 50.9736 69.3796 50.8395 69.4872C51.1614 69.245 51.5637 68.4915 51.6979 68.626C51.1614 69.245 51.5369 69.2719 50.8663 69.9985C50.5981 70.5368 50.8663 70.6982 51.1077 70.6175C51.5637 70.1331 51.1882 70.2138 51.5637 69.6756C52.0734 69.7294 53.1195 68.2492 53.2 68.6798L53.2268 68.4915C53.6024 68.3031 53.5487 68.3569 53.9511 67.9532C53.4414 68.5991 52.9049 69.8909 53.2537 69.9447C53.5219 69.6218 53.5487 69.1912 53.9511 68.6798L54.1925 68.7067C54.1657 68.7606 54.0852 68.8682 53.9779 68.949C54.2998 68.8144 53.6828 70.0524 54.273 69.2719L53.7633 70.3753L53.9779 69.9178C54.2193 69.5948 54.4875 69.6218 54.5948 69.5141C55.024 69.2719 54.8899 69.5948 54.7021 70.1062C54.8631 69.8101 55.2118 69.1104 55.4264 69.1104C54.6753 70.2138 55.4532 69.7294 55.0508 70.2946C55.1313 70.3215 54.9972 70.7252 55.3191 70.2946L54.8363 70.9674C55.5069 70.0254 55.6678 70.2138 55.9629 70.16C55.0509 71.4249 56.2043 70.1869 55.48 71.4249C56.097 70.5637 56.0165 71.2634 56.553 70.5368C56.7139 70.5906 56.1506 71.398 55.9897 71.694L56.2579 71.398C56.0433 71.8555 56.2579 72.0708 56.2043 72.4745L56.848 71.7747L56.6603 72.1515C56.8212 71.9631 57.009 71.9362 57.1163 71.5864L57.1699 71.694C57.7332 70.8328 57.4382 71.5325 57.8137 71.2634C57.7601 71.4249 57.5991 71.6133 57.5186 71.7209C57.5723 71.7747 57.2772 72.2053 57.1163 72.5014C57.2236 72.2592 58.377 71.1288 58.4575 70.6175C58.6721 70.2677 58.9671 70.0793 58.9135 70.2677L58.4575 71.075L59.0744 70.3215C59.2622 70.2946 58.994 70.8059 59.0208 70.9674C58.8867 70.9674 57.8405 72.313 58.0819 72.4475C57.8942 72.4745 57.5455 72.8512 57.3845 72.9589C57.4113 73.0127 57.3845 73.1203 57.0895 73.3895C57.4382 73.2818 57.465 72.9589 57.7064 72.9858C57.2504 73.6586 57.1431 73.9277 57.1699 74.2776L57.3845 73.6855C57.4382 73.6048 57.4918 73.5509 57.5186 73.524C57.5186 73.4164 57.5723 73.3087 57.7332 73.0396C57.7601 73.0665 58.5111 72.313 58.2697 72.7705C58.7794 71.5594 59.1281 72.1515 59.45 71.4249C59.6109 71.2365 59.745 71.2903 59.5573 71.6402C59.0744 72.0708 59.1549 72.5014 58.833 72.9858C59.0208 72.8243 59.0476 72.3937 59.289 72.1784C59.4231 72.1784 59.2085 72.6628 59.1281 72.905L58.994 73.0127L58.9403 73.4164C59.1817 73.0934 59.1817 72.7436 59.4231 72.6359C59.3695 72.7974 59.6109 72.7167 59.4231 72.9858C59.0476 73.4164 58.6989 74.0892 58.5111 74.143C58.6452 74.143 58.994 74.2776 59.289 73.524L59.3963 73.6317C59.5036 73.2818 59.6645 72.6359 59.9328 72.6898L59.8523 72.8243L60.3351 72.3937L60.1742 72.7974C60.2815 72.609 60.4156 72.4745 60.4693 72.5283C60.362 72.7436 60.362 72.8781 60.1742 73.1473C60.362 73.228 60.5766 72.8512 60.7375 72.6628C60.8716 72.6628 60.818 72.8512 60.4961 73.228C60.5766 73.4164 60.8448 73.4702 60.7107 73.8739C61.0862 73.6586 60.7643 73.7124 61.1667 73.2818C60.5497 74.6005 61.4617 74.1161 61.8373 74.143C62.4006 73.0127 61.9982 74.0623 62.642 73.1203C62.3738 73.4164 62.4274 74.1161 61.9714 74.2776L62.186 74.2507C61.9446 74.9235 61.6495 74.5467 61.3276 75.4617C61.5422 75.5424 62.3469 74.4121 62.3201 74.9504C61.8105 75.677 62.642 74.7889 62.0787 75.5963C61.8641 75.8385 61.8641 75.7308 61.7568 75.7577L61.7032 75.9192C61.9714 76.3767 62.3469 75.0849 62.8566 74.6813C63.1517 74.7351 62.6956 75.4079 62.5079 75.7847C62.4542 75.9461 62.642 75.9192 62.8298 75.7577C62.4006 76.1345 62.8298 75.1118 63.1785 74.6543C62.7761 75.5963 63.5004 74.9504 63.7418 74.6274C63.9295 73.4971 63.5272 74.439 63.7954 73.2549C63.5808 73.4971 63.1517 74.3045 63.1517 73.8739C63.5004 73.5509 63.3931 73.4164 63.4467 73.2818C63.2053 73.7662 63.2053 73.3895 63.0444 73.5509C63.2053 73.1473 63.7686 72.5821 63.6881 72.2861L63.0175 73.3356C63.0444 73.1203 63.5004 72.5821 63.2053 72.7436C63.6077 72.2322 63.6881 71.8555 64.01 71.8286C64.3051 70.779 63.3394 72.0977 62.9102 72.3668C62.9639 72.313 63.0444 72.1784 63.1248 72.1246C62.9102 72.3668 62.8566 72.313 62.7493 72.3399C62.7761 72.0169 63.1517 71.9362 63.2858 71.6133L63.0712 71.5056C63.098 71.4787 63.098 71.4518 63.1248 71.4249C62.9907 71.5325 62.8834 71.6133 63.0175 71.3172C63.2858 71.0212 63.5272 70.6713 63.7418 70.4291L63.0712 71.0212C63.3126 70.6982 63.2589 70.3215 63.5808 70.16C63.4467 70.16 63.3126 70.1331 63.1785 70.1062L63.5808 69.3795C63.4199 69.4603 63.3394 69.5949 63.3662 69.7294C63.3662 69.4872 62.1323 70.6713 63.0444 69.2988C62.4274 69.7294 62.5079 69.4334 61.9714 69.5949C62.6152 69.0835 62.2396 68.5991 62.6688 68.4645C62.7225 68.0609 62.2128 68.8144 62.025 68.8682C62.1055 68.4914 62.5883 67.8456 62.8834 67.6572L62.5615 67.8994L62.642 67.7648L62.2665 68.0878C62.4006 67.6303 62.6956 67.3611 62.642 67.1997L62.2128 67.7917L62.3738 67.388C62.2128 67.6841 62.0787 67.7648 61.9446 67.7648L62.025 67.6303L61.8373 67.6841C62.186 67.3881 61.8373 67.4957 62.1592 67.0651C62.0787 66.9844 62.0787 66.9844 61.8373 66.9844L61.5959 67.415C61.1399 67.6303 61.9982 66.7691 61.8373 66.6345L61.5422 67.1189C61.8373 66.1232 60.818 67.2804 60.9789 66.6345C61.1667 66.5807 61.5154 66.0155 61.4081 66.1501C61.1399 66.2308 60.9521 65.9079 60.3888 66.3923C60.7912 65.6388 60.9253 65.4235 60.9521 64.9929C60.7912 64.939 60.7375 64.9929 60.4156 65.3965C60.4693 65.0467 59.9864 65.2889 60.3083 64.7776C60.0133 65.1543 60.2547 64.6161 59.9596 64.9121L60.0937 64.6968L59.7718 65.1813C60.2815 63.9433 58.994 65.558 59.4231 64.4546L59.5573 64.347L59.3427 64.4815C59.4768 64.2662 59.5841 64.1586 59.7718 63.8895L59.4231 63.5127L59.2622 63.9433C59.1281 63.9433 58.7525 64.347 58.8598 63.9971C59.5036 63.405 58.7525 63.8626 59.1013 63.2974L59.3158 63.1628C59.1549 63.109 59.1549 63.109 58.833 63.6203C58.5648 63.6742 59.3427 62.6246 58.8598 63.0552L58.9403 63.1628C58.7794 63.4589 58.4307 63.8087 58.377 63.7549C58.4038 63.6742 58.5111 63.432 58.5916 63.405C58.3502 63.5127 58.3234 63.1359 58.1356 63.2705C58.1624 63.0821 58.4307 62.7592 58.5379 62.6515C57.9746 62.8937 58.4843 62.4631 57.921 62.7053L58.1088 62.4362L57.7869 62.7053L58.0551 62.0325L57.8674 62.4093C57.7332 62.4093 57.5723 62.5439 57.5723 62.3286L57.8942 61.9518C57.4918 62.0056 58.0819 61.0637 57.4382 61.4674C57.465 61.3866 57.5991 61.279 57.6528 61.2252C57.009 61.7096 57.9746 60.3909 57.2236 61.0099C57.3309 60.8753 57.4113 60.6869 57.5186 60.5793L57.2504 60.7677L57.6259 60.2294L56.9822 60.983L57.3041 60.3909L57.0895 60.6331C57.7064 59.5028 57.009 60.2025 57.4113 59.3144L56.9553 60.0141C55.6142 61.1713 56.6603 58.6147 55.7751 58.9645L56.1506 58.4263L55.5337 58.9376C55.7214 58.4263 55.9092 58.507 56.0702 58.211C55.6678 58.3725 55.4264 58.9645 55.1045 58.9376C55.2386 58.4801 55.4264 58.5609 55.6142 58.3994C55.2118 58.507 54.7021 58.5878 54.7558 58.1841C54.7021 58.2648 54.6217 58.3456 54.6217 58.3725C54.2998 58.507 54.2998 58.1303 54.112 58.0495C54.2998 57.8073 54.3534 57.7804 54.4339 57.7804C54.4071 57.6997 54.4339 57.4844 54.2193 57.6997L54.5948 57.2691C54.5412 57.0807 54.0047 57.3498 54.3803 56.7847C54.2461 56.9999 53.9511 57.4036 53.8706 57.296C54.3803 56.4348 53.3341 57.4305 53.4951 56.8654C53.656 56.677 53.817 56.7308 53.7901 56.7039C53.8706 56.4348 53.5219 56.7577 53.2537 56.973L53.5219 56.6501L52.7976 56.8385C53.3073 55.9773 52.3416 56.7039 52.7976 56.1118C52.6904 55.9773 52.6635 56.5694 52.4221 56.5424C52.6099 56.1657 52.1539 56.5963 52.5294 56.058L52.5831 56.0042L52.4221 55.9504L52.8781 55.466C52.6904 55.4929 52.2343 55.9773 51.9661 56.381C52.0734 56.0042 51.7515 56.1657 52.0466 55.6274L52.1807 55.5198C51.7515 55.5198 52.744 53.7167 51.8856 54.4702C51.9125 54.3895 52.0198 54.2549 52.0466 54.2818L51.8856 54.1203L52.2075 53.7436L51.4833 54.1473L51.671 53.8781C51.5637 53.6359 51.1614 53.5552 50.8663 53.4745L51.0004 53.3668C50.4371 53.5821 50.92 52.9362 50.5176 53.0708C50.5713 53.0169 50.5981 52.99 50.6249 52.9631L50.4371 52.8555L50.6517 52.6133C50.1153 53.0977 50.8127 51.5906 50.5444 52.1288C50.303 52.3441 49.9543 52.5594 49.6861 52.8555C49.4715 52.7478 49.8738 52.4787 49.9275 52.1558C49.8202 52.0212 49.4447 52.4787 49.4447 52.1019L49.6324 51.8328C49.4983 51.8059 49.3105 51.9674 49.1764 51.9135L49.3105 51.8059C48.7204 52.2365 49.6324 50.8371 48.6399 51.8866C48.7204 51.6175 48.4254 51.6713 48.8277 51.1331C48.3181 51.2946 48.023 51.3215 47.6206 51.3753C48.2108 50.4603 47.5402 51.4022 47.7279 50.7832L47.406 51.2677C47.0037 51.0793 47.4329 49.626 46.9232 49.5184L47.2451 49.0339L46.7891 49.4914C46.5209 48.9801 46.1185 48.388 45.7966 48.1458C45.5016 48.3073 44.9383 48.7648 44.8846 48.4688L44.9383 48.415C44.4554 48.4688 43.9726 48.4419 43.8385 47.9305C43.9994 47.7422 44.0799 47.5807 44.1872 47.473C43.7312 47.9305 43.9726 47.3654 43.9189 47.2846L43.758 47.6883C43.3556 48.0651 43.5166 47.5538 43.7312 47.1501L43.2215 47.5538C43.2484 47.4999 43.2752 47.4192 43.3288 47.3385L43.1142 47.5807L43.4898 46.9079C43.3556 47.0155 43.0606 47.0424 42.5778 47.5807C42.7119 47.3654 42.6851 47.0963 42.8728 47.0694L42.4705 46.5042L42.39 46.8002C42.0681 47.2846 41.6926 47.473 41.7462 47.177C42.1218 46.881 42.229 46.5042 42.4436 46.1274C42.1754 46.3427 42.2022 46.5849 41.9876 46.8271C41.6657 47.0694 41.3707 47.0963 41.4512 46.8541L41.6389 46.6926C41.3975 46.7733 41.9072 45.9121 41.773 45.8583C41.3975 46.1543 41.5585 45.7507 40.9951 46.5849C40.7269 46.6388 41.317 45.9929 41.3439 45.8583C40.9952 46.1812 40.9415 45.7776 41.2097 45.347C40.2709 46.4773 41.0756 44.5934 40.3246 45.5892L40.5928 44.9164C40.405 45.1855 39.949 45.7776 39.7613 45.8045C39.8685 45.4277 40.2173 44.9971 40.3782 44.7011L39.6003 45.643C39.7881 44.1628 38.5005 44.3243 38.5005 42.9787C38.0713 42.9787 37.3739 43.194 37.1325 42.8172L37.2666 42.7096L37.1325 42.1982L37.052 42.8441C36.8911 42.898 36.7033 43.0594 36.6497 43.0056C36.5692 42.3328 36.4619 41.4716 35.6304 41.66C34.5306 42.6019 36.1669 40.5028 35.2817 41.1487C35.389 41.0679 35.4963 40.9065 35.6036 40.7988C35.0403 40.9603 34.7184 41.0679 33.9673 41.5254C34.7988 40.3951 33.7527 41.4178 34.2087 40.8257L33.86 41.2832C33.9941 40.9603 33.9137 40.745 34.1551 40.422L33.6186 40.9065L33.9405 40.422C33.7795 40.2606 33.1358 40.3951 33.7259 39.3456C32.787 39.7492 32.2506 39.0495 31.8214 38.4844C31.4727 38.8342 31.2849 38.7535 31.124 38.6997L31.3922 38.0269C31.1508 38.1076 30.507 38.7535 30.6411 38.296C30.6948 38.2422 30.7216 38.1883 30.7484 38.1614C30.5338 38.1883 30.6143 37.7847 30.1315 38.2422C29.9974 38.1076 30.0778 37.7039 30.4802 37.2195C29.8096 38.1614 30.2656 36.8696 30.2656 36.8696C30.2656 36.8696 29.8901 36.4121 29.2731 35.7662C28.6562 35.1203 27.7173 34.313 26.6176 33.6402C25.5446 32.9674 24.2034 32.4022 22.8622 32.2677C22.2185 32.2138 21.4674 32.2407 20.77 32.4291C20.0725 32.6175 19.4019 32.9674 18.7582 33.5056C18.4095 33.9631 18.0339 34.1784 17.7657 34.7974C17.5243 34.905 17.9535 33.99 17.6316 34.4745C17.6316 34.932 16.8537 35.7393 16.6659 36.466L16.4781 36.5198C16.2636 36.8696 16.8537 36.2237 16.4781 36.8427L17.0414 35.9277C17.0683 36.1161 16.9878 36.3583 16.8537 36.6813C17.1487 36.3583 17.9266 35.1473 17.8193 35.8201L17.7389 35.847C17.9266 35.9277 17.4975 36.4929 17.4438 36.6813L17.417 36.6543L17.2829 37.1926C17.3633 36.8158 16.7464 37.4617 16.8537 37.4617C16.9073 37.8385 16.9342 37.1926 17.1487 37.1926C17.2829 37.1926 16.961 37.677 16.7732 37.973L16.961 38.0269C16.6927 38.4575 16.8537 37.9461 16.6659 38.4305L17.1487 38.1076C16.5586 39.211 17.6852 37.7308 17.1756 38.8073C16.8805 38.9688 16.961 39.1841 16.7464 39.507L17.1487 39.6685C17.0951 39.83 16.8537 39.9376 16.9342 39.9107C16.8269 40.2606 17.2024 39.7223 17.2292 39.7492C17.0683 40.0722 17.4975 39.9107 17.0683 40.6104C17.0146 41.2294 17.7389 39.7761 17.712 40.3413C17.4706 40.7988 17.4706 40.3144 17.2829 40.8257H17.6047C17.4438 41.0141 17.1219 41.4985 17.0951 41.3371C17.3902 42.3059 16.2904 44.7818 17.2024 44.5665C16.961 45.1317 16.9342 44.8626 16.6659 45.1586C17.4975 44.7549 16.5318 46.6388 16.9073 46.8002L17.1756 46.3965C16.8269 48.0113 17.8998 47.6345 18.0876 48.5226L18.2217 48.1997C18.5704 47.8498 18.7045 47.9036 18.9191 47.7691C18.785 47.9844 18.2753 48.6033 18.5436 48.5495C18.5972 48.388 18.6509 48.1728 18.8118 47.9844C18.5704 49.3569 19.7238 49.7875 20.153 50.8371C21.4137 51.2407 22.0039 52.8286 23.2109 53.2861C23.0232 53.2053 23.8011 52.2365 23.7474 52.5594C22.889 54.4971 24.4985 52.6671 24.0157 54.0665C25.0081 53.932 24.4985 55.7889 25.9738 54.8739L25.6519 55.3583C25.5714 55.6274 25.8397 55.3314 25.947 55.3314L25.8397 55.466C25.9201 55.7889 26.5103 55.4929 26.4566 55.7889L26.8322 55.2507C26.9931 55.3045 26.5907 55.7082 26.9395 55.4929L26.7517 55.762L27.2613 55.3583C26.5907 56.3002 27.5564 55.6813 27.3418 56.1657C27.61 56.1118 28.2002 55.9235 28.3075 56.2733C28.0124 56.7847 28.3075 56.9999 28.3343 57.3767C28.7903 57.5113 29.4341 57.7266 29.7828 58.2379L30.212 57.6189L30.3729 57.6728C30.2656 57.8073 30.2388 57.8881 30.1851 57.9419C29.7828 58.6954 30.6143 57.9419 30.3997 58.4263C30.7216 57.8342 30.3729 58.2917 30.3193 58.211C30.4266 57.8342 30.9362 57.3229 30.8557 57.7266L30.7484 57.8611L31.0703 57.6189C30.7484 58.1033 30.668 58.3994 30.3461 58.8569C30.8289 59.0184 31.6873 58.3994 31.9287 58.9376C31.4995 59.449 32.331 59.0184 31.58 59.8796C32.0896 59.7181 32.0628 59.0991 32.6529 58.5339C32.7066 58.5878 32.9748 58.3994 32.7334 58.7492C32.5456 58.9376 32.3847 59.3413 32.2774 59.3951L32.492 59.449C32.4652 59.5297 32.331 59.6373 32.2774 59.6912C33.0016 59.3951 32.4383 60.7407 33.1358 60.4178C33.404 60.0948 33.0821 60.2294 33.3504 59.9065C34.1282 59.449 33.1894 60.7138 33.8332 60.4178L33.4576 60.8484C33.7795 60.6062 34.1014 60.2294 33.9941 60.7138C33.6186 61.279 33.5381 61.0637 33.2967 61.279C33.3772 61.3866 33.7527 61.4135 34.0209 60.8753C34.2624 60.7946 33.9673 61.3059 33.9405 61.4943C34.0478 61.3597 34.0746 61.0368 34.3428 60.8484C34.2892 61.279 34.5574 61.4405 34.7452 61.6558C34.6379 61.7903 34.5306 62.0056 34.4501 62.0594C35.2012 61.4405 34.3428 62.6246 34.6647 62.6515Z" fill="#FF7800"/>

                    <path d="M47.835 67.8186L47.8082 67.6841C47.7277 67.8186 47.6204 67.9532 47.4863 68.0609L47.835 67.8186Z" fill="#FF7800"/>

                    <path d="M44.0267 64.6162C43.973 64.6431 43.9462 64.6969 43.8926 64.7508C43.9462 64.7239 43.9999 64.67 44.0267 64.6162Z" fill="#FF7800"/>

                    <path d="M42.3906 64.8852C42.5516 64.8044 42.5784 64.6161 42.6589 64.4546C42.5784 64.5622 42.4711 64.6968 42.3906 64.8852Z" fill="#FF7800"/>

                    <path d="M51.135 67.98C51.0814 68.0338 51.0277 68.0876 50.9473 68.1953C51.0277 68.1145 51.0814 68.0338 51.135 67.98Z" fill="#FF7800"/>

                    <path d="M57.5189 71.6669C57.4921 71.64 57.4652 71.6669 57.3848 71.6938C57.4116 71.7476 57.4652 71.7207 57.5189 71.6669Z" fill="#FF7800"/>

                    <path d="M49.4456 67.0918C49.4188 67.0918 49.3651 67.1187 49.2578 67.2264C49.3115 67.2533 49.3919 67.1725 49.4456 67.0918Z" fill="#FF7800"/>

                    <path d="M57.2513 71.7478L57.1977 71.6401C57.1708 71.667 57.144 71.694 57.1172 71.7478H57.2513Z" fill="#FF7800"/>

                    <path d="M57.3846 72.9051C57.3578 72.8512 57.3042 72.8243 57.3042 72.7705C57.2505 72.9589 57.2773 72.9858 57.3846 72.9051Z" fill="#FF7800"/>

                    <path d="M53.9502 68.895C53.8161 69.0296 53.7088 69.0834 53.9502 68.895Z" fill="#FF7800"/>

                    <path d="M56.2044 72.4473V72.4204L56.0703 72.555L56.2044 72.4473Z" fill="#FF7800"/>

                    <path d="M57.6268 73.3896C57.6 73.3896 57.5732 73.4166 57.5195 73.4704C57.5195 73.4973 57.5195 73.5242 57.5195 73.578C57.5732 73.4973 57.6 73.4435 57.6268 73.3896Z" fill="#FF7800"/>

                    <path d="M54.7285 70.6713C54.8895 70.4829 54.9968 70.3484 55.0772 70.2407C55.0236 70.2407 54.9431 70.3215 54.7285 70.6713Z" fill="#FF7800"/>

                    <path d="M96.9492 50.0295H97.1102C97.0833 50.0026 97.0297 50.0295 96.9492 50.0295Z" fill="#FF7800"/>

                    <path d="M97.3793 58.749C97.3525 58.749 97.3257 58.749 97.2988 58.7759C97.2988 58.8298 97.2988 58.8836 97.3256 58.9912L97.3793 58.749Z" fill="#FF7800"/>

                    <path d="M94.9375 38.9688L94.9643 39.0226C94.9643 38.9957 94.9911 38.9688 94.9375 38.9688Z" fill="#FF7800"/>

                    <path d="M95.9841 45.5889C95.85 45.6158 95.7964 45.5889 95.7695 45.5889C95.7695 45.6158 95.7964 45.6427 95.9841 45.5889Z" fill="#FF7800"/>

                    <path d="M91.9336 62.5708L92.3091 62.3286C92.1214 62.4093 91.9604 62.4901 91.9336 62.5708Z" fill="#FF7800"/>

                    <path d="M95.8767 63.1089C95.823 63.1089 95.7426 63.1089 95.6621 63.082C95.6889 63.1089 95.7158 63.1628 95.8767 63.1089Z" fill="#FF7800"/>

                    <path d="M95.5547 63.0818C95.5815 63.0818 95.6352 63.0818 95.662 63.0818C95.662 63.0818 95.6352 63.0549 95.5547 63.0818Z" fill="#FF7800"/>

                    <path d="M77.5832 2.71793C77.5564 2.6372 77.2345 2.69102 76.9395 2.71793H77.5832Z" fill="#FF7800"/>

                    <path d="M91.4512 29.5763L91.6121 29.5225C91.5585 29.5225 91.478 29.5494 91.4512 29.5763Z" fill="#FF7800"/>

                    <path d="M74.0684 4.11741L74.122 4.00977C74.0684 4.0905 74.0684 4.11741 74.0684 4.11741Z" fill="#FF7800"/>

                    <path d="M90.2442 61.4404C89.815 61.5211 90.2173 61.1443 89.8418 61.3058C89.9491 61.3596 89.6809 61.6019 90.2442 61.4404Z" fill="#FF7800"/>

                    <path d="M75.7587 33.7208L75.7051 33.667C75.7051 33.6939 75.7319 33.7208 75.7587 33.7208Z" fill="#FF7800"/>

                    <path d="M74.0693 4.11719L74.0156 4.22484C74.0693 4.19792 74.1497 4.1441 74.2034 4.11719C74.1229 4.1441 74.0961 4.1441 74.0693 4.11719Z" fill="#FF7800"/>

                    <path d="M88.0703 19.0805C88.124 19.1075 88.1776 19.1075 88.2313 19.1344C88.2581 19.0536 88.1776 19.0536 88.0703 19.0805Z" fill="#FF7800"/>

                    <path d="M76.9654 2.71777H76.5898C76.6703 2.7716 76.8044 2.74469 76.9654 2.71777Z" fill="#FF7800"/>

                    <path d="M85.2012 13.8324C85.228 13.8324 85.228 13.8593 85.2816 13.8593C85.2548 13.8324 85.2548 13.8055 85.2012 13.8324Z" fill="#FF7800"/>

                    <path d="M95.9027 46.0732C95.8759 46.1002 95.8491 46.1271 95.8223 46.154C95.9296 46.1271 96.01 46.0732 95.9027 46.0732Z" fill="#FF7800"/>

                    <path d="M84.4227 46.4504C84.4763 46.3427 84.1544 46.3697 83.8594 46.4504C83.8862 46.5042 83.9935 46.5311 84.4227 46.4504Z" fill="#FF7800"/>

                    <path d="M83.8862 45.9121C83.8862 45.939 83.8594 45.939 83.8594 45.9659C83.8862 45.939 83.8862 45.939 83.8862 45.9121Z" fill="#FF7800"/>

                    <path d="M84.3164 49.5183C84.3969 49.4645 84.4505 49.4376 84.4774 49.3838C84.3969 49.4376 84.3432 49.4914 84.3164 49.5183Z" fill="#FF7800"/>

                    <path d="M76.0271 37.9462C76.5635 38.619 77.7706 39.2649 77.8243 40.1261C78.7094 39.9646 78.8167 40.1799 79.1118 40.3683L78.0388 40.8258L78.468 40.8796C78.173 41.0949 78.1998 40.7989 77.8511 41.1219L78.5485 40.9335C78.173 41.0949 78.4949 41.5525 77.5828 41.5255L77.8779 42.306C77.9047 42.4944 78.8167 42.0369 78.629 42.3329C78.3339 42.4944 78.3875 42.3598 78.012 42.5213C77.4487 43.4094 80.3725 42.3329 80.1043 43.0595H79.9433C80.2652 43.0326 80.292 43.221 80.453 43.1672C81.5259 42.6559 79.836 43.3017 80.3993 42.8981C81.3114 42.5482 80.9895 42.8981 81.6601 42.602C81.365 42.8712 81.9283 42.7366 82.0356 42.8173C81.5259 43.221 82.0624 43.3287 81.3918 43.7593C81.7137 43.7323 82.6525 43.4632 82.7867 43.6516C82.1161 44.0822 82.0892 43.8938 81.9015 44.1898L82.438 44.0015C82.4111 44.1898 82.2502 44.2168 82.0088 44.3244C82.0624 44.5128 82.7867 44.1629 82.5453 44.5128L81.982 44.5935C82.2502 44.6743 82.1697 44.755 82.2234 44.9972C81.9283 45.1049 81.9015 45.0241 81.9551 44.9165C81.2041 45.3471 82.3843 44.9703 82.3038 45.078C82.5184 44.9703 82.5721 44.7819 83.1354 44.6474C83.0817 44.7819 83.9401 44.5935 83.35 44.9165L82.7867 44.9972C83.2963 45.051 83.5109 44.8627 83.4036 45.1856C83.35 45.1856 83.2158 45.2394 83.1085 45.2932C83.8596 45.1856 83.3231 45.6431 83.3768 45.9122H83.2158C83.4304 45.9391 83.9401 45.8046 83.9133 45.8584C84.1547 45.5893 84.3424 45.5624 84.8521 45.3471C84.0474 45.8853 85.9787 45.2125 85.5763 45.7238C85.2813 45.8315 84.8789 45.9122 85.174 45.6969C84.2352 45.9661 83.4573 46.2352 82.9744 46.2352C83.2158 46.2621 83.4036 46.3428 83.0013 46.4774L83.8596 46.1814C83.9133 46.2352 83.8864 46.3159 83.8864 46.3697C84.4229 46.1814 84.6912 45.8853 85.1203 45.9122C85.469 45.993 84.2888 46.3428 84.6912 46.2352C85.1203 46.3428 85.63 45.9661 85.4422 46.3159C85.3618 46.3159 85.2008 46.3428 85.2813 46.289C85.013 46.585 85.6032 46.6389 84.6107 47.0964C84.3693 47.1502 84.0742 47.2848 84.1279 47.1771L84.2888 47.1233C83.4841 47.2309 84.557 47.204 83.6182 47.5C84.1547 47.2578 84.1279 47.5539 84.0742 47.7153L84.6912 47.4462C86.6761 47.0695 83.4573 47.9037 83.8328 48.1729C84.3424 48.2267 83.9669 48.0114 84.4497 47.9845C84.3961 48.1729 83.8596 48.442 84.2352 48.5765C84.0206 48.738 83.7255 48.9802 83.0281 49.2763C83.35 49.3032 82.8671 49.8145 83.5914 49.6261C84.0742 49.1686 82.7867 49.6799 83.5646 49.061L84.262 48.8726C84.2888 49.061 84.7448 49.1686 84.5302 49.4108C84.6643 49.3301 84.8253 49.2493 84.9862 49.2224C85.3349 49.3839 86.0592 49.1955 85.9519 49.5454C85.3349 49.8145 85.3886 49.6261 85.3081 49.5454C84.8789 49.8952 85.3349 49.7338 85.2276 50.0836C84.6912 50.2989 85.2008 49.8952 84.6375 50.0836L84.9326 50.2989C84.9058 50.2989 84.8521 50.3258 84.8253 50.3527C85.7373 50.0298 84.8253 50.5949 85.174 50.6757C85.3349 51.0794 86.5688 50.6757 87.4004 50.6219C87.1858 50.7833 86.9444 50.891 86.703 50.9448C87.0785 50.6757 86.7566 50.8372 86.5152 50.891C86.6761 50.9986 85.7373 51.5369 85.3349 51.6176C85.6836 51.7253 85.7909 51.3485 86.1128 51.3754L86.1665 51.6983C86.6225 51.4831 86.6761 51.3216 87.1053 51.3485C87.2931 51.4292 87.2126 51.5369 87.2394 51.7253C86.998 51.7791 86.542 52.0482 86.542 51.9136C86.4079 52.0751 86.4347 52.2097 86.8907 52.0751C87.2394 51.7253 87.4004 52.2366 88.071 51.806L87.7223 52.1559C87.7223 52.102 87.4004 52.2366 87.4808 52.1289C86.7834 52.4519 87.7491 52.2097 87.8295 52.2366C87.7223 52.3442 87.7223 52.5595 87.454 52.6672C87.6686 52.6403 87.5613 52.8556 87.2126 53.017C87.3735 53.044 87.6686 52.8556 87.91 52.7748L87.9637 53.0978C87.5881 53.2593 86.5152 53.7168 86.3274 53.7168C86.7298 53.6899 87.5077 53.3131 87.5345 53.5015C86.7298 53.6899 87.0517 53.959 86.086 54.1743C85.5763 54.4972 85.7105 54.7663 85.9519 54.8471C86.5957 54.7125 86.2201 54.551 86.8371 54.3088C87.2126 54.6587 88.9293 54.0397 88.7684 54.4703L88.9025 54.3088C89.3317 54.3627 89.2512 54.3896 89.8145 54.3088C89.0366 54.551 87.8564 55.3315 88.1514 55.6006C88.5538 55.4661 88.822 55.1431 89.439 54.9547L89.6267 55.1431C89.5731 55.17 89.439 55.1969 89.3317 55.2238C89.6804 55.3046 88.4733 55.9774 89.3853 55.6813L88.3392 56.3272L88.7952 56.0581C89.1707 55.9505 89.3853 56.1119 89.5463 56.1119C90.0559 56.1658 89.7609 56.3811 89.3049 56.704C89.5999 56.5425 90.2973 56.1658 90.4583 56.3003C89.2244 56.7847 90.1364 56.8386 89.4926 57.0808C89.5463 57.1346 89.1976 57.4306 89.7072 57.2423L88.9293 57.5383C90.0023 57.1346 90.0559 57.4306 90.3242 57.5383C88.8489 58.0496 90.5119 57.7267 89.2244 58.3187C90.2437 57.9689 89.7609 58.534 90.6192 58.238C90.7265 58.3726 89.7877 58.7224 89.4926 58.8839L89.895 58.8032C89.4658 59.0723 89.4926 59.3683 89.2512 59.6644L90.1901 59.476L89.8145 59.6913C90.0559 59.6374 90.2169 59.7182 90.5119 59.5029L90.4851 59.6105C91.4508 59.2607 90.807 59.6374 91.263 59.6374C91.1289 59.7451 90.8875 59.8258 90.7533 59.8258C90.7802 59.9066 90.2705 60.068 89.9755 60.2295C90.19 60.068 91.7995 59.8797 92.1482 59.476C92.5237 59.3145 92.8724 59.3414 92.7383 59.476L91.9068 59.8527L92.8456 59.6105C93.0334 59.6913 92.4969 59.9604 92.4433 60.1219C92.336 60.0411 90.6997 60.5255 90.8338 60.7947C90.6729 60.687 90.1632 60.7947 89.9486 60.7947C89.9486 60.8754 89.8682 60.9292 89.4658 60.9831C89.8145 61.0907 90.0291 60.8485 90.2169 61.0369C89.439 61.3329 89.2244 61.4675 89.0366 61.7635L89.5463 61.4136C89.6536 61.3867 89.7072 61.3598 89.7609 61.3598C89.8145 61.2791 89.9486 61.1983 90.2169 61.0907C90.2169 61.1445 91.263 60.983 90.807 61.1983C91.9336 60.5255 91.88 61.2253 92.5505 60.8216C92.792 60.7678 92.8993 60.9023 92.4969 61.0638C91.8531 61.0907 91.6654 61.5482 91.1289 61.7097C91.3703 61.6828 91.6385 61.3329 91.9604 61.3329C92.0409 61.4136 91.6117 61.6828 91.3971 61.8442H91.2362L90.9411 62.1403C91.3435 62.0326 91.5312 61.7366 91.7995 61.8173C91.6654 61.925 91.9068 62.0057 91.6117 62.1134C91.0484 62.2479 90.3778 62.5709 90.1901 62.4901C90.2973 62.5709 90.5119 62.8938 91.1825 62.4901L91.2094 62.6247C91.5044 62.4094 92.0141 61.9519 92.2018 62.1941L92.0409 62.2479L92.6847 62.221L92.3091 62.4632C92.4969 62.3825 92.6847 62.3556 92.7115 62.4094C92.4969 62.517 92.4164 62.6247 92.0945 62.7323C92.2018 62.9207 92.6042 62.7593 92.8188 62.6785C92.9261 62.7593 92.7651 62.8669 92.2823 63.0015C92.2287 63.1899 92.4433 63.4321 92.0677 63.6743C92.4969 63.755 92.2018 63.5666 92.792 63.4859C91.5044 64.1856 92.5237 64.3471 92.8188 64.6162C93.9722 64.078 92.9797 64.6431 94.0795 64.3202C93.6772 64.4009 93.2748 64.993 92.8456 64.8046L93.0334 64.9391C92.4432 65.3159 92.4433 64.8315 91.6117 65.3428C91.719 65.5312 93.0602 65.1544 92.7115 65.5581C91.8531 65.8003 93.0602 65.6389 92.1214 65.9349C91.7995 65.9887 91.88 65.908 91.7727 65.8542L91.6117 65.9618C91.5312 66.5001 92.631 65.7196 93.3016 65.7196C93.5162 65.9349 92.7115 66.1771 92.336 66.3386C92.2018 66.4462 92.3628 66.527 92.6042 66.5001C92.0409 66.527 93.0066 66.0156 93.5699 65.8811C92.6578 66.3655 93.6503 66.3117 94.0527 66.2309C94.911 65.4774 93.999 65.9618 94.9379 65.1814C94.616 65.2352 93.7576 65.585 94.0527 65.2352C94.5355 65.2083 94.5355 65.0468 94.6428 64.9661C94.16 65.1814 94.3746 64.8853 94.16 64.9122C94.5355 64.6969 95.3402 64.6162 95.4475 64.3202L94.2673 64.7238C94.4014 64.5624 95.1256 64.4278 94.7769 64.374C95.4207 64.2394 95.6889 63.9972 95.984 64.1587C96.8692 63.4859 95.2866 63.9165 94.7769 63.8357C94.8574 63.8357 95.0183 63.7819 95.0988 63.7819C94.7769 63.8357 94.7501 63.755 94.6696 63.7012C94.8842 63.459 95.2329 63.6204 95.528 63.459L95.4207 63.2168C95.4475 63.1898 95.4743 63.1899 95.5012 63.1899C95.3134 63.1899 95.2061 63.1629 95.4743 63.0284C95.8767 62.9476 96.2791 62.84 96.5741 62.7862L95.6889 62.84C96.0913 62.7323 96.2791 62.3825 96.601 62.4632L96.3059 62.1403L97.0838 61.8173C96.9228 61.7904 96.7619 61.8442 96.7082 61.9788C96.8424 61.7904 95.1256 61.925 96.6814 61.4136C95.9304 61.3598 96.1449 61.1714 95.6085 60.9561C96.44 60.9561 96.4132 60.2833 96.8424 60.4448C97.1106 60.1488 96.2522 60.4179 96.0913 60.3372C96.3864 60.0949 97.1642 59.8527 97.4861 59.8797L97.0838 59.8527L97.2447 59.7989L96.7619 59.8258C97.1106 59.5298 97.5398 59.5029 97.5666 59.3145L96.8692 59.5567L97.2447 59.2876C96.9497 59.4491 96.7619 59.4221 96.6814 59.3145L96.8424 59.2607L96.6546 59.1799C97.1106 59.153 96.7619 58.9916 97.2715 58.8839C97.2715 58.7493 97.2447 58.7493 97.057 58.5879L96.601 58.8032C96.0913 58.6955 97.2984 58.534 97.2447 58.2918L96.7082 58.5071C97.513 57.8343 95.984 58.1573 96.4937 57.6998C96.6814 57.7805 97.2984 57.5114 97.1374 57.5652C96.8692 57.4306 96.896 57.0539 96.1449 57.1077C96.896 56.7309 97.1374 56.6233 97.4057 56.2734C97.2984 56.1389 97.2179 56.1389 96.7351 56.2734C96.9765 56.0043 96.4132 55.8966 97.0033 55.6813C96.5473 55.8159 97.0301 55.5199 96.6278 55.5737L96.8424 55.4661L96.3059 55.6813C97.4057 54.9547 95.4475 55.493 96.4132 54.8202H96.5741L96.3327 54.7933C96.5741 54.6856 96.7351 54.6856 97.0301 54.551L96.9228 53.9859L96.5473 54.255C96.44 54.1743 95.9035 54.2819 96.1718 54.0397C97.057 53.9321 96.1449 53.8513 96.7619 53.5822L97.0301 53.6091C96.9228 53.4746 96.9228 53.4746 96.3864 53.6898C96.1181 53.5553 97.3788 53.1516 96.7082 53.2054L96.7351 53.34C96.44 53.5015 95.9572 53.5822 95.9304 53.4746C96.0108 53.4207 96.2254 53.2593 96.3059 53.3131C96.0376 53.2323 96.2254 52.8825 95.984 52.9094C96.1181 52.7479 96.5205 52.6403 96.6814 52.6403C96.0913 52.4788 96.7351 52.4519 96.1181 52.2904L96.44 52.1828L96.0376 52.2097L96.6278 51.7791L96.2522 51.9944C96.1449 51.9136 95.9035 51.9136 96.0376 51.7253L96.5205 51.5907C96.1449 51.3754 97.1374 50.9448 96.3864 50.891C96.4668 50.8372 96.6278 50.8372 96.7082 50.8102C95.8767 50.8102 97.4325 50.272 96.4668 50.3527C96.6278 50.2989 96.8155 50.2182 96.9497 50.1644H96.601L97.2179 49.9221L96.2791 50.1644L96.896 49.8414L96.5741 49.7876C97.7007 49.1955 96.7351 49.357 97.5666 48.8187L96.7887 49.1417C94.9915 49.3032 97.2715 47.7153 96.3327 47.4462L96.9497 47.204L96.1449 47.2578C96.5741 46.9349 96.7082 47.1233 97.0033 46.9618C96.5741 46.8542 96.0645 47.204 95.7694 46.9887C96.1181 46.6658 96.2522 46.8542 96.4937 46.8542C96.0913 46.6927 95.6085 46.4505 95.8767 46.1006C95.7962 46.1275 95.6889 46.1544 95.6353 46.1814C95.2866 46.1006 95.4743 45.7508 95.3671 45.5893C95.6621 45.4816 95.7158 45.5085 95.7962 45.5355C95.7962 45.4547 95.9572 45.2663 95.6621 45.3202L96.2254 45.1856C96.2791 44.9972 95.6889 44.8896 96.2791 44.6204C96.0376 44.7281 95.5816 44.9165 95.5548 44.755C96.4668 44.3244 95.0183 44.5397 95.4475 44.136C95.6889 44.0822 95.7962 44.2168 95.7962 44.1629C96.0108 43.9476 95.528 44.0284 95.2061 44.0553L95.6085 43.9207L94.8842 43.6247C95.7962 43.1672 94.5623 43.221 95.2598 42.9788C95.2329 42.7904 94.911 43.3017 94.6965 43.1134C95.072 42.8981 94.4282 42.9788 95.0452 42.7635H95.1256L95.0183 42.6289L95.6621 42.4944C95.4743 42.4136 94.8306 42.5482 94.3746 42.7366C94.6696 42.4675 94.3209 42.4136 94.8306 42.1445H94.9915C94.616 41.8754 96.4132 40.9066 95.2866 41.0142C95.3671 40.9604 95.528 40.9066 95.528 40.9604L95.4743 40.7182L95.9572 40.5836L95.1256 40.5029L95.4207 40.3952C95.4475 40.0992 95.1525 39.8032 94.9379 39.534H95.0988C94.4819 39.3995 95.2598 39.1034 94.8306 38.9689C94.911 38.942 94.9379 38.942 94.9647 38.942L94.8574 38.7267L95.1793 38.6459C94.455 38.7536 95.8499 37.8386 95.3402 38.1615C95.0183 38.1884 94.5892 38.1615 94.2136 38.2961C94.0795 38.0808 94.5892 38.0808 94.7769 37.8386C94.7501 37.6502 94.1868 37.8386 94.3746 37.4887L94.6965 37.3811C94.5892 37.3003 94.3477 37.3003 94.2404 37.1658H94.4014C93.6503 37.1658 95.1793 36.493 93.7576 36.8428C93.9722 36.6275 93.704 36.5199 94.3209 36.2777C93.8113 36.1162 93.5162 35.9547 93.1407 35.7394C94.1332 35.2819 93.0602 35.6856 93.543 35.2819L93.0066 35.5241C92.7651 35.1204 93.8917 34.0709 93.4894 33.6672L94.0259 33.425L93.3821 33.5595C93.4357 32.9406 93.3553 32.187 93.2211 31.7564C92.8724 31.7295 92.1482 31.7833 92.2555 31.4873H92.336C91.88 31.2451 91.4776 30.9221 91.6385 30.3839C91.88 30.3301 92.0141 30.2224 92.175 30.1955C91.5312 30.3301 92.0409 29.9802 92.0409 29.8726L91.6654 30.1417C91.1021 30.2224 91.5312 29.8726 91.9068 29.6573L91.263 29.7111C91.3167 29.6842 91.3971 29.6304 91.4776 29.5765L91.1825 29.6573L91.8531 29.2805C91.6922 29.2805 91.3971 29.119 90.6997 29.3343C90.9411 29.2267 91.0484 28.9845 91.2362 29.0652L91.1825 28.3117L90.9679 28.527C90.4315 28.7692 90.0023 28.6884 90.2169 28.5C90.6997 28.4462 90.9948 28.204 91.3703 27.9887C91.0484 28.0156 90.9143 28.2578 90.6192 28.3386C90.2169 28.3655 89.9218 28.204 90.1364 28.0425L90.3778 28.0156C90.1096 27.9349 91.0216 27.4774 90.9143 27.3428C90.4315 27.3697 90.7802 27.1275 89.8682 27.5312C89.5999 27.3967 90.4583 27.2083 90.5388 27.1006C90.0559 27.1814 90.2169 26.8046 90.6729 26.5624C89.278 27.0199 90.9411 25.8357 89.7877 26.2394L90.3778 25.8088C90.0828 25.9165 89.3585 26.1856 89.1976 26.1049C89.4658 25.8357 90.0291 25.6474 90.3242 25.4859L89.1439 25.8627C90.0559 24.6516 88.8757 24.0326 89.5463 22.8216C89.1707 22.5794 88.4465 22.3372 88.4465 21.8527L88.527 21.7989L88.6611 21.2607L88.2587 21.772C88.0978 21.7451 87.8564 21.772 87.8295 21.6644C88.1246 21.0185 88.4465 20.1842 87.6418 19.8612C86.1933 20.0496 88.6879 19.1346 87.615 19.1884C87.7491 19.1615 87.9368 19.1077 88.071 19.0808C87.4808 18.8924 87.1858 18.7848 86.2469 18.7309C87.5613 18.2196 86.1128 18.5156 86.8102 18.2465L86.2738 18.4349C86.5688 18.2196 86.5957 17.9774 86.9712 17.8428L86.2469 17.9505L86.7834 17.7083C86.7298 17.4661 86.1128 17.1969 87.1321 16.6318C86.1128 16.4434 85.9787 15.5015 85.9251 14.721C85.4422 14.8017 85.3349 14.6403 85.2276 14.5057L85.7909 14.0751C85.5227 13.9944 84.6643 14.1828 85.013 13.8598C85.0935 13.8329 85.1472 13.806 85.174 13.806C84.9862 13.6983 85.2545 13.4023 84.6107 13.51C84.5839 13.3216 84.8521 12.9986 85.4691 12.8102C84.3961 13.2408 85.4691 12.3797 85.4691 12.3797C85.4691 12.3797 85.174 9.87682 84.0474 7.42781C82.9208 4.95189 80.9358 2.5567 77.5828 2.71818C77.0195 2.87965 76.6172 2.82583 76.0271 3.17568C75.7588 3.09495 76.644 2.63744 76.1075 2.82583C75.8393 3.17568 74.7127 3.33716 74.1762 3.84849L73.9884 3.76775C73.6129 3.90231 74.4981 3.76775 73.8007 4.03687L74.7932 3.6601C74.6859 3.82158 74.5249 3.98305 74.203 4.17144C74.6322 4.11761 75.9734 3.60628 75.5174 4.0907L75.4369 4.03687C75.5711 4.22526 74.8468 4.44056 74.7127 4.54821V4.49438L74.2835 4.87115C74.5517 4.60203 73.6666 4.73659 73.7738 4.81733C73.6129 5.16719 73.9884 4.65585 74.1762 4.7635C74.2835 4.84424 73.747 5.03263 73.4251 5.16719L73.5324 5.35557C73.0764 5.54396 73.5056 5.22101 73.0764 5.49013L73.6666 5.51704C72.54 6.05529 74.3372 5.54396 73.291 6.13602C72.9423 6.0822 72.9155 6.32441 72.54 6.45897L72.7814 6.86265C72.6472 6.9703 72.379 6.88957 72.4595 6.94339C72.1644 7.15869 72.8082 6.94339 72.8082 6.99721C72.5131 7.15869 72.9691 7.32016 72.1912 7.64311C71.8157 8.15444 73.2106 7.34707 72.8887 7.80458C72.4327 8.04679 72.6741 7.64311 72.2717 7.96605L72.5668 8.18135C72.3254 8.26209 71.7889 8.45047 71.8425 8.289C71.5743 9.31166 69.2943 10.7918 70.2063 11.2224C69.6966 11.5454 69.8039 11.3032 69.4016 11.4108C70.3404 11.5992 68.4895 12.6488 68.7578 13.0525L69.2138 12.8641C68.0604 14.0751 69.2138 14.425 68.9187 15.3669L69.2138 15.1516C69.6966 15.044 69.8039 15.1785 70.0453 15.2054C69.8307 15.3131 69.026 15.5284 69.3211 15.6629C69.4552 15.5553 69.5893 15.3938 69.8307 15.34C68.8919 16.4165 69.6966 17.5199 69.5357 18.7309C70.4209 19.8882 70.1258 21.6644 70.9305 22.8216C70.8232 22.6332 71.9767 22.2564 71.7889 22.4986C70.0453 23.7097 72.4058 23.0638 71.2524 24.0057C72.1644 24.4901 70.7964 25.8357 72.54 25.9165L72.0035 26.1587C71.7889 26.374 72.1912 26.2394 72.2717 26.3202L72.1108 26.374C72.0035 26.7238 72.7009 26.8046 72.4863 27.0468L73.1033 26.8046C73.2105 26.9391 72.6741 27.0737 73.0764 27.1006L72.7814 27.2352L73.4251 27.1814C72.3522 27.6119 73.5056 27.6389 73.0764 27.9618C73.3447 28.0695 73.9616 28.2578 73.8811 28.6615C73.3447 28.9576 73.5056 29.3074 73.3178 29.6573C73.6397 30.061 74.0957 30.6261 74.1226 31.2989L74.82 31.0029L74.9273 31.1374C74.7663 31.1913 74.7127 31.2451 74.6322 31.272C73.8811 31.7026 75.0077 31.5142 74.5786 31.8372C75.1687 31.5142 74.6322 31.7026 74.6054 31.595C74.8736 31.3258 75.5979 31.1644 75.3296 31.4873L75.1687 31.5411L75.5711 31.5142C75.0346 31.7564 74.82 31.9448 74.2835 32.187C74.6054 32.6445 75.6783 32.5907 75.6247 33.2097C75.0077 33.3981 75.9198 33.5057 74.8468 33.8556C75.3565 33.9901 75.6783 33.4519 76.4831 33.2904C76.5099 33.3712 76.8318 33.3442 76.4562 33.5326C76.188 33.5865 75.8393 33.8556 75.732 33.8287L75.8929 33.9901C75.8125 34.044 75.6515 34.044 75.5711 34.0709C76.3489 34.2323 75.1955 35.0935 75.9466 35.2281C76.3489 35.0935 76.0002 35.0397 76.3758 34.9051C77.2878 34.959 75.8393 35.5241 76.5099 35.6587L75.9466 35.7933C76.3489 35.7663 76.8318 35.6318 76.4831 35.9816C75.8661 36.2777 75.9198 36.0355 75.5979 36.0624C75.6247 36.1969 75.9198 36.4661 76.4294 36.1431C76.6976 36.2238 76.1612 36.493 76.0271 36.6544C76.188 36.6006 76.3758 36.3315 76.6976 36.3046C76.4294 36.6544 76.5904 36.9774 76.6172 37.2465C76.4562 37.3003 76.2416 37.408 76.1612 37.4349C77.1268 37.1927 75.732 37.7309 76.0271 37.9462Z" fill="#FF7800"/>

                    <path d="M84.6641 50.4602L84.7177 50.3257C84.5836 50.3795 84.4227 50.4333 84.2617 50.4602H84.6641Z" fill="#FF7800"/>

                    <path d="M83.1077 45.3467C83.054 45.3467 83.0004 45.3467 82.9199 45.3736C82.9467 45.3736 83.0272 45.3736 83.1077 45.3467Z" fill="#FF7800"/>

                    <path d="M81.5254 44.5664C81.6863 44.5933 81.8205 44.4587 81.9814 44.3511C81.8473 44.4049 81.7132 44.4587 81.5254 44.5664Z" fill="#FF7800"/>

                    <path d="M87.4011 52.6133C87.3474 52.6133 87.2401 52.6402 87.1328 52.694C87.2401 52.6671 87.3206 52.6402 87.4011 52.6133Z" fill="#FF7800"/>

                    <path d="M89.9219 60.5792C89.9487 60.5523 89.9755 60.5523 90.0023 60.5254C89.9755 60.5254 89.9487 60.5523 89.9219 60.5792Z" fill="#FF7800"/>

                    <path d="M90.7527 59.7716C90.7527 59.7447 90.7258 59.7178 90.6185 59.7178C90.5917 59.7716 90.6722 59.7716 90.7527 59.7716Z" fill="#FF7800"/>

                    <path d="M86.4353 50.8102C86.4085 50.7833 86.3548 50.7833 86.2207 50.8102C86.2207 50.864 86.328 50.8371 86.4353 50.8102Z" fill="#FF7800"/>

                    <path d="M90.4589 59.6912L90.4857 59.5566C90.432 59.5836 90.4052 59.5836 90.3516 59.6105L90.4589 59.6912Z" fill="#FF7800"/>

                    <path d="M89.9217 60.7406C89.9217 60.6867 89.8949 60.6329 89.9485 60.5791C89.7876 60.6868 89.7876 60.7406 89.9217 60.7406Z" fill="#FF7800"/>

                    <path d="M89.2783 55.1699C89.0905 55.1968 88.9564 55.1699 89.2783 55.1699Z" fill="#FF7800"/>

                    <path d="M89.1981 59.6101C89.2249 59.6101 89.2249 59.5832 89.1981 59.6101Z" fill="#FF7800"/>

                    <path d="M89.8421 61.3058C89.8152 61.2789 89.7884 61.2789 89.7079 61.3058C89.6811 61.3327 89.6811 61.3597 89.6543 61.3866C89.7348 61.3327 89.7884 61.3327 89.8421 61.3058Z" fill="#FF7800"/>

                    <path d="M88.957 57.1613C89.1984 57.1075 89.3594 57.0536 89.4667 56.9998C89.4667 56.9729 89.3326 56.9998 88.957 57.1613Z" fill="#FF7800"/>

                    <path d="M130.186 55.2778C130.239 55.3047 130.32 55.3586 130.454 55.4124C130.346 55.3586 130.266 55.3047 130.186 55.2778Z" fill="#FF7800"/>

                    <path d="M134.289 51.2676L134.396 51.3752C134.396 51.3214 134.37 51.2945 134.289 51.2676Z" fill="#FF7800"/>

                    <path d="M128.011 57.8072C127.985 57.7803 127.985 57.7803 127.958 57.7803C127.931 57.8072 127.877 57.861 127.797 57.9687L128.011 57.8072Z" fill="#FF7800"/>

                    <path d="M141.183 41.6602L141.156 41.7409C141.183 41.714 141.21 41.714 141.183 41.6602Z" fill="#FF7800"/>

                    <path d="M136.971 47.3114C136.863 47.2306 136.837 47.1768 136.81 47.1499C136.783 47.1499 136.81 47.2037 136.971 47.3114Z" fill="#FF7800"/>

                    <path d="M121.494 56.381L121.923 56.4887C121.762 56.4079 121.575 56.3541 121.494 56.381Z" fill="#FF7800"/>

                    <path d="M121.574 60.0679C121.601 60.0679 121.628 60.0948 121.655 60.0948C121.628 60.0948 121.601 60.0948 121.574 60.0679Z" fill="#FF7800"/>

                    <path d="M123.72 59.745C123.693 59.6911 123.639 59.6373 123.586 59.5835C123.586 59.6373 123.559 59.6642 123.72 59.745Z" fill="#FF7800"/>

                    <path d="M123.506 59.5029C123.533 59.5298 123.56 59.5568 123.586 59.5837C123.586 59.5568 123.586 59.5298 123.506 59.5029Z" fill="#FF7800"/>

                    <path d="M154.997 1.74944C155.051 1.66871 154.756 1.48032 154.541 1.31885L154.997 1.74944Z" fill="#FF7800"/>

                    <path d="M145.689 32.1333L145.85 32.214C145.797 32.1871 145.743 32.1602 145.689 32.1333Z" fill="#FF7800"/>

                    <path d="M151.482 0.376522L151.59 0.349609C151.509 0.349609 151.482 0.349609 151.482 0.376522Z" fill="#FF7800"/>

                    <path d="M121.227 54.3358C120.878 54.0667 121.441 54.1205 121.066 53.9321C121.092 54.0398 120.744 54.0129 121.227 54.3358Z" fill="#FF7800"/>

                    <path d="M151.484 0.376953L151.35 0.403865C151.43 0.430777 151.484 0.430778 151.564 0.45769C151.511 0.430778 151.484 0.403865 151.484 0.376953Z" fill="#FF7800"/>

                    <path d="M150.061 22.0679C150.087 22.0948 150.087 22.0948 150.114 22.1217L150.061 22.0679Z" fill="#FF7800"/>

                    <path d="M150.92 21.772C150.947 21.8258 150.974 21.8796 151 21.9334C151.081 21.9065 151.027 21.8527 150.92 21.772Z" fill="#FF7800"/>

                    <path d="M154.542 1.31887L154.273 1.07666C154.3 1.13048 154.408 1.21122 154.542 1.31887Z" fill="#FF7800"/>

                    <path d="M152.664 15.6899C152.664 15.7169 152.664 15.7438 152.691 15.7707C152.691 15.7438 152.691 15.7169 152.664 15.6899Z" fill="#FF7800"/>

                    <path d="M136.568 47.6074C136.515 47.6074 136.488 47.6074 136.461 47.6074C136.541 47.6343 136.622 47.6612 136.568 47.6074Z" fill="#FF7800"/>

                    <path d="M128.495 39.3188C128.602 39.2919 128.387 39.0766 128.119 38.8882C128.066 38.9689 128.119 39.0497 128.495 39.3188Z" fill="#FF7800"/>

                    <path d="M128.495 38.5381C128.468 38.5381 128.468 38.5381 128.441 38.5381C128.468 38.565 128.495 38.565 128.495 38.5381Z" fill="#FF7800"/>

                    <path d="M125.812 42.3062C125.812 42.3062 125.839 42.3062 125.866 42.3331C125.839 42.3062 125.839 42.3062 125.812 42.3062Z" fill="#FF7800"/>

                    <path d="M126.135 41.4448C126.215 41.4717 126.296 41.4717 126.323 41.4717C126.269 41.4448 126.188 41.4448 126.135 41.4448Z" fill="#FF7800"/>

                    <path d="M128.897 27.0467C128.79 27.9079 129.139 29.2804 128.575 29.9263C129.3 30.4377 129.219 30.7068 129.3 31.0297L128.227 30.5722L128.468 30.9221C128.119 30.8683 128.334 30.6799 127.878 30.653L128.495 31.0297C128.119 30.8683 128.012 31.4334 127.395 30.7606L127.047 31.5411C126.939 31.7025 127.878 32.0524 127.529 32.1062C127.207 31.9986 127.342 31.9447 126.966 31.7833C125.92 31.9986 128.736 33.3711 128.012 33.694L127.878 33.5864C128.119 33.8017 128.012 33.9632 128.146 34.0439C129.246 34.4476 127.61 33.694 128.307 33.8017C129.192 34.2323 128.71 34.2323 129.38 34.5283C129.005 34.5014 129.487 34.8243 129.487 34.9589C128.844 34.8782 129.112 35.3357 128.334 35.1742C128.575 35.3895 129.407 35.9008 129.353 36.1161C128.575 35.9277 128.683 35.7663 128.334 35.847L128.844 36.1161C128.683 36.2507 128.549 36.143 128.307 36.0354C128.2 36.1969 128.951 36.4929 128.522 36.5736L128.066 36.2238C128.2 36.466 128.066 36.4929 127.932 36.6813C127.637 36.5467 127.69 36.466 127.824 36.4391C126.993 36.1969 128.066 36.7889 127.959 36.8159C128.2 36.8966 128.361 36.7889 128.844 37.1119C128.71 37.1657 129.434 37.677 128.79 37.4617L128.334 37.1119C128.629 37.5156 128.924 37.5425 128.602 37.704C128.575 37.677 128.441 37.6232 128.334 37.5694C128.924 38.0538 128.227 37.9731 128.066 38.1884L127.959 38.0807C128.093 38.2691 128.522 38.5382 128.468 38.5651C128.844 38.5651 128.978 38.6728 129.487 38.8881C128.549 38.6728 130.346 39.6416 129.702 39.6955C129.407 39.5609 129.085 39.3187 129.434 39.3725C128.602 38.8612 127.851 38.5113 127.529 38.1345C127.69 38.3498 127.744 38.5382 127.395 38.3229L128.2 38.7266C128.2 38.8074 128.119 38.8343 128.093 38.8881C128.602 39.1572 129.005 39.1572 129.273 39.4532C129.461 39.7493 128.388 39.1572 128.736 39.3456C128.951 39.7493 129.568 39.8569 129.192 39.9646C129.139 39.9108 129.005 39.8031 129.112 39.8031C128.71 39.83 129.058 40.2875 128.066 39.8838C127.851 39.7493 127.556 39.6147 127.69 39.5878L127.851 39.6685C127.234 39.1572 127.985 39.9108 127.1 39.4532C127.637 39.6955 127.395 39.8838 127.261 39.9377L127.878 40.1799C129.514 41.3909 126.698 39.5878 126.751 40.0722C127.047 40.4759 126.966 40.0722 127.315 40.3952C127.127 40.5028 126.564 40.3144 126.725 40.6374C126.456 40.5836 126.081 40.5566 125.383 40.2606C125.598 40.5297 124.874 40.5297 125.518 40.9065C126.188 40.9334 124.927 40.3413 125.92 40.5028L126.537 40.8796C126.403 41.0411 126.644 41.4447 126.322 41.4717C126.456 41.4986 126.644 41.5793 126.778 41.66C126.912 42.0368 127.529 42.4405 127.207 42.602C126.591 42.3598 126.751 42.2521 126.751 42.1176C126.188 42.0637 126.644 42.279 126.322 42.4405C125.786 42.1983 126.43 42.279 125.947 42.0099L125.974 42.3867C125.947 42.3598 125.893 42.3598 125.866 42.3329C126.725 42.7904 125.679 42.5212 125.866 42.8173C125.652 43.221 126.805 43.8668 127.422 44.432C127.154 44.3782 126.912 44.2974 126.725 44.1629C127.154 44.2436 126.859 44.1091 126.644 43.9745C126.671 44.1629 125.625 43.8668 125.33 43.6246C125.491 43.9745 125.839 43.7592 126.054 44.0283L125.839 44.2974C126.295 44.4858 126.456 44.4051 126.725 44.728C126.778 44.9164 126.671 44.9433 126.537 45.1048C126.322 44.9702 125.839 44.8357 125.92 44.7011C125.705 44.7011 125.625 44.8357 126.027 45.0779C126.537 45.0779 126.269 45.5623 127.02 45.7776H126.51C126.537 45.7507 126.242 45.5892 126.376 45.5623C125.678 45.2932 126.483 45.8045 126.537 45.9122C126.376 45.9122 126.215 46.0467 125.947 45.9391C126.108 46.1006 125.893 46.1544 125.518 46.0198C125.598 46.1813 125.947 46.2351 126.161 46.3697L125.947 46.6388C125.571 46.4773 124.498 45.9929 124.391 45.8853C124.686 46.1813 125.491 46.4773 125.357 46.6119C124.686 46.1544 124.686 46.5581 123.881 45.9929C123.291 45.8314 123.184 46.1275 123.291 46.3697C123.828 46.7464 123.694 46.3697 124.284 46.6657C124.284 47.204 125.92 48.0382 125.464 48.2266H125.678C125.92 48.6034 125.866 48.5227 126.295 48.8994C125.598 48.4957 124.203 48.1459 124.203 48.5765C124.552 48.7918 125.008 48.7379 125.544 49.0878V49.3569C125.491 49.3569 125.357 49.2493 125.276 49.1955C125.437 49.5184 124.15 49.0878 124.981 49.5722L123.801 49.2493L124.31 49.4108C124.659 49.6261 124.659 49.8952 124.766 50.0028C125.062 50.4334 124.713 50.3527 124.176 50.245C124.498 50.3527 125.222 50.5949 125.249 50.8371C124.069 50.245 124.632 50.9986 124.015 50.6756C123.989 50.7564 123.559 50.7025 124.042 50.9447L123.318 50.568C124.337 51.1062 124.176 51.3215 124.257 51.6176C122.889 50.864 124.257 51.8867 122.942 51.3484C123.881 51.8598 123.13 51.8867 123.935 52.3173C123.908 52.5057 123.023 52.0212 122.701 51.9136L123.023 52.1558C122.54 52.0212 122.326 52.2634 121.923 52.2904L122.674 52.8824L122.272 52.7479C122.46 52.8824 122.54 53.0708 122.889 53.1515L122.808 53.2054C123.72 53.6629 122.996 53.4476 123.291 53.8244C123.13 53.7974 122.916 53.6629 122.808 53.5821C122.755 53.6629 122.299 53.3938 121.977 53.2861C122.245 53.3399 123.452 54.4164 123.989 54.3895C124.364 54.551 124.579 54.847 124.364 54.847L123.506 54.4702L124.31 55.0085C124.364 55.1969 123.801 54.9816 123.667 55.0623C123.667 54.9278 122.218 54.0127 122.084 54.3088C122.057 54.1204 121.628 53.7974 121.494 53.636C121.44 53.6898 121.333 53.6629 121.038 53.3938C121.172 53.7436 121.494 53.7167 121.494 53.9858C120.77 53.6091 120.501 53.5552 120.153 53.6091L120.77 53.7436C120.85 53.7974 120.904 53.8513 120.957 53.8782C121.065 53.8782 121.199 53.9051 121.467 54.0397C121.44 54.0666 122.245 54.7663 121.789 54.551C123.05 54.9008 122.486 55.3853 123.238 55.6006C123.452 55.7351 123.398 55.8966 123.023 55.7351C122.567 55.2776 122.111 55.4391 121.628 55.143C121.816 55.3314 122.245 55.2776 122.486 55.5198C122.486 55.6544 121.977 55.4929 121.735 55.4391L121.628 55.3314H121.226C121.574 55.5467 121.923 55.4929 122.03 55.7351C121.843 55.7082 121.977 55.9504 121.682 55.7889C121.226 55.466 120.528 55.17 120.448 54.9816C120.448 55.1161 120.341 55.4929 121.118 55.7082L121.038 55.8159C121.387 55.8966 122.057 55.9504 122.03 56.2734L121.896 56.1926L122.352 56.6501L121.923 56.5425C122.111 56.6232 122.272 56.7578 122.218 56.8116C121.977 56.704 121.87 56.7309 121.574 56.5694C121.521 56.7847 121.896 56.9462 122.084 57.0807C122.084 57.2153 121.896 57.1884 121.494 56.8923C121.306 57 121.279 57.296 120.85 57.1884C121.065 57.5651 121.038 57.2153 121.467 57.5921C120.099 57.1076 120.636 57.9957 120.609 58.3994C121.762 58.8838 120.689 58.5609 121.682 59.153C121.36 58.9108 120.662 59.0184 120.501 58.5609L120.528 58.8031C119.858 58.6147 120.206 58.2649 119.268 58.0227C119.214 58.238 120.367 58.9915 119.831 59.0184C119.08 58.534 119.992 59.3414 119.16 58.83C118.892 58.6416 119.026 58.6147 118.999 58.5071L118.812 58.4532C118.356 58.7493 119.67 59.0722 120.099 59.5566C120.072 59.8796 119.375 59.449 118.999 59.2606C118.812 59.2337 118.892 59.4221 119.053 59.5836C118.651 59.1799 119.697 59.5566 120.153 59.8796C119.187 59.5297 119.885 60.2295 120.206 60.4717C121.36 60.6062 120.394 60.2295 121.601 60.4178C121.333 60.2295 120.528 59.7989 120.957 59.7719C121.279 60.1218 121.414 59.9872 121.574 60.0411C121.092 59.8258 121.467 59.7989 121.306 59.6374C121.709 59.7719 122.326 60.3371 122.621 60.2025L121.548 59.5836C121.762 59.5836 122.326 60.0411 122.165 59.7181C122.674 60.1218 123.077 60.1487 123.13 60.4717C124.203 60.66 122.862 59.7719 122.567 59.3413C122.621 59.3952 122.782 59.4759 122.835 59.5297C122.567 59.3413 122.647 59.2606 122.594 59.153C122.916 59.1261 123.023 59.5297 123.345 59.6374L123.452 59.3952C123.479 59.4221 123.506 59.4221 123.533 59.4221C123.425 59.2875 123.345 59.1799 123.64 59.2875C123.962 59.5297 124.31 59.745 124.579 59.9603L123.935 59.3144C124.284 59.5297 124.659 59.4221 124.847 59.745L124.901 59.2875L125.652 59.6374C125.571 59.4759 125.41 59.3952 125.276 59.4759C125.518 59.449 124.284 58.238 125.705 59.0722C125.249 58.4802 125.544 58.4802 125.357 57.9419C125.893 58.5609 126.376 58.0765 126.564 58.534C126.966 58.534 126.188 58.0765 126.135 57.8881C126.51 57.915 127.207 58.3456 127.422 58.6147L127.154 58.2918L127.288 58.3725L126.939 58.0227C127.422 58.0765 127.69 58.3725 127.878 58.2649L127.234 57.8881L127.663 57.9688C127.342 57.8612 127.261 57.6997 127.261 57.5651L127.395 57.6459L127.342 57.4575C127.663 57.7804 127.556 57.4037 127.985 57.6997C128.066 57.5921 128.066 57.5921 128.066 57.3229L127.61 57.1346C127.368 56.677 128.28 57.4575 128.441 57.2691L127.905 57.0269C128.924 57.1615 127.69 56.2464 128.361 56.3003C128.415 56.4887 129.031 56.7578 128.897 56.677C128.817 56.381 129.112 56.1388 128.602 55.6006C129.38 55.8966 129.622 56.0042 130.078 55.9504C130.104 55.762 130.051 55.7082 129.648 55.4391C130.024 55.4391 129.729 54.9278 130.265 55.1969C129.836 54.9547 130.426 55.1161 130.104 54.847L130.346 54.9547L129.809 54.7125C131.097 55.0354 129.38 53.932 130.534 54.1742L130.641 54.2819L130.507 54.0666C130.748 54.1742 130.855 54.2819 131.151 54.4433L131.499 53.9589L131.043 53.8782C131.043 53.7436 130.587 53.4207 130.963 53.4476C131.633 54.0397 131.07 53.2861 131.687 53.5552L131.848 53.7705C131.875 53.5821 131.875 53.5821 131.338 53.3399C131.258 53.0439 132.411 53.6898 131.928 53.2323L131.848 53.3399C131.526 53.2323 131.151 52.9362 131.204 52.8555C131.285 52.8824 131.553 52.9363 131.58 53.017C131.472 52.7748 131.848 52.6671 131.687 52.4787C131.902 52.4787 132.25 52.694 132.358 52.8017C132.063 52.2365 132.545 52.694 132.25 52.1289L132.545 52.2904L132.25 51.9943L132.948 52.1289L132.545 51.9943C132.545 51.8598 132.384 51.6714 132.599 51.6445L133.001 51.9136C132.921 51.483 133.913 51.9136 133.457 51.3215C133.538 51.3484 133.672 51.4561 133.726 51.5099C133.162 50.8909 134.611 51.6714 133.913 50.9986C134.048 51.0793 134.262 51.1331 134.369 51.2139L134.155 50.9447L134.745 51.2408L133.913 50.7025L134.557 50.9178L134.289 50.7295C135.496 51.16 134.718 50.5411 135.684 50.7564L134.906 50.4334C133.592 49.2224 136.301 49.7875 135.872 48.8725L136.462 49.1685L135.872 48.6034C136.408 48.711 136.354 48.9263 136.676 49.034C136.462 48.6303 135.845 48.4957 135.818 48.1459C136.301 48.1997 136.22 48.415 136.408 48.5765C136.247 48.1728 136.113 47.6076 136.542 47.5538C136.462 47.5 136.354 47.4462 136.328 47.4462C136.14 47.1232 136.542 47.0156 136.596 46.8003C136.864 46.9348 136.891 47.0156 136.918 47.0963C136.998 47.0425 137.213 47.0425 136.971 46.8272L137.454 47.1501C137.642 47.0425 137.293 46.5312 137.937 46.7734C137.696 46.6926 137.266 46.4504 137.347 46.3428C138.286 46.6926 137.132 45.8045 137.722 45.8045C137.937 45.9391 137.91 46.1006 137.937 46.0736C138.232 46.0736 137.857 45.7776 137.615 45.5623L137.964 45.7776L137.696 45.051C138.634 45.4008 137.776 44.5127 138.42 44.8626C138.527 44.7011 137.937 44.8357 137.937 44.5396C138.339 44.6473 137.857 44.2436 138.447 44.5396L138.5 44.5935L138.527 44.4051L139.064 44.7819C139.01 44.5935 138.473 44.2167 138.017 44.0014C138.393 44.0283 138.232 43.7054 138.795 43.8938L138.903 44.0014C138.849 43.517 140.807 44.136 139.922 43.4093C140.002 43.4363 140.163 43.4901 140.137 43.5439L140.271 43.3286L140.7 43.5977L140.19 42.898L140.485 43.0326C140.727 42.8442 140.754 42.3867 140.807 42.0368L140.914 42.1445C140.619 41.5793 141.344 41.9292 141.129 41.5255C141.21 41.5793 141.236 41.6062 141.236 41.6062L141.317 41.364L141.585 41.5524C141.022 41.0949 142.658 41.4447 142.041 41.3102C141.8 41.0949 141.531 40.7719 141.183 40.5566C141.263 40.2875 141.585 40.6643 141.934 40.6374C142.041 40.4759 141.531 40.2068 141.934 40.0722L142.229 40.2068C142.229 40.0722 142.041 39.9108 142.068 39.7224L142.202 39.83C141.692 39.2918 143.248 39.9108 142.014 39.1034C142.309 39.1034 142.202 38.8074 142.819 39.1034C142.578 38.5921 142.497 38.2691 142.417 37.8385C143.436 38.2422 142.39 37.7309 143.034 37.8116L142.497 37.5963C142.631 37.1119 144.16 37.1657 144.187 36.5736L144.723 36.7889L144.187 36.4391C144.67 36.0085 145.206 35.3895 145.394 34.9589C145.179 34.6898 144.643 34.2054 144.911 34.0708L144.965 34.1246C144.831 33.5864 144.777 33.0751 145.26 32.779C145.475 32.9136 145.662 32.9405 145.77 33.0481C145.233 32.6983 145.85 32.779 145.904 32.6983L145.448 32.6445C144.992 32.2946 145.555 32.3484 145.984 32.4561L145.501 32.0255C145.555 32.0255 145.662 32.0524 145.743 32.0793L145.474 31.9178L146.226 32.1331C146.091 32.0255 146.038 31.7025 145.394 31.3258C145.635 31.4065 145.904 31.2989 145.957 31.5142L146.467 30.8952H146.172C145.635 30.6799 145.394 30.33 145.662 30.33C146.038 30.653 146.413 30.6799 146.843 30.7875C146.601 30.5722 146.333 30.6799 146.065 30.4915C145.77 30.2224 145.689 29.8994 145.957 29.9263L146.145 30.0878C146.011 29.8456 146.977 30.1685 147.003 29.9802C146.628 29.6572 147.084 29.711 146.145 29.3612C146.038 29.0651 146.816 29.5496 146.923 29.5227C146.521 29.2266 146.923 29.0651 147.406 29.2266C146.091 28.5269 148.13 28.8768 147.003 28.3385L147.728 28.4462C147.433 28.3116 146.762 27.9887 146.682 27.8003C147.057 27.8003 147.594 28.0694 147.915 28.1501L146.816 27.585C148.345 27.3428 147.969 25.9972 149.31 25.5935C149.23 25.1091 148.881 24.4362 149.23 24.0595L149.364 24.1671L149.847 23.8711L149.203 23.9787C149.123 23.8173 148.908 23.6558 148.962 23.5751C149.632 23.3059 150.464 22.9023 150.115 22.068C148.962 21.153 151.376 22.2833 150.571 21.5297C150.678 21.6105 150.866 21.6912 150.973 21.7719C150.705 21.2068 150.544 20.9108 149.954 20.211C151.242 20.7762 150.035 19.9419 150.705 20.2649L150.196 20.0227C150.544 20.0765 150.759 19.915 151.108 20.0765L150.517 19.6459L151.054 19.8343C151.188 19.619 150.947 18.9462 152.073 19.2691C151.483 18.381 152.073 17.5736 152.556 16.9547C152.154 16.6855 152.207 16.4433 152.207 16.2819L152.932 16.3626C152.797 16.1204 152.046 15.636 152.529 15.636C152.61 15.6629 152.663 15.6898 152.69 15.7167C152.61 15.5014 153.039 15.4745 152.502 15.0708C152.61 14.9093 153.012 14.8555 153.602 15.1515C152.529 14.721 153.897 14.8286 153.897 14.8286C153.897 14.8286 155.453 12.7025 156.392 9.98441C157.331 7.26628 157.572 3.98299 155.051 1.77619C154.541 1.50707 154.273 1.15721 153.602 1.02265C153.468 0.78044 154.434 1.04956 153.897 0.834264C153.468 0.941913 152.529 0.269108 151.778 0.242196L151.698 0.0538109C151.322 -0.107662 152.073 0.403669 151.376 0.107635L152.368 0.511318C152.18 0.565142 151.939 0.565142 151.59 0.484406C151.939 0.726615 153.28 1.29177 152.583 1.3456L152.556 1.26486C152.529 1.48016 151.859 1.15721 151.671 1.15721L151.698 1.10339H151.134C151.51 1.10339 150.786 0.565142 150.812 0.726615C150.437 0.888089 151.081 0.753528 151.134 0.968825C151.134 1.10339 150.625 0.888088 150.303 0.753528L150.276 0.968825C149.82 0.807352 150.356 0.834264 149.847 0.753528L150.249 1.18412C149.042 0.807352 150.705 1.66854 149.552 1.39942C149.337 1.10339 149.149 1.26486 148.774 1.10339L148.667 1.58781C148.479 1.56089 148.345 1.3456 148.371 1.42633C148.023 1.39942 148.613 1.66854 148.586 1.72237C148.237 1.64163 148.479 2.07222 147.701 1.77619C147.057 1.91075 148.64 2.26061 148.103 2.39517C147.62 2.26061 148.076 2.12605 147.54 2.07222L147.594 2.449C147.379 2.34135 146.843 2.09914 146.977 2.04531C146.065 2.63738 143.409 2.15296 143.758 3.1218C143.168 3.01415 143.409 2.9065 143.06 2.6912C143.624 3.49857 141.558 2.98724 141.451 3.47166L141.907 3.66004C140.244 3.74078 140.807 4.84418 139.949 5.3286L140.297 5.35551C140.7 5.62463 140.7 5.78611 140.861 6.0014C140.619 5.92067 139.895 5.5439 140.029 5.81302C140.217 5.83993 140.405 5.81302 140.646 5.92067C139.198 6.08214 139.01 7.48157 138.044 8.26203C137.883 9.7422 136.408 10.8725 136.167 12.2989C136.22 12.0836 137.32 12.6218 136.998 12.6756C134.906 12.3258 137.025 13.5368 135.55 13.4292C135.872 14.4518 133.913 14.4518 135.094 15.7705L134.557 15.5552C134.262 15.5552 134.638 15.7436 134.638 15.8782L134.477 15.8244C134.182 16.0127 134.584 16.551 134.262 16.6048L134.879 16.8739C134.852 17.0623 134.369 16.7663 134.664 17.0623L134.369 16.9278L134.879 17.3583C133.806 16.9008 134.611 17.762 134.074 17.6813C134.182 17.9504 134.477 18.5425 134.155 18.7578C133.592 18.5963 133.431 18.9731 133.055 19.0807C133.001 19.619 132.894 20.3456 132.465 20.8569L133.162 21.1261L133.136 21.2875C132.975 21.2337 132.894 21.2068 132.84 21.153C132.009 20.9377 132.921 21.6105 132.384 21.5297C133.055 21.7181 132.519 21.449 132.572 21.3683C132.948 21.3683 133.565 21.7719 133.162 21.7989L133.001 21.745L133.323 22.0142C132.787 21.7989 132.492 21.7989 131.955 21.5836C131.875 22.1487 132.653 22.8753 132.17 23.3059C131.607 23.0099 132.17 23.7365 131.177 23.1983C131.446 23.6827 132.036 23.4943 132.706 23.9518C132.653 24.0326 132.894 24.2479 132.519 24.1133C132.277 23.9518 131.848 23.9249 131.794 23.7904V24.0326C131.714 24.0057 131.58 23.898 131.526 23.8442C131.955 24.5439 130.507 24.3017 130.963 24.9476C131.338 25.136 131.124 24.8399 131.499 25.0283C132.089 25.7549 130.668 25.0821 131.07 25.6742L130.587 25.3782C130.882 25.6473 131.312 25.8895 130.829 25.9164C130.212 25.6742 130.399 25.5396 130.158 25.3244C130.078 25.432 130.104 25.8357 130.695 25.9972C130.829 26.2394 130.265 26.051 130.051 26.0779C130.212 26.1586 130.534 26.1048 130.775 26.3201C130.346 26.3739 130.212 26.7238 130.051 26.966C129.89 26.8853 129.675 26.8045 129.595 26.7507C130.185 27.2889 128.844 26.67 128.897 27.0467Z" fill="#FF7800"/>

                    <path d="M125.678 42.3596L125.813 42.3057C125.678 42.2519 125.517 42.1712 125.41 42.0366L125.678 42.3596Z" fill="#FF7800"/>

                    <path d="M128.388 37.5427C128.334 37.5158 128.308 37.462 128.254 37.4351C128.254 37.462 128.308 37.5158 128.388 37.5427Z" fill="#FF7800"/>

                    <path d="M127.879 35.8472C127.959 35.9817 128.174 35.9817 128.335 36.0086C128.228 35.9548 128.067 35.901 127.879 35.8472Z" fill="#FF7800"/>

                    <path d="M125.919 45.9393C125.865 45.8855 125.785 45.8317 125.678 45.7778C125.758 45.8586 125.839 45.9124 125.919 45.9393Z" fill="#FF7800"/>

                    <path d="M122.835 53.5281C122.862 53.5012 122.835 53.4743 122.808 53.3936C122.728 53.4205 122.755 53.4743 122.835 53.5281Z" fill="#FF7800"/>

                    <path d="M126.618 43.9476C126.618 43.9207 126.591 43.8669 126.457 43.7861C126.457 43.813 126.538 43.8938 126.618 43.9476Z" fill="#FF7800"/>

                    <path d="M122.701 53.2322L122.808 53.1515C122.782 53.1246 122.728 53.1246 122.701 53.0977V53.2322Z" fill="#FF7800"/>

                    <path d="M121.547 53.5819C121.6 53.555 121.627 53.5012 121.681 53.4743C121.493 53.4474 121.466 53.5012 121.547 53.5819Z" fill="#FF7800"/>

                    <path d="M125.302 49.1685C125.168 49.034 125.088 48.9532 125.302 49.1685Z" fill="#FF7800"/>

                    <path d="M121.924 52.2634H121.951L121.816 52.1558L121.924 52.2634Z" fill="#FF7800"/>

                    <path d="M121.065 53.9319C121.065 53.905 121.038 53.878 120.984 53.8242C120.957 53.8242 120.931 53.8511 120.877 53.8511C120.984 53.878 121.011 53.905 121.065 53.9319Z" fill="#FF7800"/>

                    <path d="M123.586 50.3257C123.801 50.4602 123.935 50.541 124.042 50.6217C124.042 50.5948 123.961 50.5141 123.586 50.3257Z" fill="#FF7800"/>

                  </svg>';
                $image_short_code .= '</div>';
                $image_short_code .= '<figure class="object-fit">';
                  $image_short_code .= '<img src="'.$news_content_image['url'].'" alt="'.$news_content_image['alt'].'">';
                $image_short_code .= '</figure>';
                $image_short_code .= '<div class="lc-shape-2 shapes pos-absolute">';
                  $image_short_code .= '<svg width="362" height="401" viewBox="0 0 362 401" fill="none" xmlns="http://www.w3.org/2000/svg">

                    <path d="M147.248 276.19C147.181 276.22 147.114 276.25 146.997 276.295C147.097 276.266 147.181 276.22 147.248 276.19Z" fill="#FF7800"/>

                    <path d="M150.316 286.566L150.137 286.51C150.2 286.578 150.266 286.581 150.316 286.566Z" fill="#FF7800"/>

                    <path d="M144.62 270.221C144.653 270.222 144.67 270.206 144.687 270.19C144.641 270.106 144.58 269.972 144.489 269.77C144.516 269.936 144.559 270.086 144.62 270.221Z" fill="#FF7800"/>

                    <path d="M154.954 308.377L154.927 308.243C154.924 308.309 154.907 308.325 154.954 308.377Z" fill="#FF7800"/>

                    <path d="M152.973 295.359C153.105 295.364 153.152 295.415 153.199 295.466C153.202 295.4 153.156 295.316 152.973 295.359Z" fill="#FF7800"/>

                    <path d="M147.721 264.02L147.507 264.407C147.628 264.296 147.733 264.136 147.721 264.02Z" fill="#FF7800"/>

                    <path d="M142.38 259.369C142.363 259.384 142.345 259.4 142.311 259.432C142.361 259.417 142.363 259.384 142.38 259.369Z" fill="#FF7800"/>

                    <path d="M142.659 262.466C142.723 262.501 142.821 262.505 142.92 262.509C142.857 262.441 142.794 262.373 142.659 262.466Z" fill="#FF7800"/>

                    <path d="M143.053 262.516C143.02 262.514 142.954 262.511 142.921 262.51C142.953 262.544 143.002 262.563 143.053 262.516Z" fill="#FF7800"/>

                    <path d="M129.792 381.727C129.671 381.871 129.807 382.189 129.894 382.49L129.792 381.727Z" fill="#FF7800"/>

                    <path d="M155.627 327.656L155.464 327.617C155.528 327.653 155.577 327.671 155.627 327.656Z" fill="#FF7800"/>

                    <path d="M132.398 384.083L132.249 384.125C132.33 384.145 132.364 384.114 132.398 384.083Z" fill="#FF7800"/>

                    <path d="M150.618 266.52C151.063 266.489 150.876 267.075 151.196 266.874C151.037 266.735 151.135 266.327 150.618 266.52Z" fill="#FF7800"/>

                    <path d="M169.763 334.204L169.773 334.353C169.776 334.287 169.794 334.238 169.763 334.204Z" fill="#FF7800"/>

                    <path d="M132.4 384.082L132.566 384.023C132.502 383.988 132.453 383.97 132.389 383.934C132.419 384.001 132.401 384.05 132.4 384.082Z" fill="#FF7800"/>

                    <path d="M150.137 346.739C150.121 346.721 150.123 346.688 150.091 346.654L150.137 346.739Z" fill="#FF7800"/>

                    <path d="M149.101 347.435C149.088 347.353 149.075 347.27 149.079 347.171C149.009 347.267 149.038 347.367 149.101 347.435Z" fill="#FF7800"/>

                    <path d="M129.876 382.473L129.926 382.903C129.98 382.79 129.936 382.64 129.876 382.473Z" fill="#FF7800"/>

                    <path d="M143.959 358.07C143.96 358.037 143.979 357.988 143.98 357.955C143.946 357.987 143.945 358.02 143.959 358.07Z" fill="#FF7800"/>

                    <path d="M152.928 294.482C152.962 294.45 152.948 294.4 152.982 294.369C152.882 294.398 152.832 294.412 152.928 294.482Z" fill="#FF7800"/>

                    <path d="M164.9 299.567C164.844 299.746 165.184 299.875 165.494 299.937C165.468 299.771 165.342 299.634 164.9 299.567Z" fill="#FF7800"/>

                    <path d="M163.559 291.244C163.559 291.244 163.525 291.242 163.508 291.258C163.525 291.242 163.525 291.242 163.559 291.244Z" fill="#FF7800"/>

                    <path d="M164.24 293.087C164.171 293.15 164.136 293.215 164.117 293.263C164.169 293.216 164.204 293.152 164.24 293.087Z" fill="#FF7800"/>

                    <path d="M172.043 324.489C171.984 323.497 171.717 322.349 171.516 321.203C171.439 320.64 171.33 320.075 171.252 319.544C171.192 318.997 171.163 318.485 171.216 317.992C170.39 317.614 170.315 317.017 170.093 316.398L171.17 316.259L170.778 315.765C171.101 315.531 171.01 316.154 171.389 315.74L170.703 315.581C171.085 315.514 170.872 314.252 171.697 315.043C171.658 314.382 171.57 313.702 171.531 313.041C171.532 312.596 170.614 312.873 170.833 312.354C171.134 312.234 171.074 312.512 171.44 312.427C171.768 311.648 171.173 311.279 170.576 310.942C169.979 310.605 169.315 310.299 169.459 309.596L169.62 309.701C169.314 309.508 169.298 309.078 169.132 309.105C168.08 309.443 169.753 309.261 169.172 309.766C168.244 309.862 168.612 309.332 167.931 309.453C168.209 309.102 167.669 308.998 167.564 308.746C168.047 308.205 167.543 307.624 168.205 307.139C167.883 306.961 166.963 306.86 166.833 306.409C167.479 305.94 167.527 306.37 167.696 305.866L167.151 305.894C167.166 305.499 167.314 305.521 167.579 305.498C167.513 305.084 166.795 305.303 167.032 304.735L167.585 304.921C167.302 304.581 167.375 304.418 167.314 303.872C167.613 303.818 167.637 304.049 167.582 304.196C168.309 303.746 167.154 303.767 167.193 303.603C166.975 303.71 166.96 304.072 166.401 304.018C166.429 303.738 165.56 303.622 166.15 303.299L166.72 303.469C166.211 303.021 166.017 303.326 166.076 302.669C166.125 302.688 166.242 302.643 166.358 302.631C165.593 302.386 166.113 301.747 166.021 301.166L166.183 301.239C165.944 301.048 165.45 301.029 165.455 300.897C165.241 301.284 165.062 301.228 164.577 301.39C165.328 300.76 163.439 300.983 163.769 300.171C164.068 300.117 164.478 300.182 164.186 300.451C165.126 300.472 165.874 300.32 166.389 300.636C166.118 300.412 165.915 300.123 166.311 300.106L165.466 300.221C165.406 300.054 165.412 299.922 165.4 299.806C164.853 299.867 164.636 300.354 164.202 300.056C163.837 299.696 164.978 299.625 164.598 299.659C164.139 299.163 163.674 299.656 163.798 299.035C163.896 299.071 164.058 299.144 163.989 299.207C164.206 298.721 163.581 298.284 164.52 297.892C164.751 297.901 165.051 297.814 164.994 297.993L164.844 298.037C165.675 298.283 164.56 297.729 165.471 297.616C164.954 297.777 164.927 297.199 164.955 296.919L164.385 297.161C162.369 296.835 165.584 296.878 165.12 296.101C164.576 295.684 165.011 296.361 164.492 296.143C164.49 295.763 164.98 295.469 164.57 295.024C164.759 294.817 164.99 294.414 165.642 294.192C165.272 293.963 165.652 293.137 164.941 293.159C164.55 293.869 165.803 293.473 165.123 294.386L164.413 294.408C164.316 293.959 163.839 293.512 163.969 293.137C163.866 293.232 163.698 293.325 163.566 293.32C163.109 292.791 162.415 292.829 162.424 292.187C162.996 291.912 162.997 292.291 163.12 292.527C163.472 291.98 163.021 292.111 163.015 291.451C163.518 291.24 163.113 291.867 163.645 291.756L163.274 291.148C163.307 291.149 163.341 291.118 163.374 291.119C162.476 291.315 163.297 290.588 162.88 290.275C162.539 289.322 161.358 289.589 160.494 289.341C160.667 289.117 160.87 288.993 161.102 288.969C160.807 289.336 161.077 289.182 161.341 289.192C161.138 288.904 161.909 288.192 162.335 288.242C161.89 287.829 161.959 288.59 161.571 288.377L161.369 287.676C160.963 287.924 160.968 288.205 160.499 287.972C160.262 287.715 160.302 287.552 160.186 287.152C160.418 287.128 160.794 286.78 160.881 287.08C160.974 286.836 160.871 286.519 160.423 286.584C160.202 287.169 159.786 286.031 159.235 286.603L159.456 286.018C159.485 286.118 159.77 286.014 159.746 286.195C160.355 285.823 159.427 285.918 159.299 285.814C159.373 285.619 159.275 285.203 159.51 285.08C159.265 285.021 159.297 284.643 159.586 284.44C159.378 284.284 159.167 284.605 158.935 284.629C158.878 284.396 158.789 284.162 158.715 283.945C159.052 283.76 160.029 283.27 160.208 283.327C159.766 283.227 159.105 283.679 158.989 283.279C159.768 283.194 159.299 282.549 160.274 282.505C160.687 282.059 160.399 281.438 160.063 281.177C159.419 281.202 159.91 281.699 159.341 281.908C158.717 281.026 157.141 281.657 157.091 280.847L157.015 281.108C156.499 280.824 156.597 280.827 156.005 280.804C156.738 280.602 157.642 279.45 157.141 278.804C156.757 278.904 156.683 279.511 156.084 279.653L155.755 279.228C155.79 279.163 155.922 279.168 156.054 279.174C155.62 278.876 156.581 277.957 155.713 278.22L156.509 277.295L156.163 277.677C155.796 277.795 155.466 277.37 155.286 277.346C154.671 277.058 154.882 276.737 155.165 276.253C154.925 276.474 154.393 276.998 154.108 276.69C155.203 276.122 154.115 275.701 154.687 275.426C154.594 275.291 154.794 274.82 154.339 275.05L155.028 274.73C154.053 275.187 153.812 274.617 153.429 274.305C154.756 273.714 153.083 273.896 154.138 273.079C153.232 273.473 153.402 272.523 152.613 272.871C152.394 272.566 153.219 272.153 153.443 271.914L153.029 271.948C153.342 271.564 153.07 270.927 153.124 270.401L152.18 270.513L152.457 270.194C152.223 270.251 151.968 270.043 151.773 270.381L151.715 270.181C150.887 270.66 151.357 270.068 150.785 269.931C150.857 269.768 151.076 269.662 151.224 269.684C151.116 269.498 151.585 269.319 151.809 269.08C151.666 269.338 149.968 269.321 149.89 270.027C149.568 270.262 149.161 270.131 149.22 269.886L149.885 269.335L148.984 269.596C148.711 269.404 149.107 269.007 149.069 268.726C149.242 268.914 150.765 268.363 150.393 267.788C150.68 268.03 151.162 267.933 151.423 268.01C151.379 267.859 151.416 267.762 151.829 267.762C151.314 267.445 151.279 267.888 150.916 267.495C151.575 267.108 151.717 266.85 151.688 266.338L151.384 266.936C151.299 266.982 151.233 266.98 151.183 266.994C151.177 267.159 151.091 267.238 150.853 267.427C150.807 267.342 149.732 267.416 150.074 267.099C149.337 268.192 148.816 266.803 148.376 267.495C148.159 267.569 147.923 267.279 148.213 267.043C148.936 267.104 148.77 266.306 149.258 266.078C148.994 266.068 148.953 266.676 148.608 266.646C148.434 266.458 148.715 266.04 148.84 265.798L149.02 265.821L149.075 265.296C148.706 265.446 148.75 265.976 148.379 265.78C148.451 265.618 148.097 265.406 148.367 265.252C148.901 265.107 149.415 264.633 149.704 264.809C149.515 264.604 148.98 263.956 148.573 264.649C148.527 264.565 148.465 264.464 148.419 264.38C148.257 264.719 148.06 265.503 147.633 265.041L147.752 264.964L147.028 264.935L147.257 264.565C147.104 264.674 146.921 264.717 146.827 264.581C146.999 264.423 146.989 264.241 147.244 264.07C146.945 263.712 146.655 263.948 146.438 264.022C146.247 263.849 146.32 263.654 146.755 263.506C146.638 263.139 146.194 262.693 146.393 262.255C145.84 262.069 146.321 262.418 145.724 262.493C146.576 261.389 145.228 260.891 144.622 260.372C143.795 261.23 144.378 260.28 143.45 260.788C143.85 260.705 143.743 259.662 144.406 260.001L144.07 259.74C144.424 259.128 144.867 260.019 145.315 259.129C145 258.754 143.791 259.301 143.803 258.592C144.576 258.227 143.331 258.425 144.124 257.978C144.425 257.891 144.451 258.057 144.596 258.145L144.652 257.966C144.197 256.991 143.682 258.324 142.91 258.244C142.449 257.814 143.123 257.444 143.414 257.175C143.471 256.996 143.181 256.82 142.901 256.825C143.528 256.817 142.931 257.717 142.396 257.894C142.972 257.108 141.884 257.099 141.483 257.215C141.248 258.542 141.825 257.723 141.492 259.046C141.792 258.959 142.458 258.408 142.483 259.019C141.954 259.031 142.124 259.318 142.069 259.464C142.397 259.098 142.442 259.627 142.689 259.621C142.444 259.974 141.616 260.073 141.76 260.574L142.725 259.968C142.714 260.232 142.015 260.402 142.469 260.585C141.868 260.759 141.768 261.201 141.287 260.852C140.896 261.975 142.323 261.354 142.975 261.545C142.876 261.541 142.757 261.619 142.674 261.632C142.975 261.545 143.1 261.714 143.245 261.803C143.227 262.231 142.664 261.895 142.456 262.151C142.582 262.288 142.691 262.441 142.818 262.577C142.783 262.609 142.766 262.625 142.749 262.641C142.963 262.666 143.125 262.738 142.919 262.928C142.52 263.011 142.167 263.179 141.866 263.266L142.856 263.272C142.503 263.439 142.611 264.037 142.139 263.87L142.758 264.472L142.177 264.977C142.405 265.051 142.539 264.991 142.484 264.725C142.493 264.906 142.953 264.957 143.261 265.085C143.536 265.211 143.677 265.398 143.003 265.767C143.903 265.951 143.822 266.311 144.612 266.754C143.677 266.635 144.255 267.845 143.61 267.49C143.54 267.998 144.282 267.598 144.554 267.79C144.438 268.215 143.733 268.517 143.325 268.419L143.815 268.537L143.696 268.614L144.223 268.635C144.055 269.14 143.611 269.106 143.712 269.456L144.318 269.15L144.103 269.57C144.327 269.332 144.538 269.422 144.729 269.595L144.61 269.673L144.883 269.865C144.373 269.828 144.92 270.179 144.419 270.325C144.525 270.576 144.542 270.56 144.875 270.887L145.218 270.57C145.881 270.877 144.642 270.944 144.871 271.398L145.312 271.085C145.109 271.622 145.382 271.814 145.673 271.957C145.964 272.1 146.272 272.228 146.142 272.602C145.869 272.41 145.392 272.787 145.527 272.726C145.927 273.022 146.163 273.724 146.968 273.805C146.385 274.343 146.198 274.484 146.124 275.091C146.344 275.364 146.426 275.384 146.876 275.253C146.776 275.694 147.472 276.035 146.999 276.313C147.433 276.165 147.068 276.629 147.482 276.596L147.295 276.737L147.752 276.441C146.965 277.548 148.818 277.011 148.183 278.041L148.002 278.018L148.31 278.145C148.123 278.286 147.943 278.263 147.657 278.4C147.824 278.753 147.974 279.122 148.109 279.473L148.355 279.087C148.512 279.291 149.06 279.197 148.895 279.603C147.957 279.55 149.045 279.971 148.537 280.314L148.228 280.187C148.431 280.475 148.431 280.475 148.904 280.197C149.287 280.509 148.116 280.925 148.821 281.035L148.7 280.766C148.94 280.545 149.435 280.531 149.51 280.715C149.457 280.796 149.299 281.037 149.171 280.933C149.509 281.16 149.485 281.753 149.747 281.796C149.688 282.041 149.304 282.142 149.124 282.118C149.88 282.593 149.176 282.45 149.915 282.941L149.646 283.062L150.089 283.129L149.653 283.722L149.961 283.437C150.118 283.641 150.38 283.685 150.334 284.013L149.869 284.093C150.392 284.625 149.497 285.134 150.341 285.464C150.289 285.545 150.125 285.505 150.011 285.484C150.891 285.749 149.453 286.221 150.484 286.443C150.318 286.469 150.181 286.596 150.063 286.641L150.437 286.771L149.868 286.979L150.781 286.834L150.27 287.242L150.583 287.238C149.614 287.975 150.602 288.014 149.93 288.73L150.62 288.377C151.554 288.529 151.578 289.173 151.484 289.862C151.39 290.551 151.195 291.302 151.771 291.754L151.186 291.945L152.051 292.16C151.688 292.591 151.506 292.189 151.234 292.376C151.747 292.759 152.162 292.28 152.537 292.79C152.255 293.24 152.074 292.837 151.829 292.778C152.305 293.226 152.92 293.926 152.734 294.446C152.817 294.433 152.933 294.421 152.952 294.372C153.336 294.651 153.247 295.241 153.413 295.627C153.145 295.716 153.066 295.63 152.971 295.527C152.982 295.676 152.855 295.952 153.183 295.998L152.622 296.009C152.625 296.355 153.299 296.81 152.712 297.067C152.93 296.961 153.364 296.846 153.419 297.112C152.577 297.54 154.021 297.729 153.683 298.326C153.452 298.35 153.316 298.031 153.329 298.114C153.153 298.404 153.628 298.472 153.986 298.585L153.621 298.637C153.89 298.928 154.159 299.218 154.428 299.509C153.57 299.921 154.836 300.432 154.155 300.554C154.222 300.936 154.468 300.137 154.699 300.559C154.36 300.776 154.998 300.917 154.414 301.075L154.332 301.056L154.468 301.374L153.826 301.333C154.031 301.588 154.672 301.63 155.106 301.515C154.86 301.868 155.211 302.178 154.706 302.423L154.544 302.35C154.962 303.043 153.242 303.965 154.383 304.306C154.314 304.37 154.148 304.396 154.152 304.297L154.2 304.761L153.739 304.743L154.572 305.336L154.273 305.39C154.252 305.917 154.585 306.656 154.791 307.291L154.629 307.218C155.231 307.836 154.468 307.938 154.895 308.4C154.796 308.396 154.78 308.379 154.764 308.362L154.862 308.811L154.551 308.749C155.267 308.975 153.863 309.86 154.386 309.567C154.71 309.712 155.094 309.991 155.491 309.973C155.603 310.472 155.121 310.157 154.909 310.511C154.927 310.875 155.455 310.862 155.285 311.4L154.97 311.437C155.044 311.654 155.286 311.779 155.373 312.079L155.211 312.007C155.903 312.446 154.405 312.784 155.781 313.002C155.573 313.258 155.805 313.646 155.192 313.705C155.663 314.317 155.89 314.804 156.195 315.443C155.197 315.635 156.288 315.578 155.743 316.019L156.274 315.94C156.354 316.405 156.069 316.922 155.784 317.438C155.516 317.972 155.281 318.474 155.393 318.973L154.863 319.019L155.467 319.191C155.362 319.731 155.271 320.354 155.182 320.944C155.092 321.534 155.037 322.093 155.019 322.521C155.305 322.796 155.947 323.25 155.715 323.686L155.634 323.633C155.767 324.018 155.899 324.435 155.932 324.849C155.957 325.048 155.965 325.262 155.924 325.459C155.899 325.672 155.825 325.867 155.734 326.078C155.506 326.003 155.354 326.079 155.194 325.974C155.761 326.211 155.174 326.468 155.15 326.649L155.569 326.484C156.052 326.766 155.545 327.076 155.13 327.143L155.69 327.577C155.64 327.591 155.54 327.62 155.457 327.634L155.733 327.727L155.002 327.863C155.13 327.967 155.258 328.483 155.908 328.707C155.661 328.713 155.433 329.051 155.346 328.751L154.962 330.088L155.25 329.918C155.792 329.955 156.07 330.428 155.783 330.598C155.401 330.253 155.029 330.47 154.632 330.52C154.886 330.761 155.13 330.441 155.405 330.567C155.724 330.843 155.817 331.391 155.567 331.464L155.376 331.291C155.51 331.643 154.571 331.623 154.575 331.936C154.957 332.281 154.522 332.429 155.441 332.531C155.539 332.98 154.78 332.571 154.66 332.682C155.045 332.961 154.645 333.456 154.184 333.438C155.467 333.934 153.469 334.416 154.561 334.739L153.861 334.91C154.155 334.987 154.806 335.21 154.875 335.527C154.505 335.71 154.002 335.509 153.671 335.529L154.725 335.982C153.927 336.561 153.614 337.357 153.301 338.186C153.227 338.381 153.152 338.609 153.078 338.804C152.987 339.015 152.88 339.208 152.773 339.402C152.56 339.79 152.298 340.159 151.922 340.474C151.923 340.853 151.971 341.317 151.969 341.762C151.968 342.207 151.884 342.666 151.654 343.036L151.561 342.9L150.956 343.586L151.665 343.185C151.721 343.418 151.878 343.622 151.788 343.8C151.394 344.164 150.949 344.575 150.617 345.04C150.268 345.521 150.015 346.072 150.038 346.716C150.929 347.955 148.786 346.7 149.353 347.761C149.258 347.659 149.098 347.553 149.003 347.451C149.026 347.683 149.036 347.864 149.061 348.063C149.07 348.245 149.079 348.427 149.121 348.61C149.172 348.975 149.257 349.341 149.433 349.875C148.321 349.222 149.233 350.346 148.653 349.993L149.086 350.29C148.723 350.309 148.446 350.628 148.109 350.401L148.546 351.011L148.06 350.795C147.829 351.198 147.737 352.266 146.644 351.976C146.732 352.656 146.504 353.405 146.147 354.084C145.772 354.778 145.252 355.418 144.8 355.994C145.08 356.4 144.9 356.789 144.772 357.097L144.047 357.069C144.031 357.464 144.546 358.194 144.017 358.239C143.952 358.203 143.921 358.169 143.906 358.119C143.826 358.479 143.376 358.577 143.699 359.166C143.472 359.471 142.989 359.6 142.544 359.187C143.426 359.799 141.992 359.792 141.992 359.792C141.992 359.792 141.94 359.84 141.853 359.952C141.766 360.064 141.628 360.223 141.438 360.43C141.092 360.845 140.588 361.469 139.998 362.204C138.8 363.691 137.183 365.755 135.574 368.034C132.373 372.576 129.07 378.037 129.792 381.809C130.087 382.266 130.08 382.843 130.697 383.098C130.631 383.507 129.792 383.046 130.155 383.439C130.739 383.281 131.139 384.401 131.962 384.433L131.883 384.76C132.136 385.034 131.808 384.164 132.284 384.644L131.569 383.973C131.853 383.868 132.084 383.877 132.408 384.022C132.243 383.603 131.275 382.659 132.087 382.575L132.047 382.738C132.294 382.352 132.716 382.913 132.897 382.936L132.828 383L133.455 382.991C133.009 383.023 133.354 383.878 133.462 383.651C134.016 383.392 133.183 383.624 133.347 383.218C133.455 382.991 133.836 383.369 134.076 383.56L134.322 383.173C134.672 383.484 134.115 383.396 134.604 383.547L134.569 382.787C135.55 383.403 134.52 381.944 135.54 382.429C135.487 382.922 135.861 382.64 136.13 382.931L136.691 382.095C136.871 382.119 136.806 382.528 136.845 382.365C137.206 382.412 136.812 381.951 136.882 381.855C137.19 381.983 137.335 381.246 137.925 381.748C138.759 381.516 137.331 380.933 138.067 380.698C138.487 380.912 137.833 381.167 138.408 381.239L138.681 380.606C138.821 380.793 139.202 381.171 138.966 381.294C140.542 380.25 143.103 380.961 143.6 379.265C144.187 379.42 143.8 379.619 143.983 379.989C144.106 378.576 145.971 379.358 146.534 378.489L146.166 378.194C148.174 377.894 148.516 375.961 149.957 374.978L149.579 374.947C149.35 374.493 149.526 374.203 149.508 373.84C149.719 373.93 150.205 374.559 150.324 374.069C150.126 374.062 149.876 374.134 149.735 373.947C150.634 373.719 151.441 372.942 152.27 372.018C153.081 371.11 153.868 370.003 154.775 369.197C155.149 368.503 155.573 367.794 156.046 367.103C156.519 366.412 157.024 365.756 157.513 365.082C158.002 364.409 158.492 363.703 158.932 363.011C159.16 362.673 159.372 362.319 159.585 361.964C159.797 361.61 159.96 361.237 160.124 360.864C159.925 361.301 159.03 360.574 159.433 360.392C160.504 360.417 160.653 359.994 160.722 359.519C160.806 359.06 160.793 358.565 161.608 358.415C161.746 357.431 162.384 356.747 162.907 356.042C163.169 355.673 163.414 355.32 163.546 354.913C163.678 354.505 163.698 354.011 163.539 353.461L164.042 353.662C164.378 353.51 164.056 353.3 164.117 353.022L164.246 353.093C164.695 352.583 164.519 351.636 164.892 351.387L164.341 351.134C164.439 350.759 164.852 351.138 164.692 350.62L164.967 350.746L164.614 350.089C165.586 350.523 165.099 349.102 165.664 348.993C165.67 348.449 165.596 347.407 166.051 346.765C166.609 346.82 166.91 345.908 167.375 345.415C167.498 344.826 167.642 344.123 167.852 343.389C168.03 342.654 168.243 341.887 168.535 341.173L167.849 341.014L167.898 340.62C168.044 340.675 168.128 340.629 168.192 340.698C169.036 340.615 168.196 339.774 168.748 339.581C168.086 339.621 168.59 339.823 168.499 340.033C168.094 340.248 167.519 339.797 167.977 339.469L168.123 339.524L167.842 339.15C168.382 339.254 168.687 339.035 169.227 339.138C169.379 337.825 168.663 336.775 169.208 335.51C169.484 335.636 169.51 335.39 169.568 335.177C169.626 334.965 169.733 334.772 170.219 334.988C169.957 334.121 169.363 334.955 168.69 334.467C168.748 334.255 168.495 333.981 168.89 333.997C169.115 334.137 169.553 333.923 169.611 334.124L169.616 333.58C169.7 333.533 169.827 333.67 169.89 333.739C169.683 333.137 169.932 332.685 170.164 332.249C170.396 331.813 170.612 331.359 170.386 330.839C170.028 330.726 170.222 331.212 169.864 331.099C169.231 330.036 170.655 330.306 170.232 329.333L170.9 329.54C170.584 329.198 170.145 329.032 170.592 328.588C171.22 328.547 171.052 329.051 171.322 329.309C171.385 328.965 171.288 328.104 170.718 328.313C170.554 327.894 171.102 327.8 171.292 327.593C171.144 327.571 170.849 327.938 170.579 327.681C170.962 327.168 171.03 326.313 171.106 325.64C171.254 325.662 171.503 325.622 171.566 325.691C170.814 325.117 172.194 325.237 172.043 324.489Z" fill="#FF7800"/>

                    <path d="M163.555 290.964L163.544 291.228C163.661 291.183 163.827 291.156 164.006 291.212L163.555 290.964Z" fill="#FF7800"/>

                    <path d="M166.448 302.734C166.497 302.753 166.546 302.771 166.627 302.791C166.597 302.724 166.514 302.737 166.448 302.734Z" fill="#FF7800"/>

                    <path d="M168.098 305.427C167.924 305.239 167.8 305.449 167.678 305.592C167.794 305.58 167.945 305.537 168.098 305.427Z" fill="#FF7800"/>

                    <path d="M159.647 285.187C159.729 285.207 159.812 285.193 159.93 285.148C159.799 285.11 159.732 285.141 159.647 285.187Z" fill="#FF7800"/>

                    <path d="M151.712 268.299C151.711 268.332 151.71 268.364 151.658 268.412C151.693 268.38 151.711 268.332 151.712 268.299Z" fill="#FF7800"/>

                    <path d="M151.39 269.671C151.405 269.721 151.469 269.756 151.582 269.811C151.568 269.728 151.488 269.675 151.39 269.671Z" fill="#FF7800"/>

                    <path d="M161.482 289.324C161.529 289.375 161.592 289.444 161.723 289.449C161.679 289.332 161.58 289.328 161.482 289.324Z" fill="#FF7800"/>

                    <path d="M151.807 269.92L151.879 270.17C151.913 270.139 151.946 270.14 151.98 270.108L151.807 269.92Z" fill="#FF7800"/>

                    <path d="M151.595 267.964C151.624 268.064 151.701 268.183 151.697 268.281C151.786 268.104 151.725 268.003 151.595 267.964Z" fill="#FF7800"/>

                    <path d="M156.19 279.248L156.206 279.265C156.533 279.344 156.371 279.271 156.19 279.248Z" fill="#FF7800"/>

                    <path d="M153.304 270.38L153.303 270.413L153.484 270.403L153.304 270.38Z" fill="#FF7800"/>

                    <path d="M151.213 266.891C151.244 266.926 151.293 266.944 151.375 266.931C151.361 266.881 151.379 266.833 151.349 266.766C151.281 266.829 151.247 266.86 151.213 266.891Z" fill="#FF7800"/>

                    <path d="M155.318 275.332C155.069 275.372 154.919 275.416 154.817 275.478C154.863 275.562 154.979 275.55 155.318 275.332Z" fill="#FF7800"/>

                    <path d="M242.809 51.4417C242.743 51.439 242.645 51.4349 242.529 51.4466C242.643 51.4677 242.726 51.4547 242.809 51.4417Z" fill="#FF7800"/>

                    <path d="M242.489 67.7436L242.348 67.5563C242.376 67.6893 242.423 67.7407 242.489 67.7436Z" fill="#FF7800"/>

                    <path d="M241.449 41.6839C241.482 41.6852 241.482 41.6852 241.515 41.6865C241.472 41.5363 241.446 41.3374 241.361 41.0041L241.449 41.6839Z" fill="#FF7800"/>

                    <path d="M236.336 101.511L236.394 101.3C236.357 101.397 236.321 101.461 236.336 101.511Z" fill="#FF7800"/>

                    <path d="M241.212 81.7281C241.308 81.7978 241.353 81.9148 241.382 82.0148C241.42 81.8845 241.424 81.7858 241.212 81.7281Z" fill="#FF7800"/>

                    <path d="M245.653 34.8209L245.355 35.2214C245.506 35.1777 245.645 35.0183 245.653 34.8209Z" fill="#FF7800"/>

                    <path d="M240.275 25.6154C240.258 25.6311 240.241 25.6467 240.207 25.6779C240.24 25.6792 240.257 25.6636 240.275 25.6154Z" fill="#FF7800"/>

                    <path d="M240.385 29.9752C240.448 30.0438 240.544 30.1137 240.656 30.168C240.595 30.0666 240.534 29.9324 240.385 29.9752Z" fill="#FF7800"/>

                    <path d="M240.799 30.2897C240.75 30.2712 240.703 30.2196 240.654 30.2011C240.701 30.2527 240.732 30.3202 240.799 30.2897Z" fill="#FF7800"/>

                    <path d="M171.704 210.382C171.497 210.605 171.564 210.987 171.597 211.367L171.704 210.382Z" fill="#FF7800"/>

                    <path d="M225.4 130.62L225.274 130.482C225.304 130.55 225.352 130.601 225.4 130.62Z" fill="#FF7800"/>

                    <path d="M174.154 212.912L173.968 213.02C174.051 213.006 174.118 212.976 174.154 212.912Z" fill="#FF7800"/>

                    <path d="M248.285 39.9332C248.755 40.1332 248.479 40.8653 248.828 40.7634C248.693 40.4444 248.846 39.9221 248.285 39.9332Z" fill="#FF7800"/>

                    <path d="M235.654 143.449L235.58 143.644C235.617 143.547 235.635 143.498 235.654 143.449Z" fill="#FF7800"/>

                    <path d="M174.154 212.913L174.391 212.79C174.326 212.754 174.26 212.752 174.195 212.716C174.191 212.815 174.173 212.864 174.154 212.913Z" fill="#FF7800"/>

                    <path d="M208.825 158.925C208.827 158.892 208.828 158.859 208.814 158.809L208.825 158.925Z" fill="#FF7800"/>

                    <path d="M207.311 160.031C207.349 159.9 207.37 159.786 207.409 159.656C207.272 159.782 207.266 159.914 207.311 160.031Z" fill="#FF7800"/>

                    <path d="M171.581 211.35L171.526 211.908C171.599 211.746 171.606 211.549 171.581 211.35Z" fill="#FF7800"/>

                    <path d="M196.684 175.757C196.703 175.708 196.739 175.644 196.757 175.595C196.706 175.642 196.67 175.707 196.684 175.757Z" fill="#FF7800"/>

                    <path d="M241.582 80.4392C241.616 80.4078 241.651 80.3436 241.67 80.295C241.588 80.2752 241.522 80.2725 241.582 80.4392Z" fill="#FF7800"/>

                    <path d="M249.793 94.321C249.67 94.5304 249.886 94.902 250.139 95.1432C250.198 94.8981 250.142 94.6649 249.793 94.321Z" fill="#FF7800"/>

                    <path d="M252.598 82.0027L252.564 82.0014C252.564 82.0014 252.564 82.0014 252.598 82.0027Z" fill="#FF7800"/>

                    <path d="M252.339 84.961C252.255 85.007 252.186 85.07 252.134 85.15C252.235 85.0883 252.319 85.0424 252.339 84.961Z" fill="#FF7800"/>

                    <path d="M242.802 131.416C242.914 131.091 243.027 130.733 243.141 130.375C243.239 130 243.352 129.642 243.467 129.251C243.679 128.485 243.893 127.686 244.09 126.903C244.303 126.104 244.5 125.321 244.761 124.573C244.892 124.2 245.005 123.842 245.152 123.485C245.281 123.144 245.41 122.803 245.555 122.479C245.012 121.618 245.293 120.789 245.412 119.887L246.458 120.159L246.375 119.348C246.778 119.166 246.367 119.957 246.943 119.585L246.401 119.102C246.794 119.183 247.28 117.374 247.601 118.82C247.919 117.893 248.253 116.983 248.538 116.056C248.776 115.455 247.788 115.417 248.257 114.826C248.605 114.79 248.377 115.127 248.77 115.208C249.483 114.297 249.183 113.56 248.799 112.837C248.433 112.098 248.017 111.373 248.547 110.504L248.638 110.705C248.456 110.303 248.662 109.701 248.515 109.646C247.395 109.603 248.99 110.159 248.199 110.54C247.337 110.226 247.937 109.673 247.266 109.532C247.709 109.187 247.279 108.791 247.345 108.382C248.091 107.884 247.936 106.823 248.773 106.526C248.591 106.124 247.79 105.532 247.934 104.83C248.755 104.516 248.582 105.119 249.003 104.509L248.501 104.275C248.721 103.724 248.848 103.86 249.076 103.935C249.249 103.332 248.492 103.27 249.014 102.598L249.421 103.142C249.364 102.53 249.503 102.338 249.716 101.572C250.01 101.649 249.915 101.958 249.791 102.168C250.658 101.938 249.625 101.37 249.749 101.161C249.501 101.168 249.282 101.686 248.835 101.307C249.015 100.951 248.313 100.331 248.995 100.209L249.402 100.752C249.174 99.8536 248.847 100.187 249.246 99.3127C249.276 99.3798 249.408 99.385 249.505 99.4217C248.957 98.6919 249.709 98.0623 249.941 97.2147L250.049 97.4002C249.949 97.0174 249.515 96.7204 249.588 96.5585C249.191 96.9878 249.066 96.8182 248.54 96.7647C249.532 96.2927 247.745 95.597 248.444 94.6358C248.738 94.7132 249.056 95.0221 248.682 95.2711C249.519 95.798 250.238 95.9908 250.522 96.7103C250.392 96.2604 250.379 95.7657 250.735 95.9443L249.937 95.6661C249.964 95.42 250.038 95.2252 250.077 95.062C249.574 94.8611 249.14 95.3878 248.884 94.7683C248.73 94.0869 249.799 94.5899 249.443 94.4112C249.283 93.4824 248.622 93.9014 249.051 93.0945C249.113 93.1957 249.221 93.3812 249.119 93.4431C249.57 92.9006 249.229 91.9483 250.253 91.9223C250.463 92.0458 250.757 92.1232 250.633 92.3325L250.485 92.3103C251.097 93.1084 250.377 91.713 251.254 92.0767C250.711 92.039 250.976 91.1927 251.122 90.836L250.478 90.8603C248.841 89.2973 251.672 91.1211 251.642 89.8185C251.347 88.9503 251.417 90.0897 251.075 89.5492C251.261 89.0293 251.828 88.8867 251.681 88.0408C251.952 87.8537 252.332 87.4402 253.04 87.4843C252.831 86.949 253.544 86.0378 252.915 85.6673C252.224 86.4311 253.521 86.597 252.513 87.4637L251.884 87.0932C251.994 86.4221 251.799 85.5249 252.081 85.0746C251.929 85.1511 251.763 85.1776 251.634 85.1066C251.476 84.112 250.846 83.7744 251.147 82.8636C251.777 82.7894 251.607 83.3264 251.622 83.7553C252.189 83.2009 251.731 83.117 252.031 82.2062C252.576 82.211 251.94 82.8287 252.445 82.9967C252.427 82.6335 252.407 82.3033 252.389 81.9401C252.422 81.9414 252.455 81.9427 252.503 81.9611C251.622 81.729 252.634 81.1754 252.43 80.5085C252.557 78.9979 251.381 78.6884 250.69 77.8048C250.946 77.6006 251.18 77.5438 251.406 77.6515C250.996 77.9979 251.296 77.9437 251.537 78.1014C251.475 77.5883 252.488 77.0348 252.838 77.345C252.623 76.5294 252.349 77.6059 252.105 77.1022L252.232 76.0034C251.765 76.117 251.635 76.4908 251.312 75.9016C251.216 75.4201 251.324 75.1937 251.366 74.5529C251.593 74.6605 252.066 74.3825 252.031 74.8588C252.207 74.5692 252.26 74.0771 251.805 73.8946C251.349 74.5687 251.439 72.7436 250.709 73.2587L251.165 72.5846C251.158 72.7491 251.455 72.7607 251.363 73.0042C252.08 72.818 251.187 72.4372 251.115 72.1873C251.273 71.9464 251.331 71.3226 251.598 71.2671C251.392 71.0449 251.562 70.5079 251.913 70.4063C251.777 70.088 251.452 70.3883 251.225 70.2806L251.286 69.1792C251.668 69.1118 252.761 69.0226 252.903 69.1765C252.541 68.7505 251.754 69.0328 251.796 68.3919C252.169 68.5548 252.309 68.3625 252.482 68.1716C252.655 67.9806 252.81 67.8055 253.278 68.0709C253.821 67.6967 253.765 66.6402 253.557 66.0719C252.96 65.7356 253.234 66.7183 252.625 66.678C252.359 65.0861 250.676 65.0534 250.906 63.8598L250.745 64.1665C250.345 63.459 250.441 63.5286 249.895 63.1449C250.648 63.3061 251.914 62.2023 251.665 61.0065C251.272 60.9253 250.992 61.7216 250.371 61.5655C250.316 61.2998 250.244 61.0499 250.188 60.7841C250.257 60.7209 250.386 60.7918 250.481 60.8944C250.162 60.2065 251.346 59.4949 250.46 59.3615L251.501 58.529L251.042 58.857C250.665 58.7929 250.482 58.0115 250.306 57.8564C249.792 57.095 250.087 56.7605 250.519 56.2667C250.232 56.4367 249.554 56.8715 249.364 56.2546C250.592 56.1048 249.668 54.8661 250.314 54.809C250.274 54.5603 250.592 54.0456 250.079 54.075L250.841 54.0059C249.766 54.0792 249.688 53.1371 249.385 52.4664C250.856 52.4085 249.152 51.6995 250.411 51.172C249.42 51.1992 249.799 49.962 248.957 49.9786C248.814 49.4458 249.726 49.3332 250.015 49.1303L249.61 48.9333C250.004 48.5697 249.915 47.5119 250.09 46.8434L249.116 46.4429L249.458 46.1597C249.228 46.1178 248.999 45.6641 248.737 46.0327L248.733 45.7196C247.785 45.8967 248.385 45.3435 247.862 44.8124C247.984 44.636 248.199 44.6279 248.36 44.733C248.306 44.4344 248.8 44.4537 249.074 44.2008C248.882 44.4734 247.139 43.4828 246.92 44.4133C246.551 44.5636 246.172 44.1534 246.268 43.8112L247.059 43.4302L246.107 43.2942C245.877 42.8734 246.353 42.5295 246.369 42.1348C246.519 42.5031 248.182 42.5845 247.908 41.6018C248.152 42.1056 248.674 42.2577 248.913 42.4812C248.905 42.2668 248.943 42.1365 249.379 42.3676C248.93 41.6417 248.807 42.23 248.508 41.4605C249.257 41.3085 249.45 41.036 249.513 40.2807C249.372 40.5058 249.248 40.7151 249.107 40.9403C249.008 40.9364 248.926 40.9167 248.878 40.8983C248.852 41.1115 248.75 41.2064 248.465 41.3106C248.439 41.1448 247.319 40.6563 247.725 40.4086C246.791 41.4923 246.45 39.3044 245.91 39.9918C245.664 39.9657 245.47 39.4474 245.839 39.2971C246.579 39.7872 246.545 38.5833 247.092 38.5223C246.802 38.3462 246.686 39.1819 246.315 38.9532C246.165 38.585 246.545 38.1715 246.704 37.8976L246.881 38.0198C246.94 37.7751 246.983 37.5461 247.041 37.3342C246.644 37.3516 246.598 38.0912 246.238 37.5994C246.345 37.4058 245.985 36.9141 246.284 36.8598C246.858 36.9646 247.468 36.5601 247.747 36.9993C247.564 36.6298 247.085 35.4249 246.577 36.1464L246.464 35.6807C246.25 36.0678 245.947 37.0444 245.553 36.1723L245.703 36.1288L244.962 35.6715L245.259 35.2713C245.074 35.3464 244.878 35.3058 244.805 35.0559C245.008 34.932 245.019 34.6689 245.303 34.5975C245.032 33.928 244.678 34.1284 244.431 34.1023C244.248 33.7327 244.338 33.555 244.832 33.5743C244.739 33.027 244.345 32.155 244.579 31.6534C244.009 31.0711 244.473 31.847 243.854 31.6251C244.871 30.5611 243.458 29.1715 242.84 28.126C241.886 28.8795 242.586 27.8855 241.521 28.1075C241.962 28.2071 241.907 26.7058 242.616 27.5407L242.242 26.9989C242.648 26.3393 243.118 27.7745 243.668 26.824C243.348 26.169 241.975 26.2636 242.03 25.2938C242.908 25.2128 241.521 24.8127 242.42 24.6172C242.766 24.6471 242.788 24.9116 242.929 25.0983L243.02 24.8877C242.804 24.105 242.523 24.1105 242.204 24.2463C241.885 24.3821 241.512 24.6311 241.077 24.367C240.566 23.5399 241.331 23.405 241.669 23.1876C241.76 22.977 241.412 22.601 241.121 22.4578C241.834 22.7822 241.122 23.6604 240.545 23.6544C241.204 22.8564 239.987 22.3312 239.545 22.2644C239.246 23.9331 239.906 23.1352 239.494 24.75C239.839 24.78 240.597 24.3977 240.613 25.2385C240.029 24.9851 240.191 25.4692 240.134 25.6482C240.511 25.3004 240.531 26.0425 240.807 26.1686C240.528 26.5202 239.6 26.2039 239.733 26.9998L240.853 26.6646C240.822 27.0094 240.035 26.8798 240.544 27.361C239.87 27.2852 239.733 27.8235 239.216 27.1279C238.734 28.4599 240.322 28.3572 241.042 28.9289C240.944 28.8922 240.794 28.9357 240.696 28.899C241.042 28.9289 241.162 29.2301 241.286 29.4327C241.229 30.0235 240.666 29.2438 240.409 29.4808L240.741 30.2516C240.707 30.2832 240.689 30.299 240.672 30.3148C240.898 30.4554 241.073 30.6105 240.834 30.7989C240.393 30.6993 240.01 30.7667 239.666 30.7038L240.734 31.2398C240.336 31.2901 240.4 32.1493 239.907 31.6852L240.537 32.8465L239.845 33.2313C240.066 33.4706 240.217 33.4271 240.183 33.0468C240.164 33.5074 242.107 34.4399 240.609 34.7438C241.553 35.489 241.453 35.9299 242.17 36.9793C241.207 36.2828 241.638 38.2929 241.012 37.4448C240.87 38.1147 241.7 37.9823 241.965 38.3716C241.779 38.8915 241.002 38.9106 240.587 38.5649L241.099 38.9803L240.948 39.0238L241.513 39.3588C241.274 39.959 240.806 39.6937 240.835 40.2055L241.515 40.1167L241.233 40.567C241.506 40.347 241.71 40.6021 241.877 40.9546L241.727 40.9981L241.975 41.4032C241.459 41.0865 241.94 41.8466 241.416 41.7602C241.483 42.1418 241.499 42.1589 241.803 42.7967L242.225 42.5661C242.836 43.3643 241.557 42.7706 241.708 43.5179L242.21 43.3398C241.598 44.6009 243.134 44.9903 242.767 45.8985C242.537 45.4777 241.949 45.7348 242.115 45.7083C242.469 46.3317 242.54 47.4382 243.326 48.0125C242.616 48.4132 242.398 48.5199 242.201 49.303C242.346 49.8029 242.409 49.8712 242.901 49.9563C242.68 50.5078 243.289 51.3718 242.74 51.4986C243.2 51.5495 242.721 51.9591 243.141 52.1732L242.923 52.28L243.439 52.1519C242.373 53.2305 244.339 53.5708 243.439 54.623L243.279 54.485L243.546 54.8413C243.311 54.931 243.151 54.793 242.853 54.8143C242.874 55.1116 242.913 55.3932 242.934 55.6905L242.981 56.5655L243.344 56.1678C243.428 56.5335 243.981 56.7199 243.715 57.1872C242.832 56.5762 243.757 57.7819 243.156 57.9561L242.89 57.5998C243.002 58.0984 243.002 58.0984 243.533 58.0203C243.787 58.6727 242.569 58.5922 243.207 59.1443L243.208 58.6995C243.512 58.5466 243.98 58.812 244.001 59.1093C243.915 59.1884 243.708 59.4109 243.617 59.2097C243.861 59.7134 243.646 60.5452 243.884 60.7687C243.74 61.0596 243.346 61.0112 243.204 60.8574C243.479 61.3953 243.474 61.5269 243.452 61.6743C243.446 61.8059 243.425 61.9204 243.683 62.4741L243.37 62.4783L243.751 62.8556L243.132 63.4575L243.521 63.2256C243.605 63.5913 243.811 63.8135 243.678 64.2531L243.222 64.1035C243.382 64.6204 243.204 64.943 243.061 65.2339C242.933 65.5419 242.839 65.8183 243.166 66.3088C243.08 66.3878 242.938 66.234 242.859 66.1485C243.598 67.0505 242.07 66.8756 242.958 67.7669C242.812 67.7117 242.626 67.8198 242.496 67.7818L242.792 68.2052L242.166 68.1807L243.077 68.5128L242.439 68.7845L242.746 68.9447C241.572 69.3931 242.454 70.0371 241.572 70.6286L242.336 70.5266C242.732 70.921 242.897 71.3393 242.88 71.767C242.862 72.1946 242.712 72.65 242.544 73.1212C242.361 73.5753 242.161 74.0452 242.026 74.5177C241.909 74.9744 241.856 75.4666 242.002 75.9336L241.394 75.8604L242.072 76.6611C241.561 77.0366 241.555 76.3774 241.253 76.4974C241.549 77.3326 242.128 76.894 242.255 77.8544C241.806 78.3311 241.817 77.6561 241.613 77.401C241.856 78.3166 242.066 79.6756 241.678 80.2865C241.76 80.3062 241.873 80.36 241.907 80.3284C242.146 80.9637 241.769 81.7233 241.742 82.3812C241.464 82.3209 241.438 82.1551 241.394 82.0052C241.335 82.25 241.108 82.5541 241.379 82.7789L240.88 82.4793C240.728 82.9676 241.1 83.987 240.471 84.0284C240.72 83.9887 241.179 84.0725 241.078 84.5133C240.116 84.6405 241.309 85.7579 240.722 86.3939C240.512 86.2704 240.532 85.777 240.494 85.9073C240.217 86.226 240.598 86.6033 240.848 86.9425L240.491 86.7968C240.6 87.3612 240.677 87.9242 240.769 88.5044C239.808 88.5987 240.657 90.0651 240.005 89.842C239.883 90.4302 240.501 89.4165 240.471 90.1731C240.053 90.3051 240.542 90.8678 239.952 90.746L239.89 90.6447L239.836 91.1697L239.309 90.7373C239.356 91.2004 239.901 91.6171 240.342 91.7167C239.948 92.0802 240.103 92.7287 239.522 92.8213L239.414 92.6359C239.431 93.8556 237.418 94.2548 238.248 95.358C238.146 95.4199 238 95.3648 238.038 95.2345L237.862 95.936L237.46 95.6732C237.607 96.1073 237.77 96.5584 237.901 97.0083L237.607 96.931C237.313 97.6773 237.179 98.9406 237.039 99.9565L236.931 99.771C237.114 100.964 236.38 100.754 236.51 101.616C236.43 101.564 236.414 101.547 236.4 101.497L236.239 102.215L235.984 101.975C236.235 102.314 235.941 102.648 235.652 102.851C235.363 103.054 235.078 103.158 235.395 103.088C235.578 103.458 235.785 104.059 236.123 104.253C235.927 105.036 235.691 104.335 235.311 104.749C235.124 105.302 235.609 105.551 235.12 106.224L234.827 106.114C234.779 106.474 234.916 106.76 234.814 107.266L234.705 107.081C235.078 108.067 233.537 107.81 234.635 108.824C234.311 109.092 234.283 109.783 233.698 109.562C233.751 110.684 233.685 111.506 233.593 112.573C232.592 112.418 233.584 112.803 232.824 113.218L233.347 113.337C233.138 114.038 232.6 114.692 232.029 115.345C231.458 115.998 230.918 116.686 230.755 117.47L230.233 117.318L230.674 117.829C230.247 118.603 229.765 119.491 229.335 120.331C228.921 121.187 228.493 121.994 228.22 122.626C228.297 123.156 228.641 124.043 228.172 124.634L228.143 124.534C227.893 125.809 227.559 127.131 226.705 128.267C226.547 128.096 226.33 128.137 226.255 127.953C226.663 128.496 225.944 128.715 225.819 128.957L226.32 128.812C226.627 129.384 225.937 129.703 225.492 129.702C225.58 129.969 225.668 130.236 225.739 130.519C225.656 130.533 225.573 130.546 225.491 130.526L225.697 130.748L224.905 130.75C224.963 130.95 224.765 131.766 225.255 132.296C225.026 132.254 224.596 132.682 224.68 132.224L223.496 134.171L223.884 133.972C224.387 134.173 224.39 134.931 224.018 135.147C223.828 134.53 223.356 134.775 222.91 134.774C223.026 135.174 223.456 134.746 223.643 135.017C223.716 135.267 223.703 135.596 223.625 135.89C223.564 136.167 223.423 136.392 223.257 136.419L223.17 136.119C223.097 136.693 222.149 136.458 221.932 136.944C222.088 137.559 221.572 137.687 222.45 138.018C222.29 138.704 221.759 137.958 221.587 138.116C221.815 138.603 221.127 139.301 220.652 139.2C221.67 140.162 219.359 140.583 220.289 141.245C220.023 141.301 219.74 141.372 219.458 141.41C219.715 141.585 220.259 142.002 220.141 142.459C219.638 142.669 219.223 142.324 218.894 142.278L219.737 143.085C218.6 143.848 217.793 145.036 217.017 146.257C216.63 146.868 216.209 147.478 215.757 148.053C215.304 148.629 214.82 149.17 214.259 149.593C214.054 150.161 213.862 150.846 213.603 151.528C213.474 151.868 213.345 152.209 213.184 152.516C213.006 152.839 212.812 153.144 212.586 153.415L212.545 153.2L211.514 154.214L212.511 153.643C212.465 153.971 212.502 154.285 212.343 154.526C211.712 155.045 211.01 155.66 210.404 156.378C210.092 156.728 209.796 157.128 209.565 157.531C209.317 157.95 209.102 158.37 208.95 158.858C209.359 160.604 207.529 158.901 207.667 160.389C207.624 160.239 207.497 160.103 207.437 159.969C207.087 161.273 206.894 161.957 206.802 163.436C205.813 162.574 206.361 164.127 205.852 163.646L206.216 164.039C205.785 164.088 205.304 164.564 205.052 164.258L205.265 165.106L204.798 164.841C204.328 165.432 203.77 166.992 202.644 166.668C202.541 167.174 202.357 167.661 202.088 168.194C201.836 168.712 201.485 169.225 201.134 169.739C200.4 170.764 199.534 171.752 198.774 172.612C198.934 173.129 198.581 173.708 198.299 174.158L197.438 174.224C197.268 174.761 197.576 175.712 196.926 175.867C196.878 175.816 196.831 175.765 196.832 175.732C196.613 176.251 196.011 176.458 196.178 177.222C195.78 177.684 195.159 177.94 194.783 177.431C195.596 178.138 193.888 178.352 193.888 178.352C193.888 178.352 193.56 178.718 192.99 179.338C192.403 179.974 191.589 180.914 190.603 182.045C190.118 182.62 189.581 183.241 188.993 183.91C188.422 184.563 187.815 185.281 187.174 186.03C186.551 186.764 185.891 187.561 185.232 188.359C184.573 189.157 183.879 189.987 183.217 190.851C177.793 197.657 172.141 205.624 171.899 210.408C172.141 210.945 171.946 211.695 172.614 211.902C172.411 212.438 171.536 212.041 171.865 212.466C172.622 212.117 172.78 213.523 173.742 213.396L173.543 213.833C173.778 214.155 173.624 213.062 174.081 213.591L173.401 212.856C173.756 212.655 174.054 212.634 174.396 212.73C174.334 212.217 173.436 211.177 174.453 210.903L174.345 211.13C174.763 210.586 175.118 211.209 175.333 211.201L175.213 211.312L175.977 211.177C175.428 211.304 175.583 212.364 175.794 212.043C176.539 211.578 175.48 212.047 175.766 211.498C175.977 211.177 176.307 211.602 176.529 211.808L176.948 211.264C177.298 211.574 176.621 211.597 177.178 211.685L177.35 210.703C178.348 211.335 177.525 209.623 178.615 210.011C178.424 210.663 178.954 210.206 179.172 210.544L180.112 209.329C180.327 209.32 180.139 209.873 180.231 209.663C180.66 209.646 180.319 209.106 180.422 209.011C180.747 209.123 181.151 208.117 181.707 208.649C182.766 208.18 181.234 207.692 182.194 207.219C182.632 207.417 181.788 207.878 182.433 207.854L182.947 206.968C183.054 207.186 183.4 207.595 183.077 207.83C185.291 206.137 188.129 206.561 189.246 204.232C189.903 204.324 189.361 204.665 189.493 205.082C190.08 203.21 192.049 203.897 192.991 202.649L192.64 202.338C195.098 201.561 196.091 199.03 198.085 197.477L197.655 197.493C197.511 196.96 197.827 196.511 197.911 196.053C198.122 196.144 198.504 196.9 198.796 196.22C198.581 196.228 198.262 196.364 198.138 196.161C199.261 195.727 200.462 194.588 201.704 193.253C202.947 191.917 204.213 190.402 205.498 189.216C206.148 188.237 206.88 187.277 207.628 186.334C208.376 185.392 209.172 184.467 209.986 183.527C211.563 181.661 213.124 179.778 214.374 177.834C213.988 178.411 213.249 177.51 213.771 177.25C216.183 177.179 214.967 175.007 216.9 174.555C217.157 173.906 217.525 173.377 217.942 172.866C218.358 172.355 218.805 171.911 219.221 171.433C220.052 170.477 220.785 169.484 220.893 168.022L221.361 168.288C221.78 168.123 221.529 167.817 221.708 167.461L221.82 167.548C222.18 167.216 222.381 166.746 222.58 166.309C222.779 165.872 222.927 165.482 223.197 165.328L222.7 164.963C222.968 164.463 223.26 164.985 223.271 164.31L223.528 164.485L223.398 163.623C224.264 164.25 224.324 162.358 224.972 162.235C225.199 161.519 225.551 160.149 226.295 159.304C226.869 159.409 227.558 158.266 228.259 157.684C228.636 156.925 229.084 156.036 229.617 155.101C230.15 154.167 230.685 153.166 231.314 152.301L230.7 151.981L230.935 151.479C231.064 151.55 231.18 151.538 231.192 151.654C232.099 151.673 231.621 150.435 232.271 150.279C231.58 150.219 231.995 150.565 231.82 150.822C231.299 151.049 230.931 150.342 231.54 149.971L231.67 150.042L231.559 149.51C232.061 149.744 232.466 149.529 232.952 149.746C233.365 148.922 233.48 148.119 233.661 147.319C233.842 146.519 234.054 145.753 234.613 144.984C235.057 145.429 235.126 143.719 235.87 144.522C236.049 143.343 235.021 144.291 234.607 143.501C234.767 143.227 234.668 142.811 235.042 142.941C235.198 143.178 235.733 143.001 235.705 143.28L235.998 142.567C236.098 142.538 236.156 142.738 236.168 142.853C236.333 141.213 238.021 140.702 238.082 139.189C237.779 138.93 237.734 139.636 237.43 139.377C237.362 137.793 238.586 138.566 238.676 137.153L239.019 137.627C238.876 137.094 238.544 136.736 239.239 136.285C239.86 136.441 239.44 137.018 239.555 137.45C239.679 137.241 239.826 136.852 239.873 136.524C239.903 136.179 239.831 135.929 239.498 135.982C239.539 135.374 240.131 135.43 240.404 135.21C240.275 135.139 239.814 135.533 239.699 135.1C240.332 134.548 240.823 133.431 241.253 132.591C241.382 132.662 241.628 132.688 241.673 132.805C241.3 131.819 242.529 132.46 242.802 131.416Z" fill="#FF7800"/>

                    <path d="M252.728 81.6284L252.597 82.003C252.729 82.0082 252.892 82.0477 253.033 82.2348L252.728 81.6284Z" fill="#FF7800"/>

                    <path d="M249.552 99.5065C249.599 99.5579 249.63 99.6251 249.677 99.6766C249.681 99.578 249.616 99.5422 249.552 99.5065Z" fill="#FF7800"/>

                    <path d="M249.588 104.06C249.535 103.729 249.312 103.967 249.126 104.075C249.241 104.096 249.388 104.118 249.588 104.06Z" fill="#FF7800"/>

                    <path d="M251.642 71.2728C251.705 71.3411 251.785 71.3937 251.918 71.3656C251.806 71.2789 251.725 71.2593 251.642 71.2728Z" fill="#FF7800"/>

                    <path d="M249.062 43.0178C249.044 43.0665 249.042 43.0995 248.991 43.1469C249.042 43.0995 249.061 43.0507 249.062 43.0178Z" fill="#FF7800"/>

                    <path d="M248.475 44.7574C248.488 44.8405 248.534 44.9249 248.628 45.0607C248.634 44.8958 248.571 44.8273 248.475 44.7574Z" fill="#FF7800"/>

                    <path d="M251.578 78.1321C251.59 78.2481 251.636 78.3324 251.763 78.4363C251.77 78.2716 251.691 78.186 251.578 78.1321Z" fill="#FF7800"/>

                    <path d="M248.829 45.3502L248.847 45.7462C248.88 45.7475 248.913 45.7489 248.963 45.7345L248.829 45.3502Z" fill="#FF7800"/>

                    <path d="M249.018 42.4874C249.029 42.6363 249.087 42.8366 249.065 42.9842C249.188 42.7747 249.145 42.6245 249.018 42.4874Z" fill="#FF7800"/>

                    <path d="M250.55 60.9474C250.566 60.9646 250.566 60.9646 250.565 60.9975C250.867 61.2578 250.726 61.0704 250.55 60.9474Z" fill="#FF7800"/>

                    <path d="M250.216 46.8277C250.199 46.8436 250.215 46.8607 250.198 46.8766L250.393 46.9508L250.216 46.8277Z" fill="#FF7800"/>

                    <path d="M248.846 40.7485C248.876 40.8156 248.923 40.8668 249.003 40.9194C249.006 40.8536 249.009 40.7879 249.013 40.6892C248.946 40.7195 248.879 40.7498 248.846 40.7485Z" fill="#FF7800"/>

                    <path d="M250.926 54.9414C250.682 54.8498 250.517 54.8437 250.401 54.8559C250.446 54.9731 250.542 55.0427 250.926 54.9414Z" fill="#FF7800"/>

                    <path d="M163.743 244.385C163.74 244.451 163.721 244.532 163.7 244.646C163.736 244.549 163.74 244.451 163.743 244.385Z" fill="#FF7800"/>

                    <path d="M170.984 247.104L170.879 247.232C170.929 247.217 170.981 247.17 170.984 247.104Z" fill="#FF7800"/>

                    <path d="M159.267 243.367C159.268 243.334 159.268 243.334 159.269 243.301C159.204 243.298 159.106 243.262 158.942 243.255L159.267 243.367Z" fill="#FF7800"/>

                    <path d="M186.809 252.354L186.709 252.35C186.742 252.351 186.774 252.386 186.809 252.354Z" fill="#FF7800"/>

                    <path d="M177.387 248.979C177.441 248.867 177.508 248.836 177.559 248.822C177.494 248.786 177.444 248.801 177.387 248.979Z" fill="#FF7800"/>

                    <path d="M156.786 237.389C156.813 237.522 156.874 237.656 156.934 237.79C156.925 237.608 156.85 237.424 156.786 237.389Z" fill="#FF7800"/>

                    <path d="M154.268 239.953C154.317 239.971 154.384 239.941 154.469 239.894C154.403 239.892 154.388 239.842 154.268 239.953Z" fill="#FF7800"/>

                    <path d="M154.568 239.866C154.551 239.882 154.501 239.896 154.451 239.911C154.484 239.912 154.517 239.913 154.568 239.866Z" fill="#FF7800"/>

                    <path d="M248.202 235.313C248.305 235.185 248.103 234.896 247.965 234.643L248.202 235.313Z" fill="#FF7800"/>

                    <path d="M202.474 255.222L202.434 255.385C202.453 255.336 202.471 255.288 202.474 255.222Z" fill="#FF7800"/>

                    <path d="M245.265 233.356L245.383 233.311C245.317 233.309 245.3 233.324 245.265 233.356Z" fill="#FF7800"/>

                    <path d="M159.472 236.317C159.62 235.926 159.931 236.4 159.93 236.021C159.762 236.08 159.544 235.775 159.472 236.317Z" fill="#FF7800"/>

                    <path d="M206.83 240.595L206.914 240.582C206.865 240.563 206.848 240.579 206.83 240.595Z" fill="#FF7800"/>

                    <path d="M245.265 233.356L245.131 233.416C245.195 233.452 245.261 233.454 245.325 233.49C245.295 233.423 245.263 233.389 245.265 233.356Z" fill="#FF7800"/>

                    <path d="M220.169 254.96C220.152 254.976 220.151 255.009 220.149 255.042L220.169 254.96Z" fill="#FF7800"/>

                    <path d="M221.237 255.435C221.185 255.482 221.117 255.545 221.065 255.592C221.163 255.629 221.2 255.532 221.237 255.435Z" fill="#FF7800"/>

                    <path d="M247.966 234.643L247.817 234.275C247.813 234.373 247.873 234.507 247.966 234.643Z" fill="#FF7800"/>

                    <path d="M231.264 252.055C231.229 252.086 231.212 252.102 231.177 252.134C231.211 252.135 231.245 252.103 231.264 252.055Z" fill="#FF7800"/>

                    <path d="M176.823 248.642C176.808 248.592 176.792 248.574 176.761 248.54C176.741 248.622 176.738 248.688 176.823 248.642Z" fill="#FF7800"/>

                    <path d="M184.651 240.038C184.728 240.157 184.937 239.901 185.064 239.626C184.967 239.589 184.865 239.651 184.651 240.038Z" fill="#FF7800"/>

                    <path d="M185.725 239.968C185.709 239.951 185.693 239.934 185.694 239.9C185.709 239.951 185.725 239.968 185.725 239.968Z" fill="#FF7800"/>

                    <path d="M179.269 237.793L179.268 237.827C179.268 237.827 179.268 237.827 179.269 237.793Z" fill="#FF7800"/>

                    <path d="M180.612 238.016C180.625 238.099 180.64 238.15 180.67 238.217C180.657 238.134 180.644 238.051 180.612 238.016Z" fill="#FF7800"/>

                    <path d="M201.479 238.833C200.884 238.875 200.201 239.03 199.504 239.135C199.156 239.171 198.824 239.224 198.478 239.227C198.149 239.214 197.821 239.168 197.561 239.059C197.184 239.819 196.806 239.788 196.405 239.904L196.548 238.821L196.174 239.104C196.105 238.755 196.444 238.949 196.296 238.515L196.057 239.148C196.105 238.755 195.314 238.757 195.967 238.09L194.772 237.862C194.511 237.785 194.457 238.723 194.19 238.399C194.186 238.086 194.33 238.207 194.378 237.813C193.642 236.845 192.967 239.687 192.202 239.031L192.306 238.903C192.098 239.159 191.854 239.067 191.798 239.213C191.689 240.297 192.052 238.662 192.206 239.344C192.005 240.227 191.793 239.757 191.666 240.444C191.532 240.093 191.315 240.579 191.133 240.588C190.943 239.971 190.436 240.281 190.368 239.52C190.159 239.775 189.829 240.62 189.499 240.607C189.414 239.862 189.69 239.955 189.44 239.615L189.287 240.137C189.045 240.012 189.133 239.867 189.192 239.622C188.932 239.546 188.819 240.284 188.555 239.894L188.854 239.428C188.568 239.565 188.473 239.462 188.148 239.35C188.226 239.057 188.356 239.095 188.434 239.213C188.417 238.405 188.044 239.478 187.949 239.376C187.94 239.606 188.148 239.763 187.93 240.249C187.771 240.111 187.41 240.888 187.419 240.245L187.718 239.779C187.26 240.107 187.397 240.393 187.029 240.098C187.063 240.067 187.069 239.935 187.105 239.837C186.718 240.449 186.498 239.764 186.107 239.65L186.211 239.522C186.024 239.663 185.841 240.118 185.76 240.065C185.928 240.418 185.823 240.546 185.736 241.07C185.625 240.159 185.074 241.968 184.702 241.359C184.78 241.066 184.975 240.727 185.028 241.059C185.376 240.199 185.554 239.463 185.93 239.115C185.709 239.288 185.459 239.361 185.589 238.987L185.359 239.802C185.243 239.814 185.164 239.729 185.082 239.709C184.913 240.213 185.128 240.618 184.804 240.885C184.465 241.103 184.822 240.012 184.709 240.37C184.237 240.616 184.361 241.231 184.029 240.871C184.08 240.824 184.184 240.696 184.198 240.779C183.999 240.392 183.505 240.785 183.627 239.784C183.718 239.573 183.796 239.279 183.858 239.381L183.836 239.528C184.29 238.886 183.55 239.665 183.832 238.803C183.745 239.327 183.373 239.131 183.23 239.01L183.156 239.617C182.198 241.294 183.451 238.425 182.82 238.532C182.362 238.861 182.911 238.734 182.616 239.101C182.408 238.945 182.413 238.401 181.994 238.566C181.939 238.3 181.804 237.948 181.931 237.261C181.658 237.481 181.322 236.808 181.065 237.458C181.32 238.111 181.586 236.819 181.827 237.801L181.554 238.433C181.262 238.323 180.806 238.585 180.636 238.298C180.646 238.447 180.64 238.612 180.584 238.758C180.099 238.92 179.842 239.57 179.459 239.258C179.517 238.634 179.758 238.792 179.94 238.782C179.764 238.248 179.663 238.689 179.279 238.41C179.366 237.886 179.555 238.503 179.708 237.982L179.21 238.061C179.212 238.028 179.213 237.995 179.231 237.947C178.982 238.811 178.892 237.785 178.553 238.003C177.882 237.861 177.538 239.035 177.018 239.674C176.962 239.408 176.972 239.177 177.063 238.967C177.144 239.399 177.19 239.071 177.281 238.86C177.032 238.9 176.957 237.891 177.135 237.568C176.715 237.766 177.181 238.064 176.892 238.3L176.403 238.149C176.384 238.61 176.544 238.749 176.218 239.049C175.984 239.139 175.889 239.036 175.612 238.943C175.703 238.732 175.657 238.236 175.852 238.309C175.744 238.124 175.533 238.033 175.367 238.472C175.612 238.943 174.778 238.762 174.879 239.524L174.635 239.053C174.716 239.073 174.761 238.778 174.856 238.88C174.901 238.173 174.553 239.033 174.436 239.078C174.359 238.927 174.067 238.817 174.094 238.537C173.972 238.714 173.749 238.507 173.747 238.161C173.561 238.269 173.662 238.619 173.571 238.83L173.083 238.679C173.131 238.285 173.257 237.218 173.361 237.091C173.117 237.411 173.101 238.218 172.825 238.125C173.117 237.411 172.52 237.487 172.917 236.645C172.841 236.081 172.365 236.013 172.062 236.166C171.792 236.733 172.294 236.554 172.171 237.143C171.408 237.245 171.095 238.898 170.598 238.533L170.706 238.718C170.315 239.016 170.367 238.936 170.1 239.437C170.311 238.703 170.019 237.356 169.422 237.431C169.324 237.807 169.622 238.198 169.466 238.785L169.084 238.853C169.054 238.786 169.125 238.656 169.178 238.576C168.806 238.792 168.693 237.502 168.493 238.384L168.291 237.239L168.37 237.737C168.273 238.112 167.891 238.179 167.787 238.307C167.36 238.67 167.274 238.337 167.096 237.835C167.133 238.15 167.203 238.878 166.902 238.965C167.05 237.751 166.329 238.448 166.405 237.808C166.273 237.803 166.107 237.417 166.054 237.91L166.15 237.155C166.009 238.205 165.584 238.122 165.215 238.273C165.438 236.83 164.833 238.34 164.787 237.019C164.633 237.986 164.147 237.357 164.015 238.176C163.75 238.199 163.853 237.28 163.816 236.965L163.67 237.322C163.574 236.84 163.084 236.722 162.816 236.398L162.485 237.243L162.402 236.844C162.344 237.056 162.108 237.178 162.227 237.513L162.081 237.458C162.009 238.411 161.857 237.696 161.543 238.113C161.484 237.946 161.509 237.732 161.58 237.603C161.433 237.581 161.518 237.089 161.449 236.773C161.538 237.008 160.837 238.448 161.215 238.891C161.232 239.288 160.974 239.558 160.849 239.388L160.784 238.528L160.584 239.411C160.365 239.518 160.272 238.97 160.111 238.865C160.294 238.822 160.588 237.251 160.094 237.232C160.346 237.126 160.496 236.67 160.652 236.495C160.554 236.458 160.508 236.374 160.687 236.018C160.281 236.266 160.534 236.54 160.151 236.64C160.198 235.867 160.093 235.616 159.757 235.355L159.998 235.925C159.994 236.024 159.959 236.089 159.94 236.137C160.019 236.223 160.064 236.34 160.068 236.654C159.986 236.634 159.601 237.592 159.554 237.128C159.901 238.329 158.874 238.041 159.108 238.776C159.066 239.005 158.801 239.028 158.783 238.664C159.103 238.083 158.554 237.798 158.608 237.272C158.484 237.482 158.849 237.843 158.689 238.117C158.506 238.159 158.36 237.692 158.271 237.457L158.359 237.312L158.076 236.971C158.027 237.365 158.363 237.626 158.091 237.813C158.015 237.662 157.744 237.849 157.756 237.552C157.876 237.03 157.789 236.317 158.025 236.194C157.824 236.253 157.21 236.344 157.479 237.047L157.25 237.005C157.401 237.341 157.807 237.917 157.358 238.015L157.364 237.85L157.061 238.416L156.912 238.014C156.921 238.196 156.865 238.375 156.766 238.371C156.742 238.139 156.663 238.054 156.659 237.74C156.443 237.781 156.444 238.161 156.419 238.374C156.302 238.419 156.259 238.269 156.343 237.811C156.215 237.707 155.998 237.781 156.097 237.372C155.985 237.698 156.057 237.536 155.939 238.026C155.976 237.928 155.997 237.814 156.018 237.699C155.962 237.845 155.941 237.96 155.886 238.106C155.866 238.188 155.831 238.252 155.795 238.317C155.776 238.366 155.757 238.447 155.721 238.512C155.686 238.576 155.65 238.641 155.614 238.705C155.596 238.754 155.56 238.819 155.542 238.868C155.401 239.093 155.33 239.222 155.244 239.301L155.21 239.333C155.193 239.349 155.176 239.364 155.176 239.364C155.193 239.349 155.176 239.364 155.193 239.349C155.193 239.349 155.193 239.349 155.21 239.333C155.227 239.317 155.244 239.301 155.26 239.318L154.591 239.556C154.573 239.572 154.558 239.555 154.54 239.57C154.573 239.572 154.558 239.555 154.508 239.569C154.508 239.569 154.49 239.585 154.475 239.568L154.457 239.584C154.44 239.599 154.425 239.582 154.407 239.598L154.374 239.597C154.374 239.597 154.374 239.597 154.49 239.585C154.407 239.598 154.374 239.597 154.374 239.597C154.39 239.614 154.39 239.614 154.374 239.597L154.44 239.599C154.44 239.599 154.44 239.599 154.39 239.614C154.324 239.611 154.407 239.598 154.519 239.685C154.631 239.772 154.805 239.96 154.913 240.146C154.883 240.078 154.929 240.163 154.959 240.23C154.99 240.297 155.005 240.314 154.99 240.297C154.991 240.264 154.945 240.18 154.867 240.061L154.897 240.128C155.005 240.314 154.972 240.313 154.988 240.33C154.972 240.313 154.972 240.313 154.972 240.313C154.972 240.313 154.957 240.296 154.974 240.28C154.975 240.247 154.959 240.23 154.945 240.18C154.917 240.047 154.924 239.882 154.928 239.783C154.932 239.685 154.934 239.619 154.936 239.586C154.937 239.553 154.937 239.553 154.938 239.52C154.94 239.487 154.958 239.438 154.977 239.39C154.995 239.341 155.013 239.292 155.049 239.228C155.086 239.13 155.136 239.115 155.136 239.115C155.136 239.115 155.119 239.131 155.068 239.179C155.05 239.195 155.032 239.243 155.031 239.276C155.029 239.309 154.995 239.341 154.994 239.374C154.955 239.504 154.953 239.57 154.991 239.44C155.011 239.358 155.049 239.228 155.1 239.18C155.136 239.115 155.203 239.085 155.153 239.1C155.153 239.1 155.12 239.098 155.103 239.114L155.07 239.113C155.053 239.129 155.037 239.112 155.037 239.112C155.004 239.11 154.987 239.126 154.971 239.109C154.938 239.108 154.905 239.106 154.873 239.105C154.84 239.104 154.824 239.087 154.791 239.086C154.758 239.084 154.725 239.083 154.693 239.049C154.66 239.047 154.645 239.03 154.612 239.029C154.612 239.029 154.596 239.012 154.579 239.028L154.563 239.011C153.994 238.807 153.409 238.586 152.873 238.384C153.442 238.588 153.994 238.807 154.563 239.011L154.579 239.028L154.612 239.029C154.628 239.046 154.66 239.047 154.676 239.065C154.725 239.083 154.758 239.084 154.807 239.103C154.855 239.121 154.937 239.141 154.987 239.126C155.02 239.127 155.053 239.129 155.086 239.13C155.119 239.131 155.119 239.131 155.136 239.115C155.136 239.115 155.186 239.101 155.153 239.1L155.136 239.115C155.119 239.131 155.066 239.212 155.029 239.309C154.975 239.422 154.95 239.636 154.955 239.916C154.953 239.982 154.951 240.015 154.965 240.098C154.963 240.131 154.978 240.181 154.976 240.214C154.992 240.231 154.991 240.264 154.991 240.264C154.991 240.264 154.99 240.297 155.007 240.281C154.992 240.231 155.022 240.298 154.991 240.264C154.991 240.264 154.991 240.264 154.961 240.197C154.93 240.13 154.868 240.028 154.838 239.961C154.791 239.91 154.838 239.961 154.854 239.978C154.838 239.961 154.806 239.927 154.792 239.877C154.746 239.793 154.683 239.724 154.634 239.706L154.713 239.792L154.697 239.774L154.666 239.74C154.634 239.706 154.618 239.689 154.618 239.689C154.618 239.689 154.602 239.672 154.587 239.655C154.571 239.638 154.571 239.638 154.555 239.62C154.539 239.603 154.506 239.602 154.49 239.585C154.539 239.603 154.555 239.62 154.555 239.62C154.41 239.532 154.298 239.445 154.338 239.282C154.112 239.141 153.962 239.185 153.942 239.267C153.905 239.364 154 239.467 154.147 239.522C154.228 239.542 154.31 239.561 154.393 239.548C154.426 239.549 154.509 239.536 154.509 239.536C154.526 239.52 154.559 239.522 154.576 239.506L154.609 239.507L154.626 239.491L154.743 239.446L154.76 239.431C154.811 239.416 154.843 239.417 154.894 239.403C154.977 239.39 155.044 239.359 155.078 239.328C155.011 239.358 154.876 239.419 154.809 239.449C154.944 239.388 155.011 239.358 155.061 239.343C155.111 239.329 155.111 239.329 155.145 239.297C155.042 239.392 154.957 239.471 154.838 239.549C154.72 239.627 154.587 239.655 154.451 239.748C154.482 239.782 154.514 239.817 154.53 239.834C154.561 239.868 154.593 239.902 154.626 239.904C154.592 239.935 154.608 239.952 154.59 239.968C154.742 239.892 154.843 239.83 154.701 240.088C154.427 240.341 154.136 240.61 153.866 240.764C154.182 240.694 154.452 240.54 154.689 240.384C154.584 240.545 154.576 240.743 154.57 240.874C154.564 241.039 154.541 241.186 154.31 241.21C154.57 241.286 154.833 241.33 155.08 241.323C155.037 241.585 154.993 241.847 154.967 242.093C155.201 242.004 155.224 241.856 155.031 241.717C155.142 241.836 155.483 241.553 155.703 241.413C155.923 241.273 156.088 241.28 155.976 242.017C156.268 241.716 156.437 241.623 156.637 241.565C156.822 241.49 157.021 241.465 157.292 241.277C156.868 241.986 157.816 242.188 157.342 242.5C157.625 242.84 157.675 242.001 157.878 241.877C158.08 242.199 157.999 242.97 157.774 243.242L158.019 242.889L158.013 243.053L158.244 242.617C158.475 243.039 158.296 243.394 158.522 243.502L158.583 242.812L158.732 243.213C158.662 242.897 158.816 242.755 158.999 242.713L158.993 242.877L159.196 242.753C158.981 243.174 159.388 242.893 159.285 243.4C159.466 243.423 159.466 243.423 159.8 243.305L159.753 242.841C160.197 242.463 159.758 243.534 160.102 243.597L160.107 243.053C160.581 243.978 160.968 242.575 161.306 243.182C161.087 243.289 161.111 243.933 161.118 243.768C161.438 243.6 161.942 243.768 162.298 243.122C162.365 243.916 162.373 244.131 162.688 244.506C162.92 244.482 162.972 244.402 163.089 243.977C163.29 244.299 163.768 243.888 163.746 244.448C163.846 244.007 163.939 244.555 164.103 244.182L164.109 244.429L164.148 243.887C164.461 245.119 164.915 243.274 165.235 244.342L165.146 244.486L165.352 244.297C165.358 244.544 165.271 244.656 165.225 244.984L166.042 245.181L165.927 244.748C166.111 244.706 166.279 244.201 166.447 244.554C166.037 245.313 166.725 244.614 166.699 245.24L166.494 245.43C166.726 245.406 166.726 245.406 166.78 244.88C167.116 244.728 166.869 245.939 167.221 245.392L167.025 245.351C167.005 245.021 167.203 244.616 167.35 244.639C167.364 244.722 167.436 244.972 167.334 245.034C167.606 244.846 167.939 245.173 168.079 244.98C168.187 245.166 168.089 245.541 168.018 245.671C168.611 245.281 168.243 245.811 168.836 245.422L168.791 245.717L169.019 245.38L169.173 246.062L169.141 245.648C169.307 245.622 169.463 245.414 169.636 245.635L169.487 246.058C170.022 245.881 169.932 246.883 170.499 246.328C170.512 246.411 170.424 246.556 170.372 246.603C170.91 245.948 170.553 247.451 171.128 246.666C171.073 246.812 171.098 247.011 171.06 247.142L171.301 246.887L171.194 247.493L171.509 246.631L171.533 247.275L171.659 247C171.677 248.188 172.106 247.38 172.251 248.293L172.331 247.521C172.838 246.799 173.206 247.094 173.569 247.487C173.949 247.898 174.307 248.423 174.813 248.146L174.69 248.734L175.178 248.094C175.273 248.609 174.961 248.58 174.964 248.894C175.42 248.631 175.295 248.049 175.777 247.953C175.941 248.404 175.611 248.391 175.456 248.567C175.926 248.354 176.627 248.151 176.859 248.539C176.879 248.457 176.916 248.36 176.917 248.327C177.256 248.109 177.572 248.451 177.884 248.48C177.823 248.758 177.723 248.787 177.639 248.833C177.752 248.887 177.859 249.106 178.001 248.847L177.784 249.334C177.992 249.49 178.552 249.1 178.494 249.724C178.52 249.478 178.62 249.036 178.815 249.11C178.728 250.047 179.453 248.838 179.694 249.408C179.603 249.619 179.355 249.626 179.421 249.628C179.542 249.897 179.789 249.511 179.997 249.255L179.884 249.614L180.772 249.269C180.685 250.205 181.529 249.299 181.338 249.951C181.615 250.044 181.192 249.483 181.556 249.465C181.573 249.861 181.923 249.347 181.768 249.935L181.716 249.982L181.98 249.992L181.694 250.542C181.928 250.452 182.214 249.902 182.314 249.461C182.447 249.846 182.786 249.628 182.763 250.188L182.659 250.316C183.275 250.191 183.262 252.137 183.909 251.222C183.923 251.305 183.883 251.468 183.819 251.433L184.16 251.561L183.978 251.983L184.709 251.435L184.631 251.728C184.986 251.94 185.63 251.916 186.141 251.919L186.037 252.047C186.677 251.709 186.499 252.444 186.971 252.199C186.951 252.281 186.917 252.312 186.9 252.328L187.261 252.375L187.134 252.651C187.538 252.056 187.737 253.647 187.678 253.068C187.887 252.812 188.228 252.528 188.341 252.17C188.735 252.219 188.358 252.567 188.56 252.888C188.836 252.981 188.989 252.459 189.321 252.819L189.243 253.112C189.442 253.087 189.598 252.912 189.846 252.905L189.741 253.033C190.275 252.477 190.081 254.019 190.676 252.773C190.797 253.041 191.164 252.924 191.042 253.512C191.631 253.222 192.08 253.124 192.631 252.964C192.541 253.967 192.748 252.92 192.97 253.538L193.042 252.997C193.798 253.059 194.416 254.518 195.26 254.436L195.189 254.977L195.442 254.426C195.653 254.517 195.879 254.625 196.123 254.717C196.367 254.809 196.61 254.901 196.838 254.976C197.327 255.127 197.784 255.243 198.144 255.323C198.418 255.07 198.87 254.494 199.207 254.722L199.154 254.802C199.857 254.566 200.555 254.428 201.248 254.835C201.173 255.063 201.232 255.23 201.128 255.358C201.365 254.79 201.556 255.374 201.719 255.414L201.518 255.093C201.768 254.608 202.011 255.145 202.078 255.527L202.463 254.981C202.477 255.031 202.506 255.131 202.503 255.197L202.597 254.92L202.699 255.65C202.804 255.522 203.271 255.375 203.447 254.706C203.453 254.954 203.759 255.147 203.49 255.269C203.881 255.383 204.29 255.481 204.698 255.58L204.527 255.326C204.532 254.782 204.941 254.468 205.095 254.738C204.814 255.155 205.031 255.494 205.097 255.909C205.29 255.636 204.968 255.425 205.079 255.133C205.307 254.795 205.759 254.632 205.848 254.866L205.725 255.076C206.029 254.89 206.106 255.833 206.388 255.794C206.669 255.376 206.818 255.778 206.822 254.855C207.192 254.671 206.929 255.485 207.056 255.589C207.238 255.168 207.739 255.435 207.802 255.915C208.038 254.556 208.787 256.432 208.867 255.281L209.171 255.919C209.183 255.623 209.244 254.933 209.496 254.794C209.731 255.117 209.66 255.658 209.729 255.974L209.875 254.826C210.542 255.445 211.299 255.508 212.088 255.572C212.483 255.587 212.878 255.603 213.288 255.668C213.698 255.734 214.072 255.864 214.459 256.077C214.778 255.941 215.134 255.707 215.487 255.54C215.857 255.356 216.242 255.223 216.636 255.271L216.563 255.433L217.346 255.662L216.737 255.209C216.891 255.067 216.984 254.823 217.148 254.83C218.024 255.194 219.227 255.636 220.148 254.881C220.583 253.496 220.782 255.944 221.252 254.908C221.214 255.038 221.223 255.22 221.201 255.367C221.817 254.798 222.142 254.53 222.673 253.627C222.869 254.905 223.106 253.512 223.194 254.192L223.15 253.663C223.37 253.935 223.748 253.966 223.782 254.347L223.926 253.643L224.086 254.161C224.501 254.095 225.237 253.447 225.724 254.456C226.124 253.927 226.715 253.604 227.383 253.399C228.035 253.177 228.765 253.074 229.413 252.951C229.449 252.474 229.785 252.322 230.055 252.168L230.579 252.667C230.789 252.378 230.807 251.505 231.225 251.785C231.255 251.852 231.252 251.918 231.251 251.951C231.475 251.713 231.895 251.927 231.922 251.268C232.239 251.165 232.694 251.348 232.835 251.947C232.64 251.461 232.823 251.419 233.051 251.494C233.279 251.569 233.567 251.778 233.567 251.778C233.567 251.778 233.634 251.747 233.768 251.72C233.885 251.675 234.085 251.617 234.318 251.56C234.553 251.47 234.837 251.366 235.172 251.247C235.507 251.128 235.876 250.978 236.295 250.813C237.939 250.118 240.145 249.001 242.224 247.334C243.264 246.501 244.274 245.568 245.157 244.53C245.607 244.02 246.024 243.476 246.392 242.946C246.585 242.673 246.744 242.399 246.936 242.127C247.096 241.852 247.24 241.561 247.399 241.287C247.543 240.996 247.669 240.721 247.796 240.445C247.922 240.17 248 239.876 248.094 239.599C248.281 239.046 248.418 238.507 248.472 237.982C248.526 237.456 248.546 236.962 248.483 236.482C248.42 236.001 248.305 235.568 248.125 235.132C247.744 234.754 247.65 234.24 247.03 234.051C246.995 233.703 247.888 234.051 247.456 233.721C246.954 233.899 246.315 232.967 245.556 232.971L245.567 232.707C245.263 232.481 245.779 233.177 245.217 232.809L246.036 233.352C245.801 233.442 245.571 233.433 245.245 233.321C245.496 233.661 246.585 234.462 245.856 234.532L245.862 234.401C245.717 234.725 245.208 234.243 245.028 234.22C245.045 234.204 245.062 234.188 245.063 234.155C244.866 234.147 244.668 234.14 244.471 234.132C244.883 234.131 244.385 233.386 244.327 233.599C243.874 233.795 244.589 233.642 244.527 233.953C244.471 234.132 244.054 233.819 243.797 233.644L243.654 233.935C243.285 233.673 243.792 233.776 243.32 233.609L243.494 234.209C242.496 233.609 243.697 234.91 242.693 234.442C242.643 234.044 242.355 234.247 242.085 233.989L241.714 234.585C241.551 234.545 241.531 234.215 241.526 234.347C241.183 234.251 241.627 234.697 241.576 234.744C241.285 234.601 241.278 235.178 240.688 234.677C239.994 234.715 241.333 235.444 240.688 235.501C240.286 235.238 240.817 235.16 240.328 235.009L240.178 235.465C240.037 235.278 239.656 234.9 239.839 234.858C239.538 234.978 239.157 235.012 238.779 234.981C238.401 234.95 237.975 234.867 237.631 234.804C236.909 234.71 236.319 234.621 236.181 235.193C235.699 234.877 235.996 234.856 235.812 234.519C235.825 235.014 235.447 234.983 234.991 234.833C234.551 234.7 234.082 234.468 233.908 234.692L234.207 235.05C233.427 234.756 233.026 234.905 232.653 235.154C232.467 235.262 232.28 235.403 232.094 235.511C231.908 235.62 231.674 235.709 231.41 235.699L231.666 235.907C231.813 236.341 231.659 236.484 231.648 236.747C231.507 236.56 231.206 235.856 231.078 236.164C231.206 236.268 231.384 236.358 231.49 236.576C230.842 236.287 230.211 236.394 229.576 236.6C229.243 236.686 228.908 236.805 228.591 236.908C228.257 236.994 227.908 237.063 227.562 237.066C227.204 237.332 226.801 237.514 226.399 237.663C225.965 237.811 225.515 237.909 225.066 238.007C224.152 238.185 223.256 238.315 222.465 238.697C222.717 238.591 222.92 239.704 222.647 239.512C222.12 238.667 221.9 238.806 221.726 239.031C221.536 239.237 221.36 239.527 220.904 238.965C220.474 239.394 219.937 239.224 219.427 239.188C218.934 239.136 218.455 239.166 218.108 239.994L217.998 239.462C217.825 239.241 217.826 239.62 217.692 239.681L217.681 239.532C217.291 239.385 216.937 239.998 216.698 239.774L216.773 240.37C216.556 240.444 216.61 239.919 216.414 240.29L216.377 239.976L216.204 240.579C216.099 239.503 215.577 240.588 215.349 240.1C215.094 240.305 214.594 240.829 214.156 240.664C214.029 240.115 213.5 240.16 213.147 239.915C212.513 240.088 211.58 240.316 210.746 240.135L210.784 240.829L210.568 240.87C210.558 240.721 210.544 240.638 210.564 240.556C210.381 239.774 210.059 240.801 209.865 240.315C209.971 240.946 210.025 240.42 210.14 240.441C210.324 240.778 210.149 241.447 209.916 241.092L209.922 240.927L209.759 241.3C209.731 240.755 209.593 240.502 209.566 239.957C208.867 240.094 208.336 240.997 207.588 240.737C207.695 240.131 207.039 240.864 207.246 239.817C206.769 240.194 207.277 240.675 207.05 241.392C206.936 241.371 206.776 241.645 206.775 241.266C206.851 241.005 206.701 240.636 206.821 240.526L206.505 240.596C206.492 240.513 206.547 240.366 206.583 240.302C205.933 240.87 205.541 239.552 204.957 240.123C204.892 240.5 205.167 240.247 205.102 240.623C204.496 241.342 204.686 239.898 204.122 240.387L204.275 239.865C204.08 240.204 203.962 240.661 203.733 240.207C203.758 239.581 204.017 239.723 204.176 239.449C204.013 239.41 203.497 239.505 203.59 240.086C203.335 240.257 203.308 239.712 203.2 239.527C203.177 239.674 203.38 239.962 203.205 240.219C202.923 239.846 202.43 239.793 202.055 239.696C202.077 239.549 202.087 239.318 202.122 239.254C201.727 240.063 201.93 238.702 201.479 238.833Z" fill="#FF7800"/>

                    <path d="M179.126 237.673L179.269 237.794C179.308 237.663 179.33 237.516 179.452 237.373L179.126 237.673Z" fill="#FF7800"/>

                    <path d="M187.087 239.763C187.121 239.731 187.14 239.682 187.175 239.618C187.125 239.632 187.107 239.681 187.087 239.763Z" fill="#FF7800"/>

                    <path d="M189.226 239.096C189.058 239.189 189.148 239.39 189.174 239.556C189.213 239.425 189.251 239.295 189.226 239.096Z" fill="#FF7800"/>

                    <path d="M174.162 238.399C174.214 238.352 174.234 238.27 174.239 238.138C174.202 238.236 174.166 238.3 174.162 238.399Z" fill="#FF7800"/>

                    <path d="M161.668 237.4C161.701 237.401 161.752 237.386 161.82 237.323C161.773 237.272 161.721 237.319 161.668 237.4Z" fill="#FF7800"/>

                    <path d="M177.314 238.732C177.364 238.717 177.432 238.687 177.486 238.574C177.403 238.587 177.35 238.667 177.314 238.732Z" fill="#FF7800"/>

                    <path d="M161.975 237.182L162.17 237.256C162.171 237.223 162.173 237.19 162.191 237.141L161.975 237.182Z" fill="#FF7800"/>

                    <path d="M160.726 236.304C160.807 236.324 160.906 236.328 160.969 236.396C160.877 236.227 160.796 236.208 160.726 236.304Z" fill="#FF7800"/>

                    <path d="M169.263 238.402L169.28 238.386C169.471 238.147 169.368 238.242 169.263 238.402Z" fill="#FF7800"/>

                    <path d="M162.875 236.165L162.891 236.182L162.964 236.02L162.875 236.165Z" fill="#FF7800"/>

                    <path d="M159.93 236.022C159.98 236.007 159.997 235.991 160.017 235.91C159.985 235.876 159.952 235.874 159.921 235.84C159.918 235.906 159.915 235.972 159.93 236.022Z" fill="#FF7800"/>

                    <path d="M166.628 237.118C166.553 237.346 166.515 237.476 166.51 237.607C166.56 237.593 166.629 237.497 166.628 237.118Z" fill="#FF7800"/>

                  </svg>';
                $image_short_code .= '</div>';
            $image_short_code .= '</div>';
        }

    return $image_short_code;
}

add_shortcode('content-image', 'shortcode_content_image');

function shortcode_supporting_resource( $atts = array() ) {

    $supporting_resource_description = get_field('supporting_resource_description');
    $supporting_resource_button_text = get_field('supporting_resource_button_text');
    $supporting_resource_button_link = get_field('supporting_resource_button_link');

        if(!empty($supporting_resource_description)){
            $support_resource_short_code = '<section class="support-module light-orange">';
                $support_resource_short_code .= '<div class="container">';
                  $support_resource_short_code .= '<div class="support-wrap flex flex-vcenter">';
                    $support_resource_short_code .= '<div class="support-lt shapes">';
                    $support_resource_short_code .= '<svg width="82" height="82" viewBox="0 0 82 82" fill="none" xmlns="http://www.w3.org/2000/svg">

                        <path d="m8.673 67.65.158.158c0 .157.158.315.158.315.157.158.315.473.473.63.473.316.946.632 1.419.79.473.157 1.104.157 1.735 0 .315 0 .63-.159.788-.316.789 0 4.258-1.42 3.942-1.42 2.05-.788 4.258-.63 5.993.474l3.154 2.05 3.153 2.05c1.104.63 2.208 1.419 3.47 2.05 5.046 2.365 10.88 2.365 15.927.315 1.261-.473 2.523-1.104 3.627-1.892 1.103-.789 2.05-1.577 3.153-2.366l5.835-4.888c.158-.158 11.985-9.935 11.827-9.777a7.003 7.003 0 0 0 1.261-1.735c.316-.63.631-1.419.631-2.207 0-.789-.473-1.735-.946-2.208-1.104-.946-2.365-1.42-3.942-1.262 3.311-3.627 5.992-7.727 7.727-12.3 1.892-5.361 2.05-11.511.157-17.03-.946-2.681-2.523-5.362-4.415-7.57-2.05-2.207-4.573-3.942-7.57-4.888-2.995-.946-6.15-.788-9.145.158-2.366.788-4.416 2.207-6.308 3.942a15.508 15.508 0 0 0-6.15-3.785c-2.839-.946-5.992-1.103-8.989-.315-2.996.788-5.519 2.523-7.569 4.73-5.519 5.993-7.727 15.455-4.73 24.285 1.103 3.47 2.838 6.466 4.888 9.304-.158-.157-.316-.157-.63-.315-5.362-2.05-11.04-1.577-15.928 1.104l-6.623 3.784-1.577.946c-.946.474-1.577 1.577-1.734 2.681 0 .473 0 1.104.157 1.577 0 .158.158.316.158.316l.315.157c0 .158 1.104 2.366 1.104 2.208 0 0 5.362 10.88 5.046 10.25zm17.82-48.096c.946-2.366 2.365-4.573 4.1-6.466 1.734-1.734 3.942-3.153 6.307-3.784 2.366-.631 4.889-.631 7.096.315 2.366.789 4.258 2.366 5.993 4.258.63.788 1.734.63 2.365 0C56.14 9.46 61.343 8.042 65.6 9.46c4.731 1.42 8.516 5.677 10.25 10.408 1.893 4.889 1.893 10.408.316 15.454-1.577 5.046-4.573 9.62-8.2 13.72-.316.157-.631.472-.947.63l-.63.788c-.631.474-1.262.947-1.893 1.262a49.49 49.49 0 0 1-3.942 2.208c-2.523 1.104-5.204 2.05-7.885 2.523-.473-.946-1.261-1.735-2.207-1.893-.316 0-.631-.157-.789-.157-.63-.158-.946 0-1.577-.158l-2.838-.473c-3.785-1.104-7.412-2.523-10.25-5.046l-.158-.158c-.157-.158-2.365-1.577-2.207-1.577-2.997-3.627-5.362-7.884-6.781-12.3-1.42-4.888-1.104-10.407.63-15.138zM5.362 52.984l1.577-.946 6.623-3.942c2.05-1.261 4.258-1.892 6.623-2.208 2.365-.157 4.73.158 6.938.947 1.104.473 2.208.946 3.154 1.576l3.154 2.05h-.158c3.312 2.839 7.254 4.258 11.354 5.204 1.104.158 2.05.316 3.154.473h2.05c.158 0 .315.158.473.158.63.315.946.946.63 1.577-.157.63-.788 1.262-1.576 1.735-3.47 1.419-7.57 2.207-11.354 1.261-1.892-.63-3.627-1.577-5.361-2.523a54.356 54.356 0 0 1-5.047-3.154c1.577 1.262 3.154 2.523 4.889 3.627 1.734 1.104 3.47 2.208 5.361 2.839 4.1 1.103 8.2.63 12.3-.789.947-.473 2.05-1.261 2.523-2.523a4.5 4.5 0 0 0 0-2.05h.158c.316 0 .473 0 .789-.158a35.884 35.884 0 0 0 7.096-1.734c1.419-.631 2.838-1.262 4.257-2.05.631-.316 1.42-.789 2.05-1.262l.947-.63.946-.474h.157l.158-.157c1.577-.631 3.312-.316 4.416.788.315.316.473.789.473 1.104 0 .788-.789 1.892-1.42 2.523l-12.142 9.146-5.992 4.573c-.946.789-2.05 1.577-2.996 2.208-.947.63-2.05 1.261-3.154 1.577-4.416 1.734-9.462 1.577-13.72-.473-2.05-.946-4.257-2.523-6.307-3.942l-3.312-2.05c-2.523-1.577-5.834-1.735-8.673-.631-.157 0-4.257 1.734-3.942 1.734h-.315s-.158 0-.158-.157v-.158l-.158-.158c-.158-.157-6.15-12.142-5.992-11.984l-.158-.473-.473.157V53.3s0-.158.158-.316z" fill="#FF7800"/>

                    </svg>';
                    $support_resource_short_code .= '</div>';
            $support_resource_short_code .= '<div class="support-rt">';
                $support_resource_short_code .= ''.$supporting_resource_description.'';
            if(!empty($supporting_resource_button_text && $supporting_resource_button_link)){
                $support_resource_short_code .= '<a href="'.$supporting_resource_button_link.'" class="readmore orange">'.$supporting_resource_button_text.'</a>';
            }
            $support_resource_short_code .= '</div>';
            $support_resource_short_code .= '</div></div></section>';
        }

    return $support_resource_short_code;
}

add_shortcode('supporting-resource', 'shortcode_supporting_resource');


function get_content_with_left_image(){
$content_left_desktop_image = get_field('content_left_desktop_image');
$content_left_heading = get_field('content_left_heading');
$content_left_description = get_field('content_left_description');
    

 if(empty($content_left_desktop_image)){ 
$full_width_repeater = "full_width";

}
else{
    $full_width_repeater = "";
}?>
<?php if(!empty($content_left_desktop_image || $content_left_heading || $content_left_description  )){ ?>
<section class="repeater-section pos-relative">
  <div class="container">
    <div class="repeater-wrap">
      <div class="repeater-main">
      <div class="repeater-list green flex flex-vcenter">
        <?php if(!empty($content_left_desktop_image)){ ?>
        <div class="repeater-image pos-relative">
          <div class="repeater-thumb-wrap">
            <figure class="repeater-thumb object-fit">
              <img src="<?php echo $content_left_desktop_image['url']; ?>" alt="<?php echo $content_left_desktop_image['alt']; ?>">
            </figure>
            <div class="tp-shape-6 shapes pos-absolute">
            <?php include get_theme_file_path( '/svgs/communities-career-tp-shape-6-svg.php' ); ?>            
            </div>
            <div class="tp-shape-7 shapes pos-absolute">
            <?php include get_theme_file_path( '/svgs/communities-career-tp-shape-7-svg.php' ); ?>
            </div>
          </div>
        </div>
        <?php } ?>
        <?php if(!empty($content_left_heading || $content_left_description)){ ?>
        <div class="repeater-content <?php echo $full_width_repeater; ?>">
          <h2><?php echo $content_left_heading; ?></h2>
          <?php echo $content_left_description; ?>
        </div>
        <?php } ?>
      </div>
      </div> 
    </div>
  </div>
</section>  
<?php }
}

function get_content_with_right_image(){
    $content_right_desktop_image = get_field('content_right_desktop_image');
    $content_right_heading = get_field('content_right_heading');
    $content_right_description = get_field('content_right_description');
    ?>
    <?php if(empty($content_right_desktop_image)){ 
$full_width_right_content = "full_width";

}
else{
    $full_width_repeater = "";
}?>
<?php if(!empty($content_right_desktop_image  || $content_right_heading || $content_right_description )){ ?>
<section class="repeater-section   pos-relative">
    <div class="container">
        <div class="repeater-wrap">
        <div class="repeater-main">
            <div class="repeater-list reverse pink flex flex-vcenter">
            <?php if(!empty($content_right_desktop_image)){ ?>
            <div class="repeater-image pos-relative">
                <div class="repeater-thumb-wrap">
                <figure class="repeater-thumb object-fit"> 
                    <img src="<?php echo $content_right_desktop_image['url']; ?>" alt="<?php echo $content_right_desktop_image['alt']; ?>"> 
                </figure>
                    <div class="tp-shape-1 shapes pos-absolute">
                    <?php include get_theme_file_path( '/svgs/pink-tp-shape-1-svg.php' ); ?>
                    </div>
                    <div class="tp-shape-2 shapes pos-absolute">
                    <?php include get_theme_file_path( '/svgs/pink-tp-shape-2-svg.php' ); ?>
                    </div>
                    <div class="tp-shape-3 shapes pos-absolute">
                    <?php include get_theme_file_path( '/svgs/pink-tp-shape-3-svg.php' ); ?>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="repeater-content <?php echo $full_width_right_content; ?>">
                <h2><?php echo $content_right_heading; ?></h2>
                <?php echo $content_right_description; ?>
            </div>
            </div>
        </div>
        </div>
    </div>
</section> 

<?php }
}

