<?php 
/*
* Template Name: Home page template
*/
get_header(); ?>


    <?php
        $slider_image_desktop = get_field('nsp_home_slider_image'); 
        $nsp_home_slider_image_mobile = get_field('nsp_home_slider_image_mobile');
        // $ = get_field('');    
    ?>
        <div class="slider_area">
            <!-- <img src="./<?php echo get_template_directory_uri(); ?>/assets/img/slider.jpg" alt="">
            <div class="text_part">
                <h2 class="title">Get 2020 Ready</h2>
                <p>Get organized for the new year with our calendars range</p>
                <a class="yellow_black_button" href="">Shop now</a>
            </div> -->
            <style>
                .slider_area .image_holder{
                    background-image: url('<?php echo $slider_image_desktop; ?>');
                }

                @media only screen and (max-width:1199px){
                    .slider_area .image_holder{
                        background: url('<?php echo $nsp_home_slider_image_mobile; ?>');
                        background-size: cover;
                        background-repeat: no-repeat;
                    }
                    
                }
            </style>
            <div class="image_holder"></div>
        </div>

        <div class="highlight_icons">
            <div class="container-fluid">
                <div class="row">

                    <?php if( have_rows('nsp_home_highlight_icons') ): ?>



                    <?php $i=1; while( have_rows('nsp_home_highlight_icons') ): the_row(); ?>

                    <?php 

                        $icon = get_sub_field('nsp_highlight_icon'); 
                        $text = get_sub_field('nsp_highlight_text');

                    ?>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 single_icon"><?php echo $icon; ?><?php echo $text; ?></span></div>



                    <?php $i++; endwhile; ?>

                    <?php endif; ?>


                    <!-- <div class="col-md-3 single_icon"><i class="fa fa-gg-circle" aria-hidden="true"></i><span>White label packaging</span></div>
                    <div class="col-md-3 single_icon"><i class="fa fa-gg-circle" aria-hidden="true"></i><span>White label packaging</span></div>
                    <div class="col-md-3 single_icon"><i class="fa fa-gg-circle" aria-hidden="true"></i><span>White label packaging</span></div>
                    <div class="col-md-3 single_icon"><i class="fa fa-gg-circle" aria-hidden="true"></i><span>White label packaging</span></div> -->



                </div>
            </div>
        </div>

        <div class="highlighted_products">
            <div class="container">
                <div class="row">
                    
                    <div class="col-md-7">
                        <div class="row">



                        <?php if( have_rows('nsp_home_highlight_products') ): ?>

                        <?php $i=1; while( have_rows('nsp_home_highlight_products') ): the_row(); ?>

                        <?php 

                            $text = get_sub_field('nsp_home_highlighted_product_text'); 
                            $image = get_sub_field('nsp_home_highlighted_product_image');
                            $link = get_sub_field('nsp_home_highlighted_product_link');

                        ?>
                        <style>
                            .highlighted_products .image_holder{
                                /* background: url('<?php echo $image; ?>'); */
                            }
                        </style>
                            <div class="col-md-6">
                                <div class="single_product">
                                    <?php if($text) :?>
                                        <h3 class="product_promotion"><?php echo $text; ?></h3>
                                    <?php endif; ?>
                                    <div class="image_holder" style="background-image: url('<?php echo $image; ?>')"></div>
                                    <div class="text_holder">
                                        <a href="<?php echo $link; ?>" class="red_white_button">Shop Now</a>
                                    </div>
                                </div>
                            </div>



                        <?php $i++; endwhile; ?>

                        <?php endif; ?>

                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-12">
                        <?php if( have_rows('nsp_home_highlight_product_col_3') ): ?>

                        <?php $i=1; while( have_rows('nsp_home_highlight_product_col_3') ): the_row(); ?>

                        <?php 

                            $text = get_sub_field('nsp_highlight_third_col_text'); 
                            $image = get_sub_field('nsp_highlight_third_col_image');
                            $link = get_sub_field('nsp_highlight_third_col_link');
                            $link_text = get_sub_field('nsp_highlight_third_col_link_text');

                        ?>

                            <div class="single_product with_text">
                                <div class="image_holder" style="background-image: url('<?php echo $image; ?>')" ></div>
                                <div class="text_holder ">
                                    <?php echo $text; ?>
                                    <a href="<?php echo $link; ?>" class="red_white_button"><?php echo $link_text; ?></a>
                                </div>
                            </div>



                        <?php $i++; endwhile; ?>

                        <?php endif; ?>                                 
                                    <!-- <div class="single_product with_text">
                                        <div class="image_holder"></div>
                                        <div class="text_holder ">
                                            <h3>Explore our new pro tools</h3>
                                            <ul>
                                                <li>Order a Free sample Pack</li>
                                                <li>Download Email and Free templates</li>
                                                <li>Ger Free Promotional Image</li>
                                            </ul>
                                            <a href="" class="red_white_button">Explore Now</a>
                                        </div>
                                    </div> -->
                               
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="popular_products">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="area_title text-center">Popular Products</h2>
                    </div>


                <?php
                    $args = array(
                        'post_type' => 'products',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product-cat',
                                'field'    => 'slug',
                                'terms'    => 'is-it-popular',
                            ),
                        ),
                    );
                    $query = new WP_Query( $args );
                    // print_r($query); die();
                    if($query-> have_posts()) : while($query-> have_posts()): $query-> the_post(); ?>

                        <div class="col-md-4 single_product">
                            <?php 
                                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                                $image = $image[0]; ?>

                            <a href="<?php the_permalink(); ?>">
                                <div class="image_area">
                                    <div class="image_holder" style="background-image:url('<?php echo $image; ?>')"></div>           
                                </div>
                                <div class="info">
                                    <p class="name"><?php the_title(); ?></p>
                                    <p class="price">Starts from $<?php the_field('nsp_products_price_starts'); ?></p>
                                </div>  

                            </a>
                        </div>
                    
                    <?php
                        endwhile; endif;
                        wp_reset_postdata();

                ?>
                    

                    <!-- <div class="col-md-4 single_product">
                        <a href="">
                            <div class="image_area">
                                <div class="image_holder"></div>           
                            </div>
                            <div class="info">
                                <p class="name">Product Name</p>
                                <p class="price">Starts from $10</p>
                            </div>  

                        </a>
                    </div> -->






                </div>
            </div>
        </div>

        <div class="signup_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 my-auto">
                        <p>Sign me up for exclusive offers and print inspiration by email.</p>
                    </div>

                    <div class="col-md-6">
                        <input type="email" placeholder="Email Address">
                        <input type="submit" value="Subscribe">
                    </div>
                </div>
            </div>
        </div>


        <?php
            $heading = get_field('nsp_home_print_professional_heading');
        ?>
        <div class="print_professionals">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="area_title text-center"><?php echo $heading; ?></h2>
                    </div>


                    <?php if( have_rows('nsp_home_print_professional_items') ): ?>

                        <?php $i=1; while( have_rows('nsp_home_print_professional_items') ): the_row(); ?>

                        <?php 

                            $heading = get_sub_field('nsp_home_print_professional_item_heading'); 
                            $text = get_sub_field('nsp_home_print_professional_item_text');
                        ?>

                        <div class="col-md-4 single_item">
                            <img src="./<?php echo get_template_directory_uri(); ?>/assets/img/diamond-rewards.svg" alt="">
                            <h3 class="title"><?php echo $heading; ?></h3>
                            <p><?php echo $text?></p>
                        </div>



                    <?php $i++; endwhile; ?>

                    <?php endif; ?>


                    <!-- <div class="col-md-4 single_item">
                        <img src="./<?php echo get_template_directory_uri(); ?>/assets/img/diamond-rewards.svg" alt="">
                        <h3 class="title">Business Manager</h3>
                        <p>Personalised business development advice from an expert in your local area</p>
                    </div> -->

                    <?php
                        $button_text = get_field('nsp_home_print_professional_button_text');
                        $button_link = get_field('nsp_home_print_professional_button_link');
                    ?>

                    <div class="col-12">
                        <a href="<?php echo $button_link; ?>" class="red_white_button"><?php echo $button_text; ?></a>
                    </div>

                </div>
            </div>
        </div>


        <div class="blog_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="area_title text-center">Our Blog</h2>
                    </div>

                    <?php
                        $args = array(
                            'post_type'=> 'post'
                        );

                        $query = new WP_Query($args);
                        if( $query -> have_posts() ) : while( $query -> have_posts() ) : $query -> the_post();
                    ?>
                    <?php 
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
                        $image = $image[0]; 
                    ?>
                        <div class="col-md-4 single_post">
                            <a href="<?php the_permalink(); ?>">
                                <div class="image_area" style="background-image:url('<?php echo $image; ?>');">
                                    <div class="image_holder" ></div>
                                </div>
                                <h2 class="post_title"><?php the_title(); ?></h2>
                            </a>
                        </div>

                    <?php
                        endwhile; endif;
                    ?>

                    

                    <!-- <div class="col-md-4 single_post">
                        <a href="#">
                            <div class="image_area">
                                    <div class="image_holder"></div>
                            </div>
                            <h2 class="post_title">Dress to impress with custom t-shirt printing.</h2>
                        </a>
                    </div>

                    <div class="col-md-4 single_post">
                        <a href="#">
                            <div class="image_area">
                                    <div class="image_holder"></div>
                            </div>
                            <h2 class="post_title">Dress to impress with custom t-shirt printing.</h2>
                        </a>
                    </div>
 -->


                </div>
            </div>
        </div>

<?php get_footer(); ?>