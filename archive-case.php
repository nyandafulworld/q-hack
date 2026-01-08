<?php get_header(); ?>
<main id="main_content" class="l-mainContent l-article">
<article class="l-mainContent__inner" data-clarity-region="article">
	<div class="l-mainContent__inner">
    <h1 class="c-pageTitle" data-style="b_bottom"><span class="c-pageTitle__inner">成功事例</span></h1>
	<p class="case-lead">エイチリンクがこれまでに支援した各種サービスの事例・実績をご紹介します。</p>
    <?php if (have_posts()): ?>
        <div class="p-case-grid">
            <?php while (have_posts()): the_post(); ?>
                <div class="p-case-card">
                    <a href="<?php the_permalink(); ?>" class="p-case-card__link">
                        <!-- サムネイル -->
                        <div class="p-case-card__thumb">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/noimg.png" alt="No Image">
                            <?php endif; ?>
                        </div>

                        <!-- タイトル -->
                        <h2 class="p-case-card__title"><?php the_title(); ?></h2>

                        <!-- 業界 -->
                        <p class="p-case-card__meta"><strong>業界：</strong><?php the_field('case-industry'); ?></p>

                        <!-- 依頼内容 -->
                        <?php if (get_field('case-problem')): ?>
                            <div class="p-case-card__problem">
                                <strong>依頼内容：</strong>
                                <div class="__text"><?php echo wp_trim_words(get_field('case-problem'), 50, '…'); ?></div>
                            </div>
                        <?php endif; ?>

                        <!-- 成果 -->
                        <?php if (get_field('case-result')): ?>
                            <div class="p-case-card__result">
                                <strong>成果：</strong>
                                <div class="__text"><?php echo wp_trim_words(get_field('case-result'), 50, '…'); ?></div>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>まだ投稿がありません。</p>
    <?php endif; ?>
	</div>
	</article>
</main>
<?php get_footer(); ?>
