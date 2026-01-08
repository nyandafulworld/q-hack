<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php SWELL_Theme::root_attrs(); ?>>
<head>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class('is-download'); ?> <?php SWELL_Theme::body_attrs(); ?>>
<?php if ( function_exists( 'wp_body_open' ) ) wp_body_open(); ?>
<div id="body_wrap">
<?php
    // Barba wrapper（使っていれば維持）
    if ( SWELL_Theme::is_use( 'pjax' ) ) {
        echo '<div data-barba="container" data-barba-namespace="download">';
    }
?>
<header id="header" class="header-nd l-header -parallel -parallel-bottom header standby fixed js-header" data-spfix="1">
	<div class="l-header__bar pc_">
	<div class="l-header__barInner l-container">
		<div class="c-catchphrase">企業チャンネル専門のYouTubeコンサルティング・マーケティング会社</div>	</div>
</div>
	<div class="l-header__inner l-container">
		<div class="l-header__logo">
			<div class="c-headLogo -img"><a href="https://birdy-official.co.jp/" title="株式会社BIRDY" class="c-headLogo__link" rel="home"><img width="800" height="188" src="https://birdy-official.co.jp/wp-content/uploads/2025/07/logo-birdy.png" alt="株式会社BIRDY" class="c-headLogo__img" srcset="https://birdy-official.co.jp/wp-content/uploads/2025/07/logo-birdy.png 800w, https://birdy-official.co.jp/wp-content/uploads/2025/07/logo-birdy-300x71.png 300w, https://birdy-official.co.jp/wp-content/uploads/2025/07/logo-birdy-768x180.png 768w" sizes="(max-width: 959px) 50vw, 800px" decoding="async" loading="eager"></a></div>
		</div>
	</div>
	</header>
<div id="content" class="l-content">
