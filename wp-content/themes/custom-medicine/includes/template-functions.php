<?php

/**
 * Speakers
 */
$labels = array(
    'name' => _x('Speakers', 'post type general name', 'custom_medicine'),
    'singular_name' => _x('Speakers', 'post type singular name', 'custom_medicine'),
    'menu_name' => _x('Speakers', 'admin menu', 'custom_medicine'),
    'name_admin_bar' => _x('Speakers', 'add new on admin bar', 'custom_medicine'),
    'add_new' => _x('Add Speaker', '', 'custom_medicine'),
    'add_new_item' => __('Add new Speaker', 'custom_medicine'),
    'new_item' => __('New Speaker', 'custom_medicine'),
    'edit_item' => __('Edit Speaker', 'custom_medicine'),
    'view_item' => __('View Speaker', 'custom_medicine'),
    'all_items' => __('All Speakers', 'custom_medicine'),
    'search_items' => __('Search Speakers', 'custom_medicine'),
    'parent_item_colon' => __('Parent Speakers', 'custom_medicine'),
    'not_found' => __('No data', 'custom_medicine'),
    'not_found_in_trash' => __('No Speakers found in Trash.', 'custom_medicine'),
);
$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 13,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-admin-users',
    'query_var' => true,
    'rewrite' => array('slug' => ''),
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'supports' => array('title', 'editor', 'thumbnail'),
);
register_post_type('speakers', $args);

/**
 * Sessions
 */
$labels = array(
    'name' => _x('Sessions', 'post type general name', 'custom_medicine'),
    'singular_name' => _x('Sessions', 'post type singular name', 'custom_medicine'),
    'menu_name' => _x('Sessions', 'admin menu', 'custom_medicine'),
    'name_admin_bar' => _x('Sessions', 'add new on admin bar', 'custom_medicine'),
    'add_new' => _x('Add Session', '', 'custom_medicine'),
    'add_new_item' => __('Add new Session', 'custom_medicine'),
    'new_item' => __('New Session', 'custom_medicine'),
    'edit_item' => __('Edit Session', 'custom_medicine'),
    'view_item' => __('View Session', 'custom_medicine'),
    'all_items' => __('All Sessions', 'custom_medicine'),
    'search_items' => __('Search Sessions', 'custom_medicine'),
    'parent_item_colon' => __('Parent Sessions', 'custom_medicine'),
    'not_found' => __('No data', 'custom_medicine'),
    'not_found_in_trash' => __('No Sessions found in Trash.', 'custom_medicine'),
);
$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 13,
    'show_in_rest' => true,
    'menu_icon' => 'dashicons-admin-users',
    'query_var' => true,
    'rewrite' => array('slug' => ''),
    'capability_type' => 'post',
    'has_archive' => false,
    'hierarchical' => false,
    'supports' => array('title'),
);
register_post_type('sessions', $args);


//Positions taxonomy 
$labels = array(
    'name'              => _x('Positions', 'taxonomy general name',  'custom_medicine'),
    'singular_name'     => _x('Positions', 'taxonomy singular name',  'custom_medicine'),
    'search_items'      => __('Search Positions',  'custom_medicine'),
    'all_items'         => __('All Positions',  'custom_medicine'),
    'parent_item'       => __('Parent Positions',  'custom_medicine'),
    'parent_item_colon' => __('Parent Positions:',  'custom_medicine'),
    'edit_item'         => __('Edit  Positions',  'custom_medicine'),
    'update_item'       => __('Update Positions',  'custom_medicine'),
    'add_new_item'      => __('Add New Position',  'custom_medicine'),
    'new_item_name'     => __('New Position Name',  'custom_medicine'),
    'menu_name'         => __('Positions',  'custom_medicine'),
);
$args = array(
    'labels' => $labels,
    'description' => __('',  'custom_medicine'),
    'hierarchical' => true,
    'public' => true,
    'publicly_queryable' => true,
    'rewrite'          => array('slug' => 'positions'),
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_rest' => true,
    'show_tagcloud' => true,
    'query_var'    => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
);
register_taxonomy('positions', array('speakers'), $args);

//Countries taxonomy 
$labels = array(
    'name'              => _x('Countries', 'category general name',  'custom_medicine'),
    'singular_name'     => _x('Countries', 'category singular name',  'custom_medicine'),
    'search_items'      => __('Search Countries',  'custom_medicine'),
    'all_items'         => __('All Countries',  'custom_medicine'),
    'parent_item'       => __('Parent Countries',  'custom_medicine'),
    'parent_item_colon' => __('Parent Countries:',  'custom_medicine'),
    'edit_item'         => __('Edit Countries',  'custom_medicine'),
    'update_item'       => __('Update Countries',  'custom_medicine'),
    'add_new_item'      => __('Add New Country',  'custom_medicine'),
    'new_item_name'     => __('New Country Name',  'custom_medicine'),
    'menu_name'         => __('Countries',  'custom_medicine'),
);
$args = array(
    'labels' => $labels,
    'description' => __('',  'custom_medicine'),
    'hierarchical' => true,
    'public' => true,
    'publicly_queryable' => true,
    'rewrite'          => array('slug' => 'countries'),
    'show_ui' => true,
    'show_in_menu' => true,
    'show_in_nav_menus' => true,
    'show_in_rest' => true,
    'show_tagcloud' => true,
    'query_var'    => true,
    'show_in_quick_edit' => true,
    'show_admin_column' => true,
);
register_taxonomy('countries', array('speakers'), $args);


function filter_speakers()
{
    $positionsIds = $_POST['positionsIds'];
    $countriesIds = $_POST['countriesIds'];

    $args = [
        'post_type' => 'speakers',
        'posts_per_page' => -1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'countries',
                'field'    => 'term_id',
                'terms'    => $countriesIds,

            ),
            array(
                'taxonomy' => 'positions',
                'field'    => 'term_id',
                'terms'    => $positionsIds,


            ),
        ),
        'post_status'  => 'publish',
        'orderby'        => 'date',
        'order'          => 'desc',
    ];


    query_posts($args);
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'speaker');
        endwhile;
    else : ?>

        <p><?php _e('Sorry, no speakers matched your criteria.'); ?></p>

<?php endif;

    wp_reset_postdata();
    die;
}
add_action('wp_ajax_filter_speakers', 'filter_speakers');
add_action('wp_ajax_nopriv_filter_speakers', 'filter_speakers');



function get_ids_posttype($posttype)
{
    $ids = [];

    $args = array(
        'posts_per_page' => -1,
        'post_type'      => $posttype,
        'fields'         => 'ids',
    );
    $posts = new WP_Query($args);
    foreach ($posts->posts as $post) : setup_postdata($post);
        $ids[] = $post;
        wp_reset_postdata();
    endforeach;

    return $ids;
}

function speakers_loadmore()
{
    $args = unserialize(stripslashes($_POST['query']));
    $args['paged']          = $_POST['page'] + 1; // next page
    $args['posts_per_page'] = 10;
    $args['post_type']      = 'speakers';
    $args['post__in']       =  get_ids_posttype('speakers');

    query_posts($args);
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'speaker');
        endwhile;
    endif;
    wp_reset_postdata();
    die;
}
add_action('wp_ajax_speakers_loadmore', 'speakers_loadmore');
add_action('wp_ajax_nopriv_speakers_loadmore', 'speakers_loadmore');

