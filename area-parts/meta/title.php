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
        <title>YouTube運用代行の対応エリア一覧｜株式会社BIRDY</title>
        <meta name="description" content="企業専門のYouTube運用代行・動画制作・コンサルティング会社BIRDYの対応エリア一覧。 戦略設計から法人チャンネル立ち上げ、撮影・編集、内製化支援まで一気通貫で対応できる日本でも数少ないパートナーとして、累計120社以上のYoutube支援・10,000本以上の動画を企画・制作">
    <?php elseif ($depth === 4): ?>
       	<title><?php echo get_main_title(); ?>のYouTube運用代行・コンサルティングならBIRDY（バーディ）</title>
       	<meta name="description" content="企業専門のYouTube運用代行・動画制作・コンサルティング会社BIRDYの関東の対応エリア一覧。 戦略設計から法人チャンネル立ち上げ、撮影・編集、内製化支援まで一気通貫で対応できる日本でも数少ないパートナーとして、累計120社以上のYoutube支援・10,000本以上の動画を企画・制作">
    <?php elseif ($depth === 5): ?>
       	<title><?php echo get_main_title(); ?>のYouTube運用代行・コンサルティングならBIRDY（バーディ）</title>
       	<meta name="description" content="<?php echo get_main_title(); ?>のYouTube運用代行・コンサルティングは累計120社以上のYoutube支援・10,000本以上の動画を企画・制作のBIRDY（バーディ）におまかせ。支援実績、多くの企業がYouTube運用でつまづく理由、BIRDYが選ばれる理由、お客様の声、よくある質問など">
    <?php elseif ($depth === 6): ?>
       	<title><?php echo get_main_title(); ?>のYouTube運用代行・コンサルティングならBIRDY（バーディ）</title>
       	<meta name="description" content="<?php echo get_main_title(); ?>のYouTube運用代行・コンサルティングは累計120社以上のYoutube支援・10,000本以上の動画を企画・制作のBIRDY（バーディ）におまかせ。支援実績、多くの企業がYouTube運用でつまづく理由、BIRDYが選ばれる理由、お客様の声、よくある質問など">
    <?php else: ?>
        <p>該当するテンプレートがありません。</p>
    <?php endif; ?>
<?php endif; ?>