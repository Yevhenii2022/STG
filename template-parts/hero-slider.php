  <section class="banner-slider">
      <div class="slider">
          <?php while (have_rows('slide')):
                the_row();
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $backgroundImage = get_sub_field('img_slider');
            ?>
              <div class="slide" style=" background-image: url('<?php echo esc_url($backgroundImage); ?>');">
                  <div class="slide-content">
                      <?php if ($title): ?>
                          <h1><?= $title ?></h1>
                      <?php endif ?>
                      <?php if ($subtitle): ?>
                          <p><?= $subtitle; ?></p>
                      <?php endif ?>
                  </div>
              </div>
          <?php endwhile ?>
      </div>
      <ul class="slider-dots">
          <?php while (have_rows('slide')):
                the_row();
                $subtitle = get_sub_field('subtitle');
            ?>
              <li class="<?php if (get_row_index() == 1) echo 'active'; ?>">
                  <p><?= sprintf('%02d', get_row_index()); ?></p>
                  <p><?= $subtitle; ?></p>
              </li>
          <?php endwhile ?>
      </ul>
  </section>