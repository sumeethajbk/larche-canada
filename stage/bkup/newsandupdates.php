<?php

/*Template Name: News and Updates Template

*/

get_header();

    $news_c_id = $_GET['news-category'];
    if(empty($news_c_id)){
      $news_cat_id = 40;
    } else {
      $news_cat_id = $news_c_id;
    }
  $paged = max( 1, get_query_var('paged') );
    if($paged == 1){
       $pagenumber = '';
       $hide_load_more = '';
    } else {
       $pagenumber = $paged;
       $hide_load_more = 'hide_load_more';
    }

    $featured_featured_insight_custom_select = get_field('select_featured_news', $post->ID);
    
    $def_sel_args = array(
        'post_type' => 'news_tag',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 3,
    );
      $featured_featured_insight_custom_posts = get_posts($def_sel_args);
      if(empty($featured_featured_insight_custom_select[0]->ID)){
        $featured_featured_insight_selected_first_post = $featured_featured_insight_custom_posts[0]->ID;
      } else {
        $featured_featured_insight_selected_first_post = $featured_featured_insight_custom_select[0]->ID;
      }

      if(empty($featured_featured_insight_custom_select[1]->ID)){
        $featured_featured_insight_selected_second_post = $featured_featured_insight_custom_posts[1]->ID;
      } else {
        $featured_featured_insight_selected_second_post = $featured_featured_insight_custom_select[1]->ID;
      }

      if(empty($featured_featured_insight_custom_select[2]->ID)){
        $featured_featured_insight_third_post = $featured_featured_insight_custom_posts[2]->ID;
      } else {
        $featured_featured_insight_third_post = $featured_featured_insight_custom_select[2]->ID;
      }


            if( !empty($featured_featured_insight_selected_first_post) ){

                $hero_banner_image_2x_curr1 = get_field('news_desktop_image', $featured_featured_insight_selected_first_post);
            }
            if( !empty($featured_featured_insight_selected_second_post) ){
                $hero_banner_image_2x_curr2 = get_field('news_desktop_image', $featured_featured_insight_selected_second_post);
            }
            if( !empty($featured_featured_insight_third_post) ){
                $hero_banner_image_2x_curr3 = get_field('news_desktop_image', $featured_featured_insight_third_post);
                $hero_banner_image_2x_curr3_mobile = get_field('news_mobile_image', $featured_featured_insight_third_post);
            }
      if( !empty($featured_featured_insight_third_post) ){
        $args = array(
            's' => $_GET['news-search'],
            'post_type' => 'news',
            'posts_per_page' => -1,
            'tax_query' => array(
              array (
                  'taxonomy' => 'news_tag',
                  'field' => 'term_id',
                  'terms' => $news_cat_id,
              )
            ),
            'post_status' => array('publish')
        );
      } else {
        $args = array(
            'post_type' => 'news',
            'posts_per_page' => -1,
            'tax_query' => array(
              array (
                  'taxonomy' => 'news_tag',
                  'field' => 'term_id',
                  'terms' => $news_cat_id,
              )
            ),
            'post_status' => array('publish')
        );
      }
  $myposts = get_posts( $args );
  $postsCount = count($myposts);

$newsletter_subheading = get_field('newsletter_subheading');
$newsletter_heading = get_field('newsletter_heading');
$newsletter_disclaimer = get_field('newsletter_disclaimer');
$newsletter_form_id = get_field('newsletter_form_id');

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
?>

