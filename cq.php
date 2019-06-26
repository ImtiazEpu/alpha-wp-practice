<?php
/*
 * Template Name: Custom Query
 */
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
<?php get_template_part( "/template-parts/common/hero" ); ?>
    <div class="posts text-center">
        <h2 class="post-title text-center mt-5">
			<?php the_title(); ?>
        </h2>
		<?php
		$_p = get_posts( array(
			'post__in'       => array( 22, 23, 29, 16, 18, 32, 34, 41, 14, 37, 25 ),
			'orderby'        => 'post__in',
			'posts_per_page' => 3,

		) );
		foreach ( $_p as $post ) {
			setup_postdata( $post );
			?>
    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php
		}
		wp_reset_postdata();
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
<?php get_footer(); ?>