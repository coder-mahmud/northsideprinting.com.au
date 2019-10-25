        <!-- Footer top area -->
        <div class="footer_top">
            <div class="container">
                <div class="row">


                    <div class="col-md-3">

                        <?php dynamic_sidebar('footer_col_one'); ?>

                    </div>

                    <div class="col-md-3">

                        <?php dynamic_sidebar('footer_col_two'); ?>

                    </div>

                    <div class="col-md-3">

                        <?php dynamic_sidebar('footer_col_three'); ?>

                    </div>

                    <div class="col-md-3">

                        <?php dynamic_sidebar('footer_col_four'); ?>

                    </div>



<!--                     <div class="col-md-3">
                        <h2 class="column_heading">About</h2>
                        <ul class="">
                            <li><a href="#">About us</a></li>
                            <li><a href="#">Trade Print Blog</a></li>
                            <li><a href="#">Carrers</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h2 class="column_heading">PRO TOOLS</h2>
                        <ul class="">
                            <li><a href="#">Pro Tools</a></li>
                            <li><a href="#">Simple Pack</a></li>
                            <li><a href="#">Tradepring API</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <h2 class="column_heading">Important</h2>
                        <ul class="">
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Privacy & Cookie Policy</a></li>
                            <li><a href="#">Environmental Policy</a></li>
                        </ul>
                    </div> -->



                </div>
            </div>
        </div>
        <!-- End footer top -->

        <!-- Copyright area -->
        <div class="copyright_area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 my-auto">
                        <?php if(get_field('copyright_text','option') ): ?>
                            <p><?php the_field('copyright_text','option'); ?></p>
                        <?php else: ?>
                            <p>&copy; 2019. All Rights Reserved.</p>
                        <?php endif; ?>
                    </div>

                    <div class="col-sm-6 right_col my-auto">
                        <ul class="footer_social">


                            <?php if(get_field('twitter_link','option') ): ?>
                                <li><a href="<?php echo get_field('twitter_link','option'); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <?php endif; ?>

                            <?php if(get_field('facebook_link','option') ): ?>
                                <li><a href="<?php echo get_field('facebook_link','option'); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <?php endif; ?>

                            
                            <?php if(get_field('linkedin_link','option') ): ?>
                                <li><a href="<?php echo get_field('linkedin_link','option'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            <?php endif; ?>

                        
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright area -->


        <div id="search_overlay">
            <div class="closer_button"><i class="fa fa-times"></i></div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <h1>
                            Write in the below box to search anything....
                            <span>At least 3 charectars</span>
                        </h1>
                        <span class="search_input_holder">
                            <input type="text" class="search_input" name="searchField">
                        </span>
                        


                        <div id="search_result">
                            <div class="loader">
                                <i class="fa fa-spinner fa-pulse"  aria-hidden="true"></i>
                            </div>
                            <ul>
                                <li></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            




        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
        

        
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/vendors.js"></script>
        
        <!-- <script src="<?php echo get_template_directory_uri(); ?>/assets/js/app.js"></script> -->

        <?php wp_footer(); ?>
    </body>

</html>