<section class="news-banner-section pos-relative">
      <div class="container">
        <div class="news-banner-main flex">
          <div class="news-banner-left post-small">
             <div class="grids-post violetbg pos_relative">
	            <div class="news-banner-text flex">
          <?php if(!empty($hero_banner_image_2x_curr1)){ ?>
					  <div class="news-banner-img">
					  	<figure class="object-fit">
                <img src="<?php echo $hero_banner_image_2x_curr1['url']; ?>" alt="<?php echo $hero_banner_image_2x_curr1['alt']; ?>">
					  	</figure>
					  </div>
          <?php } ?>
					<div class="news-banner-cnt">
		        <div class="banner-category">Featured News</div>
			       <h2>
                <a href="<?php echo get_permalink($featured_featured_insight_selected_first_post); ?>">
                    <?php echo get_the_title($featured_featured_insight_selected_first_post); ?>
                </a>
              </h2>
			     <a href="<?php echo get_permalink($featured_featured_insight_selected_first_post); ?>" class="readmore">Learn More</a>
					</div>
				</div>
            </div>
            <div class="grids-post violetbg pos_relative">
             	<div class="news-banner-text flex">
          <?php if(!empty($hero_banner_image_2x_curr2)){ ?>
				  	<div class="news-banner-img">
				  		<figure class="object-fit">
				  			<img src="<?php echo $hero_banner_image_2x_curr2['url']; ?>" alt="<?php echo $hero_banner_image_2x_curr2['alt']; ?>">
				  		</figure>
				  	</div>
          <?php } ?>
					<div class="news-banner-cnt">
		        <div class="banner-category">Featured News</div>
		        <h2>
              <a href="<?php echo get_permalink($featured_featured_insight_selected_second_post); ?>"><?php echo get_the_title($featured_featured_insight_selected_second_post); ?>
              </a>
            </h2>
		        <a href="<?php echo get_permalink($featured_featured_insight_selected_second_post); ?>" class="readmore">Learn More</a>
					</div>
				</div>
          	</div>
          </div>
          <div class="news-banner-right bluebg post-big">
			  <div class="grids-post flex pos_relative">
              	<div class="news-banner-text">
	              <div class="banner-category">Featured News</div>
	              <h1>
                  <a href="<?php echo get_permalink($featured_featured_insight_third_post); ?>">
                    <?php echo get_the_title($featured_featured_insight_third_post); ?>
                  </a>
                </h1>
	                <a href="<?php echo get_permalink($featured_featured_insight_third_post); ?>" class="button outline-btn white">Learn More</a>
            	</div>
            <?php if(!empty($hero_banner_image_2x_curr3)){ ?>
              <div class="news-banner-image object-fit"> 
    				  	<div class="news-banner-thumb">
    					  	<picture class="object-fit">
      						  <source srcset="<?php echo $hero_banner_image_2x_curr3['url']; ?>" media="(min-width:768px)">
                    <img src="<?php echo $hero_banner_image_2x_curr3_mobile['url']; ?>" alt="<?php echo $hero_banner_image_2x_curr3['alt']; ?>"> 
    					  	</picture>
    				  	</div>
      				  <div class="grid-icon shapes pos-absolute">
      				  	<?php include get_theme_file_path( '/svgs/news-landing-banner-svg.php' ); ?>
      				  </div>
      				  <div class="grid-icon-1 shapes pos-absolute">
      				  	<?php include get_theme_file_path( '/svgs/news-landing-banner-svg2.php' ); ?>
      				  </div>
				      </div>
            <?php } ?>
            </div>
        </div>
      </div>
  	</div>
</section>

