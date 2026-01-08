<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if ( SWELL_Theme::is_show_sidebar() ) {
	get_sidebar();
}
?>
</div>
<?php
	$SETTING = SWELL_Theme::get_setting();

	if ( SWELL_Theme::is_use( 'pjax' ) ) echo '</div>'; // End : Barba[data-barba="container"]

	// フッター前ウィジェット
	if ( is_active_sidebar( 'before_footer' ) ) :
		echo '<div id="before_footer_widget" class="w-beforeFooter">';
		if ( ! SWELL_Theme::is_use( 'ajax_footer' ) ) :
			SWELL_Theme::get_parts( 'parts/footer/before_footer' );
		endif;
		echo '</div>';
	endif;

	// ぱんくず
	if ( 'top' !== $SETTING['pos_breadcrumb'] ) :
		SWELL_Theme::get_parts( 'parts/breadcrumb' );
	endif;
?>
<!-- Q HACK JAPAN カスタムフッター -->
<footer id="qhack-footer" class="qhack-footer">
    <div class="qhack-footer__inner">
        <div class="qhack-footer__main">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="qhack-footer__logo">
                <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/01/logo-footer.png' ) ); ?>" alt="Q HACK JAPAN">
            </a>
            <nav class="qhack-footer__nav">
                <?php
                if ( has_nav_menu( 'qhack_footer_nav' ) ) {
                    wp_nav_menu([
                        'theme_location' => 'qhack_footer_nav',
                        'container' => false,
                        'menu_class' => 'qhack-footer__menu',
                        'fallback_cb' => false,
                    ]);
                } else {
                    // メニューが設定されていない場合のデフォルト表示
                    ?>
                    <ul class="qhack-footer__menu">
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
            </nav>
        </div>
        <div class="qhack-footer__bottom">
            <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>" class="qhack-footer__privacy">プライバシーポリシー</a>
            <p class="qhack-footer__copyright">&copy; <?php echo date('Y'); ?> Q HACK JAPAN Inc. All Rights Reserved.</p>
        </div>
    </div>
</footer>
<!-- /Q HACK JAPAN カスタムフッター -->
<?php
	// 固定フッターメニュー
	if ( has_nav_menu( 'fix_bottom_menu' ) ) :
		$cache_key = $SETTING['cache_bottom_menu'] ? 'fix_bottom_menu' : '';
		SWELL_Theme::get_parts( 'parts/footer/fix_menu', null, $cache_key );
	endif;

	// 固定ボタン
	SWELL_Theme::get_parts( 'parts/footer/fix_btns' );

	// モーダル
	SWELL_Theme::get_parts( 'parts/footer/modals' );
?>
</div><!--/ #all_wrapp-->
<?php
wp_footer();
echo $SETTING['foot_code']; // phpcs:ignore
?>
</body></html>
