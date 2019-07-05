<?php
/*
 * Template Name: Pricing Page Template
 */
get_header();
$pricing = get_post_meta( get_the_ID(), "_alpha_pt_pricing_table", true );
?>
<body <?php body_class(); ?>>
<?php
while ( have_posts() ) :
	the_post();
	?>
    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <h1 class="display-4"><?php the_title(); ?></h1>
        <div class="lead"><?php the_content(); ?></div>
    </div>
<?php
endwhile;
?>
<div class="container">
    <div class="card-deck mb-3 text-center">
		<?php
		foreach ( $pricing as $ptc ):
			?>
            <div class="card mb-4 shadow-sm">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal"><?php echo esc_html( $ptc[ '_alpha_pt_pricing_caption' ] ) ?></h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$<?php echo esc_html( $ptc[ '_alpha_pt_price' ] ) ?>
                        <small class="text-muted">/ mo</small>
                    </h1>
                    <ul class="list-unstyled mt-3 mb-4">
						<?php foreach ( $ptc[ '_alpha_pt_pricing_option' ] as $pto ): ?>
                            <li><?php echo esc_html( $pto ) ?></li>
						<?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
                </div>
            </div>
		<?php endforeach; ?>
    </div>
<?php get_footer(); ?>