<section class="area-local">
	<h2 class="ttl01"><?php get_template_part('area-parts/youtube-arealp-base/pagetitle'); ?>全域でYouTube支援対応中！</h2>
	<div class="area-local-container">
        <div class="fixbox area-local-container-inner">
            <p><strong>戦略×泥臭さでお客様の成果にコミットします。</strong></p>
            <p class="text02">泥臭く、現地に足を運び続けるのが私たちの支援スタイルです！<br><?php get_template_part('area-parts/youtube-arealp-base/pagetitle'); ?>のYouTube運用代行・コンサルティングはBIRDYにお任せください！</p>
            <div class="name">代表取締役 鳥屋直弘</div>   
        </div>
    </div>
    <section class="area-local-city">
<?php
function get_relative_path_from_url($url) {
    $site_url = rtrim(site_url(), '/');
    $relative_path = str_replace($site_url . '/', '', $url);
    return untrailingslashit($relative_path);
}

$current_url = untrailingslashit(get_permalink());
$relative_path = get_relative_path_from_url($current_url);

// 「area/」以降のパスだけを使う
$area_pos = strpos($relative_path, 'area/');
if ($area_pos !== false) {
    $area_specific_path = substr($relative_path, $area_pos + strlen('area/'));
} else {
    $area_specific_path = $relative_path; // 念のためフォールバック
}

// HTMLファイルのフルパスを生成
$html_relative_path = 'area-parts/area/' . $area_specific_path . '.html';
$html_full_path = get_theme_file_path($html_relative_path);
$title = get_main_title();
echo '<h3>' . $title . 'の主な対応エリア例</h3>';
// デバッグ用ログ（必要ならコメントアウト）
echo '<!-- 読み込みファイル: ' . esc_html($html_relative_path) . ' -->';
echo '<ul class="city-list fixbox">';
if (file_exists($html_full_path)) {
    include($html_full_path);
} else {
    echo '<li>準備中</li>';
}
echo '</ul>';
?>
<div class="fixbox"><p class="txt">ここに書いていないエリアも<?php get_template_part('area-parts/youtube-arealp-base/pagetitle'); ?>ならどこでも対応可能です！</p>
<?php get_template_part('area-parts/youtube-arealp-base/cta'); ?>
</div>
	</section>
</section>