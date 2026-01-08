<?php
if ( ! defined( 'ABSPATH' ) ) exit;
get_header();
?>
<main id="main_content" class="l-mainContent l-article">
    <div class="l-mainContent__inner">
        <h1 class="c-ttl404"><?=esc_html__( 'ページが見つかりませんでした。', 'swell' )?></h1>
        <div class="post_content">
            <p class="u-ta-c">
                <?=esc_html__( 'お探しのページは移動または削除された可能性があります。', 'swell' )?>
            </p>
            <div class="is-style-more_btn">
                <a href="<?=esc_url( home_url( '/' ) )?>"><?=esc_html__( 'TOPページへ', 'swell' )?></a>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>
