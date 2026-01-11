<?php

/* 子テーマのfunctions.phpは、親テーマのfunctions.phpより先に読み込まれることに注意してください。 */


/**
 * 親テーマのfunctions.phpのあとで読み込みたいコードはこの中に。
 */
add_action('after_setup_theme', function(){
    // Q HACK JAPAN用カスタムメニュー登録
    register_nav_menus([
        'qhack_header_nav' => 'Q HACK ヘッダーナビ',
        'qhack_footer_nav' => 'Q HACK フッターナビ',
    ]);
}, 11);


/**
 * 子テーマでのファイルの読み込み
 */
add_action('wp_enqueue_scripts', function () {

    // ※ Google Fonts は header.php で直接読み込み済み

    // 子テーマの style.css を読み込み
    $timestamp = date('Ymdgis', filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('child_style', get_stylesheet_directory_uri() . '/style.css', [], $timestamp);

    // ✅ 共通CSS（commonフォルダ）
    $common_css_files = [
        'common-reset'  => 'reset.css',
        'common-main'   => 'styles.css',
        'common-pc'     => 'pc.css',
        'common-tablet' => 'tablet.css',
        'common-smart'  => 'smart.css',
    ];
    foreach ($common_css_files as $handle => $filename) {
        $path = '/assets/css/common/' . $filename;
        $full_path = get_stylesheet_directory() . $path;
        if (file_exists($full_path)) {
            $version = date('Ymdgis', filemtime($full_path));
            wp_enqueue_style($handle, get_stylesheet_directory_uri() . $path, [], $version);
        }
    }

    // ✅ ページ種別ごとのCSS
    if (is_front_page() || is_page()) {
        $folder = 'page';
    } elseif (is_single() || is_archive()) {
        $folder = 'article';
    } else {
        $folder = '';
    }

    if ($folder) {
        $css_files = [
            "{$folder}-main"   => 'styles.css',
            "{$folder}-pc"     => 'pc.css',
            "{$folder}-tablet" => 'tablet.css',
            "{$folder}-smart"  => 'smart.css',
        ];
        foreach ($css_files as $handle => $filename) {
            $path = "/assets/css/{$folder}/" . $filename;
            $full_path = get_stylesheet_directory() . $path;
            if (file_exists($full_path)) {
                $version = date('Ymdgis', filemtime($full_path));
                wp_enqueue_style($handle, get_stylesheet_directory_uri() . $path, [], $version);
            }
        }
    }

    // 共通JavaScript（common.js）
    $js_path = '/assets/js/common.js';
    $js_full_path = get_stylesheet_directory() . $js_path;
    if (file_exists($js_full_path)) {
        $js_version = date('Ymdgis', filemtime($js_full_path));
        wp_enqueue_script('common_js', get_stylesheet_directory_uri() . $js_path, ['jquery'], $js_version, true);
    }

}, 11);


// 投稿ページのボディータグにカテゴリーのクラス名を付ける
function add_cat($class) {
  global $post;
  if ( is_single() ) {
    foreach((get_the_category($post->ID)) as $category)
      $class[] = 'category-'.$category->cat_ID;
  }
  return $class;
}
add_filter('body_class', 'add_cat');


// Contact Form 7 の自動整形を無効化
add_filter('wpcf7_autop_or_not', '__return_false');

// -------------------------------------
// メインタイトル（ページタイトル）取得関数
// -------------------------------------
if ( ! function_exists( 'get_main_title' ) ) {
    function get_main_title() {
        if ( is_singular( 'post' ) ) {
            $category_obj = get_the_category();
            return $category_obj[0]->name ?? '';
        } elseif ( is_page() ) {
            return get_the_title();
        } elseif ( is_category() ) {
            return single_cat_title( '', false );
        } elseif ( is_home() ) {
            return 'ブログ';
        } elseif ( is_archive() ) {
            return post_type_archive_title( '', false );
        } elseif ( is_search() ) {
            return '検索結果：「' . get_search_query() . '」';
        } elseif ( is_404() ) {
            return 'ページが見つかりません';
        }
        return '';
    }
}


// ===== 共通: area 判定 & 文言 =====
function birdy_area_ctx(){
    $path  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $parts = array_values(array_filter(explode('/', $path)));
    return ['is_area'=>in_array('area', $parts, true), 'depth'=>count($parts), 'parts'=>$parts];
}
function birdy_main_title(){
    if (function_exists('get_main_title')) return get_main_title();
    return trim(wp_strip_all_tags(get_the_title()));
}
function birdy_area_title_text(){
    $ctx = birdy_area_ctx();
    if (!$ctx['is_area']) return null;

    $depth = $ctx['depth'];
    $main  = birdy_main_title();
    $parent_id = wp_get_post_parent_id(get_the_ID());
    $parent_title = $parent_id ? get_post_field('post_title', $parent_id) : '';

    switch ($depth){
        case 3: return 'YouTube運用代行の対応エリア一覧｜株式会社BIRDY';
        case 4:
        case 5: return "{$main}のYouTube運用代行・コンサルティングならBIRDY（バーディ）";
        case 6: return "{$main}のYouTube運用代行・コンサルティングならBIRDY（バーディ）";
        default: return null;
    }
}
function birdy_area_description_text(){
    $ctx = birdy_area_ctx();
    if (!$ctx['is_area']) return null;

    $depth = $ctx['depth'];
    $main  = birdy_main_title();

    switch ($depth){
        case 3:
            return '企業専門のYouTube運用代行・動画制作・コンサルティング会社BIRDYの対応エリア一覧。 戦略設計から法人チャンネル立ち上げ、撮影・編集、内製化支援まで一気通貫で対応できる日本でも数少ないパートナーとして、累計120社以上のYoutube支援・10,000本以上の動画を企画・制作';
        case 4:
            return '企業専門のYouTube運用代行・動画制作・コンサルティング会社BIRDYの関東の対応エリア一覧。 戦略設計から法人チャンネル立ち上げ、撮影・編集、内製化支援まで一気通貫で対応できる日本でも数少ないパートナーとして、累計120社以上のYoutube支援・10,000本以上の動画を企画・制作';
        case 5:
        case 6:
            return "{$main}のYouTube運用代行・コンサルティングは累計120社以上のYoutube支援・10,000本以上の動画を企画・制作のBIRDY（バーディ）におまかせ。支援実績、多くの企業がYouTube運用でつまづく理由、BIRDYが選ばれる理由、お客様の声、よくある質問など";
        default: return null;
    }
}

// ===== SEO SIMPLE PACKの“公式フック”で最終値を上書き（9999）=====
add_filter('ssp_output_title', function($title){
    $forced = birdy_area_title_text();
    return $forced ?: $title;
}, 9999);

add_filter('ssp_output_description', function($desc){
    $forced = birdy_area_description_text();
    return $forced ?: $desc;
}, 9999);

// OGPも同期（SNSプレビュー統一）
add_filter('ssp_output_og_title', function($t){
    $forced = birdy_area_title_text();
    return $forced ?: $t;
}, 9999);
add_filter('ssp_output_og_description', function($d){
    $forced = birdy_area_description_text();
    return $forced ?: $d;
}, 9999);




