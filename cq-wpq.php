<?php
/*
 * Template Name: Custom Query WP_Query
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
		$_p             = new WP_Query( array(
			//'post__in'       => $post_ids,
//			'category_name'  => 'new',
//			'tag'            => 'special',
			'orderby'        => 'post__in',
			'posts_per_page' => $posts_per_page,
			'paged'          => $paged,
			'meta_key'       => 'feature',
			'meta_value'     => 1
//			'tax_query' => array(
//				'relation' => 'OR',
//					array(
//						'taxonomy' => 'post_format',
//						'field'    => 'slug',
//						'terms'    => array( 'post-format-image' ),
//					),)
//            'tax_query'=> array(
//                    'relation' => 'OR',
//                array(
//	                'taxonomy' => 'category',
//	                'field'    => 'slug',
//	                'terms'    => 'new',
//                ),
//	            array(
//		            'taxonomy' => 'post_tag',
//		            'field'    => 'slug',
//		            'terms'    => 'special',
//	            )
//            ),
//			'monthnum'       => 5,
//			'year'           => 2019,
//			'post_status' => 'draft'

		) );
		while ( $_p->have_posts() ) {
			$_p->the_post();
			?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<?php
		}
		wp_reset_query();
		?>
        <div class="container post-pagination">
            <div class="row">
                <div class="col-md-12">
					<?php
					echo paginate_links( array(
						'total'   => $_p->max_num_pages,
						'current' => $paged,
					) );
					?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>