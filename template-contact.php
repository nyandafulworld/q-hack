<?php
/*
Template Name: フォーム
*/
if ( ! defined( 'ABSPATH' ) ) exit;
get_header('nd');

if ( strpos($_SERVER['REQUEST_URI'], '/area') !== false ) {
    include(get_stylesheet_directory() . '/template-area.php');
    get_footer();
    exit();
}

if ( is_front_page() ) {
    SWELL_Theme::get_parts( 'tmp/front' );
    get_footer();
    exit();
}

// 投稿を一度だけ取得
if ( have_posts() ) :
    the_post();
    $the_id = get_the_ID();
    $show_pr_notation = SWELL_Theme::get_pr_notation_size( $the_id, 'show_pr_notation_page' );

    ?>
    <main id="main_content" class="l-mainContent">
        <div class="l-mainContent__inner" data-clarity-region="article">
            <?php
            // URLに対応するテンプレートを読み込む
            $request_path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

            // テスト環境用：先頭の "test/" を除外
            $request_path = preg_replace('#^test/#', '', $request_path);

            $template_path = get_stylesheet_directory() . '/page-templates/' . $request_path . '.php';


            if ( file_exists($template_path) ) {
                include $template_path;
            }

            // ↓ 共通出力
            SWELL_Theme::get_parts( 'parts/page_head' );
            ?>

            <?php if ( $show_pr_notation ) : ?>
                <?php SWELL_Theme::pluggable_parts( 'pr_notation' ); ?>
            <?php endif; ?>

            <div class="<?= esc_attr( apply_filters( 'swell_post_content_class', 'post_content' ) ) ?>">
                <?php the_content(); ?>
            </div>

            <?php
            wp_link_pages([
                'before' => '<div class="c-pagination -post">',
                'after'  => '</div>',
                'next_or_number' => 'number',
            ]);

            SWELL_Theme::outuput_content_widget( 'page', 'bottom' );

            if ( SWELL_Theme::is_show_comments( $the_id ) ) {
                comments_template();
            }
            ?>
        </div>
    </main>
<?php
endif;

get_footer('nd');