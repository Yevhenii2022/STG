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

</div>
<?php wp_footer(); ?>
</body>

</html>