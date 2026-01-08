<?php
// contentラッパーを閉じる
?>
</div><!-- /#content -->
<?php
    // Barba wrapper を閉じる
    if ( SWELL_Theme::is_use( 'pjax' ) ) {
        echo '</div>';
    }
?>
</div><!-- /#body_wrap -->
<?php wp_footer(); ?>
</body>
</html>
