<?php
/*Template Name: About Template
*/
get_header();

$about_banner_subheading = get_field('about_banner_subheading');
$about_banner_h = get_field('about_banner_heading');
if(empty($about_banner_h)){		
    $about_banner_heading = get_the_title();
} else {
    $about_banner_heading = $about_banner_h;
}
$about_banner_description = get_field('about_banner_description');
$about_banner_button_text = get_field('about_banner_button_text');
$about_banner_button_link = get_field('about_banner_button_link');

$short_introduction_heading1 = get_field('short_introduction_heading1');
$short_introduction_heading1_highlight = get_field('short_introduction_heading1_highlight');
$short_introduction_heading2 = get_field('short_introduction_heading2');
$short_introduction_heading2_highlight = get_field('short_introduction_heading2_highlight');
$short_introduction_heading3 = get_field('short_introduction_heading3');
$short_introduction_heading3_highlight = get_field('short_introduction_heading3_highlight');
$short_introduction_description_left = get_field('short_introduction_description_left');
$short_introduction_description_right = get_field('short_introduction_description_right');
$short_introduction_button_text = get_field('short_introduction_button_text');
$short_introduction_button_link = get_field('short_introduction_button_link');

$our_community_image = get_field('our_community_image');
$community_heading = get_field('community_heading');
$community_description = get_field('community_description');
$community_button_text = get_field('community_button_text');
$community_button_link = get_field('community_button_link');

$history_heading = get_field('history_heading');

$optional_introduction_sub_heading = get_field('optional_introduction_sub_heading');
$optional_introduction_heading1 = get_field('optional_introduction_heading1');
$optional_introduction_heading1_highlight = get_field('optional_introduction_heading1_highlight');
$optional_introduction_heading2 = get_field('optional_introduction_heading2');
$optional_introduction_heading2_highlight = get_field('optional_introduction_heading2_highlight');
$optional_introduction_heading3 = get_field('optional_introduction_heading3');
$optional_introduction_heading3_highlight = get_field('optional_introduction_heading3_highlight');

$optional_introduction_description = get_field('optional_introduction_description');
$optional_introduction_button_text = get_field('optional_introduction_button_text');
$optional_introduction_button_link = get_field('optional_introduction_button_link');

?>
<?php if (have_rows('banner_images')) { 
    $full_width_banner = "";
    

}
else{
    $full_width_banner = "full_width";
}?>
<section class="hero-banner-section reverse pos-relative">
    <div class="hero-banner-wrap">
        <div class="container">
            <div class="hero-banner-main flex">
                <div class="hero-banner-txt <?php echo $full_width_banner; ?>">
                    <?php if(!empty($about_banner_subheading)){?>
                    <span class="optional-text"><?php echo $about_banner_subheading; ?></span>
                    <?php } ?>
                    <?php if(!empty($about_banner_heading)){?>
                    <h1><?php echo $about_banner_heading; ?></h1>
                    <?php } ?>
                    <?php if(!empty($about_banner_heading)){?>
                    <?php echo $about_banner_description; ?>
                    <?php } ?>
                    <?php if(!empty($about_banner_button_text && $about_banner_button_link)){?>
                    <a href="<?php echo $about_banner_button_link; ?>"
                        class="button outline-btn white"><?php echo $about_banner_button_text; ?></a>
                    <?php } ?>
                </div>
                <!-- end of hero banner txt -->
                              
                <?php if (have_rows('banner_images')) { ?>
                <div class="hero-banner-image">
                    <div class="banner-img">
                        <div class="banner-ellipse-wrap">
                            <div class="banner-ellipse">
                                <div class="ellipse ellipse-blue">
                                    <div class="ellipse ellipse-pink">
                                        <div class="ellipse ellipse-green">
                                            <div class="ellipse ellipse-orange">
                                                <div class="ellipse ellipse-red">
                                                    <div class="ellipse-icon ellipse-blue flex">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end of banner ellipse wrap-->

                        <div class="banner-faces-thumbs">
                            <?php while (have_rows('banner_images')) { the_row();
                            $banner_desktop_image = get_sub_field('banner_desktop_image');?>
                            <?php if(!empty($banner_desktop_image)){?>
                            <figure class="object-fit pos-absolute face"><img
                                    src="<?php echo $banner_desktop_image['url']; ?>"
                                    alt="<?php echo $banner_desktop_image['alt']; ?>" /></figure>
                                   
                            <?php } } ?>
                        </div>
                        
                        <!-- end of banner face thumbs -->
                    </div>
                    <!-- end of hero banner image -->

                </div>
                <?php } ?>
                <!-- end of hero banner main -->
            </div>
        </div>
    </div>
