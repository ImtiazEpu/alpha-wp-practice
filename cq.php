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
		$paged          = get_query_var( "paged" ) ? get_query_var( "paged" ) : 1;
		$posts_per_page = 3;
		$post_ids       = array( 22, 23, 29, 16, 18, 32, 34, 41, 14, 37, 25, 1, 27, 39 );
		$_p             = get_posts( array(
			'post__in'       => $post_ids,
			'orderby'        => 'post__in',
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged

		) );
		foreach ( $_p as $p ) {
			//setup_postdata( $post );
			?>
            <h3><a href="<?php echo esc_url($p->guid); ?>"><?php echo apply_filters("the_title",$p->post_title);
                    ?></a></h3>
<!--            <h3><a href="--><?php //the_permalink(); ?><!--">--><?php //the_title(); ?><!--</a></h3>-->
			<?php
		}
		//wp_reset_postdata();
		?>
        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
					<?php
					echo paginate_links( array(
						'total' => ceil( count( $post_ids ) / $posts_per_page )
					) );
					?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>