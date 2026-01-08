<main class="page page-<?php echo esc_attr($post->post_name);?>">
    <article>
        <div class="page-container">
            <?php
            // フルURLからクエリを除いたパスだけを取得
            $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

            // スラッシュで分割して配列に（空要素を除外）
            $path_parts = array_values(array_filter(explode('/', $request_path)));

            // 階層の深さを取得
            $depth = count($path_parts);

            // 条件例：area配下の階層構造に応じて分岐
            $is_area_page = in_array('area', $path_parts);
            $last_segment = end($path_parts);
            ?>

            <?php if ($is_area_page): ?>
                <?php if ($depth === 3): ?>
                    <?php get_template_part('area-parts/content', 'areaTop'); ?>

                <?php elseif ($depth === 4): ?>
                    <?php get_template_part('area-parts/content', 'areaRegion'); ?>

                <?php elseif ($depth === 5): ?>
                    <?php get_template_part('area-parts/content', 'areaPrefecture'); ?>

                <?php elseif ($depth === 6): ?>
                    <?php get_template_part('area-parts/content', 'areaCity'); ?>

                <?php else: ?>
                    <p>該当するテンプレートがありません。</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </article>
</main>

