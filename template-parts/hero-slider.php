  <section class="banner-slider">
      <div class="slider">
          <?php while (have_rows('slide')): the_row();
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $backgroundFile = get_sub_field('background');

                if ($backgroundFile) {
                    $file_info = wp_check_filetype($backgroundFile);
                    $file_type = $file_info['type'];
                }
            ?>
              <div class="slide">
                  <?php if (!empty($file_type) && strpos($file_type, 'video') !== false) : ?>
                      <video class="w-100 h-100 position-absolute top-0 start-0 object-fit-cover"
                          autoplay muted loop playsinline>
                          <source src="<?php echo esc_url($backgroundFile); ?>" type="<?php echo esc_attr($file_type); ?>">
                      </video>
                  <?php elseif (!empty($file_type) && strpos($file_type, 'image') !== false) : ?>
                      <div class="w-100 h-100 position-absolute top-0 start-0"
                          style="background-image: url('<?php echo esc_url($backgroundFile); ?>');
                      background-size: cover;
                      background-position: center;">
                      </div>
                  <?php endif; ?>

                  <div class="slide-content d-flex justify-content-center flex-column gap-5">
                      <?php if ($title): ?>
                          <h1 class="z-2"><?= $title ?></h1>
                      <?php endif ?>
                      <?php if ($subtitle): ?>
                          <p class="z-2"><?= $subtitle; ?></p>
                      <?php endif ?>
                  </div>
              </div>
          <?php endwhile ?>
      </div>
      <ul class="slider-dots d-flex justify-content-center">
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