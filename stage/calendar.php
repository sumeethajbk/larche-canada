<?php
/*Template Name: Calendar Template
*/
get_header(); 

$calendar_banner_subheading = get_field('calendar_banner_subheading');
$calendar_banner_h = get_field('calendar_banner_heading');
if(empty($calendar_banner_h)){
    $calendar_banner_heading = get_the_title();
} else {
    $calendar_banner_heading = $calendar_banner_h;
}
$calendar_banner_description = get_field('calendar_banner_description');
$calendar_banner_button_text = get_field('calendar_banner_button_text');
$calendar_banner_button_link = get_field('calendar_banner_button_link');
$browse_calendar_heading = get_field('browse_calendar_heading');
$event_inquiries_sub_heading = get_field('event_inquiries_sub_heading');
    $event_inquiries_heading = get_field('event_inquiries_heading');
    $event_inquiries_email_link_text = get_field('event_inquiries_email_link_text');
    $event_inquiries_email_link = get_field('event_inquiries_email_link');
    $event_inquiries_button_text = get_field('event_inquiries_button_text');
    $event_inquiries_button_link = get_field('event_inquiries_button_link');
?>


<section class="no-banner-section pos-relative">
      <div class="no-banner-wrap">
        <div class="container">
          <div class="no-banner-main">
            <div class="no-banner-dot-left pos-absolute">
            <?php include get_theme_file_path( '/svgs/no-banner-dot-left-svg.php' ); ?>
            </div>
            <!-- end of no banner dot left -->
            <div class="no-banner-txt">
                <?php if(!empty($calendar_banner_subheading)){ ?>
                    <span class="optional-text"><?php echo $calendar_banner_subheading; ?></span>
                <?php } ?>
                <?php if(!empty($calendar_banner_heading)){ ?>
                    <h1><?php echo $calendar_banner_heading; ?></h1>
                <?php } ?>
                     <?php echo $calendar_banner_description; ?>
                <?php if(!empty($calendar_banner_button_text && $calendar_banner_button_link)){ ?>      
                    <a href="<?php echo $calendar_banner_button_link; ?>" class="button outline-btn violet"><?php echo $calendar_banner_button_text; ?></a> 
                <?php } ?>
            </div>
            <!-- end of no banner txt -->
            <div class="no-banner-dot-right pos-absolute">
            <?php include get_theme_file_path( '/svgs/no-banner-dot-right-svg.php' ); ?>  
            <!-- end of no banner dot left --> 
          </div>
          <!-- end of no banner main --> 
        </div>
      </div>
    </section>
<?php
if(isset($_GET['search'])){
  $search = $_GET['search'];?>
<script>
jQuery(document).ready(function(){
jQuery('html, body').animate({
   scrollTop: jQuery("#ajax-load-more").offset().top - 250
}, 1000);
});
</script>
<?php
}else{
  $search = "";
}
$category = $_GET['cat'];

if(isset($_GET['cat'])){?>
<script>
jQuery(document).ready(function(){
jQuery('html, body').animate({
   scrollTop: jQuery("#ajax-load-more").offset().top - 250
}, 1000);
});
</script>
<?php }
if(!empty($category)){
	$category = $category;
} else {
	$category = "";
}
$paged = max( 1, get_query_var('paged') );
    if($paged == 1){
       $pagenumber = '';
       $hide_load_more = '';
    } else {
       $pagenumber = $paged;
       $hide_load_more = 'hide_load_more';
    }
if(!empty($category)){
$args = array(
  's' => $search,
  'post_type' => 'calendar_list',
  'paged' => $paged,
  'posts_per_page' => -1,
  'tax_query' => array(
	array (
		'taxonomy' => 'calendar-list',
		'field' => 'term_id',
		'terms' => $category,
	)
  ),
  'post_status' => array('publish')
  
);
}else{
	$args = array(
		's' => $search,
		'post_type' => 'calendar_list',
		'paged' => $paged,
		'posts_per_page' => -1,
		'post_status' => array('publish')
		
	  );
}
$myposts  = new WP_Query($args);
$count    = $myposts->found_posts;
?>
<section class="calendar-container">
    <div class="container">
        <div class="calendar-wrap">
          <div class="heading flex">
            <div class="heading-lt">
              <h3>Browse Calendar</h3>
            </div>
            <div class="heading-rt">
              <div class="flexend">
                <form class="search-form flex" action="">
                  <div class="search-field form-field pos-relative">
                    <input type="search" name="search" placeholder="Search" value="<?php echo $search; ?>">
                    <input type="submit" name="submit" value="">
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="split-main flex">
            <div class="split-lt">
				<?php 
			  	$taxonomyName = "calendar-list"; 
			 	$terms = get_terms( $taxonomyName, array( 'parent' => 25, 'orderby' => 'menu_order', 'hide_empty' => false ) );
				
				?>
			  <ul class="filter-nav">
			    <li><a href="/calendar" <?php if(empty($category)){ ?> class="active" <?php } ?>>Browse All</a></li>
            	<?php foreach ( $terms as $term ) {
					if($category == $term->term_id){ $clas = "active"; }else{ $clas =""; }
					echo '<li><a class="'.$clas.'" href="?cat='.$term->term_id.'">' . $term->name . '</a></li>';   
				}
				?>
				
				</ul>
			
				<div id="ajax-load-more">
					<ul class="" data-path="<?php bloginfo('stylesheet_directory'); ?>" data-post-type="calendar_list" data-category="<?php echo $category; ?>" data-taxonomy="<?php echo $level; ?>" data-postsCount="<?php echo $count; ?>" data-pageNumber="<?php echo $pagenumber; ?>" data-author="" data-display-posts="4" data-post-in="<?php echo $inPostID; ?>" data-post-not-in="<?php echo $thePostID; ?>" data-button-text="Load More" data-searchblog="<?php echo $search ?>"></ul>
				</div>
			  </div>
        
          <aside class="sidebar">
              <div class="side-bucket violetblue">
                <div class="pos-absolute side-shape">
                <?php include get_theme_file_path( '/svgs/calendar-event-inquiries-side-shape-svg.php' ); ?>
                </div>
                <span class="optional-text"><?php echo $event_inquiries_sub_heading; ?></span>

                  <h4><?php echo $event_inquiries_heading; ?> 
                  <?php if(!empty($event_inquiries_email_link_text && $event_inquiries_email_link )){ ?>
                  <a href="mailto:<?php echo $event_inquiries_email_link; ?>"><?php echo $event_inquiries_email_link_text; ?></a>
                  <?php } ?>
                 </h4>
                 <?php if(!empty($event_inquiries_button_text && $event_inquiries_button_link )){ ?>
                  <a href="<?php echo $event_inquiries_button_link; ?>" class="button sm outline-btn white"><?php echo $event_inquiries_button_text; ?></a>
                  <?php } ?>
              </div>
          </aside>
          
          </div>
          <!--end of split main --> 
        </div>
        <!-- end of calendar wrap --> 
      </div>
</section>	

<?php echo get_feature_panel_footer(); ?>
<?php get_footer(); ?>