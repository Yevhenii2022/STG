<?php
$title = get_field('contact') ?? '';
?>

<section id="contact" class="contact">
  <div class="container">
    <div class="contact__wrapper d-flex justify-content-between">
      <?php if ($title) : ?>
        <h2><?= $title ?></h2>
      <?php endif; ?>

      <?php echo do_shortcode('[contact-form-7 id="c4ea21f" title="Contact Form"]') ?>

    </div>
  </div>
</section>