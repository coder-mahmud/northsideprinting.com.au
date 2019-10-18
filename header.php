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
                        <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt=""></a>
                        <div class="search_phone">
                            <span class="search_holder">
                                <i class="fa fa-search"></i><input type="text" placeholder="Serach Products">
                            </span>
                            
                            <a class="phone" href="#">Contact Us <span>(1234)-456-7891</span></a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="menu_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                            <div class="menu-container clearfix">
                                    <button class="nav_menu_toggler_icon"><span class="fa fa-bars"></span></button>
                                    <nav class="manu clearfix">

                                    <?php
                                        if (function_exists('wp_nav_menu')) {
                                            wp_nav_menu(array('theme_location' => 'wpj-main-menu','container' => false, 'menu_class' => '', 'fallback_cb' => 'wpj_default_menu'));
                                        }
                                        else {
                                            wpj_default_menu();
                                        }
                                    ?>

                                        <!-- <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Products</a>
                                                <ul>
                                                    <li><a href="#">Some Heading</a>
                                                        <ul>
                                                            <li><a href="#">Lidership</a></li>
                                                            <li><a href="#">History</a></li>
                                                            <li><a href="#">Locations</a></li>
                                                            <li><a href="#">Careers</a></li>
                                                            <li><a href="#">Locations</a></li>
                                                            <li><a href="#">Careers</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Some Heading</a>
                                                        <ul>
                                                            <li><a href="#">Lidership</a></li>
                                                            <li><a href="#">History</a></li>
                                                            <li><a href="#">Locations</a></li>
                                                            <li><a href="#">Locations</a></li>
                                                            <li><a href="#">Careers</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="#">Some Heading</a>
                                                        <ul>
                                                            <li><a href="#">Lidership</a></li>
                                                            <li><a href="#">History</a></li>
                                                            <li><a href="#">Locations</a></li>
                                                            <li><a href="#">Careers</a></li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Artwork Template</a></li>
                                            <li><a href="#">Contact</a></li>
                                        </ul> -->



                                    </nav>
                                </div>
                    </div>
                </div>
            </div>
        </div>
        