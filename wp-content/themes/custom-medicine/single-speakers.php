<?php
get_header();
?>
<main id="speaker-single" class="site-main">
    <section class="speakers">
        <div class="container">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', get_post_type());
            endwhile;
            ?>
        </div>
    </section>
      <?php
      include  get_template_directory() . '/templates/faq.inc.php';
      ?>      
</main>
<?php
get_footer();
