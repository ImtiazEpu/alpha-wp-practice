<?php
$alpha_layout_class = "col-md-8";
$alpha_text_class   = "";
if ( ! is_active_sidebar( "sidebar-1" ) ) {
	$alpha_layout_class = "col-md-10 offset-md-1";
	$alpha_text_class   = "text-center";
}
?>

<?php get_header(); ?>
<body <?php body_class( array( "first_class", "second_class" ) ); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
    <div class="container">
        <div class="row">
            <div class="<?php echo $alpha_layout_class; ?> pt-4">
                <div class="posts" <?php ?>>
					<?php
					while ( have_posts() ) :
						the_post();
						?>
                        <div <?php post_class( array( "first_class", "second_class" ) ); ?>>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h2 class="post-title <?php echo $alpha_text_class; ?>">
											<?php the_title(); ?>
                                        </h2>
                                        <p class="<?php echo $alpha_text_class; ?>">
                                            <em><?php the_author_posts_link(); ?></em><br/>
											<?php echo get_the_date(); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
											<?php
											/*if ( !class_exists( 'Attachments' ) ) {*/
											if ( has_post_thumbnail() ) {
												$thumbnail_url = get_the_post_thumbnail_url( null, "large" );
												printf( '<a class="popup" href="%s" data-featherlight="image">', $thumbnail_url );
												the_post_thumbnail( "large", array( "class" => "img-fluid mb-4" ) );
												echo '</a>';
												/*}*/
											}
											//the_post_thumbnail("alpha-square-new1");
											//the_post_thumbnail("alpha-square-new2");
											//the_post_thumbnail("alpha-square-new3");

											the_content();
											if ( get_post_format() == 'image' && function_exists( "the_field" ) ):
												?>
                                                <div class="col-md-4 px-0">
                                                    <ul class="list-group">
                                                        <li class="list-group-item">
                                                            <Strong>Camera Model:</Strong>
															<?php $alpha_camera_model = get_field( "camera_model" );
															echo esc_html( $alpha_camera_model );
															?>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <Strong>Location:</Strong>
															<?php $alpha_location = get_field( "location" );
															echo esc_html( $alpha_location );
															?>
                                                        </li>
                                                        <li class="list-group-item">
                                                            <Strong>Date:</Strong>
															<?php $alpha_date = get_field( "date" );
															echo esc_html( $alpha_date );
															?>
                                                        </li>
														<?php if ( get_field( "licen" ) ): ?>
                                                            <li class="list-group-item">
                                                                <Strong>Licensed information:</Strong>
																<?php
																$alpha_licensed_information = apply_filters( "the_content",
																	get_field( "licensed_information" ) );
																echo $alpha_licensed_information;
																?>
                                                            </li>
														<?php endif; ?>
                                                    </ul>
                                                    <p>
														<?php
														$alpha_image         = get_field( 'image' );
														$alpha_image_details = wp_get_attachment_image_src( $alpha_image, "alpha-square" );
														echo "<img src='" . esc_url( $alpha_image_details[ 0 ] ) . "'/>";
														?>
                                                    </p>
                                                    <p>
														<?php
														$file = get_field( 'attachment' );
														if ( $file ) {
															$file_url   = wp_get_attachment_url( $file );
															$file_thumb = get_field( "thumbnail", $file );
															if ( $file_thumb ) {
																$file_thumb_details = wp_get_attachment_image_src( $file_thumb );
																echo "<a target='_blank' href='{$file_url}'><img src='" . esc_url( $file_thumb_details[ 0 ] )
																     . "'/></a>";
															} else {
																echo "<a target='_blank' href='{$file_url}'>{$file_url}</a>";
															}
														}
														?>
                                                    </p>

                                                </div>
											<?php
											endif;
											wp_link_pages();
											?>
                                        </div>
                                    </div>

                                    <div class="authorsection mt-4">
                                        <div class="row">
                                            <div class="col-md-2 authorimage">
												<?php
												echo get_avatar( get_the_author_meta( "ID" ) );
												?>
                                            </div>
                                            <div class="col-md-10 pl-5">
                                                <h4>
													<?php echo get_the_author_meta( "display_name" ); ?>
                                                </h4>
                                                <p>
													<?php echo get_the_author_meta( "description" ); ?>
                                                </p>
												<?php if ( function_exists( "the_field" ) ): ?>
                                                    <p>
														<?php
														$facebook = get_field( "facebook","user_".get_the_author_meta( "ID" ));
														if ( $facebook ):?>
                                                            Facebook:<?php the_field( "facebook", "user_" . get_the_author_meta(
																	"ID" ) ); ?><br>
														<?php endif; ?>

	                                                    <?php
	                                                    $twitter = get_field( "twitter","user_".get_the_author_meta( "ID" ));
	                                                    if ( $twitter ):?>
                                                            Twitter:<?php the_field( "twitter", "user_" . get_the_author_meta(
				                                                    "ID" ) ); ?><br>
	                                                    <?php endif; ?>

                                                        <?php
	                                                    $linkedin = get_field( "linkedin","user_".get_the_author_meta( "ID" ));
	                                                    if ( $linkedin ):?>
                                                            LinkedIn:<?php the_field( "linkedin", "user_" . get_the_author_meta(
				                                                    "ID" ) ); ?><br>
	                                                    <?php endif; ?>
                                                    </p>
												<?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

									<?php if ( function_exists( "the_field" ) ): ?>
                                        <div>
                                            <h1><?php _e( "Related Posts", "alpha" ) ?></h1>
											<?php
											$related_posts = get_field( "related_posts" );
											$alpha_rp      = new WP_Query( array(
												'post__in' => $related_posts,
												'orderby'  => 'post__in',
											) );
											while ( $alpha_rp->have_posts() ) {
												$alpha_rp->the_post(); ?>
                                                <h4><?php the_title(); ?></h4>
												<?php
											}
											wp_reset_query();
											?>
                                        </div>
									<?php endif; ?>

									<?php if ( ! post_password_required() ): ?>
                                        <div class="col-md-12">
											<?php
											comments_template();
											?>
                                        </div>
									<?php endif; ?>
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
                </div>
            </div>
			<?php
			if ( is_active_sidebar( "sidebar-1" ) ):
				?>
                <div class="col-md-4">
					<?php
					if ( is_active_sidebar( "sidebar-1" ) ) {
						dynamic_sidebar( "sidebar-1" );
					}
					?>
                </div>
			<?php endif; ?>
        </div>
    </div>

<?php get_footer(); ?>