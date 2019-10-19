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

                    </div>


                    <div class="col-md-6">
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
                                
                            
                                <li class="nav-item">
                                    <a class="nav-link <?php echo $i==1 ? 'active' : '' ?>" id="tab-<?php echo $i; ?>" data-toggle="tab" href="#tabs-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo $i; ?>" aria-selected="true"><?php the_sub_field('nsp_product_tab_title'); ?></a>
                                   
                                </li>
                                

                                
                            <?php $i++; endwhile; ?>
                        <?php endif; ?>

                        </ul>

                        

                        <div class="tab-content" id="myTabContent">

                        <?php if( have_rows('nsp_products_tabs') ): ?>
                            <?php $i=1; while( have_rows('nsp_products_tabs') ): the_row(); ?>
                                
                                

                                
                                <div class="tab-pane fade  <?php echo  $i==1 ? 'show active' : '' ?>" id="tabs-<?php echo $i; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $i; ?>">
                                    


                                        

                                    <?php if(get_sub_field('nsp_product_tab_type') == 'No'): ?>
                                    <div class="row">

                                        <div class="col-md-6">
                                            
                                            <ul class="descriptions_block">

                                            <?php if( have_rows('nsp_product_tab_specs') ): ?>
                                                <?php  while( have_rows('nsp_product_tab_specs') ): the_row(); ?>
                                                    
                                                    <?php 
                                                    
                                                      $heading = get_sub_field('nsp_product_specs_heading'); 
                                                      $text = get_sub_field('nsp_product_specs_text');
                                                    
                                                    ?>

                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-3 heading">
                                                                <?php echo $heading; ?>
                                                            </div>
                                                            <div class="col-md-9 text">
                                                                <?php echo $text; ?>
                                                            </div>
                                                        </div>
                                                        
                                                    </li>

                                                    
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            
                                            </ul>
                                        </div>


                                        <div class="col-md-6">
                                            
                                            <ul class="descriptions_block">

                                            <?php if( have_rows('nsp_product_tab_specs_right') ): ?>
                                                <?php  while( have_rows('nsp_product_tab_specs_right') ): the_row(); ?>
                                                    
                                                    <?php 
                                                    
                                                      $heading = get_sub_field('nsp_product_specs_heading_right'); 
                                                      $text = get_sub_field('nsp_product_specs_text_right');
                                                    
                                                    ?>

                                                    <li>
                                                        <div class="row">
                                                            <div class="col-md-3 heading">
                                                                <?php echo $heading; ?>
                                                            </div>
                                                            <div class="col-md-9 text">
                                                                <?php echo $text; ?>
                                                            </div>
                                                        </div>
                                                        
                                                    </li>

                                                    
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            
                                            </ul>
                                        </div>
                                        
                                        <?php if(get_sub_field('nsp_product_desc_text')) : ?>
                                            <div class="col-12 instructions">
                                                <!-- <b>General Instructions:</b> -->
                                                <?php the_sub_field('nsp_product_desc_text'); ?>
                                               
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php else: ?>

                                    <div class="row assets">


                                        <?php if( have_rows('nsp_product_asset_tab') ): ?>
                                            <?php $i=1; while( have_rows('nsp_product_asset_tab') ): the_row(); ?>
                                                
                                                <?php 
                                                
                                                  $heading_first = get_sub_field('nsp_product_asset_heading_first_row'); 
                                                  $heading_second = get_sub_field('nsp_product_asset_heading_second_row'); 
                                                  $image = get_sub_field('nsp_product_asset_image');
                                                  $file = get_sub_field('nsp_product_asset_file');
                                                
                                                ?>

                                                <div class="col-md-4">
                                                    <div class="single_asset">
                                                        <h2 class="title"><?php echo $heading_first; ?> <span class="size"><?php echo $heading_second; ?></span></h2>
                                                        <img src="<?php echo $image; ?>" alt="">
                                                        <a href="<?php echo $file; ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/pdf_doc.png" alt=""> DOWNLOAD</a>
                                                    </div>
                                                </div>

                                                
                                            <?php $i++; endwhile; ?>
                                        <?php endif; ?>
									</div>

                                    <?php endif; ?>
                                        

                                    
                                </div>
								 
                                
                            <?php $i++; endwhile; ?>
                        <?php endif; ?>

					
                     
                </div><!-- End Tab Content -->
            </div>
        </div>
        </div>
        </div>


<?php get_footer(); ?>