<?php get_header(); ?>

<div class="page_body">
    <div class="popular_products">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                        $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
                        $cat_name = $term->name;
                    ?>
                    <h2 class="area_title text-center">Products from <b><?php echo $cat_name; ?></b> Category</h2>
                </div>
                
                <?php
                    $args = array(
                        'post_type' => 'products',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'product-cat',
                                'field'    => 'slug',
                                'terms'    => get_query_var( 'term' ),
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
</div>

<?php get_footer(); ?>