<!doctype html>

<html <?php language_attributes(); ?>>

<head>

<meta charset="utf-8" />

<title><?php bloginfo('name'); ?> &raquo; <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico"/>

<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-16x16.png"/>

<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-32x32.png"/>

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/images/apple-icon.png"/>

<link rel="icon" type="image/vnd.microsoft.icon" sizes="150x150" href="<?php echo get_stylesheet_directory_uri(); ?>/images/ms-icon-150x150.png"/>

<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_stylesheet_directory_uri(); ?>/images/android-icon-192x192.png"/>


<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1, maximum-scale=1"/>

<link rel="stylesheet" href="https://use.typekit.net/sku3yvy.css"/>

<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100;200;300;400;500;600;700;900&family=Work+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>

<script src="https://kit.fontawesome.com/6e1f84394a.js" crossorigin="anonymous"></script>

<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=650ac9717a79f400122d6558&product=sop' async='async'></script>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<?php $main_menu       = get_field('main_menu','option'); 

$main_logo             = get_field('main_logo','option');

$main_logo_blue        = get_field('main_logo_blue','option');

$main_logo_blue        = $main_logo_blue ? $main_logo_blue : $main_logo;
$header_button_text    =    get_field('header_button_text','option');
$header_button_link = get_field('header_button_link','option');


?>

<div id="main">

  <header id="main_header" class="main_header">

    <div class="container-lg">

      <div class="header flex">

		<?php if(!empty($main_logo )){ ?>

			<div class="logo"> 

				<span class="logo-pos normal-logo"> 

					<a href="<?php echo site_url(); ?>"><img src="<?php echo $main_logo['url']; ?>" alt="<?php echo $main_logo['alt']; ?>"></a> 

				</span> 

				<span class="logo-pos fixed-logo"> 

					<a href="<?php echo site_url(); ?>"><img src="<?php echo $main_logo_blue['url']; ?>" alt="<?php echo $main_logo_blue['alt']; ?>"></a> 

				</span> 

			</div>

		<?php } ?>

        <div class="hide-in-desktop nav-btn"> <a href="<?php echo $header_button_link; ?>" class="button outline-btn white"><?php echo $header_button_text;?> </a></div>

        <div class="toggle_button flex flex-center"><span class="line line1"></span> <span class="line line2"></span> <span class="line line3"></span></div>

        <div class="header_right mobile_menu flex">

          <div class="header-btm">

		  	<?php if(!empty($main_menu)){ ?>

				<nav class="navigation mobile_menu">

					<?php         

						wp_nav_menu( array(

							'menu' => $main_menu,

							'container' => false,

							'items_wrap' => '<ul class="main_menu">%3$s</ul>',

						));

					?>

				</nav>

			<?php } ?>

            <div class="nav-btn"><a href="<?php echo $header_button_link; ?>" class="button outline-btn white"><?php echo $header_button_text;?></a></div>

            <div class="lang-nav">

              <ul>

                <li><a href="#" class="current_language">EN</a></li>

                <li><a href="#">FR</a></li>

              </ul>

            </div>

            <!-- end of lang nav --> 

          </div>

        </div>

      </div>

    </div>

  </header>

<main id="mainContent">

