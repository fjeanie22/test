<?php
/**
 * The Template for displaying all single posts.
 *
 * @package unite
 */

get_header(); ?>

	<div id="primary"  <?php echo of_get_option( 'site_layout' ); ?>">
		<main id="main" class="site-main" role="main">
<?php $acsessuar = new WP_Query( array( 'post_type' => 'acme_product', 'posts_per_page' => 10 ) ); ?>

 <?php while ( $acsessuar->have_posts() ) : $acsessuar->the_post(); ?>
		

			<?php get_template_part( 'content', 'single' ); ?>

			

			

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->