<?php if(!empty($newsletter_form_id)){ ?>
<section class="subscribe-module">
  <div class="container">
    <div class="subscribe-inner">
      <div class="subscribe-main flex">
        <div class="sub-lt">
        <?php if(!empty($newsletter_subheading)){ ?>
        	<span class="optional-text"><?php echo $newsletter_subheading; ?></span>
        <?php } ?>
        <?php if(!empty($newsletter_heading)){ ?>
          <div class="h3"><?php echo $newsletter_heading; ?></div>
        <?php } ?>
        </div>
        <div class="sub-rt">
	        <div class="subscribe-form">
	            <div class="frm_forms  with_frm_style frm_style_formidable-style">
					<?php echo FrmFormsController::get_form_shortcode( array( 'id' => $newsletter_form_id ) ); ?>
	            </div>
	            <?php if(!empty($newsletter_disclaimer)){ ?>
		            <div class="disclaimer">
		              <?php echo $newsletter_disclaimer; ?>
		            </div>
	            <?php } ?>
	        </div>
			<div class="sub-dots">
			<picture> 
              <source srcset="<?php echo get_stylesheet_directory_uri() ?>/images/subscribe-dots.svg" media="(min-width: 1024px)">
              <img src="<?php echo get_stylesheet_directory_uri() ?>/images/subscribe-dots-mobile.svg" alt="Subscribe Dots">
          	</picture>
      		</div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>

<section class="news-updates-container">
<div class="container">
<div class="nu-wrap">
  <div class="heading flex">
    <div class="heading-lt">
      <h3>Browse News &amp; Updates</h3>
    </div>
    <div class="heading-rt">
      <div class="flexend">
        <form class="search-form flex" name="form-news-search" action="" method="get">
          <div class="search-field form-field pos-relative">
            <input type="search" name="news-search" value="<?php echo $_GET['news-search']; ?>" placeholder="Search">
            <input type="submit" name="submit" value="">
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="news-updates-main">
    <ul class="filter-nav">
    	<?php
	      $categories = get_categories('taxonomy=news_tag');
        
	      $select = '<ul class="filter-nav">';
	        foreach($categories as $category){
	          if($category->count > 0){
              if($news_cat_id==$category->term_id){
                $landing_act_cls = "active";
              } else {
                $landing_act_cls = "";
              }
              if($category->term_id==40){
                $news_term_name = "Browse All";
              } else {
                $news_term_name = $category->name;
              }
	              $select.= '<li><a href="?news-category='.$category->term_id.'" class="'.$landing_act_cls.'">'.$news_term_name.'</a></li>';
	          }
	        }
	      $select.= '</ul>';
	      echo $select;
	    ?>
    </ul>
    <div id="ajax-load-more-news" class="load_more_news product-btn violet">
        <ul class="listing blog_list" id="blog_list" data-path="<?php bloginfo('stylesheet_directory'); ?>" data-taxonomy="news_tag" data-post-type="news" data-category="<?php echo $news_cat_id; ?>" data-searchblog="<?php echo $_GET['news-search']; ?>" data-postsCount="<?php echo $postsCount; ?>" data-pageNumber="<?php echo $pagenumber; ?>" data-order="" data-display-posts="6" data-post-not-in="" data-button-text="Load More">
        </ul>
    </div>
  </div>
</div>
</div>
</section>

<?php if(!empty($cta_panel_desktop_image || $cta_panel_heading || $cta_panel_description)){ ?>
<section class="feature-panel-section <?php echo $cta_panel_svg_color; ?>" style="background: <?php echo $cta_panel_colour_picker; ?>">
    <div class="container-lg">
        <div class="feature-panel-main  flex">
    <?php if(!empty($cta_panel_desktop_image)){ ?>
        <div class="feature-panel-image">
            <div class="feature-panel-thumb">
              <picture class="object-fit">
                <source srcset="<?php echo $cta_panel_desktop_image['url']; ?>" media="(min-width: 768px)">
              <img src="<?php echo $cta_panel_mobile_image['url']; ?>" alt="<?php echo $cta_panel_desktop_image['alt']; ?>">
              </picture>
            </div>
            <div class="feature-icon shapes">
              <?php include get_theme_file_path( '/svgs/community-landing-feature-svg.php' ); ?>
            </div> 
        </div>
    <?php } ?>
        <div class="feature-panel-text">
            <?php if(!empty($cta_panel_sub_heading)){ ?>
            <span class="optional-text"><?php echo $cta_panel_sub_heading; ?></span>
          <?php } ?>
          <h2>
            <?php if($cta_panel_heading1_highlight == 'yes'){ ?>
                <span>
                  <?php echo $cta_panel_heading1; ?>
                  <?php include get_theme_file_path( '/svgs/community-landing-feature-svg2.php' ); ?>
                </span>
              <?php } else { echo $cta_panel_heading1; } ?>
              <?php if($cta_panel_heading2_highlight == 'yes'){ ?>
                <span>
                  <?php echo $cta_panel_heading2; ?>
                  <?php include get_theme_file_path( '/svgs/community-landing-feature-svg2.php' ); ?>
                </span>
              <?php } else { echo $cta_panel_heading2; } ?>
              <?php if($cta_panel_heading3_highlight == 'yes'){ ?>
                <span>
                  <?php echo $cta_panel_heading3; ?>
                  <?php include get_theme_file_path( '/svgs/community-landing-feature-svg2.php' ); ?>
                </span>
              <?php } else { echo $cta_panel_heading3; } ?>
          </h2>
            <?php echo $cta_panel_description; ?>
          <?php if(!empty($cta_panel_button_text && $cta_panel_button_link)){ ?>
            <a href="<?php echo $cta_panel_button_link; ?>" class="button outline-btn white"><?php echo $cta_panel_button_text; ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
</section>
<?php } ?>

<?php get_footer();