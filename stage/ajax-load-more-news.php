<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables
$postType = (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
$category = (isset($_GET['category'])) ? $_GET['category'] : '';
$author_id = (isset($_GET['author'])) ? $_GET['author'] : '';
$taxonomy = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
$tag = (isset($_GET['tag'])) ? $_GET['tag'] : '';
$exclude = (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
$pageOffset = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : '';
$numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 10;
$year = (isset($_GET['year'])) ? $_GET['year'] : 0;
$month = (isset($_GET['month'])) ? $_GET['month'] : 0;
$searchblog = (isset($_GET['searchblog'])) ? $_GET['searchblog'] : 0;
$order = (isset($_GET['order'])) ? $_GET['order'] : 'DESC';
$views = (isset($_GET['option'])) ? $_GET['option'] : 0;
$postsCount = (isset($_GET['postsCount'])) ? $_GET['postsCount'] : '';

//Set up our initial query arguments
if ($searchblog != '') {
    $args = array(
        's' => $searchblog,
        'post_type' => $postType,
        'tax_query' => array(
            array (
                'taxonomy' => $taxonomy,
                'field' => 'id',
                'terms' => $category,
            )
        ),
        'author' => $author_id,
        'monthnum' => $month,
        'year' => $year,
        'posts_per_page' => $numPosts,
        'paged' => $pageOffset,
        'orderby' => 'date',
        'order' => $order,
        'post_status' => 'publish',
    );
} else {
$args = array(
        'post_type' => $postType,
        'tax_query' => array(
            array (
                'taxonomy' => $taxonomy,
                'field' => 'term_id',
                'terms' => $category,
            )
        ),
        'author' => $author_id,
        'monthnum' => $month,
        'year' => $year,
        'paged' => $pageOffset,
	      'orderby' => 'date',
        'order' => $order,
        'posts_per_page' => $numPosts,
    );
}

if (!empty($exclude)) {
    $exclude = explode(",", $exclude);
    $args['post__not_in'] = $exclude;
}

// Query by Taxonomy
if (empty($taxonomy)) {
    $args['tag'] = $tag;
} else {
    $args[$taxonomy] = $tag;
}


$myposts = new WP_Query($args);
if($myposts->have_posts()): 
?>
<div class="news-updates-wrap flex">
<?php while ($myposts->have_posts()) : $myposts->the_post();
      $news_desktop_image = get_field('news_desktop_image', $post->ID);
      $term_list = get_the_terms($post->ID, 'news_tag');
?>
<div class="news-grid violet-blue">
<?php if(!empty($news_desktop_image)){ ?>
  <div class="news-thumb">
    <figure class="object-fit">
      <a href="<?php echo get_the_permalink($post->ID); ?>">
        <img src="<?php echo $news_desktop_image['url']; ?>" alt="<?php echo $news_desktop_image['alt']; ?>">
      </a>
    </figure>
  </div>
<?php } ?>
  <div class="news-content">
    <div class="cat-wrap flex">
      <ul class="tag-links flex">
        <?php foreach($term_list as $term_single) {
            if($term_single->term_id!=40){
        ?>
            <li><a href="?news-category=<?php echo $term_single->term_id; ?>"><?php echo $term_single->name; ?></a></li>
        <?php } } ?>
      </ul>
      <div class="cat-date"><?php the_time('j M Y', $post->ID); ?></div>
    </div>
    <h4>
        <a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title(); ?>
        </a>
    </h4>
    <a href="<?php echo get_the_permalink($post->ID); ?>" class="readmore">Learn More</a>
  </div>
</div>
<?php endwhile; wp_reset_postdata(); ?>
</div>
<?php endif; ?>
