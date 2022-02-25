<?php
/**
 * The main archive template file for inner content.
 *
 * @package kadence
 */

namespace Kadence;

get_header();

kadence()->print_styles( 'kadence-content' );

/**
 * Hook for Hero Section
 */
do_action( 'kadence_hero_header' );
?>
<div id="primary" class="content-area category">
	<div class="content-container site-container">
		<main id="main" class="site-main" role="main">
			<?php
			/**
			 * Hook for anything before main content
			 */
			do_action( 'kadence_before_archive_content' );
			if ( kadence()->show_in_content_title() ) {
				get_template_part( 'template-parts/content/archive_header' );
			}
			if ( have_posts() ) {
				?>
				<div id="archive-container" class="<?php echo esc_attr( implode( ' ', get_archive_container_classes() ) ); ?>">
					<?php
					while ( have_posts() ) {
						the_post();

						get_template_part( 'template-parts/content/entry', get_post_type() );
					}
					?>
                    <?php echo '<H1> Taxonomy Hooked! </h1>'; ?>
				</div>
				<?php
				get_template_part( 'template-parts/content/pagination' );
			} else {
				get_template_part( 'template-parts/content/error' );
			}
			/**
			 * Hook for anything after main content
			 */
			do_action( 'kadence_after_archive_content' );
			?>
		</main><!-- #main -->
		<?php
		get_sidebar();
		?>
	</div>
</div><!-- #primary -->

<?php get_footer(); ?>