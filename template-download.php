<?php
/*
Template Name: 資料ダウンロードページ
*/
get_header('nd');
?>

<main class="l-main">
    <div class="download-page fixbox">
        <div class="download-left">
        <h1><?php the_field('download_title'); ?></h1>
			<span class="download-cat"><?php the_field('download_cat'); ?></span>
			<?php if ($image_url = get_field('download_image')): ?>
				<img class="download-image" src="<?php echo esc_url($image_url); ?>" alt="資料のサムネイル画像">
			<?php endif; ?>
			<h2>概要</h2>
            <p class="download-info"><?php echo nl2br(get_field('download_intro')); ?></p>
        </div>

        <div class="download-right">
            <?php echo do_shortcode(get_field('form_shortcode')); ?>
        </div>
    </div>
</main>

<?php get_footer('nd'); ?>