<a href="<?php echo get_permalink(get_the_ID()); ?>" class="speakers-col">
    <?php
    $taxId = get_the_terms(get_the_ID(), 'countries')[0]->term_id ? get_the_terms(get_the_ID(), 'countries')[0]->term_id : '';
    if ($taxId) {
        $country = get_field('flag', 'countries_' . $taxId)['url'];
    ?>
        <img class="country" src="<?php echo $country; ?>" alt="country">
    <?php  } ?>

    <div class="speakers-col-img">
        <?php
        $no_avatar = '<img width="180" height="180" src="' . get_template_directory_uri() . "/images/no-avatar.png" . '" class="attachment-medium_large size-medium_large wp-post-image" alt="" loading="lazy">';
        echo get_the_post_thumbnail(get_the_ID(), 'medium_large') ? get_the_post_thumbnail(get_the_ID(), 'medium_large') : $no_avatar;
        ?>
    </div>
    <h4><?php echo get_the_title(get_the_ID()); ?></h4>
    <h5><?php echo get_field('city') ? get_field('city') : 'Test City' ?></h5>
</a>