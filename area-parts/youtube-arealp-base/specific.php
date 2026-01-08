<?php if (get_field('area_specific')): ?>
    <section class="area-specific">
    	<div class="area-specific-box fixbox">
    		<h2 class="ttl01 center"><?php get_template_part('area-parts/youtube-arealp-base/pagetitle'); ?>のYouTubeマーケティング事情</h2>
        	<p><?php the_field('area_specific'); ?></p>
    	</div>
    </section>
<?php endif; ?>