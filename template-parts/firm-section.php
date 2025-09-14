<?php
$name = get_field('firm');
$title = get_field('firm_title') ?? '';
$subtitle = get_field('firm_subtitle') ?? '';
?>

<section id="firm" class="firm">
  <div class="container">
    <div class="firm__wrapper">
      <?php if ($name) : ?>
        <h3><?= $name ?></h3>
      <?php endif; ?>
      <?php if ($title) : ?>
        <h2><?= $title ?></h2>
      <?php endif; ?>
      <?php if ($subtitle) : ?>
        <p><?= $subtitle ?></p>
      <?php endif; ?>
    </div>
  </div>
</section>