<?php get_header();?>


<div id="container">
    <div id="inner_container">
        <div class="img_container">
            <img src="<?php echo get_template_directory_uri();?>/images/1.jpg ">
        </div>
        <div class="img_container">
            <img src="<?php echo get_template_directory_uri();?>/images/2.jpg ">
        </div>
        <div class="img_container">
            <img src="<?php echo get_template_directory_uri();?>/images/3.jpg ">
        </div>


        <div id="overlay">
            <div id="left_botton" class="overlay_button" onclick="onLeftButton();">   <  </div>


            <div id="right_botton" class="overlay_button" onclick="onRightButton();">  > </div>
  


        </div>
    </div>
</div>
<div style="text-aling:center">


    <span class=" dot" onclick="currentSlide(1)"> </span>
    <span class=" dot" onclick="currentSlide(2)"> </span>
    <span class=" dot" onclick="currentSlide(3)"> </span>


</div>


<div id="content" class="site-content">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">


            <section class="hero">
                Hero
            </section>


            <section class="services">
                <h2>Services</h2>


                <div class="container">


                    <div class="services-item">
                         <?php 
                         if(is_active_sitebar('services-1')){


                            dynamic_sidebar('services-1');
                        }
                         ?>
                    </div>
                     <div class="services-item">
                        <?php 
                        if(is_active_sitebar('services-2')){


                            dynamic_sidebar('services-2');
                        }
                         ?>
                    </div>


                    <div class="services-item">
                         <?php 
                        if(is_active_sitebar('services-3')){


                           dynamic_sidebar('services-3');
                        }
                        ?>
                    </div>
                </div>
            </section>


            <section class="home-blog">
                <h2>Latest News</h2>
                <div class="container">
                    <?php 
                    
                      $args = array(
                        'post_type' => 'post',
                        'post_per_page' => 5,
                        'category__in' => array(9,10,15),
                        'category__not_in' => array(1)
                      )


                      $postlist = new WP_Query($args);


                        if($postlist ->have_posts()):


                         while(  $postlist ->  have_post();):  $postlist ->  the_post();
                         get_template_part('parts/content', 'latest-news');
                        endwhile;
                        wp_reset_postdata();
                        else: ?>
                        <p>Nothing yet to be displayed</p>
                        <?php endif;?>
                                
                    
                    
                </div>
            </section>


            <div class="wpdevs-slider"></div>
        </main>
    </div>
</div>