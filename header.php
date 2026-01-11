<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php SWELL_Theme::root_attrs(); ?>>
<head>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, viewport-fit=cover">
<!-- Google Fonts (Montserrat, Noto Sans JP) -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans+JP:wght@400;500;600;700&family=Noto+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<?php
	wp_head();
	$SETTING = SWELL_Theme::get_setting(); // SETTING取得
?>
</head>
<body <?php body_class(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>
<?php
    // --- /area配下かどうかを判定 ---
    $request_path = parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH );
    $is_area_page = ( strpos( $request_path, '/area' ) !== false );

    // デフォルトの body_wrap クラスを生成
    $body_wrap_class = implode( ' ', get_body_class() );

    // area配下なら追加
    if ( $is_area_page ) {
        $body_wrap_class .= ' area-page';
    }
?>
<div id="body_wrap" class="<?php echo esc_attr( $body_wrap_class ); ?>" <?php SWELL_Theme::body_attrs(); ?>>

<!-- Q HACK JAPAN カスタムヘッダー -->
<header class="qhack-header">
    <div class="qhack-header__top">
        <div class="qhack-header__top-inner">
            <div class="qhack-header__logo-area">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="qhack-header__logo">
                    <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/01/logo-header.png' ) ); ?>" alt="Q HACK JAPAN">
                </a>
                <p class="qhack-header__desc">Qoo10特化の<br>運用代行・コンサルティングサービス</p>
            </div>
            <div class="qhack-header__cta">
                <a href="<?php echo esc_url( home_url( '/document/' ) ); ?>" class="qhack-cta-btn qhack-cta-btn--document">
                    <span class="qhack-cta-btn__sub">Qoo10攻略のコツ！</span>
                    <span class="qhack-cta-btn__main">サービス資料請求 <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/01/vector-1.png' ) ); ?>" alt="" class="qhack-cta-btn__arrow"></span>
                </a>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="qhack-cta-btn qhack-cta-btn--contact">
                    <span class="qhack-cta-btn__sub">強引な営業一切ナシ！</span>
                    <span class="qhack-cta-btn__main">店舗分析・無料相談 <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/01/vector-2.png' ) ); ?>" alt="" class="qhack-cta-btn__arrow"></span>
                </a>
            </div>
            <button class="qhack-header__hamburger" aria-label="メニューを開く">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
    <nav class="qhack-header__nav">
        <div class="qhack-header__nav-inner">
            <?php
            if ( has_nav_menu( 'qhack_header_nav' ) ) {
                wp_nav_menu([
                    'theme_location' => 'qhack_header_nav',
                    'container' => false,
                    'menu_class' => 'qhack-header__menu',
                    'fallback_cb' => false,
                ]);
            } else {
                // メニューが設定されていない場合のデフォルト表示
                ?>
                <ul class="qhack-header__menu">
                    <li><a href="<?php echo esc_url( home_url( '/reason/' ) ); ?>">選ばれる理由</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/service/' ) ); ?>">サービス</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/voice/' ) ); ?>">お客様の声</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/case/' ) ); ?>">成功事例</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/faq/' ) ); ?>">よくある質問</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社概要</a></li>
                    <li><a href="<?php echo esc_url( home_url( '/column/' ) ); ?>">Qoo10攻略コラム</a></li>
                </ul>
                <?php
            }
            ?>
        </div>
    </nav>
</header>
<!-- /Q HACK JAPAN カスタムヘッダー -->

<?php
	// SPメニュー（モバイル用にSWELLのメニューも残す）
	$cache_key = $SETTING['cache_spmenu'] ? 'spmenu' : '';
	SWELL_Theme::get_parts( 'parts/header/sp_menu', null, $cache_key );

	// Barba用 wrapper
	if ( SWELL_Theme::is_use( 'pjax' ) ) {
		echo '<div data-barba="container" data-barba-namespace="home">';
	}

	// タイトル(コンテンツ上) - 下層ページ用
	if ( !is_front_page() && SWELL_Theme::is_show_ttltop() ) {
		SWELL_Theme::get_parts( 'parts/top_title_area' );
	}

	// ぱんくず - 下層ページ用
	if ( !is_front_page() && 'top' === $SETTING['pos_breadcrumb'] ) {
		SWELL_Theme::get_parts( 'parts/breadcrumb' );
	}

?>
<?php
    $content_class = 'l-content';
    if ( !is_front_page() && !is_page() ) {
        $content_class .= ' l-container';
    }
?>
<div id="content" class="<?php echo esc_attr($content_class); ?>" <?php SWELL_Theme::content_attrs(); ?>>
<?php
	// ピックアップバナー
	if ( SWELL_Theme::is_show_pickup_banner() ) {
		$cache_key = $SETTING['cache_top'] ? 'pickup_banner' : '';
		SWELL_Theme::get_parts( 'parts/top/pickup_banner', null, $cache_key );
	}
