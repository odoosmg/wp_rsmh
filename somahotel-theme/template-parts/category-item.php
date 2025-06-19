<?php
/**
 * Template part for displaying a category item
 * 
 * @var WP_Term $category
 */
$category = get_query_var('current_category');
$image_id = get_term_meta($category->term_id, 'category_featured_image_id', true);
$image_url = $image_id ? wp_get_attachment_url($image_id) : get_template_directory_uri() . '/assets/default-category.png';

?>
<article id="category-<?php echo esc_attr($category->term_id); ?>" class="category-item">
    <div class="bg-white @md:p-3 @lg:p-4 rounded-lg shadow flex flex-col items-center hover:shadow-md transition">
        <a href="<?php echo get_category_link($category->term_id); ?>" class="flex items-center justify-center w-full h-full p-5 border rounded-full" title="<?php echo esc_attr($category->name); ?>">           
            <img src="<?php echo z_taxonomy_image_url($category->term_id); ?>" alt="<?php echo esc_attr($category->name); ?>" class="object-contain ">
        </a>
    </div>
    <header class="entry-header text-sm text-center py-2">
        <h2 class="entry-title @md:text-[13px] text-gray-800 text-[14px] truncate">
            <?php echo esc_html($category->name); ?>
        </h2>
    </header><!-- .entry-header -->
</article>
