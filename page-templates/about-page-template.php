<?php
/*
 * Template Name: About Page Template
 */
get_header();
?>
<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/about-page/hero-page" ); ?>

<div class="posts">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
        <div class="post" <?php post_class(); ?>>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <h2 class="post-title text-center">
                            <?php the_title(); ?>
                        </h2>
                        <p class="text-center">
                            <em><?php the_author(); ?></em><br/>
                            <?php echo get_the_date(); ?>
                        </p>
                    </div>
                </div>
                    <div class="col-md-10 offset-md-1">
                        <p>
                            <?php
                            if ( has_post_thumbnail() ) {
                                $thumbnail_url = get_the_post_thumbnail_url( null, "large" );
                                printf( '<a class="popup" href="%s" data-featherlight="image">', $thumbnail_url );
                                the_post_thumbnail( "large", array( "class" => "img-fluid" ) );
                                echo '</a>';
                            }

                            the_content();

                            /*next_post_link();
                            echo "<br/>";
                            previous_post_link();*/

                            ?>
                        </p>
                    </div>
            </div>
        </div>
    <?php
    endwhile;
    ?>

    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
                <?php
                the_posts_pagination( array(
                    "screen_reader_text" => ' ',
                    "prev_text"          => "New Posts",
                    "next_text"          => "Old Posts"
                ) );
                ?>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1">
	            <?php if ( class_exists( "Attachments" ) ):?>
			    <?php
				    $attachments = new Attachments( 'testimonials' );
				    if ( class_exists( "Attachments" ) && $attachments->exist() ) {
					    ?>
                        <h2 class="text-center">
						    <?php _e( "Testimonials", "alpha" ); ?>
                        </h2>
					    <?php
				    }
			    ?>
                <div id="" class="carousel slide">
                    <div class="slider">
				    <?php
				    if ( class_exists( "Attachments" ) ) {
					    if ( $attachments->exist() ) {
						    while ( $attachment = $attachments->get() ) { ?>
                                <div class="carousel-inner">
                                    <div class="item carousel-item active">
                                        <div class="img-box"><?php echo $attachments->image( 'thumbnail' ); ?></div>
                                        <p class="testimonial"><?php echo esc_html( $attachments->field( 'testimonial' ) ); ?></p>
                                        <p class="overview"><b><?php echo esc_html( $attachments->field( 'name' ) );
                                        ?></b><?php echo esc_html( $attachments->field( 'position' ) ); ?> at <?php echo
                                            esc_html( $attachments->field( 'company' ) ); ?></p>
                                    </div>
                                </div>
							    <?php
						    }}}
				    ?>
                </div>
                    <!-- Carousel controls -->
                    <div id="customize-controls">
                        <a class="carousel-control left carousel-control-prev" >
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control right carousel-control-next" >
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
	                <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
