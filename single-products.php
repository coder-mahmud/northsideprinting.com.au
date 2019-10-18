<?php get_header(); ?>
        <!-- Single Product Area -->

        <?php
            $review = get_field('nsp_products_review_number');
        ?>
        <div class="single_product_area">
            <div class="container">
                <div class="row heading_row">
                    <div class="col-md-6 breadcrumbs_col">

                        <?php
                            echo '<div id="kroshki"><a href="'.esc_url( home_url( '/' )).'">Home > </a>';
                            $rd_taxonomy = 'product-cat'; // region taxonomy
                            $rd_terms = wp_get_post_terms( $post->ID, $rd_taxonomy, array( "fields" => "ids",'exclude' => '10') ); // getting the term IDs
                            //$rd_terms = $rd_terms[0]; // Get the first item.
                            $parent_term = $rd_terms[0]; // Get the first item.
                            $child_terms = get_term_children( $parent_term, $rd_taxonomy );
                            $newArray = array();
                            $newArray[] = $parent_term;
                            foreach($child_terms as $child ){
                                if (in_array($child, $rd_terms)){ 
                                   $newArray[] = $child; 
                                }
                            }
                            
                            if( $rd_terms ) {
                                $newArray = trim( implode( ',', (array) $newArray ), ' ,' );
                                // print_r($rd_terms);die();
                                $neworderterms = get_terms($rd_taxonomy, 'orderby=none&include=' . $newArray );
                                foreach( $neworderterms as $orderterm ) {
                                    echo '<a href="' . get_term_link( $orderterm ) . '">' . $orderterm->name . '</a> » ';
                                }
                            }
                            the_title();
                            echo '</div>'; 
                        ?>

                    </div>
                    <div class="col-md-6 title_col">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="product_image">

                            <div id="slider" class="flexslider MySlider">

                                <ul class="slides">

                                    <?php if( have_rows('nsp_products_images') ): ?>
                                        <?php $i=1; while( have_rows('nsp_products_images') ): the_row(); ?>

                                        <?php 

                                            $text = get_sub_field('nsp_product_slide_text'); 
                                            $image = get_sub_field('nsp_product_slide_image');

                                        ?>

                                        <li>
                                        <a href="<?php echo $image; ?>" data-lightbox="example-set" data-title=""> <img src="<?php echo $image; ?>" /></a>
                                           
                                            <p><?php echo $text; ?></p>
                                        </li>


                                        <?php $i++; endwhile; ?>
                                    <?php endif; ?>

                                   


                                    <!-- <li>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/kitchen_adventurer_lemon.jpg" />
                                        <p>Slider Text here....</p>
                                    </li> -->

                                </ul>
                            </div>
                                    
                            <div id="carousel" class="flexslider">

                                <ul class="slides">

                                <?php if( have_rows('nsp_products_images') ): ?>
                                        <?php $i=1; while( have_rows('nsp_products_images') ): the_row(); ?>

                                        <?php 

                                            $image = get_sub_field('nsp_product_slide_image');

                                        ?>

                                    <li>
                                        <img src="<?php echo $image; ?>" />
                                    </li>


                                        <?php $i++; endwhile; ?>
                                    <?php endif; ?>


                                    <!-- <li>
                                        <img src="<?php echo get_template_directory_uri(); ?>/images/kitchen_adventurer_cheesecake_brownie.jpg" />
                                    </li> -->


                                </ul>

                            </div>                            

                        </div>

                        <p class="product_description">
                        <?php
                            if(have_posts()): while(have_posts()) : the_post();
                                the_content();
                            endwhile; endif; ?>
                        </p>

                        <div class="accordion accordion_area" id="accordionExample">
                            <div class="card z-depth-0 bordered">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                    Artwork Guide <i class="fa fa-angle-down"></i>
                                    </button>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?php the_field('nsp_products_artwork_guide'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="card z-depth-0 bordered">
                                <div class="card-header" id="headingTwo">
                                    <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Artwork Template <i class="fa fa-angle-down"></i>
                                    </button>
                                </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <ul class="artwork_templates">
                                        
                                            <?php if(get_field('nsp_products_psd_template')): ?>
                                                <li class="photoshop"><a href="<?php echo get_field('nsp_products_psd_template'); ?>">Photoshop</a></li>
                                            <?php endif; ?>

                                            <?php if(get_field('nsp_products_ai_template')): ?>
                                                <li class="illustrator"><a href="<?php echo get_field('nsp_products_ai_template'); ?>">Illustrator</a></li>
                                            <?php endif; ?>

                                            <?php if(get_field('nsp_products_pdf_template')): ?>
                                                <li class="pdf"><a href="<?php echo get_field('nsp_products_pdf_template'); ?>">PDF</a></li>
                                            <?php endif; ?>

                                            <?php if(get_field('nsp_products_id_template')): ?>
                                                <li class="id"><a href="<?php echo get_field('nsp_products_id_template'); ?>">ID</a></li>
                                            <?php endif; ?>


                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-md-6">
                        <!-- <iframe id="wl" src="https://printportal.cloud/wl/120098" width="100%" height="650" style="border:none;"></iframe> <script src="https://printportal.cloud/images/resize.txt" type="text/javascript"></script> -->
                        <?php the_field('nsp_products_pricing_iframe'); ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- End Single Product Area -->


        <div class="single_product_speciality_area">
            <div class="container">
                <div class="row">


                <?php if( have_rows('nsp_products_icons') ): ?>
                    <?php $i=1; while( have_rows('nsp_products_icons') ): the_row(); ?>
                        
                        <?php 
                        
                        $title = get_sub_field('nsp_products_icons_heading'); 
                        $icon = get_sub_field('nsp_products_icons_icon'); 
                        $description = get_sub_field('nsp_products_icons_text', false, false);
                        
                        ?>

                        <div class="col-md-3 single_special">
                            <?php echo $icon; ?>
                            <h3 class="title"><?php echo $title; ?></h3>
                            <p><?php echo $description; ?></p>
                        </div>

                        
                    <?php $i++; endwhile; ?>
                <?php endif; ?>


                    <!-- <div class="col-md-3 single_special">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                        <h3 class="title">Competitive Prices</h3>
                        <p>Hard-to-beat pricing with trade buyers in mind.</p>
                    </div> -->




                </div>
            </div>
        </div>

        <div class="single_product_tabbed_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php if( have_rows('nsp_products_tabs') ): ?>
                            <?php $i=1; while( have_rows('nsp_products_tabs') ): the_row(); ?>
                                
                                <?php 
                                
                                    $title = get_sub_field('nsp_products_tab_heading');
                                
                                ?>

                                <li class="nav-item">
                                    <a class="nav-link <?php echo $i==1 ? 'active' : '' ?>" id="tab-<?php echo $i; ?>" data-toggle="tab" href="#tabs-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo $i; ?>" aria-selected="true"><?php echo $title; ?></a>
                                   
                                </li>
                                

                                
                            <?php $i++; endwhile; ?>
                        <?php endif; ?>


                            <!-- <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">DETAILS</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">TECHNICAL SPEC</a>
                            </li> -->


                        </ul>

                        <div class="tab-content" id="myTabContent">

                        <?php if( have_rows('nsp_products_tabs') ): ?>
                            <?php $i=1; while( have_rows('nsp_products_tabs') ): the_row(); ?>
                                
                                <?php 
                                
                                $image = get_sub_field('nsp_products_tab_image'); 
                                $description = get_sub_field('nsp_products_tab_details', false, false);
                                
                                ?>

                                <div class="tab-pane fade  <?php echo  $i==1? 'show active' : ''?>" id="tabs-<?php echo $i; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $i; ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="<?php echo $image; ?>" alt="">
                                        </div>

                                        <div class="col-md-8">
                                            <?php echo $description; ?>
                                        </div>

                                    </div>
                                </div>

                                
                            <?php $i++; endwhile; ?>
                        <?php endif; ?>





                            <!-- <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/folded-business-card-400gsm.jpg" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <h2>Beyond the Fold</h2>
                                        <p>Give your clients more with our folded business cards. Available on 300gsm Kraft or 400gsm Silk and delivered flat and creased ready for folding when required.</p>
                                        <p>You can be as creative as you like with this range. Whether your client needs to showcase a price list, a mini-menu, calendar / appointment table or if they just want a business card with an extra edge then we have you covered.</p>
                                        <p>Choose from:</p>
                                        <ul>
                                            <li>170mm x 55mm (can be folded to 85mm x 55mm)</li>
                                            <li>85mm x 110mm (can be folded to 85mm x 55mm)</li>
                                            <li>300gsm Brown Kraft - Rustic and writeable</li>
                                            <li>400gsm Art Board Silk Finish - available un-laminated or with Matt or Gloss lamination.</li>
                                        </ul>
                                        <p>If you have a design with a solid background colour or areas of heavy ink coverage on or around the crease, we recommend adding lamination to ensure the perfect finish and to help prevent any cracking when the card is folded.</p>

                                    </div>
                                </div>
                            </div>





                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                            <div class="col-md-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/folded-business-card-400gsm.jpg" alt="">
                                            </div>
                                            <div class="col-md-8">
                                                <h2>Technical Specifications for Folded Business Cards</h2>
                                                <p>Before submitting folded business card artwork, we recommend you print a mock up to check the artwork is positioned correctly.</p>
                                                <p>Artwork templates are available for download to assist with setting up your files. These include the panel layout and the different orientations possible to ensure your artwork backs up correctly when printed.</p>
                                                <p>When creating Folded Business Cards artwork, please supply your artwork as a 2 page PDF in spreads. For example, page 1 of your PDF should contain the outside spread of your Folded Business Cards artwork and page 2 should contains the inner spread. </p>
                                                <ul>
                                                    <li>Include 3mm bleed on all sides</li>
                                                    <li>Supply as a CMYK PDF</li>
                                                    <li>Outline or embed fonts</li>
                                                    <li>300dpi resolution</li>
                                                </ul>
        
                                            </div>
                                        </div>
                            </div>
                        </div> -->




                    </div>
                </div>
            </div>
        </div>


<?php get_footer(); ?>