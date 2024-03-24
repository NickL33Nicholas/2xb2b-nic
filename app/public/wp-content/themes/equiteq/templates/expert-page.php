<?php
/* Template Name: Expert Page */
get_header();
$page_id = get_the_ID();
$page = get_post($page_id);

// Include hero template
hm_get_template_part('template-parts/hero', ['page' => $page]);

?>

<section class="bg-dark-blue">
    <div class="container text-white no-pad-gutters">
        <h3 class="text-uppercase mb-4"><?php echo $page->post_title ?></h3>
        <div class="row">
            <div class="col-md-8 mb-4">
                <?php echo apply_filters('the_content', $page->post_content); ?>
            </div>
        </div>

    <!--May implement the search and filter here-->
        <div id="experts_filter">

        <h4 class="text-uppercase mt-3 mb-2 filter_title">Filters</h3>

            <div class="filter-wrapper">

                <div class="industry_drop"> 
                    <select class='filter_style' name="industry_dropdown" id="industry_dropdown">
                        <option value="" data-filter="">Select Industry</option>
                        <?php
                        $industries = get_posts(array(
                            'post_type' => 'industry',
                            'posts_per_page' => -1, 
                        ));
        
                        foreach ($industries as $industry) {
                            $industry_slug = get_post_field('post_name', $industry->ID);
                            ?>
                        <option value="<?php echo esc_attr($industry_slug); ?>" data-filter=".<?php echo esc_attr($industry_slug); ?>"><?php echo esc_html($industry->post_title); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>


    
    
                <select class='filter_style' name="location_dropdown" id="location_dropdown">
                    <option value="">Select Location</option>
                    <?php
                    $locations = get_posts(array(
                        'post_type' => 'location',
                        'posts_per_page' => -1, 
                    ));
    
                    foreach ($locations as $location) {
                        ?>
                        <option value="<?php echo esc_attr($location->post_name); ?>" data-filter=".<?php echo esc_attr($location->post_name); ?>"><?php echo esc_html($location->post_name); ?></option>
                        <?php
                    }
                    ?>
                </select>

            
            </div>

        </div>
     
    </div>
</section>

<!--May implement the experts profile list here-->
<?php

$args = array(
    'post_type' => 'expert',
    'posts_per_page' => -1,
);

$experts_query = new WP_Query($args);

if ($experts_query->have_posts()) :
?>
    <div class="experts container d-flex justify-content-between flex-wrap">
        <?php while ($experts_query->have_posts()) : $experts_query->the_post(); ?>

            <?php
            $expert_industries = get_field('industry_details'); 
            $expert_location = get_field('location'); 
            ?>

            <div class="expert text-center <?php
            foreach ($expert_industries as $industry) {
                echo $industry->post_name . ' ';
            }
            echo $expert_location->post_name . ' ';
            ?>">
                <?php
           
                $image = get_field('profile_image');
                if ($image) : ?>
                <figure class="expert_img">

                <a href="<?php the_permalink(); ?>" class="expert_link">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </a>
                </figure>
                   
                <?php endif; ?>
                <!-- Expert details -->
                <p class="expert_name"><a href="<?php the_permalink(); ?>" class="expert"><?php echo wp_kses_post(get_field('name')); ?></a></p>
                <p class="expert_role"><?php echo wp_kses_post(get_field('position_title')); ?></p>
                <?php
                $location = get_field('location');
                if ($location) : ?>
                    <p class="expert_location"><?php echo wp_kses_post($location->post_title); ?></p>
                <?php endif; ?>

                <ul class="socials_wrapper d-flex justify-content-center mt-2">
                    <li>
                        <a class="email" href="tel:<?php echo esc_url(get_field('email')); ?>" target="_blank" alt="email">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a class="contact_no" href="tel:<?php echo esc_url(get_field('contact_no')); ?>" target="_blank" alt="contact_no">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li>
                        <a class="linkedin" href="<?php echo esc_url(get_field('linkedin')); ?>" target="_blank" alt="LinkedIn">
                            <i class="fa fa-linkedin" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </div>
        <?php endwhile;
        wp_reset_postdata(); 
        ?>
    </div>
<?php else :
    echo 'No experts found.';
endif;
?>
<?php
get_footer();
?>
