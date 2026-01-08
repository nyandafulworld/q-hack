# Q HACK JAPAN - WordPress Custom Theme

Qoo10特化の運用代行・コンサルティングサービス「Q HACK JAPAN」の公式ウェブサイト用カスタムテーマです。

## 概要

このテーマは、WordPressの人気テーマ「SWELL」の子テーマとして開発されており、Q HACK JAPANのブランディングに特化したデザインとレイアウトを提供します。

## 主な機能

### カスタムヘッダー
- ロゴとサービス説明
- カスタムナビゲーションメニュー
- 2つのCTAボタン（サービス資料請求、店舗分析・無料相談）
- グラデーションボーダー
- レスポンシブ対応

### カスタムフッター
- ロゴとナビゲーションメニュー
- プライバシーポリシーリンク
- コピーライト表示
- ダークテーマデザイン

### メインビジュアル（トップページ）
- 実績表示（支援店舗数、継続率、売上アップ率）
- バッジデザイン
- CTAボタン
- レスポンシブレイアウト

## デザイン仕様

### カラースキーム
- プライマリカラー: `#FF3D3B`
- セカンダリカラー: `#B701F7`
- テキストカラー: `#313131`
- 背景: `#FFFFFF`

### フォント
- **日本語**: Noto Sans JP
- **英数字**: Montserrat, Noto Sans

### グラデーション
- メイングラデーション: `linear-gradient(90deg, #FF3D3B 0%, #B701F7 100%)`

## ファイル構成

```
swell_child/
├── functions.php          # カスタムメニューの登録
├── header.php            # カスタムヘッダー
├── footer.php            # カスタムフッター
├── front-page.php        # トップページテンプレート
├── style.css             # テーマスタイルシート
├── assets/
│   ├── css/
│   │   ├── common/
│   │   │   ├── styles.css    # 共通スタイル
│   │   │   ├── pc.css        # PC用レスポンシブ
│   │   │   ├── tablet.css    # タブレット用レスポンシブ
│   │   │   └── smart.css     # スマートフォン用レスポンシブ
│   │   └── page/
│   │       └── styles.css    # ページ固有スタイル
│   └── images/           # 画像アセット
└── README.md
```

## SEO設定

### プラグイン
- **SEO SIMPLE PACK** を使用

### メタ情報
- **サイトタイトル**: Q HACK JAPAN | Qoo10特化の運用代行・コンサルティング
- **キャッチフレーズ**: メガ割で売上を最大化。出店から運営・PRまで事業成長をトータルサポート。
- **キーワード**: Qoo10, Qoo10運用代行, Qoo10コンサルティング, メガ割, ECコンサル, EC運用代行, 売上アップ, 出店支援

## インストール

1. WordPressの親テーマとして「SWELL」をインストール
2. このリポジトリを `wp-content/themes/swell_child/` にクローン
3. WordPress管理画面でテーマを有効化

```bash
cd wp-content/themes/
git clone https://github.com/nyandafulworld/q-hack.git swell_child
```

## カスタムメニューの設定

WordPress管理画面で以下のメニューを作成してください：

1. **Q HACK ヘッダーナビ** (場所: `qhack_header_nav`)
   - 選ばれる理由
   - サービス
   - お客様の声
   - 成功事例
   - よくある質問
   - 会社概要
   - Qoo10攻略コラム

2. **Q HACK フッターナビ** (場所: `qhack_footer_nav`)
   - ヘッダーナビと同じ構成

## レスポンシブブレークポイント

- **PC**: 1400px以上
- **PC (中)**: 1399px以下、1025px以上
- **タブレット**: 1024px以下、601px以上
- **スマートフォン**: 600px以下

## 開発者向け情報

### CSSアーキテクチャ
- BEM命名規則に準拠
- CSS変数を使用したカラーマネジメント
- モバイルファーストアプローチ

### ブラウザサポート
- Chrome (最新版)
- Firefox (最新版)
- Safari (最新版)
- Edge (最新版)

## 更新履歴

### 2026-01-08 - Initial Release
- カスタムヘッダー、フッター実装
- メインビジュアルセクション追加
- レスポンシブデザイン対応
- SEO設定完了
- CTAボタンスタイル最適化

## ライセンス

© 2026 Q HACK JAPAN Inc. All Rights Reserved.

---

**開発**: Q HACK JAPAN Development Team  
**お問い合わせ**: https://qhack.jp/contact/
