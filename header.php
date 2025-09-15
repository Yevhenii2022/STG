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
							<h2><?= $site_name ?></h2>
						<?php endif; ?>
					</div>
					<div>
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
					</div>
				</div>
			</div>
		</header>