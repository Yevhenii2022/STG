<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package pointer_theme
 */

get_header();
?>

<main id="primary" class="container py-5" style="margin-top: 150px;">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<h1 class="mb-4"><?php the_title(); ?></h1>
			<div>
				<?php
				if (has_excerpt()) {
					echo '<p>' . get_the_excerpt() . '</p>';
				}
				?>
			</div>

	<?php endwhile;
	endif; ?>
</main>

<?php
get_footer();
