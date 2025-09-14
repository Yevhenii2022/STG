		<div class="single-post-item">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
				<div class="single-post-item__box">
					<h4><?php the_title(); ?></h4>
					<p>
						<?php
						$terms = get_the_terms(get_the_ID(), 'people-type');
						if (! empty($terms) && ! is_wp_error($terms)) {
							$names = wp_list_pluck($terms, 'name');
							echo esc_html(implode(', ', $names));
						} else {
							echo 'Without Expertise';
						}
						?>
					</p>
				</div>
			</a>
		</div>