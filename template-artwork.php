<?php 
/*
* Template Name: Artwork
*/
get_header(); ?>

<div class="page_heading artwork_heading">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php the_title(); ?>
            </div>
        </div>
    </div>
</div>

<div class="artwork_area">
    <div class="container_fluid">

        <div class="row">
            <div class="col-12">
                <div id="mainMenuBarAnchor"></div>
                <div class="onpage_links">
                    <ul>
                        <?php
                            $args = array(
                                'post_type'=> 'products',
                                'order_by'=> 'post',
                                'order'=> 'ASC'
                            );

                            $query = new WP_Query($args);
                            if( $query-> have_posts() ) : while( $query-> have_posts() ) : $query-> the_post(); ?>
                                
                                <li><a href="#post-<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></li>
                                
                            <?php endwhile; endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">

        <div class="row post_container">
            <?php
                $args = array(
                    'post_type'=> 'products',
                    'order_by'=> 'post',
                    'order'=> 'ASC'
                );

                $query = new WP_Query($args);
                if( $query-> have_posts() ) : while( $query-> have_posts() ) : $query-> the_post(); ?>


                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <h1 class="anchor_holder" id="post-<?php echo get_the_ID(); ?>"></h1>
                                <h1 class="post_title" ><?php the_title(); ?> </h1>
                            </div>
                        </div>
                    </div>



                    <div class="single_product_tabbed_area">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <?php // echo get_the_ID();  ?>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php if( have_rows('nsp_products_tabs') ): ?>
                                        <?php $i=1; while( have_rows('nsp_products_tabs') ): the_row(); ?>
                                            
                                        
                                            <li class="nav-item">
                                                <a class="nav-link <?php echo $i==1 ? 'active' : '' ?>" id="tab-<?php echo get_the_ID(); ?>-<?php echo $i; ?>" data-toggle="tab" href="#tabs-<?php echo get_the_ID(); ?>-<?php echo $i; ?>" role="tab" aria-controls="tab-<?php echo get_the_ID(); ?>-<?php echo $i; ?>" aria-selected="true"><?php the_sub_field('nsp_product_tab_title'); ?></a>
                                               
                                            </li>
                                            

                                            
                                        <?php $i++; endwhile; ?>
                                    <?php endif; ?>

                                    </ul>

                                    

                                    <div class="tab-content" id="myTabContent">

                                    <?php if( have_rows('nsp_products_tabs') ): ?>
                                        <?php $i=1; while( have_rows('nsp_products_tabs') ): the_row(); ?>
                                            
                                            

                                            
                                            <div class="tab-pane fade  <?php echo  $i==1 ? 'show active' : '' ?>" id="tabs-<?php echo get_the_ID(); ?>-<?php echo $i; ?>" role="tabpanel" aria-labelledby="tab-<?php echo get_the_ID(); ?>-<?php echo $i; ?>">
                                                


                                                    

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


                <?php
                endwhile; endif;

                wp_reset_query();
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>