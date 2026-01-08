<?php
get_header();
?>
<main id="main_content" class="l-mainContent l-article">
    <article class="l-mainContent__inner" data-clarity-region="article">
        <div class="p-articleHead c-postTitle">
            <h1 class="c-postTitle__ttl">
                <?php the_title(); ?>
            </h1>
        </div>
        <div class="p-articleMetas -top">
            <div class="p-articleMetas__termList c-categoryList">
                <a class="c-categoryList__link hov-flash-up" href="https://if-biz.com/test/case/">活用事例</a>
            </div>
            <div class="p-articleMetas__times c-postTimes u-thin">
                <time class="c-postTimes__posted icon-posted" datetime="<?php echo get_the_date('Y-m-d'); ?>"
                    aria-label="公開日">
                    <?php echo get_the_date('Y年n月j日'); ?>
                </time>
                <time class="c-postTimes__modified icon-modified"
                    datetime="<?php echo get_the_modified_date('Y-m-d'); ?>" aria-label="更新日">
                    <?php echo get_the_modified_date('Y年n月j日'); ?>
                </time>

            </div>
        </div>
        <?php if (has_post_thumbnail()): ?>
        <figure class="p-articleThumb">
            <?php the_post_thumbnail('large', ['class' => 'p-articleThumb__img']); ?>
        </figure>
        <?php endif; ?>

        <div class="post_content">
            <dl class="dl-table">
                <?php if (get_field('case-companyName')): ?>
                <dt>クライアント会社名</dt>
                <dd>
                    <?php the_field('case-companyName'); ?>
                </dd>
                <?php endif; ?>
                <?php if (get_field('case-industry')): ?>
                <dt>業界</dt>
                <dd>
                    <?php the_field('case-industry'); ?>
                </dd>
                <?php endif; ?>
                <?php if (get_field('case-business')): ?>
                <dt>事業</dt>
                <dd>
                    <?php the_field('case-business'); ?>
                </dd>
                <?php endif; ?>
                <?php if (get_field('case-term')): ?>
                <dt>依頼時期</dt>
                <dd>
                    <?php the_field('case-term'); ?>
                </dd>
                <?php endif; ?>
                <?php if (get_field('case-order')): ?>
                <dt>依頼内容</dt>
                <dd>
                    <?php the_field('case-order'); ?>
                </dd>
                <?php endif; ?>

                <?php if (get_field('case-url')): ?>
                <dt>ホームページ</dt>
                <dd>
                    <a href="<?php the_field('case-url'); ?>" target="_blank" rel="noopener noreferrer">
                        <?php the_field('case-url'); ?>
                    </a>
                </dd>
                <?php endif; ?>
            </dl>
            <?php if (get_field('case-problem')): ?>
            <section>
                <h2>依頼前の課題感</h2>
                <div>
                    <?php the_field('case-problem'); ?>
                </div>
            </section>
            <?php endif; ?>

            <?php if (get_field('case-solution')): ?>
            <section>
                <h2>ご支援内容</h2>
                <div>
                    <?php the_field('case-solution'); ?>
                </div>
            </section>
            <?php endif; ?>

            <?php if (get_field('case-result')): ?>
            <section>
                <h2>成果</h2>
                <div>
                    <?php the_field('case-result'); ?>
                </div>
            </section>
            <?php endif; ?>
            <?php the_content(); ?>
            <section>
                <h2>イフビズは、事業拡大を支える実行支援型ビジネスパートナーです。</h2>
                <figure class="wp-block-image size-full case-footer-img">
                    <img decoding="async" width="1422" height="994"
                        src="https://if-biz.com/test/wp-content/uploads/2025/05/top-mv01.png" alt="イフビズは、事業拡大を支える実行支援型ビジネスパートナーです。">
                </figure>
                <p>イフビズはマーケティング支援・新規事業立ち上げ・LP/クリエイティブ制作支援など、
                    <strong>「売上を伸ばす」「事業を広げる」</strong>ための実務支援に特化。
                    戦略設計から施策実行、クリエイティブ制作まで、貴社の課題に合わせた柔軟なサ
                    ポートを行います。
                </p>
                <p>事業拡大に向けて、スピード感と当事者意識を持って、<strong>“外部チーム”ではなく”内部
                        の一員”</strong>のように並走します。
                    これまで、スタートアップから大手企業まで、数十社以上の成長支援を担当。
                    企画・マーケ・営業・開発――必要な局面に応じ、プロが迅速にコミットします。</p>
                <p>「やりたいことはあるが、動かせるリソースが足りない」
                    「拡大のチャンスを逃さず、今すぐ加速したい」
                    そんな企業様こそ、イフビズにご相談ください。
                    雇うより、早く、強く、柔軟に。
                    事業成長のための<strong>“最強の右腕”</strong>になります。
                    ご興味のある方は是非お気軽にご相談ください。
                </p>
            </section>
            <div class="section-btn-box"><a href="https://if-biz.com/test/case/" class="section-btn">
                    活用事例一覧を見る
                    <img decoding="async" src="https://if-biz.com/test/wp-content/uploads/2025/05/Vector-2.png"
                        data-src="https://if-biz.com/test/wp-content/uploads/2025/05/Vector-2.png" alt="矢印"
                        class="arrow-icon ls-is-cached lazyloaded"><noscript><img decoding="async"
                            src="https://if-biz.com/test/wp-content/uploads/2025/05/Vector-2.png" alt="矢印"
                            class="arrow-icon"></noscript>
                </a></div>
        </div>
    </article>
</main>

<?php get_footer(); ?>