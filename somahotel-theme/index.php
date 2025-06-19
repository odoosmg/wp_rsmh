<?php get_header(); ?>
<main id="site-content" class="site-content w-full md:p-10">    
    <div class="blog">
        <div class="flex vertical-center items-center justify-between mb-6">
            <div>
                <h1 class="text-2xl font-medium">Room 101</h1>
                <h1 class="@md:text-xl font-normal mb-4 text[1rem]">Good morning, How can we help?</h1>
            </div>
            <div class="ml-auto">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="text-sm text-[#21414b] font-sm flex items-center no-underline">
                    <h1 class="text-lg font-medium">Call For Assistance</h1>
                </a>
            </div>
        </div>
    </div>

    <div class="block lg:flex">
        <?php 

            // Get menu items by menu name (e.g., 'primary-menu')
            $menu_name = 'Main Menu';
            $menu_items = wp_get_nav_menu_items($menu_name);

            if ($menu_items) { ?>
                <div class="w-full lg:max-w-4/5">
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-8 mb-6">
                        <?php foreach ($menu_items as $item) {
                            $menu_image 	= get_post_meta( $item->ID,  '_menu_list_image', true );
                            $menu_image_id 	= get_post_meta( $item->ID,  '_menu_list_image_id', true );
                            $menu_image_url = wp_get_attachment_image_url($menu_image_id, 'full');
                            if ($menu_image_url) { ?>
                                <div class="flex flex-col items-start">
                                    <div class="bg-white @md:p-3 rounded-2xl shadow w-25 h-25 flex flex-col items-center hover:shadow-md transition">
                                        <a href="<?php echo esc_url($item->url); ?>" class="flex items-center justify-center w-full h-full p-5" title="<?php echo esc_html($item->title); ?>">           
                                            <img src="<?php echo esc_url($menu_image_url); ?>" alt="<?php echo esc_attr($item->title); ?>" class="object-contain w-10 h-10 w-full" />
                                        </a>
                                    </div>
                                    <header class="entry-header text-sm text-center py-2">
                                        <h2 class="entry-title @md:text-[13px] text-gray-800 text-[14px] truncate">
                                            <?php echo esc_html($item->title); ?>
                                        </h2>
                                    </header><!-- .entry-header -->
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            <?php
            } else {
                echo 'Menu not found.';
            }
        ?>
        <div class="w-full lg:ml-4 lg:max-w-1/3">
            <div class="flex flex-col w-full">
                <div class="block">
                    <div class="text-md font-medium text-gray-600 mb-2">Weather Today</div>
                    <div class="bg-[#b39779] flex items-center justify-between text-white p-5 rounded-lg">
                        <div id="weather-info" class="w-full"></div>
                    </div>
                </div>
                <div class="block mt-6">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Tourist-Attractions-Cambodia-Must-See-Angkor-Wat-1120x732.jpg" alt="Room Service" class="w-full object-cover h-30 mb-2 rounded-lg" />
                    <a href="#" class="text-sm text-[#21414b] font-sm flex items-center mt-2 no-underline text-end w-full no-underline!">
                        <span class="lg:text-[13px] text-right no-underline">See local attraction nearby</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <h2 class="text-lg font-normal mb-4">Hotel Amenities For You</h2>

    <?php
        $menu_name = 'Hotel Amentities';
        $menu_items = wp_get_nav_menu_items($menu_name);

        if ($menu_items) { ?>
            <div class="grid grid-cols-4 gap-4">
                <?php foreach ($menu_items as $item) {
                    $menu_image 	= get_post_meta( $item->ID,  '_menu_list_image', true );
                    $menu_image_id 	= get_post_meta( $item->ID,  '_menu_list_image_id', true );
                    $menu_image_url = wp_get_attachment_image_url($menu_image_id, 'full');
                    if ($menu_image_url) { ?>
                        <div class="flex flex-col items-center">
                            <a href="<?php echo esc_url($item->url); ?>" class="flex items-center overflow-hidden justify-center w-full h-full rounded-lg" title="<?php echo esc_html($item->title); ?>">           
                                <img src="<?php echo esc_url($menu_image_url); ?>" alt="<?php echo esc_attr($item->title); ?>" class="w-full h-40 object-cover rounded-2xl" />
                            </a>
                            <header class="entry-header text-sm text-center py-2">
                                <h2 class="entry-title @md:text-[13px] text-gray-800 text-[14px] truncate">
                                    <?php echo esc_html($item->title); ?>
                                </h2>
                            </header><!-- .entry-header -->
                        </div>
                    <?php }
                } ?>
            </div>
        <?php
        } else {
            echo 'Menu not found.';
        }
    ?>

</main>
<?php get_footer(); ?>
