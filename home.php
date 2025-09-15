<?php
/*
Template Name: Home
*/

get_header();
?>

<main>
  <?php get_template_part('template-parts/hero-slider'); ?>

  <?php get_template_part('template-parts/firm-section'); ?>

  <?php get_template_part('template-parts/people-section'); ?>

  <?php get_template_part('template-parts/contact-section'); ?>
</main>

<?php get_footer(); ?>