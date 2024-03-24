<?php

// Get the ID of the experts page
$experts_page_id = get_page_by_path('experts')->ID;

get_header();
$id = get_the_ID(); // Get the ID of the current page
$page = get_post($id); // Retrieve the post object for the current page




?>



<section id="expert">
    <div class="container no-pad-gutters">

        <div class="back mb-4 mb-md-5">
            <i class="fa fa-caret-left align-bottom" style="font-size: 22px;" aria-hidden="true"></i> <a
                href="<?php echo esc_url(get_permalink($experts_page_id)); ?>" class="btn-outline-success text-uppercase px-0 ml-2">Back to team</a>
        </div>

        <div class="row">
            <!--May implement the expert's profile here -->
            <div class="col-lg-4 profile_image">

            <?php
                // Retrieve and display image
                $image = get_field('profile_image');
                if ($image) : ?>
                    <figure class="profile_image_img"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></figure>
                <?php endif; ?>
            </div>

            <div class="col-lg-8 profile_details">
                <h1 class="text-uppercase profile_details_name"><?php echo $page->post_title; ?></h1> <!-- Output the page title -->
                <h6 class="profile_details_role text-uppercase"><?php echo wp_kses_post(get_field('position_title')); ?></h6>

                <?php
                $location = get_field('location');
                if ($location) : ?>

                    <div class="location_wrapper d-flex"> 
                        <i class="fa fa-map-marker fa-lg text-green" aria-hidden="true"></i>
                        <p class="profile_details_location"><?php echo wp_kses_post($location->post_title); ?></p>
                    </div>

                <?php endif; ?>


                <ul class="socials_wrapper d-flex mt-2">
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


                <div class="normal-font-regular"><?php echo apply_filters('the_content', $page->post_content); ?></div> <!-- Output the page content -->
           



            </div>
        </div>


        


        
    </div>
</section>



<section id="extertise_section"> 
    <div class="wrapper container">   

        <h5 class="heading">Expertise</h5>
        
        <?php
            $selected_industries = get_field('industry_details'); 

            if ($selected_industries) : ?>
                <div class="industries">
                    <?php foreach ($selected_industries as $industry) : ?>
                        <div class="industry">
                            <?php if ($industry && isset($industry->ID)) : ?>
                                <div class="industry_details">
                                    <?php
                                    $image = get_field('image', $industry->ID); // Assuming 'image' is the field name for the image in the industry details
                                    if ($image) : ?>

                                    <figure class="industry_img"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>"></figure>
                                        
                                    <?php endif; ?>
                                    <p class="title"><?php echo esc_html($industry->post_title); ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                </div>
        <?php endif; ?>
</section>

<?php get_footer(); ?>
