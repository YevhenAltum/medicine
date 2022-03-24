<div class="speaker-inner">
    <a class="go-back" href="<?php echo get_post_type_archive_link('speakers'); ?>">
        <img src="<?php echo get_template_directory_uri() . '/images/left-arrow.png'; ?>" alt="btn">
        <span><?php _e('All speakers', 'custom_medicine') ?></span>
    </a>
    <div class="speaker-content">
        <div class="speaker-info">
            <h2><?php the_title(); ?></h2>
            <p><?php the_content(); ?></p>
        </div>
        <div class="speaker-image">

            <?php
            $no_avatar = '<img width="180" height="180" src="' . get_template_directory_uri() . "/images/no-avatar.png" . '" class="attachment-medium_large size-medium_large wp-post-image" alt="" loading="lazy">';
            echo get_the_post_thumbnail(get_the_ID(), 'medium_large') ? get_the_post_thumbnail(get_the_ID(), 'medium_large') : $no_avatar;
            ?>
        </div>
    </div>
    <div class="sessions">
        <h2>Sessions</h2>
        <ul class="sessions-inner">
            <?php

            $sessions = get_field('sessions');

            foreach ($sessions as $session) {
            ?>
                <li><a href="<?php echo $session->post_name; ?>"><?php echo $session->post_title; ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>