</section>


<section class="short-intro-section pos-relative">
  <div class="container">
    <div class="container-md">
        <div class="short-intro-main"> 
            <div class="short-intro-list flex">
                <div class="short-intro-heading">
                    <h2><?php if($short_introduction_heading1_highlight == 'yes'){ ?>
                                <span> <?php echo $short_introduction_heading1; ?>
                                <?php include get_theme_file_path( '/svgs/about-short-intro-orange-svgg.php' ); ?>
                                </span><?php } else {  echo $short_introduction_heading1;  } ?>
                                <?php if($short_introduction_heading2_highlight == 'yes'){ ?>
                                <span> <?php echo $short_introduction_heading2; ?>
                                <?php include get_theme_file_path( '/svgs/about-short-intro-orange-svg.php' ); ?>
                                </span><?php } else {  echo $short_introduction_heading2;  } ?>
                                <?php if($short_introduction_heading3_highlight == 'yes'){ ?>
                                <span> <?php echo $short_introduction_heading3; ?>
                                <?php include get_theme_file_path( '/svgs/about-short-intro-orange-svg.php' ); ?>
                                </span><?php } else {  echo $short_introduction_heading3;  } ?>  
                    </h2>
                </div>
                <?php if(!empty($short_introduction_button_text && $short_introduction_button_link)){?>
                <div class="short-intro-btn">
                    <a href="<?php echo $short_introduction_button_link; ?>" class="button outline-btn orange hide-in-mobile hide-in-tablet"><?php echo $short_introduction_button_text; ?></a>
                </div>
                <?php } ?>
            </div>
            <div class="short-intro-desc flex">
                <?php if(!empty($short_introduction_description_left)){ ?>
                    <div class="short-intro-left">
                        <?php echo $short_introduction_description_left; ?>
                    </div>
                <?php } ?>
                <?php if(!empty($short_introduction_description_right)){ ?>
                    <div class="short-intro-right">
                        <?php echo $short_introduction_description_right; ?>        
                    </div>
                <?php } ?> 
                <?php if(!empty($short_introduction_button_text && $short_introduction_button_link)){?>
                <div class="short-intro-btn">
                    <a href="<?php echo $short_introduction_button_link; ?>" class="button outline-btn orange hide-in-desktop"><?php echo $short_introduction_button_text; ?></a>
                </div>
                <?php } ?>   
                  
            </div>
        </div>
    </div>
  </div>
</section>

