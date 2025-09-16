<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pointer_theme
 */

?>

<?php
$site_name = get_field('site_name', 'options') ?? '';
$footer_text = get_field('footer_text', 'options') ?? '';
$address = get_field('address', 'options') ?? '';
$post_address = get_field('post_address', 'options') ?? '';
$map_text = get_field('map_text', 'options') ?? '';
$map_link = get_field('map_link', 'options') ?? '';
$phone_1 = get_field('phone_1', 'options') ?? '';
$phone_2 = get_field('phone_2', 'options') ?? '';
$email = get_field('email', 'options') ?? '';
$cleanedNumber1 = preg_replace('/\D/', '', $phone_1);
$cleanedNumber2 = preg_replace('/\D/', '', $phone_2);
?>

<footer class="footer">
  <div class="container">
    <div class="footer__wrapper d-flex justify-content-between">
      <div>
        <?php if ($site_name) : ?>
          <h2><?= $site_name ?></h2>
        <?php endif; ?>
        <?php if ($footer_text) : ?>
          <p><?= $footer_text ?></p>
        <?php endif; ?>
      </div>
      <div>
        <h3>ABOUT US</h3>
        <nav class="footer__menu">
          <?php
          wp_nav_menu(
            array(
              'container' => 'ul',
              'theme_location' => 'nav-menu',
              'menu_class' => 'footer__nav-list',
            )
          );
          ?>
        </nav>
      </div>
      <div>
        <h3>CONTACT US</h3>
        <div class="footer__address d-flex flex-column">
          <?php if ($address) : ?>
            <p><?= $address ?></p>
          <?php endif; ?>

          <?php if ($post_address) : ?>
            <p style="max-width: 10rem;"><?= $post_address ?></p>
          <?php endif; ?>

          <?php if ($map_text) : ?>
            <a href="<?= esc_url($map_link); ?>"
              class="footer__address--map"
              target="_blank"
              rel="nofollow noopener noreferrer">
              <?= esc_html($map_text); ?>
            </a>
          <?php endif; ?>

          <div class="footer__address--tel d-flex gap-3">
            <?php if ($phone_1) : ?>
              <a href="tel:+<?= $cleanedNumber1 ?>">
                <?= $phone_1; ?>
              </a>
            <?php endif; ?>
            <?php if ($phone_2) : ?>
              <a href="tel:+<?= $cleanedNumber2 ?>">
                <?= $phone_2; ?>
              </a>
            <?php endif; ?>
          </div>

          <?php if ($email) : ?>
            <a href="mailto:<?= $email ?>" class="footer__address--email">
              <?= $email; ?>
            </a>
          <?php endif; ?>

        </div>
      </div>
    </div>
    <div class="footer__bottom d-flex">
      <p>
        Copyright © <?php echo date('Y'); ?> Test Task | All Rights Reserved</a>
      </p>
    </div>
  </div>
</footer>

<!-- Modal Search -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content p-2">
      <div class="modal-header border-0">
        <h4 class="modal-title" id="searchModalLabel">What are you looking for?</h4>
      </div>
      <div class="modal-body d-flex align-items-center gap-4">
        <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
          <div class="input-group">
            <input type="search" class="form-control" placeholder="Search…" value="<?php echo get_search_query(); ?>" name="s" />
            <button type="submit" class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 96 96" fill="none">
                <rect width="96" height="96" fill="#FE4670" rx="45" />
                <path fill="#fff" d="m63.744 61.185-7.155-7.158a13.88 13.88 0 1 0-2.561 2.561l7.161 7.163a1.812 1.812 0 0 0 2.562-2.561l-.007-.005Zm-28.4-15.596A10.246 10.246 0 1 1 45.59 55.835a10.256 10.256 0 0 1-10.245-10.246Z" />
              </svg>
            </button>
          </div>
        </form>
        <div class="btn-box">
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
<?php wp_footer(); ?>
</body>

</html>