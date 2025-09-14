<?php
$name = get_field('people') ?? '';
?>

<section id="people" class="people">
  <div class="container">
    <div class="people__wrapper">
      <?php if ($name) : ?>
        <h3><?= $name ?></h3>
      <?php endif; ?>



      <?php if ($post_type == 'post'): ?>

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

        <?php if ($category_query->have_posts()) : ?>
          <div class="post-query" id="post-list">
            <?php while ($category_query->have_posts()) : $category_query->the_post(); ?>
              <div class="single-post-item">
                <a href="<?php echo get_permalink(); ?>">
                  <div>
                    <?php the_post_thumbnail(); ?>
                    <h4><?php echo get_the_title(); ?></h4>
                  </div>
                  <div class="post-wrapper">
                    <p class="post-date"><?php echo get_the_date('j F Y'); ?></p>
                    <p class="post-text"><?php echo get_the_excerpt(); ?></p>
                    <span>Read now</span>
                  </div>
                </a>
              </div>
            <?php endwhile; ?>
          </div>

          <?php wp_reset_postdata(); ?>

        <?php else: ?>
          <p class="post-title">There are currently no posts</p>
        <?php endif; ?>

        <?php if ($category_query->max_num_pages > 1) : ?>
          <div id="load-more-posts" class="wp-block-button is-style-outline-custom-button" data-post-type="<?php echo $post_type ?>" data-page="1" data-totalpages="<?php echo $category_query->max_num_pages; ?>">
            <a class="wp-block-button__link wp-element-button">Load more</a>
          </div>
        <?php endif; ?>
      <?php endif; ?>


    </div>
  </div>
</section>