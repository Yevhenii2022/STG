<?php

function people_custom_post()
{
  register_taxonomy('people-type', ['people'], [
    'labels' => [
      'name' => 'Категорії',
      'singular_name' => 'Категорія',
      'search_items' => 'Шукати категорії',
      'all_items' => 'Усі категорії',
      'view_item' => 'Переглянути категорію',
      'parent_item' => 'Батьківська категорія',
      'parent_item_colon' => 'Батьківська категорія:',
      'edit_item' => 'Редагувати категорію',
      'update_item' => 'Оновити категорію',
      'add_new_item' => 'Додати нову категорію',
      'new_item_name' => 'Назва нової категорії',
      'menu_name' => 'Категорії',
      'back_to_items' => '← Назад до категорій',
    ],
    'public' => true,
    'hierarchical' => true,
    'rewrite' => [
      'slug' => 'people-category',
      'with_front' => true,
      'hierarchical' => false,
    ],
    'show_admin_column' => true,
    'show_in_rest' => true,
  ]);

  $labels = array(
    'name' => esc_html__('Люди', 'stg'),
    'singular_name' => esc_html__('Людина', 'stg'),
    'add_new' => esc_html__('Додати нову людину', 'stg'),
    'add_new_item' => esc_html__('Додати нову людину', 'stg'),
    'edit_item' => esc_html__('Редагувати людину', 'stg'),
    'new_item' => esc_html__('Нова людина', 'stg'),
    'all_items' => esc_html__('Усі люди', 'stg'),
    'view_item' => esc_html__('Переглянути людину', 'stg'),
    'search_items' => esc_html__('Шукати людей', 'stg'),
    'not_found' => esc_html__('Людей не знайдено', 'stg'),
    'featured_image' => esc_html__('Фото', 'stg'),
    'set_featured_image' => esc_html__('Встановити фото', 'stg')
  );

  $args = array(
    'labels' => $labels,
    'description' => 'Люди',
    'public' => true,
    'menu_position' => 20,
    'show_in_rest' => true,
    'supports' => array('title', 'thumbnail', 'excerpt'),
    'has_archive' => false,
    'show_in_admin_bar' => true,
    'show_in_nav_menus' => true,
    'rewrite' => array('slug' => 'people'),
    'menu_icon' => 'dashicons-groups',
    'query_var' => true,
    'taxonomies' => array('people-type')
  );

  register_post_type('people', $args);
}

add_action('init', 'people_custom_post');
