<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pointer_theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php // This script uses for phone mask 
	?>
	<script src="https://unpkg.com/imask"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page">
		<header class="header">
			<div class="container">
				<div class="header__wrapper d-flex justify-content-between align-items-center">
					<div>
						<?php
						$site_name = get_field('site_name', 'options') ?? '';
						if ($site_name) : ?>
							<a href="<?= esc_url(home_url('/')); ?>" class="text-decoration-none">
								<h2><?= $site_name ?></h2>
							</a>
						<?php endif; ?>
					</div>
					<div class="d-flex align-items-center gap-5">
						<nav class="header__menu">
							<?php
							wp_nav_menu(
								array(
									'container' => 'ul',
									'theme_location' => 'nav-menu',
									'menu_class' => 'header__nav-list',
								)
							);
							?>
						</nav>

						<div class="header__search">
							<button type="button" class="btn btn-link p-0 ms-3" data-bs-toggle="modal" data-bs-target="#searchModal">
								<svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none">
									<rect width="27" height="27" x=".5" y=".5" stroke="#0F5199" rx="3.5" />
									<path fill="#EDFAFF" d="m18.898 18.102-2.226-2.227a4.319 4.319 0 1 0-.797.797l2.228 2.228a.566.566 0 0 0 .797 0 .563.563 0 0 0 0-.797l-.002-.001Zm-8.835-4.852a3.187 3.187 0 1 1 6.374 0 3.187 3.187 0 0 1-6.374 0Z" />
								</svg>
							</button>
						</div>

					</div>
				</div>
			</div>
		</header>