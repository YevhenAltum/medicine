<?php
get_header();
?>
<section class="intro" style="background-image: url('<?php echo get_template_directory_uri() . '/images/intro-bg.png'; ?>')">
    <div class="intro-inner">
        <div class="container">
            <?php $intro_section = get_field('intro_section'); ?>
            <h3><?php echo $intro_section['heading_meeting']; ?></h3>
            <h1><?php echo $intro_section['intro_heading']; ?></h1>
            <p><?php echo $intro_section['intro_text']; ?></p>
            <a href="#" class="register-btn-black"><?php echo $intro_section['button_text']; ?></a>
        </div>
    </div>
</section>
<section class="image-content">
    <?php $about_section = get_field('about_section'); ?>
    <div class="container">
        <div class="image-content-inner">
            <?php if ($about_section['about_image']) { ?>
                <div class="image-content-image">
                    <img src="<?php echo $about_section['about_image']; ?>" alt="img">
                </div>
            <?php } ?>
            <div class="image-content-text">
                <h2><?php echo $about_section['about_heading']; ?></h2>
                <p><?php echo $about_section['about_text']; ?></p>
                <a class="learn-more-btn" href="#">
                    <img src="<?php echo get_template_directory_uri() . '/images/learn-more-btn.png'; ?>" alt="btn">
                    <span><?php echo $about_section['about_button_text']; ?></span></a>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
