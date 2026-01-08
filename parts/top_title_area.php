<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * SWELL_Theme::is_show_ttltop() が true の時のみ呼び出される。
 * タームアーカイブ / 固定ページ / 投稿ページの３種類で呼び出される可能性があることに注意。
 */
$SETTING = SWELL_Theme::get_setting();

/* --- 追加: /area配下リクエストかどうかを判定 --- */
$request_path    = parse_url( isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '', PHP_URL_PATH );
$is_area_request = ( false !== strpos( (string) $request_path, '/area' ) );

// タイトル・背景画像を取得
if ( SWELL_Theme::is_term() ) {
	// タームアーカイブの場合
	$term_id   = get_queried_object_id();
	$ttlbg_id  = SWELL_Theme::get_term_ttlbg_id( $term_id );
	$ttlbg_url = '';
	if ( is_string( $ttlbg_id ) ) {
		$ttlbg_url = $ttlbg_id; // 昔はURLデータを保存してた
	}
} else {
	// 投稿ページ・固定ページの場合
	$the_id    = get_queried_object_id();  // ※ get_the_ID() は is_home でアウト
	$ttlbg_id  = SWELL_Theme::get_post_ttlbg_id( $the_id );
	$ttlbg_url = '';
	if ( is_string( $ttlbg_id ) ) {
		$ttlbg_url = $ttlbg_id; // 昔はURLデータを保存してた
	}
}

// 背景画像へのフィルター
$filter_name  = $SETTING['title_bg_filter'];
$filter_class = ( 'nofilter' === $filter_name ) ? '' : 'c-filterLayer -' . $filter_name;
?>
<div id="top_title_area" class="l-topTitleArea <?php echo esc_attr( $filter_class ); ?>">
	<?php
		if ( $ttlbg_url ) {
			echo '<img src="' . esc_attr( $ttlbg_url ) . '" class="l-topTitleArea__img c-filterLayer__img u-obf-cover" decoding="async">';
		} elseif ( $ttlbg_id ) {
			SWELL_Theme::get_image( $ttlbg_id, array(
				'class'       => 'l-topTitleArea__img c-filterLayer__img u-obf-cover',
				'alt'         => '',
				'loading'     => apply_filters( 'swell_top_area_lazy_off', true ) ? 'none' : SWELL_Theme::$lazy_type,
				'aria-hidden' => 'true',
				'decoding'    => 'async',
				'echo'        => true,
			) );
		}
	?>
	<div class="l-topTitleArea__body l-container">
		<?php
			if ( SWELL_Theme::is_term() ) {

				SWELL_Theme::pluggable_parts( 'term_title', array(
					'term_id'   => isset($term_id) ? $term_id : 0,
					'has_inner' => false,
				) );

				if ( isset($term_id) ) {
					SWELL_PARTS::the_term_navigation( $term_id );
				}

			} elseif ( is_single() ) {

				SWELL_Theme::get_parts( 'parts/single/post_head' );

			} elseif ( is_page() || is_home() ) {

				// タイトル（/area配下は出力しない）
				if ( ! $is_area_request ) {
					SWELL_Theme::pluggable_parts( 'page_title', array(
						'title'     => get_the_title( isset($the_id) ? $the_id : 0 ),
						'subtitle'  => get_post_meta( isset($the_id) ? $the_id : 0, 'swell_meta_subttl', true ),
						'has_inner' => false,
					) );
				}

				// 抜粋文（※h1抑止と無関係なので常に出力）
				$post_data = get_post( isset($the_id) ? $the_id : 0 );
				$excerpt   = ( $post_data && isset($post_data->post_excerpt) ) ? $post_data->post_excerpt : '';
				if ( $excerpt ) {
					echo '<div class="c-pageExcerpt">' . wp_kses( $excerpt, SWELL_Theme::$allowed_text_html ) . '</div>';
				}
			}
		?>
	</div>
</div>