<?php if (have_rows('features')) { ?>
<section class="community-grid-module">
    <div class="container">
        <div class="community-main">
            <div class="community-row flex">
            <?php $f==0; while (have_rows('features')) { the_row();
                            $features_icon = get_sub_field('features_icon');
                            $features_heading = get_sub_field('features_heading');
                            $features_description = get_sub_field('features_description');
                            if($f== 0 || $f== 5 || $f== 10 ){
                                $feature_class = "light-orange";
                                }
                                else if($f== 1 || $f== 6 || $f== 11){
                                    $feature_class = "light-green";
                                 } 
                                 elseif($f==2 || $f== 7 || $f== 12){
                                    $feature_class = "light-blue";
                                 } 
                                 elseif($f==3 || $f== 8 || $f== 13){
                                    $feature_class = "light-pink";
                                 } 
                                 elseif($f==4 || $f== 9 || $f== 14){
                                    $feature_class = "light-red";
                                 } 
                                 else{
                                    $feature_class= "";
                                 }
           				?>
                <div class="community-list">
                    <div class="community-icon <?php echo $feature_class; ?>">
                    <?php if(!empty($features_icon)){ ?>
                        <figure class="community-thumb">
                            <img src="<?php echo $features_icon['url']; ?>"alt="<?php echo $features_icon['alt']; ?>">
                        </figure>
                        <?php } ?>
                    </div>
                    <?php if(!empty($features_heading)){ ?>
                        <span class="h5"><?php echo $features_heading;?></span>
                    <?php } ?>
                    <?php if(!empty($features_description)){ ?>
                        <?php echo $features_description; ?>
                    <?php } ?>
                </div>
                <?php $f++; } wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(empty($our_community_image)){ 
        $full_width_map = "full_width";
     }
     else{
        $full_width_map = "";
     }?>


<section class="community-map-section pos-relative">
    <div class="container">
        <div class="container-md">
            <div class="community-map-main flex flex-vcenter <?php echo $full_width_map; ?>">
                <?php if(!empty($our_community_image)){ ?>
                <div class="community-map-image pos-relative">
                    <figure class="community-map-thumb object-fit">
                        <img src="<?php echo $our_community_image['url']; ?>"
                            alt="<?php echo $our_community_image['alt']; ?>">
                    </figure>
                    <div class="community-map-line">
                        <?php include get_theme_file_path( '/svgs/about-community-map-svg.php' ); ?>
                    </div>
                </div>
                <?php } ?>
                <div class="community-map-text ">
                    <?php if(!empty($community_heading)){?>
                    <h3><?php echo $community_heading; ?></h3>
                    <?php } ?>
                    <?php if(!empty($community_description)){?>
                    <p><?php echo $community_description; ?></p>
                    <?php } ?>
                    <?php if(!empty($community_button_text && $community_button_link)){ ?>
                    <a href="<?php echo $community_button_link; ?>"
                        class="button outline-btn"><?php echo $community_button_text; ?></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="history-section pos-relative">
    <div class="history-bg">
        <figure class="history-thumb">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/history-bg.svg" alt="history-bg">
        </figure>
    </div>
    <div class="container">
        <?php if(!empty($history_heading)){ ?>
        <h3><?php echo $history_heading; ?></h3>
        <?php } ?>
        <div class="history-wrap pos-relative">

            <?php if (have_rows('history_detail')) { ?>
            <div class="event-slider">
                <?php $h==0; while (have_rows('history_detail')) { the_row();
                            $history_detail_year = get_sub_field('history_detail_year');
                            $history_detail_heading = get_sub_field('history_detail_heading');
                            $history_detail_description = get_sub_field('history_detail_description');
                            if($h== 0 || $h== 5 || $h== 10 ){
                                $history_class = "pink";
                                }
                                else if($h== 1 || $h== 6 || $h== 11){
									$history_class = "teal";
                                 } 
                                 elseif($h==2 || $h== 7 || $h== 12){
									$history_class = "orange";								
                                 }
                                 elseif($h==3 || $h== 8 || $h== 13){
									$history_class = "blue";								
                                 }
                                 elseif($h==4 || $h== 9 || $h== 14){
									$history_class = "red";								
                                 }
                                 else{
                                    $history_class = "";	
                                 }
           				?>
                <div class="event-grid <?php echo $history_class; ?>-shape <?php echo $history_class; ?>">
                    <div class="event-dot">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="31" viewBox="0 0 35 31" fill="none">
                            <path
                                d="M0.23359 18.5707C0.171541 18.6938 0.165336 18.82 0.214975 18.9557C0.534526 19.8048 0.826155 20.6696 1.14571 21.5155C1.50559 22.4686 2.01749 23.365 2.77759 24.0846C3.10334 24.394 3.35464 24.7727 3.71452 25.0568C4.24504 25.4734 4.64835 26.0384 5.24402 26.3856C5.45189 26.5055 5.61011 26.7106 5.79315 26.8779C5.86141 26.9411 5.92966 27.0547 6.00412 27.0578C6.63702 27.0989 7.01861 27.6039 7.50259 27.9037C8.37748 28.4497 9.32993 28.7938 10.2793 29.141C11.5823 29.6207 12.8729 30.1541 14.2473 30.4256C14.6103 30.4982 14.9515 30.6686 15.3393 30.5897C15.4169 30.5739 15.5162 30.6402 15.5999 30.6749C15.7054 30.7159 15.8047 30.8012 15.9102 30.8043C16.6424 30.8296 17.3652 31 18.0912 31C19.0095 31 19.9278 30.9211 20.8431 30.8422C21.2712 30.8043 21.6993 30.7128 22.1151 30.5992C23.2226 30.2962 24.2806 29.8637 25.2454 29.2199C25.8101 28.8443 26.4305 28.576 26.9797 28.1625C27.2465 27.9605 27.4792 27.7175 27.7553 27.5218C28.0748 27.2946 28.3882 27.0452 28.717 26.8274C29.1452 26.5465 29.5485 26.2467 29.8929 25.8585C30.1038 25.6217 30.3303 25.3882 30.6499 25.2809C30.7647 25.243 30.8981 25.1357 30.9446 25.0252C31.1742 24.495 31.6861 24.2677 32.0677 23.9016C32.1825 23.7911 32.2538 23.6712 32.291 23.5165C32.381 23.1725 32.5454 22.9358 32.9519 22.9579C33.2683 22.9736 33.2807 22.7085 33.2993 22.475C33.5972 22.0741 33.6996 21.588 33.8485 21.1272C33.9477 20.8179 34.0439 20.5244 34.227 20.2435C34.4752 19.8647 34.5434 19.3818 34.7296 18.981C35.0398 18.3182 34.9964 17.649 34.9995 16.9673C34.9995 16.9357 34.9715 16.901 34.956 16.8663C34.7668 16.8379 34.8195 17.0683 34.6148 17.1535C34.7327 16.4623 34.4348 15.8247 34.6272 15.1367C34.4007 14.9631 34.3231 14.6916 34.2301 14.4202C33.9726 13.6627 33.6964 12.9147 33.4265 12.1603C33.4141 12.1256 33.4048 12.0877 33.3862 12.053C33.2218 11.709 32.8619 11.4565 32.7595 11.1408C32.6416 10.7716 32.4989 10.4496 32.291 10.1277C32.0149 9.70159 31.7978 9.23762 31.5278 8.80206C31.0315 8.01299 30.4172 7.31231 29.9084 6.53902C29.4958 5.90777 28.9435 5.43433 28.4316 4.91355C28.3665 4.84727 28.3044 4.76836 28.23 4.71786C27.3365 4.12449 26.5515 3.37961 25.6363 2.8178C25.2826 2.60002 24.9321 2.38224 24.5288 2.2623C23.9114 2.07924 23.3778 1.71311 22.8069 1.43536C22.3446 1.21127 21.8638 1.09764 21.3767 0.958766C20.8586 0.810422 20.3436 0.61789 19.8162 0.510578C19.0157 0.346452 18.2122 0.119202 17.3807 0.283327C17.2442 0.308577 17.117 0.295952 16.9991 0.226515C16.5865 -0.0196733 16.1336 -0.00704822 15.6837 0.0055768C14.8616 0.0308268 14.0394 0.0971082 13.2173 0.0813269C12.4603 0.0655456 11.7964 0.393796 11.0828 0.538984C10.8687 0.583171 10.6733 0.728359 10.4313 0.64314C10.3537 0.614734 10.2451 0.649453 10.1583 0.684172C9.28029 1.02189 8.38679 1.34699 7.62669 1.91511C6.8728 2.47692 6.1127 3.03558 5.45189 3.71733C5.22541 3.9509 5.00824 4.1813 4.93378 4.51902C4.90586 4.64211 4.81899 4.7589 4.73522 4.8599C4.22022 5.4659 4.00305 6.19499 3.77347 6.94934C3.46943 7.9404 3.16849 8.95987 2.47045 9.77419C2.29361 9.9825 2.16951 10.2097 2.1602 10.4938C2.154 10.6327 2.10436 10.7558 1.98336 10.8347C1.88409 10.901 1.81583 10.9957 1.79411 11.1093C1.67932 11.7153 1.34426 12.2077 0.999891 12.6969C0.937843 12.7853 0.919228 12.9083 0.888204 13.0188C0.733082 13.568 0.522116 14.0919 0.311151 14.6253C-0.0580389 15.5564 -0.11078 16.5475 0.218078 17.5228C0.33597 17.8731 0.407326 18.2172 0.23359 18.5707ZM34.0594 19.0315C34.0967 18.8863 34.0563 18.7443 34.2115 18.678C34.2828 18.8768 34.2828 18.8768 34.0594 19.0315ZM33.4265 13.4039C34.1897 14.8431 34.4441 17.3776 33.9198 18.3055C33.7306 17.9426 33.7523 17.5607 33.7461 17.1851C33.7368 16.6738 33.8547 16.1404 33.6996 15.6543C33.5227 15.1051 33.4358 14.5496 33.349 13.9878C33.3211 13.8016 33.2404 13.6153 33.4265 13.4039ZM33.2032 12.921C33.0822 12.8484 33.048 12.7663 33.1659 12.659C33.2869 12.7348 33.318 12.8168 33.2032 12.921ZM32.9581 22.475C33.0822 22.314 33.1845 22.3266 33.29 22.4781C33.1908 22.4876 33.0915 22.5791 32.9581 22.475ZM31.3696 10.0141C31.6582 10.3202 31.8598 10.6769 31.9498 11.0903C31.7481 10.7337 31.4038 10.4559 31.3696 10.0141ZM30.9508 9.38597C31.1121 9.38912 31.1742 9.46172 31.1369 9.629C30.9663 9.63215 30.9229 9.54378 30.9508 9.38597ZM30.4234 10.8158C30.836 10.9704 30.8856 11.2545 30.9136 11.5543C30.7429 11.3555 30.5134 11.1945 30.4234 10.8158ZM29.232 9.28181C29.3903 9.17765 29.4958 9.19659 29.5485 9.2755C29.7936 9.6574 30.0232 10.0519 30.259 10.4402C30.2217 10.4622 30.1845 10.4875 30.1473 10.5096C29.8463 10.1119 29.5485 9.7079 29.232 9.28181ZM29.018 6.31809C29.4802 6.53902 29.5361 6.60846 29.5733 6.98406C29.2941 6.8294 29.1452 6.58321 29.018 6.31809ZM27.7956 7.54587C28.1896 7.62162 28.6426 8.09821 28.7481 8.60322C28.1772 8.2434 27.8763 7.89937 27.7956 7.54587ZM26.6322 6.60215C26.9176 6.55796 27.0014 6.66212 27.0076 6.89568C26.7997 6.90831 26.7005 6.82309 26.6322 6.60215ZM25.7418 4.98615C25.7852 4.95143 25.8349 4.89462 25.9 4.8599C25.9621 4.82518 26.0365 4.8094 26.2289 4.73996C26.1203 5.09977 26.3064 5.2134 26.5019 5.3428C26.8059 5.5448 27.1441 5.7184 27.3085 6.11293C26.6663 5.92987 25.7387 5.27021 25.7418 4.98615ZM25.1089 3.33858C25.5774 3.31018 25.5712 3.3228 25.8566 3.49955C26.2661 3.75205 26.5609 4.18446 27.0696 4.28546C27.1472 4.30124 27.2031 4.41486 27.2713 4.47799C27.4512 4.64527 27.6343 4.80624 27.8142 4.97352C28.2455 5.38383 28.7791 5.69946 29.0025 6.29915C28.5836 6.08768 28.23 5.78784 27.8887 5.46274C27.3861 4.98299 26.899 4.48746 26.2568 4.17183C25.8597 3.97615 25.5246 3.6479 25.1089 3.33858ZM24.3395 2.71996C24.535 2.76099 24.7335 2.78939 24.8607 3.04189C24.5846 3.02927 24.4419 2.90302 24.3395 2.71996ZM22.9093 2.58424C23.1575 2.89671 23.4801 3.04821 23.7687 3.25021C24.0355 3.43958 24.1378 3.60686 24.0231 3.8783C23.961 4.02349 23.9021 4.24127 23.6787 4.16236C23.4739 4.08977 23.5918 3.91302 23.6104 3.77099C23.6166 3.72049 23.5887 3.66683 23.567 3.59108C23.2971 3.63211 23.1203 3.44589 22.9124 3.33227C22.4439 3.07346 22.4439 3.02611 22.9093 2.58424ZM21.5845 2.29702C21.749 2.48324 21.9848 2.5653 22.2143 2.73258C21.7459 2.77992 21.6249 2.70102 21.5845 2.29702ZM21.1998 1.29333C21.3239 1.2807 21.3674 1.3533 21.3612 1.46061C21.3612 1.47955 21.2991 1.51742 21.2805 1.51111C21.1843 1.47008 21.1316 1.4038 21.1998 1.29333ZM20.508 1.89933C20.5111 1.87724 20.5576 1.84252 20.5794 1.84567C20.6352 1.84883 20.6724 1.8867 20.6693 1.94983C20.6445 1.96877 20.6166 2.00664 20.5918 2.00349C20.5359 2.00033 20.4956 1.9593 20.508 1.89933ZM17.0519 1.37224C17.7437 1.42589 18.3518 1.61211 18.9723 1.71627C19.3973 1.7857 19.8286 1.96245 20.1481 2.30964C20.2474 2.42011 20.3001 2.54321 20.1729 2.65683C20.0581 2.75783 19.9154 2.75467 19.8379 2.60949C19.6921 2.34752 19.447 2.21496 19.1895 2.20864C18.5597 2.19286 18.0292 1.76992 17.387 1.80149C17.1822 1.81411 16.9991 1.67839 17.0519 1.37224ZM5.07339 5.67421C5.25953 5.27968 5.45499 5.0114 5.67216 4.74311C6.40123 3.8499 7.39091 3.28177 8.23787 2.54321C8.29371 2.49586 8.36507 2.46114 8.43643 2.44221C8.84905 2.33174 9.21514 2.08871 9.64327 2.02242C10.059 1.95614 10.4313 1.78886 10.7664 1.5332C10.8377 1.47955 10.9339 1.43536 11.0208 1.42589C11.6164 1.35645 12.1966 1.2302 12.7674 1.03767C12.9225 0.984016 13.1025 1.00611 13.149 1.27439C12.7767 1.41958 12.4013 1.54267 12.0321 1.64367C11.4365 1.8078 11.0052 2.25599 10.4344 2.48008C9.78288 2.73889 9.13758 3.04821 8.50158 3.37014C7.32265 3.97299 6.17475 4.60108 5.25953 5.5953C5.24402 5.6174 5.20059 5.62371 5.07339 5.67421ZM3.13437 12.8137C3.08162 12.6906 3.06301 12.5959 3.23675 12.4759C3.25536 12.6338 3.3112 12.7379 3.13437 12.8137ZM1.56143 20.8274C1.96165 21.0262 2.05472 21.4586 2.29981 21.7774C2.56352 22.1215 2.7931 22.497 3.05681 22.8411C3.3112 23.1693 3.59663 23.4723 3.85723 23.7974C4.11474 24.1194 4.51495 24.3277 4.59872 24.7822C3.28949 23.6996 2.2812 22.3803 1.56143 20.8274Z"
                                fill="#FF7080" />
                        </svg>
                    </div>
                    <?php if(!empty($history_detail_year)){ ?>
                    <div class="event"><?php echo $history_detail_year; ?></div>
                    <?php } ?>
                    <?php if(!empty($history_detail_heading)){ ?>
                    <h5><?php echo $history_detail_heading; ?></h5>
                    <?php } ?>
                    <?php if(!empty($history_detail_description)){ ?>
                    <?php echo $history_detail_description; ?>
                    <?php } ?>
                </div>
                <?php $h++; } wp_reset_postdata(); ?>
            </div>
            <?php } ?>
            <div class="custom_arrows_ac">
            </div>
        </div>
    </div>
</section>


<?php echo get_donation(); ?>

<?php if (have_rows('communities_and_career')) { ?>
<section class="repeater-section fluid-width  pos-relative">
    <div class="container">
        <div class="repeater-wrap">
            <div class="repeater-main">
                <?php $a=0; $p=1; while (have_rows('communities_and_career')) { the_row();
                            $communities_and_career_desktop_image = get_sub_field('communities_and_career_desktop_image');
                            $communities_and_career_heading = get_sub_field('communities_and_career_heading');
                            $communities_and_career_description = get_sub_field('communities_and_career_description');
                            $communities_and_career_video_type = get_sub_field('communities_and_career_video_type');
                            $communities_and_career_video_id = get_sub_field('communities_and_career_video_id');
                            $communities_and_career_vimeo_id = get_sub_field('communities_and_career_vimeo_id');
                            if($a== 0 || $a== 3 ){
                                $repeater_reverse = "pink";
                                }
                                else if($a== 1 || $a== 4){
                                    $repeater_reverse = "reverse";
                                 } else if($a== 2 || $a== 5){            
                                    $repeater_reverse = "violet-blue";         
                                } else{
                                    $repeater_reverse = ""; 
                                }
                        ?>
                <?php if(empty($communities_and_career_desktop_image)){ 
                                $full_width_community_career = "full_width";
                                }
                                else{
                                    $full_width_community_career = "";
                                }
                            ?>
                <div
                    class="repeater-list <?php echo $repeater_reverse; ?> flex flex-vcenter <?php echo $full_width_community_career; ?>">
                    <?php if($p==1){ ?>
                    <?php if(!empty($communities_and_career_desktop_image)){ ?>
                    <div class="repeater-image pos-relative">
                        <figure class="repeater-thumb object-fit">
                            <img src="<?php echo $communities_and_career_desktop_image['url']; ?>"
                                alt="<?php echo $communities_and_career_desktop_image['alt']; ?>">
                        </figure>
                        <div class="tp-shape-8 shapes pos-absolute">
                            <?php include get_theme_file_path( '/svgs/about-communities-pink-tp-shape8-svg.php' ); ?>
                        </div>
                        <div class="tp-shape-9 shapes pos-absolute">
                            <?php include get_theme_file_path( '/svgs/about-communities-pink-tp-shape9-svg.php' ); ?>
                        </div>
                    </div>
                    <?php } } else if($p==2){?>
                    <?php if(!empty($communities_and_career_desktop_image)){ ?>
                    <div class="repeater-image pos-relative">
                        <div class="repeater-thumb-wrap">
                            <img src="<?php echo $communities_and_career_desktop_image['url']; ?>"
                                alt="<?php echo $communities_and_career_desktop_image['alt']; ?>">
                            <div class="tp-shape-4 shapes pos-absolute">
                                <?php include get_theme_file_path( '/svgs/about-communities-pink-tp-shape4-svg.php' ); ?>
                            </div>
                            <div class="tp-shape-5 shapes pos-absolute">
                                <?php include get_theme_file_path( '/svgs/about-communities-pink-tp-shape5-svg.php' ); ?>
                            </div>
                        </div>
                    </div>
                    <?php } } else {?>
                    <?php if(!empty($communities_and_career_desktop_image)){ ?>
                    <div class="repeater-image pos-relative">
                        <div class="tp-shape-6 shapes pos-absolute">
                            <?php include get_theme_file_path( '/svgs/about-communities-pink-tp-shape6-svg.php' ); ?>
                        </div>
                        <figure class="repeater-thumb object-fit">
                            <img src="<?php echo $communities_and_career_desktop_image['url']; ?>"
                                alt="<?php echo $communities_and_career_desktop_image['alt']; ?>">
                        </figure>
                        <div class="tp-shape-7 shapes pos-absolute">
                            <?php include get_theme_file_path( '/svgs/about-communities-pink-tp-shape7-svg.php' ); ?>
                        </div>

                    </div>
                    <?php } } ?>
                    <div class="repeater-content">
                        <h2><?php echo $communities_and_career_heading; ?></h2>
                        <?php echo $communities_and_career_description; ?>
                    </div>
                </div>
                <?php $a++; $p++; } ?>
            </div>
        </div>
    </div>
</section>
<?php } ?>



<?php echo get_feature_panel_footer(); ?>

<section class="resource-section">
    <div class="container">
        <div class="resource-main">
            <div class="resource-heading flex">
                <div class="resource-heading-lt">
                    <?php if(!empty($optional_introduction_sub_heading)){ ?>
                    <span class="optional-text"><?php echo $optional_introduction_sub_heading; ?></span>
                    <?php } ?>

                    <h2>
                        <?php if($optional_introduction_heading1_highlight == 'yes'){ ?>
                        <span> <?php echo $optional_introduction_heading1; ?>
                            <?php include get_theme_file_path( '/svgs/home-short-behind-svg.php' ); ?>
                        </span>
                        <?php } else {  echo $optional_introduction_heading1;  } ?>
                        <?php if($optional_introduction_heading2_highlight == 'yes'){ ?>
                        <span> <?php echo $optional_introduction_heading2; ?>
                            <?php include get_theme_file_path( '/svgs/home-short-behind-svg.php' ); ?>
                        </span>
                        <?php } else {  echo $optional_introduction_heading2;  } ?>
                        <?php if($optional_introduction_heading3_highlight == 'yes'){ ?>
                        <span> <?php echo $optional_introduction_heading3; ?>
                            <?php include get_theme_file_path( '/svgs/home-short-behind-svg.php' ); ?>
                        </span>
                        <?php } else {  echo $optional_introduction_heading3;  } ?>

                    </h2>

                </div>
                <div class="resource-heading-rt">
                    <?php echo $optional_introduction_description; ?>
                    <?php if(!empty($optional_introduction_button_text && $optional_introduction_button_link)){ ?>
                    <a href="<?php echo $optional_introduction_button_link; ?>"
                        class="resource-btn pos-relative"><?php echo $optional_introduction_button_text; ?>
                        <?php include get_theme_file_path( '/svgs/home-statistics-number-button-svg.php'); ?></a>
                    <?php } ?>
                </div>
            </div>
            <?php $args = array('child_of' => 15);
            $categories = get_categories( $args );
        ?>
            <div class="resource-filter flex">
                <div class="resource-filter-mobile hide-in-desktop">

                    <span class="text">Select Category</span>

                </div>

                <ul class="filter-list flex pos-relative">
                    <li class="active"><a href="#">Resources</a></li>
                    <?php foreach($categories as $category){ ?>
                    <li data-cat="<?php echo $category->term_id; ?>" class=""><a
                            href="<?php echo get_category_link( $category->term_id ); ?>"><?php echo $category->name; ?></a>
                    </li>

                    <?php } ?>
                </ul>
                <hr class="hide-in-mobile hide-in-tab">
            </div>
            <div class="resource-lists flex resource-slider">
                <?php  
                $home_resource = new WP_Query(array(
                'post_type'      => 'post',
                'posts_per_page' => 10,
                
              ));
              while ($home_resource->have_posts()) { 
                $home_resource->the_post();
                  $post_name = get_the_title();
                  $categories = get_the_category(get_the_ID() );
                  $cat_list="";
                  $post_id = get_the_ID();
                  $s==0;
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
                  foreach($categories as $category) {
                  $cat_list .=" ".$category->slug;
                  
                }
                $svg_icon = get_field('svg_icon', $post_id);
        $community_short_description = get_field('community_short_description', $post_id);
               
        ?>
                <div class="resource-item <?php echo $color_resource." ".$cat_list; ?>"
                    data-cat="<?php echo $cat_list; ?>">
                    <div class="resource-icon">
                        <figure>
                            <img src="<?php echo $svg_icon['url']; ?>" alt="<?php echo $svg_icon['alt']; ?>">
                        </figure>
                    </div>
                    <h4><?php echo $post_name; ?></h4>
                    <?php echo $community_short_description; ?>
                </div>
                <?php $s++; } wp_reset_postdata(); ?>

            </div>
        </div>
    </div>
</section>

<?php echo get_cta_panel(); ?>

<?php get_footer(); ?>