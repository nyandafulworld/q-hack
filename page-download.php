<?php
/*
Template Name: 資料一覧ページ
*/
get_header();
?>

<main class="l-main">
    <div class="download-archive">
        <?php
        $parent_id = get_the_ID();
        $child_pages = get_pages(array(
            'child_of'    => $parent_id,
            'sort_column' => 'menu_order',
            'sort_order'  => 'ASC'
        ));

        if ($child_pages) : ?>
            <div class="download-grid">
                <?php foreach ($child_pages as $page) :
                    $thumb_url = get_field('download_image', $page->ID); // 画像URL
                    $cate_raw  = get_field('download_cat', $page->ID);   // 複数選択あり
                    $permalink = get_permalink($page->ID);

                    // カテゴリの出力文字列を生成
                    if (is_array($cate_raw)) {
                        $cate = implode(', ', $cate_raw);
                    } else {
                        $cate = $cate_raw;
                    }
                ?>
                    <a class="download-card" href="<?php echo esc_url($permalink); ?>">
                        <?php if ($thumb_url): ?>
                            <div class="download-thumb">
                                <img src="<?php echo esc_url($thumb_url); ?>" alt="資料のサムネイル画像">
                            </div>
                        <?php endif; ?>
                        <div class="download-meta">
                            <h3><?php echo esc_html($page->post_title); ?></h3>
                            <?php if ($cate): ?>
                                <p class="download-cat"><?php echo esc_html($cate); ?></p>
                            <?php endif; ?>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>現在、公開されている資料はありません。</p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
