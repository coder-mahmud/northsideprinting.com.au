<!doctype html>
<html class="no-js" lang="">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/vendors.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <?php wp_head(); ?>
    </head>

    <body <?php body_class( $class ); ?> >

        <div class="logo_bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 my-auto">
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                            <?php
                                //var_dump(get_field('logo', 'option'));
                            ?>
                            <?php if(get_field('logo', 'option') != NULL){ ?>
                                <img src="<?php echo get_field('logo', 'option') ?>" alt="">

                            <?php }else { ?>
                            
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="">

                            <?php } ?>
                        </a>
                        <div class="search_phone">
                            <span class="search_holder">
                                <i class="fa fa-search"></i><input type="text" placeholder="Serach Products">
                            </span>
                            
                            <a class="phone" href="tel:<?php the_field('field_header_ph_clickable','option');?>">Contact Us <span><?php the_field('field_header_ph_visible','option');?></span></a>
                        </div>

                        <div class="menu_toggler">
                            <i class="fa fa-bars"></i>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                            <div class=" clearfix">
                                    <!-- <button class="nav_menu_toggler_icon"><span class="fa fa-bars"></span></button>
                                    <nav class="manu clearfix">

                                     -->



                        <nav>
                            <?php
                            
                                if (function_exists('wp_nav_menu')) {
                                    wp_nav_menu(array('theme_location' => 'wpj-main-menu','container' => false, 'menu_class' => 'main_menu', 'fallback_cb' => 'wpj_default_menu'));
                                }
                                else {
                                    wpj_default_menu();
                                }
                            ?>

                            <!-- <ul class="main_menu">
                                <li><a href="#">Home</a></li>

                                <li><a href="#">Drop 1 <i class="fa fa-sort-desc"></i></a>
                                    <ul>
                                    <li><a href="#">Product 1</a>
                                        <ul>
                                            <li><a href="#">Child 1</a></li>
                                            <li><a href="#">Child 2</a></li>
                                            <li><a href="#">Child 3</a></li>
                                            <li><a href="#">Child 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Product 2</a>
                                        <ul>
                                            <li><a href="#">Child 1</a></li>
                                            <li><a href="#">Child 2</a></li>
                                            <li><a href="#">Child 3</a></li>
                                            <li><a href="#">Child 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Product 3</a>
                                        <ul>
                                            <li><a href="#">Child 1</a></li>
                                            <li><a href="#">Child 2</a></li>
                                            <li><a href="#">Child 3</a></li>
                                            <li><a href="#">Child 4</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Product 4</a>
                                        <ul>
                                            <li><a href="#">Child 1</a></li>
                                            <li><a href="#">Child 2</a></li>
                                            <li><a href="#">Child 3</a></li>
                                            <li><a href="#">Child 4</a></li>
                                        </ul>
                                    </li>
                                    </ul>
                                </li>

                                <li><a href="#">Drop 2</a>

                                </li>

                                <li><a href="#">About</a></li>

                                <li><a href="#">FAQ</a></li>
                            </ul> -->


                        </nav>




                                    </nav>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        