<section class="area-local">
    <h2 class="ttl01"><?php get_template_part('area-parts/youtube-arealp-base/pagetitle'); ?>内全域でYouTube支援に対応しております</h2>
    <div class="area-local-container">
        <div class="fixbox area-local-container-inner">
            <p><strong>戦略×泥臭さでお客様の成果にコミットします。</strong></p>
            <p class="text02">泥臭く、現地に足を運び続けるのが私たちの支援スタイルです！<?php get_template_part('area-parts/youtube-arealp-base/pagetitle'); ?>のYouTube運用代行・コンサルティングはBIRDYにお任せください！</p>
            <div class="name">代表取締役 鳥屋直弘</div>   
        </div>
    </div>
        <section class="area-local-city">
        <?php
        // 現在のページの相対パスを取得
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // クエリ除外
        $relative_path = ltrim($path, '/'); // 先頭スラッシュ除去（get_page_by_path用）

        $current_pref_page = get_page_by_path($relative_path);

        if (!$current_pref_page) return;

        $current_pref_id = $current_pref_page->ID;
        $pref_title = esc_html($current_pref_page->post_title);

        // 市区町村ページ（子ページ）を取得
        $city_pages = get_pages([
            'child_of'    => $current_pref_id,
            'parent'      => $current_pref_id,
            'sort_column' => 'menu_order',
        ]);

        echo '<h3>' . $pref_title . 'の対応市区町村</h3>';

        if (!empty($city_pages)) {
            echo '<ul class="city-list fixbox">';
            foreach ($city_pages as $city) {
                $city_title = esc_html($city->post_title);
                $city_link  = esc_url(get_permalink($city->ID));
                echo '<li><a href="' . $city_link . '">' . $city_title . '</a></li>';
            }
            echo '</ul>';
        } else {
            echo '';
        }
        ?>
        <div class="fixbox"><p class="txt">ここに書いていないエリアも<?php get_template_part('area-parts/youtube-arealp-base/pagetitle'); ?>ならどこでも対応可能です！</p>
        <?php get_template_part('area-parts/youtube-arealp-base/cta'); ?></div>
        </section>
</section>