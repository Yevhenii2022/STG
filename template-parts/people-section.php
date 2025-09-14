<?php
$name = get_field('people') ?? '';
?>

<section id="people" class="people">
  <div class="container">
    <div class="people__wrapper d-flex flex-column">
      <?php if ($name) : ?>
        <h3><?= $name ?></h3>
      <?php endif; ?>


    </div>
  </div>
</section>