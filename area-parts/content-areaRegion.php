
<div class="fixbox">
<h1 class="c-heading-1"><?php echo get_main_title(); ?>のYouTube運用代行、コンサルティングはお任せください。</h1>
<p>関東全域の企業様のYouTube支援を行っております。</p>
<?php
function get_relative_path() {
    return ltrim($_SERVER['REQUEST_URI'], '/');
}

$relative_path = get_relative_path(); // 例: solution/youtube/area/kanto
$area_parent = get_page_by_path($relative_path);

if ($area_parent) {
    $area_top_id = $area_parent->ID;

    // ✅ 直下の都道府県ページのみ取得（市区は除外）
    $prefectures = get_pages([
        'parent'      => $area_top_id,
        'sort_column' => 'menu_order',
    ]);

    echo '<div class="fixbox"><div class="area-list">';
    echo '<ul class="city-list center">'; // 任意のクラス名でスタイリング可能

    foreach ($prefectures as $pref) {
        $pref_title = esc_html($pref->post_title);
        $pref_link  = esc_url(get_permalink($pref->ID));

        echo '<li><a href="' . $pref_link . '">' . $pref_title . '</a></li>';
    }

    echo '</ul>';
    echo '</div></div>';
}
?>
</div>