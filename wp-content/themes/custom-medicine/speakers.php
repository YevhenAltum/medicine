<?php
/**
 * Template Name: Speakers archive page
 */ 
get_header();
?>
<section class="speakers">
    <div class="container">

        <h1>Keynote <span>Speakers</span></h1>

        <div class="speakers-inner">
            <div class="sidebar">
                <h3><?php _e('Positions', 'custom_medicine') ?></h3>
                <?php
                $countries_list = [];
                $positions_list = [];
                $positions = get_terms('positions', array(
                    'parent'     => 0,
                    'hide_empty' => true,
                ));
                ?>
                <ul class="positions-list">

                    <?php
                    foreach ($positions as $position) {
                        $positions_list[] = $position->term_id;
                    ?>
                        <li><label for="<?php echo $position->slug; ?>">
                                <span><?php echo $position->name; ?></span>
                                <input id="<?php echo $position->slug; ?>" type="checkbox" class="checkbox-positions" name="<?php echo $position->slug; ?>" value="<?php echo $position->term_id; ?>">
                            </label>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <h3><?php _e('Countries', 'custom_medicine') ?></h3>
                <?php


                $countries = get_terms('countries', array(
                    'parent'     => 0,
                    'hide_empty' => true,
                ));
                ?>
                <ul class="countries-list">

                    <?php
                    foreach ($countries as $country) {
                        $countries_list[] = $country->term_id;
                    ?>

                        <li><label for="<?php echo $country->slug; ?>">
                                <span><?php echo $country->name; ?></span>
                                <input id="<?php echo $country->slug; ?>" type="checkbox" class="checkbox-countries" name="<?php echo $country->slug; ?>" value="<?php echo $country->term_id; ?>">
                            </label>
                        </li>
                    <?php
                    }
                    ?>
                </ul>

                <?php

                $countries_list = implode(',', $countries_list);
                $positions_list = implode(',', $positions_list);

                ?>
                <button class="filter-btn register-btn-black" data-countries="<?php echo $countries_list; ?>" data-positions="<?php echo $positions_list; ?>"><?php _e('Filter', 'custom_medicine'); ?></button>
                <a href="<?php echo get_post_type_archive_link('speakers'); ?>" class="register-btn clear-button"><?php _e('Clear', 'custom_medicine'); ?></a>
            </div>

            <div class="speakers-row">

                <?php
                $args = array(
                    'post_type' => 'speakers',
                    'posts_per_page' => 10,
                    'order_by' => 'date',
                    'order' => 'desc',

                );
                $speakers = new WP_Query($args); ?>

                <?php if ($speakers->have_posts()) : ?>

                    <?php while ($speakers->have_posts()) : $speakers->the_post();
                        get_template_part('template-parts/content', 'speaker');

                    endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php _e('Sorry, no speakers matched your criteria.'); ?></p>
                <?php endif; ?>

                <?php if ($speakers->max_num_pages > 1) { ?>
                    <script>
                        var this_page = 1;
                    </script>
                    <a class="load-more" data-param-posts="<?php echo serialize($speakers->query_vars); ?>" data-max-pages="<?php echo $speakers->max_num_pages; ?>">
                        <?php echo _e('View More', 'custom_medicine'); ?>
                    </a>
                <?php } ?>
            </div>

        </div>


    </div>
</section>
<?php
include  get_template_directory() . '/templates/faq.inc.php';
?>
<?php
get_footer();
