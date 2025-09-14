<?php
$count_of_posts = 1;
$paged = 1;
$args_category = array(
  'post_type' => 'people',
  'post_status' => 'publish',
  'ignore_sticky_posts' => 1,
  'posts_per_page' => $count_of_posts,
  'paged' => $paged,
);
$category_query = new WP_Query($args_category);
?>

<section id="people" class="people">
  <div class="container">
    <div class="people__wrapper">

      <?php
      $name = get_field('people') ?? '';
      if ($name) : ?>
        <h3><?= esc_html($name) ?></h3>
      <?php endif; ?>

      <?php if ($category_query->have_posts()) : ?>

        <div class="sort-wrapper">
          <div class="search-input">
            <input type="text" id="search-input" placeholder="Search by article...">
          </div>
          <div class="select">
            <input class="select__input" type="hidden" name="" id="sort-order">
            <div class="select__head">Sort by:</div>
            <ul class="select__list" style="display: none;">
              <li class="select__item" data-sort="DESC">From Newest to Oldest</li>
              <li class="select__item" data-sort="ASC">From Oldest to Newest</li>
            </ul>
          </div>
        </div>

        <div class="post-query" id="post-list">
          <?php while ($category_query->have_posts()) : $category_query->the_post(); ?>
            <div class="single-post-item">
              <a href="<?php the_permalink(); ?>">
                <div>
                  <?php the_post_thumbnail(); ?>
                  <h4><?php the_title(); ?></h4>
                </div>

              </a>
            </div>
          <?php endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>

        <?php if ($category_query->max_num_pages > 1) : ?>
          <div id="load-more-posts" class="wp-block-button is-style-outline-custom-button"
            data-post-type="people"
            data-page="1"
            data-totalpages="<?php echo esc_attr($category_query->max_num_pages); ?>">
            <a class="wp-block-button__link wp-element-button">Load more</a>
          </div>
        <?php endif; ?>

      <?php else : ?>
        <p class="post-title">There are currently no posts</p>
      <?php endif; ?>

    </div>
  </div>
</section>