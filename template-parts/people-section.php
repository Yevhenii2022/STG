<?php
$count_of_posts = 3;
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

      <?php if ($category_query->have_posts()) : ?>

        <div class="sort-wrapper">

          <?php
          $name = get_field('people') ?? '';
          if ($name) : ?>
            <h3><?= esc_html($name) ?></h3>
          <?php endif; ?>


          <div class="select">
            <input class="select__input" type="hidden" name="" id="sort-order">
            <div class="select__head">Select category</div>
            <ul class="select__list" style="display: none;">
              <?php
              $terms = get_terms([
                'taxonomy' => 'people-type',
                'hide_empty' => true,
              ]);

              if (!empty($terms) && !is_wp_error($terms)) :
                foreach ($terms as $term) : ?>
                  <li class="select__item" data-cat="<?php echo esc_attr($term->term_id); ?>">
                    <?php echo esc_html($term->name); ?>
                  </li>
                <?php endforeach;
              else : ?>
                <li class="select__item" data-cat="0">No categories</li>
              <?php endif; ?>
            </ul>
          </div>


          <div class="search-input">
            <input type="text" id="search-input" placeholder="Search by article...">
          </div>



        </div>

        <div class="post-query" id="post-list">
          <?php while ($category_query->have_posts()) : $category_query->the_post();

            get_template_part('template-parts/people-card');

          endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>

        <?php if ($category_query->max_num_pages > 1) : ?>
          <div id="load-more-posts"
            data-post-type="people"
            data-page="1"
            data-totalpages="<?php echo esc_attr($category_query->max_num_pages); ?>">
            <a class="btn btn-outline-light px-4 py-2">Load more</a>
          </div>
        <?php endif; ?>

      <?php else : ?>
        <p class="post-title">There are currently no posts</p>
      <?php endif; ?>

    </div>
  </div>
</section>