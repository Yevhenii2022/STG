<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package pointer_theme
 */

get_header();
?>

<main class="search-page container py-5" style="margin-top: 50px;">
	<a href="javascript:history.back()" class="d-inline-block mb-4 text-decoration-none">&larr; Back</a>

	<?php
	$search_query = get_search_query();

	$args = [
		'post_type'      => 'people',
		'post_status'    => 'publish',
		's'              => $search_query,
		'search_columns' => ['post_excerpt'],
	];

	$query = new WP_Query($args);
	?>

	<h1 class="mb-5 d-flex flex-column">
		Search results for
		<span class="fw-bold">
			<?= esc_html($search_query); ?> (<?= $query->found_posts; ?> <?= _n('result', 'results', $query->found_posts, 'pointer_theme'); ?> found)
		</span>
	</h1>

	<?php if ($query->have_posts()) : ?>
		<?php while ($query->have_posts()) : $query->the_post(); ?>

			<div class="search-result-item mb-5 pb-4 border-bottom">
				<?php
				$excerpt = get_the_excerpt();

				if ($search_query) {
					$excerpt = preg_replace(
						'/' . preg_quote($search_query, '/') . '/i',
						'<span class="text-danger fw-bold">$0</span>',
						$excerpt
					);
				}
				?>

				<p class="mb-3"><?= $excerpt; ?></p>

				<a href="<?php the_permalink(); ?>" class="fw-bold text-primary text-decoration-none">
					Page
				</a>
			</div>

		<?php endwhile; ?>

	<?php else : ?>
		<p>No results found for <strong><?= esc_html($search_query); ?></strong></p>
	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
</main>

<?php
get_footer();
