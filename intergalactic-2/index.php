<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Intergalactic 2
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) :

				if ( is_home() && ! is_front_page() ) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php
				endif;?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

// Display Recipes CPT
// Added by Richard Warnett
				<?php
					$args = array(‘post_type’ => ‘recipes’, ‘posts_per_page’ => ‘3’);
					$myQuery = new WP_Query($args);
				?>
				<?php if ($myQuery->have_posts() : ?>
					<?php while ($myQuery->have_posts() : $myQuery->the_post() ?>
						// Dislpay the podcast title
						echo the_title();
					<?php endwhile;  wp_reset_postdata(); ?>
				<?php endif; ?>
//End of addition for Recipes CPT

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
